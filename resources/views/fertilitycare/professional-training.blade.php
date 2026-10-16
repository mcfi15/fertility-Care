@extends('fertilitycare.layouts.app')

@section('title', 'Professional training | FertilityCare Centers of Nigeria')
@section('description', 'Train as a FertilityCare Practitioner or NaPro consultant doctor. Stages, requirements, educational programs, and FAQs.')

@php
  $sections = [
    'ser-practitioner'      => 'Become a Practitioner',
    'etapas'                => 'Training stages',
    'requisitos'            => 'Who can apply',
    'programas-educativos'  => 'Educational programs',
    'generaciones'          => 'Past cohorts',
    'formacion-medica'      => 'Training for consultant doctors',
    'preguntas-formacion'   => 'Frequently asked questions',
  ];
@endphp

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Professional training']],
    'eyebrow' => 'For professionals',
    'title' => 'Professional training',
    'lead' => 'Become a Practitioner or a NaPro consultant doctor and join the network that teaches the Creighton Model and supports women and couples across Nigeria.',
  ])

  {{-- In-page nav --}}
  <nav class="sticky top-[76px] z-30 border-b border-slate-100 bg-white/85 backdrop-blur" aria-label="On this page">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <ul class="flex gap-2 overflow-x-auto py-3 text-sm">
        @foreach ($sections as $id => $label)
          <li class="shrink-0"><a href="#{{ $id }}" class="whitespace-nowrap rounded-full px-4 py-2 font-semibold text-slate-600 transition hover:bg-surface2 hover:text-primary">{{ $label }}</a></li>
        @endforeach
      </ul>
    </div>
  </nav>

  {{-- Become a Practitioner --}}
  <section id="ser-practitioner" class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="prose-fc reveal max-w-2xl">
        <h2>{{ setting('page.professional-training.body_001') }}</h2>
        <p>{{ setting('page.professional-training.body_002') }}</p>
        <p>{{ setting('page.professional-training.body_003') }}</p>
      </div>
      <div class="reveal">
        <img src="{{ setting_url('page.professional-training.become_image', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="A Practitioner during a training session."
             class="aspect-[4/3] w-full rounded-4xl object-cover shadow-card" loading="lazy" />
      </div>
    </div>
  </section>

  {{-- Stages --}}
  <section id="etapas" class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal mx-auto max-w-2xl text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.professional-training.body_004') }}</h2>
        <p class="mt-4 text-lg text-slate-600">{{ setting('page.professional-training.body_005') }}</p>
      </div>

      <ol class="mt-12 grid gap-6 md:grid-cols-3">
        @foreach ([
          ['1', 'Education', 'You study the foundations and terminology of the Creighton Model through structured sessions.'],
          ['2', 'Supervised practice', 'You start accompanying real cases under supervision, with feedback on each stage.'],
          ['3', 'Evaluation and certification', 'You complete the required evaluations to be certified and begin practicing.'],
        ] as $step)
          <li class="reveal rounded-3xl border border-slate-100 bg-white p-7 shadow-soft">
            <span class="grid h-12 w-12 place-items-center rounded-full bg-primary font-display text-lg font-bold text-white">{{ $step[0] }}</span>
            <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ $step[1] }}</h3>
            <p class="mt-2 text-slate-600">{{ $step[2] }}</p>
          </li>
        @endforeach
      </ol>
      <p class="reveal mt-8 text-center text-sm text-slate-500">{{ setting('page.professional-training.body_006') }}</p>
    </div>
  </section>

  {{-- Who can apply --}}
  <section id="requisitos" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="reveal">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.professional-training.body_007') }}</h2>
        <ul class="mt-8 space-y-5">
          @foreach ([
            ['Commitment to the person', 'A genuine interest in accompanying women and couples with respect.'],
            ['Willingness to learn', 'Availability to complete the sessions, supervised practice, and evaluations.'],
            ['Professional background', 'Health, education, or social fields are common, but not the only paths.'],
            ['Availability', 'Time to attend the program and to accompany cases afterwards.'],
          ] as $r)
            <li class="flex gap-4">
              <span class="material-symbols-outlined icon-fill mt-0.5 text-[26px] text-primary">check_circle</span>
              <div>
                <h3 class="font-display text-lg font-bold text-ink">{{ $r[0] }}</h3>
                <p class="mt-1 text-slate-600">{{ $r[1] }}</p>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="reveal rounded-4xl bg-midnight p-8 text-white shadow-card sm:p-10">
        <h3 class="font-display text-2xl font-bold">{{ setting('page.professional-training.body_008') }}</h3>
        <p class="mt-4 text-slate-200">{{ setting('page.professional-training.body_009') }}</p>
        <a href="/contact" class="mt-6 inline-flex items-center gap-2 rounded-full bg-white px-6 py-3.5 font-semibold text-primary transition hover:bg-mint">
          Request information <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
        </a>
      </div>
    </div>
  </section>

  {{-- Educational programs --}}
  <section id="programas-educativos" class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal mx-auto max-w-2xl text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.professional-training.body_010') }}</h2>
        <p class="mt-4 text-lg text-slate-600">{{ setting('page.professional-training.body_011') }}</p>
      </div>

      <div class="mt-12 grid gap-6 md:grid-cols-2">
        @foreach ([
          ['Lagos, Nigeria', 'Program dates and brochure available on request.'],
          ['Abuja, Nigeria', 'Program dates and brochure available on request.'],
        ] as $p)
          <div class="reveal rounded-3xl border border-slate-100 bg-white p-7 shadow-soft">
            <span class="grid h-14 w-14 place-items-center rounded-2xl bg-skysoft text-primary-dark">
              <span class="material-symbols-outlined text-[28px]">event</span>
            </span>
            <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ $p[0] }}</h3>
            <p class="mt-2 text-slate-600">{{ $p[1] }}</p>
            <a href="/contact" class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">Request the brochure <span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Past cohorts --}}
  <section id="generaciones" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="reveal mx-auto max-w-2xl text-center">
      <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.professional-training.body_012') }}</h2>
      <p class="mt-4 text-lg text-slate-600">{{ setting('page.professional-training.body_013') }}</p>
    </div>
    <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      @foreach (['Cohort 1', 'Cohort 2', 'Cohort 3', 'Cohort 4', 'Cohort 5', 'Cohort 6'] as $g)
        <div class="reveal overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-soft">
          <img src="{{ setting_url('page.professional-training.cohorts_image', '/fertilitycare-replica/assets/placeholder.svg') }}" alt="{{ $g }} of the professional training program." class="aspect-[16/10] w-full object-cover" loading="lazy" />
          <div class="p-5">
            <h3 class="font-display font-bold text-ink">{{ $g }}</h3>
            <p class="text-sm text-slate-500">{{ setting('page.professional-training.body_014') }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  {{-- Medical consultant training --}}
  <section id="formacion-medica" class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
        <div class="reveal">
          <img src="{{ setting_url('page.professional-training.medical_training_image', '/fertilitycare-replica/assets/placeholder.svg') }}"
               alt="Consultant doctors certified in NaProTECHNOLOGY."
               class="aspect-[5/4] w-full rounded-4xl object-cover shadow-card" loading="lazy" />
        </div>
        <div class="reveal">
          <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.professional-training.body_015') }}</h2>
          <p class="mt-5 text-lg leading-relaxed text-slate-600">{{ setting('page.professional-training.body_016') }}</p>
          <a href="/contact" class="mt-8 inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3.5 font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primary-dark">
            Request information <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- Training FAQ --}}
  <section id="preguntas-formacion" class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="reveal text-center">
      <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.professional-training.body_017') }}</h2>
      <p class="mt-4 text-lg text-slate-600">{{ setting('page.professional-training.body_018') }}</p>
    </div>
    <div class="mt-10">
      @include('fertilitycare.partials.faq-accordion', ['items' => [
        ['q' => 'Do I need a medical degree to become a Practitioner?', 'a' => 'No. Practitioners come from different backgrounds. A medical degree is only required for the Medical Consultant track.'],
        ['q' => 'How long does the training take?', 'a' => 'It combines structured sessions, supervised practice, and evaluations. The exact duration depends on the program and your availability; write to us for current dates.'],
        ['q' => 'Is there continuing education?', 'a' => 'Yes. Maintaining certification requires ongoing education to keep up with the method and the network.'],
        ['q' => 'Can I train while working?', 'a' => 'Many participants do. The program is structured to be compatible with professional activity, though it requires real commitment.'],
        ['q' => 'How do I apply?', 'a' => 'Write to us through the contact page and tell us about your background and interest. We will guide you through the next steps.<br><a href="/contact" class="mt-3 inline-flex items-center gap-1 font-semibold text-primary">Write to us <span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>'],
      ]])
    </div>
  </section>

  @include('fertilitycare.partials.cta-band', [
    'heading' => 'Join the network',
    'sub' => 'Train to teach the Creighton Model and support women and couples.',
    'cta' => 'Request information',
    'href' => '/contact',
  ])
@endsection
