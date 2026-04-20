<?php
/* Smarty version 3.1.48, created on 2026-08-24 13:42:28
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Charity.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8c2e24a22452_25674083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7ac743480685bb1846724d0007b617d45f7f765' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Charity.tpl',
      1 => 1787571392,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8c2e24a22452_25674083 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="py-20 bg-[#ECECEC]" id="charity">
	<div class="max-w-[1280px] mx-auto px-12 grid md:grid-cols-2 gap-16 items-center">
		<div class="flex items-center justify-center gap-12">
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['logo1_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['logo1_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-40 h-40 object-contain">
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['logo2_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['logo2_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-40 h-40 object-contain">
		</div>
		<div>
			<h2 class="text-[26px] font-bold text-[var(--brand-darker)] mb-6"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
			<p class="text-[15px] text-[var(--brand-darker)] leading-[1.7] max-w-[450px]"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['body'], ENT_QUOTES, 'UTF-8', true) ));?>
</p>
		</div>
	</div>
</section>
<?php }
}
