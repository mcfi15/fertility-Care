{{--
  Reusable final call-to-action band (same as the homepage's closing section).
  Optional overrides:
    @include('fertilitycare.partials.cta-band', [
        'heading' => '...', 'sub' => '...', 'cta' => 'Take the first step', 'href' => '/directory',
    ])
--}}
@php
  // Falls back to the editable global block (Admin ▸ Site Settings) unless a
  // page passes its own values.
  $heading = $heading ?? setting('blocks.cta_heading');
  $sub     = $sub     ?? setting('blocks.cta_sub');
  $cta     = $cta     ?? setting('blocks.cta_text');
  $href    = $href    ?? setting('blocks.cta_href');
@endphp

<section class="relative overflow-hidden bg-gradient-to-br from-primary via-primary-dark to-midnight text-white">
  <div class="bg-dots pointer-events-none absolute inset-0 opacity-40"></div>
  <div class="relative mx-auto max-w-4xl px-4 py-20 text-center sm:px-6 lg:px-8">
    <h2 class="reveal font-display text-3xl font-extrabold leading-tight tracking-tight sm:text-5xl">{{ $heading }}</h2>
    <p class="reveal mt-5 text-xl text-white/90">{{ $sub }}</p>
    <div class="reveal mt-9">
      <a href="{{ $href }}" class="inline-flex items-center gap-2 rounded-full bg-white px-8 py-4 text-base font-bold text-primary shadow-card transition hover:-translate-y-0.5 hover:bg-mint">
        {{ $cta }} <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
      </a>
    </div>
  </div>
</section>
