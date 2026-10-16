<?php

namespace Database\Seeders;

use App\Models\Center;
use Illuminate\Database\Seeder;

/**
 * Seeds the Centers directory (type "center") and the NaPro consultant doctors
 * (type "doctor") that were previously hard-coded sample arrays in
 * resources/views/fertilitycare/directory.blade.php and napro-doctors.blade.php.
 *
 * Idempotent: keyed on type + name. The rows are representative placeholders;
 * the live directory is managed in Admin ▸ Centers Directory.
 */
class DirectorySeeder extends Seeder
{
    public function run(): void
    {
        // [city, state]
        $centers = [
            ['Lagos', 'Lagos'],
            ['Abuja', 'Federal Capital Territory'],
            ['Port Harcourt', 'Rivers'],
            ['Ibadan', 'Oyo'],
            ['Kano', 'Kano'],
            ['Enugu', 'Enugu'],
            ['Benin City', 'Edo'],
            ['Kaduna', 'Kaduna'],
            ['Owerri', 'Imo'],
            ['Uyo', 'Akwa Ibom'],
            ['Jos', 'Plateau'],
            ['Calabar', 'Cross River'],
        ];

        $order = 0;

        foreach ($centers as [$city, $state]) {
            $order++;

            Center::query()->firstOrCreate(
                ['type' => Center::TYPE_CENTER, 'name' => 'FertilityCare Center — ' . $city],
                [
                    'country'    => 'Nigeria',
                    'state'      => $state,
                    'city'       => $city,
                    'is_active'  => true,
                    'sort_order' => $order,
                ]
            );
        }

        $doctors = [
            ['Lagos', 'Lagos', 'Restorative reproductive medicine'],
            ['Abuja', 'Federal Capital Territory', 'Fertility and gynecological health'],
            ['Port Harcourt', 'Rivers', 'Restorative reproductive medicine'],
            ['Ibadan', 'Oyo', 'Endometriosis and cycle care'],
            ['Kano', 'Kano', 'Fertility and gynecological health'],
            ['Enugu', 'Enugu', 'Restorative reproductive medicine'],
            ['Benin City', 'Edo', 'Fertility care'],
            ['Kaduna', 'Kaduna', 'Gynecological health'],
            ['Owerri', 'Imo', 'Restorative reproductive medicine'],
        ];

        $order = 0;

        foreach ($doctors as [$city, $state, $focus]) {
            $order++;

            Center::query()->firstOrCreate(
                ['type' => Center::TYPE_DOCTOR, 'name' => 'NaPro Consultant — ' . $city],
                [
                    'country'    => 'Nigeria',
                    'state'      => $state,
                    'city'       => $city,
                    'specialty'  => $focus,
                    'is_active'  => true,
                    'sort_order' => $order,
                ]
            );
        }
    }
}
