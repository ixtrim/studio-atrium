{foreach $products_sections as $section}
<section class="{if $section@first}pt-[75px]{else}pt-[18px]{/if} {if $section@last}pb-[75px]{else}pb-[18px]{/if}" id="gallery-{$section.section_key|escape}">
    <div class="max-w-[1480px] mx-auto px-8">
        <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight leading-tight uppercase">{$section.section_title|escape}</h2>
        {if $section.section_subtitle}
        <p class="text-[18px] leading-[24px] text-[var(--brand-darker)]/80 mt-1 mb-8">{$section.section_subtitle|escape}</p>
        {else}
        <div class="mb-8"></div>
        {/if}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5" data-gallery-group="{$section.section_key|escape}">
            {foreach $section.items as $item}
            {if $item.image_url}
            <button type="button"
                class="hp-gallery-item group block w-full text-left border-0 p-0 cursor-pointer bg-transparent"
                data-gallery="{$section.section_key|escape}"
                data-gallery-src="{$item.image_url|escape}"
                data-gallery-title="{$item.title|escape}"
                data-gallery-desc="{$item.description|escape}">
                <div class="relative w-full aspect-[4/3] overflow-hidden bg-[#f3f3f3]">
                    <img src="{$item.image_url|escape}" alt="{$item.title|escape}"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                    <span class="pointer-events-none absolute inset-0 bg-[#1D99E1] opacity-0 transition-opacity duration-300 group-hover:opacity-60 z-[1]" aria-hidden="true"></span>
                    <div class="absolute top-6 left-6 right-6 z-[2] text-white">
                        {if $item.description}
                        <p class="text-[11px] font-bold uppercase tracking-wider leading-tight m-0"
                            style="text-shadow:0 1px 2px rgba(0,0,0,0.45)">{$item.description|escape}</p>
                        {/if}
                        {if $item.title}
                        <h3 class="text-[18px] font-bold uppercase leading-tight mt-1 m-0"
                            style="text-shadow:0 1px 3px rgba(0,0,0,0.5)">{$item.title|escape}</h3>
                        {/if}
                    </div>
                    <span class="pointer-events-none absolute bottom-6 right-6 z-[2] text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100" aria-hidden="true"
                        style="filter:drop-shadow(0 1px 2px rgba(0,0,0,0.45))">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </span>
                </div>
            </button>
            {/if}
            {/foreach}
        </div>
    </div>
</section>
{/foreach}

<div id="hp-gallery-lightbox" class="hp-gallery-lb fixed inset-0 hidden items-center justify-center p-4 md:p-8" aria-hidden="true" role="dialog">
    <div class="hp-gallery-lb-backdrop absolute inset-0 bg-black/80" data-gallery-close></div>
    <button type="button" class="hp-gallery-lb-nav hp-gallery-lb-prev" data-gallery-prev aria-label="Poprzednie">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
    </button>
    <button type="button" class="hp-gallery-lb-nav hp-gallery-lb-next" data-gallery-next aria-label="Następne">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
    </button>
    <figure class="hp-gallery-lb-panel relative z-10 max-w-[min(1100px,100%)] max-h-[min(90vh,100%)]">
        <button type="button" class="hp-gallery-lb-close absolute -top-11 right-0 text-white/80 hover:text-white text-[32px] leading-none border-0 bg-transparent cursor-pointer p-0" data-gallery-close aria-label="Zamknij">&times;</button>
        <div class="hp-gallery-lb-stage relative overflow-hidden">
            <div class="hp-gallery-lb-media relative inline-block max-w-full max-h-[min(85vh,100%)] overflow-hidden shadow-2xl align-middle">
                <img id="hp-gallery-lb-img" src="" alt="" class="block max-w-full max-h-[85vh] w-auto h-auto">
                <figcaption class="hp-gallery-lb-caption absolute top-0 left-0 right-0 bg-black/60 px-5 py-4 text-white text-left">
                    <div id="hp-gallery-lb-desc" class="text-[12px] font-bold uppercase tracking-wider leading-tight"></div>
                    <div id="hp-gallery-lb-title" class="text-[20px] md:text-[22px] font-bold uppercase leading-tight mt-1"></div>
                </figcaption>
            </div>
        </div>
        <div id="hp-gallery-lb-counter" class="hp-gallery-lb-counter mt-3 text-center text-white/70 text-[13px] tracking-widest tabular-nums"></div>
    </figure>
</div>
<style>
#hp-gallery-lightbox {
  z-index: 2147483000 !important;
}
#hp-gallery-lightbox .hp-gallery-lb-backdrop {
  opacity: 0;
  transition: opacity 0.45s cubic-bezier(0.22, 1, 0.36, 1);
}
#hp-gallery-lightbox .hp-gallery-lb-panel {
  opacity: 0;
  transform: translateY(28px) scale(0.94);
  transition: opacity 0.5s cubic-bezier(0.22, 1, 0.36, 1),
              transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
  will-change: opacity, transform;
}
#hp-gallery-lightbox .hp-gallery-lb-caption {
  opacity: 0;
  transform: translateY(12px);
  transition: opacity 0.4s cubic-bezier(0.22, 1, 0.36, 1) 0.12s,
              transform 0.4s cubic-bezier(0.22, 1, 0.36, 1) 0.12s;
}
#hp-gallery-lightbox .hp-gallery-lb-close,
#hp-gallery-lightbox .hp-gallery-lb-nav,
#hp-gallery-lightbox .hp-gallery-lb-counter {
  opacity: 0;
  transition: opacity 0.35s ease 0.15s, color 0.2s ease, background-color 0.2s ease, transform 0.2s ease, border-color 0.2s ease;
}
#hp-gallery-lightbox .hp-gallery-lb-nav {
  position: absolute;
  top: 50%;
  z-index: 20;
  transform: translateY(-50%);
  width: 52px;
  height: 52px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0;
  padding: 0;
  border-radius: 0;
  background: transparent;
  color: #fff;
  cursor: pointer;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  box-shadow: none;
  outline: none;
  appearance: none;
}
#hp-gallery-lightbox .hp-gallery-lb-prev { left: max(0.75rem, env(safe-area-inset-left, 0px) + 0.75rem); }
#hp-gallery-lightbox .hp-gallery-lb-next { right: max(0.75rem, env(safe-area-inset-right, 0px) + 0.75rem); }
@media (min-width: 1100px) {
  #hp-gallery-lightbox .hp-gallery-lb-prev { left: calc(50% - min(550px, 42vw) - 4.5rem); }
  #hp-gallery-lightbox .hp-gallery-lb-next { right: calc(50% - min(550px, 42vw) - 4.5rem); }
}
@media (max-width: 900px) {
  #hp-gallery-lightbox .hp-gallery-lb-nav { width: 42px; height: 42px; }
}
#hp-gallery-lightbox .hp-gallery-lb-nav:hover {
  background: rgba(29,153,225,0.85);
  border-color: transparent;
  transform: translateY(-50%) scale(1.05);
}
#hp-gallery-lightbox .hp-gallery-lb-nav:active {
  transform: translateY(-50%) scale(0.96);
}
#hp-gallery-lightbox .hp-gallery-lb-nav.is-hidden { visibility: hidden; pointer-events: none; }
#hp-gallery-lightbox .hp-gallery-lb-media {
  transition: transform 0.42s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.42s cubic-bezier(0.22, 1, 0.36, 1);
  will-change: transform, opacity;
}
#hp-gallery-lightbox .hp-gallery-lb-media.is-exit-next {
  transform: translateX(-36px) scale(0.98);
  opacity: 0;
}
#hp-gallery-lightbox .hp-gallery-lb-media.is-exit-prev {
  transform: translateX(36px) scale(0.98);
  opacity: 0;
}
#hp-gallery-lightbox .hp-gallery-lb-media.is-enter-next {
  transform: translateX(36px) scale(0.98);
  opacity: 0;
  transition: none;
}
#hp-gallery-lightbox .hp-gallery-lb-media.is-enter-prev {
  transform: translateX(-36px) scale(0.98);
  opacity: 0;
  transition: none;
}
#hp-gallery-lightbox.is-open { display: flex !important; }
#hp-gallery-lightbox.is-open .hp-gallery-lb-backdrop { opacity: 1; }
#hp-gallery-lightbox.is-open .hp-gallery-lb-panel {
  opacity: 1;
  transform: translateY(0) scale(1);
}
#hp-gallery-lightbox.is-open .hp-gallery-lb-caption {
  opacity: 1;
  transform: translateY(0);
}
#hp-gallery-lightbox.is-open .hp-gallery-lb-close,
#hp-gallery-lightbox.is-open .hp-gallery-lb-nav:not(.is-hidden),
#hp-gallery-lightbox.is-open .hp-gallery-lb-counter { opacity: 1; }
#hp-gallery-lb-desc:empty,
#hp-gallery-lb-title:empty { display: none; }
#hp-gallery-lb-desc:empty + #hp-gallery-lb-title { margin-top: 0; }
</style>
<script>
(function () {
    var lb = document.getElementById('hp-gallery-lightbox');
    if (!lb || lb.dataset.init === '1') return;
    lb.dataset.init = '1';

    var img = document.getElementById('hp-gallery-lb-img');
    var titleEl = document.getElementById('hp-gallery-lb-title');
    var descEl = document.getElementById('hp-gallery-lb-desc');
    var counterEl = document.getElementById('hp-gallery-lb-counter');
    var media = lb.querySelector('.hp-gallery-lb-media');
    var prevBtn = lb.querySelector('[data-gallery-prev]');
    var nextBtn = lb.querySelector('[data-gallery-next]');
    var CLOSE_MS = 480;
    var SLIDE_MS = 420;
    var slides = [];
    var index = 0;
    var animating = false;

    function readItems(galleryId) {
        var nodes = document.querySelectorAll('.hp-gallery-item[data-gallery="' + galleryId + '"]');
        var list = [];
        for (var i = 0; i < nodes.length; i++) {
            list.push({
                src: nodes[i].getAttribute('data-gallery-src') || '',
                title: nodes[i].getAttribute('data-gallery-title') || '',
                desc: nodes[i].getAttribute('data-gallery-desc') || ''
            });
        }
        return list;
    }

    function applyContent(slide) {
        img.src = slide.src;
        img.alt = slide.title || '';
        titleEl.textContent = slide.title || '';
        descEl.textContent = slide.desc || '';
        counterEl.textContent = slides.length > 1 ? (index + 1) + ' / ' + slides.length : '';
    }

    function syncNav() {
        var multi = slides.length > 1;
        prevBtn.classList.toggle('is-hidden', !multi);
        nextBtn.classList.toggle('is-hidden', !multi);
        counterEl.style.display = multi ? '' : 'none';
    }

    function openLb(galleryId, startIndex) {
        slides = readItems(galleryId);
        if (!slides.length) return;
        index = Math.max(0, Math.min(startIndex || 0, slides.length - 1));
        media.classList.remove('is-exit-next', 'is-exit-prev', 'is-enter-next', 'is-enter-prev');
        media.style.transition = '';
        applyContent(slides[index]);
        syncNav();
        animating = false;
        if (lb.parentNode !== document.body) {
            document.body.appendChild(lb);
        }
        lb.classList.remove('hidden');
        lb.setAttribute('aria-hidden', 'false');
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                lb.classList.add('is-open');
            });
        });
        document.body.classList.add('noScroll');
    }

    function closeLb() {
        lb.classList.remove('is-open');
        lb.setAttribute('aria-hidden', 'true');
        setTimeout(function () {
            if (!lb.classList.contains('is-open')) {
                lb.classList.add('hidden');
                img.src = '';
                slides = [];
            }
        }, CLOSE_MS);
        document.body.classList.remove('noScroll');
    }

    function go(delta) {
        if (!lb.classList.contains('is-open') || slides.length < 2 || animating) return;
        animating = true;
        var nextIndex = (index + delta + slides.length) % slides.length;
        var exitClass = delta > 0 ? 'is-exit-next' : 'is-exit-prev';
        var enterClass = delta > 0 ? 'is-enter-next' : 'is-enter-prev';

        media.classList.remove('is-exit-next', 'is-exit-prev', 'is-enter-next', 'is-enter-prev');
        void media.offsetWidth;
        media.classList.add(exitClass);

        setTimeout(function () {
            index = nextIndex;
            applyContent(slides[index]);
            media.classList.remove(exitClass);
            media.classList.add(enterClass);
            void media.offsetWidth;
            media.classList.remove(enterClass);
            setTimeout(function () {
                animating = false;
            }, SLIDE_MS);
        }, SLIDE_MS);
    }

    document.addEventListener('click', function (e) {
        var item = e.target.closest('.hp-gallery-item');
        if (item) {
            e.preventDefault();
            var galleryId = item.getAttribute('data-gallery') || '';
            var siblings = document.querySelectorAll('.hp-gallery-item[data-gallery="' + galleryId + '"]');
            var startIndex = Array.prototype.indexOf.call(siblings, item);
            openLb(galleryId, startIndex < 0 ? 0 : startIndex);
            return;
        }
        if (e.target.closest('[data-gallery-close]')) {
            closeLb();
            return;
        }
        if (e.target.closest('[data-gallery-prev]')) {
            go(-1);
            return;
        }
        if (e.target.closest('[data-gallery-next]')) {
            go(1);
        }
    });

    document.addEventListener('keydown', function (e) {
        if (!lb.classList.contains('is-open')) return;
        if (e.key === 'Escape') closeLb();
        else if (e.key === 'ArrowLeft') { e.preventDefault(); go(-1); }
        else if (e.key === 'ArrowRight') { e.preventDefault(); go(1); }
    });
})();
</script>
