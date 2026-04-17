<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 09:47:59
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/About.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86675958562b0424f5a9f20-70653939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e950c604f99dd07404906257bfd20318fefc539a' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/About.tpl',
      1 => 1497255673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86675958562b0424f5a9f20-70653939',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'document' => 0,
    'editions' => 0,
    'actions' => 0,
    'architecture' => 0,
    'staticAboutUrl' => 0,
    '_item' => 0,
    '_gid' => 0,
    'codes' => 0,
    'plchars' => 0,
    '_linkTxt' => 0,
    'staticStockUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0424f5fe881_14143907',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0424f5fe881_14143907')) {function content_62b0424f5fe881_14143907($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Studio Atrium - marka z pomysłami</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		<div class="article-box">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fixArticleContent'][0][0]->mFixArticleContent($_smarty_tpl->tpl_vars['document']->value['content'],$_smarty_tpl->tpl_vars['document']->value['id']);?>

		</div>
		
		<ul id="holder">
			<?php if ($_smarty_tpl->tpl_vars['editions']->value){?>
			<li class="editions" id="editions">
				<div>
					<img src="/img/about_wydawnictwa.jpg" alt="Nasze wydawnictwa">
				</div>
				<p>Wydawnictwa</p>
				<span class="work-trigger"></span>
			</li>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['actions']->value){?>
			<li class="actions" id="actions">
				<div>
					<img src="/img/about_akcje.jpg" alt="Nasze akcje">
				</div>
				<p>Akcje</p>
				<span class="work-trigger"></span>
			</li>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['architecture']->value){?>
			<li class="architecture" id="architecture">
				<div>
					<img src="/img/about_architektura.jpg" alt="Architektura">
				</div>
				<p>Architektura</p>
				<span class="work-trigger"></span>
			</li>
			<?php }?>
		</ul>
		
		<div id="works-wrapper">
			<?php if ($_smarty_tpl->tpl_vars['editions']->value){?>
			<div id="editions-box" class="works" style="display: none;">
				<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['editions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
				<ul>
					<li>
						<img src="<?php echo $_smarty_tpl->tpl_vars['staticAboutUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['file'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
">
					</li>
					<li>
						<p class="header"><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
</p>
						<?php echo $_smarty_tpl->tpl_vars['_item']->value['content'];?>

						<?php if ($_smarty_tpl->tpl_vars['_item']->value['props']['gallery']){?>
							<?php  $_smarty_tpl->tpl_vars['_linkTxt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_linkTxt']->_loop = false;
 $_smarty_tpl->tpl_vars['_gid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_item']->value['props']['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_linkTxt']->key => $_smarty_tpl->tpl_vars['_linkTxt']->value){
$_smarty_tpl->tpl_vars['_linkTxt']->_loop = true;
 $_smarty_tpl->tpl_vars['_gid']->value = $_smarty_tpl->tpl_vars['_linkTxt']->key;
?>
								<div class="links">
									<span class="ajaxgallery" data-entry="<?php echo $_smarty_tpl->tpl_vars['_item']->value['id'];?>
" data-gid="<?php echo $_smarty_tpl->tpl_vars['_gid']->value;?>
"><?php echo str_replace($_smarty_tpl->tpl_vars['codes']->value,$_smarty_tpl->tpl_vars['plchars']->value,$_smarty_tpl->tpl_vars['_linkTxt']->value);?>
 &raquo;</span>
								</div>
							<?php } ?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['_item']->value['link_href']&&$_smarty_tpl->tpl_vars['_item']->value['link_txt']){?>
						<div class="links">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_item']->value['link_href'];?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['link_txt'];?>
 &raquo;</a>
						</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['_item']->value['title']=="Romantyczny Styl"){?>
						<div class="links">
							<a href="<?php echo $_smarty_tpl->tpl_vars['staticStockUrl']->value;?>
/docs/RS04.pdf">zobacz 4 edycję Romantycznego Stylu &raquo;</a>
						</div>
						<?php }?>
					</li>
				</ul>
				<?php } ?>
			</div>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['actions']->value){?>
			<div id="actions-box" class="works" style="display: none;">
				<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
				<ul>
					<li>
						<img src="<?php echo $_smarty_tpl->tpl_vars['staticAboutUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['file'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
">
					</li>
					<li>
						<p class="header"><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
</p>
						<?php echo $_smarty_tpl->tpl_vars['_item']->value['content'];?>

						<?php if ($_smarty_tpl->tpl_vars['_item']->value['props']['gallery']){?>
							<?php  $_smarty_tpl->tpl_vars['_linkTxt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_linkTxt']->_loop = false;
 $_smarty_tpl->tpl_vars['_gid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_item']->value['props']['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_linkTxt']->key => $_smarty_tpl->tpl_vars['_linkTxt']->value){
$_smarty_tpl->tpl_vars['_linkTxt']->_loop = true;
 $_smarty_tpl->tpl_vars['_gid']->value = $_smarty_tpl->tpl_vars['_linkTxt']->key;
?>
								<div class="links">
									<span class="ajaxgallery" data-entry="<?php echo $_smarty_tpl->tpl_vars['_item']->value['id'];?>
" data-gid="<?php echo $_smarty_tpl->tpl_vars['_gid']->value;?>
"><?php echo str_replace($_smarty_tpl->tpl_vars['codes']->value,$_smarty_tpl->tpl_vars['plchars']->value,$_smarty_tpl->tpl_vars['_linkTxt']->value);?>
 &raquo;</span>
								</div>
							<?php } ?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['_item']->value['link_href']&&$_smarty_tpl->tpl_vars['_item']->value['link_txt']){?>
						<div class="links">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_item']->value['link_href'];?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['link_txt'];?>
 &raquo;</a>
						</div>
						<?php }?>
					</li>
				</ul>
				<?php } ?>
			</div>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['architecture']->value){?>
			<div id="architecture-box" class="works" style="display: none;">
				<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['architecture']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
				<ul>
					<li>
						<img src="<?php echo $_smarty_tpl->tpl_vars['staticAboutUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['file'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
">
					</li>
					<li>
						<p class="header"><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
</p>
						<?php echo $_smarty_tpl->tpl_vars['_item']->value['content'];?>

						<?php if ($_smarty_tpl->tpl_vars['_item']->value['props']['gallery']){?>
							<?php  $_smarty_tpl->tpl_vars['_linkTxt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_linkTxt']->_loop = false;
 $_smarty_tpl->tpl_vars['_gid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_item']->value['props']['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_linkTxt']->key => $_smarty_tpl->tpl_vars['_linkTxt']->value){
$_smarty_tpl->tpl_vars['_linkTxt']->_loop = true;
 $_smarty_tpl->tpl_vars['_gid']->value = $_smarty_tpl->tpl_vars['_linkTxt']->key;
?>
								<div class="links">
									<span class="ajaxgallery" data-entry="<?php echo $_smarty_tpl->tpl_vars['_item']->value['id'];?>
" data-gid="<?php echo $_smarty_tpl->tpl_vars['_gid']->value;?>
"><?php echo str_replace($_smarty_tpl->tpl_vars['codes']->value,$_smarty_tpl->tpl_vars['plchars']->value,$_smarty_tpl->tpl_vars['_linkTxt']->value);?>
 &raquo;</span>
								</div>
							<?php } ?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['_item']->value['link_href']&&$_smarty_tpl->tpl_vars['_item']->value['link_txt']){?>
						<div class="links">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_item']->value['link_href'];?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['link_txt'];?>
 &raquo;</a>
						</div>
						<?php }?>
					</li>
				</ul>
				<?php } ?>
			</div>
			<?php }?>
		</div>
	</div>
</div><?php }} ?>