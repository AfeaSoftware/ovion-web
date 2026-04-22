/* ── Subnav active section ── */
(function () {
  const links = document.querySelectorAll('.wd-subnav-link[href^="#"]');
  if (!links.length) return;
  const map = {};
  links.forEach(a => { const id = a.getAttribute('href').slice(1); const el = document.getElementById(id); if (el) map[id] = a; });
  const setActive = id => { links.forEach(a => a.classList.remove('is-active')); if (map[id]) map[id].classList.add('is-active'); };
  const io = new IntersectionObserver(entries => { entries.forEach(e => { if (e.isIntersecting) setActive(e.target.id); }); }, { rootMargin: '-30% 0px -60% 0px' });
  Object.keys(map).forEach(id => { const el = document.getElementById(id); if (el) io.observe(el); });
})();

/* ── Scroll reveal ── */
(function () {
  const els = document.querySelectorAll('.wd-reveal');
  if (!els.length) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); } });
  }, { threshold: 0.1 });
  els.forEach(el => io.observe(el));
})();

/* ── Nav dropdown ── */
document.querySelectorAll('.nav-has-drop').forEach(li => {
  let t;
  const open  = () => { clearTimeout(t); li.classList.add('is-open'); };
  const close = () => { t = setTimeout(() => li.classList.remove('is-open'), 180); };
  li.addEventListener('mouseenter', open);
  li.addEventListener('mouseleave', close);
  const mega = li.querySelector('.nav-mega');
  if (mega) { mega.addEventListener('mouseenter', open); mega.addEventListener('mouseleave', close); }
});

/* ── Watch face card parallax tilt ── */
document.querySelectorAll('.wd-face-card').forEach(card => {
  card.addEventListener('mousemove', e => {
    const r = card.getBoundingClientRect();
    const x = (e.clientX - r.left) / r.width  - 0.5;
    const y = (e.clientY - r.top)  / r.height - 0.5;
    card.style.transform = `perspective(600px) rotateY(${x * 8}deg) rotateX(${-y * 8}deg) translateY(-4px)`;
  });
  card.addEventListener('mouseleave', () => { card.style.transform = ''; });
});
