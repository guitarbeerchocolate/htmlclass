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

	function doctype()
	{
		return '<!DOCTYPE html>'.PHP_EOL;
	}

	function meta($description = NULL, $keywords = NULL)
	{
		$fullMetaJacket = '';
		$arr = Array
		(
			'name'=>'viewport',
			'content'=>'width=device-width, initial-scale=1.0'
		);
		$fullMetaJacket .= $this->tag('meta', $arr);
		$arr = Array
		(
			'name'=>'apple-mobile-web-app-capable',
			'content'=>'yes'
		);
		$fullMetaJacket .= $this->tag('meta', $arr);		
		$arr = Array
		(
			'name'=>'description',
			'content'=>$description
		);
		$fullMetaJacket .= $this->tag('meta', $arr);
		$arr = Array
		(
			'name'=>'keywords',
			'content'=>$keywords
		);
		$fullMetaJacket .= $this->tag('meta', $arr);
		return $fullMetaJacket;
	}

	function style($ss)
	{
		return $this->tag('style', $ss);
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

	function form()
	{
		$arr = Array('type'=>'submit', 'class'=>'btn');
		$form = $this->tag('button',$arr,'Submit');
		return $this->tag('form',$form).PHP_EOL;
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