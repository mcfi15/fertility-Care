<!doctype html>
{{--
  ============================================================================
  FertilityCare — shared layout (English)
  ----------------------------------------------------------------------------
  All inner pages extend this layout:
      @extends('fertilitycare.layouts.app')
      @section('title', '...')
      @section('description', '...')
      @section('content') ... @endsection
  The header / footer / scripts are the same components used across the site,
  which keeps the replica consistent and DRY.
  ============================================================================
--}}
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="utf-8" />
  <meta name="google-site-verification" content="aYl282g6wvnFX129Vk1H_B1--alq1NZsnCa0-LsavDM" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', setting('identity.site_name'))</title>
  <meta name="description" content="@yield('description', setting('identity.meta_description'))" />
  <meta name="robots" content="@yield('robots', 'index,follow, max-image-preview:large, max-snippet:-1')" />
  <meta name="theme-color" content="#005b7b" />

  @php
    /*
      Canonical URL: the admin-controlled domain (Admin ▸ Site Settings >
      "Canonical website URL") + the path currently being rendered, so every
      page emits a stable, self-referencing canonical — even in local dev.
    */
    $canonicalBase = rtrim((string) setting('identity.site_url', url('/')), '/');
    $canonicalUrl  = $canonicalBase . request()->getPathInfo();

    // Open Graph values: the page's own @section('title'/'description'/'og_*'),
    // falling back to the site identity when a page does not define them.
    // Inline sections are stored escaped by Blade, so decode before the values
    // are escaped again in the attributes below (avoids "&amp;amp;").
    $ogTitle       = trim(html_entity_decode($__env->yieldContent('title', ''), ENT_QUOTES, 'UTF-8'));
    $ogDescription = trim(html_entity_decode($__env->yieldContent('description', ''), ENT_QUOTES, 'UTF-8'));
    $ogType        = trim($__env->yieldContent('og_type', '')) ?: 'website';

    if ($ogTitle === '') {
        $ogTitle = (string) setting('identity.site_name');
    }
    if ($ogDescription === '') {
        $ogDescription = (string) setting('identity.meta_description');
    }

    $ogImage = canonical_media_url(html_entity_decode(
        trim($__env->yieldContent('og_image', '')),
        ENT_QUOTES,
        'UTF-8'
    ) ?: (setting_url('page.index.hero_media_image') ?? setting_url('branding.logo') ?? ''));

    $ogSiteName = (string) setting('identity.site_name');
  @endphp

  <!-- Canonical -->
  <link rel="canonical" href="{{ $canonicalUrl }}" />

  <!-- Open Graph -->
  <meta property="og:type" content="{{ $ogType }}" />
  <meta property="og:site_name" content="{{ $ogSiteName }}" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:title" content="{{ $ogTitle }}" />
  <meta property="og:description" content="{{ $ogDescription }}" />
  <meta property="og:url" content="{{ $canonicalUrl }}" />
  @if ($ogImage !== '')
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta property="og:image:alt" content="{{ $ogSiteName }}" />
  @endif

  <!-- Twitter -->
  <meta name="twitter:card" content="{{ $ogImage !== '' ? 'summary_large_image' : 'summary' }}" />
  <meta name="twitter:title" content="{{ $ogTitle }}" />
  <meta name="twitter:description" content="{{ $ogDescription }}" />
  @if ($ogImage !== '')
    <meta name="twitter:image" content="{{ $ogImage }}" />
  @endif

  <!-- Icons (Admin ▸ Site Settings → favicon) -->
  <link rel="icon" href="{{ setting_url('branding.favicon', '/fertilitycare-replica/assets/icon.png') }}" />
  <link rel="apple-touch-icon" href="{{ setting_url('branding.favicon', '/fertilitycare-replica/assets/apple-icon.png') }}" />

  <!-- Fonts: Montserrat (display) + Source Sans 3 (body) + Material Symbols (icons) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Source+Sans+3:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet" />

  <!-- Tailwind Play CDN + design tokens extracted from the original site -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Montserrat', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            sans: ['"Source Sans 3"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
          },
          colors: {
            ink:        '#10151c',
            inksoft:    '#1b212b',
            midnight:   '#001e2c',
            primary:    { DEFAULT: '#005b7b', dark: '#004c68', deep: '#00201c' },
            teal:       '#1e7499',
            mint:       '#b0efe2',
            mintdeept:  '#075047',
            sky:        '#86cff8',
            skysoft:    '#c3e8ff',
            surface:    '#f9f9ff',
            surface2:   '#f0f3ff',
            gold:       '#fae283',
            danger:     '#93000a',
            dangerbg:   '#ffdad6',
          },
          boxShadow: {
            soft: '0 10px 30px -12px rgba(0,30,44,.18)',
            card: '0 18px 48px -20px rgba(0,30,44,.28)',
          },
          borderRadius: { '4xl': '2rem' },
        },
      },
    };
  </script>

  <!-- Custom CSS: icons, accordion, mega-menu, reveal animations, helpers -->
  <style>
    :root { --header-h: 76px; }

    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      line-height: 1; user-select: none;
    }
    .icon-fill { font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24; }

    section[id], div[id] { scroll-margin-top: calc(var(--header-h) + 16px); }

    .mega-panel { opacity: 0; visibility: hidden; transform: translateY(8px);
      transition: opacity .18s ease, transform .18s ease, visibility .18s; }
    @media (min-width: 1024px) {
      .nav-item:hover > .mega-panel,
      .nav-item:focus-within > .mega-panel { opacity: 1; visibility: visible; transform: translateY(0); }
      .nav-item:hover > .nav-trigger .chev { transform: rotate(180deg); }
    }
    .nav-trigger .chev { transition: transform .18s ease; }

    .faq-answer { overflow: hidden; max-height: 0; transition: max-height .35s ease; }
    .faq-item.open .faq-answer { max-height: 640px; }
    .faq-item.open .faq-plus { transform: rotate(45deg); }
    .faq-plus { transition: transform .25s ease; }

    .m-nav-panel { overflow: hidden; max-height: 0; transition: max-height .3s ease; }
    .m-nav-group.open .m-nav-panel { max-height: 900px; }
    .m-nav-group.open .m-chev { transform: rotate(180deg); }
    .m-chev { transition: transform .25s ease; }

    .reveal { opacity: 0; transform: translateY(18px); transition: opacity .6s ease, transform .6s ease; }
    .reveal.in { opacity: 1; transform: none; }
    @media (prefers-reduced-motion: reduce) {
      .reveal { opacity: 1 !important; transform: none !important; transition: none; }
      html { scroll-behavior: auto; }
    }

    .bg-dots { background-image: radial-gradient(rgba(255,255,255,.14) 1px, transparent 1px);
      background-size: 22px 22px; }
    .bg-grid { background-image: linear-gradient(rgba(0,91,123,.06) 1px, transparent 1px),
      linear-gradient(90deg, rgba(0,91,123,.06) 1px, transparent 1px);
      background-size: 40px 40px; }

    /* Long-form article typography */
    .prose-fc > * + * { margin-top: 1.1rem; }
    .prose-fc h2 { font-family: Montserrat, sans-serif; font-weight: 700; font-size: 1.5rem; color: #10151c; margin-top: 2.2rem; }
    .prose-fc h3 { font-family: Montserrat, sans-serif; font-weight: 700; font-size: 1.2rem; color: #10151c; margin-top: 1.8rem; }
    .prose-fc p, .prose-fc li { color: #475569; font-size: 1.075rem; line-height: 1.75; }
    .prose-fc ul { list-style: disc; padding-left: 1.4rem; }
    .prose-fc ol { list-style: decimal; padding-left: 1.4rem; }
    .prose-fc li + li { margin-top: .4rem; }
    .prose-fc a { color: #005b7b; font-weight: 600; text-decoration: underline; text-underline-offset: 3px; }
    .prose-fc blockquote { border-left: 4px solid #005b7b; background: #f0f3ff; border-radius: 0 1rem 1rem 0; padding: 1rem 1.4rem; font-family: Montserrat, sans-serif; font-weight: 600; color: #001e2c; }
    .prose-fc strong { color: #10151c; }

    a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible {
      outline: 3px solid #86cff8; outline-offset: 2px; border-radius: 6px;
    }
  </style>

  <!-- Sitewide structured data: WebSite + Organization -->
  @php
    $ldSocial = array_values(array_filter([
      setting('identity.facebook_url'),
      setting('identity.instagram_url'),
      setting('identity.youtube_url'),
      setting('identity.twitter_url'),
      setting('identity.linkedin_url'),
    ]));
    $ldLogo = canonical_media_url(setting_url('branding.logo') ?: setting_url('branding.favicon'));
    $ldJson = [
      [
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        'name'     => setting('identity.site_name'),
        'url'      => rtrim((string) setting('identity.site_url', url('/')), '/') . '/',
        'inLanguage' => 'en',
      ],
      array_filter([
        '@context'      => 'https://schema.org',
        '@type'         => 'Organization',
        'name'          => setting('identity.site_name'),
        'url'           => rtrim((string) setting('identity.site_url', url('/')), '/') . '/',
        'description'   => setting('identity.meta_description'),
        'logo'          => $ldLogo ?: null,
        'sameAs'        => $ldSocial ?: null,
        'email'         => setting('identity.contact_email') ?: null,
        'telephone'     => setting('identity.contact_phone') ?: null,
        'address'       => setting('identity.address') ?: null,
      ]),
    ];
  @endphp
  <script type="application/ld+json">{!! json_encode($ldJson, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

  @stack('head')
</head>

<body class="bg-surface font-sans text-ink antialiased selection:bg-mint selection:text-primary-deep">

  @include('fertilitycare.partials.header')

  <main id="home">
    @yield('content')
  </main>

  @include('fertilitycare.partials.footer')

  <!-- Back to top -->
  <button id="to-top" class="fixed bottom-6 right-6 z-40 hidden h-12 w-12 place-items-center rounded-full bg-primary text-white shadow-card transition hover:bg-primary-dark" aria-label="Back to top">
    <span class="material-symbols-outlined">arrow_upward</span>
  </button>

  @include('fertilitycare.partials.scripts')
</body>
</html>
