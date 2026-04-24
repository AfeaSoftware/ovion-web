(function () {
  const links = document.querySelectorAll('.hd-subnav-link[href^="#"]');
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

(function () {
  const els = document.querySelectorAll('.hd-reveal');
  if (!els.length) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('is-visible');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  els.forEach(el => io.observe(el));
})();

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

(function () {
  const slider = document.getElementById('hd-anc-range');
  const display = document.getElementById('hd-anc-value');
  const caption = document.getElementById('hd-anc-caption');
  if (!slider || !display) return;

  const MAX_DB = 38;
  const captions = [
    'Gürültü engelleme kapalı — tüm çevre sesi geçer.',
    'Hafif azaltma — genel ofis gürültüsü.',
    'Orta seviye — trafik ve kalabalık için.',
    'Yüksek ANC — uçak ve metro gürültüsü.',
    'Maksimum — –38 dB tam gürültü engelleme.',
  ];

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
