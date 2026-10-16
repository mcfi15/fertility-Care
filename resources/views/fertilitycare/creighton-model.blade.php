@extends('fertilitycare.layouts.app')

@section('title', 'The Creighton Model | FertilityCare Centers of Nigeria')
@section('description', 'The Creighton Model teaches you to observe and chart the biomarkers of your cycle with standardized criteria and personalized follow-up.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'What is FertilityCare', 'href' => '/what-is-fertilitycare'], ['label' => 'Creighton Model']],
    'eyebrow' => 'The educational part',
    'title' => 'The Creighton Model',
    'lead' => 'The Creighton Model teaches you to observe and record the signs your body shows every day, so you can understand your cycle and make decisions with reliable information.',
  ])

  {{-- What it observes --}}
  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="reveal">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.creighton-model.body_001') }}</h2>
        <p class="mt-5 text-lg leading-relaxed text-slate-600">{{ setting('page.creighton-model.body_002') }}</p>

        <div class="mt-8 grid gap-4 sm:grid-cols-2">
          @foreach ([
            ['water_drop', 'Cervical mucus', 'The most important sign: its presence and quality change throughout the cycle.'],
            ['bloodtype', 'Bleeding', 'The pattern, amount, and duration of bleeding across the cycle.'],
            ['calendar_month', 'The pattern over time', 'Day-by-day records that reveal the shape of your own cycle.'],
            ['symptoms', 'Other signs', 'Symptoms such as pain or discomfort, recorded alongside the chart.'],
          ] as $b)
            <div class="reveal flex gap-4 rounded-3xl border border-slate-100 bg-white p-5 shadow-soft">
              <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-skysoft text-primary-dark">
                <span class="material-symbols-outlined">{{ $b[0] }}</span>
              </span>
              <div>
                <h3 class="font-display font-bold text-ink">{{ $b[1] }}</h3>
                <p class="mt-1 text-sm text-slate-600">{{ $b[2] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="reveal">
        <img src="{{ setting_url('page.creighton-model.chart_image', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="A cycle chart being reviewed during a Creighton Model follow-up session."
             class="aspect-[4/3] w-full rounded-4xl object-cover shadow-card" loading="lazy" />
      </div>
    </div>
  </section>

  {{-- How it works --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal mx-auto max-w-2xl text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.creighton-model.body_003') }}</h2>
        <p class="mt-4 text-lg text-slate-600">{{ setting('page.creighton-model.body_004') }}</p>
      </div>

      <ol class="mt-12 grid gap-6 md:grid-cols-3">
        @foreach ([
          ['1', 'Introductory session', 'You meet your Practitioner, learn the basics of the system, and receive your chart and materials.'],
          ['2', 'Daily observation', 'You record your biomarkers each day using standardized criteria, following the system\'s simple rules.'],
          ['3', 'Follow-up sessions', 'You review the chart with your Practitioner, resolve questions, and adjust the interpretation as needed.'],
        ] as $step)
          <li class="reveal rounded-3xl border border-slate-100 bg-white p-7 shadow-soft">
            <span class="grid h-12 w-12 place-items-center rounded-full bg-primary font-display text-lg font-bold text-white">{{ $step[0] }}</span>
            <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ $step[1] }}</h3>
            <p class="mt-2 text-slate-600">{{ $step[2] }}</p>
          </li>
        @endforeach
      </ol>
    </div>
  </section>

  {{-- Is it for me / not a calendar method --}}
  <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="reveal rounded-4xl bg-midnight p-8 text-white shadow-card sm:p-10">
        <h2 class="font-display text-2xl font-bold sm:text-3xl">{{ setting('page.creighton-model.body_005') }}</h2>
        <p class="mt-5 text-slate-200">{{ setting('page.creighton-model.body_006') }}</p>
      </div>

      <div class="reveal">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.creighton-model.body_007') }}</h2>
        <p class="mt-5 text-lg text-slate-600">{{ setting('page.creighton-model.body_008') }}</p>
        <ul class="mt-6 space-y-3 text-slate-600">
          @foreach ([
            'Women who want to understand their cycle.',
            'Couples making decisions about fertility.',
            'Women seeking answers for pain or irregular cycles.',
            'Anyone who wants objective information to share with their doctor.',
          ] as $li)
            <li class="flex gap-3"><span class="material-symbols-outlined icon-fill mt-0.5 text-primary">check_circle</span><span>{{ $li }}</span></li>
          @endforeach
        </ul>
      </div>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band', [
    'heading' => 'Find a Practitioner near you',
    'sub' => 'Start charting your cycle with personalized support.',
    'cta' => 'Open the directory',
  ])
@endsection
