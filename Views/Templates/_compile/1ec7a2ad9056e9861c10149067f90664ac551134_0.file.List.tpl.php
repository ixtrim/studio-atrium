<?php
/* Smarty version 3.1.48, created on 2026-08-24 17:27:48
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/List.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8c62f47f3bb4_97186267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ec7a2ad9056e9861c10149067f90664ac551134' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/List.tpl',
      1 => 1776175197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/Pager.tpl' => 2,
    'file:Include/HowToBuy.tpl' => 1,
  ),
),false)) {
function content_6a8c62f47f3bb4_97186267 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/aronmaiden/studioatrium/studio-atrium/Vendors/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
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
					<p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['description']->value,300);
if ($_smarty_tpl->tpl_vars['string_length']->value >= 300) {?> <a href="javascript:" class="goto" data-id="categoryDescription">więcej &raquo;</a><?php }?></p>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 1 && ($_smarty_tpl->tpl_vars['shortDescription']->value || $_smarty_tpl->tpl_vars['description']->value)) {?><div id="goto-box"><a href="javascript:" class="goto" data-id="categoryDescription">zobacz opis &raquo;</a></div><?php }?>
			</div>
		</div>
	</div>
</div>
	<?php if ($_smarty_tpl->tpl_vars['blackWeekBanner']->value && $_smarty_tpl->tpl_vars['category']->value['id'] != 75) {?>
		<div>
			<p style="margin-top: 2px;"><a href="/projekty-domow/promocje"><img src="<?php echo $_smarty_tpl->tpl_vars['bannerUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['blackWeekBanner']->value;?>
" alt="Black week" style="max-width: 100%; height: 100%; margin: 0 auto;"></a></p>
					</div>
	<?php } else { ?>
	<ul class="parted">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partedBanner']->value, 'banner');
$_smarty_tpl->tpl_vars['banner']->iteration = 0;
$_smarty_tpl->tpl_vars['banner']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->do_else = false;
$_smarty_tpl->tpl_vars['banner']->iteration++;
$__foreach_banner_0_saved = $_smarty_tpl->tpl_vars['banner'];
?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['banner']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
				<li class="part<?php echo $_smarty_tpl->tpl_vars['banner']->iteration;?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" alt="Reklama" width="480" height="240"></a></li>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<?php
$_smarty_tpl->tpl_vars['banner'] = $__foreach_banner_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	<?php }?>
</div>



<?php } else { ?>
<div class="cs-header">
	<div>
		<h1>Wynik wyszukiwania</h1>

		<?php if ($_smarty_tpl->tpl_vars['request']->value['query']) {?>
		<p>dla zapytania: <strong><?php echo $_smarty_tpl->tpl_vars['request']->value['query'];?>
</strong></p>
		<?php } else { ?>
			<ul id="search-criteria-list">
			<?php if ($_smarty_tpl->tpl_vars['category']->value) {?><li><strong data-param="kategoria">x</strong><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</li><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['csType']->value) {?><li><strong data-param="typ_projektu">x</strong><?php echo $_smarty_tpl->tpl_vars['csType']->value;?>
</li><?php }?>
			
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['csTypedParams']->value, 'value', false, '_key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
				<li><strong data-param="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
">x</strong><?php echo $_smarty_tpl->tpl_vars['csTypedParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['csParamsUnits']->value[$_smarty_tpl->tpl_vars['_key']->value];?>
</li>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['csParams']->value, '_value', false, '_key');
$_smarty_tpl->tpl_vars['_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_key']->value => $_smarty_tpl->tpl_vars['_value']->value) {
$_smarty_tpl->tpl_vars['_value']->do_else = false;
?>
				<?php if ($_smarty_tpl->tpl_vars['csParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value]) {?>
				<li>
					<strong data-param="<?php echo $_smarty_tpl->tpl_vars['paramsMap']->value[$_smarty_tpl->tpl_vars['_key']->value];?>
">x</strong><?php echo $_smarty_tpl->tpl_vars['csParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value];?>

						<?php if ($_smarty_tpl->tpl_vars['csDualParams']->value[$_smarty_tpl->tpl_vars['_key']->value]) {?>: <?php echo $_smarty_tpl->tpl_vars['csDualParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value][$_smarty_tpl->tpl_vars['_value']->value];
}?>
						<?php if ($_smarty_tpl->tpl_vars['csTripleParams']->value[$_smarty_tpl->tpl_vars['_key']->value]) {?>: <?php echo $_smarty_tpl->tpl_vars['csTripleParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value][$_smarty_tpl->tpl_vars['_value']->value];
}?>
						<?php if (in_array($_smarty_tpl->tpl_vars['_key']->value,$_smarty_tpl->tpl_vars['csValueParams']->value)) {?>: <?php if ($_smarty_tpl->tpl_vars['_value']->value == -1) {?>dowolna<?php } else {
if (in_array($_smarty_tpl->tpl_vars['_value']->value,array_keys($_smarty_tpl->tpl_vars['csValueNames']->value))) {
echo $_smarty_tpl->tpl_vars['csValueNames']->value[$_smarty_tpl->tpl_vars['_value']->value];
} else {
echo $_smarty_tpl->tpl_vars['_value']->value;
}
}
}?>
						<?php if ($_smarty_tpl->tpl_vars['csRangeParams']->value[$_smarty_tpl->tpl_vars['_key']->value]) {?>: od <?php echo $_smarty_tpl->tpl_vars['csRangeParams']->value[$_smarty_tpl->tpl_vars['_key']->value][$_smarty_tpl->tpl_vars['_value']->value][0];?>
 do <?php echo $_smarty_tpl->tpl_vars['csRangeParams']->value[$_smarty_tpl->tpl_vars['_key']->value][$_smarty_tpl->tpl_vars['_value']->value][1];?>
 <?php echo $_smarty_tpl->tpl_vars['csParamsUnits']->value[$_smarty_tpl->tpl_vars['_key']->value];
}?>
				</li>
				<?php }?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			
				<li id="search-criteria-waiter" class="waiter-box" style="display: none;"><img src="/img/waiter-grey.gif" alt=""></li>
			</ul>
			
			<p id="search-criteria">zmień kryteria wyszukiwania</p>
		<?php }?>
	</div>
</div>
<?php }?>

<?php $_smarty_tpl->_assignInScope('displayMapped', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'mapUrlParam' ][ 0 ], array( $_smarty_tpl->tpl_vars['displayType']->value,'display_type' )));
$_smarty_tpl->_assignInScope('sortByMapped', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'mapUrlParam' ][ 0 ], array( $_smarty_tpl->tpl_vars['sortBy']->value,'sort_by' )));
$_smarty_tpl->_assignInScope('sortOrderMapped', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'mapUrlParam' ][ 0 ], array( $_smarty_tpl->tpl_vars['sortOrder']->value,'sort_order' )));?>

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
		<?php if ($_smarty_tpl->tpl_vars['type']->value != 'tank') {?>
		<li class="controls-box">
			<ul class="controls" id="controls">
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 1) {?>
					<?php if (!$_smarty_tpl->tpl_vars['disableBox']->value) {?>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="boxes<?php if ($_smarty_tpl->tpl_vars['displayType']->value == 'box') {?> active<?php }?>" id="display-box"></a></li>
					<?php }?>
					
					<?php if (!$_smarty_tpl->tpl_vars['disableDetails']->value) {?>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="detail<?php if ($_smarty_tpl->tpl_vars['displayType']->value == 'detail') {?> active<?php }?>" id="display-detail"></a></li>
					<?php }?>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="list<?php if ($_smarty_tpl->tpl_vars['displayType']->value == 'list') {?> active<?php }?>" id="display-list"></a></li>
				<?php } else { ?>
					<?php if (!$_smarty_tpl->tpl_vars['disableBox']->value) {?>
					<li><a href="<?php echo ((((($_smarty_tpl->tpl_vars['url']->value).('b')).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="boxes<?php if ($_smarty_tpl->tpl_vars['displayType']->value == 'box') {?> active<?php }?>" id="display-box"></a></li>
					<?php }?>
					<?php if (!$_smarty_tpl->tpl_vars['disableDetails']->value) {?>
					<li><a href="<?php echo ((((($_smarty_tpl->tpl_vars['url']->value).('e')).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="detail<?php if ($_smarty_tpl->tpl_vars['displayType']->value == 'detail') {?> active<?php }?>" id="display-detail"></a></li>
					<?php }?>
					<li><a href="<?php echo ((((($_smarty_tpl->tpl_vars['url']->value).('l')).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="list<?php if ($_smarty_tpl->tpl_vars['displayType']->value == 'list') {?> active<?php }?>" id="display-list"></a></li>
				<?php }?>
			</ul>
		</li>
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
						<div class="jui-select-box dark" id="sort-select-box">
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
					</div>
				</fieldset>
			</form>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['type']->value == 'house') {?>
				<span id="search-trigger">Filtruj</span>
			<?php }?>
		</li>
		<?php }?>
		<li>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
			<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'url'=>((((($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['displayMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value),'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, false);
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
		<?php $_smarty_tpl->_subTemplateRender(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( "Project/display%type%.tpl",'%type%',ucfirst($_smarty_tpl->tpl_vars['displayType']->value) )), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('url'=>((((($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['displayMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value),'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, true);
?>
	<?php } else { ?>
		<?php $_smarty_tpl->_subTemplateRender(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( "Project/%list%Display%type%.tpl",'%list%',$_smarty_tpl->tpl_vars['listType']->value )),'%type%',ucfirst($_smarty_tpl->tpl_vars['displayType']->value) )), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('url'=>((((($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['displayMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value),'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, true);
?>
	<?php }
} else { ?>
<section>
	<div class="box center">
		<p class="no-result">Niestety nic dla Ciebie nie znaleźliśmy</p>
		<p>Może Twoje kryteria wyszukiwania były zbyt szczegółowe? Zmień je lub przejdź do <a href="/projekty-domow/" class="blue">wszystkich projektów domów</a></p>
		
		<p class="no-result-ib"><img src="/img/search.png" alt=""></p>
	</div>
</section>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
<div class="control-box">
	<ul>
		<li><?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'url'=>((((($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['displayMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value),'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, true);
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->_subTemplateRender("file:Include/HowToBuy.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

<?php if ($_smarty_tpl->tpl_vars['isSearch']->value && !$_smarty_tpl->tpl_vars['request']->value['query']) {?>
<div id="backToTopOnList"></div>
<?php }
}
}
