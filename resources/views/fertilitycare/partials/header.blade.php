{{--
  ============================================================================
  HEADER — sticky, translucent, mega-menu navigation (shared across all pages)
  Links use root-relative paths identical to the original site's routes.
  ============================================================================
--}}
<header id="site-header" class="sticky top-0 z-50 border-b border-slate-200/70 bg-white/85 backdrop-blur-md transition-shadow">
  <div class="mx-auto flex h-[76px] max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">

    <!-- Logo -->
    <a href="/" class="flex shrink-0 items-center gap-2" aria-label="{{ setting('identity.site_name') }} — home">
      <img src="{{ setting_url('branding.logo', '/fertilitycare-replica/assets/logo.svg') }}" alt="{{ setting('identity.site_name') }}" class="h-11 w-auto" />
    </a>

    <!-- Desktop navigation (mega-menus) -->
    <nav class="hidden lg:block" aria-label="Main navigation">
      <ul class="flex items-center gap-0.5 text-sm font-medium text-slate-700">

        <!-- Group 1: What is FertilityCare? -->
        <li class="nav-item relative">
          <button class="nav-trigger flex items-center gap-1 whitespace-nowrap rounded-full px-3 py-2 transition hover:bg-surface2 hover:text-primary">
            What is FertilityCare? <span class="material-symbols-outlined chev text-[20px]">expand_more</span>
          </button>
          <div class="mega-panel absolute left-1/2 top-full w-[560px] -translate-x-1/2 pt-3">
            <div class="rounded-3xl border border-slate-100 bg-white p-4 shadow-card">
              <div class="grid grid-cols-2 gap-1">
                <a href="/what-is-fertilitycare" class="group rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">What is FertilityCare</p>
                  <p class="mt-0.5 text-sm text-slate-500">The gateway to the system and its approach</p>
                </a>
                <a href="/faq" class="group rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Frequently asked questions</p>
                  <p class="mt-0.5 text-sm text-slate-500">Get your questions answered before you start</p>
                </a>
                <a href="/testimonials" class="group rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Testimonials</p>
                  <p class="mt-0.5 text-sm text-slate-500">Stories from those already living it</p>
                </a>
                <a href="/about-us" class="group rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">About us</p>
                  <p class="mt-0.5 text-sm text-slate-500">Who we are, the Nigerian network, and the philosophy that guides us.</p>
                </a>
              </div>
              <a href="/the-system" class="mt-3 flex items-center justify-between rounded-2xl bg-primary px-4 py-3 text-sm font-semibold text-white transition hover:bg-primary-dark">
                Explore the full system <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
              </a>
            </div>
          </div>
        </li>

        <!-- Group 2: Creighton Model -->
        <li class="nav-item relative">
          <button class="nav-trigger flex items-center gap-1 whitespace-nowrap rounded-full px-3 py-2 transition hover:bg-surface2 hover:text-primary">
            Creighton Model <span class="material-symbols-outlined chev text-[20px]">expand_more</span>
          </button>
          <div class="mega-panel absolute left-1/2 top-full w-[420px] -translate-x-1/2 pt-3">
            <div class="rounded-3xl border border-slate-100 bg-white p-4 shadow-card">
              <div class="grid gap-1">
                <a href="/creighton-model" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Creighton Model</p>
                  <p class="mt-0.5 text-sm text-slate-500">Learn to observe and chart your cycle</p>
                </a>
                <a href="/what-is-a-practitioner" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">What is a Practitioner</p>
                  <p class="mt-0.5 text-sm text-slate-500">Who teaches and supports you</p>
                </a>
              </div>
              <a href="/directory" class="mt-3 flex items-center justify-between rounded-2xl bg-mint px-4 py-3 text-sm font-semibold text-mintdeept transition hover:bg-[#9fe6d8]">
                Find a Practitioner <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
              </a>
            </div>
          </div>
        </li>

        <!-- Group 3: NaProTECHNOLOGY -->
        <li class="nav-item relative">
          <button class="nav-trigger flex items-center gap-1 whitespace-nowrap rounded-full px-3 py-2 transition hover:bg-surface2 hover:text-primary">
            NaProTECHNOLOGY <span class="material-symbols-outlined chev text-[20px]">expand_more</span>
          </button>
          <div class="mega-panel absolute left-1/2 top-full w-[400px] -translate-x-1/2 pt-3">
            <div class="rounded-3xl border border-slate-100 bg-white p-4 shadow-card">
              <a href="/naprotechnology" class="block rounded-2xl p-3 transition hover:bg-surface2">
                <p class="font-display font-semibold text-primary">NaProTECHNOLOGY</p>
                <p class="mt-0.5 text-sm text-slate-500">Medicine that seeks causes, not shortcuts</p>
              </a>
              <a href="/directory/napro-doctors" class="mt-3 flex items-center justify-between rounded-2xl bg-primary px-4 py-3 text-sm font-semibold text-white transition hover:bg-primary-dark">
                Find a NaPro doctor <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
              </a>
            </div>
          </div>
        </li>

        <!-- Group 4: Our Directory -->
        <li class="nav-item relative">
          <button class="nav-trigger flex items-center gap-1 whitespace-nowrap rounded-full px-3 py-2 transition hover:bg-surface2 hover:text-primary">
            Our Directory <span class="material-symbols-outlined chev text-[20px]">expand_more</span>
          </button>
          <div class="mega-panel absolute left-1/2 top-full w-[440px] -translate-x-1/2 pt-3">
            <div class="rounded-3xl border border-slate-100 bg-white p-4 shadow-card">
              <div class="grid gap-1">
                <a href="/directory" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Centers Directory</p>
                  <p class="mt-0.5 text-sm text-slate-500">Centers and Practitioners by country</p>
                </a>
                <a href="/directory/napro-doctors" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">NaPro consultant doctors</p>
                  <p class="mt-0.5 text-sm text-slate-500">Specialists in restorative medicine</p>
                </a>
              </div>
              <a href="/find-support" class="mt-3 flex items-center justify-between rounded-2xl bg-primary px-4 py-3 text-sm font-semibold text-white transition hover:bg-primary-dark">
                See all support options <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
              </a>
            </div>
          </div>
        </li>

        <!-- Group 5: Professional Training -->
        <li class="nav-item relative">
          <button class="nav-trigger flex items-center gap-1 whitespace-nowrap rounded-full px-3 py-2 transition hover:bg-surface2 hover:text-primary">
            Professional Training <span class="material-symbols-outlined chev text-[20px]">expand_more</span>
          </button>
          <div class="mega-panel absolute right-0 top-full w-[620px] pt-3">
            <div class="rounded-3xl border border-slate-100 bg-white p-4 shadow-card">
              <div class="grid grid-cols-2 gap-1">
                <a href="/professional-training#ser-practitioner" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Become a Practitioner</p>
                  <p class="mt-0.5 text-sm text-slate-500">Learn about the training and its purpose</p>
                </a>
                <a href="/professional-training#etapas" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Training stages</p>
                  <p class="mt-0.5 text-sm text-slate-500">Educational phases, supervised practice, and evaluation</p>
                </a>
                <a href="/professional-training#requisitos" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Who can apply</p>
                  <p class="mt-0.5 text-sm text-slate-500">Applicant profile and admission requirements</p>
                </a>
                <a href="/professional-training#programas-educativos" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Educational programs</p>
                  <p class="mt-0.5 text-sm text-slate-500">Lagos and Abuja: dates and brochures</p>
                </a>
                <a href="/professional-training#generaciones" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Past cohorts</p>
                  <p class="mt-0.5 text-sm text-slate-500">Photos from previous programs</p>
                </a>
                <a href="/professional-training#formacion-medica" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Training for consultant doctors</p>
                  <p class="mt-0.5 text-sm text-slate-500">Discover the Medical Consultant track</p>
                </a>
                <a href="/professional-training#preguntas-formacion" class="rounded-2xl p-3 transition hover:bg-surface2">
                  <p class="font-display font-semibold text-primary">Frequently asked questions</p>
                  <p class="mt-0.5 text-sm text-slate-500">Get your questions answered before you start</p>
                </a>
              </div>
              <a href="/professional-training" class="mt-3 flex items-center justify-between rounded-2xl bg-primary px-4 py-3 text-sm font-semibold text-white transition hover:bg-primary-dark">
                See all professional training <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
              </a>
            </div>
          </div>
        </li>
      </ul>
    </nav>

    <!-- Right side actions -->
    <div class="flex items-center gap-2">
      {{-- <a href="/login" class="hidden items-center gap-1.5 whitespace-nowrap rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-primary hover:text-primary sm:inline-flex">
        <span class="material-symbols-outlined text-[20px]">lock_open</span> Backoffice
      </a> --}}
      <a href="/directory" class="hidden whitespace-nowrap rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-white shadow-soft transition hover:bg-primary-dark xl:inline-flex">
        Find support
      </a>
      <!-- Mobile menu toggle -->
      <button id="menu-toggle" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 text-slate-700 transition hover:bg-surface2 lg:hidden" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu">
        <span class="material-symbols-outlined">menu</span>
      </button>
    </div>
  </div>

  <!-- Mobile drawer -->
  <div id="mobile-menu" class="hidden border-t border-slate-100 bg-white lg:hidden">
    <nav class="max-h-[calc(100vh-76px)] overflow-y-auto px-4 py-4" aria-label="Mobile navigation">

      <div class="m-nav-group border-b border-slate-100">
        <button class="flex w-full items-center justify-between py-4 text-left font-display font-semibold text-ink">
          What is FertilityCare? <span class="material-symbols-outlined m-chev">expand_more</span>
        </button>
        <div class="m-nav-panel">
          <div class="space-y-1 pb-4 text-sm">
            <a href="/what-is-fertilitycare" class="block rounded-xl px-3 py-2 hover:bg-surface2">What is FertilityCare</a>
            <a href="/faq" class="block rounded-xl px-3 py-2 hover:bg-surface2">Frequently asked questions</a>
            <a href="/testimonials" class="block rounded-xl px-3 py-2 hover:bg-surface2">Testimonials</a>
            <a href="/about-us" class="block rounded-xl px-3 py-2 hover:bg-surface2">About us</a>
            <a href="/the-system" class="block rounded-xl px-3 py-2 font-semibold text-primary hover:bg-surface2">Explore the full system</a>
          </div>
        </div>
      </div>

      <div class="m-nav-group border-b border-slate-100">
        <button class="flex w-full items-center justify-between py-4 text-left font-display font-semibold text-ink">
          Creighton Model <span class="material-symbols-outlined m-chev">expand_more</span>
        </button>
        <div class="m-nav-panel">
          <div class="space-y-1 pb-4 text-sm">
            <a href="/creighton-model" class="block rounded-xl px-3 py-2 hover:bg-surface2">Creighton Model</a>
            <a href="/what-is-a-practitioner" class="block rounded-xl px-3 py-2 hover:bg-surface2">What is a Practitioner</a>
            <a href="/directory" class="block rounded-xl px-3 py-2 font-semibold text-primary hover:bg-surface2">Find a Practitioner</a>
          </div>
        </div>
      </div>

      <div class="m-nav-group border-b border-slate-100">
        <button class="flex w-full items-center justify-between py-4 text-left font-display font-semibold text-ink">
          NaProTECHNOLOGY <span class="material-symbols-outlined m-chev">expand_more</span>
        </button>
        <div class="m-nav-panel">
          <div class="space-y-1 pb-4 text-sm">
            <a href="/naprotechnology" class="block rounded-xl px-3 py-2 hover:bg-surface2">NaProTECHNOLOGY</a>
            <a href="/directory/napro-doctors" class="block rounded-xl px-3 py-2 font-semibold text-primary hover:bg-surface2">Find a NaPro doctor</a>
          </div>
        </div>
      </div>

      <div class="m-nav-group border-b border-slate-100">
        <button class="flex w-full items-center justify-between py-4 text-left font-display font-semibold text-ink">
          Our Directory <span class="material-symbols-outlined m-chev">expand_more</span>
        </button>
        <div class="m-nav-panel">
          <div class="space-y-1 pb-4 text-sm">
            <a href="/directory" class="block rounded-xl px-3 py-2 hover:bg-surface2">Centers Directory</a>
            <a href="/directory/napro-doctors" class="block rounded-xl px-3 py-2 hover:bg-surface2">NaPro consultant doctors</a>
            <a href="/find-support" class="block rounded-xl px-3 py-2 font-semibold text-primary hover:bg-surface2">See all support options</a>
          </div>
        </div>
      </div>

      <div class="m-nav-group border-b border-slate-100">
        <button class="flex w-full items-center justify-between py-4 text-left font-display font-semibold text-ink">
          Professional Training <span class="material-symbols-outlined m-chev">expand_more</span>
        </button>
        <div class="m-nav-panel">
          <div class="space-y-1 pb-4 text-sm">
            <a href="/professional-training#ser-practitioner" class="block rounded-xl px-3 py-2 hover:bg-surface2">Become a Practitioner</a>
            <a href="/professional-training#etapas" class="block rounded-xl px-3 py-2 hover:bg-surface2">Training stages</a>
            <a href="/professional-training#requisitos" class="block rounded-xl px-3 py-2 hover:bg-surface2">Who can apply</a>
            <a href="/professional-training#programas-educativos" class="block rounded-xl px-3 py-2 hover:bg-surface2">Educational programs</a>
            <a href="/professional-training#generaciones" class="block rounded-xl px-3 py-2 hover:bg-surface2">Past cohorts</a>
            <a href="/professional-training#formacion-medica" class="block rounded-xl px-3 py-2 hover:bg-surface2">Training for consultant doctors</a>
            <a href="/professional-training#preguntas-formacion" class="block rounded-xl px-3 py-2 hover:bg-surface2">Frequently asked questions</a>
            <a href="/professional-training" class="block rounded-xl px-3 py-2 font-semibold text-primary hover:bg-surface2">See all professional training</a>
          </div>
        </div>
      </div>

      <div class="flex flex-col gap-2 pt-4">
        <a href="/login" class="inline-flex items-center gap-2 rounded-full border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-700">
          <span class="material-symbols-outlined text-[20px]">lock_open</span> Backoffice
        </a>
        <a href="/directory" class="rounded-full bg-primary px-5 py-3 text-center text-sm font-semibold text-white">Find support</a>
      </div>
    </nav>
  </div>
</header>
