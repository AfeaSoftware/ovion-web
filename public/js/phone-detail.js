window.OvionSubnav?.init({
  list:    '.pd-subnav-links',
  link:    '.pd-subnav-link',
  prevBtn: '.pd-subnav-arrow--prev',
  nextBtn: '.pd-subnav-arrow--next',
  subnav:  '#pd-subnav',
});

window.OvionReveal?.init('.pd-reveal', { threshold: 0.12 });

/* ── Cinema scroll swap (design block) ───────── */
(function () {
  const wrap = document.querySelector('.pd-story-cinema');
  if (!wrap) return;

  const slides = wrap.querySelectorAll('.pd-story-cinema-img');
  const caps   = wrap.querySelectorAll('.pd-story-cinema-cap');
  const dots   = wrap.querySelectorAll('.pd-story-cinema-dot');
  const count  = Math.max(slides.length, caps.length);
  if (!count) return;

  let current = -1;

  const show = (idx) => {
    if (idx === current) return;
    current = idx;
    slides.forEach((s, i) => s.classList.toggle('is-active', i === idx));
    caps.forEach(  (c, i) => c.classList.toggle('is-active', i === idx));
    dots.forEach(  (d, i) => d.classList.toggle('is-active', i === idx));
  };

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

/* ── Story sticky narrative ──────────────────── */
(function () {
  const story   = document.querySelector('.pd-story');
  if (!story) return;

  const blocks  = Array.from(story.querySelectorAll('.pd-story-block'));
  const visuals = Array.from(story.querySelectorAll('.pd-story-visual'));
  const fill    = story.querySelector('.pd-story-progress-fill');
  const track   = story.querySelector('.pd-story-track');
  if (!blocks.length || !visuals.length) return;

  const setActive = (idx) => {
    blocks.forEach(b => b.classList.toggle('is-active', b.dataset.storyIdx === idx));
    visuals.forEach(v => v.classList.toggle('is-active', v.dataset.storyIdx === idx));
  };

  // Pick whichever block's center is closest to viewport center.
  const sync = () => {
    const vc = window.innerHeight / 2;
    let best = blocks[0], bestDist = Infinity;
    for (const b of blocks) {
      const r = b.getBoundingClientRect();
      const c = (r.top + r.bottom) / 2;
      const d = Math.abs(c - vc);
      if (d < bestDist) { bestDist = d; best = b; }
    }
    setActive(best.dataset.storyIdx);

    if (fill && track) {
      const tr = track.getBoundingClientRect();
      const total = tr.height - window.innerHeight;
      const scrolled = -tr.top + window.innerHeight * 0.25;
      const progress = Math.min(1, Math.max(0, scrolled / total));
      fill.style.transform = `scaleY(${progress})`;
    }
  };

  window.addEventListener('scroll', sync, { passive: true });
  window.addEventListener('resize', sync);
  sync();
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
