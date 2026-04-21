<?php /* Smarty version Smarty-3.1.11, created on 2025-11-26 14:11:55
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/Thread.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25976023862b0326016ae51-73972542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f6fa243253e4626580ccacf246b1ca68d78fb65' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/Thread.tpl',
      1 => 1764164768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25976023862b0326016ae51-73972542',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b032601e6ad2_05798752',
  'variables' => 
  array (
    'post' => 0,
    'categories' => 0,
    '_key' => 0,
    '_item' => 0,
    'request' => 0,
    'pages' => 0,
    'page' => 0,
    'url' => 0,
    'user' => 0,
    'postNotifcation' => 0,
    'adminIds' => 0,
    '_attachment' => 0,
    'uploadsUrl' => 0,
    'project' => 0,
    'project_id' => 0,
    'tmpStamp' => 0,
    'uploadedTmp' => 0,
    'tmp_uploadsUrl' => 0,
    '_file' => 0,
    'thread' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b032601e6ad2_05798752')) {function content_62b032601e6ad2_05798752($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><div class="wrapper">
	<div class="box spaced">
		<h1><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'forum'),$_smarty_tpl);?>
">Forum</a></h1>
		<ul>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'category','id'=>$_smarty_tpl->tpl_vars['post']->value['cat_id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['post']->value['cat_id']]['title'];?>
</a></li>
			<li><strong><?php echo $_smarty_tpl->tpl_vars['post']->value['topic'];?>
</strong></li>
		</ul>

		<div id="search-forum">
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
										<option value="0">w kategorii</option>
										<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
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
		
		<ul class="forum-header thread" id="reply">
			<li>
				<p>Autor</p>
			</li>
			<li>
				<p>Dyskusja: <strong><?php echo $_smarty_tpl->tpl_vars['post']->value['topic'];?>
</strong></p>
				<?php if ($_smarty_tpl->tpl_vars['user']->value){?>
					<div class="notify-box">
						<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'set_notification'),$_smarty_tpl);?>
" method="post" id="notification-form">
							<fieldset>
								<input type="hidden" id="notify-pid" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">
								<input type="hidden" id="notify-uid" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
							
									<input type="checkbox" name="notifyMe" id="notifyMe" autocomplete="off"<?php if ($_smarty_tpl->tpl_vars['postNotifcation']->value){?> checked<?php }?>><label for="notifyMe">powiadamiaj mnie o nowych wpisach</label>
									<span><img id="notify-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span>
							</fieldset>
						</form>
					</div>
				<?php }?>
			</li>
		</ul>

		<div class="forum-thread" id="forum-thread">
			<ul class="parent">
				<li>
					<div class="base">
						<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['post']->value['author_id'])){?>
							<p class="avatar"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['post']->value['author_id']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['nick'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['nick'];?>
</p>
						<?php }else{ ?>
							<p<?php if (in_array($_smarty_tpl->tpl_vars['post']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> class="sa"<?php }else{ ?> data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['nick'],1,'');?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['post']->value['nick'];?>
</p>
						<?php }?>	
						<?php if ($_smarty_tpl->tpl_vars['post']->value['author_id']){?>
							<?php if (!in_array($_smarty_tpl->tpl_vars['post']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
							<ul>
								<li>Posty: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['post']->value['user']['props']['forum']['count'])===null||$tmp==='' ? 0 : $tmp);?>
</li>
								<li>Pierwszy post: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['post']->value['user']['props']['forum']['date'])===null||$tmp==='' ? "-" : $tmp);?>
</li>
							</ul>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['post']->value['author_id']){?>
								<?php if (in_array($_smarty_tpl->tpl_vars['post']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
									<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
"><span class="postme2">napisz wiadomość</span></a>
								<?php }else{ ?>
									<span class="postme" data-aid="<?php echo $_smarty_tpl->tpl_vars['post']->value['author_id'];?>
">napisz wiadomość</span>
								<?php }?>	
							<?php }?>
						<?php }else{ ?>
							<span>niezarejestrowany</span>
						<?php }?>
					</div>
				</li>
				<li>
					<p id="thread-post"<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['post']->value['author_id'])){?> class="avatar"<?php }?>>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hideEmails'][0][0]->mHideEmails(nl2br($_smarty_tpl->tpl_vars['post']->value['content']));?>
<?php if ($_smarty_tpl->tpl_vars['post']->value['author_id']==$_smarty_tpl->tpl_vars['user']->value['id']){?><p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'edit_thread','cid'=>$_smarty_tpl->tpl_vars['post']->value['cat_id'],'id'=>$_smarty_tpl->tpl_vars['request']->value['id']),$_smarty_tpl);?>
">edytuj post</a></p><?php }?>
					</p>
					
					<?php if ($_smarty_tpl->tpl_vars['page']->value>1){?><p id="expand-post" class="expand">rozwiń wpis</p><?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['post']->value['attachments']){?>
						<div class="attList">
						<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['post']->value['attachments']['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
?>
							<a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?> data-caption="<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="Załącznik do wpisu"></a>
						<?php } ?>
						</div>
					<?php }?>
					
					<div>
						<span>utworzony: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['create_date'],"%d-%m-%Y (%T)");?>
</span>
						<?php if ($_smarty_tpl->tpl_vars['project']->value){?>
							
							<span class="project overview" data-id="<?php echo $_smarty_tpl->tpl_vars['project_id']->value;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-ground="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['project']->value['params_general'],true)){?> data-floor="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>'1st_floor'),$_smarty_tpl);?>
"<?php }?><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['project']->value['params_general'],true)){?> data-loft="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>'loft'),$_smarty_tpl);?>
"<?php }?> data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['project']->value['price']){?><?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['project']->value['price']-$_smarty_tpl->tpl_vars['project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
<?php }?><?php }else{ ?>-<?php }?>" data-name="<?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
" data-parcel="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['houseHeight'][0][0]->mHouseHeight($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
" data-version="<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'){?>wersja szkieletowa<?php }else{ ?>wersja murowana<?php }?>" data-rooms="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roomCount'][0][0]->mRoomCount($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['project']->value['short_description'];?>
"><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</span>
						<?php }?>
					</div>
					
					<span id="reply-trigger">Odpowiedz</span>
				</li>
			</ul>
		</div>
		
		<div id="post-form-wrapper" style="display: none;">
			<form class="validable" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'add_post'),$_smarty_tpl);?>
" method="post" id="post-form" data-validate="Thread.validate">
				<fieldset>
					<input type="hidden" name="module" value="discuss">
					<input type="hidden" name="action" value="add_post">
					<input type="hidden" name="categoryId" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['cat_id'];?>
">
					<input type="hidden" name="parentId" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['id'];?>
">
					<input type="hidden" id="ownerUid" name="ownerUid" value="<?php echo $_smarty_tpl->tpl_vars['tmpStamp']->value;?>
">
					<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
					<?php if ($_smarty_tpl->tpl_vars['project']->value){?>
					<input type="hidden" name="projectId" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
">
					<?php }?>
					
					<div class="small-space">
						<textarea id="content" name="content" cols="1" rows="1" placeholder="wpisz treść*"></textarea>
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
" target="_blank" style="margin-left: 15px;"><?php echo $_smarty_tpl->tpl_vars['_file']->value['props']['original_filename'];?>
</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
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
		
		<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thread']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
		<div class="forum-thread post">
			<ul>
				<li>
					<div>
						<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_item']->value['author_id'])){?>
							<p class="avatar"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_item']->value['author_id']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['nick'];?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['nick'];?>
</p>
						<?php }else{ ?>
							<p<?php if (in_array($_smarty_tpl->tpl_vars['_item']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> class="sa"<?php }else{ ?> data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_item']->value['nick'],1,'');?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['nick'];?>
</p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['_item']->value['author_id']){?>
							<?php if (!in_array($_smarty_tpl->tpl_vars['_item']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
							<ul>
								<li>Posty: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['_item']->value['user']['props']['forum']['count'])===null||$tmp==='' ? 0 : $tmp);?>
</li>
								<li>Pierwszy post: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['_item']->value['user']['props']['forum']['date'])===null||$tmp==='' ? "-" : $tmp);?>
</li>
							</ul>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['_item']->value['author_id']){?>
								<?php if (in_array($_smarty_tpl->tpl_vars['_item']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
									<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
"><span class="postme2">napisz wiadomość</span></a>
								<?php }else{ ?>
									<span class="postme" data-aid="<?php echo $_smarty_tpl->tpl_vars['_item']->value['author_id'];?>
">napisz wiadomość</span>
								<?php }?>	
							<?php }?>
						<?php }else{ ?>
							<span>niezarejestrowany</span>
						<?php }?>
					</div>
				</li>
				
				<li>
					<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hideEmails'][0][0]->mHideEmails(nl2br($_smarty_tpl->tpl_vars['_item']->value['content']));?>
<?php if ($_smarty_tpl->tpl_vars['_item']->value['author_id']==$_smarty_tpl->tpl_vars['user']->value['id']){?><p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'edit_post','cid'=>$_smarty_tpl->tpl_vars['post']->value['cat_id'],'id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl);?>
">edytuj post</a></p><?php }?></p>
					
					<?php if ($_smarty_tpl->tpl_vars['_item']->value['attachments']){?>
						<div class="attList">
						<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_item']->value['attachments']['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
?>
							<a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?> data-caption="<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="Załącznik do wpisu"></a>
						<?php } ?>
						</div>
					<?php }?>
					
					<div>
						<span>utworzony: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_item']->value['create_date'],"%d-%m-%Y (%T)");?>
</span>
					</div>
					
					<?php if ($_smarty_tpl->tpl_vars['_item']->last){?>
					<span id="reply-bis-trigger">Odpowiedz</span>
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

<?php if ($_smarty_tpl->tpl_vars['user']->value){?>
<div class="blue-overlay message" id="message-overlay">
	<div class="over-box">
		<div>
			<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'send_message'),$_smarty_tpl);?>
" id="message-form">
				<input name="module" type="hidden" value="discuss">
				<input name="action" type="hidden" value="send_message">
				<input name="senderId" id="message-sender" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
				<input name="receiverId" id="message-receiver" type="hidden" value="">

				<p>
					<label for="message-title" class="black">Temat</label>
					<input type="text" name="title" id="message-title" class="long">
				</p>
				<p>
					<label for="message-content" class="black">Treść wiadomości</label>
					<textarea id="message-content" name="content" cols="1" rows="1"></textarea>
				</p>
				
				<p class="send-box"><input id="message-trigger" type="submit" value="wyślij" class="baton"></p>
				<p class="nocaps info-box" id="message-res-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		</div>
	</div>
	<button type="button" id="message-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['project']->value){?>
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
</div>
<?php }?><?php }} ?>