@extends('fertilitycare.layouts.app')

@section('title', 'Find support | FertilityCare Centers of Nigeria')
@section('description', 'All the ways to find support: the Centers directory, NaPro consultant doctors, and testimonials.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Our Directory', 'href' => '/directory'], ['label' => 'Find support']],
    'eyebrow' => 'Where to start',
    'title' => 'See all support options',
    'lead' => 'Depending on what you need, here are the different ways to connect with the network across Nigeria.',
  ])

  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-6 lg:grid-cols-3">
      <a href="/directory" class="reveal group flex flex-col justify-between rounded-4xl border border-slate-100 bg-white p-8 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
        <div>
          <span class="grid h-16 w-16 place-items-center rounded-2xl bg-skysoft text-primary-dark transition group-hover:bg-primary group-hover:text-white">
            <span class="material-symbols-outlined text-[30px]">location_on</span>
          </span>
          <h2 class="mt-6 font-display text-2xl font-bold text-ink">{{ setting('page.find-support.body_001') }}</h2>
          <p class="mt-3 text-slate-600">{{ setting('page.find-support.body_002') }}</p>
        </div>
        <span class="mt-8 inline-flex items-center gap-2 font-semibold text-primary">Open the directory <span class="material-symbols-outlined transition group-hover:translate-x-1">arrow_forward</span></span>
      </a>

      <a href="/directory/napro-doctors" class="reveal group flex flex-col justify-between rounded-4xl border border-slate-100 bg-white p-8 shadow-soft transition hover:-translate-y-1 hover:shadow-card">
        <div>
          <span class="grid h-16 w-16 place-items-center rounded-2xl bg-mint/60 text-mintdeept transition group-hover:bg-mintdeept group-hover:text-white">
            <span class="material-symbols-outlined text-[30px]">medical_services</span>
          </span>
          <h2 class="mt-6 font-display text-2xl font-bold text-ink">{{ setting('page.find-support.body_003') }}</h2>
          <p class="mt-3 text-slate-600">{{ setting('page.find-support.body_004') }}</p>
        </div>
        <span class="mt-8 inline-flex items-center gap-2 font-semibold text-primary">See the doctors <span class="material-symbols-outlined transition group-hover:translate-x-1">arrow_forward</span></span>
      </a>

      <a href="/testimonials" class="reveal group flex flex-col justify-between rounded-4xl bg-midnight p-8 text-white shadow-card transition hover:-translate-y-1">
        <div>
          <span class="grid h-16 w-16 place-items-center rounded-2xl bg-white/10 text-sky transition group-hover:bg-sky group-hover:text-midnight">
            <span class="material-symbols-outlined text-[30px]">favorite</span>
          </span>
          <h2 class="mt-6 font-display text-2xl font-bold">{{ setting('page.find-support.body_005') }}</h2>
          <p class="mt-3 text-slate-200">{{ setting('page.find-support.body_006') }}</p>
        </div>
        <span class="mt-8 inline-flex items-center gap-2 font-semibold text-sky">Read stories <span class="material-symbols-outlined transition group-hover:translate-x-1">arrow_forward</span></span>
      </a>
    </div>
  </section>

  {{-- Not in your city --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-4xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
      <span class="material-symbols-outlined text-[44px] text-primary">travel_explore</span>
      <h2 class="mt-4 font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.find-support.body_007') }}</h2>
      <p class="mt-4 text-lg text-slate-600">{{ setting('page.find-support.body_008') }}</p>
      <a href="/contact" class="mt-8 inline-flex items-center gap-2 rounded-full bg-primary px-7 py-4 font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primary-dark">
        Write to us <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
      </a>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band')
@endsection
