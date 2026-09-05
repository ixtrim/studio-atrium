<?php
/* Smarty version 3.1.48, created on 2026-09-05 08:24:45
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/List.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a9bb5ad565c77_06202401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ec7a2ad9056e9861c10149067f90664ac551134' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/List.tpl',
      1 => 1788589476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/CategoryFilterSidebar.tpl' => 1,
    'file:Project/displayBox.tpl' => 1,
    'file:Include/LastViewed.tpl' => 1,
    'file:Include/Contact.tpl' => 1,
    'file:Include/ArticlesTicks.tpl' => 1,
    'file:Include/NewsletterSubpage.tpl' => 1,
    'file:Include/Pager.tpl' => 2,
  ),
),false)) {
function content_6a9bb5ad565c77_06202401 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('displayMapped', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'mapUrlParam' ][ 0 ], array( $_smarty_tpl->tpl_vars['displayType']->value,'display_type' )));
$_smarty_tpl->_assignInScope('sortByMapped', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'mapUrlParam' ][ 0 ], array( $_smarty_tpl->tpl_vars['sortBy']->value,'sort_by' )));
$_smarty_tpl->_assignInScope('sortOrderMapped', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'mapUrlParam' ][ 0 ], array( $_smarty_tpl->tpl_vars['sortOrder']->value,'sort_order' )));
$_smarty_tpl->_assignInScope('pagerUrl', ((((($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['displayMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value));?>

<?php if (!$_smarty_tpl->tpl_vars['isSearch']->value && $_smarty_tpl->tpl_vars['listType']->value == 'house') {?>
<div id="cat-2026">
	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5]">
		<ol class="max-w-[1480px] mx-auto px-8 py-4 flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
			<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
			<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
			<?php if ($_smarty_tpl->tpl_vars['isAllProjects']->value) {?>
			<li aria-current="page" class="text-[#6b6b6b]">Wszystkie projekty domów</li>
			<?php } elseif ($_smarty_tpl->tpl_vars['category']->value['tree'] == 'house') {?>
			<li><a href="/projekty/" class="hover:text-[#222] transition-colors">Projekty Domów</a></li>
			<?php if ($_smarty_tpl->tpl_vars['category']->value['link'] != 'projekty-domow') {?>
			<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
			<li aria-current="page" class="text-[#6b6b6b]"><?php if ($_smarty_tpl->tpl_vars['category']->value['alternate_name']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['alternate_name'], ENT_QUOTES, 'UTF-8', true);
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?></li>
			<?php }?>
			<?php } else { ?>
			<li aria-current="page" class="text-[#6b6b6b]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</li>
			<?php }?>
		</ol>
	</nav>

	<section class="w-full bg-white py-8">
		<div class="max-w-[1480px] mx-auto px-8">
			<div class="flex flex-col md:flex-row items-stretch bg-[#3a3d42] text-white mb-6">
				<div class="flex-1 flex items-center px-8 py-5">
					<h3 class="text-[22px] font-bold leading-tight">AKTUALNE OFERTY<br>DOTYCZĄCE KATEGORII</h3>
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
				<div class="bg-white text-[#222] px-8 py-5 flex flex-col justify-center min-w-[220px] md:min-w-[260px]">
					<div class="text-[34px] font-bold leading-none">-500 zł</div>
					<div class="text-[14px] text-[#666] mt-1">do końca grudnia</div>
				</div>
			</div>

			<div class="flex flex-col lg:flex-row gap-6">
				<aside class="w-full lg:w-[240px] flex-shrink-0 space-y-4">
					<?php $_smarty_tpl->_subTemplateRender("file:Include/CategoryFilterSidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

					<div class="bg-[var(--brand-blue)] text-white p-5 text-center">
						<p class="text-[15px] font-bold leading-snug mb-4">
							Bezpłatnie pomożemy wybrać najlepszy projekt domu dla Ciebie.
						</p>
						<a href="/znajdziemy-dla-ciebie-projekt.html"
							class="inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold px-4 py-3 w-full tracking-wide">
							WYPEŁNIJ FORMULARZ
						</a>
					</div>

					<ul class="space-y-3 pt-2">
						<li class="flex items-center gap-3">
							<div class="w-9 h-9 rounded-full bg-[var(--brand-blue)] flex items-center justify-center flex-shrink-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-white" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
							</div>
							<span class="text-[12px] font-bold text-[#222] leading-tight">BEZPŁATNE DODATKI<br>DO PROJEKTÓW</span>
						</li>
						<li class="flex items-center gap-3">
							<div class="w-9 h-9 rounded-full bg-[var(--brand-blue)] flex items-center justify-center flex-shrink-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-white" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
							</div>
							<span class="text-[12px] font-bold text-[#222] leading-tight">BEZPŁATNA KONSULTACJA<br>ARCHITEKTA</span>
						</li>
						<li class="flex items-center gap-3">
							<div class="w-9 h-9 rounded-full bg-[var(--brand-blue)] flex items-center justify-center flex-shrink-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-white" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
							</div>
							<span class="text-[12px] font-bold text-[#222] leading-tight">POMOC W ADAPTACJI</span>
						</li>
						<li class="flex items-center gap-3">
							<div class="w-9 h-9 rounded-full bg-[var(--brand-blue)] flex items-center justify-center flex-shrink-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-white" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
							</div>
							<span class="text-[12px] font-bold text-[#222] leading-tight">ZMIANY W PROJEKCIE</span>
						</li>
					</ul>
				</aside>

				<div class="flex-1 min-w-0">
					<div class="bg-[#ececec] px-6 py-5 mb-6">
						<h1 class="text-[26px] font-normal text-[#222]"><?php if ($_smarty_tpl->tpl_vars['isAllProjects']->value) {?>Wszystkie projekty domów<?php } elseif ($_smarty_tpl->tpl_vars['category']->value['alternate_name']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['alternate_name'], ENT_QUOTES, 'UTF-8', true);
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?></h1>
						<div class="text-[14px] text-[#222] mt-2">
							<strong>Liczba projektów:</strong> <?php echo $_smarty_tpl->tpl_vars['total']->value;?>

						</div>
						<?php if ($_smarty_tpl->tpl_vars['shortDescription']->value) {?>
						<p class="text-[13px] text-[#444] mt-3 leading-relaxed"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shortDescription']->value, ENT_QUOTES, 'UTF-8', true);?>
</p>
						<?php } elseif ($_smarty_tpl->tpl_vars['description']->value) {?>
						<p class="text-[13px] text-[#444] mt-3 leading-relaxed"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['description']->value,320 )), ENT_QUOTES, 'UTF-8', true);?>
</p>
						<?php }?>
					</div>

					<?php if (!$_smarty_tpl->tpl_vars['sortingDisabled']->value) {?>
					<div class="flex flex-wrap items-center justify-between gap-3 mb-5">
						<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" id="projects-filters-form" class="flex items-center gap-2">
							<input type="hidden" name="display_type" value="box" id="display-type">
							<input type="hidden" name="sort_order" value="<?php echo $_smarty_tpl->tpl_vars['sortOrder']->value;?>
" id="sort-order">
							<label for="sort-select" class="text-[13px] text-[#666]">Sortowanie:</label>
							<select id="sort-select" name="sort_by" class="border border-[#ccc] bg-white px-3 py-2 text-[13px] text-[#222]">
								<option value="id" data-sort="<?php if ($_smarty_tpl->tpl_vars['isAllProjects']->value) {?>desc<?php } else { ?>asc<?php }?>"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'id') {?> selected="selected"<?php }?>><?php if ($_smarty_tpl->tpl_vars['isAllProjects']->value) {?>od najnowszych<?php } else { ?>domyślne<?php }?></option>
								<option value="usable_area" data-sort="asc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'usable_area' && $_smarty_tpl->tpl_vars['sortOrder']->value == 'ASC') {?> selected="selected"<?php }?>>powierzchnia ↑</option>
								<option value="usable_area" data-sort="desc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'usable_area' && $_smarty_tpl->tpl_vars['sortOrder']->value == 'DESC') {?> selected="selected"<?php }?>>powierzchnia ↓</option>
								<option value="name" data-sort="asc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'name' && $_smarty_tpl->tpl_vars['sortOrder']->value == 'ASC') {?> selected="selected"<?php }?>>nazwa A–Z</option>
								<option value="name" data-sort="desc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'name' && $_smarty_tpl->tpl_vars['sortOrder']->value == 'DESC') {?> selected="selected"<?php }?>>nazwa Z–A</option>
							</select>
						</form>
					</div>
					<?php echo '<script'; ?>
>
					(function () {
						var sel = document.getElementById('sort-select');
						var form = document.getElementById('projects-filters-form');
						var order = document.getElementById('sort-order');
						if (!sel || !form) return;
						sel.addEventListener('change', function () {
							var opt = sel.options[sel.selectedIndex];
							if (order && opt) order.value = (opt.getAttribute('data-sort') || 'asc').toUpperCase();
							form.submit();
						});
					})();
					<?php echo '</script'; ?>
>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['list']->value) {?>
						<?php $_smarty_tpl->_subTemplateRender("file:Project/displayBox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('url'=>$_smarty_tpl->tpl_vars['pagerUrl']->value,'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, false);
?>
					<?php } else { ?>
						<div class="bg-[#f7f7f7] px-8 py-16 text-center">
							<p class="text-[18px] font-bold text-[#222] mb-3">Niestety nic dla Ciebie nie znaleźliśmy</p>
							<p class="text-[14px] text-[#555]">Zmień kryteria lub przejdź do <a href="/projekty/" class="text-[var(--brand-blue-strong)] hover:underline">wszystkich projektów domów</a></p>
						</div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
					<div class="flex items-center justify-center gap-4 mt-10 text-[14px] text-[#222]">
						<?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
							<?php if ($_smarty_tpl->tpl_vars['page']->value > 2) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['pagerUrl']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value-1;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" aria-label="poprzednia" class="hover:text-[var(--brand-red)]">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
							</a>
							<?php } else { ?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" aria-label="poprzednia" class="hover:text-[var(--brand-red)]">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
							</a>
							<?php }?>
						<?php } else { ?>
						<span class="opacity-50" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
						</span>
						<?php }?>
						<span class="border border-[#bbb] px-3 py-1 bg-white"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span>
						<span>z <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
</span>
						<?php if ($_smarty_tpl->tpl_vars['page']->value < $_smarty_tpl->tpl_vars['pages']->value) {?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['pagerUrl']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value+1;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" aria-label="następna" class="hover:text-[var(--brand-red)]">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m9 18 6-6-6-6"></path></svg>
						</a>
						<?php } else { ?>
						<span class="opacity-50" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m9 18 6-6-6-6"></path></svg>
						</span>
						<?php }?>
					</div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['description']->value && $_smarty_tpl->tpl_vars['page']->value == 1) {?>
					<div class="mt-12 text-[15px] leading-relaxed text-[#444]" id="categoryDescription">
						<h2 class="text-[22px] font-bold text-[#222] mb-4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
						<div><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</section>

	<?php $_smarty_tpl->_subTemplateRender("file:Include/LastViewed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php $_smarty_tpl->_subTemplateRender("file:Include/Contact.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php $_smarty_tpl->_subTemplateRender("file:Include/ArticlesTicks.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php $_smarty_tpl->_subTemplateRender("file:Include/NewsletterSubpage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php } else {
if (!$_smarty_tpl->tpl_vars['isSearch']->value) {?>
<div class="list-header<?php if ($_smarty_tpl->tpl_vars['page']->value == 1 && ($_smarty_tpl->tpl_vars['shortDescription']->value || $_smarty_tpl->tpl_vars['description']->value)) {?> activated<?php }
if ($_smarty_tpl->tpl_vars['category']->value['id'] == 1 || $_smarty_tpl->tpl_vars['category']->value['id'] == 67 || $_smarty_tpl->tpl_vars['category']->value['id'] == 23 || $_smarty_tpl->tpl_vars['category']->value['id'] == 25 || $_smarty_tpl->tpl_vars['category']->value['id'] == 75 || $_smarty_tpl->tpl_vars['category']->value['id'] == 77) {?> on<?php }?>"<?php if ($_smarty_tpl->tpl_vars['category']->value['attachments']['CategoryBg']) {?> style="background: #e6e6e6 url(<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['attachments']['CategoryBg'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['attachments']['CategoryBg'][0]['filename'];?>
) no-repeat center 110px;"<?php }?>>
	<div>
		<div class="header-wrapper">
			<div>
				<h1>
					<span><?php if ($_smarty_tpl->tpl_vars['category']->value['alternate_name']) {
echo $_smarty_tpl->tpl_vars['category']->value['alternate_name'];
} else {
echo $_smarty_tpl->tpl_vars['category']->value['name'];
}?></span>
				</h1>
				<?php if ($_smarty_tpl->tpl_vars['shortDescription']->value) {?>
					<p><?php echo $_smarty_tpl->tpl_vars['shortDescription']->value;
if ($_smarty_tpl->tpl_vars['description']->value) {?> <a href="javascript:" class="goto" data-id="categoryDescription">więcej &raquo;</a><?php }?></p>
					<?php $_smarty_tpl->_assignInScope('string_length', 400);?>
				<?php } elseif ($_smarty_tpl->tpl_vars['description']->value) {?>
					<?php $_smarty_tpl->_assignInScope('string_length', strlen($_smarty_tpl->tpl_vars['description']->value)-substr_count($_smarty_tpl->tpl_vars['description']->value,' '));?>
					<p><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['description']->value,300 ));
if ($_smarty_tpl->tpl_vars['string_length']->value >= 300) {?> <a href="javascript:" class="goto" data-id="categoryDescription">więcej &raquo;</a><?php }?></p>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 1 && ($_smarty_tpl->tpl_vars['shortDescription']->value || $_smarty_tpl->tpl_vars['description']->value)) {?><div id="goto-box"><a href="javascript:" class="goto" data-id="categoryDescription">zobacz opis &raquo;</a></div><?php }?>
			</div>
		</div>
	</div>
</div>
<?php } else { ?>
<div class="cs-header">
	<div>
		<h1>Wynik wyszukiwania</h1>
		<?php if ($_smarty_tpl->tpl_vars['request']->value['query']) {?>
		<p>dla zapytania: <strong><?php echo $_smarty_tpl->tpl_vars['request']->value['query'];?>
</strong></p>
		<?php }?>
	</div>
</div>
<?php }?>

<div class="control-box">
	<ul>
		<?php if ($_smarty_tpl->tpl_vars['category']->value['tree'] == 'house') {?>
			<li class="path"><a href="/">Studio Atrium</a> &raquo; <a href="/projekty-domow/" class="<?php if ($_smarty_tpl->tpl_vars['category']->value['link'] != 'projekty-domow') {?>all<?php } else { ?>selected<?php }?>">projekty domów</a> &raquo; <?php if ($_smarty_tpl->tpl_vars['category']->value['link'] != 'projekty-domow') {?><a href="/<?php echo $_smarty_tpl->tpl_vars['category']->value['link'];?>
/" class="selected"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strtolower' ][ 0 ], array( $_smarty_tpl->tpl_vars['category']->value['name'] ));?>
</a> <?php }?> <span>znaleziono: <strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></span></li>
		<?php } else { ?>
			<li class="path"><a href="/">Studio Atrium</a> &raquo; <?php if ($_smarty_tpl->tpl_vars['category']->value['name']) {?><a href="/<?php echo $_smarty_tpl->tpl_vars['category']->value['link'];?>
/" class="selected"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strtolower' ][ 0 ], array( $_smarty_tpl->tpl_vars['category']->value['name'] ));?>
</a> <?php }?><span>znaleziono: <strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></span></li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['listType']->value != 'other' && !$_smarty_tpl->tpl_vars['sortingDisabled']->value) {?>
		<li class="sort-box">
			<div>
			<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" id="projects-filters-form">
				<fieldset>
					<input type="hidden" name="display_type" value="<?php echo $_smarty_tpl->tpl_vars['displayType']->value;?>
" id="display-type">
					<input type="hidden" name="sort_order" value="<?php echo $_smarty_tpl->tpl_vars['sortOrder']->value;?>
" id="sort-order">
					<div class="select-wrapper">
						<select id="sort-select" name="sort_by">
							<option value="id" data-sort="asc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'id') {?> selected="selected"<?php }?>>sortowanie domyślne</option>
							<option value="usable_area" data-sort="asc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'usable_area' && $_smarty_tpl->tpl_vars['sortOrder']->value == 'ASC') {?> selected="selected"<?php }?>>po powierzchni (rosnąco)</option>
							<option value="usable_area" data-sort="desc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'usable_area' && $_smarty_tpl->tpl_vars['sortOrder']->value == 'DESC') {?> selected="selected"<?php }?>>po powierzchni (malejąco)</option>
							<?php if ($_smarty_tpl->tpl_vars['listType']->value == 'house') {?>
							<option value="name" data-sort="asc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'name' && $_smarty_tpl->tpl_vars['sortOrder']->value == 'ASC') {?> selected="selected"<?php }?>>po nazwie (rosnąco)</option>
							<option value="name" data-sort="desc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value == 'name' && $_smarty_tpl->tpl_vars['sortOrder']->value == 'DESC') {?> selected="selected"<?php }?>>po nazwie (malejąco)</option>
							<?php }?>
						</select>
					</div>
				</fieldset>
			</form>
			</div>
		</li>
		<?php }?>
		<li>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
			<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'url'=>$_smarty_tpl->tpl_vars['pagerUrl']->value,'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, false);
?>
		<?php }?>
		</li>
	</ul>
</div>

<?php if ($_smarty_tpl->tpl_vars['list']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['isSearch']->value) {?>
		<?php $_smarty_tpl->_subTemplateRender(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( "Project/searchDisplay%type%.tpl",'%type%',ucfirst($_smarty_tpl->tpl_vars['displayType']->value) )), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	<?php } elseif ($_smarty_tpl->tpl_vars['listType']->value == 'house') {?>
		<?php $_smarty_tpl->_subTemplateRender(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( "Project/display%type%.tpl",'%type%',ucfirst($_smarty_tpl->tpl_vars['displayType']->value) )), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('url'=>$_smarty_tpl->tpl_vars['pagerUrl']->value,'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, true);
?>
	<?php } else { ?>
		<?php $_smarty_tpl->_subTemplateRender(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( "Project/%list%Display%type%.tpl",'%list%',$_smarty_tpl->tpl_vars['listType']->value )),'%type%',ucfirst($_smarty_tpl->tpl_vars['displayType']->value) )), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('url'=>$_smarty_tpl->tpl_vars['pagerUrl']->value,'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, true);
?>
	<?php }
} else { ?>
<section>
	<div class="box center">
		<p class="no-result">Niestety nic dla Ciebie nie znaleźliśmy</p>
		<p>Może Twoje kryteria wyszukiwania były zbyt szczegółowe? Zmień je lub przejdź do <a href="/projekty-domow/" class="blue">wszystkich projektów domów</a></p>
	</div>
</section>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
<div class="control-box">
	<ul>
		<li><?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'url'=>$_smarty_tpl->tpl_vars['pagerUrl']->value,'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, true);
?></li>
	</ul>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['description']->value && $_smarty_tpl->tpl_vars['string_length']->value >= 300) {?>
<section>
	<div class="box" id="categoryDescription">
		<h2><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</h2>
		<div><p><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</p></div>
	</div>
</section>
<?php }
}
}
}
