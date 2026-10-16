@extends('fertilitycare.layouts.app')

@section('title', 'About us | FertilityCare Centers of Nigeria')
@section('description', 'Who we are, the Nigerian network, and the philosophy that guides FertilityCare Centers of Nigeria.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'What is FertilityCare', 'href' => '/what-is-fertilitycare'], ['label' => 'About us']],
    'eyebrow' => 'Who we are',
    'title' => 'About us',
    'lead' => 'We are a Nigerian network of professionals who teach the Creighton Model and support women and couples in caring for their reproductive health with science, respect, and closeness.',
  ])

  {{-- Mission --}}
  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="prose-fc reveal max-w-2xl">
        <h2>{{ setting('page.about-us.body_001') }}</h2>
        <p>{{ setting('page.about-us.body_002') }}</p>
        <h2>{{ setting('page.about-us.body_003') }}</h2>
        <p>{{ setting('page.about-us.body_004') }}</p>
        <p>{{ setting('page.about-us.body_005') }}</p>
      </div>

      <div class="reveal space-y-6">
        <img src="{{ setting_url('page.about-us.story_image', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="A couple and their Practitioner reviewing a cycle chart."
             class="aspect-[4/3] w-full rounded-4xl object-cover shadow-card" loading="lazy" />
        <div class="grid grid-cols-2 gap-6">
          <div class="rounded-3xl bg-surface2 p-6 text-center">
            <p class="font-display text-4xl font-extrabold text-primary">{{ setting('page.about-us.body_006') }}</p>
            <p class="mt-1 text-sm text-slate-500">{{ setting('page.about-us.body_007') }}</p>
          </div>
          <div class="rounded-3xl bg-surface2 p-6 text-center">
            <p class="font-display text-4xl font-extrabold text-primary">+</p>
            <p class="mt-1 text-sm text-slate-500">{{ setting('page.about-us.body_008') }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Values --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal mx-auto max-w-2xl text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.about-us.body_009') }}</h2>
      </div>
      <div class="mt-12 grid gap-6 md:grid-cols-3">
        @foreach ([
          ['science', 'Science', 'Standardized, evidence-based methods — never guesswork.'],
          ['volunteer_activism', 'Respect', 'For the woman, the couple, and every path already traveled.'],
          ['groups', 'Closeness', 'Personal accompaniment, session after session, over time.'],
        ] as $v)
          <div class="reveal rounded-3xl border border-slate-100 bg-white p-7 shadow-soft">
            <span class="grid h-14 w-14 place-items-center rounded-2xl bg-mint/60 text-mintdeept">
              <span class="material-symbols-outlined text-[28px]">{{ $v[0] }}</span>
            </span>
            <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ $v[1] }}</h3>
            <p class="mt-2 text-slate-600">{{ $v[2] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Network / CTA --}}
  <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="reveal">
        <img src="{{ setting_url('page.about-us.network_image', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="The team of consultant doctors of the Nigerian network."
             class="aspect-[5/4] w-full rounded-4xl object-cover shadow-card" loading="lazy" />
      </div>
      <div class="reveal">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.about-us.body_010') }}</h2>
        <p class="mt-5 text-lg leading-relaxed text-slate-600">{{ setting('page.about-us.body_011') }}</p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="/directory" class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-6 py-3.5 font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primary-dark">
            Explore the directory <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </a>
          <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-primary/15 bg-white px-6 py-3.5 font-semibold text-primary transition hover:border-primary/40 hover:bg-surface2">
            Write to us
          </a>
        </div>
      </div>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band')
@endsection
