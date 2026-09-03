<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Description.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165b4332_22969553',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd56d7a194c7efd6bdf1059c7697eb483ea9f1462' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Description.tpl',
      1 => 1788439333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165b4332_22969553 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="opis" class="bg-white py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="grid lg:grid-cols-12 gap-10 lg:gap-16 items-start">
			<div class="lg:col-span-4">
				<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">O projekcie</span>
				<h2 class="mt-3 text-[40px] md:text-[52px] leading-[1.05] text-[#1b2025] font-bold tracking-tight">Opis</h2>
				<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
				<div class="mt-6 text-[13px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detailCategoryTitle']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
			</div>
			<div class="lg:col-span-8">
				<?php if ($_smarty_tpl->tpl_vars['project']->value['short_description']) {?>
				<blockquote class="text-[22px] md:text-[26px] font-bold text-[#1b2025] leading-snug border-l-4 border-[var(--brand-red)] pl-5 mb-6">
					<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['short_description'], ENT_QUOTES, 'UTF-8', true);?>

				</blockquote>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['description']) {?>
				<div class="text-[15px] leading-[1.75] text-[#444] space-y-4 prose-p:mb-4">
					<?php echo $_smarty_tpl->tpl_vars['project']->value['description'];?>

				</div>
				<?php }?>
				<div class="mt-10 grid grid-cols-3 gap-4 border-t border-[#eee] pt-8">
					<div>
						<div class="text-[11px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold">Powierzchnia</div>
						<div class="mt-1 text-[22px] font-bold text-[#1b2025]"><?php if ($_smarty_tpl->tpl_vars['detailArea']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['detailArea']->value, ENT_QUOTES, 'UTF-8', true);?>
 m²<?php } else { ?>—<?php }?></div>
					</div>
					<div>
						<div class="text-[11px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold">Sypialnie</div>
						<div class="mt-1 text-[22px] font-bold text-[#1b2025]"><?php if ($_smarty_tpl->tpl_vars['detailBedrooms']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['detailBedrooms']->value, ENT_QUOTES, 'UTF-8', true);
} else { ?>—<?php }?></div>
					</div>
					<div>
						<div class="text-[11px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold">Garaż</div>
						<div class="mt-1 text-[22px] font-bold text-[#1b2025]"><?php if ($_smarty_tpl->tpl_vars['detailGarage']->value) {
echo $_smarty_tpl->tpl_vars['detailGarage']->value;?>
 stan.<?php } else { ?>—<?php }?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }
}
