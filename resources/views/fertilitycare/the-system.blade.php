@extends('fertilitycare.layouts.app')

@section('title', 'Explore the full system | FertilityCare Centers of Nigeria')
@section('description', 'An overview of the whole FertilityCare system: the Creighton Model, the Practitioner, and NaProTECHNOLOGY working together.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'What is FertilityCare', 'href' => '/what-is-fertilitycare'], ['label' => 'Explore the full system']],
    'eyebrow' => 'The big picture',
    'title' => 'Explore the full system',
    'lead' => 'FertilityCare connects education, support, and medicine. Here is how the pieces fit together, from the first session to medical care.',
  ])

  {{-- The flow --}}
  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-3xl">
      <ol class="relative space-y-8 border-l-2 border-dashed border-primary/25 pl-8">
        @foreach ([
          ['Learn to observe', 'You learn the Creighton Model with a Practitioner and start charting your cycle day by day.', '/creighton-model', 'monitoring'],
          ['Build your chart', 'Your daily records form an objective picture of your cycle over time.', '/creighton-model', 'show_chart'],
          ['Receive support', 'Your Practitioner accompanies you, answers questions, and helps you interpret the chart.', '/what-is-a-practitioner', 'support_agent'],
          ['Access medical care', 'If needed, a NaPro consultant doctor uses the chart to look for causes and guide treatment.', '/naprotechnology', 'biotech'],
        ] as $i => $step)
          <li class="reveal relative">
            <span class="absolute -left-[41px] grid h-9 w-9 place-items-center rounded-full bg-primary text-white shadow-soft">
              <span class="material-symbols-outlined text-[20px]">{{ $step[3] }}</span>
            </span>
            <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
              <span class="text-xs font-bold uppercase tracking-widest text-teal">Step {{ $i + 1 }}</span>
              <h2 class="mt-1 font-display text-xl font-bold text-ink">{{ $step[0] }}</h2>
              <p class="mt-2 text-slate-600">{{ $step[1] }}</p>
              <a href="{{ $step[2] }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">Read more <span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>
            </div>
          </li>
        @endforeach
      </ol>
    </div>
  </section>

  {{-- Quick links --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal mx-auto max-w-2xl text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.the-system.body_001') }}</h2>
        <p class="mt-4 text-lg text-slate-600">{{ setting('page.the-system.body_002') }}</p>
      </div>

      <div class="mt-12 grid gap-6 md:grid-cols-3">
        @foreach ([
          ['/creighton-model', 'monitoring', 'Creighton Model', 'How the cycle is observed and charted.'],
          ['/what-is-a-practitioner', 'support_agent', 'What is a Practitioner', 'Who teaches and accompanies you.'],
          ['/naprotechnology', 'biotech', 'NaProTECHNOLOGY', 'The medical science that seeks causes.'],
          ['/directory', 'location_on', 'Directory', 'Centers and Practitioners by country.'],
          ['/faq', 'help', 'FAQ', 'The most common questions, answered.'],
          ['/about-us', 'groups', 'About us', 'The Nigerian network behind it all.'],
        ] as $c)
          <a href="{{ $c[0] }}" class="reveal group flex flex-col rounded-3xl border border-slate-100 bg-white p-7 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
            <span class="grid h-14 w-14 place-items-center rounded-2xl bg-skysoft text-primary-dark transition group-hover:bg-primary group-hover:text-white">
              <span class="material-symbols-outlined text-[28px]">{{ $c[1] }}</span>
            </span>
            <h3 class="mt-5 font-display text-lg font-bold text-ink">{{ $c[2] }}</h3>
            <p class="mt-2 flex-1 text-slate-600">{{ $c[3] }}</p>
            <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-primary">Open <span class="material-symbols-outlined text-[20px] transition group-hover:translate-x-1">arrow_forward</span></span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band')
@endsection
