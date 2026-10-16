@extends('fertilitycare.layouts.app')

@section('title', 'Resources | FertilityCare Centers of Nigeria')
@section('description', 'Library, official sources, formats, and materials to learn more about the Creighton Model and NaProTECHNOLOGY.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Resources']],
    'eyebrow' => 'Library',
    'title' => 'Resources',
    'lead' => 'Materials to go deeper: official sources, formats used with the method, and ways to request the resources you need.',
  ])

  {{-- Cards --}}
  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-6 md:grid-cols-3">
      {{-- Scientific articles --}}
      <a href="/resources/scientific-articles" class="reveal group flex flex-col justify-between rounded-4xl border border-slate-100 bg-white p-8 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
        <div>
          <span class="grid h-16 w-16 place-items-center rounded-2xl bg-skysoft text-primary-dark transition group-hover:bg-primary group-hover:text-white">
            <span class="material-symbols-outlined text-[30px]">science</span>
          </span>
          <h2 class="mt-6 font-display text-2xl font-bold text-ink">{{ setting('page.resources.body_001') }}</h2>
          <p class="mt-3 text-slate-600">{{ setting('page.resources.body_002') }}</p>
        </div>
        <span class="mt-8 inline-flex items-center gap-2 font-semibold text-primary">Browse articles <span class="material-symbols-outlined transition group-hover:translate-x-1">arrow_forward</span></span>
      </a>

      {{-- Formats --}}
      <div class="reveal flex flex-col justify-between rounded-4xl border border-slate-100 bg-white p-8 shadow-soft">
        <div>
          <span class="grid h-16 w-16 place-items-center rounded-2xl bg-mint/60 text-mintdeept">
            <span class="material-symbols-outlined text-[30px]">description</span>
          </span>
          <h2 class="mt-6 font-display text-2xl font-bold text-ink">{{ setting('page.resources.body_003') }}</h2>
          <p class="mt-3 text-slate-600">{{ setting('page.resources.body_004') }}</p>
        </div>
        <a href="/contact" class="mt-8 inline-flex items-center gap-2 font-semibold text-primary">Ask about formats <span class="material-symbols-outlined transition group-hover:translate-x-1">arrow_forward</span></a>
      </div>

      {{-- Materials --}}
      <div class="reveal flex flex-col justify-between rounded-4xl bg-midnight p-8 text-white shadow-card">
        <div>
          <span class="grid h-16 w-16 place-items-center rounded-2xl bg-white/10 text-sky">
            <span class="material-symbols-outlined text-[30px]">inventory_2</span>
          </span>
          <h2 class="mt-6 font-display text-2xl font-bold">{{ setting('page.resources.body_005') }}</h2>
          <p class="mt-3 text-slate-200">{{ setting('page.resources.body_006') }}</p>
        </div>
        <a href="/contact" class="mt-8 inline-flex items-center gap-2 font-semibold text-sky">Request materials <span class="material-symbols-outlined transition group-hover:translate-x-1">arrow_forward</span></a>
      </div>
    </div>
  </section>

  {{-- Official sources --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal mx-auto max-w-2xl text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.resources.body_007') }}</h2>
        <p class="mt-4 text-lg text-slate-600">{{ setting('page.resources.body_008') }}</p>
      </div>

      <div class="mt-12 grid gap-6 md:grid-cols-2">
        @foreach ([
          ['Creighton Model — FertilityCare Centers of America', 'https://www.fertilitycare.org/', 'The organization that develops and certifies the Creighton Model education and Practitioners.'],
          ['NaProTECHNOLOGY', 'https://www.naprotechnology.com/', 'Official information on the medical approach and the training of consultant doctors.'],
        ] as $s)
          <a href="{{ $s[1] }}" target="_blank" rel="noopener" class="reveal group flex flex-col rounded-3xl border border-slate-100 bg-white p-7 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-skysoft text-primary-dark">
              <span class="material-symbols-outlined">public</span>
            </span>
            <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ $s[0] }}</h3>
            <p class="mt-2 flex-1 text-slate-600">{{ $s[2] }}</p>
            <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-primary">Visit site <span class="material-symbols-outlined text-[18px] transition group-hover:translate-x-1">open_in_new</span></span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band', [
    'heading' => 'Have a question about the materials?',
    'sub' => 'Write to us and we will point you to the right resource.',
    'cta' => 'Write to us',
    'href' => '/contact',
  ])
@endsection
