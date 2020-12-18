


<?php

error_reporting(E_ALL);

date_default_timezone_set('Europe/Istanbul');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use \Firebase\JWT\JWT;

class ProductController extends Controller{

    public function store(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $product = new Product();
            $result = $product->insert($data);

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

    public function coverPut(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $product = new Product();
            $result = $product->coverUpdate($data);

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
        }else {
            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function storeImageList(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            
            $product = new Product();
            $result = $product->imagesInsert($data);

            if($result['STATE'] === TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'auth' => TRUE
                ));
            }else {
                
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

    public function fetchWhereList(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $product = new Product();
            $result = $product->whereList($data->id);

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
            
            $product = new Product();
            $result = $product->delete($data->id);

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

    public function fetchWhere(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            
            $product = new Product();
            $result = $product->where($data->value);

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
        }else {

            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function imageListDestroy(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            
            $product = new Product();
            $result = $product->imagesDelete($data->id);

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

    public function productPut(){

        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            
            $product = new Product();
            $result = $product->update($data);

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