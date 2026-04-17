<?php /* Smarty version Smarty-3.1.11, created on 2025-11-26 14:12:06
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/Search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100587981262ba16c84627f7-18711524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d0aa3b009b2f86887fdb7cfd2276e26f8115b33' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/Search.tpl',
      1 => 1764164838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100587981262ba16c84627f7-18711524',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62ba16c84d7537_56779050',
  'variables' => 
  array (
    'request' => 0,
    'categories' => 0,
    'total' => 0,
    'query' => 0,
    '_key' => 0,
    '_item' => 0,
    'pages' => 0,
    'page' => 0,
    'url' => 0,
    'queryPart' => 0,
    'posts' => 0,
    'adminIds' => 0,
    '_threadId' => 0,
    'projects' => 0,
    '_project' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62ba16c84d7537_56779050')) {function content_62ba16c84d7537_56779050($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><div class="wrapper spaced">
	<div class="box spaced">
		
		<h1><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'forum'),$_smarty_tpl);?>
">Forum</a></h1>
		<ul>
			<li>Wynik wyszukiwania dla 
				<?php if ($_smarty_tpl->tpl_vars['request']->value['query']){?><span>zapytania: </span> <strong><?php echo $_smarty_tpl->tpl_vars['request']->value['query'];?>
</strong> <?php }?>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['cid']){?><span>kategorii: </span> <strong><?php echo $_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['request']->value['cid']]['title'];?>
</strong> <?php }?>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['pid']){?><span>projektu: </span> <strong id="search-project-name"></strong><?php }?>
				<strong>(<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
)</strong>
			</li>
		</ul>

		<div id="search-forum">
			<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'search'),$_smarty_tpl);?>
" method="get" id="forum-filters-form">
				<fieldset>
					<ul class="filters-box">
						<li>
							<input id="forum-search-field" name="query" value="<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
" placeholder="wpisz szukane słowo" type="text" autocomplete="off">
						</li>
						<li>
							<div class="select-wrapper">
								<div class="jui-select-box dark" id="category-select-box">
									<select id="category-select" name="cid">
										<option value="0" <?php if (!$_smarty_tpl->tpl_vars['request']->value['cid']){?> selected<?php }?>>w kategorii</option>
										<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->first = $_smarty_tpl->tpl_vars['_item']->index === 0;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['request']->value['cid']==$_smarty_tpl->tpl_vars['_key']->value){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</li>
						<li class="forum-projects-box">
							<input id="forum-project-field" value="<?php if ($_smarty_tpl->tpl_vars['request']->value['project']){?><?php echo $_smarty_tpl->tpl_vars['request']->value['project'];?>
<?php }?>" placeholder="<?php if ($_smarty_tpl->tpl_vars['request']->value['project']){?><?php echo $_smarty_tpl->tpl_vars['request']->value['project'];?>
<?php }else{ ?>wpisz nazwę projektu<?php }?>" type="text" autocomplete="off">
							<ul id="projects-holder" style="display: none;"></ul>
						</li>
						<li><input type="submit" class="baton" value="Szukaj"></li>
					</ul>
					
					<input type="hidden" id="search-pid" name="pid" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['request']->value['pid'])===null||$tmp==='' ? 0 : $tmp);?>
">
				</fieldset>
			</form>
		</div>
		
		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
		<div class="pager-box">
			<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'query'=>$_smarty_tpl->tpl_vars['queryPart']->value), 0);?>

		</div>
		<?php }?>
	
		<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->first = $_smarty_tpl->tpl_vars['_item']->index === 0;
?>
			<?php if ($_smarty_tpl->tpl_vars['_item']->value['parent_id']){?>
				<?php $_smarty_tpl->tpl_vars['_threadId'] = new Smarty_variable($_smarty_tpl->tpl_vars['_item']->value['parent_id'], null, 0);?>
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['_threadId'] = new Smarty_variable($_smarty_tpl->tpl_vars['_item']->value['id'], null, 0);?>
			<?php }?>
		<div class="forum-search<?php if ($_smarty_tpl->tpl_vars['_item']->first){?> first<?php }?>">
			<ul>
				<li>
					<div>
						<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_item']->value['uid'])){?>
							<p class="avatar"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_item']->value['uid']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['unick'];?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['unick'];?>
</p>
						<?php }else{ ?>
							<p<?php if (in_array($_smarty_tpl->tpl_vars['_item']->value['uid'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> class="nick sa"<?php }else{ ?> class="nick" data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_item']->value['unick'],1,'');?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['unick'];?>
</p>
						<?php }?>
						<p><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_item']->value['pdate'],"%d-%m-%Y (%T)");?>
</p>
					</div>
				</li>
				<li class="result">
					<p class="head">
						<?php if (!$_smarty_tpl->tpl_vars['_item']->value['parent_id']){?>
							Temat: <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_threadId']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['ptitle'];?>
</a>
						<?php }else{ ?>
							Odpowiedź w temacie: <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_threadId']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['dadtopic'];?>
</a>
						<?php }?>
					</p>
					<div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hideEmails'][0][0]->mHideEmails(smarty_modifier_truncate($_smarty_tpl->tpl_vars['_item']->value['content'],320));?>

						<p class="small">w kategorii: <?php echo $_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['_item']->value['cat_id']]['title'];?>

						<?php if ($_smarty_tpl->tpl_vars['_item']->value['project_id']){?>
							<?php $_smarty_tpl->tpl_vars['_project'] = new Smarty_variable($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_item']->value['project_id']], null, 0);?>
							| związany z projektem: <span class="project overview" data-id="<?php echo $_smarty_tpl->tpl_vars['_item']->value['project_id'];?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-ground="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?> data-floor="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'1st_floor'),$_smarty_tpl);?>
"<?php }?><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?> data-loft="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'loft'),$_smarty_tpl);?>
"<?php }?> data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['price']){?><?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?><?php }else{ ?>-<?php }?>" data-name="<?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-parcel="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['houseHeight'][0][0]->mHouseHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-version="<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>wersja szkieletowa<?php }else{ ?>wersja murowana<?php }?>" data-rooms="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roomCount'][0][0]->mRoomCount($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
"><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
</span>
						<?php }?>
						</p>
					</div>
				</li>
			</ul>
		</div>
		<?php } ?>
		
		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
		<div class="pager-box">
			<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'query'=>$_smarty_tpl->tpl_vars['queryPart']->value), 0);?>

		</div>
		<?php }?>
	</div>
</div>

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
			<a href="">
				<img class="preload" id="over-img" src="/img/dummy.png" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li><p>ilość pokoi: <span id="over-rooms"></span></p></li>
			<li><p>powierzchnia użytkowa: <strong id="over-area"></strong> m<sup>2</sup></p></li>
			<li><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li><p>wysokość budynku: <span id="over-height"></span> m</p></li>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div><?php }} ?>