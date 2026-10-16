{{--
  Reusable FAQ accordion. Pass:
    @include('fertilitycare.partials.faq-accordion', ['items' => [
        ['q' => 'Question?', 'a' => 'Answer (may contain HTML).'],
        ...
    ]])
  The first item opens by default; the JS lives in partials/scripts.blade.php.
--}}
@php $items = $items ?? []; @endphp

<div class="reveal divide-y divide-slate-200 rounded-3xl border border-slate-100 bg-white shadow-soft">
  @foreach ($items as $item)
    <div class="faq-item">
      <button class="faq-question flex w-full items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
        <span class="font-display font-semibold text-ink">{{ $item['q'] }}</span>
        <span class="material-symbols-outlined faq-plus shrink-0 text-primary">add</span>
      </button>
      <div class="faq-answer px-6">
        <div class="pb-6 text-slate-600">{!! $item['a'] !!}</div>
      </div>
    </div>
  @endforeach
</div>
