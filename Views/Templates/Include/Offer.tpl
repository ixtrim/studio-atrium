<section class="bg-[#3a3a3a] text-white py-20" id="offer">
    <div class="max-w-[1480px] mx-auto px-12 grid md:grid-cols-2 gap-16 items-start">
        <div>
            <h2 class="text-[36px] font-400 text-white tracking-tight mb-[24px] uppercase">{$offer.title|escape}</h2>
            <p class="text-[18px] leading-[24px] font-bold mb-[24px]">{$offer.lead_text|escape|nl2br}</p>
            <a href="{$offer.button_url|escape}"
                class="inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white font-bold px-8 py-3 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider mb-12">{$offer.button_label|escape}</a>

            {if $offer_quotes}
            <div class="hp-offer-quotes max-w-xl mx-auto" id="hp-offer-quotes" data-count="{$offer_quotes|@count}">
                <div class="hp-offer-quote-stage relative overflow-hidden">
                    {foreach $offer_quotes as $q}
                    <div class="hp-offer-quote-slide{if $q@first} is-active{/if}" data-index="{$q@index}"{if !$q@first} aria-hidden="true"{/if}>
                        {if $q.quote_text}
                        <blockquote class="text-center text-[22px] leading-snug px-4 m-0"
                            style="font-style:normal;font-weight:500"><span>“{$q.quote_text|escape}”</span></blockquote>
                        {/if}
                        {if $q.quote_author}
                        <div class="text-center text-sm mt-4">{$q.quote_author|escape}</div>
                        {/if}
                    </div>
                    {/foreach}
                </div>
                <div class="hp-offer-quote-pager flex justify-center items-center gap-3 mt-6 flex-wrap" role="tablist" aria-label="Cytaty">
                    {foreach $offer_quotes as $q}
                    <button type="button"
                        class="hp-offer-quote-logo group border-0 p-0 bg-transparent cursor-pointer opacity-45 hover:opacity-100 transition-opacity duration-300{if $q@first} is-active opacity-100{/if}"
                        data-index="{$q@index}"
                        aria-label="{if $q.logo_alt}{$q.logo_alt|escape}{else}Cytat {$q@iteration}{/if}"
                        aria-selected="{if $q@first}true{else}false{/if}">
                        {if $q.logo_url}
                        <img src="{$q.logo_url|escape}" alt="{$q.logo_alt|escape}"
                            class="w-12 h-10 object-contain bg-white p-1 block pointer-events-none">
                        {else}
                        <span class="inline-flex items-center justify-center w-12 h-10 bg-white/20 text-white text-[12px] font-bold">{$q@iteration}</span>
                        {/if}
                    </button>
                    {/foreach}
                </div>
                <div class="hp-offer-quote-autoplay mx-auto mt-4" aria-hidden="true">
                    <div class="hp-offer-quote-autoplay-track">
                        <div class="hp-offer-quote-autoplay-bar" id="hp-offer-autoplay-bar"></div>
                    </div>
                </div>
            </div>
            <style>
            #hp-offer-quotes .hp-offer-quote-stage {
              position: relative;
              overflow: hidden;
              width: 100%;
            }
            #hp-offer-quotes .hp-offer-quote-slide {
              position: absolute;
              left: 0;
              top: 0;
              width: 100%;
              opacity: 0;
              visibility: hidden;
              pointer-events: none;
              will-change: opacity, transform;
            }
            /* Keep first paint height stable until JS locks max height */
            #hp-offer-quotes:not([data-ready="1"]) .hp-offer-quote-slide.is-active {
              position: relative;
              opacity: 1;
              visibility: visible;
              pointer-events: auto;
            }
            #hp-offer-quotes .hp-offer-quote-logo.is-active {
              opacity: 1;
              outline: 2px solid #179fd4;
              outline-offset: 3px;
            }
            #hp-offer-quotes .hp-offer-quote-autoplay {
              width: min(220px, 70%);
            }
            #hp-offer-quotes .hp-offer-quote-autoplay-track {
              height: 2px;
              background: rgba(255,255,255,0.22);
              overflow: hidden;
            }
            #hp-offer-quotes .hp-offer-quote-autoplay-bar {
              height: 100%;
              width: 100%;
              background: #179fd4;
              transform-origin: left center;
              transform: scaleX(0);
            }
            </style>
            <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
            <script>
            (function () {
                var root = document.getElementById('hp-offer-quotes');
                if (!root || root.dataset.init === '1') return;
                root.dataset.init = '1';

                var stage = root.querySelector('.hp-offer-quote-stage');
                var slides = Array.prototype.slice.call(root.querySelectorAll('.hp-offer-quote-slide'));
                var logos = Array.prototype.slice.call(root.querySelectorAll('.hp-offer-quote-logo'));
                if (!stage || !slides.length) return;

                var index = 0;
                var AUTO_MS = 6500;
                var timer = null;
                var progressTween = null;
                var activeTl = null;
                var paused = false;
                var hasGsap = typeof gsap !== 'undefined';
                var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                var progressBar = document.getElementById('hp-offer-autoplay-bar');
                var autoplayWrap = root.querySelector('.hp-offer-quote-autoplay');

                if (slides.length < 2 && autoplayWrap) {
                    autoplayWrap.style.display = 'none';
                }

                function setActiveLogo(i) {
                    logos.forEach(function (btn, n) {
                        var on = n === i;
                        btn.classList.toggle('is-active', on);
                        btn.setAttribute('aria-selected', on ? 'true' : 'false');
                        btn.style.opacity = on ? '1' : '';
                    });
                }

                function stopProgress() {
                    if (progressTween) {
                        progressTween.kill();
                        progressTween = null;
                    }
                    if (progressBar && hasGsap) {
                        gsap.set(progressBar, { scaleX: 0 });
                    } else if (progressBar) {
                        progressBar.style.transform = 'scaleX(0)';
                    }
                }

                function startProgress() {
                    stopProgress();
                    if (!progressBar || slides.length < 2 || reduceMotion || paused) return;
                    if (hasGsap) {
                        progressTween = gsap.fromTo(progressBar,
                            { scaleX: 0 },
                            {
                                scaleX: 1,
                                duration: AUTO_MS / 1000,
                                ease: 'none',
                                transformOrigin: 'left center',
                                onComplete: function () {
                                    progressTween = null;
                                    goTo(index + 1, 1);
                                    armAuto();
                                }
                            }
                        );
                    }
                }

                function syncStageHeight() {
                    var maxH = 0;
                    slides.forEach(function (slide) {
                        maxH = Math.max(maxH, slide.scrollHeight || slide.offsetHeight || 0);
                    });
                    if (maxH > 0) {
                        stage.style.height = maxH + 'px';
                    }
                }

                function prepareSlides() {
                    slides.forEach(function (slide, n) {
                        var on = n === index;
                        slide.classList.toggle('is-active', on);
                        slide.setAttribute('aria-hidden', on ? 'false' : 'true');
                        if (hasGsap) {
                            gsap.set(slide, {
                                position: 'absolute',
                                left: 0,
                                top: 0,
                                width: '100%',
                                autoAlpha: on ? 1 : 0,
                                y: 0,
                                force3D: true
                            });
                        } else {
                            slide.style.position = 'absolute';
                            slide.style.left = '0';
                            slide.style.top = '0';
                            slide.style.width = '100%';
                            slide.style.opacity = on ? '1' : '0';
                            slide.style.visibility = on ? 'visible' : 'hidden';
                        }
                    });
                    syncStageHeight();
                    setActiveLogo(index);
                    root.dataset.ready = '1';
                }

                function goTo(next, dir) {
                    next = ((next % slides.length) + slides.length) % slides.length;
                    if (next === index) return;

                    var current = slides[index];
                    var upcoming = slides[next];
                    var direction = (dir || 1) > 0 ? 1 : -1;

                    if (activeTl) {
                        activeTl.kill();
                        activeTl = null;
                    }

                    if (!hasGsap || reduceMotion || slides.length < 2) {
                        current.classList.remove('is-active');
                        current.setAttribute('aria-hidden', 'true');
                        upcoming.classList.add('is-active');
                        upcoming.setAttribute('aria-hidden', 'false');
                        if (hasGsap) {
                            gsap.set(current, { autoAlpha: 0, y: 0 });
                            gsap.set(upcoming, { autoAlpha: 1, y: 0 });
                        } else {
                            current.style.opacity = '0';
                            current.style.visibility = 'hidden';
                            upcoming.style.opacity = '1';
                            upcoming.style.visibility = 'visible';
                        }
                        index = next;
                        setActiveLogo(index);
                        return;
                    }

                    upcoming.classList.add('is-active');
                    upcoming.setAttribute('aria-hidden', 'false');

                    activeTl = gsap.timeline({
                        defaults: { ease: 'sine.inOut', force3D: true },
                        onComplete: function () {
                            current.classList.remove('is-active');
                            current.setAttribute('aria-hidden', 'true');
                            gsap.set(current, { autoAlpha: 0, y: 0 });
                            gsap.set(upcoming, { autoAlpha: 1, y: 0 });
                            index = next;
                            setActiveLogo(index);
                            activeTl = null;
                        }
                    });

                    activeTl
                        .fromTo(current,
                            { autoAlpha: 1, y: 0 },
                            { autoAlpha: 0, y: -8 * direction, duration: 0.38 },
                            0
                        )
                        .fromTo(upcoming,
                            { autoAlpha: 0, y: 8 * direction },
                            { autoAlpha: 1, y: 0, duration: 0.42 },
                            0.04
                        );
                }

                function armAuto() {
                    clearInterval(timer);
                    timer = null;
                    stopProgress();
                    if (slides.length < 2 || reduceMotion || paused) return;

                    if (hasGsap && progressBar) {
                        startProgress();
                        return;
                    }

                    timer = setInterval(function () {
                        goTo(index + 1, 1);
                    }, AUTO_MS);
                }

                function pauseAuto() {
                    paused = true;
                    clearInterval(timer);
                    timer = null;
                    if (progressTween) {
                        progressTween.pause();
                    }
                }

                function resumeAuto() {
                    paused = false;
                    if (progressTween && progressTween.paused()) {
                        progressTween.resume();
                        return;
                    }
                    armAuto();
                }

                prepareSlides();

                logos.forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        var i = parseInt(btn.getAttribute('data-index'), 10) || 0;
                        var dir = i >= index ? 1 : -1;
                        goTo(i, dir);
                        armAuto();
                    });
                });

                if (slides.length > 1) {
                    armAuto();
                    root.addEventListener('mouseenter', pauseAuto);
                    root.addEventListener('mouseleave', resumeAuto);
                    root.addEventListener('focusin', pauseAuto);
                    root.addEventListener('focusout', function (e) {
                        if (!root.contains(e.relatedTarget)) resumeAuto();
                    });
                }

                var resizeTimer = null;
                window.addEventListener('resize', function () {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(syncStageHeight, 120);
                });
                if (document.fonts && document.fonts.ready) {
                    document.fonts.ready.then(syncStageHeight);
                }
            })();
            </script>
            {/if}
        </div>
        <div class="flex flex-col items-center">
            {if $offer.image_url}
            <img src="{$offer.image_url|escape}" alt="{$offer.image_alt|escape}" class="w-full max-w-md aspect-square object-cover">
            {/if}
            <div class="mt-4 text-[18px] font-bold uppercase tracking-wide">{$offer.image_caption|escape}</div>
        </div>
    </div>
</section>
