@extends('fertilitycare.layouts.app')

@section('title', 'What is a Practitioner? | FertilityCare Centers of Nigeria')
@section('description', 'A FertilityCare Practitioner is the trained professional who teaches the Creighton Model and accompanies each woman or couple over time.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'What is FertilityCare', 'href' => '/what-is-fertilitycare'], ['label' => 'What is a Practitioner']],
    'eyebrow' => 'Your guide',
    'title' => 'What is a Practitioner?',
    'lead' => 'A Practitioner is the trained professional who teaches you the Creighton Model and accompanies you session after session, so the method becomes a habit that genuinely helps you.',
  ])

  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="prose-fc reveal max-w-2xl">
        <h2>{{ setting('page.what-is-a-practitioner.body_001') }}</h2>
        <p>{{ setting('page.what-is-a-practitioner.body_002') }}</p>
        <p>{{ setting('page.what-is-a-practitioner.body_003') }}</p>

        <h2>{{ setting('page.what-is-a-practitioner.body_004') }}</h2>
        <ul>
          <li>{{ setting('page.what-is-a-practitioner.body_005') }}</li>
          <li>{{ setting('page.what-is-a-practitioner.body_006') }}</li>
          <li>{{ setting('page.what-is-a-practitioner.body_007') }}</li>
          <li>{{ setting('page.what-is-a-practitioner.body_008') }}</li>
          <li>{{ setting('page.what-is-a-practitioner.body_009') }}</li>
        </ul>
      </div>

      <div class="reveal space-y-6">
        <img src="{{ setting_url('page.what-is-a-practitioner.practitioner_image', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="A Practitioner guiding a woman through her cycle chart."
             class="aspect-[4/3] w-full rounded-4xl object-cover shadow-card" loading="lazy" />

        <div class="rounded-3xl bg-midnight p-7 text-white shadow-card">
          <h3 class="font-display text-xl font-bold">{{ setting('page.what-is-a-practitioner.body_010') }}</h3>
          <p class="mt-3 text-slate-200">{{ setting('page.what-is-a-practitioner.body_011') }}</p>
        </div>
      </div>
    </div>
  </section>

  {{-- What to expect --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal mx-auto max-w-2xl text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.what-is-a-practitioner.body_012') }}</h2>
      </div>

      <div class="mt-12 grid gap-6 md:grid-cols-3">
        @foreach ([
          ['school', 'Introduction', 'You learn the basics, receive your chart and materials, and ask anything.'],
          ['edit_note', 'Follow-ups', 'You bring your chart, review it together, and adjust the interpretation.'],
          ['trending_up', 'Growing autonomy', 'Over time you read your own cycle with confidence and only return as needed.'],
        ] as $c)
          <div class="reveal rounded-3xl border border-slate-100 bg-white p-7 shadow-soft">
            <span class="grid h-14 w-14 place-items-center rounded-2xl bg-mint/60 text-mintdeept">
              <span class="material-symbols-outlined text-[28px]">{{ $c[0] }}</span>
            </span>
            <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ $c[1] }}</h3>
            <p class="mt-2 text-slate-600">{{ $c[2] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Becoming / finding --}}
  <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="grid gap-6 md:grid-cols-2">
      <a href="/directory" class="reveal group flex flex-col justify-between rounded-4xl bg-primary p-8 text-white shadow-card transition hover:-translate-y-1">
        <div>
          <span class="material-symbols-outlined text-[40px] text-sky">location_on</span>
          <h3 class="mt-5 font-display text-2xl font-bold">{{ setting('page.what-is-a-practitioner.body_013') }}</h3>
          <p class="mt-3 text-white/90">{{ setting('page.what-is-a-practitioner.body_014') }}</p>
        </div>
        <span class="mt-8 inline-flex items-center gap-2 font-semibold">Open the directory <span class="material-symbols-outlined transition group-hover:translate-x-1">arrow_forward</span></span>
      </a>

      <a href="/professional-training" class="reveal group flex flex-col justify-between rounded-4xl border border-slate-100 bg-white p-8 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
        <div>
          <span class="material-symbols-outlined text-[40px] text-primary">school</span>
          <h3 class="mt-5 font-display text-2xl font-bold text-ink">{{ setting('page.what-is-a-practitioner.body_015') }}</h3>
          <p class="mt-3 text-slate-600">{{ setting('page.what-is-a-practitioner.body_016') }}</p>
        </div>
        <span class="mt-8 inline-flex items-center gap-2 font-semibold text-primary">See professional training <span class="material-symbols-outlined transition group-hover:translate-x-1">arrow_forward</span></span>
      </a>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band')
@endsection
