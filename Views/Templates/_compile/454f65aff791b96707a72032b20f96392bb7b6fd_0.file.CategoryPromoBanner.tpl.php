<?php
/* Smarty version 3.1.48, created on 2026-10-02 09:21:08
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/CategoryPromoBanner.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abf5b64e5c130_34932079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '454f65aff791b96707a72032b20f96392bb7b6fd' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/CategoryPromoBanner.tpl',
      1 => 1790679987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abf5b64e5c130_34932079 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="flex flex-col md:flex-row items-stretch bg-[#3a3d42] text-white <?php echo (($tmp = @$_smarty_tpl->tpl_vars['banner_class']->value)===null||$tmp==='' ? 'mb-6' : $tmp);?>
">
	<div class="flex-1 flex items-center px-8 py-5">
		<h3 class="text-[28px] font-semibold uppercase text-white leading-tight">
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['category_banner']->value['title_text'], ENT_QUOTES, 'UTF-8', true) ));?>
</h3>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['categoryPromoThumbs']->value) {?>
		<div class="flex items-center gap-3 px-4 py-4 md:py-0">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryPromoThumbs']->value, 'thumb');
$_smarty_tpl->tpl_vars['thumb']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['thumb']->value) {
$_smarty_tpl->tpl_vars['thumb']->do_else = false;
?>
				<div class="w-[70px] h-[70px] rounded-full overflow-hidden border-2 border-white/20 shrink-0">
					<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thumb']->value, ENT_QUOTES, 'UTF-8', true);?>
" alt="" class="w-full h-full object-cover" loading="lazy">
				</div>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	<?php }?>
	<div
		class="bg-white text-[#222] px-8 py-5 flex flex-col items-center justify-center text-center min-w-[220px] md:min-w-[260px] border-t-[5px] border-r-[5px] border-b-[5px] border-[#3a3d42]">
		<div class="text-[34px] font-['Montserrat',sans-serif] font-semibold leading-none">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category_banner']->value['offer_value'], ENT_QUOTES, 'UTF-8', true);?>
</div>
		<div class="text-[14px] text-[#666] mt-1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category_banner']->value['offer_note'], ENT_QUOTES, 'UTF-8', true);?>
</div>
	</div>
</div>
<?php }
}
