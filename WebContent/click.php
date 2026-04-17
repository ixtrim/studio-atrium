<?php 

$link = 'https://www.studioatrium.pl';
$statsFile = '../Log/' . date('Y-m') . '-bannerStats.log';

if (!empty($_GET['rel'])) {
	switch ($_GET['rel']) {
		case 'dh32974h0jef9834deijd983204gejf94g': {
			if (!empty($_GET['projekt']) && !empty($_GET['link'])) {
				$link = 'https://formularz.wolfhaus.com.pl/atrium/?projekt=' . $_GET['projekt'] . '&link=' . $_GET['link'];
				$bannerName = 'wolf';
			} else {
				$link = 'https://formularz.wolfhaus.com.pl/atrium/';
				$bannerName = 'wolf';
			}
		} break;
		
		case 'jf34fvqjweiffh9q3h4f9h34hf384hfh4f': {
			$link = 'https://new-house.com.pl/kalkulator-budowy-domu?calc=13';
			$bannerName = 'newhouse';
		} break;
		
		case 'nbcns784bvbanc84nfika89234nwnfns8e': {
			$link = 'https://www.rekuperatory.pl/atrium/';
			$bannerName = 'rekuperatory';
		} break;
		
		case '9834fj38fjvdfn9384jfv3efj83j83jedf': {
		    $link = 'https://ongeo.pl/raporty/tematy/mpzp?utm_source=studioatrium&utm_medium=affiliate';
		    $bannerName = 'onGeo mpzp';
		} break;
		
		case '42895jvnfrnv245fvuiwef858vwev8w5v': {
		    $link = 'https://ongeo.pl/raporty/?utm_source=studioatrium&utm_medium=affiliate';
		    $bannerName = 'onGeo';
		} break;
		
		case 'jf8394hgjfh9384hfklaf042fgwefj934': {
		    $link = 'https://www.pkobp.pl/lpk/kredyt-wlasny-kat-hipoteczny_at/?utm_source=programpartnerski&utm_medium=6139&utm_campaign=2022_ongoing_kh&utm_content=afiliacja&portal=6139&wid=68e0cbbc-53e1-4e37-b696-c79e780483fe&wid2=at';
		    $bannerName = 'pko-small';
		} break;
		
		case '834jfoisdf034gsdvlsdv934ksf4f8hsd': {
		    $link ='https://www.pkobp.pl/lpk/kredyt-wlasny-kat-hipoteczny_at/?utm_source=programpartnerski&utm_medium=6139&utm_campaign=2022_ongoing_kh&utm_content=afiliacja&portal=6139&wid=68e0cbbc-53e1-4e37-b696-c79e780483fe&wid2=at';
		    $bannerName = 'pko-big';
		} break;
		
		case 'sadf32489sd98jsdfj348gjsdkfjsd934': {
		    $link = 'https://programpartnerski.pkobp.pl/redirect?partner_id=6139&creation_type=LINK&creation_id=105';
		    $bannerName = 'pko-logo';
		} break;
		
		case 'hf3489hfjdfh93j8fg34ghjfhsdfkj234': {
		    $link = 'https://mfinanse.pl/formularz-biznespartner/?fn=studio-atrium&f=FBP-0125&e=98082';
		    $bannerName = 'mfinanse';
		} break;
		
		case 'jf8394glskdf9324u9gtf9wefwuedf923': {
		    $link = 'https://www.salesmanago.pl/mscf/nxeaceffnj5nbgay/default/Atrium_Maxfliz_formularz_kontaktowy.htm';
		    $bannerName = 'maxfliz';
		} break;
		
		case 'fj3r4ur983hjef98y3498chwiouefh934': {
		    $link = 'https://formularz.apissa.pl/Projekty-szkieletowepl/';
		    $bannerName = 'apissa';
		} break;

		case 'jfg398hguhf9834ggjwsdfu234ghwergj': {
		    if (!empty($_GET['projekt']) && !empty($_GET['link'])) {
		        $link = 'https://formularz.rgsystem.pl/Studio-Atrium/?projekt=' . $_GET['projekt'] . '&link=' . $_GET['link'];
		        $bannerName = 'rgsystem';
		    } else {
		        $link = 'https://formularz.rgsystem.pl/Studio-Atrium/';
		        $bannerName = 'rgsystem';
		    }
		} break;
		
		case 'jf9384yhhnv978fhnvw374yn983wfn98w': {
		    $link = 'https://wolfhaus.pl/landing/atrium/';
		    $bannerName = 'wolf-new';
		} break;
	}
	
	$type = 'www';
	if (!empty($_GET['type']) && $_GET['type'] == 'email') {
		$type = 'email';
	}
	
	if ($type == 'email' || ($type == 'www' && !empty($_SERVER["HTTP_REFERER"]))) {
		file_put_contents($statsFile, $bannerName . "|" . $type . "|" . date('Y-m-d H:i:s') . "|" . $_SERVER["HTTP_REFERER"] . "|" . $_SERVER["REMOTE_ADDR"] . "\n", FILE_APPEND);
	}
} 


header("Location: " . $link);