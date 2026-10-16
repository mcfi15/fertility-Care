# FertilityCare Site — Replica (English)

High-fidelity replica of **https://fertilitycare.lat/** (FertilityCare™ Centers Latin America),
delivered in **English**. The original site is in Spanish; all visible copy here is translated.

> **This replica is now the site.** The homepage is served at **`/`** and every page uses an English
> URL. The previous template front end (its `/, /about, /contact, /testimonials, …` pages) has been
> replaced — see `routes/web.php`.

| Deliverable | Path | Notes |
|---|---|---|
| **Laravel Blade — homepage** | `resources/views/fertilitycare/index.blade.php` | Route → `GET /` |
| **Laravel Blade — inner pages** | `resources/views/fertilitycare/*.blade.php` | 17 pages, all routes registered (see §3) |
| **Shared layout + partials** | `resources/views/fertilitycare/{layouts,partials}/` | header, footer, scripts, page-hero, cta-band, faq-accordion |
| **Assets folder** | `public/fertilitycare-replica/assets/` | Drop the real media here (see map below) |
| **Standalone preview** | `public/fertilitycare-replica/index.html` | Static single-file copy of the homepage, for preview only |

- **Stack:** HTML5 + Tailwind CSS (Play CDN, configured inline) + vanilla JS. No build step required.
- **Fonts:** Montserrat (headings) + Source Sans 3 (body) via Google Fonts.
- **Icons:** Material Symbols Outlined (ligature icons — same family the original uses).
- **Language:** `lang="en"`, with **English URL paths** too (e.g. `/creighton-model`, `/faq`,
  `/about-us`). The old `/fertilitycare` address redirects to `/`.

---

## 1. Design tokens (extracted from the live site)

### Colors
| Token | Hex | Usage |
|---|---|---|
| `primary` | `#005b7b` | Primary buttons, links, headings accent |
| `primary-dark` | `#004c68` | Button hover |
| `midnight` | `#001e2c` | Dark bands, hero overlay |
| `teal` | `#1e7499` | Eyebrows, secondary accents |
| `mint` | `#b0efe2` | Tertiary container / soft chips |
| `mintdeept` | `#075047` | Text on mint |
| `sky` | `#86cff8` | Accent on dark |
| `skysoft` | `#c3e8ff` | Primary container / icon tiles |
| `surface` | `#f9f9ff` | Page background |
| `surface2` | `#f0f3ff` | Alternating section background |
| `ink` | `#10151c` | Body text, footer background |
| `gold` | `#fae283` | Rating stars, highlights |
| `danger` / `dangerbg` | `#93000a` / `#ffdad6` | Error states |

### Typography
| Role | Font | Weight |
|---|---|---|
| Display / H1–H3 | **Montserrat** | 700–800 |
| Body / UI | **Source Sans 3** | 400–600 |

Type scale: H1 `text-4xl→6xl`, H2 `text-3xl→4xl`, H3 `text-lg→xl`, body `text-lg`.

---

## 2. Section map (mirrors the original homepage)

1. **Header** — sticky, translucent, mega-menu (5 groups) + mobile drawer + `Backoffice` (`/login`).
2. **Hero** — H1 "Your cycles speak. Learn to listen to them.", evidence badge, dual CTA, hero video.
3. **Pathways** — "What brings you here?" (5 cards).
4. **Quote** — K. Diane Daly + two photos.
5. **Approach** — "Where others see a cycle, we see a language of health" + 2 feature bullets.
6. **Doctors** — "Our doctors".
7. **Directory + Testimonial** — Alejandra, 32 years old.
8. **Resources** — 3 blog cards.
9. **Community** — Instagram / Facebook / YouTube.
10. **FAQ** — interactive accordion (a fuller version of this content lives on the `/faq` page).
11. **Final CTA** — "Your cycle has something to tell you".
12. **Footer** — brand, 3 link columns, contact form, legal bar.

> ℹ️ The original site has **no pricing / checkout / product section** (it is a healthcare‑education organization, not a store). The conversion blocks are the **directory** and **professional training** CTAs, which are reproduced here.

---

## 3. Full page map & routes

Every link in the header/footer resolves — no more 404s, and every URL is English. Routes are
registered in `routes/web.php`. The old template front end (including its
`{category_slug}/{product_slug}` catch-all) has been removed, so unknown paths 404 cleanly.

| URL | View | Notes |
|---|---|---|
| `/` | `fertilitycare.index` | Homepage |
| `/what-is-fertilitycare` | `fertilitycare.what-is-fertilitycare` | What is FertilityCare |
| `/the-system` | `fertilitycare.the-system` | Explore the full system |
| `/creighton-model` | `fertilitycare.creighton-model` | Creighton Model |
| `/what-is-a-practitioner` | `fertilitycare.what-is-a-practitioner` | What is a Practitioner |
| `/naprotechnology` | `fertilitycare.naprotechnology` | NaProTECHNOLOGY |
| `/faq` | `fertilitycare.faq` | FAQ (4 accordion groups) |
| `/testimonials` | `fertilitycare.testimonials` | Testimonials |
| `/about-us` | `fertilitycare.about-us` | About us |
| `/directory` | `fertilitycare.directory` | Centers Directory (by country) |
| `/directory/napro-doctors` | `fertilitycare.napro-doctors` | NaPro consultant doctors |
| `/find-support` | `fertilitycare.find-support` | All support options |
| `/professional-training` | `fertilitycare.professional-training` | Professional training (7 anchored sections) |
| `/contact` | `fertilitycare.contact` | Contact form |
| `/resources` | `fertilitycare.resources` | Resources library |
| `/resources/scientific-articles` | `fertilitycare.scientific-articles` | Scientific articles |
| `/blog` | `fertilitycare.blog` | Blog index |
| `/blog/{slug}` | `fertilitycare.blog-post` | 3 posts, data supplied by the route |
| `/privacy-notice` | `fertilitycare.privacy-notice` | Privacy notice |
| `/fertilitycare` | — | 302 redirect to `/` (legacy address) |
| `/login` | Laravel auth | Provided by `Auth::routes()` |

**Reusable partials** (pass variables with `@include`):

- `partials/header.blade.php`, `partials/footer.blade.php`, `partials/scripts.blade.php` — shared chrome.
- `partials/page-hero.blade.php` — breadcrumb + eyebrow + H1 + lead + optional image.
- `partials/faq-accordion.blade.php` — `['items' => [['q'=>..., 'a'=>...], ...]]`; each group opens independently.
- `partials/cta-band.blade.php` — closing CTA, with optional `heading` / `sub` / `cta` / `href` overrides.

> ⚠️ **Sample data to replace:** the `directory`, `napro-doctors`, `scientific-articles` and
> `blog-post` route content are clearly marked placeholders in the source. Swap them for your real
> data (or a database query) before publishing, and have the privacy notice reviewed by legal.

---

## 4. Asset map — place these files in `assets/`

All media paths are absolute (`/fertilitycare-replica/assets/…`), so the same markup works for both the static file and the Blade route.

| Local file (target) | Original source URL | Used in |
|---|---|---|
| `assets/logo.svg` | `https://fertilitycare.lat/5.svg` (or `1.svg`…`6.svg`) | Header |
| `assets/logo-light.svg` | same logo, light/white variant | Footer |
| `assets/hero-doctor.webp` | `https://fertilitycare.lat/doctor-hero-poster.webp` (`doctora_portada.webp`) | Hero poster |
| `assets/hero-doctor.mp4` | `https://fertilitycare.lat/doctor-hero.mp4` | Hero video |
| `assets/doctor-chart-poster.webp` | `https://fertilitycare.lat/doctor-chart-hero-poster.webp` | Approach section poster |
| `assets/doctor-chart-hero.mp4` | `https://fertilitycare.lat/doctor-chart-hero.mp4` | Approach section video |
| `assets/pareja-creighton.webp` | `https://fertilitycare.lat/pareja_creighton.webp` | Quote section |
| `assets/medical-consultant.webp` | `https://fertilitycare.lat/medicalconsultant4.webp` | Quote section |
| `assets/equipo-medicos-napro.webp` | `https://fertilitycare.lat/equipo_medicos_napro.webp` | Doctors section |
| `assets/blog-napro.webp` | (article thumbnail) | Resources card 1 |
| `assets/blog-derechos.webp` | (article thumbnail) | Resources card 2 |
| `assets/blog-metodos-naturales.webp` | (article thumbnail) | Resources card 3 |
| `assets/icon.png` | `https://fertilitycare.lat/icon.png` | Favicon |
| `assets/apple-icon.png` | `https://fertilitycare.lat/apple-icon.png` | iOS icon |

Placeholders are included so the layout never breaks: `logo.svg`, `logo-light.svg`, `placeholder.svg`.

> **Rights note:** the logo, photographs, and the marks *FertilityCare™*, *NaProTECHNOLOGY®* and *Creighton Model* belong to their respective owners. Only use the official assets/marks if you are authorized to.

---

## 5. Interactions implemented

- Smooth scrolling for internal anchors (with sticky-header offset).
- Sticky header that gains a shadow on scroll + "back to top" button.
- Mega-menu on hover/focus (desktop) and click-accordion drawer (mobile).
- FAQ accordion (first item open by default, `aria-expanded` wired, single-open **per group**).
- Scroll-reveal animations via `IntersectionObserver`, disabled under `prefers-reduced-motion`.
- Background videos auto-pause when scrolled off-screen; disabled under reduced motion.
- Contact forms with front-end validation stub (wire the submit to your endpoint).
- **Missing media fallback** — any image/video file that hasn't been dropped into `assets/` yet is
  swapped for the bundled `placeholder.svg`, so the layout reads well before the real assets arrive.

---

## 6. Going to production

The Play CDN is great for prototyping but not recommended for production. To compile Tailwind locally:

```bash
npm install -D tailwindcss
npx tailwindcss init
```

Move the `tailwind.config` object from the `<head>` of the page into `tailwind.config.js`
(keep the same `theme.extend.colors` / `fontFamily` / `boxShadow`), then build a stylesheet
and replace the CDN `<script>` with a `<link>` to the compiled CSS.

Routes live at the top of `routes/web.php` (in the *FertilityCare site — English* block):

```php
Route::view('/', 'fertilitycare.index')->name('fertilitycare.home');
Route::redirect('/fertilitycare', '/');
Route::view('/directory', 'fertilitycare.directory')->name('fc.directory');
// ... see the full block in routes/web.php
```
