@extends('fertilitycare.layouts.app')

@section('title', 'What is FertilityCare? | FertilityCare Centers of Nigeria')
@section('description', 'FertilityCare is an educational and medical system that teaches women and couples to know, understand, and care for their reproductive health.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs'  => [['label' => 'What is FertilityCare']],
    'eyebrow' => 'The system',
    'title'   => 'What is FertilityCare?',
    'lead'    => 'FertilityCare is an educational and medical system that teaches women and couples to know, understand, and care for their reproductive health — with science, respect, and personalized support.',
  ])

  {{-- Intro --}}
  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="prose-fc reveal max-w-2xl">
        <p>
          FertilityCare is not a single treatment or a one-time appointment. It is a <strong>system</strong> that
          combines education about the cycle with medical care. It starts from a simple idea: a woman's cycle is a
          continuous source of information about her health, and learning to read it changes the quality of the care she
          receives.
        </p>
        <p>
          The system is made up of three parts that work together: the <strong>Creighton Model</strong> (the educational
          part), <strong>NaProTECHNOLOGY®</strong> (the medical part), and the <strong>Practitioner</strong> who teaches
          and accompanies each woman or couple.
        </p>
        <p>{{ setting('page.what-is-fertilitycare.body_001') }}</p>
      </div>

      <div class="reveal rounded-4xl bg-midnight p-8 text-white shadow-card sm:p-10">
        <span class="material-symbols-outlined icon-fill text-5xl text-sky/80">format_quote</span>
        <p class="mt-4 font-display text-xl font-semibold leading-snug">{{ setting('page.what-is-fertilitycare.body_002') }}</p>
        <p class="mt-4 text-sky/90">{{ setting('page.what-is-fertilitycare.body_003') }}</p>
      </div>
    </div>
  </section>

  {{-- Three pillars --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal mx-auto max-w-2xl text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.what-is-fertilitycare.body_004') }}</h2>
        <p class="mt-4 text-lg text-slate-600">{{ setting('page.what-is-fertilitycare.body_005') }}</p>
      </div>

      <div class="mt-12 grid gap-6 md:grid-cols-3">
        <a href="/creighton-model" class="reveal group flex flex-col rounded-3xl border border-slate-100 bg-white p-7 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
          <span class="grid h-14 w-14 place-items-center rounded-2xl bg-skysoft text-primary-dark transition group-hover:bg-primary group-hover:text-white">
            <span class="material-symbols-outlined text-[28px]">monitoring</span>
          </span>
          <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.what-is-fertilitycare.body_006') }}</h3>
          <p class="mt-2 flex-1 text-slate-600">{{ setting('page.what-is-fertilitycare.body_007') }}</p>
          <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-primary">Learn more <span class="material-symbols-outlined text-[20px] transition group-hover:translate-x-1">arrow_forward</span></span>
        </a>

        <a href="/what-is-a-practitioner" class="reveal group flex flex-col rounded-3xl border border-slate-100 bg-white p-7 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
          <span class="grid h-14 w-14 place-items-center rounded-2xl bg-mint/60 text-mintdeept transition group-hover:bg-mintdeept group-hover:text-white">
            <span class="material-symbols-outlined text-[28px]">support_agent</span>
          </span>
          <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.what-is-fertilitycare.body_008') }}</h3>
          <p class="mt-2 flex-1 text-slate-600">{{ setting('page.what-is-fertilitycare.body_009') }}</p>
          <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-primary">Learn more <span class="material-symbols-outlined text-[20px] transition group-hover:translate-x-1">arrow_forward</span></span>
        </a>

        <a href="/naprotechnology" class="reveal group flex flex-col rounded-3xl border border-slate-100 bg-white p-7 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
          <span class="grid h-14 w-14 place-items-center rounded-2xl bg-gold/50 text-[#534600] transition group-hover:bg-[#534600] group-hover:text-gold">
            <span class="material-symbols-outlined text-[28px]">biotech</span>
          </span>
          <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.what-is-fertilitycare.body_010') }}</h3>
          <p class="mt-2 flex-1 text-slate-600">{{ setting('page.what-is-fertilitycare.body_011') }}</p>
          <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-primary">Learn more <span class="material-symbols-outlined text-[20px] transition group-hover:translate-x-1">arrow_forward</span></span>
        </a>
      </div>
    </div>
  </section>

  {{-- What it's for --}}
  <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="reveal">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.what-is-fertilitycare.body_012') }}</h2>
        <ul class="mt-8 space-y-5">
          @foreach ([
            ['Cycle education', 'Understand what is normal for you and recognize when something changes.'],
            ['Reproductive health', 'Care for the cycle across different stages of life, not only when seeking a pregnancy.'],
            ['Fertility', 'Learn to identify fertile and infertile times according to the system\'s criteria.'],
            ['Symptoms and conditions', 'Provide the doctor with objective data on pain, irregular bleeding, or altered cycles.'],
            ['Couples', 'Make decisions together with shared, reliable information.'],
          ] as $row)
            <li class="flex gap-4">
              <span class="material-symbols-outlined icon-fill mt-0.5 text-[26px] text-primary">check_circle</span>
              <div>
                <h3 class="font-display text-lg font-bold text-ink">{{ $row[0] }}</h3>
                <p class="mt-1 text-slate-600">{{ $row[1] }}</p>
              </div>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="reveal">
        <img src="{{ setting_url('page.what-is-fertilitycare.story_image', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="A couple charting a cycle with the Creighton Model materials."
             class="aspect-[4/3] w-full rounded-4xl object-cover shadow-card" loading="lazy" />
      </div>
    </div>
  </section>

  {{-- Related links --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ([
          ['/the-system', 'Explore the full system', 'See how the parts connect'],
          ['/faq', 'Frequently asked questions', 'Answers before you start'],
          ['/testimonials', 'Testimonials', 'Stories from real people'],
          ['/about-us', 'About us', 'Who we are and what guides us'],
        ] as $card)
          <a href="{{ $card[0] }}" class="reveal group rounded-3xl border border-slate-100 bg-white p-6 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
            <h3 class="font-display text-lg font-bold text-primary">{{ $card[1] }}</h3>
            <p class="mt-1 text-sm text-slate-500">{{ $card[2] }}</p>
            <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">Open <span class="material-symbols-outlined text-[18px] transition group-hover:translate-x-1">arrow_forward</span></span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band')
@endsection
