<?php 
function readDirs()
{
	$ignore = array('.', '..','.htaccess','cache.manifest.php');
	$di = new RecursiveDirectoryIterator('.');
	foreach (new RecursiveIteratorIterator($di) as $filename => $file)
	{
		$filename = substr(str_replace('\\','/',$filename), 2);
		if(!in_array($filename, $ignore) && !(substr($filename, -1) == '~'))
		{
			echo $filename.PHP_EOL;
		}
	}
}
?>
CACHE MANIFEST
<?php
echo PHP_EOL;
readDirs();
?>
