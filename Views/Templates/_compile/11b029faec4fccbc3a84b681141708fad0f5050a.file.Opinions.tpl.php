<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 16:17:55
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Opinions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181467223662b09db39e1772-59095272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11b029faec4fccbc3a84b681141708fad0f5050a' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Opinions.tpl',
      1 => 1579696824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181467223662b09db39e1772-59095272',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
    'pages' => 0,
    'page' => 0,
    'url' => 0,
    'opinions' => 0,
    '_opinion' => 0,
    'projects' => 0,
    'altTitle' => 0,
    'compareIds' => 0,
    'favouriteIds' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b09db3a35ce2_47347011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b09db3a35ce2_47347011')) {function content_62b09db3a35ce2_47347011($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><div class="list-header realisation activated">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Opinie Inwestorów o projektach domów z naszej pracowni</span></h1>
				<p>Poniżej znajdują się wybrane opinie naszych klientów, którzy wybudowali bądź są w trakcie budowy swoich domów według projektów stworzonych w naszej pracowni i zechcieli się z nami, a za naszym pośrednictwem również z innymi, podzielić swoimi wrażeniami odnośnie wybranych projektów, nierzadko dzieląc się również praktycznymi poradami związanymi samą budową lub z ewentualnymi zmianami, które poczynili w projektach. Zapraszamy!</p>
			</div>
		</div>
	</div>
</div>
<div class="control-box">
	<ul>
		<li class="paths"><a href="/">projekty domów</a> &raquo; <a href="/projekty-domow/" class="all">wszystkie</a> &raquo; <span>znalezionych opinii: <strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></span></li>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
		<li>
			<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0);?>

		</li>
		<?php }?>
	</ul>
</div>
<section>
	<div class="box">
		<ul class="detail opinions fav-wrapper">
		<?php  $_smarty_tpl->tpl_vars['_opinion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_opinion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['opinions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_opinion']->key => $_smarty_tpl->tpl_vars['_opinion']->value){
$_smarty_tpl->tpl_vars['_opinion']->_loop = true;
?>
		<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isGroundFloor'][0][0]->mIsGroundFloor($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['params_general'],true)){?>
			<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu parterowego", null, 0);?>
		<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['params_general'],true)){?>
			<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu z poddaszem", null, 0);?>
		<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['params_general'],true)){?>
			<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu piętrowego", null, 0);?>
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu", null, 0);?>
		<?php }?>
			<li>
				<ul>
					<li>
						<div>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['id'],'link_title'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
">
								<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']],'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['altTitle']->value;?>
 <?php echo strtoupper($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['name']);?>
">
							</a>
							<span id="compare-<?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['id'],$_smarty_tpl->tpl_vars['compareIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['id'];?>
"></span>
							<span id="fav-<?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['id'];?>
"></span>
							<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']])){?><span class="label">Nowość</span><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['discount']){?><span class="label discount<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']])){?> left<?php }?>">Rabat <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['discount'];?>
 zł</span><?php }?>
						</div>
					</li>
					<li class="data">
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['id'],'link_title'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_opinion']->value['project_id']]['name'];?>
</a></h6>
						
						<?php echo $_smarty_tpl->tpl_vars['_opinion']->value['content'];?>

						
						<ul>
							<li><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_opinion']->value['publish_date'],"%d %B %Y");?>
 - <span><?php echo $_smarty_tpl->tpl_vars['_opinion']->value['author'];?>
</span></li>
						</ul>
					</li>
				</ul>
			</li>
		<?php } ?>
		</ul>
	</div>
</section>

<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
<div class="wrapper">
	<div class="box">
		<div class="control-box">
			<ul>
				<li>
					<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0);?>

				</li>
			</ul>
		</div>
	</div>
</div>
<?php }?><?php }} ?>