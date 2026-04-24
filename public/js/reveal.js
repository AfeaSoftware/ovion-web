/**
 * Adds .is-visible to elements as they enter the viewport, then unobserves.
 * Used by detail pages and others for scroll-triggered reveal animations.
 *
 * Usage: window.OvionReveal.init('.hd-reveal', { threshold: 0.1 });
 */
(function () {
  function init(selector, opts = {}) {
    const els = document.querySelectorAll(selector);
    if (!els.length) return;
    const io = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('is-visible');
          io.unobserve(e.target);
        }
      });
    }, { threshold: opts.threshold ?? 0.1 });
    els.forEach(el => io.observe(el));
  }

  window.OvionReveal = { init };
})();
