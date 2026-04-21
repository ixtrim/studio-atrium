<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 09:03:26
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/ProjectRealizations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189399923962b037de2084f3-70610671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da69ee6415e9d09d76aa61b75e4544d7eeea384e' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/ProjectRealizations.tpl',
      1 => 1502877234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189399923962b037de2084f3-70610671',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '__projectMain' => 0,
    '_item' => 0,
    '__project' => 0,
    'is_similar' => 0,
    'staticStockUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b037de241871_42062402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b037de241871_42062402')) {function content_62b037de241871_42062402($_smarty_tpl) {?><div class="box ajaxed" id="real-list" style="display: none;">
	<?php if ($_smarty_tpl->tpl_vars['__projectMain']->value){?>
		<?php if ($_smarty_tpl->tpl_vars['__projectMain']->value['attachments']['ProjectRealisation']||$_smarty_tpl->tpl_vars['__projectMain']->value['attachments']['ProjectBuildingInProgress']||$_smarty_tpl->tpl_vars['__projectMain']->value['attachments']['ProjectRealisationInterior']){?>
			<?php if ($_smarty_tpl->tpl_vars['__projectMain']->value['attachments']['ProjectRealisation']){?>
			<p>Wybudowane</p>

			<ul>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['__projectMain']->value['attachments']['ProjectRealisation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->index++;
?>
				<li>
					<a data-fancybox="real" data-caption="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['_item']->value['description']){?> - <?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'realisation','project'=>$_smarty_tpl->tpl_vars['__projectMain']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'realisation','project'=>$_smarty_tpl->tpl_vars['__projectMain']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['__projectMain']->value['name'];?>
 - realizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
"></a>
				</li>
			<?php } ?>
			</ul>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['__projectMain']->value['attachments']['ProjectBuildingInProgress']){?>
			<p>W trakcie budowy</p>
			
			<ul>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['__projectMain']->value['attachments']['ProjectBuildingInProgress']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->index++;
?>
				<li>
					<a data-fancybox="real" data-caption="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['_item']->value['description']){?> - <?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'in_progress','project'=>$_smarty_tpl->tpl_vars['__projectMain']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'in_progress','project'=>$_smarty_tpl->tpl_vars['__projectMain']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['__projectMain']->value['name'];?>
 - budowa <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
"></a>
				</li>
			<?php } ?>
			</ul>
			<?php }?>
		
			<?php if ($_smarty_tpl->tpl_vars['__projectMain']->value['attachments']['ProjectRealisationInterior']){?>
			<p>Wnętrza</p>
			
			<ul>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['__projectMain']->value['attachments']['ProjectRealisationInterior']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->index++;
?>
				<li>
					<a data-fancybox="real" data-caption="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['_item']->value['description']){?> - <?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'realisation_interior','project'=>$_smarty_tpl->tpl_vars['__projectMain']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'realisation_interior','project'=>$_smarty_tpl->tpl_vars['__projectMain']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['__projectMain']->value['name'];?>
 - wnętrze <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
"></a>
				</li>
			<?php } ?>
			</ul>
			<?php }?>
		<?php }?>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectRealisation']||$_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectBuildingInProgress']||$_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectRealisationInterior']){?>
		<?php if ($_smarty_tpl->tpl_vars['is_similar']->value){?><p>zdjęcia domu podobnego: <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['__project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['__project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['__project']->value['name'];?>
</a></p><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectRealisation']){?>
			<p>Wybudowane</p>

			<?php if ($_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectRealisation']){?>
			<ul>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectRealisation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->index++;
?>
				<li>
					<a data-fancybox="real" data-caption="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['_item']->value['description']){?> - <?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'realisation','project'=>$_smarty_tpl->tpl_vars['__project']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'realisation','project'=>$_smarty_tpl->tpl_vars['__project']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['__project']->value['name'];?>
 - realizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
"></a>
				</li>
			<?php } ?>
			</ul>
			<?php }?>
		<?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectBuildingInProgress']){?>
			<p>W trakcie budowy</p>
			
			<ul>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectBuildingInProgress']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->index++;
?>
				<li>
					<a data-fancybox="real" data-caption="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['_item']->value['description']){?> - <?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'in_progress','project'=>$_smarty_tpl->tpl_vars['__project']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'in_progress','project'=>$_smarty_tpl->tpl_vars['__project']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['__project']->value['name'];?>
 - budowa <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
"></a>
				</li>
			<?php } ?>
			</ul>
		<?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectRealisationInterior']){?>
			<p>Wnętrza</p>
			
			<ul>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['__project']->value['attachments']['ProjectRealisationInterior']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->index++;
?>
				<li>
					<a data-fancybox="real" data-caption="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['_item']->value['description']){?> - <?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'realisation_interior','project'=>$_smarty_tpl->tpl_vars['__project']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'realisation_interior','project'=>$_smarty_tpl->tpl_vars['__project']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['__project']->value['name'];?>
 - wnętrze <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
"></a>
				</li>
			<?php } ?>
			</ul>
		<?php }?>
	<?php }?>
	
	<p>Fotokonkurs</p>
	
	<div class="contest-splash">
		<img src="/img/konkurs.jpg" alt="Konkurs fotograficzny" class="resp">
	</div>
	
	<div class="contest">
		<p class="info">Wybudowałeś swój wymarzony dom wg projektu Studia Atrium? Podziel się swoją radością. Chwyć za aparat/smartfona i sfotografuj bryłę budynku z zewnątrz, dołącz także zdjęcia wnętrz - Twoje aranżacje kuchni, salonu, łazienki, sypialni na pewno zainspirują innych. Za pomocą prostego formularza prześlij do nas efekt swoich prac. Najlepsze z nich zostaną wyróżnione profesjonalną sesją fotograficzną zorganizowaną przez Studio Atrium, a właściciel domu otrzyma nagrodę w postaci ciśnieniowego ekspresu do kawy. Z Laureatami będziemy się kontaktować indywidualnie, a ich prace zostaną zaprezentowane na łamach naszej strony internetowej oraz wydawnictwa Domy w Tradycji.</p>
		
		<div>
			<p class="express">Wygraj ciśnieniowy <span>ekspres do kawy</span></p>
			<p>Delektuj się kawą zrobioną w markowym produkcie</p>
			<div class="link-box">
				<p id="long-contest-trigger"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'contest','action'=>'form'),$_smarty_tpl);?>
" class="bg">Wypełnij formularz i prześlij do nas zdjęcia</a></p>
				<p id="short-contest-trigger"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'contest','action'=>'form'),$_smarty_tpl);?>
" class="bg">Wypełnij formularz</a></p>
				<a href="<?php echo $_smarty_tpl->tpl_vars['staticStockUrl']->value;?>
/docs/regulamin.pdf" class="under" target="_new">regulamin</a>
			</div>
		</div>
	</div>
</div><?php }} ?>