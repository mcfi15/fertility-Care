{{--
  Reusable inner-page hero: breadcrumb + eyebrow + H1 + lead, with an optional
  full-width image below. Pass variables with @include:
    @include('fertilitycare.partials.page-hero', [
        'crumbs' => [['label' => 'Home', 'href' => '/'], ['label' => '...']],
        'eyebrow' => 'Optional',
        'title' => 'Page title',
        'lead' => 'Lead paragraph.',
        'image' => '/fertilitycare-replica/assets/x.webp',
        'imageAlt' => '...',
    ])
--}}
@php
  $crumbs   = $crumbs   ?? [];
  $pageKey  = setting_page_key();          // e.g. "page.about-us", or null

  // Values edited in Admin ▸ Page Content win over the page template's copy.
  $eyebrow  = $pageKey ? setting("$pageKey.eyebrow", $eyebrow ?? null) : ($eyebrow ?? null);
  $title    = $pageKey ? setting("$pageKey.title", $title ?? '') : ($title ?? '');
  $lead     = $pageKey ? setting("$pageKey.lead", $lead ?? null) : ($lead ?? null);
  $image    = $pageKey ? setting_url("$pageKey.image", $image ?? null) : ($image ?? null);
  $imageAlt = $pageKey ? setting("$pageKey.imageAlt", $imageAlt ?? '') : ($imageAlt ?? '');
@endphp

<section class="relative overflow-hidden bg-gradient-to-b from-skysoft/50 via-surface to-surface">
  <div class="bg-dots pointer-events-none absolute inset-0 opacity-[0.35] [mask-image:radial-gradient(70%_60%_at_50%_0%,#000_10%,transparent_75%)]"></div>
  <div class="relative mx-auto max-w-7xl px-4 pb-10 pt-8 sm:px-6 lg:px-8 lg:pb-14 lg:pt-12">

    {{-- Breadcrumbs --}}
    <nav aria-label="Breadcrumb">
      <ol class="flex flex-wrap items-center gap-1.5 text-sm text-slate-500">
        <li><a href="/" class="transition hover:text-primary">Home</a></li>
        @foreach ($crumbs as $i => $crumb)
          <li aria-hidden="true" class="material-symbols-outlined text-[16px] text-slate-400">chevron_right</li>
          <li>
            @if (!empty($crumb['href']) && $i !== array_key_last($crumbs))
              <a href="{{ $crumb['href'] }}" class="transition hover:text-primary">{{ $crumb['label'] }}</a>
            @else
              <span class="font-semibold text-primary">{{ $crumb['label'] }}</span>
            @endif
          </li>
        @endforeach
      </ol>
    </nav>

    @if ($eyebrow)
      <p class="mt-8 font-display text-sm font-bold uppercase tracking-widest text-teal">{{ $eyebrow }}</p>
    @endif

    <h1 class="mt-4 max-w-4xl font-display text-3xl font-extrabold leading-[1.12] tracking-tight text-ink sm:text-4xl lg:text-5xl">
      {{ $title }}
    </h1>

    @if ($lead)
      <p class="mt-5 max-w-3xl text-lg leading-relaxed text-slate-600">{{ $lead }}</p>
    @endif
  </div>
</section>

@if ($image)
  <div class="mx-auto -mt-2 max-w-7xl px-4 sm:px-6 lg:px-8">
    <img src="{{ $image }}" alt="{{ $imageAlt }}"
         class="aspect-[16/9] w-full rounded-4xl object-cover shadow-card ring-1 ring-black/5"
         loading="eager" />
  </div>
@endif
