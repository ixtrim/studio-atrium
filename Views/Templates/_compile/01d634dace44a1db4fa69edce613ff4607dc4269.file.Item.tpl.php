<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:31:18
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Article/Item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210178784762b030564e7521-61105321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01d634dace44a1db4fa69edce613ff4607dc4269' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Article/Item.tpl',
      1 => 1532692807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210178784762b030564e7521-61105321',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'documentTags' => 0,
    'tid' => 0,
    'allTags' => 0,
    'article' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b03056504306_79383145',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b03056504306_79383145')) {function content_62b03056504306_79383145($_smarty_tpl) {?><div class="wrapper">
	<div class="box spaced">
		<div class="actions-box">
		<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['documentTags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tid']->value = $_smarty_tpl->tpl_vars['tag']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['allTags']->value['main'][$_smarty_tpl->tpl_vars['tid']->value]){?>
				<p class="back"><a class="under" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
">Powrót do "<?php echo ucfirst($_smarty_tpl->tpl_vars['allTags']->value['main'][$_smarty_tpl->tpl_vars['tid']->value]);?>
"</a></p>
				<?php break 1?>
			<?php }?>
		<?php } ?>
		
			<div>
				<span class="net"></span>
				<span data-docid="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" title="drukuj artykuł" class="print"></span>
			</div>
		</div>
	
		<h1 class="article-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h1>

		<?php if ($_smarty_tpl->tpl_vars['documentTags']->value&&count($_smarty_tpl->tpl_vars['allTags']->value['normal'])>0){?>
		<ul class="article-tags article">
			<li><a href="/projekty-domow/">projekty domów</a></li>
			<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['documentTags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tid']->value = $_smarty_tpl->tpl_vars['tag']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['allTags']->value['main'][$_smarty_tpl->tpl_vars['tid']->value]){?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['allTags']->value['main'][$_smarty_tpl->tpl_vars['tid']->value];?>
</a></li>
				<?php }elseif($_smarty_tpl->tpl_vars['allTags']->value['normal'][$_smarty_tpl->tpl_vars['tid']->value]){?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['allTags']->value['normal'][$_smarty_tpl->tpl_vars['tid']->value];?>
</a></li>
				<?php }?>
			<?php } ?>
			
			<li>
				<a href="/<?php if ($_smarty_tpl->tpl_vars['article']->value['doctype']=='news'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'news','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->tpl_vars['article']->value['doctype']=='page'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'document','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }?>">
					<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>

				</a>
			</li>
		</ul>
		<?php }?>
		
		
		<div class="article-content"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fixArticleContent'][0][0]->mFixArticleContent($_smarty_tpl->tpl_vars['article']->value['content'],$_smarty_tpl->tpl_vars['article']->value['id']);?>
</div>
	</div>
</div>

<div class="blue-overlay share" id="links-pop">
	<div id="links-wrapper">
		<p class="pop-header">Prześlij znajomemu</p>
		
		<p class="nocaps">Wypełnij poniższy formularz i prześlij link do artykułu znajomemu.</p>
		
		<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'send'),$_smarty_tpl);?>
" id="links-form" data-docid="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
			<input name="module" type="hidden" value="article">
			<input name="action" type="hidden" value="send">

			<p>
				<label for="receiver-email" class="black">E-mail odbiorcy</label>
				<input type="text" name="receiver_email" id="receiver-email" class="long">
			</p>

			<p>
				<label for="sender-email" class="black">Twój e-mail</label>
				<input type="text" name="sender_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" id="sender-email" class="long">
			</p>
			
			<p>
				<label for="sender-sign" class="black">Twój podpis</label>
				<input type="text" name="signature" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
" id="sender-sign" class="long">
			</p>
			
			<p class="last"><input id="links_button" type="submit" value="wyślij" class="baton"></p>
			<p class="nocaps" id="links-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
		</form>
	</div>
	<button type="button" id="share-overlay-close" class="blue-overlay-close">Zamknij</button>
</div><?php }} ?>