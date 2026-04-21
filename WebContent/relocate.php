<?php 

$link = 'https://www.studioatrium.pl/';
$search = 'wynik-wyszukiwania/?';
$all = 'projekty-domow/';

if ((!empty($_GET['min']) && $_GET['min'] != 'pow. użytkowa') || (isset($_GET['typ_domu']) && $_GET['typ_domu'] != 7)) {
	$link .= $search;
} elseif (!empty($_GET['uri']) && preg_match('/projekt,([0-9]*),61,opis\.html/', $_GET['uri'], $found)) {
	$projectId = $found[1];
	$link .= 'index.php?module=relocator301&relocate=projekt-domu&params[id]=' . $projectId;
} else {
	$link .= $all;
}

if (!empty($_GET['min']) && $_GET['min'] != 'pow. użytkowa') {
	$link .= 'pow_min=' . $_GET['min'];
}

if (isset($_GET['typ_domu']) && $_GET['typ_domu'] != 7) {
	$next = '';
	switch ($_GET['typ_domu']) {
		case 0: $next = 'typ_projektu=parterowe'; break;
		case 1: $next = 'typ_projektu=z_poddaszem'; break;
		case 2: $next = 'typ_projektu=pietrowe'; break;
		case 16: $next = 'typ_projektu=blizniacze'; break;
		case 512: $next = 'typ_projektu=dwulokalowe'; break;
	}
	
	if (!empty($_GET['min'])) {
		$link .= '&' . $next;
	} else {
		$link .= $next;
	}
}

header("Location: " . $link);