<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Realizations.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165d3e03_17496118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13e264bb47b3953b94dac89fe17deb8220c59993' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Realizations.tpl',
      1 => 1788439407,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165d3e03_17496118 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="realizacje" class="bg-white py-14 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-2">
			<h2 class="text-[22px] md:text-[26px] font-bold uppercase tracking-wide text-[#1b2025]">Realizacje</h2>
			<div class="w-12 h-[3px] bg-[var(--brand-red)] mt-2"></div>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['detailRealizations']->value) {?>
		<div class="text-center text-[#6b6b6b] uppercase tracking-[0.25em] text-[13px] my-8">Wybudowane</div>
		<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailRealizations']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value['src'], ENT_QUOTES, 'UTF-8', true);?>
" data-fancybox="realizacje" data-caption="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value['alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="group block overflow-hidden bg-[#f5f6f7]">
				<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value['src'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value['alt'], ENT_QUOTES, 'UTF-8', true);?>
" loading="lazy" class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-105">
			</a>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		<?php } else { ?>
		<p class="text-[14px] text-[#666] mt-8">Brak opublikowanych realizacji dla tego projektu.</p>
		<?php }?>

		<div class="mt-14">
			<h2 class="text-[22px] md:text-[26px] font-bold uppercase tracking-wide text-[#1b2025]">Forum dyskusyjne</h2>
			<div class="text-[12px] uppercase tracking-[0.2em] text-[#6b6b6b] mt-1">Wpisy dla projektu <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
			<div class="w-12 h-[3px] bg-[var(--brand-red)] mt-3"></div>
			<p class="text-[14px] text-[#444] leading-relaxed mt-6 max-w-3xl">
				Witamy na Forum dyskusyjnym Studia Atrium. To dział naszego serwisu przeznaczony dla wszystkich zainteresowanych projektami i budową domu według naszych projektów. Poniżej znajdują się wszystkie wpisy z Forum związane z projektem domu <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
. Zapraszamy do dyskusji!
			</p>
			<?php if ($_smarty_tpl->tpl_vars['commentList']->value) {?>
			<ul class="mt-8 space-y-4 max-w-3xl">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['commentList']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
				<li class="border border-[#e5e5e5] p-4">
					<div class="text-[13px] font-bold text-[#222]"><?php if ($_smarty_tpl->tpl_vars['c']->value['title']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['title'], ENT_QUOTES, 'UTF-8', true);
} else { ?>Wątek<?php }?></div>
					<?php if ($_smarty_tpl->tpl_vars['c']->value['content']) {?><div class="text-[14px] text-[#555] mt-2 leading-relaxed"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['content'], ENT_QUOTES, 'UTF-8', true),220 ));?>
</div><?php }?>
				</li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
			<a href="#forum" class="inline-flex mt-6 bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold uppercase tracking-wider px-5 py-3">Dodaj nowy temat</a>
			<?php } else { ?>
			<a href="javascript:" class="login-trigger inline-flex mt-6 bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold uppercase tracking-wider px-5 py-3">Dodaj nowy temat</a>
			<?php }?>
		</div>

		<div class="mt-14">
			<h2 class="text-[22px] md:text-[26px] font-bold uppercase tracking-wide text-[#1b2025]">Pliki</h2>
			<div class="w-12 h-[3px] bg-[var(--brand-red)] mt-2"></div>
			<p class="text-[14px] text-[#444] leading-relaxed mt-6 max-w-3xl">
				Aby pobrać rysunki szczegółowe<?php if ($_smarty_tpl->tpl_vars['detailCostStages']->value) {?>, kosztorys szacunkowy<?php }?>, obrysy domu lub zestawienie materiałów do tego projektu,
				<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
				użyj przycisku poniżej.
				<?php } else { ?>
				<a href="javascript:" class="account login-trigger text-[var(--brand-blue-strong)] underline">zaloguj się do swojego konta</a> i przejdź ponownie do sekcji plików.
				<?php }?>
			</p>
			<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
			<button type="button" class="filesDloadTrigger mt-6 inline-flex bg-white border border-[#d9dde0] text-[#222] text-[12px] font-bold uppercase tracking-wider px-5 py-3 hover:border-[var(--brand-blue)] transition-colors">Pobierz pliki</button>
			<?php }?>
		</div>
	</div>
</section>
<?php }
}
