<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:35:06
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Realizations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15176105862b0313a13ce14-00916837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea98ade0440b26ea342114c2a4093cab30fc5d19' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Realizations.tpl',
      1 => 1634284206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15176105862b0313a13ce14-00916837',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'action' => 0,
    'total' => 0,
    'pages' => 0,
    'url' => 0,
    'realisations' => 0,
    'projectPath' => 0,
    '_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0313a174cf7_43549539',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0313a174cf7_43549539')) {function content_62b0313a174cf7_43549539($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
?><div class="list-header realisation<?php if ($_smarty_tpl->tpl_vars['page']->value==1){?> activated<?php }?>">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Realizacje<?php if ($_smarty_tpl->tpl_vars['action']->value=='Realizations'){?> projektów<?php }elseif($_smarty_tpl->tpl_vars['action']->value=='RealizationsInterior'){?> wnętrz<?php }elseif($_smarty_tpl->tpl_vars['action']->value=='RealizationsBuilding'){?> w budowie<?php }?></span></h1>
				<p>Poniżej znajdują się zdjęcia<?php if ($_smarty_tpl->tpl_vars['action']->value=='Realizations'){?> gotowych<?php }?> realizacji <?php if ($_smarty_tpl->tpl_vars['action']->value=='RealizationsInterior'){?>wnętrz <?php }?>projektów Studia Atrium<?php if ($_smarty_tpl->tpl_vars['action']->value=='RealizationsBuilding'){?> w trakcie budowy<?php }?>. Jeśli wybudowałeś<?php if ($_smarty_tpl->tpl_vars['action']->value=='RealizationsBuilding'){?> lub budujesz<?php }?> dom wg naszej dokumentacji i chciałbyś się nim pochwalić, zapraszamy do wzięcia udziału w trwającym nieustannie FOTOKONKURSIE. <a href="/konkurs/fotograficzny.html">Zobacz szczegóły</a></p>
			</div>
		</div>
	</div>
</div>
<div class="control-box">
	<ul>
		<li class="paths"><a href="/">projekty domów</a> &raquo; <a href="/projekty-domow/" class="all">wszystkie</a> <span>znalezionych zdjęć realizacji: <strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></span></li>
		<li><strong>zobacz: </strong>		
		<?php if ($_smarty_tpl->tpl_vars['action']->value!='Realizations'){?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'realizations'),$_smarty_tpl);?>
">realizacje projektów &raquo;</a> <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['action']->value!='RealizationsInterior'){?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'realizations_interior'),$_smarty_tpl);?>
">realizacje wnętrz &raquo;</a> <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['action']->value!='RealizationsBuilding'){?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'realizations_building'),$_smarty_tpl);?>
">domy w budowie &raquo;</a><?php }?></li>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
		<li>
			<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0);?>

		</li>
		<?php }?>
	</ul>
</div>

<div class="container" id="realization-list">
	<section>
		<div class="grid">
		<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['realisations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
		<figure class="effect-sadie">
			<?php if ($_smarty_tpl->tpl_vars['action']->value=='Realizations'){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['_item']->value['filename'],"realizacja-","realizacja-317-");?>
" alt="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 - realizacja" width="475" height="317">
			<?php }elseif($_smarty_tpl->tpl_vars['action']->value=='RealizationsBuilding'){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['_item']->value['filename'],"budowa-","budowa-317-");?>
" alt="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 w budowie" width="475" height="317">
			<?php }elseif($_smarty_tpl->tpl_vars['action']->value=='RealizationsInterior'){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['_item']->value['filename'],"budowa-","budowa-317-");?>
" alt="Realizacja wnętrza projektu domu <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
" width="475" height="317">
			<?php }?>			

			<?php if ($_smarty_tpl->tpl_vars['_item']->value['discount']){?><span class="label discount">rabat <?php echo $_smarty_tpl->tpl_vars['_item']->value['discount'];?>
</span><?php }?>
			<span class="close-sadie"></span>

			<figcaption>
				<h6><?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
</h6>
				<div>
					<p>pow. użytkowa: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_item']->value['object']['params_general']);?>
 <span>m<sup>2</sup></p>
					<p>działka minimalna: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['_item']->value['object']['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['_item']->value['object']['params_general']);?>
 m</p>
					<p class="desc"><?php if ($_smarty_tpl->tpl_vars['_item']->value['description']){?><?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['short_description'];?>
<?php }?></p>
				</div>
				<span class="framed"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['object']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['object']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><span>Zobacz projekt</span></a></span>
				<a href="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['filename'];?>
" data-fancybox="gallery" data-caption="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 - realizacja<?php if ($_smarty_tpl->tpl_vars['action']->value=='RealizationsBuilding'){?> w budowie<?php }?><?php if ($_smarty_tpl->tpl_vars['_item']->value['description']){?>. <?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
<?php }?>"><span class="mobile-sadie"><?php if ($_smarty_tpl->tpl_vars['action']->value=='RealizationsBuilding'){?>projekt domu<?php }else{ ?>realizacja <?php if ($_smarty_tpl->tpl_vars['action']->value=='RealizationsInterior'){?>wnętrza <?php }?>projektu domu<?php }?> <?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true)){?>piętrowego<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true)){?>z poddaszem<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isGroundFloor'][0][0]->mIsGroundFloor($_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true)){?>parterowego<?php }?><?php if ($_smarty_tpl->tpl_vars['action']->value=='RealizationsBuilding'){?> w budowie<?php }?> <strong><?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_item']->value['object']['params_general']);?>
 m<sup>2</sup></span></strong></span></a>
			</figcaption>
		</figure>
		<?php } ?>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1&&$_smarty_tpl->tpl_vars['page']->value!=$_smarty_tpl->tpl_vars['pages']->value){?>
			<figure class="effect-sadie nextPage">
				<img src="/img/next.png" alt="następna strona">
				<figcaption>
					<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
">następna strona</a>
				</figcaption>	
			</figure>
		<?php }?>
		</div>
	</section>
</div>

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