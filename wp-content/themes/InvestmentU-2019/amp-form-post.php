<?php
//Get the request data, assign to appropriate variables
function myUrlEncode($string) {
    $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
    $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
    return str_replace($entities, $replacements, urlencode($string));
}

if (!empty($_POST)) {
    $url = $_SERVER['SERVER_NAME'];
    header("access-control-allow-credentials:true");
    header("access-control-allow-headers:Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token");
    header("access-control-allow-methods:POST, GET, OPTIONS");
    header("access-control-allow-origin:".$_SERVER['HTTP_HOST']);
    header("access-control-allow-origin:".$url);
    header("access-control-expose-headers:AMP-Access-Control-Allow-Source-Origin");
    header("amp-access-control-allow-source-origin:https://".$_SERVER['HTTP_HOST']);
    header("amp-access-control-allow-source-origin:".$url);
    // header("Content-Type: application/json");
    $email = isset($_POST['signup_emailAddress']) ? $_POST['signup_emailAddress'] : '';
    $sourceId = isset($_POST['signup_sourceId']) ? $_POST['signup_sourceId'] : '';
    $listcode = isset($_POST['signup_listCode']) ? $_POST['signup_listCode'] : '';
    $redirecturl = isset($_POST['signup_redirectUrl']) ? $_POST['signup_redirectUrl'] : '';
    $welcomeEmailTemplateName = isset($_POST['signup_welcomeEmailTemplateName']) ? $_POST['signup_welcomeEmailTemplateName'] : '';
    // If $email isn't subscribed to the current list, continue with signup by posting field forms to signupapp
    // Setup signupapp form fields variables
    $sua_url = 'https://signupapp2.com/signupapp/signups/process';
    $sua_fields['signup.emailAddress'] = myUrlEncode($email);
    $sua_fields['signup.sourceId'] = myUrlEncode($sourceId);
    $sua_fields['signup.listCode'] = myUrlEncode($listcode);
    $sua_fields['signup.redirectUrl'] = myUrlEncode($redirecturl);
    $sua_fields['signup.welcomeEmailTemplateName'] = myUrlEncode($welcomeEmailTemplateName);
    //build query string using $sua_fields array
    $sua_fields_query = http_build_query($sua_fields);
    //open connection
    $ch = curl_init();
    $sua_options = array(
        CURLOPT_URL => $sua_url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $sua_fields_query
    );
    curl_setopt_array($ch, $sua_options);
    //execute post
    $sua_result = curl_exec($ch);
    //close connection
    curl_close($ch);
    echo $sua_result;
    header("AMP-Redirect-To: ".$redirecturl);
    header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin");
}
