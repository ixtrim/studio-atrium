<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 15:06:53
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116149500662b1de8d720c88-34688580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a26219c7cd42a8a609524753ef2cbd27ccc05c9d' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Messages.tpl',
      1 => 1582713365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116149500662b1de8d720c88-34688580',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'request' => 0,
    'tmpStamp' => 0,
    'project' => 0,
    'uploadedTmp' => 0,
    'tmp_uploadsUrl' => 0,
    '_file' => 0,
    'messages' => 0,
    'user' => 0,
    '_message' => 0,
    'uploadsUrl' => 0,
    '_attachment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1de8d7530c1_68524535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1de8d7530c1_68524535')) {function content_62b1de8d7530c1_68524535($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Panel/_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="content" id="Content">
	<h3>Napisz do nas</h3>
	
	<div class="panel-form-wrapper">
		<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message_store'),$_smarty_tpl);?>
" method="post" class="validable default long">
			<input name="module" value="panel" type="hidden">
			<input name="action" value="message_store" type="hidden">
			<?php if ($_smarty_tpl->tpl_vars['request']->value['pid']){?>
				<input name="pid" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pid'];?>
" type="hidden">
			<?php }?>
			<input type="hidden" id="ownerUid" name="ownerUid" value="<?php echo $_smarty_tpl->tpl_vars['tmpStamp']->value;?>
">
			<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
			<p>
				<input type="text" name="a_topic" id="a_topic" placeholder="Wpisz temat"<?php if ($_smarty_tpl->tpl_vars['project']->value){?> value="Zapytanie o projekt <?php if ($_smarty_tpl->tpl_vars['project']->value['name']){?><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
<?php }?>"<?php }?>>
			</p>
			<p>
				<textarea name="a_message" id="a_message" placeholder="Treść wiadomości..."></textarea>
			</p>
			<p class="last">
				
				<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value){?>
					<p class="last strong">Załączniki:</p>
				<?php }?>
				<div id="thumbnailFile">
					<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
					<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value){?>
						<?php  $_smarty_tpl->tpl_vars['_file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['uploadedTmp']->value['UserMessageFile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_file']->key => $_smarty_tpl->tpl_vars['_file']->value){
$_smarty_tpl->tpl_vars['_file']->_loop = true;
?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['tmp_uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['filename'];?>
" class="external"><?php echo $_smarty_tpl->tpl_vars['_file']->value['props']['original_filename'];?>
</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
)"><img src="/img/x.png" class="remove"></a>
						<?php } ?>
					<?php }?>
				</div>
			</p>
			<p class="last"><input type="submit" value="wyślij" class="baton"></p>
		</form>
	</div>
	
	<?php if ($_smarty_tpl->tpl_vars['messages']->value){?>
		<h3 class="line">Historia korespondencji</h3>
		
		<ul class="messages">
		<?php  $_smarty_tpl->tpl_vars['_message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_message']->key => $_smarty_tpl->tpl_vars['_message']->value){
$_smarty_tpl->tpl_vars['_message']->_loop = true;
?>
			<li>
				<span><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['user']->value['id'])){?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['user']->value['id']);?>
" alt="avatar"><?php }else{ ?><?php echo mb_substr($_smarty_tpl->tpl_vars['user']->value['name'],0,1);?>
<?php }?></span>
				<div>
					<p class="title"><?php echo $_smarty_tpl->tpl_vars['_message']->value['parent']['title'];?>
<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_message']->value['parent']['create_date'],"%d-%m-%Y (%T)");?>
</span><?php if ($_smarty_tpl->tpl_vars['_message']->value['parent']['status']=='new'){?> <i>oczekuje na odpowiedź</i><?php }elseif($_smarty_tpl->tpl_vars['_message']->value['parent']['status']=='deleted'){?> <i>przeczytana</i><?php }?><?php if ($_smarty_tpl->tpl_vars['_message']->value['parent']['project_id']){?> <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_message']->value['parent']['project_id'],'link_title'=>$_smarty_tpl->tpl_vars['_message']->value['parent']['project']['name'],'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_message']->value['parent']['project']['type'])),$_smarty_tpl);?>
">zobacz projekt <?php echo $_smarty_tpl->tpl_vars['_message']->value['parent']['project']['name'];?>
</a><?php }?></p>
					<p><?php echo nl2br($_smarty_tpl->tpl_vars['_message']->value['parent']['message']);?>
</p>
					<?php if ($_smarty_tpl->tpl_vars['_message']->value['parent']['attachments']['UserMessageFile']){?>
						<p class="attachments"><strong>Załączniki: </strong>
							<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_message']->value['parent']['attachments']['UserMessageFile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_attachment']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
 $_smarty_tpl->tpl_vars['_attachment']->index++;
 $_smarty_tpl->tpl_vars['_attachment']->first = $_smarty_tpl->tpl_vars['_attachment']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['attachment1']['first'] = $_smarty_tpl->tpl_vars['_attachment']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['attachment1']['first']){?>, <?php }?><a class="external" href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><?php echo $_smarty_tpl->tpl_vars['_attachment']->value['props']['original_filename'];?>
</a><?php } ?>
						</p>
					<?php }?>
				</div>
			</li>
			<?php if ($_smarty_tpl->tpl_vars['_message']->value['child']&&$_smarty_tpl->tpl_vars['_message']->value['parent']['status']!='deleted'){?>
				<li class="child">
					<span></span>
					<div>
						<p class="title"><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_message']->value['child']['create_date'],"%d-%m-%Y (%T)");?>
</span></p>
						<div><?php echo $_smarty_tpl->tpl_vars['_message']->value['child']['message'];?>
</div>
						<?php if ($_smarty_tpl->tpl_vars['_message']->value['child']['attachments']['UserMessageFile']){?>
							<p class="attachments"><strong>Załączniki: </strong>
								<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_message']->value['child']['attachments']['UserMessageFile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_attachment']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
 $_smarty_tpl->tpl_vars['_attachment']->index++;
 $_smarty_tpl->tpl_vars['_attachment']->first = $_smarty_tpl->tpl_vars['_attachment']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['attachment2']['first'] = $_smarty_tpl->tpl_vars['_attachment']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['attachment2']['first']){?>, <?php }?><a class="external" href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_attachment']->value['props']['original_filename'];?>
<?php }?></a><?php } ?>
							</p>
						<?php }?>
					</div>
				</li>
			<?php }?>
		<?php } ?>
		</ul>
	<?php }?>	
</div><?php }} ?>