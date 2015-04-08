<?php

/*
 HELPER FUNCTIONS
*/

function display_error($errors, $input){
	if ( ($_REQUEST || $_FILES) && isset($errors[$input]) ){
		$message = '<ul class="errors">';
		if(is_array($errors[$input])){
			$message = implode('<li>', $errors[$input]);
		}else{
			$message.='<li>'.$errors[$input];
		}
		return $message.'</li></ul>';
	}
}


/*
Create an excerpt
source: http://www.internoetics.com/2010/01/04/php-function-to-truncate-text-into-a-preview-or-excerpt-with-trailing-dots/
*/
function truncate($text, $numb=200) {
	if (strlen($text) > $numb) {
		$text = substr($text, 0, $numb);
		$text = substr($text, 0, strrpos($text, " "));
		$etc = " ...";
		$text = $text.$etc;
	}
	return $text;
}