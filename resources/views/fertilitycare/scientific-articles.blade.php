@extends('fertilitycare.layouts.app')

@section('title', 'Scientific articles | FertilityCare Centers of Nigeria')
@section('description', 'A curated list of peer-reviewed sources on the Creighton Model and restorative reproductive medicine.')
@php
  /*
   |--------------------------------------------------------------------------
   | Scientific articles (CURATED LIST — SAMPLE)
   |--------------------------------------------------------------------------
   | Titles, authors, and journals below are illustrative placeholders that
   | show the intended structure. Replace them with your verified bibliography
   | (with correct citations and links) before publishing.
   */
  $articles = [
    ['The Creighton Model and the standardization of cycle observation', 'FertilityCare research review', '2019'],
    ['Restorative reproductive medicine: an approach to seeking causes', 'Reproductive medicine review', '2020'],
    ['Cervical mucus biomarkers and their clinical interpretation', 'Cycle science journal', '2021'],
    ['NaProTECHNOLOGY in the evaluation of infertility', 'Restorative medicine review', '2021'],
    ['The cycle chart as an objective clinical tool', 'Women\'s health review', '2022'],
    ['Endometriosis and the value of day-by-day cycle data', 'Restorative medicine review', '2023'],
  ];
@endphp

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Resources', 'href' => '/resources'], ['label' => 'Scientific articles']],
    'eyebrow' => 'Library',
    'title' => 'Scientific articles',
    'lead' => 'A starting point for professionals and curious readers: peer-reviewed sources on the Creighton Model and restorative reproductive medicine.',
  ])

  <section class="mx-auto max-w-4xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="space-y-4">
      @foreach ($articles as $a)
        <article class="reveal flex gap-5 rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
          <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-skysoft text-primary-dark">
            <span class="material-symbols-outlined">article</span>
          </span>
          <div>
            <h2 class="font-display text-lg font-bold leading-snug text-ink">{{ $a[0] }}</h2>
            <p class="mt-1 text-sm text-slate-500">{{ $a[1] }} · {{ $a[2] }}</p>
          </div>
        </article>
      @endforeach
    </div>

    <div class="reveal mt-10 rounded-3xl border border-danger/20 bg-dangerbg/40 p-6">
      <p class="text-sm font-semibold text-danger">{{ setting('page.scientific-articles.body_001') }}</p>
    </div>

    <div class="reveal mt-8 text-center">
      <a href="/resources" class="inline-flex items-center gap-2 rounded-full border-2 border-primary/15 bg-white px-6 py-3.5 font-semibold text-primary transition hover:border-primary/40 hover:bg-surface2">
        <span class="material-symbols-outlined text-[20px]">arrow_back</span> Back to resources
      </a>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band')
@endsection
