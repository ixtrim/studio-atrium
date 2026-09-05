<?php
/* Smarty version 3.1.48, created on 2026-09-05 08:19:29
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/displayBox.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a9bb471c1b043_97611999',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c61112168714dd44625611bef892865dc8bbc4d' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/displayBox.tpl',
      1 => 1788437385,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9bb471c1b043_97611999 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['listCards']->value) {?>
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 items-stretch fav-wrapper" id="project-list">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listCards']->value, 'item');
$_smarty_tpl->tpl_vars['item']->iteration = 0;
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['item']->iteration++;
$__foreach_item_1_saved = $_smarty_tpl->tpl_vars['item'];
?>
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="bg-white border border-[#e5e5e5] overflow-hidden h-full flex flex-col group">
		<div class="relative overflow-hidden">
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="Projekt domu <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"
				class="w-full h-[230px] object-cover transition-transform duration-500 group-hover:scale-105"
				loading="<?php if ($_smarty_tpl->tpl_vars['item']->iteration < 7) {?>eager<?php } else { ?>lazy<?php }?>"
				width="640" height="230"
				onerror="this.onerror=null;this.src='https://media.studioatrium.pl/project/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
/render-box.jpg';">
			<?php if ($_smarty_tpl->tpl_vars['item']->value['badge_label']) {?>
			<span class="absolute top-3 left-3 text-[11px] font-bold tracking-wider <?php if ($_smarty_tpl->tpl_vars['item']->value['badge_variant'] == 'new') {?>bg-white/90 text-[var(--brand-red)]<?php } else { ?>bg-[var(--brand-red)] text-white<?php }?> px-2.5 py-1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['badge_label'], ENT_QUOTES, 'UTF-8', true);?>
</span>
			<?php }?>
		</div>
		<div class="px-4 pt-3 pb-4 flex flex-col gap-2 flex-1">
			<div class="flex items-start justify-between gap-3">
				<h3 class="text-[18px] font-bold text-[#222] leading-tight min-h-[44px]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
				<div class="flex items-center gap-2 shrink-0 mt-0.5">
					<button type="button" aria-label="Porównaj" id="compare-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
						class="compare cat-icon-btn text-[#555] hover:text-[var(--brand-red)]<?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)) {?> on<?php }?>"
						data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="event.preventDefault();event.stopPropagation();">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" style="width:20px;height:20px;max-width:20px;max-height:20px" aria-hidden="true"><path d="M12 3v18"></path><path d="m19 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"></path><path d="m5 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M7 21h10"></path></svg>
					</button>
					<button type="button" aria-label="Ulubione" id="fav-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
						class="fav cat-icon-btn text-[#555] hover:text-[var(--brand-red)]<?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)) {?> on<?php }?>"
						data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="event.preventDefault();event.stopPropagation();">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" style="width:20px;height:20px;max-width:20px;max-height:20px" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
					</button>
				</div>
			</div>
			<div class="text-[13px] text-[var(--brand-red)] font-bold tracking-wide"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['type_label'], ENT_QUOTES, 'UTF-8', true);?>
</div>
			<div class="flex items-center flex-wrap gap-3 py-1 text-[13px] text-[#222]">
				<?php if ($_smarty_tpl->tpl_vars['item']->value['area']) {?>
				<div class="flex items-center gap-1.5">
					<span class="w-7 h-7 border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41L13.7 2.71a2.41 2.41 0 0 0-3.41 0z"></path></svg>
					</span>
					<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['area'], ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['rooms'] != '') {?>
				<div class="flex items-center gap-1.5">
					<span class="w-7 h-7 border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path></svg>
					</span>
					<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['rooms'], ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['baths'] > 0) {?>
				<div class="flex items-center gap-1.5">
					<span class="w-7 h-7 border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 4 8 6"></path><path d="M17 19v2"></path><path d="M2 12h20"></path><path d="M7 19v2"></path><path d="M9 5 7.621 3.621A2.121 2.121 0 0 0 4 5v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"></path></svg>
					</span>
					<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['baths'], ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['garage'] > 0) {?>
				<div class="flex items-center gap-1.5">
					<span class="w-7 h-7 border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg>
					</span>
					<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['garage'], ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
			</div>
			<div class="pt-1 mt-auto min-h-[52px] flex flex-col justify-end">
				<div class="text-[14px] text-[var(--brand-red)] line-through min-h-[21px]<?php if (!$_smarty_tpl->tpl_vars['item']->value['price_old']) {?> invisible<?php }?>"><?php if ($_smarty_tpl->tpl_vars['item']->value['price_old']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['price_old'], ENT_QUOTES, 'UTF-8', true);?>
 PLN<?php } else { ?>—<?php }?></div>
				<div class="text-[20px] font-bold text-[var(--brand-blue-strong)] leading-none">
					<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['price'], ENT_QUOTES, 'UTF-8', true);?>
 <span class="text-[14px] font-semibold">PLN</span>
				</div>
			</div>
		</div>
	</a>
	<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	<div class="cat-advisor-tile bg-[#ececec] p-6 flex flex-col h-full min-h-[420px] border border-[#e5e5e5]">
		<h3 class="text-[24px] font-bold text-[#222] leading-tight">Porozmawiaj<br>z doradcą</h3>
		<p class="text-[13px] text-[#222] mt-3 leading-relaxed">
			Potrzebujesz porady? Nie wiesz, jaki projekt będzie odpowiedni na swoją działkę. Zadzwoń lub napisz - pomożemy
		</p>
		<div class="mt-4 text-[20px] font-bold text-[#222] leading-tight">
			<?php if ($_smarty_tpl->tpl_vars['contact']->value['phone1']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['contact']->value['phone1'], ENT_QUOTES, 'UTF-8', true);
} else { ?>33 822 94 96<?php }?><br>
			<?php if ($_smarty_tpl->tpl_vars['contact']->value['phone2']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['contact']->value['phone2'], ENT_QUOTES, 'UTF-8', true);
} else { ?>602 303 160<?php }?>
		</div>
		<a href="/znajdziemy-dla-ciebie-projekt.html"
			class="mt-auto inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold px-4 py-3 w-full tracking-wide text-center">
			ZNAJDŹ DOM DLA SIEBIE
		</a>
	</div>
</div>
<?php } else { ?>
<div class="container" id="project-list">
	<section>
		<div class="list-grid fav-wrapper" id="overlay-group">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, '_project');
$_smarty_tpl->tpl_vars['_project']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_project']->value) {
$_smarty_tpl->tpl_vars['_project']->do_else = false;
?>
			<div>
				<figure>
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'box'),$_smarty_tpl ) );?>
" alt="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
" width="640" height="427" loading="lazy">
					<figcaption>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
">
							<span>projekt domu</span>
							<strong><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
 <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
 m<sup>2</sup></span></strong>
						</a>
					</figcaption>
				</figure>
				<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)) {?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
				<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)) {?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</section>
</div>
<?php }
}
}
