<?php /* Smarty version Smarty-3.1.11, created on 2023-04-07 11:44:41
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/Agent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26191136962b046b77fad69-34115458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7ca9aa4357e1a4144eba479d3a16d0da88efb00' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/Agent.tpl',
      1 => 1680867878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26191136962b046b77fad69-34115458',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b046b7847457_11702126',
  'variables' => 
  array (
    'module_decamelized' => 0,
    'action_decamelized' => 0,
    'request' => 0,
    'pages' => 0,
    'page' => 0,
    'baseUrl' => 0,
    'agentList' => 0,
    '_agent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b046b7847457_11702126')) {function content_62b046b7847457_11702126($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Nasi przedstawiciele</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box agent">
		<div id="map">
			<img src="/img/map.png" usemap="#dMap" alt="Mapa Polski" />
			<map name="dMap" id="dMap">
				<area shape="poly" coords="94,18,98,70,140,60,170,66,180,31,145,2" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>10),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="20,45,90,20,90,84,20,120,15,76" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>16),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="180,27,169,65,190,89,284,59,282,21" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>15),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="250,73,288,61,285,25,300,31,330,106,294,134,263,105" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>9),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="187,94,246,76,270,109,293,140,260,155,254,203,211,192,202,143,173,134" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>7),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="257,204,263,157,299,138,312,141,314,169,335,218,311,242,278,234" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>3),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="255,209,271,235,309,248,294,298,236,284,232,242,249,226" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>11),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="208,194,200,208,212,237,214,246,260,222" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>13),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="203,234,239,252,243,285,200,303,182,277,188,246" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>6),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="166,137,196,146,205,185,192,213,135,197,148,161" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>5),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="106,72,126,65,168,73,192,95,160,138,110,111" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>2),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="65,103,99,75,106,115,154,124,152,192,87,158" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>14),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="10,126,63,103,69,169,22,190" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>4),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="19,197,75,169,117,198,84,256" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>1),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="97,237,120,200,150,203,142,246,122,257" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>8),$_smarty_tpl);?>
" alt="">
				<area shape="poly" coords="154,204,192,225,176,234,166,287,130,261" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>$_smarty_tpl->tpl_vars['module_decamelized']->value,'action'=>$_smarty_tpl->tpl_vars['action_decamelized']->value,'region'=>12),$_smarty_tpl);?>
" alt="">
			</map>
		</div>
		
		<p>
			Poniżej rezentujemy listę wybranych biur sprzedających i/lub adaptujących nasze projekty do warunków miejscowych na działce Inwestora. 
			Wybierz interesujące Cię województwo z mapy. Lista ułożona jest alfabetycznie wg nazw miejscowości.
		</p>
		
		
		<div class="page-nav agent">
			<?php if ($_smarty_tpl->tpl_vars['request']->value['city']){?>
				<p class="region">Nasi przedstawiciele: szukana miejscowość <span><?php echo $_smarty_tpl->tpl_vars['request']->value['city'];?>
</span></p>
			<?php }else{ ?>
				<p class="region">Nasi przedstawiciele: województwo <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['regionName'][0][0]->fRegionName(array('regionId'=>$_smarty_tpl->tpl_vars['request']->value['region']),$_smarty_tpl);?>
</span></p>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
				<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['baseUrl']->value), 0);?>

			<?php }?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['agentList']->value){?>
		<ul class="agents">
			<?php  $_smarty_tpl->tpl_vars['_agent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_agent']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['agentList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_agent']->key => $_smarty_tpl->tpl_vars['_agent']->value){
$_smarty_tpl->tpl_vars['_agent']->_loop = true;
?>
				<li>
					<div>
						<p class="title">
							<?php if ($_smarty_tpl->tpl_vars['_agent']->value['authorize']=='authorized'){?>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'varia','action'=>'agent_detail','id'=>$_smarty_tpl->tpl_vars['_agent']->value['id'],'name'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['pl'][0][0]->mPreparePolish(preg_replace('!<[^>]*?>!', ' ', smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['_agent']->value['name'],"/","-"),"<p>",''),"</p>",'')))),$_smarty_tpl);?>
"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['_agent']->value['name'],"<p>",''),"</p>",'');?>
</a>
							<?php }else{ ?>
								<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['_agent']->value['name'],"<p>",''),"</p>",'');?>

							<?php }?>	
						</p>	
						
						<p class="ico address"><?php echo $_smarty_tpl->tpl_vars['_agent']->value['address'];?>
</p>
						<p><?php echo $_smarty_tpl->tpl_vars['_agent']->value['city'];?>
</p>
						<?php if ($_smarty_tpl->tpl_vars['_agent']->value['phone']!=''||$_smarty_tpl->tpl_vars['_agent']->value['cell_phone']!=''){?>
							<p class="ico phone">
								<?php if ($_smarty_tpl->tpl_vars['_agent']->value['phone']!=''&&$_smarty_tpl->tpl_vars['_agent']->value['cell_phone']!=''){?>
								tel.: <a href="tel:+48<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['_agent']->value['phone'],"(0",''),")",'')," ",''),"-",''),"(",'');?>
"><?php echo $_smarty_tpl->tpl_vars['_agent']->value['phone'];?>
</a></p>
								<p>tel. kom.: <a href="tel:+48<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['_agent']->value['cell_phone'],"(0",''),")",'')," ",''),"-",''),"(",'');?>
"><?php echo $_smarty_tpl->tpl_vars['_agent']->value['cell_phone'];?>
</a>
								<?php }elseif($_smarty_tpl->tpl_vars['_agent']->value['phone']!=''){?>
									tel.: <a href="tel:+48<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['_agent']->value['phone'],"(0",''),")",'')," ",''),"-",''),"(",'');?>
"><?php echo $_smarty_tpl->tpl_vars['_agent']->value['phone'];?>
</a>
								<?php }elseif($_smarty_tpl->tpl_vars['_agent']->value['cell_phone']!=''){?>
									tel. kom.: <a href="tel:+48<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['_agent']->value['cell_phone'],"(0",''),")",'')," ",''),"-",''),"(",'');?>
"><?php echo $_smarty_tpl->tpl_vars['_agent']->value['cell_phone'];?>
</a>
								<?php }?>
							</p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['_agent']->value['email']!=''){?>
							<p class="ico email"><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['_agent']->value['email'];?>
" class="blue"><?php echo $_smarty_tpl->tpl_vars['_agent']->value['email'];?>
</a></p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['_agent']->value['www']!=''){?>
							<p class="ico www"><a href="<?php echo $_smarty_tpl->tpl_vars['_agent']->value['www'];?>
" target="_blank" rel="nofollow" class="blue"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['_agent']->value['www'],"https://",''),"http://",'');?>
</a></p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['_agent']->value['open_hour']){?><p class="ico hour"><?php echo $_smarty_tpl->tpl_vars['_agent']->value['open_hour'];?>
</p><?php }?>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['_agent']->value['services']){?><div class="info"><p class="info ico"><strong>ZAKRES USŁUG</strong><span><?php echo smarty_modifier_replace(smarty_modifier_replace(nl2br($_smarty_tpl->tpl_vars['_agent']->value['services']),"</p>","<br/>"),"<p>",'');?>
</span></p></div><?php }?>
				</li>
			<?php } ?>
		</ul>
		<?php }else{ ?>
			<ul class="agents"><li><p class="ico info">Nie znaleźliśmy żadnego przedstawiciela w szukanej miejscowości.<br>Spróbuj poszukać najbliższego w Twoim województwie, bądź <a href="javascript:" class="consultant">skontaktuj się z nami</a> w sprawie projektów.</p></li></ul>
		<?php }?>
		<div class="page-nav">
			<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
				<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['baseUrl']->value), 0);?>

			<?php }?>
		</div>
	</div>
</div><?php }} ?>