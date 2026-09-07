<?php
/* Smarty version 3.1.48, created on 2026-09-07 21:44:43
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/ProjectTeaserCard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a9f142b699611_02921378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6097a1eb27e4691722c551fd9b1c8a5311e2e241' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/ProjectTeaserCard.tpl',
      1 => 1788766723,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9f142b699611_02921378 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('_badge', '');
$_smarty_tpl->_assignInScope('_badgeVariant', '');
if ($_smarty_tpl->tpl_vars['item']->value['badge_label']) {?>
	<?php $_smarty_tpl->_assignInScope('_badge', $_smarty_tpl->tpl_vars['item']->value['badge_label']);?>
	<?php $_smarty_tpl->_assignInScope('_badgeVariant', $_smarty_tpl->tpl_vars['item']->value['badge_variant']);
} elseif ($_smarty_tpl->tpl_vars['item']->value['tag']) {?>
	<?php $_smarty_tpl->_assignInScope('_badge', $_smarty_tpl->tpl_vars['item']->value['tag']);
}?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"
	class="bg-white overflow-hidden h-full flex flex-col group border border-[#f5f5f5]">
	<div class="relative overflow-hidden">
		<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"
			class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105"
			loading="<?php if ((isset($_smarty_tpl->tpl_vars['teaser_eager']->value)) && $_smarty_tpl->tpl_vars['teaser_eager']->value) {?>eager<?php } else { ?>lazy<?php }?>"
			<?php if ($_smarty_tpl->tpl_vars['item']->value['id']) {?>onerror="this.onerror=null;this.src='https://media.studioatrium.pl/project/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
/render-box.jpg';"<?php }?>>
		<?php if ($_smarty_tpl->tpl_vars['_badge']->value) {?>
		<span class="absolute top-3 left-3 text-[11px] font-bold tracking-wider <?php if ($_smarty_tpl->tpl_vars['_badgeVariant']->value == 'discount' || $_smarty_tpl->tpl_vars['_badgeVariant']->value == 'sale') {?>bg-[var(--brand-red)] text-white<?php } else { ?>bg-white/90 text-[var(--brand-red)]<?php }?> px-2.5 py-1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_badge']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
		<?php }?>
	</div>
	<div class="px-5 pt-4 pb-5 flex flex-col gap-3 flex-1">
		<div class="flex items-start justify-between gap-3">
			<h3 class="text-[22px] font-bold text-[#222] leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
			<div class="flex items-center gap-2 shrink-0 mt-0.5 text-[#555]">
				<?php if ($_smarty_tpl->tpl_vars['teaser_interactive']->value && $_smarty_tpl->tpl_vars['item']->value['id']) {?>
				<button type="button" aria-label="Porównaj" id="compare-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
					class="compare cat-icon-btn text-[#555] hover:text-[var(--brand-red)]<?php if ($_smarty_tpl->tpl_vars['compareIds']->value && in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)) {?> on<?php }?>"
					data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="event.preventDefault();event.stopPropagation();">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" aria-hidden="true"><path d="M12 3v18"></path><path d="m19 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"></path><path d="m5 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M7 21h10"></path></svg>
				</button>
				<button type="button" aria-label="Ulubione" id="fav-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
					class="fav cat-icon-btn text-[#555] hover:text-[var(--brand-red)]<?php if ($_smarty_tpl->tpl_vars['favouriteIds']->value && in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)) {?> on<?php }?>"
					data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="event.preventDefault();event.stopPropagation();">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
				</button>
				<?php } else { ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" aria-hidden="true"><path d="M12 3v18"></path><path d="m19 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"></path><path d="m5 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M7 21h10"></path></svg>
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
				<?php }?>
			</div>
		</div>
		<div class="text-[13px] font-bold tracking-wider text-[var(--brand-red)]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['type_label'], ENT_QUOTES, 'UTF-8', true);?>
</div>
		<div class="flex items-center gap-4 py-2 text-[13px] text-[#222] flex-wrap">
			<?php if ($_smarty_tpl->tpl_vars['item']->value['area']) {?>
			<div class="flex items-center gap-2"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-vector-square" aria-hidden="true"><path d="M17.055 4.533a24 24 0 00-10.11 0"/><path d="M19.467 17.055a24 24 0 000-10.11"/><path d="M4.533 6.945a24 24 0 000 10.11"/><path d="M6.945 19.467a24 24 0 0010.11 0"/><circle cx="19" cy="19" r="2"/><circle cx="19" cy="5" r="2"/><circle cx="5" cy="19" r="2"/><circle cx="5" cy="5" r="2"/></svg></span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['area'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['rooms'] != '') {?>
			<div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path></svg></span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['rooms'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['baths'] > 0) {?>
			<div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 4 8 6"></path><path d="M17 19v2"></path><path d="M2 12h20"></path><path d="M7 19v2"></path><path d="M9 5 7.621 3.621A2.121 2.121 0 0 0 4 5v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"></path></svg></span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['baths'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['garage'] > 0) {?>
			<div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg></span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['garage'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
			<?php }?>
		</div>
		<div class="pt-1 mt-auto">
			<?php if ($_smarty_tpl->tpl_vars['item']->value['price_old']) {?>
			<div class="text-[16px] text-[var(--brand-red)] line-through"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['price_old'], ENT_QUOTES, 'UTF-8', true);?>
 PLN</div>
			<?php }?>
			<div class="flex items-baseline gap-2"><span class="text-[34px] font-['Montserrat',sans-serif] font-semibold text-[var(--brand-blue-strong)] leading-none"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['price'], ENT_QUOTES, 'UTF-8', true);?>
</span><span class="text-[16px] text-[var(--brand-blue-strong)] font-semibold">PLN</span></div>
		</div>
	</div>
</a>
<?php }
}
