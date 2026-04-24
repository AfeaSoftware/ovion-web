window.OvionSubnav?.init({
  list:    '.pd-subnav-links',
  link:    '.wd-subnav-link',
  prevBtn: '.pd-subnav-arrow--prev',
  nextBtn: '.pd-subnav-arrow--next',
  subnav:  '.pd-subnav',
});

window.OvionReveal?.init('.wd-reveal');

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
