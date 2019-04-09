<?php

require __DIR__ . '/help.php';

$file = __DIR__ . '/face.tex';

$c = file_get_contents($file);

$options = array(	
	array('purple', 'inverted-with-bg', 'inverted')	// select one here
	);


// solve all option combinations
$combinations = createOptionLists(createOptionTree($options));

$sizes = array('large' => 1, 'medium' => 0.5, 'small' => 0.2);

$createTex = function ($options, $variables, $filename) use ($c) {
	foreach ($options as $option){
		$c = preg_Replace('#%option:\s([a-z\-]*\|)*' . $option . '(\|[a-z\-]*)*%\s*#', '', $c);
	} 
	foreach ($variables as $key => $value){
		$c = preg_Replace('#%variable:\s' . $key . '%#', $value, $c);		
	}
	file_put_contents(__DIR__ . '/../dist/' . $filename . '.tex', $c);
};

foreach ($sizes as $key => $value){
	// do compilation here
	foreach ($combinations as $opts){
		$filename = 'face-' . implode($opts, '-') . '-' . $key;		
		$createTex($opts, array('scalebox' => $value), $filename);		
	}
}
