<?php /* Smarty version Smarty-3.1.11, created on 2022-06-26 13:39:08
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ProjectExtend/PromoInfoNotify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161918536362b8617ca1ebf6-60854775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '397373c3a3c71d9eaa55cbdb33ed9fbf11de0e74' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ProjectExtend/PromoInfoNotify.tpl',
      1 => 1569921026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161918536362b8617ca1ebf6-60854775',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b8617ca40850_89807562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b8617ca40850_89807562')) {function content_62b8617ca40850_89807562($_smarty_tpl) {?><div class="form-wrapper" id="project-promo-notify-box">
	<p class="nocaps">Zostaw adres e-mail, a powiadomimy Cię o dodatkowych promocjach związanych z tym projektem.</p>
	
	<form class="validable" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project_extend','action'=>'promo_notify'),$_smarty_tpl);?>
" id="promo-notify-form" data-call="PromoNotify.onSend">
		<input name="module" type="hidden" value="project_extend">
		<input name="action" type="hidden" value="promo_notify">
		<input name="pid" type="hidden" id="promo-notify-pid">
		
		<p>
			<label for="promo-notify-email" class="black">Twój adres e-mail</label>
			<input type="text" name="email" id="promo-notify-email" class="long">
		</p>

		<p class="accept">
            <input type="checkbox" name="newsletter" id="newsletter-accept" value="on"> <label for="newsletter-accept">Chcę także</label> otrzymywać newsletter Studio Atrium.
        </p>
            
        <p class="accept">
			<input type="checkbox" name="accept" id="ppn-accept" value="on"> <label for="ppn-accept">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymywania informacji o promocjach i ofercie projektowej. <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_mailing_regulations'),$_smarty_tpl);?>
" data-scroll="ajax-regulations">Szczegóły</span>
		</p>
            
        <div class="info-box">
			<p class="nocaps info" id="promo-notify-box">&nbsp;</p>
		</div>
			
		<div class="submit-box">
			<img id="promo-notify-waiter" src="/img/waiter-white.gif" alt="Wysyłanie formularza" style="display: none;">
			<input type="submit" id="promo-notify-button" class="baton" value="wyślij">
		</div>
	</form>
</div><?php }} ?>