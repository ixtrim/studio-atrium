<?php /* Smarty version Smarty-3.1.11, created on 2023-11-01 18:27:12
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/EditThread.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11282793966542988071e573-85970244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7d18b3d1438d146dff11908209ba1a92f5e2c52' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/EditThread.tpl',
      1 => 1582711343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11282793966542988071e573-85970244',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'post' => 0,
    'user' => 0,
    'notification' => 0,
    'uploadedTmp' => 0,
    '_attachment' => 0,
    'uploadsUrl' => 0,
    'tmp_uploadsUrl' => 0,
    '_file' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_65429880767484_69755417',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65429880767484_69755417')) {function content_65429880767484_69755417($_smarty_tpl) {?><div class="wrapper">
	<div class="box spaced">
		
		<h1><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'forum'),$_smarty_tpl);?>
">Forum</a></h1>
		<ul>
			<li>Edycja wątku: <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['post']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['topic'];?>
</a></li>
		</ul>
		
		<?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['user']->value['id']==$_smarty_tpl->tpl_vars['post']->value['author_id']){?>
		<div id="post-form-wrapper">
			<form class="validable" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'store_thread'),$_smarty_tpl);?>
" method="post" id="post-form" data-validate="Forum.validate">
				<fieldset>
					<input type="hidden" name="module" value="discuss">
					<input type="hidden" name="action" value="store_thread">
					<input type="hidden" name="postId" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">
					<input type="hidden" name="projectId" id="post-project-id" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['project_id'];?>
">
					<input type="hidden" id="ownerUid" name="ownerUid" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['_uid'];?>
">
					<input type="hidden" id="isTmpUid" name="isTmpUid" value="0">
					
					<div>
						<input type="text" name="subject" id="subject" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['topic'];?>
" placeholder="wpisz tytuł*">
					</div>
					
					<div class="small-space">
						<textarea id="content" name="content" cols="1" rows="1" placeholder="wpisz treść*"><?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>
</textarea>
					</div>
					
					<input type="checkbox" name="bindProject" id="bind" autocomplete="off"<?php if ($_smarty_tpl->tpl_vars['post']->value['project_id']){?> checked<?php }?>><label for="bind">powiąż temat z projektem</label>
					
					<div id="post-project-box"<?php if (!$_smarty_tpl->tpl_vars['post']->value['project_id']){?> style="display: none;"<?php }?>>
						<input type="text" name="project" id="post-project-name" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['project']['name'];?>
" placeholder="wpisz nazwę projektu">
						<ul id="names-holder" class="names-holder"></ul>
					</div>
					
					<div id="Content" style="position: relative;">
						<ul class="inputs-holder">
							<li class="center"><input type="checkbox" name="notify" id="notify"<?php if ($_smarty_tpl->tpl_vars['notification']->value){?> checked<?php }?>><label class="nocaps" for="notify">chcę otrzymywać powiadomienia o nowych wpisach</label></li>

							<li class="middle">
							<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value||$_smarty_tpl->tpl_vars['post']->value['attachments']){?>
								<p class="last strong">wgrane grafiki:</p>
							<?php }?>
							
							<?php if ($_smarty_tpl->tpl_vars['post']->value['attachments']){?>
								<div class="attachmentList">
									<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['post']->value['attachments']['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
?>
										<div>
											<a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?> data-caption="<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="Załącznik do wpisu"></a>
											<p><a href="javascript:" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['id'];?>
);">usuń</a></p>
										</div>
									<?php } ?>
								</div>
							<?php }?>
							
							<div id="thumbnailFile">
								<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
								<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value){?>
									<?php  $_smarty_tpl->tpl_vars['_file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['uploadedTmp']->value['CommentImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_file']->key => $_smarty_tpl->tpl_vars['_file']->value){
$_smarty_tpl->tpl_vars['_file']->_loop = true;
?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['tmp_uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['filename'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['_file']->value['props']['original_filename'];?>
</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
);"><img src="/img/x.png" class="remove"></a>
									<?php } ?>
								<?php }?>
							</div>
							</li>
							<li class="submit"><button class="baton" id="publish-trigger">Zachowaj zmiany</button> <span><img id="post-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span></li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
		<?php }else{ ?>
		<p>Nie możesz edytować tego wpisu na forum.</p>
		<?php }?>
	</div>
</div><?php }} ?>