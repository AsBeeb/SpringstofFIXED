<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="stylesheet/stylesheet2.css">
    <link rel="Shortcut Icon" type="image/ico" href="design/icon.ico"/>
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('source').error(function() {
                var videoHeight = $("video").css("height");
                var videoWidth = $("video").css("width");
                $("video").replaceWith("<div id=\"videoError\"></div>");
                var videoErrorDiv = document.getElementById("videoError");
                videoErrorDiv.style.border = "2px solid black";
                videoErrorDiv.style.height = videoHeight+200;
                videoErrorDiv.style.width = videoWidth;
                videoErrorDiv.style.textAlign = "center";
                videoErrorDiv.style.backgroundColor = "#a4c0d0";
                videoErrorDiv.innerHTML =
                    "<h3>INGEN VIDEO?!<h3><h1>Har du en video af dette spring??<h1><h2>Send den til os!<br>S&aring; ligger vi den m&aring;ske ind her!<h2><h5>Send den til os p&aring; kontakt@springstof.dk.<br>Skriv navn, e-mail s&aring; vi kan komme i kontakt med dig.<h5>"
            });
        });
        
        function getAge(year, month, day) {
            var d = new Date();
            var age = d.getYear()+1901-year;
            if (d.getMonth()+1 > month) {
                age -= 1;
            } else if (d.getDate() > day ) {
                age -= 1
            }
            document.write(age);
            return;
        }
    </script>
</head>
<body>
    <!--Topbar-->
    <nav>
        <ul id="topbar">
            <li><a href="?p=web2">Nyheder</a></li>
            <li><a href="?p=spring">Spring</a>
                <ul id="underbar">
                    <li><a href="?p=basal">Basal</a></li>
                    <li><a href="?p=mini">Trampet</a></li>
                    <li><a href="?p=bane">Banespring</a></li>
<!--                    <li><a href="?p=gulv2">Gulv</a></li>-->
<!--                    <li><a href="?p=tricking">Tricking</a></li>-->
                </ul>
            </li>
            <li><a href="?p=redskabsindex">Planl&aelig;g</a></li>
            <li id="blog"><a href="?p=blog">Blog</a></li>
            <li><a href="?p=info">Information</a>
                <ul id="underbar">
                    <li id="om_os"><a href="?p=om_os">Om os</a></li>
<!--                    <li id="springere"><a href="?p=springere">Ud&oslash;verne</a></li>-->
                    <li id="site_info"><a href="?p=site_info">Info</a></li>
                    <li><a href="?p=kontakt">Kontakt</a></li>
                </ul>
            </li>
            <a href="?p=web2"><img src="design/logo_002_final.png" id="topLogo"></a>
        </ul>
        <div id="underbar2">
            <div id="login_underbar"><a href="">Login</a></div>
        </div>
    </nav>
    
<?php

 $page_files=array( 
                    //Main
                    'error'=>'error.html',
                    'redskabsindex'=>'redskabsindex.html',
                    'spring'=>'spring/spring.html',
                    'web2'=>'web2.php',
                    'ret'=>'ret.html',
                    
                    //Information
                    'om_os'=>'information/om_os.html',
                    'site_info'=>'information/site_info.html',
                    'info'=>'information/info.html',
                    'kontakt'=>'information/kontakt.php',
                    //Udøverene
//                    'bonni'=>'om_os/bonni.html',
//                    'overgaard'=>'om_os/overgaard.html',
//                    'springere'=>'om_os/springere.html',
//                    'sw'=>'om_os/sw.html',
     
                    //Blog
                    'blog'=>'blog/blog.php',
                    //Artikler
                    'dgi_verdenshold_10'=>'blog/artikler/dgi_verdenshold_10.html',
                    'ge_rytmeserier'=>'blog/artikler/ge_rytmeserier.html',

                    //Spring
                    'basal'=>'spring/basal/basal.html',
                    //Basal
                    'kol'=>'spring/basal/kol.html',
                    'ophop'=>'spring/basal/ophop.html',
                    'stand'=>'spring/basal/stand.html',
                    'vejr'=>'spring/basal/vejr.html',
                    'bag_kol'=>'spring/basal/bag_kol.html',
                    
                    //Trampet (mini)
                    'mini'=>'spring/mini/mini.html',
                    'salto'=>'spring/mini/salto.html',
                    'saltoX'=>'spring/mini/salto/saltoX.html',
                    //Skrue
                    'skrue'=>'spring/mini/skrue/skrue.html',
                    'halv'=>'spring/mini/skrue/halv.html',
                    'full'=>'spring/mini/skrue/full.html',
                    'rudi'=>'spring/mini/skrue/rudi.html',
                    'dskrue'=>'spring/mini/skrue/dskrue.html',
                    //Dobbelt roterende
                    'dobbelt-cat'=>'spring/mini/dobbelt/dobbelt-cat.html',
                    'dobbelt'=>'spring/mini/dobbelt/dobbelt.html',
                    //Out
                    'out-cat'=>'spring/mini/dobbelt/out-cat.html',
                    'out'=>'spring/mini/dobbelt/out.html',
                    'dobbelt-out'=>'spring/mini/dobbelt/dobbelt-out.html',
                    'dobbelt-rudyout'=>'spring/mini/dobbelt/dobbelt-rudyout.html',
                    //In
                    'in-cat'=>'spring/mini/dobbelt/in-cat.html',
                    'in'=>'spring/mini/dobbelt/in.html',
                    'barani-in'=>'spring/mini/dobbelt/barani-in.html',
                    'full-in'=>'spring/mini/dobbelt/full-in.html',
                    'rudy-in'=>'spring/mini/dobbelt/rudy-in.html',
                    //FFskrue
                    'ffskrue'=>'spring/mini/dobbelt/ffskrue.html',
                    'full-half'=>'spring/mini/dobbelt/full-half.html',
                    'full-full'=>'spring/mini/dobbelt/full-full.html',
                    'full-rudy'=>'spring/mini/dobbelt/full-rudy.html',
                    
                    //Banespring
                    'bane'=>'spring/bane/bane.html',
                    //For
                    'for'=>'spring/bane/for/for.html',
                    'kraft'=>'spring/bane/for/kraft.html',
                    'startsalto'=>'spring/bane/for/startsalto.html',
                    'efterkraft'=>'spring/bane/for/efterkraft.html',
                    'for_salto'=>'spring/bane/for/for_salto.html',
                    //Skrue
                    'for_skrue'=>'spring/bane/for/for_skrue/for_skrue.html',
                    'for_halv'=>'spring/bane/for/for_skrue/for_halv.html',
                    'for_full'=>'spring/bane/for/for_skrue/for_full.html',
                    'for_rudi'=>'spring/bane/for/for_skrue/for_rudi.html',
                    'for_dskrue'=>'spring/bane/for/for_skrue/for_dskrue.html',
                    //Dobbelt roterende
                    'for_dobbelt'=>'spring/bane/for/for_dobbelt/for_dobbelt.html',
                    'for_dobbelt-cat'=>'spring/bane/for/for_dobbelt/for_dobbelt-cat.html',
                    //Out
                    'for_out'=>'spring/bane/for/for_dobbelt/for_out.html',
                    'for_out-cat'=>'spring/bane/for/for_dobbelt/for_out-cat.html',
                    'for_dobbelt-out'=>'spring/bane/for/for_dobbelt/for_dobbelt-out.html',
                    //In
                    'for_in'=>'spring/bane/for/for_dobbelt/for_in.html',
                    'for_in-cat'=>'spring/bane/for/for_dobbelt/for_in-cat.html',
                    'for_barani-in'=>'spring/bane/for/for_dobbelt/for_barani-in.html',
                    'for_full-in'=>'spring/bane/for/for_dobbelt/for_full-in.html',
                    //FFskrue
                    'for_ffskrue'=>'spring/bane/for/for_dobbelt/for_ffskrue.html',
                    'for_full-half'=>'spring/bane/for/for_dobbelt/for_full-half.html',
                    //
                    //Bag
                    'bag'=>'spring/bane/bag/bag.html',
                    'bag_back'=>'spring/bane/bag/bag_back.html',
                    'araber'=>'spring/bane/bag/araber.html',
                    'flik'=>'spring/bane/bag/flik.html',
                    'whip'=>'spring/bane/bag/whip.html',
                    'efterflik'=>'spring/bane/bag/efterflik.html',
                    //Skrue
                    'bag_skrue'=>'spring/bane/bag/bag_skrue/bag_skrue.html',
                    'bag_halv'=>'spring/bane/bag/bag_skrue/bag_halv.html',
                    'bag_full'=>'spring/bane/bag/bag_skrue/bag_full.html',
                    'bag_rudi'=>'spring/bane/bag/bag_skrue/bag_rudi.html',
                    'bag_dskrue'=>'spring/bane/bag/bag_skrue/bag_dskrue.html',
                    //Dobbelt roterende
                    'bag_dobbelt'=>'spring/bane/bag/bag_dobbelt/bag_dobbelt.html',
                    'bag_dobbelt-cat'=>'spring/bane/bag/bag_dobbelt/bag_dobbelt-cat.html',
                    //Out
                    'bag_out'=>'spring/bane/bag/bag_dobbelt/bag_out.html',
                    'bag_out-cat'=>'spring/bane/bag/bag_dobbelt/bag_out-cat.html',
                    'bag_dobbelt-out'=>'spring/bane/bag/bag_dobbelt/bag_dobbelt-out.html',
                    //In
                    'bag_in'=>'spring/bane/bag/bag_dobbelt/bag_in.html',
                    'bag_in-cat'=>'spring/bane/bag/bag_dobbelt/bag_in-cat.html',
                    'bag_barani-in'=>'spring/bane/bag/bag_dobbelt/bag_barani-in.html',
                    'bag_full-in'=>'spring/bane/bag/bag_dobbelt/bag_full-in.html',
                    'bag_rudy-in'=>'spring/bane/bag/bag_dobbelt/bag_rudy-in.html',
                    //FFskrue
                    'bag_ffskrue'=>'spring/bane/bag/bag_dobbelt/bag_ffskrue.html',
                    'bag_full-half'=>'spring/bane/bag/bag_dobbelt/bag_full-half.html',
                    'bag_full-full'=>'spring/bane/bag/bag_dobbelt/bag_full-full.html',
                    'bag_miller'=>'spring/bane/bag/bag_dobbelt/bag_miller.html',
                    
                    //Gulv
                    'gulv2'=>'spring/gulv/gulv2.html',
                    //Momenter
                    'back'=>'spring/gulv/momenter/back.html',
                    'mflik'=>'spring/gulv/momenter/mflik.html',
                    'momenter'=>'spring/gulv/momenter/momenter.html',
                    //Over gulv
                    'over_gulv'=>'spring/gulv/over_gulv/over_gulv.html',
                    //Par
                    'par'=>'spring/gulv/par/par.html',
                    
                    //Tricking
                    'molberg'=>'spring/tricking/molberg.html',
                    'tricking'=>'spring/tricking/tricking.html',
                  );
                  
if (!isset($_GET['p'])) { 
   include "web2.php";
} else if (in_array($_GET['p'],array_keys($page_files))) {
      include $page_files[$_GET['p']];
} else {
      header("Location: error.html");
}

?>

        <div id="footer">
            <p class="paragraph">
                Copyright Springstof.dk<br />
                <small>Alle rettigheder forbeholdes</small><br />
            </p>
            <br> <!--<a href="?p=ret"><span>Rettigheder</span></a>-->
        </div>
    
<!--    Baggrund START-->
    <div class="background"></div>
<!--    Baggrund END-->
    
</body>
</html>