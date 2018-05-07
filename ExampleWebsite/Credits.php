<?php
#Credits.php
require "myTemplates/myPage.php";
$sArticles = drawArticleFromFile( "Credits" );
drawMyPage( "Credits", $sArticles );
?>
