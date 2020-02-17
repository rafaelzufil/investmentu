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
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $request_type = isset($_POST['request_type']) ? $_POST['request_type'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $website = isset($_POST['website']) ? $_POST['website'] : '';
    $redirect_url = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : '';
    // Setup form fields variables
    $form_url = 'https://oxfordclub.com/apps/agora-contact-form/';
    $form_fields['email'] = $email;
    $form_fields['first_name'] = $first_name;
    $form_fields['phone'] = $phone;
    $form_fields['request_type'] = $request_type;
    $form_fields['message'] = $message;
    $form_fields['website'] = $website;
    $form_fields['redirect_url'] = myUrlEncode($redirect_url);
    //build query string using $form_fields array
    $form_fields_query = http_build_query($form_fields);
    //open connection
    $ch = curl_init();
    $form_options = array(
        CURLOPT_URL => $form_url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $form_fields_query,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $form_options);
    //execute post
    $form_result = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //close connection
    curl_close($ch);
    $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    header("Content-type: application/json");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Origin: " . str_replace('.', '-', $domain_url) . ".cdn.ampproject.org");
    header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
    header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
    header("AMP-Redirect-To: " . $redirect_url);
    header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin");
    echo json_encode(array('http_code' => $http_code, 'result' => $form_result));
    http_response_code($http_code);
    exit;
}
