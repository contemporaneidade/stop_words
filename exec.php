<?php

require "./functions/removeCommonWords.php";
require "./functions/removePunctuationMarks.php";

$input	= "../scielo/files/resumos/en/";
$output = "./files/en/";

$files 	= scandir($input);
for ($i = 2; $i < sizeof($files); ++$i) {
	$file = $input.$files[$i];
	$content = file_get_contents($file, "r");
	
	$removed_punctuation = removePunctuationMarks($content); 	//eliminando a pontuação
	$removed_words = removeCommonWords(strtolower($content)); 	//eliminando as stop words
	
	$handle = fopen($output.$files[$i], 'w+');
	if ($handle) {
		fwrite($handle, $removed_words);
	}
	fclose($handle);
}

?>