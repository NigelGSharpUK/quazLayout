<?php
#Home.php
require "myTemplates/myPage.php";
$sArticles = drawArticleFromFile( "ExampleTitle" );
$sArticles .= drawArticleFromFile( "AboutQuazLayout" );
drawMyPage( "Home", $sArticles );
?>
