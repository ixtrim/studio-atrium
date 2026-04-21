<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 07:42:21
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Pdf/OneStoreyCellarEstimate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65602670362b1765d32b385-25941979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '105c8fcbcd3e3c09ea470c9dac24e8a029895898' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Pdf/OneStoreyCellarEstimate.tpl',
      1 => 1575370729,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65602670362b1765d32b385-25941979',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project' => 0,
    'cost' => 0,
    'costVat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1765d3c2cb5_45035476',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1765d3c2cb5_45035476')) {function content_62b1765d3c2cb5_45035476($_smarty_tpl) {?><style>
	table {
		border-collapse: collapse;
		border-spacing: 0;
		border: none;
		font-size: 8pt;
	}
	
	table.gap {
		font-size: 2pt;
	}
	
	table.list th,
	table.list td {
		border: 1px solid #333;
	}
	
	table tr.summary td {
		font-weight: bold;
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}
	
	table th {
		font-weight: bold;
	}
	
	table th.ele,
	table td.ele {
		width: 194px;
	}
	
	table th.apex {
		width: 200px;
	}
	
	table th.lp {
		width: 30px;
	}
	
	table td.lp {
		width: 30px;
		font-weight: bold;
	}
	
	table td.head {
		font-weight: bold;
	}
	
	table th.perc,
	table td.perc {
		width: 20px;
	}
	
	table th.val,
	table td.val {
		width: 80px;
	}
</style>

<table cellpadding="3" cellspacing="0">
	<tr><td class="head" style="text-align: center;">Kosztorys budowlany wskaźnikowy dla projektu Studio Atrium <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</td></tr>
	<tr><td>System budowy: gospodarczy. Standard wykończenia: średni</td></tr>

	<tr><td>Wartość budynku bez VAT (PLN): <?php echo number_format($_smarty_tpl->tpl_vars['cost']->value,2,',',' ');?>
. Wartość budynku z 8% VAT (PLN): <?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value,2,',',' ');?>
</td></tr>
	<tr><td>&nbsp;</td></tr>
</table>

<table class="list" cellpadding="3" cellspacing="0">
	<thead>
		<tr>
			<th class="lp" rowspan="3">L.p.</th>
			<th style="text-align: center;" rowspan="3" class="ele">Elementy</th>
			<th style="text-align: center;" rowspan="3">% udział w kosztach</th>
			<th style="text-align: center;" rowspan="3">Wartość (PLN) kosztorysowa bez VAT</th>
			<th style="text-align: center;" rowspan="3">Wartość (PLN) kosztorysowa z 8% VAT</th>
			<th class="apex" style="text-align: center;" colspan="4">Elementy</th>
		</tr>
		<tr>
			<th colspan="2" style="text-align: center;">wykonane</th>
			<th colspan="2" style="text-align: center;">do wykonania</th>
		</tr>
		<tr>
			<th class="perc" style="text-align: center;">%</th>
			<th class="val" style="text-align: center;">Wartość (PLN)</th>
			<th class="perc" style="text-align: center;">%</th>
			<th class="val" style="text-align: center;">Wartość (PLN)</th>
		</tr>
	</thead>	
	<tbody>
		<tr class="header">
			<td class="lp">1.</td>
			<td colspan="8" class="head">Stan zerowy</td>
		</tr>
		<tr>
			<td>1.1</td>
			<td class="ele">Roboty ziemne</td>
			<td>2.75</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(2.75/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(2.75/100),2,',',' ');?>
</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
		</tr>
		<tr>
			<td>1.2</td>
			<td>Fundamenty</td>
			<td>2.89</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(2.89/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(2.89/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>1.3</td>
			<td>Ściany piwnic</td>
			<td>4.86</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(4.86/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(4.86/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>1.4</td>
			<td>Izolacje</td>
			<td>3.20</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(3.20/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(3.20/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>1.5</td>
			<td>Strop nad piwnicą</td>
			<td>4.60</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(4.60/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(4.60/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>1.6</td>
			<td>Podłoża pod posadzki</td>
			<td>2.44</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(2.44/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(2.44/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>1.7</td>
			<td>Inne</td>
			<td>0.53</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(0.53/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(0.53/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr class="summary">
			<td>&nbsp;</td>
			<td>Razem stan zerowy</td>
			<td>21.27</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(21.27/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(21.27/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<table class="gap" cellpadding="1" cellspacing="0">
	<tbody>
		<tr><td colspan="9" cellpadding="1">&nbsp;</td></tr>
	</tbody>
</table>

<table class="list" cellpadding="3" cellspacing="0">
	<tbody>
		<tr class="header">
			<td class="lp">2.</td>
			<td colspan="8" class="head">Stan surowy</td>
		</tr>
		<tr>
			<td>2.1</td>
			<td class="ele">Ściany parteru</td>
			<td>6.88</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(6.88/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(6.88/100),2,',',' ');?>
</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
		</tr>
		<tr>
			<td>2.2</td>
			<td>Strop lekki nad parterem</td>
			<td>2.45</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(2.45/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(2.45/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>2.3</td>
			<td>Więźba dachowa</td>
			<td>6.20</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(6.20/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(6.20/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>2.4</td>
			<td>Pokrycie dachu i obróbki</td>
			<td>7.11</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(7.11/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(7.11/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>2.5</td>
			<td>Inne</td>
			<td>1.50</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(1.50/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(1.50/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr class="summary">
			<td>&nbsp;</td>
			<td>Razem stan surowy</td>
			<td>24.14</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(24.14/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(24.14/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<table class="gap" cellpadding="1" cellspacing="0">
	<tbody>
		<tr><td colspan="9" cellpadding="1">&nbsp;</td></tr>
	</tbody>
</table>

<table class="list" cellpadding="3" cellspacing="0">
	<tbody>
		<tr class="header">
			<td class="lp">3.</td>
			<td colspan="8" class="head">Roboty wykończeniowe</td>
		</tr>
		<tr>
			<td>3.1</td>
			<td class="ele">Ścianki działowe</td>
			<td>1.43</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(1.43/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(1.43/100),2,',',' ');?>
</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
		</tr>
		<tr>
			<td>3.2</td>
			<td>Stolarka okienna i drzwiowa</td>
			<td>6.90</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(6.90/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(6.90/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>3.3</td>
			<td>Tynki wewnętrzne</td>
			<td>4.87</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(4.87/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(4.87/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>3.4</td>
			<td>Podłoża, posadzki</td>
			<td>9.36</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(9.36/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(9.36/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>3.5</td>
			<td>Roboty malarskie</td>
			<td>1.40</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(1.40/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(1.40/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>3.6</td>
			<td>Roboty różne</td>
			<td>2.30</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(2.30/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(2.30/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>3.7</td>
			<td>Inne</td>
			<td>1.40</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(1.40/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(1.40/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr class="summary">
			<td>&nbsp;</td>
			<td>Razem roboty wykończeniowe</td>
			<td>27.66</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(27.66/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(27.66/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<table class="gap" cellpadding="1" cellspacing="0">
	<tbody>
		<tr><td colspan="9" cellpadding="1">&nbsp;</td></tr>
	</tbody>
</table>

<table class="list" cellpadding="3" cellspacing="0">
	<tbody>
		<tr class="header">
			<td class="lp">4.</td>
			<td colspan="8" class="head">Instalacje</td>
		</tr>
		<tr>
			<td>4.1</td>
			<td class="ele">Instalacje wodno. kan.</td>
			<td>3.45</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(3.45/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(3.45/100),2,',',' ');?>
</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
		</tr>
		<tr>
			<td>4.2</td>
			<td>Osadnik bezodpływowy</td>
			<td>0.95</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(0.95/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(0.95/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>4.3</td>
			<td>Instalacja c.o. z kotłownią</td>
			<td>6.31</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(6.31/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(6.31/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>4.4</td>
			<td>Instalacje elektryczne</td>
			<td>4.00</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(4/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(4/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>4.5</td>
			<td>Instalacja odgromowa</td>
			<td>0.30</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(0.3/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(0.3/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>4.6</td>
			<td>Inne</td>
			<td>2.00</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(2/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(2/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr class="summary">
			<td>&nbsp;</td>
			<td>Razem instalacje</td>
			<td>17.01</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(17.01/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(17.01/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<table class="gap" cellpadding="1" cellspacing="0">
	<tbody>
		<tr><td colspan="9" cellpadding="1">&nbsp;</td></tr>
	</tbody>
</table>

<table class="list" cellpadding="3" cellspacing="0">
	<tbody>
		<tr class="header">
			<td class="lp">5.</td>
			<td colspan="8" class="head">Roboty zewnętrzne</td>
		</tr>
		<tr>
			<td>5.1</td>
			<td class="ele">Elewacje zewnętrzne</td>
			<td>7.00</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(7/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(7/100),2,',',' ');?>
</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
		</tr>
		<tr>
			<td>5.2</td>
			<td>Różne roboty zewnętrzne</td>
			<td>2.92</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(2.92/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(2.92/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr class="summary">
			<td>&nbsp;</td>
			<td>Razem roboty zewnętrzne</td>
			<td>9.92</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value*(9.92/100),2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value*(9.92/100),2,',',' ');?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<table class="gap" cellpadding="1" cellspacing="0">
	<tbody>
		<tr><td colspan="9" cellpadding="1">&nbsp;</td></tr>
	</tbody>
</table>

<table class="list" cellpadding="3" cellspacing="0">
	<tbody>
		<tr class="summary">
			<td class="lp">&nbsp;</td>
			<td class="ele">Ogółem</td>
			<td>100</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['cost']->value,2,',',' ');?>
</td>
			<td><?php echo number_format($_smarty_tpl->tpl_vars['costVat']->value,2,',',' ');?>
</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
			<td class="perc">&nbsp;</td>
			<td class="val">&nbsp;</td>
		</tr>
	</tbody>
</table><?php }} ?>