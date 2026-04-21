<?php /* Smarty version Smarty-3.1.11, created on 2025-11-26 14:12:28
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/Category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31314172062b03441166054-36927861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '172ee042bca33df57e20c85d4ed6287417ae8438' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/Category.tpl',
      1 => 1764164932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31314172062b03441166054-36927861',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b034411bcd46_64176423',
  'variables' => 
  array (
    'request' => 0,
    'category' => 0,
    'cache' => 0,
    'tmpStamp' => 0,
    'user' => 0,
    'uploadedTmp' => 0,
    'tmp_uploadsUrl' => 0,
    '_file' => 0,
    'categories' => 0,
    '_key' => 0,
    '_item' => 0,
    'pages' => 0,
    'page' => 0,
    'url' => 0,
    'threads' => 0,
    'projects' => 0,
    '_project' => 0,
    'adminIds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b034411bcd46_64176423')) {function content_62b034411bcd46_64176423($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><div class="wrapper">
	<div class="box spaced">
		<h1><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'forum'),$_smarty_tpl);?>
">Forum</a></h1>
		<ul>
			<li><p id="post-category" data-cid="<?php echo $_smarty_tpl->tpl_vars['request']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
</p></li>
		</ul>
		<p><?php echo $_smarty_tpl->tpl_vars['category']->value['long'];?>
</p>

		<div class="new-comment-trigger">
			<span class="framed blue" id="add-thread">Dodaj nowy wpis</span>
		</div>
		
		<div id="post-form-wrapper"<?php if (!$_smarty_tpl->tpl_vars['cache']->value){?> style="display: none;"<?php }?>>
			<form class="validable" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'add_thread'),$_smarty_tpl);?>
" method="post" id="post-form" data-validate="Forum.validate">
				<fieldset>
					<input type="hidden" name="module" value="discuss">
					<input type="hidden" name="action" value="add_thread">
					<input type="hidden" name="categoryId" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['id'];?>
">
					<input type="hidden" name="projectId" id="post-project-id" value="">
					<input type="hidden" id="ownerUid" name="ownerUid" value="<?php echo $_smarty_tpl->tpl_vars['tmpStamp']->value;?>
">
					<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
					
					<div>
						<input type="text" name="subject" id="subject" placeholder="wpisz tytuł*" value="">
					</div>
					
					<div class="small-space">
						<textarea id="content" name="content" cols="1" rows="1" placeholder="wpisz treść*"></textarea>
					</div>
					
					<input type="checkbox" name="bindProject" id="bind" autocomplete="off"><label for="bind">powiąż temat z projektem</label>
					
					<div id="post-project-box" style="display: none;">
						<input type="text" name="project" id="post-project-name" autocomplete="off" placeholder="wpisz nazwę projektu">
						<ul id="names-holder" class="names-holder"></ul>
					</div>
					
					<div id="Content" style="position: relative;">
						<ul class="inputs-holder">
							<?php if (!$_smarty_tpl->tpl_vars['user']->value){?><li class="middle"><span><a href="javascript:" class="login-trigger" id="post-login-trigger">Zaloguj się</a> lub wypełnij poniższe dane</span></li><?php }?>
							<li class="mystic"><label for="age">Wiek</label><input type="text" name="age" id="comment-age" value=""></li>
							<li class="spaced short"><label for="nick">Nazwa / Nick*</label><input type="text" name="nick" id="nick" value="<?php if ($_smarty_tpl->tpl_vars['user']->value['nick']){?><?php echo $_smarty_tpl->tpl_vars['user']->value['nick'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
<?php }?>"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> readonly<?php }?>></li>
							<li class="rite noPadd short"><input type="checkbox" name="notify" id="notify"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> class="notShow"<?php }?>><label class="nocaps" for="notify">chcę otrzymywać powiadomienia o nowych wpisach</label></li>
							<li class="short" id="post-mail-box" style="display: none;"><label for="post-email">E-mail</label><input type="text" name="email" id="post-email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> readonly<?php }?>></li>
							<li class="middle">
							<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value){?>
								<p class="last">wgrane grafiki:</p>
							<?php }?>
							<div id="thumbnailFile">
								<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
								<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value){?>
									<?php  $_smarty_tpl->tpl_vars['_file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['uploadedTmp']->value['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_file']->key => $_smarty_tpl->tpl_vars['_file']->value){
$_smarty_tpl->tpl_vars['_file']->_loop = true;
?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['tmp_uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['filename'];?>
" target="_blank" style="margin-left: 15px;"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['childAttachments']['thumb'][0]['filename'];?>
"></a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
);"><img src="/img/x.png" class="remove"></a>
									<?php } ?>
								<?php }?>
							</div>
							</li>
							<li class="rite middle short"><input type="checkbox" name="regulations" id="regulations"><label class="nocaps" for="regulations">akceptuję </label><span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">regulamin korzystania</span></li>
							<li class="submit"><button class="baton" id="publish-trigger">Publikuj</button> <span><img id="post-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span></li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
	
		<ul class="forum-menu">
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
?>
				<li<?php if ($_smarty_tpl->tpl_vars['request']->value['id']==$_smarty_tpl->tpl_vars['_key']->value){?> class="selected"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'category','id'=>$_smarty_tpl->tpl_vars['_key']->value),$_smarty_tpl);?>
"><span class="<?php echo $_smarty_tpl->tpl_vars['_item']->value['class'];?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['short'];?>
</span></a></li>
			<?php } ?>
			<li id="forum-search-trigger"><span class="fcat-search">Szukaj</span></li>
		</ul>

		<div id="search-forum" class="wrapped">
			<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'search'),$_smarty_tpl);?>
" method="get" id="forum-filters-form">
				<fieldset>
					<ul class="filters-box">
						<li>
							<input id="forum-search-field" name="query" value="" placeholder="wpisz szukane słowo" type="text" autocomplete="off">
						</li>
						<li>
							<div class="select-wrapper">
								<div class="jui-select-box dark" id="category-select-box">
									<select id="category-select" name="cid">
										<option value="0" <?php if (!$_smarty_tpl->tpl_vars['request']->value['id']){?> selected="selected"<?php }?>>w kategorii</option>
										<option value="100" <?php if ($_smarty_tpl->tpl_vars['request']->value['id']==100){?> selected="selected"<?php }?>>Komentarze</option>
										<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['request']->value['id']==$_smarty_tpl->tpl_vars['_key']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
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
			<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0);?>

		</div>
		<?php }?>
		
		<ul class="forum-header category">
			<li>
				<p>Tematy</p>
			</li>
			<li>
				<p>Ostatni wpis</p>
			</li>
		</ul>

		<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['threads']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
		<div class="forum-cats">
			<ul>
				<li>
					<h4><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['topic'];?>
</a></h4>
					<p class="thread"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hideEmails'][0][0]->mHideEmails(smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['_item']->value['content']),200));?>
</p>
					<div>
						<span>utworzył:</span>
						<span class="nick"><?php echo $_smarty_tpl->tpl_vars['_item']->value['nick'];?>
</span>
						<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_item']->value['create_date'],"%d-%m-%Y");?>
</span>
						<?php if ($_smarty_tpl->tpl_vars['_item']->value['project_id']&&isset($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_item']->value['project_id']])){?>
						<?php $_smarty_tpl->tpl_vars['_project'] = new Smarty_variable($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_item']->value['project_id']], null, 0);?>
						<span class="project overview" data-id="<?php echo $_smarty_tpl->tpl_vars['_item']->value['project_id'];?>
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
					</div>
				</li>
				<?php if ($_smarty_tpl->tpl_vars['_item']->value['subid']){?>
				<li>
					<ul>
						<li>
							<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_item']->value['subauthorid'])){?>
								<p class="avatar"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_item']->value['subauthorid']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['subnick'];?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['subnick'];?>
</p>
							<?php }else{ ?>
								<p<?php if (in_array($_smarty_tpl->tpl_vars['_item']->value['subauthorid'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> class="nick sa"<?php }else{ ?> class="nick" data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_item']->value['subnick'],1,'');?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['subnick'];?>
</p>
							<?php }?>
							<p><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_item']->value['subdate'],"%d-%m-%Y");?>
</p>
							<p>(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_item']->value['subdate'],"%H:%M:%S");?>
)</p>
						</li>
						<li>
							<div>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl);?>
?ostatni=1">
									<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hideEmails'][0][0]->mHideEmails(smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['_item']->value['subcontent']),160));?>
</p>
								</a>
							</div>
						</li>
					</ul>
				<?php }else{ ?>
				<li class="reply">
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl);?>
#reply">Odpowiedz</a>
				<?php }?>
				</li>
			</ul>
		</div>
		<?php } ?>
		
		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
		<div class="pager-box">
			<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0);?>

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