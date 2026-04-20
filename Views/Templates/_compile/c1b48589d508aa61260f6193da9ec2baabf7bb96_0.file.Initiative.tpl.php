<?php
/* Smarty version 3.1.48, created on 2026-08-24 13:42:28
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Initiative.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8c2e24a1eb75_74858852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1b48589d508aa61260f6193da9ec2baabf7bb96' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Initiative.tpl',
      1 => 1787571732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8c2e24a1eb75_74858852 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="py-20 bg-white" id="initiative">
	<div class="max-w-[1280px] mx-auto px-12 grid md:grid-cols-2 gap-16 items-center">
		<div>
			<h2 class="text-[26px] font-bold text-[var(--brand-darker)] mb-6"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
			<p class="text-[15px] text-[var(--brand-darker)] leading-[1.7]"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['body'], ENT_QUOTES, 'UTF-8', true) ));?>
</p>
		</div>
		<div class="flex flex-col items-center">
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-full max-w-lg object-contain">
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['button_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="mt-6 bg-[var(--brand-blue-strong)] hover:bg-[var(--brand-blue)] text-white font-bold px-8 py-3 text-[13px] uppercase tracking-wider"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['initiative']->value['button_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
		</div>
	</div>
</section>
<?php }
}
