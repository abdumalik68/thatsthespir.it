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