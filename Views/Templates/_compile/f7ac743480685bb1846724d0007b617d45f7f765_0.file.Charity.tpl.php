<?php
/* Smarty version 3.1.48, created on 2026-09-23 13:49:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Charity.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3bcbab4bb60_41161648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7ac743480685bb1846724d0007b617d45f7f765' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Charity.tpl',
      1 => 1788764618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ab3bcbab4bb60_41161648 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="py-20 bg-[#ECECEC]" id="charity">
	<div class="max-w-[1480px] mx-auto px-12 grid md:grid-cols-2 gap-[48px] items-center">
		<div class="flex items-center justify-center gap-12">
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['logo1_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['logo1_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-40 h-40 object-contain">
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['logo2_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['logo2_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-40 h-40 object-contain">
		</div>
		<div>
			<h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-6 uppercase"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
			<p class="text-[18px] leading-[24px] text-[var(--brand-darker)] max-w-[450px]"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['charity']->value['body'], ENT_QUOTES, 'UTF-8', true) ));?>
</p>
		</div>
	</div>
</section>
<?php }
}
