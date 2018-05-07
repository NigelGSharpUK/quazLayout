<?php
#SecondLevel.php
require "myTemplates/myPage.php";
$sArticles = drawArticleFromFile( "AnotherSecondLevel" );
drawMyPage( "Another Second Level", $sArticles );
?>
