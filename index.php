<?php
        $param = $_GET['param'];

        $param = preg_replace("/(![a-z]+)/", " $1", $param);

        $url = "https://duckduckgo.com/?t=ffsb&q=".urlencode($param)."&atb=v230-1&ia=calculator";
        if(preg_match('/!ekz/', $param)) {
                $param = preg_replace("/\s*!ekz/", "", $param);
                $url = "https://www.ebay-kleinanzeigen.de/s-".urlencode($param)."/k0";

        } else if(preg_match('/!dwiki/', $param)) {
                $param = preg_replace("/\s*!dwiki/", "", $param);
                $url = "https://de.wikipedia.org/w/index.php?search=".urlencode($param)."&title=Spezial%3ASuche&fulltext=Suchen&ns0=1";

        } else if(preg_match('/!gr/', $param)) {
                $param = preg_replace("/\s*!gr/", "", $param);
                $url = "index.php?param=".urlencode("!g site:reddit.com $param");
        }
        header('Location: '.$url);
        exit;
?> 
