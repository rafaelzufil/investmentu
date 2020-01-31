<?php

/*
*
*	Use CARL to check the subscription status of subscribers and respond accordingly
*
*/

//Get the request data, assign to appropriate variables

function myUrlEncode($string) {
    $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
    $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
    return str_replace($entities, $replacements, urlencode($string));
}


if(empty($_REQUEST)) {
	http_response_code(400);
	echo "No data received";
	exit();
}

if(!empty($_GET['email'])) {
	// $email = htmlspecialchars($_REQUEST['e']);
	$email = myUrlEncode($_GET['email']);
} else {
	http_response_code(400);
	echo "No email received";
	exit();
}

if(!empty($_GET['source'])) {
	// $email = htmlspecialchars($_REQUEST['e']);
	$source = $_GET['source'];
} else {
	http_response_code(400);
	echo "No source received";
	exit();
}

if(!empty($_GET['list'])) {
	// $email = htmlspecialchars($_REQUEST['e']);
	$list = $_GET['list'];
} else {
	http_response_code(400);
	echo "No list received";
	exit();
}

if(!empty($_GET['welcome'])) {
	// $email = htmlspecialchars($_REQUEST['e']);
	$welcome = $_GET['welcome'];
} else {
	http_response_code(400);
	echo "No email received";
	exit();
}

$sua_fields = array(
  'signup.emailAddress'=>$email,
	'signup.listCode'=>$list,
	'signup.sourceId'=>$source,
	'signup.welcomeEmailTemplateName'=>$welcome,
);

//Email validation regex pattern

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     http_response_code(400);
     echo "Invalid email format";
     exit();
}

//THIS PATTERN THROWS ERRORS UNECESSARILY
//$pattern = '/^([\w-\.\+]+@([\w-]+\.)+[\w-]{2,4})?$/';
/*$pattern = '/^([\w-\.\+]+(.[_aA-zZ0-9-\+]+)+@([\w-]+\.)+[\w-]{2,4})?$/';

$valid = preg_match($pattern, $email);

if ($valid === 0) {
	http_response_code(400);
	echo "Invalid email format";
	exit();
}*/

/**
 * Check email address against CARL to prevent duplicate signups
 */

//Check CARL with posted email address for active subscriptions

$carl_url = "https://carl.pubsvs.com/listsByEmail/09/$email";

//open connection
$ch = curl_init();

//Set cURL options to return the response instead of outputing it
$carl_options = array(
	CURLOPT_URL => $carl_url,
	CURLOPT_RETURNTRANSFER => true
);

curl_setopt_array($ch, $carl_options);

//execute cURL GET, store result in varialble
$carl_result = curl_exec($ch);

//close connection
curl_close($ch);

if (strpos($carl_result, $list) !== false) {

	//If $email is already subscribed to the current list, output "duplicate" as the response

	//http_response_code(409);
	echo '"duplicate"';
	exit();

} else {

	//If $email isn't subscribed to the current list, continue with signup by posting field forms to signupapp

	//setup signupapp form fields variables
  $sua_url = 'https://signupapp2.com/signupapp/signups/process';

	//build query string using $sua_fields array
	$sua_fields_query = http_build_query($sua_fields);

	//open connection
	$ch = curl_init();

	$sua_options = array(
		CURLOPT_URL => $sua_url,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $sua_fields_query,
		CURLOPT_RETURNTRANSFER => true
	);

	curl_setopt_array($ch, $sua_options);

	//execute post
	$sua_result = curl_exec($ch);

	//close connection
	curl_close($ch);

  if ($sua_result === '') {
    echo '"success"';
  } else {
    echo $sua_result;
  }


}



?>
