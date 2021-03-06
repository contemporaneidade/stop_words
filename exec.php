<?php

require "./functions/removeCommonWords.php";

$input	= "../punctuation/files/en/";
$output = "./files/en/";

$files 	= scandir($input);
for ($i = 2; $i < sizeof($files); ++$i) {
	$file = $input.$files[$i];
	$content = file_get_contents($file, "r");
	
	$removed_words = removeCommonWords(strtolower($content)); 	//eliminando as stop words
	
	$handle = fopen($output.$files[$i], 'w+');
	if ($handle) {
		fwrite($handle, $removed_words);
	}
	fclose($handle);
}

?>