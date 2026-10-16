@extends('fertilitycare.layouts.app')

@section('title', 'FertilityCare Centers of Nigeria | Creighton Model & NaProTECHNOLOGY')
@section('description', 'We teach women and couples to read the signs of their cycle with the Creighton Model, and we support their reproductive health alongside a network of professionals in restorative medicine across Nigeria.')

@section('content')

@section('content')

  <!-- =====================================================================
       1) HERO — headline, sub-copy, dual CTA, evidence badge + media
       ===================================================================== -->
  <section class="relative overflow-hidden bg-gradient-to-b from-skysoft/50 via-surface to-surface">
    <div class="bg-dots pointer-events-none absolute inset-0 opacity-[0.35] [mask-image:radial-gradient(70%_60%_at_50%_0%,#000_10%,transparent_75%)]"></div>
    <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-4 py-14 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">

      <!-- Copy -->
      <div class="reveal">
        <!-- Trust / evidence badge -->
        <div class="mb-6 flex flex-wrap items-center gap-3">
          <span class="inline-flex items-center gap-2 rounded-full bg-white px-3.5 py-1.5 text-sm font-semibold text-primary shadow-soft ring-1 ring-primary/10">
            <span class="material-symbols-outlined icon-fill text-[18px] text-teal">verified_user</span>
            {{ setting('page.index.badge_primary') }}
          </span>
          <span class="inline-flex items-center gap-2 rounded-full bg-mint/60 px-3.5 py-1.5 text-sm font-semibold text-mintdeept">
            <span class="material-symbols-outlined text-[18px]">science</span>
            {{ setting('page.index.badge_secondary') }}
          </span>
        </div>

        <h1 class="font-display text-4xl font-extrabold leading-[1.1] tracking-tight text-ink sm:text-5xl lg:text-6xl">
          {{ setting('page.index.hero_title') }} <span class="text-primary">{{ setting('page.index.hero_title_accent') }}</span>
        </h1>

        <p class="mt-6 max-w-xl text-lg leading-relaxed text-slate-600">{{ setting('page.index.body_001') }}</p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
          <a href="{{ setting('page.index.hero_cta_primary_href') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-7 py-4 text-base font-semibold text-white shadow-card transition hover:-translate-y-0.5 hover:bg-primary-dark">
            {{ setting('page.index.hero_cta_primary_text') }} <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </a>
          <a href="{{ setting('page.index.hero_cta_secondary_href') }}" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-primary/15 bg-white px-7 py-4 text-base font-semibold text-primary transition hover:border-primary/40 hover:bg-surface2">
            <span class="material-symbols-outlined text-[20px]">favorite</span> {{ setting('page.index.hero_cta_secondary_text') }}
          </a>
        </div>
      </div>

      <!-- Media: hero video (poster fallback) -->
      <div class="reveal relative">
        <div class="relative aspect-[4/3] overflow-hidden rounded-4xl shadow-card ring-1 ring-black/5 lg:aspect-[5/4]">
          <img class="h-full w-full object-cover" 
     src="{{ setting_url('page.index.hero_media_image', '/fertilitycare-replica/assets/placeholder.svg') }}" 
     alt="{{ setting('page.index.hero_media_alt') }}" />
          <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-midnight/25 via-transparent to-transparent"></div>
        </div>

        <!-- Floating stat card -->
        <div class="absolute -bottom-5 left-4 flex items-center gap-3 rounded-2xl bg-white/95 px-4 py-3 shadow-card backdrop-blur sm:left-6">
          <span class="grid h-11 w-11 place-items-center rounded-full bg-mint/70 text-mintdeept">
            <span class="material-symbols-outlined">public</span>
          </span>
          <div class="leading-tight">
            <p class="font-display text-lg font-bold text-ink">{{ setting('page.index.body_002') }}</p>
            <p class="text-xs text-slate-500">{{ setting('page.index.body_003') }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =====================================================================
       2) PATHWAYS — "What brings you here?" five entry cards
       ===================================================================== -->
  <section id="start" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="reveal mx-auto max-w-2xl text-center">
      <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.index.body_004') }}</h2>
      <p class="mt-4 text-lg text-slate-600">{{ setting('page.index.body_005') }}</p>
    </div>

    <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Card 1 — Creighton Method -->
      <a href="/creighton-model" class="reveal group flex flex-col rounded-3xl border border-slate-100 bg-white p-7 shadow-soft transition hover:-translate-y-1 hover:border-primary/20 hover:shadow-card">
        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-skysoft text-primary-dark transition group-hover:bg-primary group-hover:text-white">
          <span class="material-symbols-outlined text-[28px]">monitoring</span>
        </span>
        <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.index.body_006') }}</h3>
        <p class="mt-2 flex-1 text-slate-600">{{ setting('page.index.body_007') }}</p>
        <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-primary">
          Explore <span class="material-symbols-outlined text-[20px] transition group-hover:translate-x-1">arrow_forward</span>
        </span>
      </a>

      <!-- Card 2 — NaProTECHNOLOGY -->
      <a href="/naprotechnology" class="reveal group flex flex-col rounded-3xl border border-slate-100 bg-white p-7 shadow-soft transition hover:-translate-y-1 hover:border-primary/20 hover:shadow-card">
        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-mint/60 text-mintdeept transition group-hover:bg-mintdeept group-hover:text-white">
          <span class="material-symbols-outlined text-[28px]">biotech</span>
        </span>
        <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.index.body_008') }}</h3>
        <p class="mt-2 flex-1 text-slate-600">{{ setting('page.index.body_009') }}</p>
        <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-primary">
          Explore <span class="material-symbols-outlined text-[20px] transition group-hover:translate-x-1">arrow_forward</span>
        </span>
      </a>

      <!-- Card 3 — Find support (featured, dark) -->
      <a href="/find-support" class="reveal group flex flex-col rounded-3xl bg-midnight p-7 text-white shadow-card transition hover:-translate-y-1">
        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-white/10 text-sky transition group-hover:bg-sky group-hover:text-midnight">
          <span class="material-symbols-outlined text-[28px]">location_on</span>
        </span>
        <h3 class="mt-5 font-display text-xl font-bold">{{ setting('page.index.body_010') }}</h3>
        <p class="mt-2 text-slate-200">{{ setting('page.index.body_011') }}</p>
        <p class="mt-3 text-sm text-sky/90">{{ setting('page.index.body_012') }}</p>
        <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-sky">
          Explore <span class="material-symbols-outlined text-[20px] transition group-hover:translate-x-1">arrow_forward</span>
        </span>
      </a>

      <!-- Card 4 — Professional training -->
      <a href="/professional-training" class="reveal group flex flex-col rounded-3xl border border-slate-100 bg-white p-7 shadow-soft transition hover:-translate-y-1 hover:border-primary/20 hover:shadow-card">
        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-gold/50 text-[#534600] transition group-hover:bg-[#534600] group-hover:text-gold">
          <span class="material-symbols-outlined text-[28px]">school</span>
        </span>
        <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.index.body_013') }}</h3>
        <p class="mt-2 flex-1 text-slate-600">{{ setting('page.index.body_014') }}</p>
        <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-primary">
          Explore <span class="material-symbols-outlined text-[20px] transition group-hover:translate-x-1">arrow_forward</span>
        </span>
      </a>

      <!-- Card 5 — Continuing Education -->
      <a href="/login" class="reveal group flex flex-col rounded-3xl border border-slate-100 bg-surface2 p-7 shadow-soft transition hover:-translate-y-1 hover:border-primary/20">
        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-white text-primary shadow-soft transition group-hover:bg-primary group-hover:text-white">
          <span class="material-symbols-outlined text-[28px]">lock_open</span>
        </span>
        <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.index.body_015') }}</h3>
        <p class="mt-2 flex-1 text-slate-600">{{ setting('page.index.body_016') }}</p>
        <span class="mt-6 inline-flex items-center gap-1.5 font-semibold text-primary">
          Explore <span class="material-symbols-outlined text-[20px] transition group-hover:translate-x-1">arrow_forward</span>
        </span>
      </a>
    </div>
  </section>

  <!-- =====================================================================
       3) QUOTE — founder testimonial with supporting imagery
       ===================================================================== -->
  <section class="relative overflow-hidden bg-midnight text-white">
    <div class="bg-dots pointer-events-none absolute inset-0 opacity-40"></div>
    <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">

      <figure class="reveal">
        <span class="material-symbols-outlined icon-fill text-6xl text-sky/70">format_quote</span>
        <blockquote class="mt-4 font-display text-2xl font-semibold leading-snug text-white sm:text-3xl">{{ setting('page.index.body_017') }}</blockquote>
        <figcaption class="mt-6 flex items-center gap-3">
          <span class="h-px w-10 bg-sky/60"></span>
          <div>
            <p class="font-semibold text-white">{{ setting('page.index.body_018') }}</p>
            <p class="text-sm text-sky/90">{{ setting('page.index.body_019') }}</p>
          </div>
        </figcaption>
      </figure>

      <div class="reveal grid grid-cols-2 gap-4">
        <img src="{{ setting_url('page.index.quote_image_1', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="A couple charting their cycle with the Creighton Model materials at their kitchen table."
             class="col-span-1 h-64 w-full rounded-3xl object-cover shadow-card sm:h-80" loading="lazy" />
        <img src="{{ setting_url('page.index.quote_image_2', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="A medical consultation with a specialist certified in NaProTECHNOLOGY, in a warm and professional setting."
             class="col-span-1 mt-8 h-64 w-full rounded-3xl object-cover shadow-card sm:h-80" loading="lazy" />
      </div>
    </div>
  </section>

  <!-- =====================================================================
       4) APPROACH — "Where others see a cycle..."
       ===================================================================== -->
  <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
      <div class="reveal">
        <p class="font-display text-sm font-bold uppercase tracking-widest text-teal">{{ setting('page.index.body_020') }}</p>
        <h2 class="mt-3 font-display text-3xl font-bold leading-tight tracking-tight text-ink sm:text-4xl">{{ setting('page.index.body_021') }}</h2>
        <p class="mt-5 text-lg leading-relaxed text-slate-600">{{ setting('page.index.body_022') }}</p>

        <ul class="mt-8 space-y-5">
          <li class="flex gap-4">
            <span class="material-symbols-outlined icon-fill mt-0.5 text-[26px] text-primary">check_circle</span>
            <div>
              <h3 class="font-display text-lg font-bold text-ink">{{ setting('page.index.body_023') }}</h3>
              <p class="mt-1 text-slate-600">{{ setting('page.index.body_024') }}</p>
            </div>
          </li>
          <li class="flex gap-4">
            <span class="material-symbols-outlined icon-fill mt-0.5 text-[26px] text-primary">check_circle</span>
            <div>
              <h3 class="font-display text-lg font-bold text-ink">{{ setting('page.index.body_025') }}</h3>
              <p class="mt-1 text-slate-600">{{ setting('page.index.body_026') }}</p>
            </div>
          </li>
        </ul>

        <a href="/about-us" class="mt-8 inline-flex items-center gap-2 rounded-full border-2 border-primary/15 bg-white px-6 py-3.5 font-semibold text-primary transition hover:border-primary/40 hover:bg-surface2">
          Get to know who we are <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
        </a>
      </div>

      <!-- Media: secondary video (falls back to the poster image) -->
      <div class="reveal relative">
        <div class="relative aspect-[4/3] overflow-hidden rounded-4xl shadow-card ring-1 ring-black/5">
          @php
            $appVid    = setting_url('page.index.approach_video', null);
            $appPoster = setting_url('page.index.approach_video_poster', '/fertilitycare-replica/assets/placeholder.svg');
          @endphp
          @if ($appVid)
            <video class="h-full w-full object-cover" autoplay muted loop playsinline preload="none"
                   poster="{{ $appPoster }}"
                   aria-label="Medical consultation: a doctor and patient review a scan next to the ultrasound equipment.">
              <source src="{{ $appVid }}" type="video/mp4" />
            </video>
          @else
            <img src="{{ $appPoster }}" loading="lazy"
                 alt="Medical consultation: a doctor and patient review a cycle chart."
                 class="h-full w-full object-cover" />
          @endif
        </div>
      </div>
    </div>
  </section>

  <!-- =====================================================================
       5) DOCTORS — "Our doctors"
       ===================================================================== -->
  <section class="bg-surface2">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
      <div class="reveal order-2 lg:order-1">
        <img src="{{ setting_url('page.index.doctors_image', '/fertilitycare-replica/assets/placeholder.svg') }}"
             alt="A group of consultant doctors certified in NaProTECHNOLOGY, in a clinical hallway."
             class="aspect-[5/4] w-full rounded-4xl object-cover shadow-card" loading="lazy" />
      </div>
      <div class="reveal order-1 lg:order-2">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.index.body_027') }}</h2>
        <p class="mt-5 text-lg leading-relaxed text-slate-600">{{ setting('page.index.body_028') }}</p>
        <a href="/directory/napro-doctors" class="mt-8 inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3.5 font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primary-dark">
          Meet the doctors in your country <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
        </a>
      </div>
    </div>
  </section>

  <!-- =====================================================================
       6) DIRECTORY + TESTIMONIAL
       ===================================================================== -->
  <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
      <!-- Directory CTA -->
      <div class="reveal">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.index.body_029') }}</h2>
        <p class="mt-5 text-lg leading-relaxed text-slate-600">{{ setting('page.index.body_030') }}</p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="/directory" class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-6 py-3.5 font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primary-dark">
            View directory <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </a>
          <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-primary/15 bg-white px-6 py-3.5 font-semibold text-primary transition hover:border-primary/40 hover:bg-surface2">
            Write to us
          </a>
        </div>
      </div>

      <!-- Testimonial card (Admin ▸ Testimonials) -->
      @if ($homeTestimonial)
        <figure class="reveal relative rounded-4xl border border-slate-100 bg-white p-8 shadow-card">
          <span class="material-symbols-outlined icon-fill absolute -top-4 left-8 text-5xl text-skysoft">format_quote</span>
          @if ($homeTestimonial->category)
            <span class="inline-flex items-center gap-1.5 rounded-full bg-mint/60 px-3 py-1 text-xs font-bold uppercase tracking-wide text-mintdeept">
              {{ $homeTestimonial->category }}
            </span>
          @endif
          <blockquote class="mt-5 text-xl leading-relaxed text-slate-700">{{ $homeTestimonial->quote }}</blockquote>
          <figcaption class="mt-6 flex items-center gap-3">
            @if ($homeTestimonial->imageUrl())
              <img src="{{ $homeTestimonial->imageUrl() }}" alt="{{ $homeTestimonial->name }}" class="h-11 w-11 rounded-full object-cover" loading="lazy" />
            @else
              <span class="grid h-11 w-11 place-items-center rounded-full bg-primary/10 font-display font-bold text-primary">{{ $homeTestimonial->initial() }}</span>
            @endif
            <div>
              <p class="font-semibold text-ink">{{ $homeTestimonial->name }}@if ($homeTestimonial->role), {{ $homeTestimonial->role }}@endif</p>
              <p class="flex items-center gap-0.5 text-gold" aria-label="{{ $homeTestimonial->rating }} out of 5 stars">
                @for ($i = 0; $i < $homeTestimonial->rating; $i++)
                  <span class="material-symbols-outlined icon-fill text-[18px]">star</span>
                @endfor
              </p>
            </div>
          </figcaption>
        </figure>
      @endif
    </div>
  </section>

  <!-- =====================================================================
       7) RESOURCES — blog / news
       ===================================================================== -->
  <section class="bg-surface2">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div class="max-w-2xl">
          <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.index.body_033') }}</h2>
          <p class="mt-4 text-lg text-slate-600">{{ setting('page.index.body_034') }}</p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="/resources" class="inline-flex items-center gap-2 rounded-full border-2 border-primary/15 bg-white px-5 py-3 text-sm font-semibold text-primary transition hover:border-primary/40">
            Library and official sources
          </a>
          <a href="/blog" class="inline-flex items-center gap-2 rounded-full bg-primary px-5 py-3 text-sm font-semibold text-white transition hover:bg-primary-dark">
            See all articles
          </a>
        </div>
      </div>

      <div class="mt-12 grid gap-6 md:grid-cols-3">
        @forelse ($posts as $post)
          <article class="reveal group flex flex-col overflow-hidden rounded-3xl bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
            <div class="relative aspect-[16/10] overflow-hidden bg-gradient-to-br from-primary to-midnight">
              <img src="{{ $post->imageUrl() }}" alt="" class="h-full w-full object-cover opacity-90 transition group-hover:scale-105" loading="lazy" />
            </div>
            <div class="flex flex-1 flex-col p-6">
              @if ($post->category)
                <span class="text-xs font-bold uppercase tracking-wide text-teal">{{ $post->category }}</span>
              @endif
              <h3 class="mt-2 font-display text-lg font-bold leading-snug text-ink">{{ $post->title }}</h3>
              <p class="mt-2 flex-1 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit($post->excerpt, 140) }}</p>
              <div class="mt-5 flex items-center justify-between text-sm">
                <time class="text-slate-500" @if ($post->published_at) datetime="{{ $post->published_at->toDateString() }}" @endif>{{ $post->dateLabel() }}</time>
                <a href="{{ route('fc.blog.post', $post->slug) }}" class="inline-flex items-center gap-1 font-semibold text-primary">
                  Read more <span class="material-symbols-outlined text-[18px] transition group-hover:translate-x-1">arrow_forward</span>
                </a>
              </div>
            </div>
          </article>
        @empty
          <p class="text-slate-500">New articles are on the way.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- =====================================================================
       8) COMMUNITY — social channels
       ===================================================================== -->
  <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
    <div class="reveal mx-auto max-w-2xl text-center">
      <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.index.body_041') }}</h2>
      <p class="mt-4 text-lg text-slate-600">{{ setting('page.index.body_042') }}</p>
    </div>

    <div class="mt-12 grid gap-6 md:grid-cols-3">
      @php $hasSocial = setting('identity.instagram_url') || setting('identity.facebook_url') || setting('identity.youtube_url'); @endphp
      @if ($hasSocial)
      <!-- Instagram -->
      @if (setting('identity.instagram_url'))
      <a href="{{ setting('identity.instagram_url') }}" target="_blank" rel="noopener" class="reveal group rounded-3xl border border-slate-100 bg-gradient-to-br from-[#f58529]/10 via-[#dd2a7b]/10 to-[#8134af]/10 p-7 transition hover:-translate-y-1 hover:shadow-card">
        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-white text-[#dd2a7b] shadow-soft">
          <span class="material-symbols-outlined text-[28px]">photo_camera</span>
        </span>
        <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.index.body_043') }}</h3>
        <p class="mt-2 text-slate-600">{{ setting('page.index.body_044') }}</p>
        <span class="mt-6 inline-flex items-center gap-2 font-semibold text-primary group-hover:gap-3">
          Follow <span class="material-symbols-outlined text-[20px] transition">arrow_forward</span>
        </span>
      </a>
      @endif

      <!-- Facebook -->
      @if (setting('identity.facebook_url'))
      <a href="{{ setting('identity.facebook_url') }}" target="_blank" rel="noopener" class="reveal group rounded-3xl border border-slate-100 bg-gradient-to-br from-[#1877f2]/10 to-surface p-7 transition hover:-translate-y-1 hover:shadow-card">
        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-white text-[#1877f2] shadow-soft">
          <span class="material-symbols-outlined text-[28px]">thumb_up</span>
        </span>
        <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.index.body_045') }}</h3>
        <p class="mt-2 text-slate-600">{{ setting('page.index.body_046') }}</p>
        <span class="mt-6 inline-flex items-center gap-2 font-semibold text-primary group-hover:gap-3">
          Follow <span class="material-symbols-outlined text-[20px] transition">arrow_forward</span>
        </span>
      </a>
      @endif

      <!-- YouTube -->
      @if (setting('identity.youtube_url'))
      <a href="{{ setting('identity.youtube_url') }}" target="_blank" rel="noopener" class="reveal group rounded-3xl border border-slate-100 bg-gradient-to-br from-[#ff0000]/10 to-surface p-7 transition hover:-translate-y-1 hover:shadow-card">
        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-white text-[#ff0000] shadow-soft">
          <span class="material-symbols-outlined text-[28px]">smart_display</span>
        </span>
        <h3 class="mt-5 font-display text-xl font-bold text-ink">{{ setting('page.index.body_047') }}</h3>
        <p class="mt-2 text-slate-600">{{ setting('page.index.body_048') }}</p>
        <span class="mt-6 inline-flex items-center gap-2 font-semibold text-primary group-hover:gap-3">
          Follow <span class="material-symbols-outlined text-[20px] transition">arrow_forward</span>
        </span>
      </a>
      @endif
      @else
      <p class="text-slate-500">{{ setting('page.index.body_041') }} — social links will appear once added in Site Settings.</p>
      @endif
    </div>
  </section>

  <!-- =====================================================================
       9) FAQ — interactive accordion
       ===================================================================== -->
  <section id="faq" class="bg-surface2">
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
      <div class="reveal text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ setting('page.index.body_049') }}</h2>
        <p class="mt-4 text-lg text-slate-600">{{ setting('page.index.body_050') }}</p>
      </div>

      @include('fertilitycare.partials.faq-accordion', ['items' => $faqs->map(fn ($f) => ['q' => $f->question, 'a' => $f->answer])->all()])
    </div>
  </section>

  <!-- =====================================================================
       10) FINAL CTA
       ===================================================================== -->
  @include('fertilitycare.partials.cta-band')

@endsection
