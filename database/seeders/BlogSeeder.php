<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

/**
 * Seeds the three articles that used to live in config/site_pages.php as
 * "article" entries (editable from Page Content). They now live in the posts
 * table so Blog is the single source of truth for this content.
 *
 * Idempotent: keyed on slug.
 */
class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title'          => 'Why a gynecologist studies NaProTECHNOLOGY',
                'slug'           => 'why-study-naprotechnology',
                'category'       => 'Clinical',
                'published_at'   => '2026-09-07 09:00:00',
                'featured_image' => '/fertilitycare-replica/assets/placeholder.svg',
                'excerpt'        => 'Dr. Fernando Urquiza, a gynecologist and NaProTECHNOLOGY professional, explains his reasons for studying this emerging science.',
                'body'           => <<<'HTML'
<p>For a gynecologist, few things are as frustrating as not being able to offer a patient more than a way to manage her symptoms. NaProTECHNOLOGY starts from a different question: what is actually happening in this cycle, and can we correct it?</p>
<p>That question, and the tools to answer it, are what led me to study this approach. The Creighton Model chart gives the doctor something rare in women's health: objective, day-by-day data about the cycle that can guide diagnosis instead of guesswork.</p>
<h2>Looking for causes, not shortcuts</h2>
<p>Restorative reproductive medicine does not promise results. It promises rigor and respect: understanding the cycle, studying possible causes, and supporting the body's own function wherever possible.</p>
<p>For doctors who want to offer that, the training is demanding but worthwhile. It connects the educational work of the Practitioner with the clinical work of the physician — two halves of the same system.</p>
HTML,
            ],
            [
                'title'          => 'What every woman and every couple have the right to know',
                'slug'           => 'what-every-woman-and-couple-have-the-right-to-know',
                'category'       => 'Education',
                'published_at'   => '2026-05-17 09:00:00',
                'featured_image' => '/fertilitycare-replica/assets/placeholder.svg',
                'excerpt'        => 'A video about the essential information every woman and every couple have the right to know about their fertility.',
                'body'           => <<<'HTML'
<p>Knowing your own cycle should not be a specialty. Yet many women reach adulthood without ever being taught what a normal cycle looks like, how to recognize the signs of fertility, or when a pattern deserves medical attention.</p>
<p>Information is not the same as a diagnosis, and no article replaces a professional. But there is a baseline of knowledge that everyone has a right to — and that baseline is where the FertilityCare system begins.</p>
<h2>What this means in practice</h2>
<p>The Creighton Model is, at its core, an educational tool. It teaches women and couples to observe and record the cycle with clear criteria, so decisions about health and fertility are made with information rather than assumptions.</p>
<p>That is the right the title of this article refers to: the right to know your own body well enough to ask good questions.</p>
HTML,
            ],
            [
                'title'          => 'Natural fertility methods',
                'slug'           => 'natural-fertility-methods',
                'category'       => 'Education',
                'published_at'   => '2025-11-14 09:00:00',
                'featured_image' => '/fertilitycare-replica/assets/placeholder.svg',
                'excerpt'        => 'Eva Corujo talks about natural fertility models, how to live them, and how to put them into practice.',
                'body'           => <<<'HTML'
<p>Not all natural methods are the same. Some estimate fertile days from a calendar; others observe, in real time, the signs the body shows each day. The difference matters, especially when cycles are irregular.</p>
<p>In this conversation, Eva Corujo explains what natural fertility models are, how to live them, and what it takes to put them into practice consistently.</p>
<h2>Consistency over perfection</h2>
<p>Any method works only if it is used as taught. The Creighton Model gives clear, standardized rules precisely so that the practice does not depend on intuition or memory.</p>
<p>The goal is not a perfect chart, but an honest one — and a Practitioner to help you read it.</p>
HTML,
            ],
        ];

        foreach ($posts as $post) {
            $post['featured_image'] ??= '/fertilitycare-replica/assets/placeholder.svg';

            $existing = Post::query()->where('slug', $post['slug'])->first();

            if ($existing) {
                // Never overwrite media an admin has uploaded — only the copy.
                $existing->fill(Arr::except($post, ['featured_image']) + ['is_published' => true]);
                $existing->save();

                continue;
            }

            Post::query()->create($post + ['is_published' => true]);
        }
    }
}
