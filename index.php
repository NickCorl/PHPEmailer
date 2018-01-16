<?php 
echo " \n\n\n\n ******************** START ************************ \n\n\n\n";

// Corrects the email format to make it readable and consistent.
// Reduces all characters to lowercase.
// Adds period if top-level domain is missing.
function fixEmail($arr){
	foreach($arr as $email){
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = substr_replace($email, '.' , -3, 0);
			//echo $email;
		}
		$email = strtolower($email);
		$array[] = $email;
		//print_r("**************TESTING*************\n");
		//print_r($array); 
	}
	return $array;
}

//Checks if emails have similar characters based on percentage of similarity in this case 97%
function compares($sub, $unSub){

	similar_text($unSub, $sub, $percent);

	if($percent < 97){
		return 1;
	}
	else {
		return 0;	
	}
}
// Loads data from files into arrays
$subscribe = file("subscribers.txt",FILE_IGNORE_NEW_LINES);
$unsubscribe = file("unsubscribed.txt",FILE_IGNORE_NEW_LINES);
$bounce = file("bounced.txt",FILE_IGNORE_NEW_LINES);

//Fixing high level domains if needed and makeing all string lowercase
$subscribe = fixEmail($subscribe); 
$blockedMerge=fixEmail($blockedMerge);

//Merge both lists used to remove subscribers
$blockedMerge = array_merge( $unsubscribe,$bounce);

// Returns the emails not in $blockMerge, array_diff was also added to further filter unwanted emails on the next line.
$resultFinal = array_udiff($subscribe, $blockedMerge, "compares");
print_r(array_diff($resultFinal, $blockedMerge));
