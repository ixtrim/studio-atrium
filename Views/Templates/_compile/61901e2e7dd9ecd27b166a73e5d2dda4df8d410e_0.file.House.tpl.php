<?php
/* Smarty version 3.1.48, created on 2026-10-02 16:05:01
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/House.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abfba0d7822f7_53131368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61901e2e7dd9ecd27b166a73e5d2dda4df8d410e' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/House.tpl',
      1 => 1790949869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Project/Detail2026/Breadcrumbs.tpl' => 1,
    'file:Project/Detail2026/AnchorBar.tpl' => 1,
    'file:Project/Detail2026/Hero.tpl' => 1,
    'file:Project/Detail2026/FloatingCart.tpl' => 1,
    'file:Project/Detail2026/Floors.tpl' => 1,
    'file:Project/Detail2026/AdBanners.tpl' => 1,
    'file:Project/Detail2026/TechData.tpl' => 1,
    'file:Project/Detail2026/Description.tpl' => 1,
    'file:Project/Detail2026/Similar.tpl' => 1,
    'file:Include/LastViewed.tpl' => 1,
    'file:Project/Detail2026/Costs.tpl' => 1,
    'file:Project/Detail2026/Information.tpl' => 1,
    'file:Project/Detail2026/Realizations.tpl' => 1,
    'file:Include/Partners.tpl' => 1,
    'file:Include/Contact.tpl' => 1,
    'file:Project/Detail2026/Faq.tpl' => 1,
    'file:Include/Newsletter.tpl' => 1,
  ),
),false)) {
function content_6abfba0d7822f7_53131368 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="proj-2026" class="bg-white" data-project-id="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
" data-project-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['detailPrice']->value;?>
" data-heat-pump="<?php echo $_smarty_tpl->tpl_vars['detailHeatPump']->value;?>
" data-thumb="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detailThumb']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-version="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['request']->value['version'], ENT_QUOTES, 'UTF-8', true);?>
">

<?php $_smarty_tpl->_subTemplateRender("file:Project/Detail2026/Breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/AnchorBar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/Hero.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/FloatingCart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/Floors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/AdBanners.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/TechData.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/Description.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/Similar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Include/LastViewed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/Costs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/Information.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/Realizations.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Include/Partners.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('section_px'=>'px-8','section_py'=>'py-16'), 0, false);
$_smarty_tpl->_subTemplateRender("file:Include/Contact.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Project/Detail2026/Faq.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:Include/Newsletter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_newsletter_bg'=>1,'section_px'=>'px-8'), 0, false);
?>

</div>

<div id="param-info-lightbox" class="proj-param-lb fixed inset-0 hidden items-center justify-center p-4 md:p-8" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Wyjaśnienie parametru">
	<div class="proj-param-lb-backdrop absolute inset-0 bg-black/70" data-param-lb-close></div>
	<div class="proj-param-lb-panel relative z-10 w-full max-w-[720px] max-h-[min(85vh,900px)] bg-white shadow-2xl overflow-hidden flex flex-col">
		<div class="flex items-center justify-between gap-4 px-5 py-4 border-b border-[#eee] shrink-0">
			<div class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#222]">Wyjaśnienie parametru</div>
			<button type="button" class="proj-param-lb-close text-[#666] hover:text-[#222] text-[22px] leading-none border-0 bg-transparent cursor-pointer p-0" data-param-lb-close aria-label="Zamknij">&times;</button>
		</div>
		<div id="param-info-over-box" class="proj-param-lb-body overflow-y-auto px-5 py-5 text-[15px] leading-[1.65] text-[#222]"></div>
	</div>
</div>
<div id="param-info-overlay" class="hidden" aria-hidden="true"></div>

<?php if ($_smarty_tpl->tpl_vars['detailGallery']->value) {?>
<div id="proj-gallery-lightbox" class="proj-gal-lb fixed inset-0 hidden items-center justify-center" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Powiększone zdjęcie">
	<div class="proj-gal-lb-backdrop absolute inset-0" data-gal-lb-close></div>

	<div class="proj-gal-lb-toolbar" role="toolbar" aria-label="Narzędzia galerii">
		<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['detailGallery']->value )) > 1) {?>
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-thumbs aria-label="Miniatury" title="Miniatury" aria-pressed="false">
			<svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><rect x="3" y="3" width="5" height="5" fill="currentColor"/><rect x="10" y="3" width="5" height="5" fill="currentColor"/><rect x="17" y="3" width="5" height="5" fill="currentColor"/><rect x="3" y="10" width="5" height="5" fill="currentColor"/><rect x="10" y="10" width="5" height="5" fill="currentColor"/><rect x="17" y="10" width="5" height="5" fill="currentColor"/><rect x="3" y="17" width="5" height="5" fill="currentColor"/><rect x="10" y="17" width="5" height="5" fill="currentColor"/><rect x="17" y="17" width="5" height="5" fill="currentColor"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-play aria-label="Pokaz slajdów" title="Pokaz slajdów" aria-pressed="false">
			<svg class="proj-gal-lb-icon-play" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M8 5v14l11-7z"/></svg>
			<svg class="proj-gal-lb-icon-pause hidden" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M6 5h4v14H6zm8 0h4v14h-4z"/></svg>
		</button>
		<?php }?>
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-fs aria-label="Pełny ekran" title="Pełny ekran">
			<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M8 3H3v5M16 3h5v5M8 21H3v-5M16 21h5v-5"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-zoom aria-label="Powiększ" title="Powiększ" aria-pressed="false">
			<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3M11 8v6M8 11h6"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-close aria-label="Zamknij" title="Zamknij">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
		</button>
	</div>

	<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['detailGallery']->value )) > 1) {?>
	<button type="button" class="proj-gal-lb-nav proj-gal-lb-prev" data-gal-lb-prev aria-label="Poprzednie zdjęcie">
		<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
	</button>
	<button type="button" class="proj-gal-lb-nav proj-gal-lb-next" data-gal-lb-next aria-label="Następne zdjęcie">
		<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
	</button>
	<?php }?>

	<figure class="proj-gal-lb-panel relative z-10 w-full max-w-[min(1280px,94vw)] px-2">
		<div class="proj-gal-lb-stage relative overflow-hidden">
			<div class="proj-gal-lb-media relative flex items-center justify-center p-0 m-0">
				<img id="proj-gal-lb-img" src="" alt="" width="1400" height="900" decoding="async" class="block max-w-full max-h-[min(86vh,920px)] w-auto h-auto object-contain select-none">
			</div>
		</div>
		<div class="proj-gal-lb-meta">
			<div id="proj-gal-lb-caption" class="proj-gal-lb-caption-text"></div>
			<div id="proj-gal-lb-counter" class="proj-gal-lb-counter-text"></div>
		</div>
		<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['detailGallery']->value )) > 1) {?>
		<div class="proj-gal-lb-thumbs" id="proj-gal-lb-thumbs" hidden>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailGallery']->value, 'img');
$_smarty_tpl->tpl_vars['img']->iteration = 0;
$_smarty_tpl->tpl_vars['img']->index = -1;
$_smarty_tpl->tpl_vars['img']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->do_else = false;
$_smarty_tpl->tpl_vars['img']->iteration++;
$_smarty_tpl->tpl_vars['img']->index++;
$__foreach_img_0_saved = $_smarty_tpl->tpl_vars['img'];
?>
			<button type="button" class="proj-gal-lb-thumb" data-gal-lb-thumb="<?php echo $_smarty_tpl->tpl_vars['img']->index;?>
" aria-label="Zdjęcie <?php echo $_smarty_tpl->tpl_vars['img']->iteration;?>
">
				<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img']->value['thumb'], ENT_QUOTES, 'UTF-8', true);?>
" alt="" loading="lazy">
			</button>
			<?php
$_smarty_tpl->tpl_vars['img'] = $__foreach_img_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		<div class="proj-gal-lb-progress" aria-hidden="true"><span id="proj-gal-lb-progress-bar"></span></div>
		<?php }?>
	</figure>
</div>
<?php }?>

<?php echo '<script'; ?>
 src="/js/project2026.js?v=20261002b" defer><?php echo '</script'; ?>
>
<?php }
}
