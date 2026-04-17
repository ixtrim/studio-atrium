<?php /* Smarty version Smarty-3.1.11, created on 2022-06-23 02:00:28
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/AgentDetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155351103462b3c93c361c43-58842594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '997ffb9666d00d75a22a59b1ba4257aa6511f3d7' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/AgentDetail.tpl',
      1 => 1590404485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155351103462b3c93c361c43-58842594',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'agent' => 0,
    'stockPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b3c93c3b54c4_55828215',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b3c93c3b54c4_55828215')) {function content_62b3c93c3b54c4_55828215($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'varia','action'=>'agent'),$_smarty_tpl);?>
">Nasi przedstawiciele</a></h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box agent details">
		<p class="back"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'varia','action'=>'agent'),$_smarty_tpl);?>
">powrót do listy &raquo;</a></p>
		<?php if ($_smarty_tpl->tpl_vars['agent']->value['attachments']['AgentLogo']){?><p class="logo"><img src="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['agent']->value['attachments']['AgentLogo'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['agent']->value['attachments']['AgentLogo'][0]['filename'];?>
" alt="Logo"></p><?php }?>
		<h2><?php echo $_smarty_tpl->tpl_vars['agent']->value['name'];?>
</h2>
		<ul class="agents">
			<li>
				<div>
					<p class="ico address"><?php echo $_smarty_tpl->tpl_vars['agent']->value['address'];?>
</p>
					<p><?php echo $_smarty_tpl->tpl_vars['agent']->value['city'];?>
</p>
					<?php if ($_smarty_tpl->tpl_vars['agent']->value['phone']!=''||$_smarty_tpl->tpl_vars['agent']->value['cell_phone']!=''){?>
						<p class="ico phone">
							<?php if ($_smarty_tpl->tpl_vars['agent']->value['phone']!=''&&$_smarty_tpl->tpl_vars['agent']->value['cell_phone']!=''){?>
							tel.: <a href="tel:+48<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['agent']->value['phone'],"(0",''),")",'')," ",''),"-",''),"(",'');?>
"><?php echo $_smarty_tpl->tpl_vars['agent']->value['phone'];?>
</a></p>
							<p>tel. kom.: <a href="tel:+48<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['agent']->value['cell_phone'],"(0",''),")",'')," ",''),"-",''),"(",'');?>
"><?php echo $_smarty_tpl->tpl_vars['agent']->value['cell_phone'];?>
</a>
							<?php }elseif($_smarty_tpl->tpl_vars['agent']->value['phone']!=''){?>
								tel.: <a href="tel:+48<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['agent']->value['phone'],"(0",''),")",'')," ",''),"-",''),"(",'');?>
"><?php echo $_smarty_tpl->tpl_vars['agent']->value['phone'];?>
</a>
							<?php }elseif($_smarty_tpl->tpl_vars['agent']->value['cell_phone']!=''){?>
								tel. kom.: <a href="tel:+48<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['agent']->value['cell_phone'],"(0",''),")",'')," ",''),"-",''),"(",'');?>
"><?php echo $_smarty_tpl->tpl_vars['agent']->value['cell_phone'];?>
</a>
							<?php }?>
						</p>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['agent']->value['email']!=''){?>
						<p class="ico email"><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['agent']->value['email'];?>
" class="blue"><?php echo $_smarty_tpl->tpl_vars['agent']->value['email'];?>
</a></p>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['agent']->value['www']!=''){?>
						<p class="ico www"><a href="<?php echo $_smarty_tpl->tpl_vars['agent']->value['www'];?>
" target="_blank" rel="nofollow" class="blue"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['agent']->value['www'],"https://",''),"http://",'');?>
</a></p>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['agent']->value['open_hour']){?><p class="ico hour"><?php echo $_smarty_tpl->tpl_vars['agent']->value['open_hour'];?>
</p><?php }?>
				</div>
				
				<?php if ($_smarty_tpl->tpl_vars['agent']->value['services']){?>
					<div class="info">
							<p class="info ico"><strong>ZAKRES USŁUG</strong><span><?php echo smarty_modifier_replace(smarty_modifier_replace(nl2br($_smarty_tpl->tpl_vars['agent']->value['services']),"</p>","<br/>"),"<p>",'');?>
</span></p>
					</div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['agent']->value['descr']){?>
					<div class="descr"><p class="info ico justify"><strong>INFORMACJE</strong><span><?php echo smarty_modifier_replace(smarty_modifier_replace(nl2br($_smarty_tpl->tpl_vars['agent']->value['descr']),"</p>","<br/>"),"<p>",'');?>
</span></p></div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['agent']->value['map']){?>
					<div class="map">
						<p class="address ico"><strong>ZNAJDŹ NA MAPIE</strong></p>
						<p><iframe src="<?php echo $_smarty_tpl->tpl_vars['agent']->value['map'];?>
" frameborder="0" style="border:0; width:100%; height:500px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></p>
					</div>
				<?php }?>
			</li>
		</ul>
			
	</div>
</div><?php }} ?>