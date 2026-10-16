@extends('fertilitycare.layouts.app')

@section('title', 'Testimonials | FertilityCare Centers of Nigeria')
@section('description', 'Stories from women and couples who learned to read their cycle with the Creighton Model and found answers.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'What is FertilityCare', 'href' => '/what-is-fertilitycare'], ['label' => 'Testimonials']],
    'eyebrow' => 'Real stories',
    'title' => 'Testimonials',
    'lead' => 'Every story is different. These are shared experiences from people who learned to understand their cycle and found a path forward.',
  ])

  {{-- Featured quote --}}
  <section class="relative overflow-hidden bg-midnight text-white">
    <div class="bg-dots pointer-events-none absolute inset-0 opacity-40"></div>
    <div class="relative mx-auto max-w-4xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
      <span class="material-symbols-outlined icon-fill text-6xl text-sky/70">format_quote</span>
      <blockquote class="mt-4 font-display text-2xl font-semibold leading-snug sm:text-3xl">{{ setting('page.testimonials.body_001') }}</blockquote>
      <p class="mt-6 text-sky/90">{{ setting('page.testimonials.body_002') }}</p>
    </div>
  </section>

  {{-- Testimonial grid (Admin ▸ Testimonials) --}}
  <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      @forelse ($testimonials as $t)
        <figure class="reveal flex flex-col rounded-3xl border border-slate-100 bg-white p-7 shadow-soft">
          @if ($t->category)
            <span class="inline-flex w-fit items-center gap-1.5 rounded-full bg-mint/60 px-3 py-1 text-xs font-bold uppercase tracking-wide text-mintdeept">{{ $t->category }}</span>
          @endif
          <blockquote class="mt-5 flex-1 text-lg leading-relaxed text-slate-700">“{{ $t->quote }}”</blockquote>
          <figcaption class="mt-6 flex items-center gap-3">
            @if ($t->imageUrl())
              <img src="{{ $t->imageUrl() }}" alt="{{ $t->name }}" class="h-11 w-11 rounded-full object-cover" loading="lazy" />
            @else
              <span class="grid h-11 w-11 place-items-center rounded-full bg-primary/10 font-display font-bold text-primary">{{ $t->initial() }}</span>
            @endif
            <div>
              <p class="font-semibold text-ink">{{ $t->name }}</p>
              @if ($t->role || $t->location)
                <p class="text-sm text-slate-500">{{ $t->role }}{{ $t->location ? ($t->role ? ' · ' : '') . $t->location : '' }}</p>
              @endif
              <p class="mt-0.5 flex items-center gap-0.5 text-gold" aria-label="{{ $t->rating }} out of 5 stars">
                @for ($i = 0; $i < $t->rating; $i++)
                  <span class="material-symbols-outlined icon-fill text-[16px]">star</span>
                @endfor
              </p>
            </div>
          </figcaption>
        </figure>
      @empty
        <p class="text-slate-500">No testimonials published yet.</p>
      @endforelse
    </div>

    <p class="reveal mt-10 text-center text-sm text-slate-500">{{ setting('page.testimonials.body_003') }}</p>
  </section>

  @include('fertilitycare.partials.cta-band', [
    'heading' => 'Your story can be next',
    'sub' => 'Find a Practitioner near you and start reading your cycle.',
  ])
@endsection
