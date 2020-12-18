

<?php

error_reporting(E_ALL);

date_default_timezone_set('Europe/Istanbul');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use \Firebase\JWT\JWT;

class CategoryController extends Controller{
    
    /**
     * Main Categories
     */

    public function mainStore(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $data->name = htmlspecialchars(strip_tags($data->name));
            
            $category = new Category();
            $result = $category->mainInsert($data->name);

            if($result['STATE'] == TRUE){
                if($result['LIMIT'] == TRUE){

                    http_response_code(200);

                    echo json_encode(array(
                        'success' => TRUE,
                        'auth' => TRUE,
                        'limit' => TRUE,
                        'data' => $result['DATA']
                    ));
                }
            }else if($result['STATE'] == FALSE && $result['LIMIT'] == FALSE){
                
                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE,
                    'auth' => TRUE,
                    'limit' => FALSE
                ));
            }
        }else{
            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function mainList(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $category = new Category();
            $result = $category->selectAll();

            if($result['STATE'] == TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'data' => $result['DATA'] 
                ));
            }else{
                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE,
                    'data' => array()
                ));
            }
        }else{
            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }

    }

    public function getMain(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $data->id = htmlspecialchars(strip_tags($data->id));

            $category = new Category();
            $result = $category->mainFetch($data->id);

            if($result['STATE'] == TRUE){
                http_response_code(200);

                echo json_encode(array(
                    'success'   => TRUE,
                    'data'      => $result['DATA']
                ));
            }else{
                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE,
                    'data' => array()
                ));
            }
        }else{
            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function remove(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $data->id = htmlspecialchars(strip_tags($data->id));

            $category = new Category();
            $result = $category->mainDelete($data->id);

            if($result['STATE'] == TRUE){
                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE
                ));
            }else{
                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE
                ));
            }
        }else{
            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function mainPut(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $data->id = htmlspecialchars(strip_tags($data->id));
            $data->name = htmlspecialchars(strip_tags($data->name));

            $category = new Category();
            $result = $category->mainUpdate($data->id, $data->name);

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

    public function mainPicturePut(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $data->id       = htmlspecialchars(strip_tags($data->id));
            $data->picture  = htmlspecialchars(strip_tags($data->picture));

            $category = new Category();
            $result = $category->mainPictureUpdate($data->id, $data->picture);

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


    /**
     * Sub Categories
     */
    
    public function subGet(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $data->value = htmlspecialchars(strip_tags($data->value));
            
            $category = new Category();
            $result = $category->selectSub($data->value);

            if($result['STATE'] == TRUE){
                http_response_code(200);

                echo json_encode(array(
                    'success'   => TRUE,
                    'data'      => $result['DATA'],
                    'auth'      => TRUE
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

    public function subGetSub(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $data->value = htmlspecialchars(strip_tags($data->value));
            
            $category = new Category();
            $result = $category->selectSubSub($data->value);

            if($result['STATE'] == TRUE){
                http_response_code(200);

                echo json_encode(array(
                    'success'   => TRUE,
                    'data'      => $result['DATA'],
                    'auth'      => TRUE
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

    public function subStore(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            
            $category = new Category();

            $requestData = $data->data;
            $newCategory = $data->newCategory;
            
            if($requestData->Type == 'sub'){
                $result = $category->subInsert($newCategory, $requestData);
            }else if($requestData->Type == 'subsub'){
                $result = $category->subSubInsert($newCategory, $requestData);
            }

            if($result['STATE']){
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
            http_response_code(200);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }
    
    public function subInfo(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $data->type = htmlspecialchars(strip_tags($data->type));
            $data->mainValue = htmlspecialchars(strip_tags($data->mainValue));
            $data->subValue = htmlspecialchars(strip_tags($data->subValue));




            $category = new Category();
            
            if($data->type == 'sub'){
                $result = $category->whereInfoMain($data->mainValue);
            }else if($data->type == 'subsub'){
                $result = $category->whereInfoSub($data->subValue);
            }

            if($result['STATE'] == TRUE){
                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'data' => $result['DATA'],
                    'auth' => TRUE,
                    'type' => $data->type
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
            $data->value = htmlspecialchars(strip_tags($data->value));

            $category = new Category();
            $result = $category->subDelete($data->value);
            
            if($result['STATE'] == TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'auth' => TRUE
                ));
            }else{
                
                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE
                ));
            }
        }else{

            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function subDestroy(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $category = new Category();
            $result = $category->subSubDelete($data->value);

            if($result['STATE'] == TRUE){

                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'auth' => TRUE
                ));
            }else{
                
                http_response_code(200);

                echo json_encode(array(
                    'success' => FALSE
                ));
            }
        }else{

            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function subWhere(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $category = new Category();
            $result = $category->whereInfoSub($data->value);

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

    public function subPut(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $category = new Category();
            $result = $category->subUpdate($data);

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

    public function subSubWhere(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $category = new Category();
            $result = $category->subSubFetch($data->value);

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

            http_response_code(200);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    /**
     * SubSub Category
     */

    public function subSubPut(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $category = new Category();

            $result = $category->subSubUpdate($data);

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
                    'auth' => FALSE
                ));
            }
        }else{
            
            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    /**
     * GET ALL MENU
     */

    public function allMenu(){

        $data = json_decode(file_get_contents('php://input'));

        $category = new Category();
        $result = $category->fetchAllMenu();

        if($result['STATE'] == TRUE){
            
            http_response_code(200);

            echo json_encode(array(
                'success' => TRUE,
                'data' => $result['DATA']
            ));
        }else{

            http_response_code(200);

            echo json_encode(array(
                'success' => TRUE,
                'data' => array()
            ));
        }
    }
}