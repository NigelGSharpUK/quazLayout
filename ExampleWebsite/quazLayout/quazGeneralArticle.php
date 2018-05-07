<?php
#GeneralArticle.php5
function beginArticle()
{
  return "<div class=\"content\">\n";
}
function endArticle()
{
  $sResult = "<div class=\"article-seperator\">&nbsp;</div>\n";
  $sResult .= "</div>\n";
  return $sResult;
}
function drawTitle( $sTitle )
{
  return "<h1 class=\"article-title\">" . $sTitle . "</h1>\n";
}
function drawArticleNoPic( $sTitle, $sContent )
{
  $sResult = beginArticle();
  $sResult .= drawTitle( $sTitle );
  $sResult .= $sContent;
  $sResult .= endArticle();
  return $sResult;
}
function drawArticleLeftPic( $sTitle, $sContent, $sPicFilename )
{
  $sResult = beginArticle();
  $sResult .= drawTitle( $sTitle );
  $sResult .= "<img class=\"article-pic-left\" src=\"" . $sPicFilename . "\"/>\n";
  $sResult .= $sContent;
  $sResult .= endArticle();
  return $sResult;
}
function drawArticleCenterPic( $sTitle, $sContent, $sPicFilename )
{
  $sResult = beginArticle();
  $sResult .= drawTitle( $sTitle );
  $sResult .= "<center><img class=\"article-pic-center\" src=\"" . $sPicFilename . "\"/></center>\n";
  $sResult .= $sContent;
  $sResult .= endArticle();
  return $sResult;
}
function drawArticleRightPic( $sTitle, $sContent, $sPicFilename )
{
  $sResult = beginArticle();
  $sResult .= drawTitle( $sTitle );
  $sResult .= "<img class=\"article-pic-right\" src=\"" . $sPicFilename . "\"/>\n";
  $sResult .= $sContent;
  $sResult .= endArticle();
  return $sResult;
}
function drawArticleFromFile( $sFilenameWithoutExt )
{
  $sResult = beginArticle();
  $sResult .= file_get_contents( "myArticles/" . $sFilenameWithoutExt . ".html" );
  $sResult .= endArticle();
  return $sResult;
}

?>
