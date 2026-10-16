@extends('fertilitycare.layouts.app')

{{--
  Single blog post template. `$post` is an App\Models\Post resolved from the
  database by the /blog/{slug} route (drafts 404).
--}}
@section('title', $post->title.' | '.setting('identity.site_name'))
@section('description', $post->excerpt ?? 'Article from FertilityCare Centers of Nigeria.')
@section('og_type', 'article')
@section('og_image', $post->imageUrl())

@push('head')
  <!-- Article structured data -->
  @php
    $articleUrl = rtrim((string) setting('identity.site_url', url('/')), '/') . '/blog/' . $post->slug;
    $articleImage = canonical_media_url($post->imageUrl());
    $articleJson = array_filter([
      '@context'      => 'https://schema.org',
      '@type'         => 'Article',
      'headline'      => $post->title,
      'url'           => $articleUrl,
      'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $articleUrl],
      'description'   => $post->excerpt,
      'image'         => $articleImage ?: null,
      'inLanguage'    => 'en',
      'datePublished' => $post->published_at?->toIso8601String(),
      'dateModified'  => $post->updated_at?->toIso8601String(),
      'author'        => $post->author ? ['@type' => 'Person', 'name' => $post->author] : null,
      'publisher'     => ['@type' => 'Organization', 'name' => setting('identity.site_name')],
    ]);
  @endphp
  <script type="application/ld+json">{!! json_encode($articleJson, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Blog', 'href' => '/blog'], ['label' => $post->title]],
    'eyebrow' => $post->category,
    'title' => $post->title,
    'lead' => $post->excerpt,
  ])

  <article class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    @if ($post->imageUrl())
      <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="mb-10 aspect-[16/9] w-full rounded-4xl object-cover shadow-card" loading="lazy" />
    @endif

    @if ($post->dateLabel())
      <p class="mb-8 flex items-center gap-2 text-sm text-slate-500">
        <span class="material-symbols-outlined text-[18px]">calendar_month</span>
        <time @if ($post->published_at) datetime="{{ $post->published_at->toDateString() }}" @endif>{{ $post->dateLabel() }}</time>
        @if ($post->author)
          <span class="text-slate-300">·</span> {{ $post->author }}
        @endif
      </p>
    @elseif ($post->author)
      <p class="mb-8 text-sm text-slate-500">{{ $post->author }}</p>
    @endif

    <div class="prose-fc">
      {!! $post->body !!}
    </div>

    {{-- Share / back --}}
    <div class="mt-12 flex flex-col items-start gap-4 border-t border-slate-100 pt-8 sm:flex-row sm:items-center sm:justify-between">
      <a href="/blog" class="inline-flex items-center gap-2 rounded-full border-2 border-primary/15 bg-white px-6 py-3 font-semibold text-primary transition hover:border-primary/40 hover:bg-surface2">
        <span class="material-symbols-outlined text-[20px]">arrow_back</span> Back to blog
      </a>
      <div class="flex items-center gap-3">
        <span class="text-sm font-semibold text-slate-500">Share</span>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Share on Facebook" class="grid h-10 w-10 place-items-center rounded-full bg-surface2 text-primary transition hover:bg-primary hover:text-white">
          <span class="material-symbols-outlined text-[20px]">thumb_up</span>
        </a>
        @if (setting('identity.instagram_url'))
        <a href="{{ setting('identity.instagram_url') }}" target="_blank" rel="noopener" aria-label="Instagram" class="grid h-10 w-10 place-items-center rounded-full bg-surface2 text-primary transition hover:bg-primary hover:text-white">
          <span class="material-symbols-outlined text-[20px]">photo_camera</span>
        </a>
        @endif
      </div>
    </div>
  </article>

  @include('fertilitycare.partials.cta-band', [
    'heading' => 'Want to learn your cycle?',
    'sub' => 'Find a Practitioner near you and start with your first chart.',
    'cta' => 'Open the directory',
  ])
@endsection
