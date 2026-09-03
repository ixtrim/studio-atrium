<section class="w-full max-w-[1200px] mx-auto px-4 my-16" id="steps-to-building-a-home">
    <div class="inline-block text-[#222] text-[26px] font-bold px-10 py-4 text-center"
        style="background:#7ec8ee;margin-left:-1rem">{$build_steps.meta.section_title|escape}</div>
    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-10">
        {foreach $build_steps.steps as $step}
        <div class="hp-build-step cursor-pointer" data-step-item="{$step@index}" role="button" tabindex="0"
            aria-expanded="false">
            <div class="flex items-start gap-5 text-left">
                <span
                    class="text-[var(--brand-blue-strong)] text-[28px] font-bold leading-none w-6 shrink-0">{$step.step_number|escape}</span>
                <div class="flex-1 min-w-0">
                    <span class="block text-[#222] text-[18px] font-bold leading-snug pt-1">{$step.step_title|escape}</span>
                    <div class="hp-step-rule-row mt-3 flex items-end">
                        <div class="hp-step-rule flex-1"></div>
                        <span class="hp-step-arrow shrink-0" aria-hidden="true"></span>
                    </div>
                </div>
            </div>
            <div id="step-panel-{$step@index}" class="hp-step-panel pointer-events-none">
                <p class="mt-4 ml-11 text-[18px] leading-[24px] text-[#555]">{$step.step_body|escape}</p>
            </div>
        </div>
        {/foreach}
    </div>
</section>

<style>
    #steps-to-building-a-home .hp-step-rule {
        border-bottom: 1px solid #bdbdbd !important;
        min-height: 1px;
        margin-bottom: 6px;
    }

    #steps-to-building-a-home .hp-step-arrow {
        display: block;
        position: relative;
        top: -2px;
        left: -2px;
        width: 10px;
        height: 10px;
        margin-bottom: 0;
        margin-left: 0;
        background: white !important;
        border: 0 !important;
        border-right: 1px solid #bdbdbd !important;
        border-bottom: 1px solid #bdbdbd !important;
        transform: rotate(45deg);
        transition: transform 0.3s ease;
    }

    #steps-to-building-a-home .hp-build-step[aria-expanded="true"] .hp-step-arrow {
        transform: rotate(225deg);
    }

    #steps-to-building-a-home .hp-step-panel {
        overflow: hidden;
        height: 0;
        opacity: 0;
        transition: height 0.45s ease, opacity 0.35s ease;
    }

    #steps-to-building-a-home .hp-step-panel.is-open {
        opacity: 1;
    }
</style>
<script>
(function () {
    function initBuildStepsAccordion() {
        var section = document.getElementById('steps-to-building-a-home');
        if (!section || section.dataset.stepsInit === '1') return;
        section.dataset.stepsInit = '1';

        function closeAll() {
            section.querySelectorAll('.hp-step-panel').forEach(function (panel) {
                panel.style.height = '0';
                panel.style.opacity = '0';
                panel.classList.remove('is-open');
            });
            section.querySelectorAll('[data-step-item]').forEach(function (item) {
                item.setAttribute('aria-expanded', 'false');
            });
        }

        function toggleStep(item) {
            var idx = item.getAttribute('data-step-item');
            var panel = document.getElementById('step-panel-' + idx);
            if (!panel) return;

            var isOpen = panel.classList.contains('is-open');
            closeAll();

            if (!isOpen) {
                panel.style.height = panel.scrollHeight + 'px';
                panel.style.opacity = '1';
                panel.classList.add('is-open');
                item.setAttribute('aria-expanded', 'true');

                panel.addEventListener('transitionend', function onEnd(e) {
                    if (e.propertyName === 'height' && panel.classList.contains('is-open')) {
                        panel.style.height = 'auto';
                    }
                    panel.removeEventListener('transitionend', onEnd);
                });
            }
        }

        section.querySelectorAll('[data-step-item]').forEach(function (item) {
            item.addEventListener('click', function () {
                toggleStep(item);
            });
            item.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    toggleStep(item);
                }
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initBuildStepsAccordion);
    } else {
        initBuildStepsAccordion();
    }
})();
</script>

<section class="w-full bg-[#f3f3f3]" id="our-experience">
    <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 items-center gap-8">
        <div class="py-16 md:pl-8">
            <h2 class="text-[28px] leading-[1.25] font-semibold text-[#222] uppercase tracking-wide">{$build_steps.experience.title|escape|nl2br nofilter}</h2>
            <div class="mt-8 text-[18px] leading-[24px] text-[#555]">{$build_steps.experience.body|escape|nl2br nofilter}</div>
            <p class="mt-8 italic font-semibold text-[18px] leading-[24px] text-[#222]">{$build_steps.experience.signature|escape}</p>
            {if $build_steps.experience.button_url}
            <a href="{$build_steps.experience.button_url|escape}"
                title="{$build_steps.experience.button_title|default:$build_steps.experience.button_label|escape}"
                rel="{$build_steps.experience.button_rel|default:'noopener noreferrer'|escape}"
                class="mt-8 inline-flex items-center justify-center bg-[#e63329] hover:bg-[#c92a21] text-white text-[13px] font-bold tracking-wider uppercase px-12 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none">{$build_steps.experience.button_label|escape}</a>
            {else}
            <button type="button"
                class="mt-8 inline-flex items-center justify-center bg-[#e63329] hover:bg-[#c92a21] text-white text-[13px] font-bold tracking-wider uppercase px-12 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none border-0">{$build_steps.experience.button_label|escape}</button>
            {/if}
        </div>
        {if $build_steps.experience.image_url}
        <div class="flex items-end justify-center"><img src="{$build_steps.experience.image_url|escape}"
                alt="{$build_steps.experience.image_alt|escape}" width="800" height="800" loading="lazy"
                class="max-h-[560px] w-auto object-contain relative top-[25px]"></div>
        {/if}
    </div>
</section>
