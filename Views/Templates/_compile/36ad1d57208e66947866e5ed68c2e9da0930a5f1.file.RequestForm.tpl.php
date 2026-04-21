<?php /* Smarty version Smarty-3.1.11, created on 2026-01-23 13:48:00
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/RequestForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176001833362b05afb7cb139-04143961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36ad1d57208e66947866e5ed68c2e9da0930a5f1' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/RequestForm.tpl',
      1 => 1769176072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176001833362b05afb7cb139-04143961',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b05afb7e3bd0_55411915',
  'variables' => 
  array (
    'request' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b05afb7e3bd0_55411915')) {function content_62b05afb7e3bd0_55411915($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><div class="form-wrapper" id="file-request-form-box">
	<p class="nocaps">
		<?php if ($_smarty_tpl->tpl_vars['request']->value['type']=='sketch'){?>
			<?php if ($_smarty_tpl->tpl_vars['request']->value['order']==1){?>Zamów<?php }else{ ?>Pobierz<?php }?> rysunki szczegółowe do projektu
		<?php }elseif($_smarty_tpl->tpl_vars['request']->value['type']=='materials'){?>
			<?php if ($_smarty_tpl->tpl_vars['request']->value['order']==1){?>Zamów<?php }else{ ?>Pobierz<?php }?> zestawienie materiałów do projektu
		<?php }elseif($_smarty_tpl->tpl_vars['request']->value['type']=='woodwork'){?>
			<?php if ($_smarty_tpl->tpl_vars['request']->value['order']==1){?>Zamów<?php }else{ ?>Pobierz<?php }?> zestawienie stolarki
		<?php }elseif($_smarty_tpl->tpl_vars['request']->value['type']=='cost_extract'){?>
			Pobierz wyciąg z kosztorysu inwestorskiego
		<?php }elseif($_smarty_tpl->tpl_vars['request']->value['type']=='estimate'){?>
			Pobierz szacunkowy kosztorys budowlany
		<?php }?>	
	</p>
	<p class="notice">Uwaga! 
		<?php if ($_smarty_tpl->tpl_vars['request']->value['type']=='sketch'||$_smarty_tpl->tpl_vars['request']->value['type']=='woodwork'){?>
			Rysunki objęte są prawami autorskimi Studia Atrium. Służą jedynie celom poglądowym, zabrania się je powielać i wykorzystywać w celach projektowych.
		<?php }elseif($_smarty_tpl->tpl_vars['request']->value['type']=='materials'){?>
			Zestawienie materiałów objęte jest prawami autorskimi Studia Atrium. Służy jedynie celom poglądowym, zabrania się go powielać i wykorzystywać w celach projektowych.
		<?php }elseif($_smarty_tpl->tpl_vars['request']->value['type']=='estimate'){?>
			Wartość kosztowa powstaje poprzez przemnożenie powierzchni budynku przez wskaźnikową cenę metra kwadratowego w oparciu o średnie ceny krajowe przy założeniu standardu wykończenia na poziomie średnim. Wyliczenia te nie biorą pod uwagę specyfiki konkretnego projektu, jak stopień skomplikowania bryły budynku, typ dachu, rodzaj zastosowanej stolarki okiennej czy materiałów wykończeniowych, a jedynie powierzchnię budynku. Kosztorys objęty jest prawami autorskimi Studia Atrium, zabrania si?? go powielać.
		<?php }elseif($_smarty_tpl->tpl_vars['request']->value['type']=='cost_extract'){?>
			Przedstawione wartości pochodzą z kosztorysu inwestorskiego sporządzonego w okresie opisanym przy przedstawionych na stronie projektu kwotach, według średnich stawek Sekocenbudu. Kosztorys objęty jest prawami autorskimi Studia Atrium, zabrania się go powielać.
		<?php }elseif($_smarty_tpl->tpl_vars['request']->value['type']=='parcel_dwg'||$_smarty_tpl->tpl_vars['request']->value['type']=='parcel_pdf'){?>
			Obrys budynku wykonany jest w skali 1:500 by w łatwy sposób sprawdzić usytuowanie domu na mapie do celów projektowych.
		<?php }?>
		<br><br><strong style="font-size: 2rem;">Materiały zostaną wysłane e-mailem w tym samym, najpóźniej w kolejnym dniu roboczym. W razie braku wiadomości, prosimy poszukać jej w folderze SPAM bądź innych folderach segregujących pocztę.</strong>
	</p>
	<?php if ($_smarty_tpl->tpl_vars['request']->value['type']=='estimate'){?>
	<form class="validable" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'add_genfile_request'),$_smarty_tpl);?>
" id="file-request-form" data-call="ProjectRequest.onSend">
		<input name="action" type="hidden" value="add_genfile_request">
		<input name="token" type="hidden" id="download_token_id" value="<?php echo smarty_modifier_date_format(time(),"%H%M%S");?>
">
	<?php }else{ ?>
	<form class="validable" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'add_file_request'),$_smarty_tpl);?>
" id="file-request-form" data-call="ProjectRequest.onSend">
		<input name="action" type="hidden" value="add_file_request">
	<?php }?>
		<input name="module" type="hidden" value="project">
		<input name="file_type" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['type'];?>
" id="project_file_type">
		<input name="order" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['order'];?>
">
		<input type="hidden" id="fr-pid" name="project_id" value="0">

		<p>
			<label for="fr-phone" class="black">Twój nr telefonu</label>
			<input type="text" name="phone" id="fr-phone" class="long" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['props']['phone'];?>
">
		</p>
		
		<div class="group-wrapper" style="display: none;">
			<span class="long">Kiedy chcesz kupić projekt?</span>
			<div class="jui-select-box white" id="fr-time-box">
				<select name="time" id="fr-time">
					<option value="">wybierz opcję</option>
					<option value="1" selected>do miesiąca</option>
					<option value="2">do 6 miesięcy</option>
					<option value="3">do roku</option>
					<option value="4">powyżej roku</option>
				</select>
			</div>
		</div>
		
		<p>
			<label for="fr-comment" class="black">Uwagi</label>
			<textarea name="comment" id="fr-comment" class="small"></textarea>
		</p>
		
		<p class="accept">
			<input type="checkbox" name="accept" id="fr-accept" value="on"> <label for="fr-accept">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymywania materiałów do projektu oraz informacji o promocjach i ofercie projektowej. <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_files_regulations'),$_smarty_tpl);?>
" data-scroll="ajax-regulations">Szczegóły</span>
		</p>
		
		<div class="info-box">
			<p class="nocaps info" id="fr-fail-box" style="font-weight: bold;">&nbsp;</p>
		</div>
		
		<div class="submit-box">
			<img id="fr-waiter" src="/img/waiter-white.gif" alt="Wysyłanie formularza" style="display: none;">
			<input type="submit" value="<?php if ($_smarty_tpl->tpl_vars['request']->value['order']==1){?>zamów<?php }else{ ?>pobierz<?php }?>" class="baton" id="request-file-trigger">
		</div>
	</form>
</div>
<?php }} ?>