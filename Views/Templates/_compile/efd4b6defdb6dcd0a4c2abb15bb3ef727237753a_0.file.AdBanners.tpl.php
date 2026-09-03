<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/AdBanners.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165ac563_37124413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efd4b6defdb6dcd0a4c2abb15bb3ef727237753a' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/AdBanners.tpl',
      1 => 1788439325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165ac563_37124413 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="bg-white py-8" aria-label="Reklamy partnerów">
	<div class="max-w-[1480px] mx-auto px-8 grid grid-cols-1 md:grid-cols-3 gap-4">
		<?php if ($_smarty_tpl->tpl_vars['banner']->value && $_smarty_tpl->tpl_vars['bannerUrl']->value) {?>
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" rel="noopener noreferrer nofollow"
			class="border border-[#e5e5e5] bg-[#f5f5f5] h-[140px] flex items-center justify-center px-6 hover:border-[#ccc] transition-colors">
			<img src="<?php echo $_smarty_tpl->tpl_vars['bannerUrl']->value;?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value['banner'], ENT_QUOTES, 'UTF-8', true);?>
" alt="" class="max-h-[100px] max-w-full object-contain" loading="lazy"
				width="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['banner']->value['width'])===null||$tmp==='' ? 300 : $tmp);?>
" height="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['banner']->value['height'])===null||$tmp==='' ? 100 : $tmp);?>
">
		</a>
		<?php } else { ?>
		<a href="/projekt-indywidualny.html" class="border border-[#e5e5e5] bg-[#f5f5f5] h-[140px] flex items-center justify-center px-6 hover:border-[#ccc] transition-colors">
			<img src="/img/indywidualne.jpg" alt="Indywidualne projekty domów" class="max-h-[100px] max-w-full object-contain" loading="lazy">
		</a>
		<?php }?>
		<a href="https://aluprof.eu" target="_blank" rel="noopener noreferrer" class="border border-[#e5e5e5] bg-[#f5f5f5] h-[140px] flex items-center justify-center px-6 hover:border-[#ccc] transition-colors">
			<img src="https://media.studioatrium.pl/document/1309/samll-logo.png" alt="Aluprof" class="max-h-[100px] max-w-full object-contain" loading="lazy">
		</a>
		<a href="https://www.fakro.pl" target="_blank" rel="noopener noreferrer" class="border border-[#e5e5e5] bg-[#f5f5f5] h-[140px] flex items-center justify-center px-6 hover:border-[#ccc] transition-colors">
			<img src="https://media.studioatrium.pl/document/1179/fakro.jpg" alt="Fakro" class="max-h-[100px] max-w-full object-contain" loading="lazy">
		</a>
	</div>
</section>
<?php }
}
