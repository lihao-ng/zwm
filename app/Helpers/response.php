<?php

if (!function_exists('unauthorized_request')) {
	function unauthorized_request($message = null, $status_code = 401){
		$message = $message ?? "You don't have authorization to access this resource.";
	  return api_respond($message, $status_code);
	}
}

if (!function_exists('forbidden_request')) {
	function forbidden_request($message = null, $status_code = 403){
		$message = $message ?? "You don't have permission to access this resource.";
	  return api_respond($message, $status_code);
	}
}

if (!function_exists('bad_request')) {
	function bad_request($message = null, $status_code = 400){
		$message = $message ?? "Something does not look right with this request, please try again later.";
	  return api_respond($message, $status_code);
	}
}

if (!function_exists('validation_error')) {
  function validation_error($message = null, $status_code = 422){
		$message = $message ?? "Something does not look right with this request, make sure check your data.";
    return api_respond($message, $status_code);
  }
}

if (!function_exists('server_error')) {
  function server_error($message = null, $status_code = 500){
		$message = $message ?? "Something went wrong on our side, please try again later or contact support.";
    return api_respond($message, $status_code);
  }
}

if (!function_exists('not_found')) {
  function not_found($message = ["message" => "Not Found"], $status_code = 404){
		$message = $message ?? "The resource you are looking for could not be found.";
    return api_respond($message, $status_code);
  }
}


if (!function_exists('success')) {
  function success($message = null, $status_code = 200){
		$message = $message ?? "OK";
    return api_respond($message, $status_code);
  }
}


if (!function_exists('created')) {
  function created($message = null, $status_code = 201){
		$message = $message ?? "Accepted!";
    return api_respond($message, $status_code);
  }
}


if (!function_exists('respond')) {
  function respond($data, $status_code = 200, $headers = []){
    return response()->json($data, $status_code, $headers);
  }
}

if (!function_exists('api_respond')) {
  function api_respond($data, $status_code = 200, $headers = []){
    $data = ["message" => $data];

    return response()->json($data, $status_code, $headers);
  }
}