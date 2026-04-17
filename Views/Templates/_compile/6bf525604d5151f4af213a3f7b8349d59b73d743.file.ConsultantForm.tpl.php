<?php /* Smarty version Smarty-3.1.11, created on 2024-05-06 12:34:49
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Ajax/ConsultantForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200383594262b04d48bbbd29-52973941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bf525604d5151f4af213a3f7b8349d59b73d743' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Ajax/ConsultantForm.tpl',
      1 => 1714998883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200383594262b04d48bbbd29-52973941',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b04d48be57c5_73709653',
  'variables' => 
  array (
    'project' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b04d48be57c5_73709653')) {function content_62b04d48be57c5_73709653($_smarty_tpl) {?><div id="consultant-form-box" class="blue-overlay help">	
	<div id="help-wrapper">
		<h4><img src="/img/consultant.png" alt="Studio Atrium" width="60" height="60">Konsultant</h4>
		
		<p class="nocaps">
		<?php if ($_smarty_tpl->tpl_vars['project']->value){?>
			Masz dodatkowe pytania dotyczące projektu <strong><?php if ($_smarty_tpl->tpl_vars['project']->value['name']){?><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
<?php }?></strong>? Napisz do nas - my odpowiemy.
		<?php }else{ ?>
			Nie znalazłeś projektu, jakiego szukałeś? Opisz go nam! Postaramy się go znaleźć dla Ciebie. Masz dodatkowe pytania? Wystarczy je napisać - my odpowiemy.
		<?php }?>
		</p>
		
			<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'contact','action'=>'send'),$_smarty_tpl);?>
" id="consultant-form">
				<input type="hidden" id="cons_project_id" name="project_id" value="<?php if ($_smarty_tpl->tpl_vars['project']->value){?><?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
<?php }else{ ?>0<?php }?>">
				<input name="module" type="hidden" value="contact">
				<input name="action" type="hidden" value="send">

				<p>
					<label for="cons_name" class="black">Twoje imię</label>
					<input type="text" name="name" id="cons_name" class="long">
				</p>

				<p>
					<label for="cons_email" class="black">Twój adres e-mail</label>
					<input type="text" name="email" id="cons_email" class="long">
				</p>
				
				<p>
					<label for="cons_query" class="black">Twoje zapytanie</label>
					<textarea name="query" id="cons_query" cols="1" rows="1"></textarea>
				</p>
				
				<p class="accept">
                    <input type="checkbox" name="accept" id="consultant-accept" value="on"> <label for="consultant-accept">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem. <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_consultant_regulations'),$_smarty_tpl);?>
">Szczegóły</span>
                </p>
				
				<p class="last">
					<span><img src="/img/waiter-white.gif" alt="Wysyłanie formularza" id="cons-loader" style="display: none;"><input id="cons_button" type="submit" value="wyślij" class="baton"></span>
				</p>
				<p class="nocaps" id="contact-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		
		<p class="nocaps smallmargin">Możesz także skorzystać z infolinii. Konsultant pomoże Ci wybrać projekt i załatwi wszelkie formalności z zamówieniem!</p>
		<p class="nocaps">Numer naszego konsultanta <a href="tel:+48338229496" rel="nofollow"><strong>33 822 94 96</strong></a></p>
	</div>
	
	<button type="button" id="help-overlay-close" class="blue-overlay-close">Zamknij</button>
</div><?php }} ?>