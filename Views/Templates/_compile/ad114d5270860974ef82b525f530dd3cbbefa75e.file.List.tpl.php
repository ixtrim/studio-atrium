<?php /* Smarty version Smarty-3.1.11, created on 2024-12-05 08:55:45
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/List.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11517277762b0302a26f910-11665354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad114d5270860974ef82b525f530dd3cbbefa75e' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/List.tpl',
      1 => 1733388937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11517277762b0302a26f910-11665354',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0302a2edba0_79184260',
  'variables' => 
  array (
    'isSearch' => 0,
    'page' => 0,
    'shortDescription' => 0,
    'description' => 0,
    'category' => 0,
    'stockPath' => 0,
    'string_length' => 0,
    'blackWeekBanner' => 0,
    'bannerUrl' => 0,
    'partedBanner' => 0,
    'banner' => 0,
    'value' => 0,
    'key' => 0,
    'request' => 0,
    'csType' => 0,
    'csTypedParams' => 0,
    '_key' => 0,
    'csTypedParamsNames' => 0,
    'csParamsUnits' => 0,
    'csParams' => 0,
    'csParamsNames' => 0,
    'paramsMap' => 0,
    'csDualParams' => 0,
    '_value' => 0,
    'csDualParamsNames' => 0,
    'csTripleParams' => 0,
    'csTripleParamsNames' => 0,
    'csValueParams' => 0,
    'csValueNames' => 0,
    'csRangeParams' => 0,
    'displayType' => 0,
    'sortBy' => 0,
    'sortOrder' => 0,
    'total' => 0,
    'type' => 0,
    'disableBox' => 0,
    'url' => 0,
    'query' => 0,
    'disableDetails' => 0,
    'sortByMapped' => 0,
    'sortOrderMapped' => 0,
    'listType' => 0,
    'sortingDisabled' => 0,
    'pages' => 0,
    'displayMapped' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0302a2edba0_79184260')) {function content_62b0302a2edba0_79184260($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
?><?php if (!$_smarty_tpl->tpl_vars['isSearch']->value){?>
<div class="list-header<?php if ($_smarty_tpl->tpl_vars['page']->value==1&&($_smarty_tpl->tpl_vars['shortDescription']->value||$_smarty_tpl->tpl_vars['description']->value)){?> activated<?php }?><?php if ($_smarty_tpl->tpl_vars['category']->value['id']==1||$_smarty_tpl->tpl_vars['category']->value['id']==67||$_smarty_tpl->tpl_vars['category']->value['id']==23||$_smarty_tpl->tpl_vars['category']->value['id']==25||$_smarty_tpl->tpl_vars['category']->value['id']==75||$_smarty_tpl->tpl_vars['category']->value['id']==77){?> on<?php }?>"<?php if ($_smarty_tpl->tpl_vars['category']->value['attachments']['CategoryBg']){?> style="background: #e6e6e6 url(<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['attachments']['CategoryBg'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['attachments']['CategoryBg'][0]['filename'];?>
) no-repeat center 110px;"<?php }?>>
	<div>
		<div class="header-wrapper">
			<div>
				<h1>
					<span><?php if ($_smarty_tpl->tpl_vars['category']->value['alternate_name']){?><?php echo $_smarty_tpl->tpl_vars['category']->value['alternate_name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
<?php }?></span>
				</h1>
				<?php if ($_smarty_tpl->tpl_vars['shortDescription']->value){?>
					<p><?php echo $_smarty_tpl->tpl_vars['shortDescription']->value;?>
<?php if ($_smarty_tpl->tpl_vars['description']->value){?> <a href="javascript:" class="goto" data-id="categoryDescription">więcej &raquo;</a><?php }?></p>
					<?php $_smarty_tpl->tpl_vars['string_length'] = new Smarty_variable(400, null, 0);?>					
				<?php }elseif($_smarty_tpl->tpl_vars['description']->value){?>
					<?php $_smarty_tpl->tpl_vars['string_length'] = new Smarty_variable(strlen($_smarty_tpl->tpl_vars['description']->value)-substr_count($_smarty_tpl->tpl_vars['description']->value,' '), null, 0);?>
					<p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['description']->value,300);?>
<?php if ($_smarty_tpl->tpl_vars['string_length']->value>=300){?> <a href="javascript:" class="goto" data-id="categoryDescription">więcej &raquo;</a><?php }?></p>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['page']->value==1&&($_smarty_tpl->tpl_vars['shortDescription']->value||$_smarty_tpl->tpl_vars['description']->value)){?><div id="goto-box"><a href="javascript:" class="goto" data-id="categoryDescription">zobacz opis &raquo;</a></div><?php }?>
			</div>
		</div>
	</div>
</div>
	<?php if ($_smarty_tpl->tpl_vars['blackWeekBanner']->value&&$_smarty_tpl->tpl_vars['category']->value['id']!=75){?>
		<div>
			<p style="margin-top: 2px;"><a href="/projekty-domow/promocje"><img src="<?php echo $_smarty_tpl->tpl_vars['bannerUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['blackWeekBanner']->value;?>
" alt="Black week" style="max-width: 100%; height: 100%; margin: 0 auto;"></a></p>
			
		</div>
	<?php }else{ ?>
	<ul class="parted">
		<?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['partedBanner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['banner']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
$_smarty_tpl->tpl_vars['banner']->_loop = true;
 $_smarty_tpl->tpl_vars['banner']->iteration++;
?>
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['banner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<li class="part<?php echo $_smarty_tpl->tpl_vars['banner']->iteration;?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" alt="Reklama" width="480" height="240"></a></li>
			<?php } ?>
		<?php } ?>
	</ul>
	<?php }?>
</div>



<?php }else{ ?>
<div class="cs-header">
	<div>
		<h1>Wynik wyszukiwania</h1>

		<?php if ($_smarty_tpl->tpl_vars['request']->value['query']){?>
		<p>dla zapytania: <strong><?php echo $_smarty_tpl->tpl_vars['request']->value['query'];?>
</strong></p>
		<?php }else{ ?>
			<ul id="search-criteria-list">
			<?php if ($_smarty_tpl->tpl_vars['category']->value){?><li><strong data-param="kategoria">x</strong><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</li><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['csType']->value){?><li><strong data-param="typ_projektu">x</strong><?php echo $_smarty_tpl->tpl_vars['csType']->value;?>
</li><?php }?>
			
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['csTypedParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<li><strong data-param="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
">x</strong><?php echo $_smarty_tpl->tpl_vars['csTypedParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['csParamsUnits']->value[$_smarty_tpl->tpl_vars['_key']->value];?>
</li>
			<?php } ?>

			<?php  $_smarty_tpl->tpl_vars['_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_value']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['csParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_value']->key => $_smarty_tpl->tpl_vars['_value']->value){
$_smarty_tpl->tpl_vars['_value']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_value']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['csParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value]){?>
				<li>
					<strong data-param="<?php echo $_smarty_tpl->tpl_vars['paramsMap']->value[$_smarty_tpl->tpl_vars['_key']->value];?>
">x</strong><?php echo $_smarty_tpl->tpl_vars['csParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value];?>

						<?php if ($_smarty_tpl->tpl_vars['csDualParams']->value[$_smarty_tpl->tpl_vars['_key']->value]){?>: <?php echo $_smarty_tpl->tpl_vars['csDualParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value][$_smarty_tpl->tpl_vars['_value']->value];?>
<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['csTripleParams']->value[$_smarty_tpl->tpl_vars['_key']->value]){?>: <?php echo $_smarty_tpl->tpl_vars['csTripleParamsNames']->value[$_smarty_tpl->tpl_vars['_key']->value][$_smarty_tpl->tpl_vars['_value']->value];?>
<?php }?>
						<?php if (in_array($_smarty_tpl->tpl_vars['_key']->value,$_smarty_tpl->tpl_vars['csValueParams']->value)){?>: <?php if ($_smarty_tpl->tpl_vars['_value']->value==-1){?>dowolna<?php }else{ ?><?php if (in_array($_smarty_tpl->tpl_vars['_value']->value,array_keys($_smarty_tpl->tpl_vars['csValueNames']->value))){?><?php echo $_smarty_tpl->tpl_vars['csValueNames']->value[$_smarty_tpl->tpl_vars['_value']->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_value']->value;?>
<?php }?><?php }?><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['csRangeParams']->value[$_smarty_tpl->tpl_vars['_key']->value]){?>: od <?php echo $_smarty_tpl->tpl_vars['csRangeParams']->value[$_smarty_tpl->tpl_vars['_key']->value][$_smarty_tpl->tpl_vars['_value']->value][0];?>
 do <?php echo $_smarty_tpl->tpl_vars['csRangeParams']->value[$_smarty_tpl->tpl_vars['_key']->value][$_smarty_tpl->tpl_vars['_value']->value][1];?>
 <?php echo $_smarty_tpl->tpl_vars['csParamsUnits']->value[$_smarty_tpl->tpl_vars['_key']->value];?>
<?php }?>
				</li>
				<?php }?>
			<?php } ?>
			
				<li id="search-criteria-waiter" class="waiter-box" style="display: none;"><img src="/img/waiter-grey.gif" alt=""></li>
			</ul>
			
			<p id="search-criteria">zmień kryteria wyszukiwania</p>
		<?php }?>
	</div>
</div>
<?php }?>

<?php $_smarty_tpl->tpl_vars['displayMapped'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapUrlParam'][0][0]->mMapUrlParam($_smarty_tpl->tpl_vars['displayType']->value,'display_type'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['sortByMapped'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapUrlParam'][0][0]->mMapUrlParam($_smarty_tpl->tpl_vars['sortBy']->value,'sort_by'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['sortOrderMapped'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapUrlParam'][0][0]->mMapUrlParam($_smarty_tpl->tpl_vars['sortOrder']->value,'sort_order'), null, 0);?>

<div class="control-box">
	<ul>
		<?php if ($_smarty_tpl->tpl_vars['category']->value['tree']=='house'){?>
			<li class="path"><a href="/">Studio Atrium</a> &raquo; <a href="/projekty-domow/" class="<?php if ($_smarty_tpl->tpl_vars['category']->value['link']!='projekty-domow'){?>all<?php }else{ ?>selected<?php }?>">projekty domów</a> &raquo; <?php if ($_smarty_tpl->tpl_vars['category']->value['link']!='projekty-domow'){?><a href="/<?php echo $_smarty_tpl->tpl_vars['category']->value['link'];?>
/" class="selected"><?php echo strtolower($_smarty_tpl->tpl_vars['category']->value['name']);?>
</a> <?php }?> <span>znaleziono: <strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></span></li>
		<?php }else{ ?>
			<li class="path"><a href="/">Studio Atrium</a> &raquo; <?php if ($_smarty_tpl->tpl_vars['category']->value['name']){?><a href="/<?php echo $_smarty_tpl->tpl_vars['category']->value['link'];?>
/" class="selected"><?php echo strtolower($_smarty_tpl->tpl_vars['category']->value['name']);?>
</a> <?php }?><span>znaleziono: <strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></span></li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['type']->value!='tank'){?>
		<li class="controls-box">
			<ul class="controls" id="controls">
				<?php if ($_smarty_tpl->tpl_vars['page']->value==1){?>
					<?php if (!$_smarty_tpl->tpl_vars['disableBox']->value){?>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="boxes<?php if ($_smarty_tpl->tpl_vars['displayType']->value=='box'){?> active<?php }?>" id="display-box"></a></li>
					<?php }?>
					
					<?php if (!$_smarty_tpl->tpl_vars['disableDetails']->value){?>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="detail<?php if ($_smarty_tpl->tpl_vars['displayType']->value=='detail'){?> active<?php }?>" id="display-detail"></a></li>
					<?php }?>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="list<?php if ($_smarty_tpl->tpl_vars['displayType']->value=='list'){?> active<?php }?>" id="display-list"></a></li>
				<?php }else{ ?>
					<?php if (!$_smarty_tpl->tpl_vars['disableBox']->value){?>
					<li><a href="<?php echo ((((($_smarty_tpl->tpl_vars['url']->value).('b')).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="boxes<?php if ($_smarty_tpl->tpl_vars['displayType']->value=='box'){?> active<?php }?>" id="display-box"></a></li>
					<?php }?>
					<?php if (!$_smarty_tpl->tpl_vars['disableDetails']->value){?>
					<li><a href="<?php echo ((((($_smarty_tpl->tpl_vars['url']->value).('e')).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="detail<?php if ($_smarty_tpl->tpl_vars['displayType']->value=='detail'){?> active<?php }?>" id="display-detail"></a></li>
					<?php }?>
					<li><a href="<?php echo ((((($_smarty_tpl->tpl_vars['url']->value).('l')).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value);?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
" class="list<?php if ($_smarty_tpl->tpl_vars['displayType']->value=='list'){?> active<?php }?>" id="display-list"></a></li>
				<?php }?>
			</ul>
		</li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['listType']->value!='other'&&!$_smarty_tpl->tpl_vars['sortingDisabled']->value){?>
		<li class="sort-box">
			<div>
			<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
" id="projects-filters-form">
				<fieldset>
					<input type="hidden" name="display_type" value="<?php echo $_smarty_tpl->tpl_vars['displayType']->value;?>
" id="display-type">
					<input type="hidden" name="sort_order" value="<?php echo $_smarty_tpl->tpl_vars['sortOrder']->value;?>
" id="sort-order">

					<div class="select-wrapper">
						<div class="jui-select-box dark" id="sort-select-box">
						<select id="sort-select" name="sort_by">
							<option value="id" data-sort="asc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value=='id'){?> selected="selected"<?php }?>>sortowanie domyślne</option>
							<option value="usable_area" data-sort="asc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value=='usable_area'&&$_smarty_tpl->tpl_vars['sortOrder']->value=='ASC'){?> selected="selected"<?php }?>>po powierzchni (rosnąco)</option>
							<option value="usable_area" data-sort="desc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value=='usable_area'&&$_smarty_tpl->tpl_vars['sortOrder']->value=='DESC'){?> selected="selected"<?php }?>>po powierzchni (malejąco)</option>
							<?php if ($_smarty_tpl->tpl_vars['listType']->value=='house'){?>
							<option value="name" data-sort="asc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value=='name'&&$_smarty_tpl->tpl_vars['sortOrder']->value=='ASC'){?> selected="selected"<?php }?>>po nazwie (rosnąco)</option>
							<option value="name" data-sort="desc"<?php if ($_smarty_tpl->tpl_vars['sortBy']->value=='name'&&$_smarty_tpl->tpl_vars['sortOrder']->value=='DESC'){?> selected="selected"<?php }?>>po nazwie (malejąco)</option>
							<?php }?>
						</select>
						</div>
					</div>
				</fieldset>
			</form>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['type']->value=='house'){?>
				<span id="search-trigger">Filtruj</span>
			<?php }?>
		</li>
		<?php }?>
		<li>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
			<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'url'=>((((($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['displayMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value),'query'=>$_smarty_tpl->tpl_vars['query']->value), 0);?>

		<?php }?>
		</li>
	</ul>
</div>

<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
	<?php if ($_smarty_tpl->tpl_vars['isSearch']->value){?>
		<?php echo $_smarty_tpl->getSubTemplate (smarty_modifier_replace("Project/searchDisplay%type%.tpl",'%type%',ucfirst($_smarty_tpl->tpl_vars['displayType']->value)), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }elseif($_smarty_tpl->tpl_vars['listType']->value=='house'){?>
		<?php echo $_smarty_tpl->getSubTemplate (smarty_modifier_replace("Project/display%type%.tpl",'%type%',ucfirst($_smarty_tpl->tpl_vars['displayType']->value)), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>((((($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['displayMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value),'query'=>$_smarty_tpl->tpl_vars['query']->value), 0);?>

	<?php }else{ ?>
		<?php echo $_smarty_tpl->getSubTemplate (smarty_modifier_replace(smarty_modifier_replace("Project/%list%Display%type%.tpl",'%list%',$_smarty_tpl->tpl_vars['listType']->value),'%type%',ucfirst($_smarty_tpl->tpl_vars['displayType']->value)), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>((((($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['displayMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value),'query'=>$_smarty_tpl->tpl_vars['query']->value), 0);?>

	<?php }?>
<?php }else{ ?>
<section>
	<div class="box center">
		<p class="no-result">Niestety nic dla Ciebie nie znaleźliśmy</p>
		<p>Może Twoje kryteria wyszukiwania były zbyt szczegółowe? Zmień je lub przejdź do <a href="/projekty-domow/" class="blue">wszystkich projektów domów</a></p>
		
		<p class="no-result-ib"><img src="/img/search.png" alt=""></p>
	</div>
</section>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
<div class="control-box">
	<ul>
		<li><?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'url'=>((((($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['displayMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortByMapped']->value)).(',')).($_smarty_tpl->tpl_vars['sortOrderMapped']->value),'query'=>$_smarty_tpl->tpl_vars['query']->value), 0);?>
</li>
	</ul>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['description']->value&&$_smarty_tpl->tpl_vars['string_length']->value>=300){?>
<section>
	<div class="box" id="categoryDescription">
		<h2><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</h2>
		<div><p><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</p></div>
	</div>
</section>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<?php echo $_smarty_tpl->getSubTemplate ("Include/HowToBuy.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['isSearch']->value&&!$_smarty_tpl->tpl_vars['request']->value['query']){?>
<div id="backToTopOnList"></div>
<?php }?>
<?php }} ?>