const TWEAK_DEFAULTS = { "theme": "dark", "accent": "emerald", "lang": "en" };

const accents = {
  slate:  { a: "oklch(0.66 0.09 235)",  ink: "oklch(0.34 0.06 235)" },
  amber:  { a: "oklch(0.78 0.12 75)",   ink: "oklch(0.58 0.11 70)" },
  emerald:{ a: "oklch(0.72 0.11 160)",  ink: "oklch(0.48 0.09 160)" },
  ink:    { a: "oklch(0.40 0.01 260)",  ink: "oklch(0.25 0.01 260)" },
};

const i18n = {
  en: null,
  tr: {
    "#phone h1":            'Her güne göre<br/><em>tasarlanmış</em> telefon.',
    "#phone .lede":         "6.56 inç 90 Hz ekran, 50 MP yapay zekâ destekli kamera ve günü çıkaran 5000 mAh batarya. İstanbul'da tasarlandı, Türkiye'de üretildi.",
    "#design h2":           'Olması gereken yerde ince.<br/>Önemli yerde kalıcı.',
    "#design .kicker-sub":  "164 mm gövdede ergonomik 8.45 mm profil. İnci Beyazı yüzey parmak izine dirençli; alüminyum çerçeve her kenarda milimetrenin onda biri hassasiyetinde eşleşir.",
    "#camera h2":           "50 MP sensör, ışığı okumak için eğitildi.",
    "#camera .kicker-sub":  "Yapay zekâ sahne algılama, siz deklanşöre basmadan pozlamayı dengeler. Phase-detect otomatik odaklama 0.3 sn altında kilitlenir. HDR, gözünüzün affettiği ters ışığı düzeltir.",
    "#buy h2":              "Siz hazır olduğunuzda.",
  }
};

const tw = {
  apply(key, val, persist = true) {
    TWEAK_DEFAULTS[key] = val;
    if (key === "theme") document.body.dataset.theme = val;
    if (key === "accent") {
      const a = accents[val] || accents.slate;
      document.documentElement.style.setProperty("--accent", a.a);
      document.documentElement.style.setProperty("--accent-ink", a.ink);
    }
    if (key === "lang") {
      document.documentElement.lang = val;
      const strings = i18n[val];
      if (strings) {
        for (const sel in strings) {
          const el = document.querySelector(sel);
          if (el) el.innerHTML = strings[sel];
        }
      } else if (val === "en") {
        document.querySelectorAll("[data-en]").forEach(el => el.innerHTML = el.dataset.en);
      }
    }
    document.querySelectorAll(`.tweaks-btns[data-group="${key}"] button`).forEach(b => {
      b.setAttribute("aria-pressed", String(b.dataset.val === val));
    });
  }
};

["#phone h1", "#phone .lede", "#design h2", "#design .kicker-sub", "#camera h2", "#camera .kicker-sub", "#buy h2"]
  .forEach(sel => {
    const el = document.querySelector(sel);
    if (el) el.dataset.en = el.innerHTML;
  });

document.querySelectorAll(".tweaks-btns").forEach(group => {
  const key = group.dataset.group;
  group.querySelectorAll("button").forEach(btn => {
    btn.addEventListener("click", () => tw.apply(key, btn.dataset.val));
  });
});

Object.entries(TWEAK_DEFAULTS).forEach(([k, v]) => tw.apply(k, v, false));

// Animations
document.querySelectorAll('[data-split]').forEach(h => {
  const walk = (node, out) => {
    node.childNodes.forEach(c => {
      if (c.nodeType === 3) {
        c.textContent.split(/(\s+)/).forEach(chunk => {
          if (!chunk) return;
          if (/^\s+$/.test(chunk)) { out.appendChild(document.createTextNode(chunk)); return; }
          const s = document.createElement('span');
          s.className = 'w';
          s.style.setProperty('--i', out._i = (out._i||0) + 1);
          s.textContent = chunk;
          out.appendChild(s);
        });
      } else if (c.nodeType === 1) {
        if (c.tagName === 'BR') { out.appendChild(c.cloneNode()); return; }
        const wrap = c.cloneNode(false);
        wrap._i = out._i || 0;
        walk(c, wrap);
        out._i = wrap._i;
        out.appendChild(wrap);
      }
    });
  };
  const frag = document.createElement('span');
  walk(h, frag);
  h.innerHTML = '';
  while (frag.firstChild) h.appendChild(frag.firstChild);
});

document.querySelectorAll('.feature-list, .specs').forEach(group => {
  [...group.children].forEach((c, i) => c.style.setProperty('--i', i));
});

const io = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('in');
      if (e.target.dataset.count) animateCount(e.target);
      io.unobserve(e.target);
    }
  });
}, { threshold: 0.14 });

document.querySelectorAll('.section, .stat-strip, .hero, .buy, .stagger, .feature-list, .specs').forEach(s => {
  if (!s.classList.contains('stagger') && !s.classList.contains('feature-list') && !s.classList.contains('specs')) {
    s.classList.add('reveal');
  }
  io.observe(s);
});
document.querySelectorAll('[data-count]').forEach(n => io.observe(n));

function animateCount(el) {
  const target = parseFloat(el.dataset.count);
  const suffix = el.dataset.suffix || '';
  const decimals = parseInt(el.dataset.decimals || '0', 10);
  const dur = 1200;
  const start = performance.now();
  const fmt = (v) => (decimals ? v.toFixed(decimals) : Math.round(v).toLocaleString('en-US')) + suffix;
  const tick = (now) => {
    const t = Math.min(1, (now - start) / dur);
    const eased = 1 - Math.pow(1 - t, 3);
    el.textContent = fmt(target * eased);
    if (t < 1) requestAnimationFrame(tick);
    else el.textContent = fmt(target);
  };
  requestAnimationFrame(tick);
}

const heroImg = document.querySelector('.hero-media img');
const heroStage = document.querySelector('.hero-media');
const nav = document.querySelector('.nav');

const onScroll = () => {
  nav.classList.toggle('shrunk', window.scrollY > 40);
  if (heroImg && window.scrollY < window.innerHeight) {
    heroImg.style.setProperty('--sy', (window.scrollY * 0.06).toFixed(2) + 'px');
    heroImg.style.transform = `translate3d(var(--mx,0), calc(var(--my,0) + var(--sy,0)), 0) rotateY(var(--rx,0deg)) rotateX(var(--ry,0deg))`;
  }
};
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

if (heroStage && heroImg && !matchMedia('(prefers-reduced-motion: reduce)').matches) {
  heroStage.addEventListener('mousemove', (e) => {
    const r = heroStage.getBoundingClientRect();
    const px = (e.clientX - r.left) / r.width - 0.5;
    const py = (e.clientY - r.top) / r.height - 0.5;
    heroImg.style.setProperty('--mx', (px * 14).toFixed(2) + 'px');
    heroImg.style.setProperty('--my', (py * 10).toFixed(2) + 'px');
    heroImg.style.setProperty('--rx', (px * 3).toFixed(2) + 'deg');
    heroImg.style.setProperty('--ry', (-py * 3).toFixed(2) + 'deg');
    heroImg.style.transform = `translate3d(var(--mx), calc(var(--my) + var(--sy,0)), 0) rotateY(var(--rx)) rotateX(var(--ry))`;
  });
  heroStage.addEventListener('mouseleave', () => {
    heroImg.style.setProperty('--mx','0px');
    heroImg.style.setProperty('--my','0px');
    heroImg.style.setProperty('--rx','0deg');
    heroImg.style.setProperty('--ry','0deg');
  });
}

// ========== Scroll-Driven 3D Showcase ==========
(function () {
  const stage = document.querySelector('.scroll-stage');
  if (!stage) return;

  const imgs   = Array.from(stage.querySelectorAll('.scroll-img'));
  const texts  = Array.from(stage.querySelectorAll('.scroll-text'));
  const bar    = stage.querySelector('.scroll-progress-bar');
  const count  = imgs.length;
  let current  = 0;

  function setSlide(idx) {
    if (idx === current) return;
    imgs[current].classList.remove('is-active');
    texts[current].classList.remove('is-active');
    current = idx;
    imgs[current].classList.add('is-active');
    texts[current].classList.add('is-active');
  }

  function onScroll() {
    const rect     = stage.getBoundingClientRect();
    const total    = stage.offsetHeight - window.innerHeight;
    const progress = Math.max(0, Math.min(1, -rect.top / total));

    if (bar) bar.style.height = (progress * 100) + '%';

    const rawIdx = progress * count;
    const idx    = Math.min(count - 1, Math.floor(rawIdx));
    setSlide(idx);
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
})();
