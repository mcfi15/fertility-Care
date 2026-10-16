@extends('fertilitycare.layouts.app')

@section('title', 'Privacy notice | FertilityCare Centers of Nigeria')
@section('description', 'Privacy notice for FertilityCare Centers of Nigeria: how we handle the information you share with us.')
@php
  // NOTE FOR THE SITE OWNER: this is a general, good-practice template. Have it
  // reviewed by legal counsel and complete the [square-bracketed] placeholders
  // with your legal entity, contact details, and applicable jurisdiction.
@endphp

@section('content')
  @include('fertilitycare.partials.page-hero', [
    'crumbs' => [['label' => 'Privacy notice']],
    'eyebrow' => 'Legal',
    'title' => 'Privacy notice',
    'lead' => 'How we handle the information you share with us, and the choices you have.',
  ])

  <section class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <div class="prose-fc">
      <p class="text-sm text-slate-500">{{ setting('page.privacy-notice.body_001') }}</p>

      <h2>{{ setting('page.privacy-notice.body_002') }}</h2>
      <p>
        This notice applies to FertilityCare Centers of Nigeria ("we", "us"), the entity responsible for processing
        the personal data you provide through this website. You can contact us at <a href="/contact">the contact form</a>
        or at [contact email].
      </p>

      <h2>{{ setting('page.privacy-notice.body_003') }}</h2>
      <ul>
        <li>{{ setting('page.privacy-notice.body_004') }}</li>
        <li>{{ setting('page.privacy-notice.body_005') }}</li>
        <li>{{ setting('page.privacy-notice.body_006') }}</li>
      </ul>

      <h2>{{ setting('page.privacy-notice.body_007') }}</h2>
      <ul>
        <li>{{ setting('page.privacy-notice.body_008') }}</li>
        <li>{{ setting('page.privacy-notice.body_009') }}</li>
        <li>{{ setting('page.privacy-notice.body_010') }}</li>
      </ul>

      <h2>{{ setting('page.privacy-notice.body_011') }}</h2>
      <p>{{ setting('page.privacy-notice.body_012') }}</p>

      <h2>{{ setting('page.privacy-notice.body_013') }}</h2>
      <p>{{ setting('page.privacy-notice.body_014') }}</p>

      <h2>{{ setting('page.privacy-notice.body_015') }}</h2>
      <p>{{ setting('page.privacy-notice.body_016') }}</p>

      <h2>{{ setting('page.privacy-notice.body_017') }}</h2>
      <p>{{ setting('page.privacy-notice.body_018') }}</p>

      <h2>{{ setting('page.privacy-notice.body_019') }}</h2>
      <p>
        For any question about this notice, write to us through the <a href="/contact">contact page</a>.
      </p>
    </div>

    <div class="mt-10">
      <a href="/contact" class="inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3.5 font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primary-dark">
        Write to us <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
      </a>
    </div>
  </section>
@endsection
