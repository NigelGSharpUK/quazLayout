<?php
#SecondLevel.php
require "myTemplates/myPage.php";
$sArticles = drawArticleFromFile( "SecondLevel" );
drawMyPage( "Second Level", $sArticles );
?>
