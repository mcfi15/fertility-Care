@extends('fertilitycare.layouts.app')

@section('title', 'Write to us | FertilityCare Centers of Nigeria')
@section('description', 'Contact FertilityCare Centers of Nigeria. Tell us what you are looking for and we will help you take the next step.')

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Write to us']],
    'eyebrow' => 'Contact',
    'title' => 'Write to us',
    'lead' => 'Have a question or want to take the next step? Leave us a message and we will help you find the right option.',
  ])

  <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="grid gap-12 lg:grid-cols-5 lg:gap-16">

      {{-- Info column --}}
      <div class="reveal lg:col-span-2">
        <h2 class="font-display text-2xl font-bold text-ink">{{ setting('page.contact.body_001') }}</h2>
        <ul class="mt-6 space-y-5">
          @foreach ([
            ['monitoring', 'Learning the Creighton Model', 'We will point you to a Practitioner near you.'],
            ['medical_services', 'Finding a NaPro doctor', 'We will help you locate a consultant doctor.'],
            ['school', 'Professional training', 'Information about the training program.'],
            ['groups', 'Institutional collaboration', 'Partnerships, press, and other inquiries.'],
          ] as $c)
            <li class="flex gap-4">
              <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-skysoft text-primary-dark">
                <span class="material-symbols-outlined">{{ $c[0] }}</span>
              </span>
              <div>
                <h3 class="font-display font-bold text-ink">{{ $c[1] }}</h3>
                <p class="mt-0.5 text-sm text-slate-600">{{ $c[2] }}</p>
              </div>
            </li>
          @endforeach
        </ul>

        <div class="mt-10 rounded-3xl border border-slate-100 bg-surface2 p-6">
          <h3 class="font-display font-bold text-ink">{{ setting('page.contact.body_002') }}</h3>
          <div class="mt-4 flex items-center gap-3">
            @if (setting('identity.instagram_url'))
            <a href="{{ setting('identity.instagram_url') }}" target="_blank" rel="noopener" aria-label="Instagram" class="grid h-10 w-10 place-items-center rounded-full bg-white text-primary shadow-soft transition hover:bg-primary hover:text-white">
              <span class="material-symbols-outlined text-[20px]">photo_camera</span>
            </a>
            @endif
            @if (setting('identity.facebook_url'))
            <a href="{{ setting('identity.facebook_url') }}" target="_blank" rel="noopener" aria-label="Facebook" class="grid h-10 w-10 place-items-center rounded-full bg-white text-primary shadow-soft transition hover:bg-primary hover:text-white">
              <span class="material-symbols-outlined text-[20px]">thumb_up</span>
            </a>
            @endif
            @if (setting('identity.youtube_url'))
            <a href="{{ setting('identity.youtube_url') }}" target="_blank" rel="noopener" aria-label="YouTube" class="grid h-10 w-10 place-items-center rounded-full bg-white text-primary shadow-soft transition hover:bg-primary hover:text-white">
              <span class="material-symbols-outlined text-[20px]">smart_display</span>
            </a>
            @endif
          </div>
        </div>
      </div>

      {{-- Form column --}}
      <div class="reveal lg:col-span-3">
        <form id="contact-page-form" method="POST" action="{{ route('fc.contact.send') }}"
              class="rounded-4xl border border-slate-100 bg-white p-7 shadow-card sm:p-9" novalidate>
          @csrf
          <div class="grid gap-5 sm:grid-cols-2">
            <div>
              <label for="cp-name" class="mb-1.5 block text-sm font-semibold text-ink">Name</label>
              <input id="cp-name" name="name" type="text" required placeholder="Your name"
                     class="w-full rounded-xl border border-slate-200 bg-surface px-4 py-3 text-sm text-ink placeholder-slate-400 transition focus:border-primary focus:bg-white" />
            </div>
            <div>
              <label for="cp-email" class="mb-1.5 block text-sm font-semibold text-ink">Email</label>
              <input id="cp-email" name="email" type="email" required placeholder="you@email.com"
                     class="w-full rounded-xl border border-slate-200 bg-surface px-4 py-3 text-sm text-ink placeholder-slate-400 transition focus:border-primary focus:bg-white" />
            </div>
          </div>

          <div class="mt-5 grid gap-5 sm:grid-cols-2">
            <div>
              <label for="cp-phone" class="mb-1.5 block text-sm font-semibold text-ink">Phone</label>
              <input id="cp-phone" name="phone" type="tel" required placeholder="+00 000 000 000"
                     class="w-full rounded-xl border border-slate-200 bg-surface px-4 py-3 text-sm text-ink placeholder-slate-400 transition focus:border-primary focus:bg-white" />
            </div>
            <div>
              <label for="cp-subject" class="mb-1.5 block text-sm font-semibold text-ink">Subject</label>
              <select id="cp-subject" name="subject" required class="w-full rounded-xl border border-slate-200 bg-surface px-4 py-3 text-sm text-ink transition focus:border-primary focus:bg-white">
                <option value="">Select an option</option>
                <option>Learn about the Creighton Model</option>
                <option>Care for infertility or other symptoms</option>
                <option>Contact a NaPro consultant doctor</option>
                <option>Professional training</option>
                <option>Institutional collaboration</option>
                <option>Press</option>
                <option>Other</option>
              </select>
            </div>
          </div>

          <div class="mt-5">
            <label for="cp-message" class="mb-1.5 block text-sm font-semibold text-ink">Message</label>
            <textarea id="cp-message" name="message" rows="5" required placeholder="How can we help?"
                      class="w-full rounded-xl border border-slate-200 bg-surface px-4 py-3 text-sm text-ink placeholder-slate-400 transition focus:border-primary focus:bg-white"></textarea>
          </div>

          <label class="mt-5 flex items-start gap-2.5 text-sm text-slate-600">
            <input type="checkbox" name="privacy" value="1" required class="mt-0.5 h-4 w-4 rounded border-slate-300 accent-primary" />
            <span>I have read and accept the <a href="/privacy-notice" class="font-semibold text-primary underline">privacy notice</a>.</span>
          </label>

          <button type="submit" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-full bg-primary px-6 py-4 font-semibold text-white shadow-soft transition hover:bg-primary-dark sm:w-auto">
            Send message <span class="material-symbols-outlined text-[20px]">send</span>
          </button>
          <p id="contact-page-status" class="mt-4 hidden text-sm font-semibold" role="status"></p>
        </form>
      </div>
    </div>
  </section>
@endsection
