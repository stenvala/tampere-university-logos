<?php


// recursively form all option lists
function createOptionLists($tree){
	$array = array();
	foreach ($tree as $key => $value){				
		if (count($value) > 0){
			$lists = createOptionLists($value);			
			foreach ($lists as $list){
				$opts = array_merge(array($key), $list);
				array_push($array, $opts);
			}					
		} else {
			array_push($array, array($key));
		}
		
	}	
	return $array;
}

function createOptionTree($array, $index = 0){
	$trees = array();
	if ($index < count($array)){
		foreach ($array[$index] as $val){
			$trees[$val] = createOptionTree($array, $index + 1);
		}
	}
	return $trees;
}

