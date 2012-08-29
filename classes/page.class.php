<?php
require_once 'html.class.php';

class page
{
	private $html;
	function __construct()
	{	
		$this->html = new html;		
	}

	function head()
	{
		$retStr = NULL;
		$retStr = $this->html->doctype();
		$retStr .= $this->html->tag('head',$meta.$style);
		// $retStr .= $this->html->meta();
		return $retStr;
	}

	function __destruct()
	{
		
	}
}
?>