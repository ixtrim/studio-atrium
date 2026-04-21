<?php
/* Smarty version 4.5.6, created on 2026-05-03 21:44:07
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/HowToBuy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69f7a587aed7e4_07423184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b94701a610255ae9446d9eac882c517b4ca426c' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/HowToBuy.tpl',
      1 => 1776175186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f7a587aed7e4_07423184 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="customer">
	<div class="box">
		<h3>Jak kupować?</h3>
	
		<div>
			<ul>
				<li>
					<span>1</span>
					Wybierz swój projekt lub dodatek, dodaj go do koszyka i wypełnij formularz. Pamiętaj, że należy wypełnić wszystkie wymagane pola.
				</li>
				<li>
					<span>2</span>
					Potwierdzimy telefonicznie Twoje zamówienie, a następnie projekt zostanie przygotowany do wysyłki kurierem lub odbioru osobistego.
				</li>
				<li class="last">
					<div>
						<span>3</span>
						Gdy zamówienie będzie gotowe do odbioru, zostanie dostarczone zgodnie z ustaleniami. Za zamówienie płacisz przy odbiorze, kurierowi bądź przelewem.
					</div>
				</li>
			</ul>

			<p>Masz prawo zwrócić projekt lub wymienić na inny wg zasad opisanych w zakładce <a class="blue" href="/dokumenty/Zasady-sprzedazy.html">Zasady sprzedaży</a>.</p>
			<p>Jeśli w czasie zamówienia za pomocą formularza internetowego napotkałeś jakiekolwiek trudności, <br>pamiętaj że możesz zamówić dowolny projekt telefonicznie lub za pomocą e-maila.</p>
			<p><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'varia','action'=>'project_helper'),$_smarty_tpl ) );?>
" class="button">Znajdziemy dla Ciebie projekt domu</a></p>
		</div>
	</div>
</section><?php }
}
