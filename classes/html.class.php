<?php
class html
{
	private $noWrap;
	private $tagParams;
	private $contentString;
	private $outputString;
	function __construct()
	{
		$this->noWrap = array('br','hr','img', 'meta');
		$this->tagParams = array();
		$this->contentString = '';
		$this->outputString = '';
	}

	function tag($type, $paramArr = array(), $content = '')
	{
		$this->outputString = '<';
		$this->outputString .= $type;
		if(in_array($type,$this->noWrap))
		{
			$this->outputString .= ' /';
		}

		$this->tagParams = $paramArr;
		$this->contentString = $content;
		$this->handleArguments();
				
		if(!in_array($type,$this->noWrap))
		{
			$this->outputString .= '</'.$type.'>';
		}
		return $this->outputString.PHP_EOL;
	}	

	function hr()
	{
		return $this->tag('hr').PHP_EOL;
	}

	function br()
	{
		return $this->tag('br').PHP_EOL;
	}

	function img($src, $alt = NULL)
	{
		$arr = array('src'=>$src, 'alt'=>$alt);
		return $this->tag('img',$arr).PHP_EOL;
	}

	private function handleArguments()
	{
		if(is_array($this->tagParams))
		{
			$this->handleParmeterArguments();
		}
		else
		{
			$this->contentString = $this->tagParams;
			$this->handleContent();
		}		
	}

	private function handleParmeterArguments()
	{
		foreach ($this->tagParams as $key => $value)
		{
			$this->outputString .= ' '.$key.'="'.$value.'"';
		}
		$this->outputString .= '>'.$this->contentString;		
	}

	private function handleContent()
	{
		$this->outputString .= '>'.$this->contentString;		
	}
}
?>