<?php
/* Smarty version 3.1.48, created on 2026-09-23 13:49:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Initiative.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3bcbab485e2_60098361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1b48589d508aa61260f6193da9ec2baabf7bb96' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Initiative.tpl',
      1 => 1788764329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ab3bcbab485e2_60098361 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="py-20 bg-white" id="initiative">
	<div class="max-w-[1480px] mx-auto px-12 grid md:grid-cols-2 gap-[48px] items-center">
		<div>
			<h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-6 uppercase"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
			<p class="text-[18px] leading-[24px] text-[var(--brand-darker)]"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['body'], ENT_QUOTES, 'UTF-8', true) ));?>
</p>
		</div>
		<div class="flex flex-col items-center">
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-full max-w-lg object-contain">
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['button_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="mt-6 inline-flex items-center justify-center bg-[var(--brand-blue-strong)] hover:bg-[var(--brand-blue)] text-white font-bold px-8 py-3 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['button_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
		</div>
	</div>
</section>
<?php }
}
