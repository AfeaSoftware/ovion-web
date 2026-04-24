window.OvionSubnav?.init({
  list:    '.hd-subnav-links',
  link:    '.hd-subnav-link',
  prevBtn: '.hd-subnav-arrow--prev',
  nextBtn: '.hd-subnav-arrow--next',
  subnav:  '#hd-subnav',
});

window.OvionReveal?.init('.hd-reveal');

/* ── ANC interactive slider ── */
(function () {
  const slider  = document.getElementById('hd-anc-range');
  const display = document.getElementById('hd-anc-value');
  const caption = document.getElementById('hd-anc-caption');
  if (!slider || !display) return;

  const MAX_DB = 38;
  const captions = JSON.parse(slider.dataset.captions || '[]');

  const getCaption = pct => {
    if (pct < 0.15) return captions[0];
    if (pct < 0.35) return captions[1];
    if (pct < 0.60) return captions[2];
    if (pct < 0.85) return captions[3];
    return captions[4];
  };

  let animFrame;
  const animateTo = target => {
    cancelAnimationFrame(animFrame);
    const from = parseFloat(display.dataset.current || 0);
    const duration = 320;
    const start = performance.now();
    const tick = now => {
      const p = Math.min(1, (now - start) / duration);
      const ease = 1 - Math.pow(1 - p, 3);
      const val = from + (target - from) * ease;
      display.dataset.current = val;
      display.querySelector('.hd-anc-num').textContent = Math.round(val);
      if (p < 1) animFrame = requestAnimationFrame(tick);
    };
    animFrame = requestAnimationFrame(tick);
  };

  const update = () => {
    const raw = parseFloat(slider.value);
    const pct = raw / MAX_DB;
    slider.style.setProperty('--pct', (pct * 100).toFixed(1) + '%');
    animateTo(raw);
    if (caption) caption.textContent = getCaption(pct);
  };

  slider.addEventListener('input', update);

  const io = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) {
      let v = 0;
      const target = MAX_DB;
      const duration = 900;
      const start = performance.now();
      const tick = now => {
        const p = Math.min(1, (now - start) / duration);
        const ease = 1 - Math.pow(1 - p, 3);
        v = target * ease;
        slider.value = v.toFixed(1);
        slider.style.setProperty('--pct', (v / MAX_DB * 100).toFixed(1) + '%');
        display.dataset.current = v;
        display.querySelector('.hd-anc-num').textContent = Math.round(v);
        if (caption) caption.textContent = getCaption(v / MAX_DB);
        if (p < 1) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
      io.disconnect();
    }
  }, { threshold: 0.5 });
  const section = document.getElementById('pd-anc-features');
  if (section) io.observe(section);
  else io.observe(slider);

  update();
})();
