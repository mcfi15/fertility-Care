{{--
  ============================================================================
  FOOTER — brand, navigation columns, contact form, legal bar (shared)
  ============================================================================
--}}
<footer class="bg-ink text-slate-300">
  <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="grid gap-12 lg:grid-cols-12">

      <!-- Brand + social -->
      <div class="lg:col-span-4">
        <a href="/" class="inline-flex items-center" aria-label="{{ setting('identity.site_name') }} — home">
          <img src="{{ setting_url('branding.logo_footer', setting_url('branding.logo', '/fertilitycare-replica/assets/logo-light.svg')) }}" alt="{{ setting('identity.site_name') }}" class="h-11 w-auto" />
        </a>
        <p class="mt-5 max-w-sm text-sm leading-relaxed text-slate-400">
          {{ setting('identity.footer_about') }}
        </p>

        @if (setting('identity.address') || setting('identity.contact_email') || setting('identity.contact_phone'))
          <ul class="mt-6 space-y-2 text-sm text-slate-400">
            @if (setting('identity.address'))
              <li class="flex items-start gap-2"><span class="material-symbols-outlined text-[18px] text-mint">location_on</span><span>{{ setting('identity.address') }}</span></li>
            @endif
            @if (setting('identity.contact_email'))
              <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[18px] text-mint">mail</span><a href="mailto:{{ setting('identity.contact_email') }}" class="transition hover:text-mint">{{ setting('identity.contact_email') }}</a></li>
            @endif
            @if (setting('identity.contact_phone'))
              <li class="flex items-center gap-2"><span class="material-symbols-outlined text-[18px] text-mint">call</span><a href="tel:{{ setting('identity.contact_phone') }}" class="transition hover:text-mint">{{ setting('identity.contact_phone') }}</a></li>
            @endif
          </ul>
        @endif

        <p class="mt-6 text-sm font-semibold text-white">Follow us</p>
        <div class="mt-3 flex items-center gap-3">
          @if (setting('identity.instagram_url'))
            <a href="{{ setting('identity.instagram_url') }}" target="_blank" rel="noopener" aria-label="Instagram" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 transition hover:bg-primary">
              <span class="material-symbols-outlined text-[20px]">photo_camera</span>
            </a>
          @endif
          @if (setting('identity.facebook_url'))
            <a href="{{ setting('identity.facebook_url') }}" target="_blank" rel="noopener" aria-label="Facebook" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 transition hover:bg-primary">
              <span class="material-symbols-outlined text-[20px]">thumb_up</span>
            </a>
          @endif
          @if (setting('identity.youtube_url'))
            <a href="{{ setting('identity.youtube_url') }}" target="_blank" rel="noopener" aria-label="YouTube" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 transition hover:bg-primary">
              <span class="material-symbols-outlined text-[20px]">smart_display</span>
            </a>
          @endif
          @if (setting('identity.twitter_url'))
            <a href="{{ setting('identity.twitter_url') }}" target="_blank" rel="noopener" aria-label="X" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 transition hover:bg-primary">
              <span class="material-symbols-outlined text-[20px]">tag</span>
            </a>
          @endif
          @if (setting('identity.linkedin_url'))
            <a href="{{ setting('identity.linkedin_url') }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 transition hover:bg-primary">
              <span class="material-symbols-outlined text-[20px]">work</span>
            </a>
          @endif
        </div>
      </div>

      <!-- Link columns -->
      <nav class="lg:col-span-2" aria-label="Explore the system">
        <h3 class="font-display text-sm font-bold uppercase tracking-wide text-white">Explore the system</h3>
        <ul class="mt-4 space-y-2.5 text-sm">
          <li><a href="/what-is-fertilitycare" class="transition hover:text-mint">What is FertilityCare</a></li>
          <li><a href="/creighton-model" class="transition hover:text-mint">Creighton Model</a></li>
          <li><a href="/naprotechnology" class="transition hover:text-mint">NaProTECHNOLOGY</a></li>
          <li><a href="/what-is-a-practitioner" class="transition hover:text-mint">What is a Practitioner</a></li>
          <li><a href="/faq" class="transition hover:text-mint">Frequently asked questions</a></li>
        </ul>
      </nav>

      <nav class="lg:col-span-2" aria-label="Support">
        <h3 class="font-display text-sm font-bold uppercase tracking-wide text-white">Support</h3>
        <ul class="mt-4 space-y-2.5 text-sm">
          <li><a href="/directory" class="transition hover:text-mint">Centers Directory</a></li>
          <li><a href="/directory/napro-doctors" class="transition hover:text-mint">NaPro consultant doctors</a></li>
          <li><a href="/testimonials" class="transition hover:text-mint">Testimonials</a></li>
        </ul>
      </nav>

      <nav class="lg:col-span-2" aria-label="Organization">
        <h3 class="font-display text-sm font-bold uppercase tracking-wide text-white">Organization</h3>
        <ul class="mt-4 space-y-2.5 text-sm">
          <li><a href="/about-us" class="transition hover:text-mint">About us</a></li>
          <li><a href="/professional-training" class="transition hover:text-mint">Professional training</a></li>
          <li><a href="/blog" class="transition hover:text-mint">Blog</a></li>
          <li><a href="/resources" class="transition hover:text-mint">Resources</a></li>
          <li><a href="/resources/scientific-articles" class="transition hover:text-mint">Scientific articles</a></li>
        </ul>
      </nav>

      <!-- Contact form -->
      <div class="lg:col-span-2">
        <h3 class="font-display text-sm font-bold uppercase tracking-wide text-white">{{ setting('blocks.contact_form_title') }}</h3>
        <p class="mt-4 text-sm text-slate-400">{{ setting('blocks.contact_form_intro') }}</p>
        <form id="contact-form" method="POST" action="{{ route('fc.contact.send') }}" class="mt-5 space-y-3" novalidate>
          @csrf
          <div>
            <label for="name" class="sr-only">Name</label>
            <input id="name" name="name" type="text" required placeholder="Name"
                   class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-2.5 text-sm text-white placeholder-slate-400 transition focus:border-mint focus:bg-white/10" />
          </div>
          <div>
            <label for="email" class="sr-only">Email</label>
            <input id="email" name="email" type="email" required placeholder="Email"
                   class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-2.5 text-sm text-white placeholder-slate-400 transition focus:border-mint focus:bg-white/10" />
          </div>
          <div>
            <label for="phone" class="sr-only">Phone</label>
            <input id="phone" name="phone" type="tel" placeholder="Phone"
                   class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-2.5 text-sm text-white placeholder-slate-400 transition focus:border-mint focus:bg-white/10" />
          </div>
          <div>
            <label for="subject" class="sr-only">I'm looking for</label>
            <select id="subject" name="subject" class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-mint focus:bg-white/10">
              <option value="" class="text-ink">I'm looking for</option>
              <option class="text-ink">Learn about the Creighton Model</option>
              <option class="text-ink">Care for infertility or other symptoms</option>
              <option class="text-ink">Contact a NaPro consultant doctor</option>
              <option class="text-ink">Professional training</option>
              <option class="text-ink">Institutional collaboration</option>
              <option class="text-ink">Press</option>
              <option class="text-ink">Other</option>
            </select>
          </div>
          <div>
            <label for="message" class="sr-only">Message</label>
            <textarea id="message" name="message" rows="3" required placeholder="Message"
                      class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-2.5 text-sm text-white placeholder-slate-400 transition focus:border-mint focus:bg-white/10"></textarea>
          </div>
          <label class="flex items-start gap-2 text-xs text-slate-400">
            <input type="checkbox" name="privacy" value="1" required class="mt-0.5 h-4 w-4 rounded border-white/30 bg-white/10 accent-mint" />
            <span>I have read and accept the <a href="/privacy-notice" class="font-semibold text-mint underline">privacy notice</a>.</span>
          </label>
          <button type="submit" class="w-full rounded-full bg-primary px-5 py-3 text-sm font-semibold text-white transition hover:bg-primary-dark">
            Send message
          </button>
          <p id="form-status" class="hidden text-xs font-semibold" role="status"></p>
        </form>
      </div>
    </div>

    <!-- Legal bar -->
    <div class="mt-14 flex flex-col items-center justify-between gap-4 border-t border-white/10 pt-8 text-sm text-slate-400 sm:flex-row">
      <p>{{ setting('identity.footer_copyright') }}</p>
      <ul class="flex flex-wrap items-center gap-x-6 gap-y-2">
        <li><a href="/privacy-notice" class="transition hover:text-mint">Privacy notice</a></li>
        <li><a href="/faq" class="transition hover:text-mint">Questions</a></li>
        <li><a href="/contact" class="transition hover:text-mint">Write to us</a></li>
      </ul>
    </div>
  </div>
</footer>
