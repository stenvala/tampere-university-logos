<?php

$dir = __DIR__ . '/../dist';
$files = glob($dir . '/logo*.tex');

foreach ($files as $key => $file){

	$file = preg_replace('#\.tex$#', '', $file);
	$img = preg_replace('#/\.\./dist#', '/../img', $file);
	$cmd = 'cd "' . $dir . '"; ../src/compile-logo.sh "' . $file . '" "' . $img .'"';
	print '---------------------' . PHP_EOL;
	print 'COMPILING ' . ($key + 1) . '/' . count($files) . PHP_EOL;
	print 'FILE ' . str_replace($dir . '/', '', $file) . '.tex' . PHP_EOL;
	print 'COMMAND ' . $cmd . PHP_EOL;		
	print shell_exec($cmd);	

}

$dir = __DIR__ . '/../img';
$files = glob($dir . '/logo*.*');
foreach ($files as $file){	
	if (preg_match('#(medium|small)\.(pdf|eps)$#', $file, $matches)){
		unlink($file);
	}	
}