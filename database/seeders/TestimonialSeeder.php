<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

/**
 * Seeds the testimonials that were previously hard-coded in
 * resources/views/fertilitycare/testimonials.blade.php (grid) and
 * resources/views/fertilitycare/index.blade.php (featured card).
 *
 * Idempotent: matches on name + quote so re-running never duplicates rows.
 */
class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'category' => 'Diagnosis',
                'quote'    => 'After years without answers, my Practitioner helped me understand what was happening in my cycle. For the first time I felt that someone was looking for the cause, not just covering up the symptom.',
                'name'     => 'Alejandra',
                'role'     => '32 years old',
            ],
            [
                'category' => 'Learning',
                'quote'    => 'I learned to read my own cycle. It gave me peace of mind and information I had never had before.',
                'name'     => 'Mariana',
                'role'     => '27 years old',
            ],
            [
                'category' => 'Couples',
                'quote'    => 'We made decisions together with real information. It changed how we talked about our future.',
                'name'     => 'Diego and Sofía',
                'role'     => 'Couple',
            ],
            [
                'category' => 'Support',
                'quote'    => 'What I valued most was the follow-up. I never felt alone with my chart or my questions.',
                'name'     => 'Carla',
                'role'     => '35 years old',
            ],
            [
                'category' => 'Health',
                'quote'    => 'The chart gave my doctor data he had never had. That changed the whole conversation.',
                'name'     => 'Lucía',
                'role'     => '29 years old',
            ],
            [
                'category' => 'Training',
                'quote'    => 'As a health professional, the training gave me a solid, standardized tool to accompany women.',
                'name'     => 'Practitioner',
                'role'     => 'Nigeria',
            ],
        ];

        foreach ($rows as $i => $row) {
            Testimonial::query()->firstOrCreate(
                ['name' => $row['name'], 'quote' => $row['quote']],
                $row + ['rating' => 5, 'is_active' => true, 'sort_order' => $i + 1]
            );
        }
    }
}
