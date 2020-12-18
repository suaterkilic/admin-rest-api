


<?php

error_reporting(E_ALL);

date_default_timezone_set('Europe/Istanbul');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use \Firebase\JWT\JWT;

class SliderController extends Controller{

    public function store(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            
            $slider = new Slider();
            $result = $slider->insert($data);

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

    public function imagePut(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            
            $slider = new Slider();
            $result = $slider->imageUpdate($data);

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

    public function all(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $slider = new Slider();
            $result = $slider->fetchAll();
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

    public function destroy(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $slider = new Slider();
            $result = $slider->delete($data->id);
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


    public function sliderPut(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $slider = new Slider();
            $result = $slider->update($data);
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

    public function where(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $slider = new Slider();
            $result = $slider->fetchWhere($data->id);
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
}