@php
use Afea\Cms\Popup\Enums\PopupTriggerType;
@endphp

@foreach($popups as $popup)
@php
    $trigger   = $popup->triggerType();
    $rules     = $popup->display_rules ?? [];
    $delay     = (int) ($rules['delay_seconds'] ?? 3);
    $scroll    = (int) ($rules['scroll_percentage'] ?? 50);
    $showOnce  = $popup->show_once;
    $mediaUrl  = $popup->getFirstMediaUrl('popups/images', 'webp') ?: $popup->getFirstMediaUrl('popups/images');
    if ($mediaUrl) {
        $mediaUrl = preg_replace('#^https?://[^/]+#', '', $mediaUrl);
    }
@endphp

<div
    class="popup-overlay"
    id="popup-{{ $popup->id }}"
    role="dialog"
    aria-modal="true"
    aria-label="{{ $popup->title ?? 'Bildirim' }}"
    data-popup-id="{{ $popup->id }}"
    data-trigger="{{ $trigger?->value ?? 'immediate' }}"
    data-delay="{{ $delay }}"
    data-scroll="{{ $scroll }}"
    data-show-once="{{ $showOnce ? 'true' : 'false' }}"
    hidden
>
    <div class="popup-backdrop" data-close-popup></div>

    <div class="popup-card">
        <button class="popup-close" data-close-popup aria-label="Kapat">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                <path d="M4 4l10 10M14 4L4 14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
            </svg>
        </button>

        @if($mediaUrl)
            <div class="popup-media">
                @if($popup->image_url)
                    <a href="{{ $popup->image_url }}" target="_blank" rel="noopener">
                        <img src="{{ $mediaUrl }}" alt="{{ $popup->title ?? '' }}" loading="lazy" />
                    </a>
                @else
                    <img src="{{ $mediaUrl }}" alt="{{ $popup->title ?? '' }}" loading="lazy" />
                @endif
            </div>
        @endif

        <div class="popup-body">
            @if($popup->title)
                <h3 class="popup-title">{{ $popup->title }}</h3>
            @endif

            @if($popup->description)
                <p class="popup-desc">{{ $popup->description }}</p>
            @endif

            @if($popup->content)
                <div class="popup-content">{!! $popup->content !!}</div>
            @endif

            @if($popup->button_text && $popup->button_url)
                <a
                    href="{{ $popup->button_url }}"
                    class="popup-cta btn btn-primary"
                    target="{{ str_starts_with($popup->button_url, 'http') ? '_blank' : '_self' }}"
                    rel="noopener"
                >{{ $popup->button_text }}</a>
            @endif
        </div>
    </div>
</div>
@endforeach

<style>
/* ── Popup overlay ── */
.popup-overlay {
    position: fixed;
    inset: 0;
    z-index: 9000;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
}
.popup-overlay[hidden] { display: none; }
.popup-overlay.popup-visible { display: flex; }

.popup-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, .65);
    backdrop-filter: blur(4px);
    cursor: pointer;
}

/* ── Popup card ── */
.popup-card {
    position: relative;
    z-index: 1;
    background: var(--bg-2, #1a1c20);
    border: 1px solid rgba(255, 255, 255, .08);
    border-radius: 20px;
    width: 100%;
    max-width: 520px;
    max-height: 90vh;
    overflow-y: auto;
    overflow-x: hidden;
    box-shadow: 0 24px 80px rgba(0, 0, 0, .6);
    animation: popup-in .28s cubic-bezier(.34,1.56,.64,1) both;
}

@keyframes popup-in {
    from { opacity: 0; transform: scale(.88) translateY(16px); }
    to   { opacity: 1; transform: none; }
}

/* ── Close button ── */
.popup-close {
    position: absolute;
    top: 14px;
    right: 14px;
    z-index: 2;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(255, 255, 255, .08);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, .7);
    transition: background .15s;
}
.popup-close:hover { background: rgba(255, 255, 255, .16); }

/* ── Media ── */
.popup-media {
    width: 100%;
    max-height: 280px;
    overflow: hidden;
    border-radius: 20px 20px 0 0;
}
.popup-media img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    display: block;
}
.popup-media a { display: block; }

/* ── Body ── */
.popup-body {
    padding: 28px 28px 32px;
}
.popup-title {
    font-size: 22px;
    font-weight: 700;
    letter-spacing: -.02em;
    color: #fff;
    margin: 0 0 10px;
    padding-right: 24px;
}
.popup-desc {
    font-size: 14px;
    color: rgba(255, 255, 255, .6);
    line-height: 1.65;
    margin: 0 0 16px;
}
.popup-content {
    font-size: 14px;
    color: rgba(255, 255, 255, .7);
    line-height: 1.65;
    margin-bottom: 20px;
}
.popup-content p { margin: 0 0 12px; }
.popup-content a { color: var(--accent, #e8a845); }
.popup-cta {
    display: inline-flex;
    margin-top: 8px;
}

/* ── Mobile ── */
@media (max-width: 560px) {
    .popup-card {
        border-radius: 16px;
        max-height: 85vh;
    }
    .popup-body { padding: 20px 20px 24px; }
    .popup-title { font-size: 18px; }
    .popup-media { max-height: 200px; }
    .popup-media img { height: 200px; }
}
</style>

<script>
(function () {
    'use strict';

    var STORAGE_PREFIX = 'ovion_popup_shown_';

    function isShown(id) {
        try { return !!localStorage.getItem(STORAGE_PREFIX + id); } catch { return false; }
    }

    function markShown(id) {
        try { localStorage.setItem(STORAGE_PREFIX + id, '1'); } catch {}
    }

    function showPopup(el) {
        el.removeAttribute('hidden');
        el.classList.add('popup-visible');
        document.body.style.overflow = 'hidden';
    }

    function hidePopup(el) {
        el.setAttribute('hidden', '');
        el.classList.remove('popup-visible');
        document.body.style.overflow = '';

        var id = el.dataset.popupId;
        if (el.dataset.showOnce === 'true') {
            markShown(id);
        }
    }

    function initPopup(el) {
        var id       = el.dataset.popupId;
        var trigger  = el.dataset.trigger || 'immediate';
        var delay    = parseInt(el.dataset.delay, 10) || 3;
        var scroll   = parseInt(el.dataset.scroll, 10) || 50;
        var showOnce = el.dataset.showOnce === 'true';

        if (showOnce && isShown(id)) return;

        // Close handlers
        el.querySelectorAll('[data-close-popup]').forEach(function (btn) {
            btn.addEventListener('click', function () { hidePopup(el); });
        });
        el.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') hidePopup(el);
        });

        function show() { showPopup(el); }

        if (trigger === 'immediate') {
            show();

        } else if (trigger === 'delay') {
            setTimeout(show, delay * 1000);

        } else if (trigger === 'scroll') {
            function onScroll() {
                var pct = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
                if (pct >= scroll) {
                    window.removeEventListener('scroll', onScroll);
                    show();
                }
            }
            window.addEventListener('scroll', onScroll, { passive: true });

        } else if (trigger === 'exit_intent') {
            // Desktop: mouse leaves top of viewport
            var fired = false;
            document.addEventListener('mouseleave', function (e) {
                if (!fired && e.clientY <= 0) {
                    fired = true;
                    show();
                }
            });
            // Mobile: page visibility change (user switches app/tab)
            document.addEventListener('visibilitychange', function () {
                if (!fired && document.visibilityState === 'hidden') {
                    fired = true;
                    // Can't show while hidden, queue for next visit
                    if (showOnce) return; // don't penalize
                }
            });
            // Mobile fallback: show after 30s of inactivity
            var inactivityTimer = setTimeout(function () {
                if (!fired) { fired = true; show(); }
            }, 30000);
            ['touchstart', 'touchmove', 'click'].forEach(function (ev) {
                document.addEventListener(ev, function () {
                    clearTimeout(inactivityTimer);
                    inactivityTimer = setTimeout(function () {
                        if (!fired) { fired = true; show(); }
                    }, 30000);
                }, { passive: true });
            });
        }
    }

    document.querySelectorAll('.popup-overlay').forEach(initPopup);
})();
</script>
