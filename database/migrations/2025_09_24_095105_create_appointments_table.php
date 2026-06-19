<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('patient_id'); // Relation to patients table
            // $table->unsignedBigInteger('doctor_id');  // Relation to doctors table
            // $table->unsignedBigInteger('staff_id')->nullable(); // Staff/Nurse who assisted

            // Scheduling
            $table->string('name');
            $table->string('email');
            $table->string('location');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->integer('duration')->default(30); // in minutes

            // Medical context
            $table->string('appointment_type'); // e.g., IVF Consultation, Ultrasound, etc.
            $table->text('reason')->nullable(); // Patient/Doctor reason
            // $table->unsignedBigInteger('previous_appointment_id')->nullable();

            // // Location
            // $table->string('clinic_branch')->nullable();
            // $table->string('room_number')->nullable();

            // // Billing & Records
            // $table->decimal('consultation_fee', 10, 2)->default(0);
            // $table->enum('payment_status', ['pending', 'paid', 'insurance'])->default('pending');
            // $table->string('invoice_number')->nullable();
            // $table->string('insurance_provider')->nullable();

            // Status
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled', 'rescheduled'])
                  ->default('pending');

            // Timestamps
            $table->timestamps();

            // // Foreign keys (if patients, doctors tables exist)
            // $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            // $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            // $table->foreign('staff_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('previous_appointment_id')->references('id')->on('appointments')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
