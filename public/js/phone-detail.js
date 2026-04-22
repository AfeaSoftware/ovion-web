/* ── Subnav: highlight active section via IntersectionObserver ── */
(function () {
  const links = document.querySelectorAll('.pd-subnav-link[href^="#"]');
  if (!links.length) return;

  const map = {};
  links.forEach(a => {
    const id = a.getAttribute('href').slice(1);
    const el = document.getElementById(id);
    if (el) map[id] = a;
  });

  const setActive = id => {
    links.forEach(a => a.classList.remove('is-active'));
    if (map[id]) map[id].classList.add('is-active');
  };

  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) setActive(e.target.id); });
  }, { rootMargin: '-30% 0px -60% 0px', threshold: 0 });

  Object.keys(map).forEach(id => {
    const el = document.getElementById(id);
    if (el) observer.observe(el);
  });
})();

/* ── Scroll reveal ── */
(function () {
  const els = document.querySelectorAll('.pd-reveal');
  if (!els.length) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('is-visible');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  els.forEach(el => io.observe(el));
})();

/* ── Cinema scroll ── */
(function () {
  const wrap = document.querySelector('.pd-cinema-wrap');
  if (!wrap) return;

  const slides = wrap.querySelectorAll('.pd-cinema-img');
  const captions = wrap.querySelectorAll('.pd-cinema-caption');
  const dots = wrap.querySelectorAll('.pd-cinema-dot');
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
    const sticky = wrap.querySelector('.pd-cinema-sticky');
    const total = wrap.offsetHeight - window.innerHeight;
    const scrolled = -rect.top;
    const progress = Math.min(1, Math.max(0, scrolled / total));
    const idx = Math.min(count - 1, Math.floor(progress * count));
    show(idx);
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

/* ── Nav dropdown (same pattern as welcome.js) ── */
document.querySelectorAll('.nav-has-drop').forEach(li => {
  let closeTimer;
  const open  = () => { clearTimeout(closeTimer); li.classList.add('is-open'); };
  const close = () => { closeTimer = setTimeout(() => li.classList.remove('is-open'), 180); };
  li.addEventListener('mouseenter', open);
  li.addEventListener('mouseleave', close);
  const mega = li.querySelector('.nav-mega');
  if (mega) {
    mega.addEventListener('mouseenter', open);
    mega.addEventListener('mouseleave', close);
  }
});
