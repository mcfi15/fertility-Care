@extends('fertilitycare.layouts.app')

@section('title', 'NaPro consultant doctors | FertilityCare Centers of Nigeria')
@section('description', 'Consultant doctors certified in NaProTECHNOLOGY across Nigeria, specialists in restorative reproductive medicine.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Our Directory', 'href' => '/directory'], ['label' => 'NaPro consultant doctors']],
    'eyebrow' => 'Our Directory',
    'title' => 'NaPro consultant doctors',
    'lead' => 'Specialists who work with the cycle chart to look for the causes of reproductive and gynecological conditions, and to guide diagnosis and treatment.',
  ])

  {{-- Why a NaPro doctor --}}
  <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid gap-5 md:grid-cols-3">
      @foreach ([
        ['search', 'Looks for causes', 'Starts from the chart to understand what is happening in the cycle.'],
        ['handshake', 'Works with your Practitioner', 'The educational and medical parts stay connected.'],
        ['favorite', 'Restores where possible', 'Supports natural function rather than replacing it.'],
      ] as $c)
        <div class="reveal flex gap-4 rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
          <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-mint/60 text-mintdeept">
            <span class="material-symbols-outlined">{{ $c[0] }}</span>
          </span>
          <div>
            <h2 class="font-display font-bold text-ink">{{ $c[1] }}</h2>
            <p class="mt-1 text-sm text-slate-600">{{ $c[2] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  {{-- Doctor list --}}
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <h2 class="font-display text-2xl font-bold text-ink sm:text-3xl">{{ setting('page.napro-doctors.body_001') }}</h2>
        <a href="/find-support" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary">See all support options <span class="material-symbols-outlined text-[18px]">arrow_forward</span></a>
      </div>

      <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($doctors as $doc)
          <article class="reveal flex flex-col rounded-3xl border border-slate-100 bg-white p-6 shadow-soft">
            <div class="flex items-center gap-4">
              <span class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-primary/10 font-display text-lg font-bold text-primary">
                <span class="material-symbols-outlined">stethoscope</span>
              </span>
              <div>
                <h3 class="font-display font-bold text-ink">{{ $doc->name }}</h3>
                <p class="flex items-center gap-1.5 text-sm text-slate-500">
                  <span class="material-symbols-outlined text-[16px]">place</span>
                  {{ collect([$doc->city, $doc->country])->filter()->implode(', ') }}
                </p>
              </div>
            </div>
            @if ($doc->specialty)
              <p class="mt-4 flex-1 text-sm text-slate-600">{{ $doc->specialty }}</p>
            @endif
            @if ($doc->phone || $doc->email)
              <p class="mt-2 flex flex-wrap gap-x-3 text-sm text-slate-500">
                @if ($doc->phone)<span class="inline-flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">call</span>{{ $doc->phone }}</span>@endif
                @if ($doc->email)<a href="mailto:{{ $doc->email }}" class="inline-flex items-center gap-1.5 text-primary">{{ $doc->email }}</a>@endif
              </p>
            @endif
            <a href="/contact" class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
              Request information <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
          </article>
        @empty
          <p class="text-slate-500">The doctors directory is being updated. Please write to us and we will help you.</p>
        @endforelse
      </div>
    </div>
  </section>

  {{-- Note --}}
  <section class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="rounded-3xl border border-danger/20 bg-dangerbg/40 p-6">
      <p class="text-sm font-semibold text-danger">{{ setting('page.napro-doctors.body_002') }}</p>
    </div>
  </section>

  @include('fertilitycare.partials.cta-band', [
    'heading' => 'Not sure where to start?',
    'sub' => 'Begin with a Practitioner, who can guide you to medical care when needed.',
    'cta' => 'Open the directory',
    'href' => '/directory',
  ])
@endsection
