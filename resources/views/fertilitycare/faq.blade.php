@extends('fertilitycare.layouts.app')

@section('title', 'Frequently asked questions | FertilityCare Centers of Nigeria')
@section('description', 'Clear answers about the Creighton Model, NaProTECHNOLOGY, getting started, and professional training.')

@push('head')
  <!-- FAQPage structured data (mirrors the visible accordion) -->
  @php
    $faqSchemaItems = [];
    foreach ($faqGroups as $category => $groupFaqs) {
        foreach ($groupFaqs as $faq) {
            $faqSchemaItems[] = [
                '@type' => 'Question',
                'name'  => $faq->question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => trim(strip_tags((string) $faq->answer)),
                ],
            ];
        }
    }
  @endphp
  @if (count($faqSchemaItems))
    <script type="application/ld+json">{!! json_encode([
      '@context'   => 'https://schema.org',
      '@type'      => 'FAQPage',
      'mainEntity' => $faqSchemaItems,
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  @endif
@endpush

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'What is FertilityCare', 'href' => '/what-is-fertilitycare'], ['label' => 'Frequently asked questions']],
    'eyebrow' => 'Before you start',
    'title' => 'Frequently asked questions',
    'lead' => 'The questions we hear most often about the Creighton Model, NaProTECHNOLOGY, and how to take the first step.',
  ])

  <section class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    @forelse ($faqGroups as $category => $faqs)
      <div class="{{ $loop->first ? '' : 'mt-14' }}">
        @if ($category)
          <div class="reveal">
            <h2 class="font-display text-2xl font-bold text-ink">{{ $category }}</h2>
          </div>
        @endif
        <div class="mt-6">
          @include('fertilitycare.partials.faq-accordion', ['items' => collect($faqs)->map(fn ($f) => ['q' => $f->question, 'a' => $f->answer])->all()])
        </div>
      </div>
    @empty
      <p class="text-center text-slate-500">Questions and answers are coming soon.</p>
    @endforelse
  </section>

  @include('fertilitycare.partials.cta-band', [
    'heading' => 'Still have a question?',
    'sub' => 'Write to us and we will help you find the right next step.',
    'cta' => 'Write to us',
    'href' => '/contact',
  ])
@endsection
