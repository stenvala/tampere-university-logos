<?php

// php script-single.php logo
// php script-single.php slogan
// php script-single.php face

// cd ../temp; ../src/compile-logo.sh logo logo; open logo.pdf; cd ../src
// cd ../temp; ../src/compile-slogan.sh slogan slogan; open slogan.pdf; cd ../src
// cd ../temp; ../src/compile-logo.sh face face; open face.pdf; cd ../src


require __DIR__ . '/help.php';

$item = $argv[1];

$file = __DIR__ . '/' . $item . '.tex';

if (!is_dir(__DIR__ . '/../temp')){
	mkdir(__DIR__ . '/../temp');
}

$c = file_get_contents($file);

$combinations = array('en','purple', 'en-one-line');

$sizes = array('large' => 1);

$createTex = function ($options, $variables, $filename) use ($c) {
	foreach ($options as $option){
		$c = preg_Replace('#%option:\s([a-z\-]*\|)*' . $option . '(\|[a-z\-]*)*%\s*#', '', $c);
	} 
	foreach ($variables as $key => $value){
		$c = preg_Replace('#%variable:\s' . $key . '%#', $value, $c);		
	}
	file_put_contents(__DIR__ . '/../temp/' . $filename . '.tex', $c);
};
		
$createTex($combinations, array('scalebox' => 1), $item);		






