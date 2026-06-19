<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'patient_id',
        // 'doctor_id',
        // 'staff_id',
        'name',
        'email',
        'location',
        'appointment_date',
        'appointment_time',
        'duration',
        'appointment_type',
        'reason',
        // 'previous_appointment_id',
        // 'clinic_branch',
        // 'room_number',
        // 'consultation_fee',
        // 'payment_status',
        // 'invoice_number',
        // 'insurance_provider',
        'status',
    ];
}
