<?php
#myMenu.php
# This file is specific to the particular website being created

require "quazLayout/quazGeneralMenu.php";

function drawMyMenu($sSelectedMenu)
{
  
  $s = $sSelectedMenu;
  
  beginMenu();
  
  // The first parameter to addMenuItem is the nesting depth, 1 being top-level
  // Second parameter appears on the menu
  // Third parameter is used to construct the html path to include for the page selected
  addMenuItem(1, "Home", "index" );
  addMenuItem(1, "Another Top Level", "SecondLevel" );
  addMenuItem(2, "Second Level", "SecondLevel" );
  addMenuItem(2, "Another Second Level", "AnotherSecondLevel" );
  addMenuItem(1, "Credits", "Credits" );
	// And then anys stuff under the menu
  $sAppend = "<h3>Add stuff under menu</h3>";
  
  endMenu($sSelectedMenu, $sAppend);
}
?>
