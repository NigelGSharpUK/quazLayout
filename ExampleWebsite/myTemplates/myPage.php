<?php
#myPage.php
require "myMenu.php";
require "quazLayout/quazGeneralArticle.php";

function drawMyPage($sSelectedMenu, $sArticles, $sHead="")
{
// Looks better without on IE8
//  echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";
  echo "<html>\n";
	echo "<head>\n";
	echo '<script type="text/javascript">' . "\n";
  echo "function loaded()\n";
	echo "{\n";
	echo 'var maindiv=document.getElementById("main");' . "\n";
	echo 'var contdiv=document.getElementById("container");' . "\n";
	echo 'var menudiv=document.getElementById("menu");' . "\n";
  echo 'var menh=menudiv.offsetHeight + 10;' . "\n";
	echo 'var mainh=maindiv.offsetHeight;' . "\n";
  echo 'var height=(menh>mainh) ? menh : mainh;' . "\n";
	echo 'contdiv.style.height=height + "px";' . "\n";
	echo "}\n";
  echo "</script>\n";
  echo "<title>quazLayout Example Website</title>\n";
  echo "<link rel=\"stylesheet\" href=\"Stylesheet.css\" type=\"text/css\"/>\n";
  echo $sHead;
  echo "</head>\n";
  echo '<body onload="loaded();">' . "\n";
  echo "\n";
  echo "<div id=\"masthead\">\n";
  echo "<img src=\"myPictures/Logo.png\" style=\"margin:8px;\" id=\"logo\"/>\n";

  echo "<span style=\"color:#FFF; font-family:Arial; font-size:medium;\">\n";
  echo '...you could put some text here';
  echo "\n";
  echo "</span></div>";
  echo "\n";
  
  echo "<div id=\"container\">\n";
  echo drawMyMenu($sSelectedMenu);
  echo "<div id=\"main\">\n";
  echo $sArticles;
  echo "</div>\n";
  echo "</div>\n";

  echo "<div id=\"footer\">Copyright 2018 Nigel Sharp";
  echo '<a href="https://github.com/NigelGSharpUK/quazLayout"> github.com/NigelGSharpUK/quazLayout</a>';
  echo "</div>\n";
  
  echo "</body></html>\n";
}
?>