/**
 * Sticky sub-navigation: scroll arrows + active-section highlight + smooth click scroll.
 * Used by phone, watch and headphone detail pages.
 *
 * Usage: window.OvionSubnav.init({
 *   list:     '.pd-subnav-links',     // <ul> that overflows horizontally
 *   link:     '.pd-subnav-link',      // <a> selector inside the list
 *   prevBtn:  '.pd-subnav-arrow--prev',
 *   nextBtn:  '.pd-subnav-arrow--next',
 *   subnav:   '.pd-subnav',           // sticky container (for offset calc)
 * });
 */
(function () {
  const STEP = 140;
  const SCROLL_PADDING = 12;
  const NAV_FALLBACK = 64;
  const SUBNAV_FALLBACK = 48;
  const EXTRA_OFFSET = 8;

  function initArrows(list, prev, next) {
    if (!list || !prev || !next) return;
    const update = () => {
      const atStart = list.scrollLeft <= 2;
      const atEnd   = list.scrollLeft >= list.scrollWidth - list.clientWidth - 2;
      atStart ? prev.setAttribute('data-hidden', '') : prev.removeAttribute('data-hidden');
      atEnd   ? next.setAttribute('data-hidden', '') : next.removeAttribute('data-hidden');
    };
    prev.addEventListener('click', () => list.scrollBy({ left: -STEP, behavior: 'smooth' }));
    next.addEventListener('click', () => list.scrollBy({ left:  STEP, behavior: 'smooth' }));
    list.addEventListener('scroll', update, { passive: true });
    update();
  }

  function initActiveTracking(links, list, subnavEl) {
    if (!links.length) return;

    const map = {};
    links.forEach(a => {
      const id = a.getAttribute('href').slice(1);
      const el = document.getElementById(id);
      if (el) map[id] = a;
    });

    const scrollLinkIntoView = a => {
      if (!list) return;
      const li = a.closest('li');
      if (!li) return;
      const lr = list.getBoundingClientRect();
      const lir = li.getBoundingClientRect();
      if (lir.left < lr.left) list.scrollLeft -= lr.left - lir.left + SCROLL_PADDING;
      else if (lir.right > lr.right) list.scrollLeft += lir.right - lr.right + SCROLL_PADDING;
    };

    const setActive = id => {
      links.forEach(a => a.classList.remove('is-active'));
      if (map[id]) {
        map[id].classList.add('is-active');
        scrollLinkIntoView(map[id]);
      }
    };

    links.forEach(a => {
      a.addEventListener('click', e => {
        const id = a.getAttribute('href').slice(1);
        const target = document.getElementById(id);
        if (!target) return;
        e.preventDefault();
        const navH    = document.querySelector('.nav')?.offsetHeight || NAV_FALLBACK;
        const subnavH = subnavEl?.offsetHeight || SUBNAV_FALLBACK;
        window.scrollTo({
          top: target.getBoundingClientRect().top + window.scrollY - navH - subnavH - EXTRA_OFFSET,
          behavior: 'smooth',
        });
      });
    });

    const io = new IntersectionObserver(entries => {
      entries.forEach(e => { if (e.isIntersecting) setActive(e.target.id); });
    }, { rootMargin: '-30% 0px -60% 0px', threshold: 0 });

    Object.keys(map).forEach(id => {
      const el = document.getElementById(id);
      if (el) io.observe(el);
    });
  }

  function init(opts) {
    const list   = document.querySelector(opts.list);
    const prev   = document.querySelector(opts.prevBtn);
    const next   = document.querySelector(opts.nextBtn);
    const links  = document.querySelectorAll(`${opts.link}[href^="#"]`);
    const subnav = document.querySelector(opts.subnav);

    initArrows(list, prev, next);
    initActiveTracking(links, list, subnav);
  }

  window.OvionSubnav = { init };
})();
