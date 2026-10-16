{{--
  ============================================================================
  JAVASCRIPT — menu, accordion, reveals, smooth scroll, form (shared across pages)
  ============================================================================
--}}
<script>
  (function () {
    'use strict';
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---- Sticky header shadow on scroll ---- */
    var header = document.getElementById('site-header');
    var toTop = document.getElementById('to-top');
    function onScroll() {
      var y = window.scrollY || document.documentElement.scrollTop;
      if (header) header.classList.toggle('shadow-soft', y > 8);
      if (toTop) {
        toTop.classList.toggle('hidden', y < 500);
        toTop.classList.toggle('grid', y >= 500);
      }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ---- Mobile drawer + nested accordions ---- */
    var toggle = document.getElementById('menu-toggle');
    var mobileMenu = document.getElementById('mobile-menu');
    if (toggle && mobileMenu) {
      toggle.addEventListener('click', function () {
        var open = mobileMenu.classList.toggle('hidden') === false;
        toggle.setAttribute('aria-expanded', String(open));
        toggle.querySelector('.material-symbols-outlined').textContent = open ? 'close' : 'menu';
      });
      document.querySelectorAll('.m-nav-group > button').forEach(function (btn) {
        btn.addEventListener('click', function () {
          btn.parentElement.classList.toggle('open');
        });
      });
    }

    /* ---- FAQ accordion (single-open) ---- */
    var faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(function (item) {
      var q = item.querySelector('.faq-question');
      if (!q) return;
      q.addEventListener('click', function () {
        var isOpen = item.classList.contains('open');
        // Close siblings inside the same accordion group only, so that pages
        // with several FAQ groups behave independently.
        var siblings = item.parentElement
          ? item.parentElement.querySelectorAll(':scope > .faq-item')
          : [item];
        siblings.forEach(function (other) {
          other.classList.remove('open');
          var oq = other.querySelector('.faq-question');
          if (oq) oq.setAttribute('aria-expanded', 'false');
        });
        if (!isOpen) {
          item.classList.add('open');
          q.setAttribute('aria-expanded', 'true');
        }
      });
    });
    // Open the first FAQ by default
    if (faqItems.length) {
      faqItems[0].classList.add('open');
      var firstQ = faqItems[0].querySelector('.faq-question');
      if (firstQ) firstQ.setAttribute('aria-expanded', 'true');
    }

    /* ---- Scroll reveal ---- */
    var revealEls = document.querySelectorAll('.reveal');
    if (reduceMotion || !('IntersectionObserver' in window)) {
      revealEls.forEach(function (el) { el.classList.add('in'); });
    } else {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('in');
            io.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
      revealEls.forEach(function (el) { io.observe(el); });
    }

    /* ---- Pause background videos when off-screen (perf) ---- */
    if (!reduceMotion) {
      var videos = document.querySelectorAll('video');
      if ('IntersectionObserver' in window) {
        var vio = new IntersectionObserver(function (entries) {
          entries.forEach(function (e) {
            var v = e.target;
            if (e.isIntersecting) { v.play && v.play().catch(function () {}); }
            else { v.pause && v.pause(); }
          });
        }, { threshold: 0.25 });
        videos.forEach(function (v) { vio.observe(v); });
      }
    } else {
      document.querySelectorAll('video').forEach(function (v) { v.removeAttribute('autoplay'); v.pause && v.pause(); });
    }

    /* ---- Missing media fallback -------------------------------------------
       Real assets are dropped into /fertilitycare-replica/assets/ later
       (see the README there). Until an image or video file exists, swap it for
       the bundled placeholder so the layout still reads well. */
    var PLACEHOLDER = '/fertilitycare-replica/assets/placeholder.svg';

    function fallbackToPlaceholder(el) {
      if (el.dataset.fallback === '1') return;
      el.dataset.fallback = '1';
      var img = document.createElement('img');
      img.src = PLACEHOLDER;
      img.alt = el.getAttribute('aria-label') || '';
      img.className = el.className;
      img.loading = 'lazy';
      if (el.parentNode) el.parentNode.replaceChild(img, el);
    }

    document.querySelectorAll('img').forEach(function (img) {
      img.addEventListener('error', function () { fallbackToPlaceholder(img); });
      if (img.complete && img.naturalWidth === 0 && img.getAttribute('src')) {
        fallbackToPlaceholder(img);
      }
    });

    document.querySelectorAll('video').forEach(function (vid) {
      vid.addEventListener('error', function () { fallbackToPlaceholder(vid); }, true);
      var source = vid.querySelector('source');
      if (source) source.addEventListener('error', function () { fallbackToPlaceholder(vid); });
    });

    /* ---- Contact forms (POST to the server, show inline feedback) ---- */
    function wireContactForm(formId, statusId) {
      var form = document.getElementById(formId);
      var status = document.getElementById(statusId);
      if (!form || !status) return;

      form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }

        var button = form.querySelector('button[type="submit"]');
        if (button) button.disabled = true;

        status.classList.remove('hidden', 'text-danger', 'text-teal', 'text-mint');
        status.classList.add('text-slate-400');
        status.textContent = 'Sending…';

        var token = form.querySelector('input[name="_token"]');
        var headers = { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' };
        if (token) headers['X-CSRF-TOKEN'] = token.value;

        fetch(form.action, { method: 'POST', headers: headers, body: new FormData(form) })
          .then(function (response) {
            return response.json().then(function (data) { return { ok: response.ok, data: data }; });
          })
          .then(function (result) {
            status.classList.remove('text-slate-400');
            if (result.ok) {
              status.classList.add('text-mint', 'text-teal');
              status.textContent = result.data.message || 'Thank you! We received your message and will get back to you soon.';
              form.reset();
            } else {
              status.classList.add('text-danger');
              var first = result.data.errors ? Object.values(result.data.errors)[0][0] : null;
              status.textContent = first || result.data.message || 'Please review the form and try again.';
            }
          })
          .catch(function () {
            status.classList.remove('text-slate-400');
            status.classList.add('text-danger');
            status.textContent = 'Something went wrong. Please try again or email us directly.';
          })
          .finally(function () {
            if (button) button.disabled = false;
          });
      });
    }
    wireContactForm('contact-form', 'form-status');
    wireContactForm('contact-page-form', 'contact-page-status');
  })();
</script>
