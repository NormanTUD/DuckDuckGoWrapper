<?php
	$baseurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	$current_link = $baseurl.$_SERVER[REQUEST_URI];

	if(array_key_exists("param", $_GET)) {
		$param = $_GET['param'];

		$param = preg_replace("/(![a-z]+)/", " $1", $param);

		$url = "https://www.google.com/search?q=".urlencode($param);
		if(preg_match('/!ekz/', $param)) {
			$param = preg_replace("/\s*!ekz/", "", $param);
			$url = "https://www.ebay-kleinanzeigen.de/s-".urlencode($param)."/k0";

		} else if(preg_match('/!dwiki/', $param)) {
			$param = preg_replace("/\s*!dwiki/", "", $param);
			$url = "https://de.wikipedia.org/w/index.php?search=".urlencode($param)."&title=Spezial%3ASuche&fulltext=Suchen&ns0=1";

		} else if(preg_match('/!ewiki/', $param)) {
			$param = preg_replace("/\s*!ewiki/", "", $param);
			$url = "https://en.wikipedia.org/w/index.php?search=".urlencode($param)."&title=Special%3ASearch&go=Go&ns0=1";

		} else if(preg_match('/!gr/', $param)) {
			$param = preg_replace("/\s*!gr/", "", $param);
			$url = "index.php?param=".urlencode("!g site:reddit.com $param");

		} else if(preg_match('/!beta/', $param)) {
			$param = preg_replace("/\s*!beta/", "", $param);
			$url = "index.php?param=".urlencode("!g site:betaarchive.com $param");

		} else if(preg_match('/!taurus/', $param)) {
			$param = preg_replace("/\s*!taurus/", "", $param);
			$url = "index.php?param=".urlencode("!g site:https://doc.zih.tu-dresden.de/hpc-wiki $param");

		} else if(preg_match('/!quora/', $param)) {
			$param = preg_replace("/\s*!quora/", "", $param);
			$url = "index.php?param=".urlencode("!g site:quora.com $param");

		} else if(preg_match('/!gutefrage/', $param)) {
			$param = preg_replace("/\s*!gutefrage/", "", $param);
			$url = "index.php?param=".urlencode("!g site:gutefrage.net $param");

		} else if(preg_match('/!genius/', $param)) {
			$param = preg_replace("/\s*!genius/", "", $param);
			$url = "index.php?param=".urlencode("!g site:genius.com $param");

		} else if(preg_match('/!cpan/', $param)) {
			$param = preg_replace("/\s*!cpan/", "", $param);
			$url = "index.php?param=".urlencode("!g site:cpan.org $param");

		} else if(preg_match('/!domian/', $param)) {
			$param = preg_replace("/\s*!domian/", "", $param);
			$url = "$baseurl/domian/?suche1=".urlencode($param);

		} else if(preg_match('/!axp/', $param)) {
			$param = preg_replace("/\s*!axp/", "", $param);
			$url = "$baseurl/axp/?suche1=".urlencode($param);

		} else if(preg_match('/^r\/[a-z]+\/$/', $param)) {
			$url = "https://reddit.com/".$param;

		} else if(preg_match('/!/', $param)) {
			$url = "https://duckduckgo.com/?t=ffsb&q=".urlencode($param)."&atb=v230-1&ia=calculator";
		}

		header('Location: '.$url);
		exit;
	} else {
		print htmlentities("$current_link?param=%s");
	}
?> 
