@extends('fertilitycare.layouts.app')

@section('title', 'NaProTECHNOLOGY® | FertilityCare Centers of Nigeria')
@section('description', 'NaProTECHNOLOGY is the medical science that works with the cycle chart to look for the causes of reproductive and gynecological conditions.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'NaProTECHNOLOGY']],
    'eyebrow' => 'The medical part',
    'title' => 'NaProTECHNOLOGY®',
    'lead' => 'Medicine that seeks the causes, not the shortcuts. NaProTECHNOLOGY works with the cycle chart to understand what is happening and to guide diagnosis and treatment.',
  ])

  {{-- What it is --}}
  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="prose-fc reveal max-w-2xl">
        <h2>{{ setting('page.naprotechnology.body_001') }}</h2>
        <p>
          NaProTECHNOLOGY is an approach to women's health and fertility that works <strong>together with</strong> the
          Creighton Model chart. Instead of suppressing symptoms or jumping straight to a technique, it uses the
          information in the cycle to look for the underlying cause and to treat it as far as possible.
        </p>
        <p>
          The chart becomes a clinical tool: it provides the doctor with objective, day-by-day data about the cycle that
          can guide tests, timing, and treatment decisions. This is why it is often described as
          <strong>restorative reproductive medicine</strong>: it seeks to restore normal function rather than replace it.
        </p>
        <p>{{ setting('page.naprotechnology.body_002') }}</p>
      </div>

      <div class="reveal">
        <img src="{{ setting_url('page.naprotechnology.team_image', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="Consultant doctors certified in NaProTECHNOLOGY."
             class="aspect-[4/3] w-full rounded-4xl object-cover shadow-card" loading="lazy" />
      </div>
    </div>
  </section>

  {{-- Conditions --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal mx-auto max-w-2xl text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.naprotechnology.body_003') }}</h2>
        <p class="mt-4 text-lg text-slate-600">{{ setting('page.naprotechnology.body_004') }}</p>
      </div>

      <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ([
          ['nest_clock_farsight_analog', 'Difficulty achieving pregnancy', 'Studying the cycle and the couple to identify possible causes.'],
          ['cycle', 'Irregular cycles', 'Understanding patterns of bleeding and ovulation.'],
          ['healing', 'Painful periods', 'Looking for causes such as endometriosis or other conditions.'],
          ['pregnant_woman', 'Recurrent pregnancy loss', 'Evaluating factors that may affect the course of a pregnancy.'],
          ['bloodtype', 'Abnormal bleeding', 'Investigating the origin of bleeding outside the expected pattern.'],
          ['medication', 'Hormonal concerns', 'Assessing the cycle before considering suppressive treatments.'],
        ] as $c)
          <div class="reveal flex gap-4 rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-mint/60 text-mintdeept">
              <span class="material-symbols-outlined">{{ $c[0] }}</span>
            </span>
            <div>
              <h3 class="font-display font-bold text-ink">{{ $c[1] }}</h3>
              <p class="mt-1 text-sm text-slate-600">{{ $c[2] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- How it differs --}}
  <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="grid items-start gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="reveal">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.naprotechnology.body_005') }}</h2>
        <p class="mt-5 text-lg leading-relaxed text-slate-600">{{ setting('page.naprotechnology.body_006') }}</p>
        <div class="mt-8 rounded-3xl border border-danger/20 bg-dangerbg/40 p-6">
          <p class="text-sm font-semibold text-danger">{{ setting('page.naprotechnology.body_007') }}</p>
        </div>
      </div>

      <div class="reveal grid gap-5 sm:grid-cols-2">
        <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
          <span class="material-symbols-outlined text-[32px] text-primary">search</span>
          <h3 class="mt-4 font-display font-bold text-ink">{{ setting('page.naprotechnology.body_008') }}</h3>
          <p class="mt-2 text-sm text-slate-600">{{ setting('page.naprotechnology.body_009') }}</p>
        </div>
        <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
          <span class="material-symbols-outlined text-[32px] text-primary">handshake</span>
          <h3 class="mt-4 font-display font-bold text-ink">{{ setting('page.naprotechnology.body_010') }}</h3>
          <p class="mt-2 text-sm text-slate-600">{{ setting('page.naprotechnology.body_011') }}</p>
        </div>
        <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
          <span class="material-symbols-outlined text-[32px] text-primary">science</span>
          <h3 class="mt-4 font-display font-bold text-ink">{{ setting('page.naprotechnology.body_012') }}</h3>
          <p class="mt-2 text-sm text-slate-600">{{ setting('page.naprotechnology.body_013') }}</p>
        </div>
        <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
          <span class="material-symbols-outlined text-[32px] text-primary">favorite</span>
          <h3 class="mt-4 font-display font-bold text-ink">{{ setting('page.naprotechnology.body_014') }}</h3>
          <p class="mt-2 text-sm text-slate-600">{{ setting('page.naprotechnology.body_015') }}</p>
        </div>
      </div>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band', [
    'heading' => 'Find a NaPro consultant doctor',
    'sub' => 'Consultant doctors trained in this approach, across Nigeria.',
    'cta' => 'See the doctors',
    'href' => '/directory/napro-doctors',
  ])
@endsection
