<?php

function json_response_format($success, $error_db, $error_password, $error_money, $error_email) {
    $response = json_encode(array(
                    'success' => $success,
                    'error' => array(
                        'db' => $error_db,
                        'password' => $error_password,
                        'money' => $error_money,
                        'email' => $error_email,
                    ),
                ));

    return $response;
}
