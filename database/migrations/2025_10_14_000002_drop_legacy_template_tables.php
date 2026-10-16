<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Database Schema Pruning — permanent removal of legacy template tables.
 *
 * These tables belonged to the old pre-FertilityCare template (e-commerce /
 * HR / job board / notice boards / appointments) whose controllers, routes and
 * views have been deleted in the same clean-up. Nothing in the active platform
 * reads them any longer.
 *
 * `settings` is superseded by the new `site_settings` key/value engine.
 * `password_resets` is superseded by `password_reset_tokens`.
 */
return new class extends Migration
{
    /**
     * @var array<int, string>
     */
    protected array $legacy = [
        'abouts',
        'admin_notifications',
        'application',
        'appointments',
        'boards',
        'categories',
        'faqs',
        'images',
        'jobs',
        'offers',
        'orders',
        'password_resets',
        'products',
        'settings',
        'sliders',
        'subscribers',
        'testimonials',
    ];

    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ($this->legacy as $table) {
            Schema::dropIfExists($table);
        }

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        /*
         * Intentionally empty: this is a destructive pruning migration.
         * The tables were recreated from their original migrations, which were
         * archived with the clean-up. Recover from git history if you need them:
         *
         *   git log --diff-filter=D -- "database/migrations/*"
         */
    }
};
