
<?php

error_reporting(E_ALL);

date_default_timezone_set('Europe/Istanbul');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use \Firebase\JWT\JWT;

class ValidateToken{

    public function validation($data){
        
        
        $key = 'pixorion_admin';
        $iss = 'http://192.168.1.38';
        $aud = 'http://192.168.1.38:3000';
        $iat = 1356999524;
        $nbf = 1357000000;

        $jwt = isset($data->jwt) ? $data->jwt : "";

        if($jwt){
            try{
                
                $decoded = JWT::decode($jwt, $key, array('HS256'));
                http_response_code(200);

                return json_encode([
                    'statu' => TRUE,
                    'data' => $decoded->data
                ]);

            }catch(Exception $e){
                http_response_code(401);

                echo json_encode([
                    'statu' => FALSE,
                    'error' => $e->getMessage() 
                ]);
            }
        }else{
            http_response_code(401);
            echo json_encode([
                'statu' => FALSE
            ]);
        }
    }

}
