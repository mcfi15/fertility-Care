@extends('fertilitycare.layouts.app')

@section('title', 'Blog | FertilityCare Centers of Nigeria')
@section('description', 'Articles on the cycle, fertility, and reproductive health, in clear language and backed by professionals.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Blog']],
    'eyebrow' => 'Resources and news',
    'title' => 'Blog',
    'lead' => 'Articles on the cycle, fertility, and reproductive health, in clear language and backed by professionals.',
  ])

  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      @forelse ($posts as $post)
        <article class="reveal group flex flex-col overflow-hidden rounded-3xl bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
          <a href="{{ route('fc.blog.post', $post->slug) }}" class="relative block aspect-[16/10] overflow-hidden bg-gradient-to-br from-primary to-midnight">
            <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="h-full w-full object-cover opacity-90 transition group-hover:scale-105" loading="lazy" />
          </a>
          <div class="flex flex-1 flex-col p-6">
            @if ($post->category)
              <span class="text-xs font-bold uppercase tracking-wide text-teal">{{ $post->category }}</span>
            @endif
            <h2 class="mt-2 font-display text-lg font-bold leading-snug text-ink">
              <a href="{{ route('fc.blog.post', $post->slug) }}">{{ $post->title }}</a>
            </h2>
            <p class="mt-2 flex-1 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit($post->excerpt, 160) }}</p>
            <div class="mt-5 flex items-center justify-between text-sm">
              <time class="text-slate-500" @if ($post->published_at) datetime="{{ $post->published_at->toDateString() }}" @endif>{{ $post->dateLabel() }}</time>
              <a href="{{ route('fc.blog.post', $post->slug) }}" class="inline-flex items-center gap-1 font-semibold text-primary">
                Read more <span class="material-symbols-outlined text-[18px] transition group-hover:translate-x-1">arrow_forward</span>
              </a>
            </div>
          </div>
        </article>
      @empty
        <p class="text-slate-500">New articles are on the way. Please check back soon.</p>
      @endforelse
    </div>
  </section>

  @include('fertilitycare.partials.cta-band')
@endsection
