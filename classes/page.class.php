<?php
require_once 'html.class.php';

class page extends html
{
	function __construct($title = NULL)
	{	
		parent::__construct();
		include 'includes/pretitle.inc.php';
		echo '<title>'.$title.'</title>';
		include 'includes/meta.inc.php';
		include 'includes/styles.inc.php';
		include 'includes/resets.inc.php';		
		include 'includes/icons.inc.php';
		include 'includes/scripts.inc.php';
		include 'includes/endheadbodystart.inc.php';
		include 'includes/navigation.inc.php';
		echo '<div class="container">';
		include 'includes/banner.inc.php';		
	}	

	function end()
	{
		include 'includes/footer.inc.php';
		echo '</div>';		
		include 'includes/jquery.inc.php';
		include 'includes/pageend.inc.php';
	}
}
?>