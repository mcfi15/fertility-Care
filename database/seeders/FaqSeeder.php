<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Who can benefit from FertilityCare ?',
                'answer' => 'FertilityCare can benefit individuals or couples who are experiencing difficulty conceiving, those with procreative health concerns, or those who simply want to better understand their fertility. Whether you have been trying to conceive without success, have irregular menstrual cycles, or have been diagnosed with certain conditions affecting fertility, FertilityCare can provide diagnostic assessments, personalized treatment options, and emotional support to help you achieve your procreative goals.',
                'position' => 1,
                'status' => true,
            ],
            [
                'question' => 'What is the Creighton Model System?',
                'answer' => 'The Creighton Model System, also known as the Creighton Model FertilityCare System, is a method of natural fertility awareness. It involves tracking and interpreting various biomarkers, such as cervical mucus, monitoring a woman\'s menstrual cycle and identifying fertile and infertile periods. The system can be used for both achieving and avoiding pregnancy, as well as for monitoring procreative health.',
                'position' => 2,
                'status' => true,
            ],
            [
                'question' => 'How effective is the Creighton Model System in achieving pregnancy?',
                'answer' => 'The effectiveness of the Creighton Model System in achieving pregnancy depends on various factors, including the couple\'s fertility health and their adherence to the method. When used correctly, the Creighton Model System can help couples identify the most fertile days of the menstrual cycle, increasing their chances of conceiving. However, individual fertility factors can vary, and success rates may differ from couple to couple. It is important to receive proper training and guidance from a qualified Creighton Model FertilityCare Practitioner to maximize the method\'s effectiveness.',
                'position' => 3,
                'status' => true,
            ],
            [
                'question' => 'What is NaProTECHNOLOGY (Natural Procreative Technology)?',
                'answer' => 'NaProTECHNOLOGY is a specialized approach to FertilityCare and procreative medicine. It focuses on diagnosing and addressing the underlying causes of infertility and procreative health issues. NaProTECHNOLOGY combines medical science with natural fertility awareness methods to provide personalized and targeted care, aiming to restore and optimize reproductive health.',
                'position' => 4,
                'status' => true,
            ],
            [
                'question' => 'How does NaProTECHNOLOGY differ from other fertility treatments?',
                'answer' => 'NaProTECHNOLOGY differs from many other fertility treatments as it focuses on identifying and addressing the root causes of infertility and procreative health problems. NaProTECHNOLOGY aims to work with the body\'s natural processes and enhance the woman\'s fertility through targeted medical interventions and hormonal support. It offers a holistic and individualized approach to FertilityCare, taking into account the specific needs and circumstances of each person. NaProTECHNOLOGY Medical Consultant works closely with FertilityCare Practioner using the Creighton Model chart of the patient as an important treatment management tool.',
                'position' => 5,
                'status' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        $this->command->info('Seeded ' . count($faqs) . ' FAQ entries.');
    }
}