<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:30:34
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Include/HowToBuy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9126484762b0302a378cb6-64692001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '417b67a29ccaa929f4c84924428bb29d2219d5cd' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Include/HowToBuy.tpl',
      1 => 1585137547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9126484762b0302a378cb6-64692001',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0302a37a4b0_56831283',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0302a37a4b0_56831283')) {function content_62b0302a37a4b0_56831283($_smarty_tpl) {?><section class="customer">
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
			<p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'varia','action'=>'project_helper'),$_smarty_tpl);?>
" class="button">Znajdziemy dla Ciebie projekt domu</a></p>
		</div>
	</div>
</section><?php }} ?>