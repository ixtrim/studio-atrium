<?php /* Smarty version Smarty-3.1.11, created on 2024-01-25 19:46:22
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/ForumMessage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103577079565b2ba8ea49f62-86364192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b610686fa12f690b8ada06c94603435533efc1c' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/ForumMessage.tpl',
      1 => 1523264898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103577079565b2ba8ea49f62-86364192',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    '_thread' => 0,
    '_message' => 0,
    'senders' => 0,
    'nick' => 0,
    'adminIds' => 0,
    'user' => 0,
    'pid' => 0,
    'receiver' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_65b2ba8ea9e646_50130348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65b2ba8ea9e646_50130348')) {function content_65b2ba8ea9e646_50130348($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Panel/_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="content">
	<ul class="choice">
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'forum'),$_smarty_tpl);?>
">Twoje wpisy na forum</a></li>
		<li class="last selected"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'forum_message'),$_smarty_tpl);?>
">Skrzynka wiadomości</a></li>
	</ul>
	
	<ul class="forum-header thread">
		<li>
			<p>Autor</p>
		</li>
		<li>
			<p>Wiadomość</p>
		</li>
	</ul>

	<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
		<?php  $_smarty_tpl->tpl_vars['_thread'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_thread']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_thread']->key => $_smarty_tpl->tpl_vars['_thread']->value){
$_smarty_tpl->tpl_vars['_thread']->_loop = true;
?>
		<div class="message-thread">
			<?php  $_smarty_tpl->tpl_vars['_message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_thread']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_message']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_message']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['_message']->key => $_smarty_tpl->tpl_vars['_message']->value){
$_smarty_tpl->tpl_vars['_message']->_loop = true;
 $_smarty_tpl->tpl_vars['_message']->iteration++;
?>
			
			<?php if ($_smarty_tpl->tpl_vars['senders']->value[$_smarty_tpl->tpl_vars['_message']->value['sender_id']]['nick']){?>
				<?php $_smarty_tpl->tpl_vars['nick'] = new Smarty_variable($_smarty_tpl->tpl_vars['senders']->value[$_smarty_tpl->tpl_vars['_message']->value['sender_id']]['nick'], null, 0);?>
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['nick'] = new Smarty_variable($_smarty_tpl->tpl_vars['senders']->value[$_smarty_tpl->tpl_vars['_message']->value['sender_id']]['name'], null, 0);?>
			<?php }?>
			
			<ul<?php if ($_smarty_tpl->tpl_vars['_message']->iteration>1){?> class="reply"<?php }?>>
				<li>
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_message']->value['sender_id'])){?>
						<p class="avatar"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_message']->value['sender_id']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['nick']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['nick']->value;?>
</p>
					<?php }else{ ?>
						<p<?php if (in_array($_smarty_tpl->tpl_vars['_message']->value['sender_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> class="sa"<?php }else{ ?> data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['nick']->value,1,'');?>
"<?php }?>>
							<?php echo $_smarty_tpl->tpl_vars['nick']->value;?>

						</p>
					<?php }?>
					<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_message']->value['create_date'],"%d-%m-%Y");?>
</span>
					<?php if ($_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['_message']->value['sender_id']){?>
						<?php if ($_smarty_tpl->tpl_vars['_message']->value['parent_id']){?>
							<?php $_smarty_tpl->tpl_vars['pid'] = new Smarty_variable($_smarty_tpl->tpl_vars['_message']->value['parent_id'], null, 0);?>
						<?php }else{ ?>
							<?php $_smarty_tpl->tpl_vars['pid'] = new Smarty_variable($_smarty_tpl->tpl_vars['_message']->value['id'], null, 0);?>
						<?php }?>
						<div>
							<span class="reply-post" data-title="<?php echo $_smarty_tpl->tpl_vars['_message']->value['topic'];?>
" data-parent="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" data-rid="<?php echo $_smarty_tpl->tpl_vars['_message']->value['sender_id'];?>
">odpowiedz</span>
						</div>
					<?php }?>
				</li>
				<li>
				
					<?php if ($_smarty_tpl->tpl_vars['user']->value['id']==$_smarty_tpl->tpl_vars['_message']->value['sender_id']&&$_smarty_tpl->tpl_vars['_message']->total==1){?>
						<?php if ($_smarty_tpl->tpl_vars['senders']->value[$_smarty_tpl->tpl_vars['_message']->value['receiver_id']]['nick']){?>
							<?php $_smarty_tpl->tpl_vars['receiver'] = new Smarty_variable($_smarty_tpl->tpl_vars['senders']->value[$_smarty_tpl->tpl_vars['_message']->value['receiver_id']]['nick'], null, 0);?>
						<?php }else{ ?>
							<?php $_smarty_tpl->tpl_vars['receiver'] = new Smarty_variable($_smarty_tpl->tpl_vars['senders']->value[$_smarty_tpl->tpl_vars['_message']->value['receiver_id']]['name'], null, 0);?>
						<?php }?>
					<?php }?>
				
					<p><strong><?php echo $_smarty_tpl->tpl_vars['_message']->value['topic'];?>
</strong><?php if ($_smarty_tpl->tpl_vars['user']->value['id']==$_smarty_tpl->tpl_vars['_message']->value['sender_id']&&$_smarty_tpl->tpl_vars['_message']->total==1){?> <span>(wiadomość wysłana do <?php echo $_smarty_tpl->tpl_vars['receiver']->value;?>
)</span><?php }?></p>
					<p><?php echo nl2br($_smarty_tpl->tpl_vars['_message']->value['content']);?>
</p>
				</li>
			</ul>
			<?php } ?>
		</div>
		<?php } ?>
	<?php }else{ ?>
		<p class="shout">Nie masz jeszcze żadnych wiadomości na forum.</p>
	<?php }?>
</div>

<div class="blue-overlay message" id="message-overlay">
	<div class="over-box">
		<div>
			<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'send_message'),$_smarty_tpl);?>
" id="message-form">
				<input name="module" type="hidden" value="discuss">
				<input name="action" type="hidden" value="send_message">
				<input name="parentId" id="message-parent" type="hidden" value="">
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
</div><?php }} ?>