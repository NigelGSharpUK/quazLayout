<?php
#GeneralMenu.php5

class MenuItem
{
  var $nDepth;
  var $sText;
  var $sLink;
  var $nParent;			// Populated by analyzeMenus()
  var $aAllChildren;	// Populated by analyzeMenus()
  function init( $nDepth, $sText, $sLink )
  {
    $this->nDepth = $nDepth;
	$this->sText = $sText;
	$this->sLink = $sLink;
  }
  function isOpen( $sSelectedMenu )
  {
    global $TheMenuItems;
	
    // A menu item is open if it is selected
	if( $this->sText == $sSelectedMenu )
	  return true;
	  
	// A menu item is open if any child is selected
	foreach( $this->aAllChildren as $key=>$value )
	  if( $TheMenuItems[$value]->sText == $sSelectedMenu )
	    return true;

	return false;
  }
  function isShown( $sSelectedMenu )
  {
    global $TheMenuItems;
    // A menu item is shown if its immediate parent is open
	return $TheMenuItems[$this->nParent]->isOpen($sSelectedMenu);
  }
  function draw( $sSelectedMenu )
  {
    echo "  ";
    for( $i=0; $i<$this->nDepth; $i++ ) {echo "  ";}
	{
      if( count($this->aAllChildren) > 0 )
	    $sDownArrow = "<img src=\"quazLayout/DownMenu.gif\" style=\"float: right;\">";
	  else
	    $sDownArrow = "";
		
      if( $sSelectedMenu==$this->sText )
        echo "<li id=\"activemenu\" class=level" . $this->nDepth .  "> " . $sDownArrow . $this->sText . " </li>\n";
      else
	  {
        if( !($this->isShown( $sSelectedMenu )) )
          echo "<!--";	// Draw it as an html comment

		echo "<li                   class=level" . $this->nDepth .  " onclick=\"location.href='" . $this->sLink . ".php'\">" . $sDownArrow . $this->sText . "</li>";

        if( !($this->isShown( $sSelectedMenu )) )
          echo "-->";	// Draw it as an html comment
        echo "\n";
      }
	}
  }
}
function beginMenu()
{
  echo "<div id=\"menu\">\n<ul>\n";
  global $TheMenuItems;
  $TheMenuItems = array();
  $rootMenu = new MenuItem;
  $rootMenu->init(0,"NeverSeen", "NeverSeen");
  $TheMenuItems[0] = $rootMenu;
}
function endMenu($sSelectedMenu, $sHtmlToAppend="")
{
  analyzeMenus();
  global $TheMenuItems;
  foreach( $TheMenuItems as $key=>$value )
    if( $key != 0 )							// Root item is hidden
      $value->draw($sSelectedMenu);
  echo "</ul>\n";
	echo $sHtmlToAppend . "</div>\n";
}
function addMenuItem($nDepth, $sText, $sLink)
{
  global $TheMenuItems;
  $oMenuItem = new MenuItem;
  $oMenuItem->init($nDepth, $sText, $sLink);
  $TheMenuItems[] = $oMenuItem;
}
function analyzeMenus()
{
  // current parents as we loop through the menu items
  $nDepth0Parent = 0;		// root
  $nDepth1Parent = NULL;
  $nDepth2Parent = NULL;
  // $nDepthParent3 not needed as depth 3 menu items have no children

  global $TheMenuItems;
  foreach( $TheMenuItems as $key=>$value )
  {
    if( $key != 0 )	// Skip imaginary root menu item
	{
      // Note parents and chidren
      if( $value->nDepth == 1 )
	  {
        $TheMenuItems[$key]->nParent = $nDepth0Parent;			// Note the parent
		$TheMenuItems[$nDepth0Parent]->aAllChildren[] = $key;	// Add to list of parent's children
	  }
	  else if( $value->nDepth == 2 )
	  {
        $TheMenuItems[$key]->nParent = $nDepth1Parent;
		$TheMenuItems[$nDepth0Parent]->aAllChildren[] = $key;
		$TheMenuItems[$nDepth1Parent]->aAllChildren[] = $key;
	  }
	  else if( $value->nDepth == 3 )
	  {
        $TheMenuItems[$key]->nParent = $nDepth2Parent;
		$TheMenuItems[$nDepth0Parent]->aAllChildren[] = $key;
		$TheMenuItems[$nDepth1Parent]->aAllChildren[] = $key;
		$TheMenuItems[$nDepth2Parent]->aAllChildren[] = $key;
	  }

      // Keep track of current parents as we loop through
	  if( $value->nDepth == 1 )
	  	$nDepth1Parent = $key;		// This is the depth 1 parent until further notice
	  else if( $value->nDepth == 2 )
	    $nDepth2Parent = $key;		// This is the depth 2 parent until further notice	  
	}
  }
}
?>