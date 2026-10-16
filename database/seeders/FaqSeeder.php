<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

/**
 * Seeds every FAQ previously hard-coded in
 * resources/views/fertilitycare/faq.blade.php, grouped by category.
 *
 * The FAQ page renders these grouped by `category`; the inline FAQ section on
 * the Home page reuses the same rows (first six).
 *
 * Idempotent: matches on question, so re-running never duplicates rows.
 */
class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            'General' => [
                [
                    'q' => 'What exactly is FertilityCare?',
                    'a' => 'It is an educational and medical system that teaches women and couples to know and understand their reproductive health through the Creighton Model, supported by trained Practitioners and, when needed, by NaPro consultant doctors.',
                ],
                [
                    'q' => 'Is it only for people looking for a pregnancy?',
                    'a' => 'No. Many people learn the method simply to understand and care for their health. Others use it to treat symptoms, monitor their cycle, or make decisions about fertility.',
                ],
                [
                    'q' => 'Do I need to be married or in a relationship?',
                    'a' => 'No. Any woman of reproductive age can learn to understand her cycle. When there is a partner, they can be integrated into the process; and when appropriate, the man\'s reproductive health is also considered.',
                ],
                [
                    'q' => 'Does FertilityCare replace my doctor?',
                    'a' => 'No. The Practitioner teaches the method; medical diagnosis and treatment belong to your doctor. When the chart suggests something that needs medical attention, you are referred to a NaPro consultant doctor.',
                ],
            ],
            'The Creighton Model' => [
                [
                    'q' => 'Is the Creighton Model a calendar method?',
                    'a' => 'No. Unlike calendar methods, it does not estimate fertile days from previous cycles. It teaches you to observe and record, in real time, the biomarkers of your own cycle —such as bleeding patterns and cervical mucus— using standardized criteria. It doesn\'t guess the cycle: it observes it, records it, and interprets it.',
                ],
                [
                    'q' => 'Is it only useful for trying to conceive?',
                    'a' => 'No. It helps you understand and care for your reproductive health, monitor your cycle, and make decisions with more information. It also provides useful data for symptoms such as pain, irregular bleeding, or altered cycles.',
                ],
                [
                    'q' => 'What does it observe?',
                    'a' => 'Mainly the presence and quality of cervical mucus and the pattern of bleeding, recorded day by day. Other symptoms can be noted alongside the chart.',
                ],
                [
                    'q' => 'How long does it take to learn?',
                    'a' => 'You learn the foundations in the introductory session and begin charting right away. Understanding the full pattern of your own cycle takes a few cycles, with follow-ups along the way.',
                ],
            ],
            'NaProTECHNOLOGY' => [
                [
                    'q' => 'What is the difference between the Creighton Model and NaProTECHNOLOGY?',
                    'a' => 'The Creighton Model is the educational part: it teaches you to observe and chart your cycle. NaProTECHNOLOGY is the medical part: using that information, a medical professional can look for the causes of a condition and guide tests or treatments.',
                ],
                [
                    'q' => 'Does NaProTECHNOLOGY guarantee a pregnancy?',
                    'a' => 'No. No intervention can guarantee it. NaProTECHNOLOGY seeks to restore the health conditions that allow fertility to express itself naturally when possible. Every process is unique and results can vary.',
                ],
                [
                    'q' => 'Can it help with pain or irregular cycles?',
                    'a' => 'It aims to look for the causes of these symptoms rather than only suppressing them. Whether it is appropriate for your case is something a qualified professional must assess.',
                ],
            ],
            'Getting started' => [
                [
                    'q' => 'How do I start?',
                    'a' => 'Find a Practitioner near you in the directory. In the first session you learn about the system and start charting your cycle; then you continue with personalized follow-up sessions.<br><a href="/directory" class="mt-3 inline-flex items-center gap-1 font-semibold text-primary">Find support <span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>',
                ],
                [
                    'q' => 'What if there is no Center in my city?',
                    'a' => 'The network keeps growing. Write to us through the contact page and we will help you find the closest option, which may include remote follow-up where available.<br><a href="/contact" class="mt-3 inline-flex items-center gap-1 font-semibold text-primary">Write to us <span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>',
                ],
                [
                    'q' => 'Can I train to become a Practitioner?',
                    'a' => 'Yes. There is a structured training program with defined stages.<br><a href="/professional-training" class="mt-3 inline-flex items-center gap-1 font-semibold text-primary">See professional training <span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>',
                ],
            ],
        ];

        $order = 0;

        foreach ($groups as $category => $items) {
            foreach ($items as $item) {
                $order++;

                Faq::query()->firstOrCreate(
                    ['question' => $item['q']],
                    [
                        'category'   => $category,
                        'answer'     => $item['a'],
                        'is_active'  => true,
                        'sort_order' => $order,
                    ]
                );
            }
        }
    }
}
