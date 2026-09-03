<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Floors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165a7365_93333775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bf4a5083db0368a394a9ecd1d1b927e8ac5558a' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Floors.tpl',
      1 => 1788439316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165a7365_93333775 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['detailFloors']->value) {?>
<section id="rzuty" class="bg-[#f5f6f7] py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-10 flex items-end justify-between gap-6 flex-wrap">
			<div>
				<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Plan budynku</span>
				<h2 class="mt-3 text-[34px] md:text-[42px] leading-tight text-[#1b2025] font-bold tracking-tight">Rzuty</h2>
				<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			</div>
			<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['detailFloors']->value )) > 1) {?>
			<div class="flex gap-1 bg-white border border-[#e6e8eb] p-1" id="proj-floor-tabs" role="tablist">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailFloors']->value, 'floor');
$_smarty_tpl->tpl_vars['floor']->index = -1;
$_smarty_tpl->tpl_vars['floor']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['floor']->value) {
$_smarty_tpl->tpl_vars['floor']->do_else = false;
$_smarty_tpl->tpl_vars['floor']->index++;
$_smarty_tpl->tpl_vars['floor']->first = !$_smarty_tpl->tpl_vars['floor']->index;
$__foreach_floor_12_saved = $_smarty_tpl->tpl_vars['floor'];
?>
				<button type="button" role="tab" data-floor="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
"
					class="proj-floor-tab px-5 py-2 text-[12px] uppercase tracking-[0.18em] font-semibold transition-all <?php if ($_smarty_tpl->tpl_vars['floor']->first) {?>bg-[var(--brand-blue)] text-white<?php } else { ?>text-[#6b7177] hover:text-[#222]<?php }?>">
					<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['label'], ENT_QUOTES, 'UTF-8', true);?>

				</button>
				<?php
$_smarty_tpl->tpl_vars['floor'] = $__foreach_floor_12_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<?php }?>
		</div>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailFloors']->value, 'floor');
$_smarty_tpl->tpl_vars['floor']->index = -1;
$_smarty_tpl->tpl_vars['floor']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['floor']->value) {
$_smarty_tpl->tpl_vars['floor']->do_else = false;
$_smarty_tpl->tpl_vars['floor']->index++;
$_smarty_tpl->tpl_vars['floor']->first = !$_smarty_tpl->tpl_vars['floor']->index;
$__foreach_floor_13_saved = $_smarty_tpl->tpl_vars['floor'];
?>
		<div class="proj-floor-panel grid lg:grid-cols-12 gap-6<?php if (!$_smarty_tpl->tpl_vars['floor']->first) {?> hidden<?php }?>" data-floor="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
			<div class="lg:col-span-8 bg-white border border-[#e6e8eb] p-5 md:p-7 relative">
				<?php if ($_smarty_tpl->tpl_vars['floor']->value['hotspots']) {?>
				<p class="text-[11px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold mb-4">Dotknij dane pomieszczenie by zobaczyć opis i powierzchnię</p>
				<?php }?>
				<div class="relative mx-auto w-full max-w-[520px]" style="aspect-ratio: <?php echo $_smarty_tpl->tpl_vars['floor']->value['width'];?>
 / <?php echo $_smarty_tpl->tpl_vars['floor']->value['height'];?>
">
					<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['img'], ENT_QUOTES, 'UTF-8', true);?>
" alt="Rzut — <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
" class="absolute inset-0 w-full h-full object-contain select-none pointer-events-none" draggable="false" loading="lazy"
						onerror="this.onerror=null;this.src='https://media.studioatrium.pl/project/<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
/sketch.jpg';">
					<?php if ($_smarty_tpl->tpl_vars['floor']->value['hotspots']) {?>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 <?php echo $_smarty_tpl->tpl_vars['floor']->value['width'];?>
 <?php echo $_smarty_tpl->tpl_vars['floor']->value['height'];?>
" preserveAspectRatio="xMidYMid meet"
						class="absolute inset-0 w-full h-full z-10 proj-floor-svg" style="overflow:visible" data-floor="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['floor']->value['hotspots'], 'hs');
$_smarty_tpl->tpl_vars['hs']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hs']->value) {
$_smarty_tpl->tpl_vars['hs']->do_else = false;
?>
						<polygon points="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hs']->value['points'], ENT_QUOTES, 'UTF-8', true);?>
" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hs']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hs']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-desc="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hs']->value['desc'], ENT_QUOTES, 'UTF-8', true);?>
" data-ptspid="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hs']->value['ptspid'], ENT_QUOTES, 'UTF-8', true);?>
"
							fill="rgba(27,153,225,0)" stroke="rgba(27,153,225,0)" stroke-width="3" vector-effect="non-scaling-stroke"
							class="cursor-pointer proj-hotspot" style="pointer-events:all"></polygon>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</svg>
					<div class="proj-floor-tooltip absolute left-1/2 -translate-x-1/2 -bottom-3 translate-y-full bg-white border border-[#e5e5e5] text-[#222] px-4 py-2.5 shadow-lg max-w-[90%] text-center pointer-events-none z-20 hidden">
						<div class="tooltip-name text-[13px] font-semibold"></div>
						<div class="tooltip-desc text-[11px] text-[#666] mt-0.5"></div>
					</div>
					<?php }?>
				</div>
				<div class="mt-6 flex items-center justify-between">
					<span class="text-[11px] uppercase tracking-[0.2em] text-[#6b7177] font-semibold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['img'], ENT_QUOTES, 'UTF-8', true);?>
" data-fancybox="rzuty" data-caption="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
 — <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"
						class="text-[11px] uppercase tracking-[0.2em] text-[var(--brand-blue-strong)] hover:text-[var(--brand-red)] font-semibold transition-colors">
						Powiększ rzut →
					</a>
				</div>
			</div>

			<div class="lg:col-span-4 bg-white border border-[#e5e5e5] text-[#222] p-7 md:p-8 flex flex-col">
				<div class="flex items-baseline justify-between border-b border-[#eee] pb-5">
					<span class="text-[20px] tracking-[0.18em] font-light uppercase text-[#222]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					<?php if ($_smarty_tpl->tpl_vars['floor']->value['total']) {?><span class="text-[22px] font-bold tracking-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['total'], ENT_QUOTES, 'UTF-8', true);?>
 m²</span><?php }?>
				</div>
				<ul class="mt-5 space-y-[8px] text-[14px]">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['floor']->value['rooms'], 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
					<li class="proj-room-row flex items-center gap-3 px-1 py-0.5 cursor-pointer" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" data-ptspid="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['ptspid'], ENT_QUOTES, 'UTF-8', true);?>
" data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-area="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['area'], ENT_QUOTES, 'UTF-8', true);?>
">
						<span class="w-5 text-[12px] text-[#999] tabular-nums"><?php echo $_smarty_tpl->tpl_vars['r']->value['n'];?>
</span>
						<span class="flex-1 text-[#333]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
						<span class="text-[#555] tabular-nums"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['area'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					</li>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</ul>
				<?php if ($_smarty_tpl->tpl_vars['floor']->value['total']) {?>
				<div class="mt-5 pt-4 border-t border-[#eee] flex items-center justify-between text-[14px]">
					<span class="uppercase tracking-[0.18em] text-[11px] text-[var(--brand-blue-strong)] font-semibold">Razem</span>
					<span class="font-bold text-[16px]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['total'], ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['floor']->value['extra']) {?>
				<ul class="mt-3 space-y-[8px] text-[14px]">
					<li class="proj-room-row flex items-center gap-3 px-1 py-0.5 cursor-pointer" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['extra']['id'], ENT_QUOTES, 'UTF-8', true);?>
" data-ptspid="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['extra']['ptspid'], ENT_QUOTES, 'UTF-8', true);?>
" data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['extra']['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-area="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['extra']['area'], ENT_QUOTES, 'UTF-8', true);?>
">
						<span class="w-5 text-[12px] text-[#999] tabular-nums"><?php echo $_smarty_tpl->tpl_vars['floor']->value['extra']['n'];?>
</span>
						<span class="flex-1 text-[#333]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['extra']['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
						<span class="text-[#555] tabular-nums"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['floor']->value['extra']['area'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					</li>
				</ul>
				<?php }?>

				<div class="mt-auto pt-6 grid grid-cols-1 gap-2">
					<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasMirror' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectParams']->value ))) {?>
						<?php if ($_smarty_tpl->tpl_vars['detailIsMirror']->value) {?>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
#rzuty" class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.12em] uppercase flex items-center justify-center transition">Odbicie lustrzane — wersja podstawowa</a>
						<?php } else { ?>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro','catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
#rzuty" class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.12em] uppercase flex items-center justify-center transition">Odbicie lustrzane</a>
						<?php }?>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['hasPlot']->value) {?>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'usytuowanie'),$_smarty_tpl ) );?>
" class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.12em] uppercase flex items-center justify-center transition">Słońce w domu</a>
					<?php }?>
				</div>
			</div>
		</div>
		<?php
$_smarty_tpl->tpl_vars['floor'] = $__foreach_floor_13_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
</section>
<?php }
}
}
