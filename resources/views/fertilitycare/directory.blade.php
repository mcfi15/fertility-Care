@extends('fertilitycare.layouts.app')

@section('title', 'Centers Directory | FertilityCare Centers of Nigeria')
@section('description', 'Find FertilityCare Centers and Practitioners across Nigeria, organized by country.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Our Directory', 'href' => '/directory'], ['label' => 'Centers Directory']],
    'eyebrow' => 'Our Directory',
    'title' => 'Centers Directory',
    'lead' => 'Centers and Practitioners across Nigeria, organized by country. Find the closest option and start your first session.',
  ])

  {{-- Country quick nav --}}
  <section class="border-b border-slate-100 bg-white/70 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
      <div class="flex flex-wrap gap-2">
        @foreach ($countries as $countryName => $centers)
          <a href="#{{ \Illuminate\Support\Str::slug($countryName) }}" class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-primary hover:bg-surface2 hover:text-primary">
            {{ $countryName }}
          </a>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Countries --}}
  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="space-y-14">
      @forelse ($countries as $countryName => $centers)
        <div id="{{ \Illuminate\Support\Str::slug($countryName) }}">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[28px] text-primary">public</span>
            <h2 class="font-display text-2xl font-bold text-ink sm:text-3xl">{{ $countryName }}</h2>
          </div>

          <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($centers as $center)
              <div class="reveal flex flex-col rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
                <span class="grid h-12 w-12 place-items-center rounded-2xl bg-skysoft text-primary-dark">
                  <span class="material-symbols-outlined">local_hospital</span>
                </span>
                <h3 class="mt-4 font-display font-bold text-ink">{{ $center->name }}</h3>
                @if ($center->city || $center->state)
                  <p class="mt-1 flex items-center gap-1.5 text-sm text-slate-500">
                    <span class="material-symbols-outlined text-[16px]">place</span>
                    {{ collect([$center->city, $center->state])->filter()->implode(', ') }}
                  </p>
                @endif
                @if ($center->address)
                  <p class="mt-1 text-sm text-slate-500">{{ $center->address }}</p>
                @endif
                @if ($center->hours)
                  <p class="mt-1 flex items-center gap-1.5 text-sm text-slate-500">
                    <span class="material-symbols-outlined text-[16px]">schedule</span> {{ $center->hours }}
                  </p>
                @endif
                @if ($center->phone || $center->email)
                  <p class="mt-1 flex flex-wrap gap-x-3 text-sm text-slate-500">
                    @if ($center->phone)<span class="inline-flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">call</span>{{ $center->phone }}</span>@endif
                    @if ($center->email)<a href="mailto:{{ $center->email }}" class="inline-flex items-center gap-1.5 text-primary">{{ $center->email }}</a>@endif
                  </p>
                @endif
                <a href="/contact" class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
                  Request information <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      @empty
        <p class="text-center text-slate-500">The directory is being updated. Please write to us and we will help you find the closest option.</p>
      @endforelse
    </div>

    {{-- Not listed --}}
    <div class="reveal mt-16 rounded-4xl bg-surface2 p-8 text-center sm:p-12">
      <span class="material-symbols-outlined text-[40px] text-primary">travel_explore</span>
      <h2 class="mt-4 font-display text-2xl font-bold text-ink">{{ setting('page.directory.body_001') }}</h2>
      <p class="mx-auto mt-3 max-w-2xl text-slate-600">{{ setting('page.directory.body_002') }}</p>
      <a href="/contact" class="mt-6 inline-flex items-center gap-2 rounded-full bg-primary px-7 py-3.5 font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primary-dark">
        Write to us <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
      </a>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band', [
    'heading' => 'Looking for a doctor instead?',
    'sub' => 'NaPro consultant doctors work with your chart to look for causes.',
    'cta' => 'See the doctors',
    'href' => '/directory/napro-doctors',
  ])
@endsection
