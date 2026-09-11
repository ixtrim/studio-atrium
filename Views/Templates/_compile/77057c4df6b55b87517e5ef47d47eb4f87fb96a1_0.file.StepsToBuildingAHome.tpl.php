<?php
/* Smarty version 3.1.48, created on 2026-09-23 13:49:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/StepsToBuildingAHome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3bcbab10de4_25218222',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77057c4df6b55b87517e5ef47d47eb4f87fb96a1' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/StepsToBuildingAHome.tpl',
      1 => 1788630454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ab3bcbab10de4_25218222 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="w-full max-w-[1420px] mx-auto px-4 my-16" id="steps-to-building-a-home">
    <h2 class="inline-block text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase px-10 py-4 text-center"
        style="background:#7ec8ee;margin-left:-1rem"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['build_steps']->value['meta']['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-10 px-[75px]">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['build_steps']->value['steps'], 'step');
$_smarty_tpl->tpl_vars['step']->index = -1;
$_smarty_tpl->tpl_vars['step']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['step']->value) {
$_smarty_tpl->tpl_vars['step']->do_else = false;
$_smarty_tpl->tpl_vars['step']->index++;
$__foreach_step_7_saved = $_smarty_tpl->tpl_vars['step'];
?>
            <div class="hp-build-step cursor-pointer" data-step-item="<?php echo $_smarty_tpl->tpl_vars['step']->index;?>
" role="button" tabindex="0"
                aria-expanded="false">
                <div class="flex items-start gap-5 text-left">
                    <span class="text-[34px] font-['Montserrat',sans-serif] font-semibold leading-none text-[var(--brand-blue-strong)] leading-none w-6 shrink-0 pt-1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['step']->value['step_number'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                    <div class="flex-1 min-w-0">
                        <span class="block text-[#222] text-[24px] font-bold leading-snug pt-1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['step']->value['step_title'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                        <div class="hp-step-rule-row mt-3 flex items-end">
                            <div class="hp-step-rule flex-1"></div>
                            <span class="hp-step-arrow shrink-0" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div id="step-panel-<?php echo $_smarty_tpl->tpl_vars['step']->index;?>
" class="hp-step-panel pointer-events-none">
                    <p class="mt-4 ml-11 text-[18px] leading-[24px] text-[#555]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['step']->value['step_body'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                </div>
            </div>
        <?php
$_smarty_tpl->tpl_vars['step'] = $__foreach_step_7_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
        top: -1px;
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
        transition: transform 0.3s ease, top 0.3s ease;
    }

    #steps-to-building-a-home .hp-build-step[aria-expanded="true"] .hp-step-arrow {
        top: -2px;
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
<?php echo '<script'; ?>
>
    (function() {
        function initBuildStepsAccordion() {
            var section = document.getElementById('steps-to-building-a-home');
            if (!section || section.dataset.stepsInit === '1') return;
            section.dataset.stepsInit = '1';

            function closeAll() {
                section.querySelectorAll('.hp-step-panel').forEach(function(panel) {
                    panel.style.height = '0';
                    panel.style.opacity = '0';
                    panel.classList.remove('is-open');
                });
                section.querySelectorAll('[data-step-item]').forEach(function(item) {
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

            section.querySelectorAll('[data-step-item]').forEach(function(item) {
                item.addEventListener('click', function() {
                    toggleStep(item);
                });
                item.addEventListener('keydown', function(e) {
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
<?php echo '</script'; ?>
>

<section class="w-full bg-[#f3f3f3]" id="our-experience">
    <div class="max-w-[1340px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 items-center gap-8">
        <div class="py-16 md:pl-8">
            <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight leading-[1.25] uppercase">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['build_steps']->value['experience']['title'], ENT_QUOTES, 'UTF-8', true) ));?>
</h2>
            <div class="mt-8 text-[18px] leading-[24px] text-[#555]">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['build_steps']->value['experience']['body'], ENT_QUOTES, 'UTF-8', true) ));?>
</div>
            <p class="mt-8 italic font-semibold text-[18px] leading-[24px] text-[#222]">
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['build_steps']->value['experience']['signature'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            <?php if ($_smarty_tpl->tpl_vars['build_steps']->value['experience']['button_url']) {?>
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['build_steps']->value['experience']['button_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                    title="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['build_steps']->value['experience']['button_title'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['build_steps']->value['experience']['button_label'] : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                    rel="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['build_steps']->value['experience']['button_rel'])===null||$tmp==='' ? 'noopener noreferrer' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                    class="mt-8 inline-flex items-center justify-center bg-[#e63329] hover:bg-[#c92a21] text-white text-[14px] font-extrabold leading-none tracking-normal uppercase px-12 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['build_steps']->value['experience']['button_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
            <?php } else { ?>
                <button type="button"
                    class="mt-8 inline-flex items-center justify-center bg-[#e63329] hover:bg-[#c92a21] text-white text-[14px] font-extrabold leading-none tracking-normal uppercase px-12 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 border-0"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['build_steps']->value['experience']['button_label'], ENT_QUOTES, 'UTF-8', true);?>
</button>
            <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['build_steps']->value['experience']['image_url']) {?>
            <div class="flex items-end justify-center"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['build_steps']->value['experience']['image_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                    alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['build_steps']->value['experience']['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
" width="800" height="800" loading="lazy"
                    class="max-h-[560px] w-auto object-contain relative top-[25px]"></div>
        <?php }?>
    </div>
</section><?php }
}
