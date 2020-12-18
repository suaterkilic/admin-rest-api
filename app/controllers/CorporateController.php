

<?php

error_reporting(E_ALL);

date_default_timezone_set('Europe/Istanbul');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use \Firebase\JWT\JWT;


class CorporateController extends Controller{

    public function getAbout(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $corporate = new Corporate();
            $result = $corporate->aboutFetch();

            
            if($result['STATE'] == TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'data' => $result['DATA'],
                    'auth' => TRUE
                ));
            }else{

                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE,
                    'data' => array(),
                    'auth' => TRUE
                ));
            }
        }else{

            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function putAbout(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){


            $corporate = new Corporate();
            $result = $corporate->aboutUpdate($data);

            
            if($result['STATE'] == TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'auth' => TRUE
                ));
            }else{

                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE,
                    'auth' => TRUE
                ));
            }
        }else{

            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function getOrderInfo(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $corporate = new Corporate();
            $result = $corporate->orderInfoFetch();

            
            if($result['STATE'] == TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'data' => $result['DATA'],
                    'auth' => TRUE
                ));
            }else{

                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE,
                    'data' => array(),
                    'auth' => TRUE
                ));
            }
        }else{

            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function putOrderInfo(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){


            $corporate = new Corporate();
            $result = $corporate->orderInfoUpdate($data);

            
            if($result['STATE'] == TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'auth' => TRUE
                ));
            }else{

                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE,
                    'auth' => TRUE
                ));
            }
        }else{

            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function getContact(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $corporate = new Corporate();
            $result = $corporate->contactFetch();

            
            if($result['STATE'] == TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'data' => $result['DATA'],
                    'auth' => TRUE
                ));
            }else{

                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE,
                    'data' => array(),
                    'auth' => TRUE
                ));
            }
        }else{

            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function putContact(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){


            $corporate = new Corporate();
            $result = $corporate->contactUpdate($data);

            
            if($result['STATE'] == TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'auth' => TRUE
                ));
            }else{

                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE,
                    'auth' => TRUE
                ));
            }
        }else{

            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }
}