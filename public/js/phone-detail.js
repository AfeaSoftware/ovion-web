window.OvionSubnav?.init({
  list:    '.pd-subnav-links',
  link:    '.pd-subnav-link',
  prevBtn: '.pd-subnav-arrow--prev',
  nextBtn: '.pd-subnav-arrow--next',
  subnav:  '#pd-subnav',
});

window.OvionReveal?.init('.pd-reveal', { threshold: 0.12 });

/* ── Cinema scroll ── */
(function () {
  const wrap = document.querySelector('.pd-cinema-wrap');
  if (!wrap) return;

  const slides   = wrap.querySelectorAll('.pd-cinema-img');
  const captions = wrap.querySelectorAll('.pd-cinema-caption');
  const dots     = wrap.querySelectorAll('.pd-cinema-dot');
  const count = slides.length;
  if (!count) return;

  let current = -1;

  const show = idx => {
    if (idx === current) return;
    current = idx;
    slides.forEach((s, i) => s.classList.toggle('is-active', i === idx));
    captions.forEach((c, i) => c.classList.toggle('is-active', i === idx));
    dots.forEach((d, i) => d.classList.toggle('is-active', i === idx));
  };

  show(0);

  const onScroll = () => {
    const rect = wrap.getBoundingClientRect();
    const total = wrap.offsetHeight - window.innerHeight;
    const scrolled = -rect.top;
    const progress = Math.min(1, Math.max(0, scrolled / total));
    show(Math.min(count - 1, Math.floor(progress * count)));
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
})();

/* ── Spec strip count-up ── */
(function () {
  const strip = document.querySelector('.pd-specs-strip');
  if (!strip) return;

  const nums = strip.querySelectorAll('[data-countup]');
  if (!nums.length) return;

  const run = () => {
    nums.forEach(el => {
      const target = parseFloat(el.dataset.countup);
      const suffix = el.dataset.suffix || '';
      const duration = 900;
      const start = performance.now();
      const isFloat = target % 1 !== 0;
      const tick = now => {
        const p = Math.min(1, (now - start) / duration);
        const ease = 1 - Math.pow(1 - p, 3);
        const val = target * ease;
        el.textContent = (isFloat ? val.toFixed(2) : Math.round(val)) + suffix;
        if (p < 1) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
    });
  };

  const io = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) { run(); io.disconnect(); }
  }, { threshold: 0.5 });
  io.observe(strip);
})();
