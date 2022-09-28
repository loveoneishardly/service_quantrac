<?php

function generate_jwt($headers, $payload, $secret = '0b7e367fb674d93b0681eeb663987782') {
	$headers_encoded = base64url_encode(json_encode($headers));
	$payload_encoded = base64url_encode(json_encode($payload));
	$signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
	$signature_encoded = base64url_encode($signature);
	$jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
	return $jwt;
}

function is_jwt_valid($jwt, $secret = '0b7e367fb674d93b0681eeb663987782') {
	$tokenParts = explode('.', $jwt);
	$header = base64_decode($tokenParts[0]);
	$payload = base64_decode($tokenParts[1]);
	$signature_provided = $tokenParts[2];
	$expiration = json_decode($payload)->exp;
	$is_token_expired = ($expiration - time()) < 0;
	$base64_url_header = base64url_encode($header);
	$base64_url_payload = base64url_encode($payload);
	$signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
	$base64_url_signature = base64url_encode($signature);
	$is_signature_valid = ($base64_url_signature === $signature_provided);
	if ($is_token_expired || !$is_signature_valid) {
		return FALSE;
	} else {
		return TRUE;
	}
}

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function get_authorization_header(){
	$headers = null;
	if (isset($_SERVER['Authorization'])) {
		$headers = trim($_SERVER["Authorization"]);
	} else if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
		$headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
	} else if (function_exists('apache_request_headers')) {
		$requestHeaders = apache_request_headers();
		$requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
		if (isset($requestHeaders['Authorization'])) {
			$headers = trim($requestHeaders['Authorization']);
		}
	}
	
	return $headers;
}

function get_bearer_token() {
    $headers = get_authorization_header();
    if (!empty($headers)) {
        if (preg_match('/VNPTSTG\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}