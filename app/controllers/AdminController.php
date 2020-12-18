

<?php

error_reporting(E_ALL);

date_default_timezone_set('Europe/Istanbul');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use \Firebase\JWT\JWT;

class AdminController extends Controller{

    public function adminLogin(){

        $data = json_decode(file_get_contents('php://input'));

        $login = new Admin();
        $adminData = $login->adminUsernameExist($data->username);
        
        if(is_array($adminData) && md5($data->password) == $adminData['Password']){

            $key = 'pixorion_admin';
            $iss = 'http://192.168.1.38';
            $aud = 'http://192.168.1.38:3000';
            $iat = 1356999524;
            $nbf = 1357000000;
    
            $token = [
                'iss' => $iss,
                'aud' => $aud,
                'iat' => $iat,
                'nbf' => $nbf,
                'data' => [
                    'id'                => $adminData['Id'],
                    'name'              => $adminData['Name'],
                    'surname'           => $adminData['Surname'],
                    'username'          => $adminData['Username'],
                    'profile_picture'   => $adminData['ProfilePicture'],
                    'authority'         => $adminData['Authority']
                ]
            ];

            $jwt = JWT::encode($token, $key);

            http_response_code(200);

            echo json_encode(array(
                'success' => TRUE,
                'jwt' => $jwt
            ));
        }else{
            http_response_code(200);

            echo json_encode(array(
                'success' => FALSE
            ));
        }
    }

    public function store(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $data->name         = htmlspecialchars(strip_tags($data->name));
            $data->surname      = htmlspecialchars(strip_tags($data->surname));
            $data->username     = htmlspecialchars(strip_tags($data->username));
            $data->authority    = htmlspecialchars(strip_tags($data->authority));
            $data->password     = htmlspecialchars(strip_tags($data->password));
            

            $admin = new Admin();
            $existCheck = $admin->adminUsernameExist($data->username);

            if($existCheck == FALSE){
                // Eğer kayıt yoksa ve eklendiyse
                $result = $admin->insert($data);
                
                if($result['STATE'] == TRUE){

                    http_response_code(200);
            
                    echo json_encode(array(
                        'success'       => TRUE,
                        'is_data'       => TRUE,
                        'user_exist'    => FALSE,
                        'auth'          => TRUE,
                        'data'          => $result['USER_DATA']
                    )); // Eğer kayıt yoksa ve eklenemediyse
                }

            }else{// Eğer kayıt varsa ve eklenemediyse
                http_response_code(200);

                echo json_encode(array(
                    'success'       => FALSE,
                    'error'         => TRUE,
                    'user_exist'    => TRUE
                ));
            }

        }else{
            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function pictureUpdate(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){

            $data->id = htmlspecialchars(strip_tags($data->id));
            $data->picture = htmlspecialchars(strip_tags($data->picture));

            $admin = new Admin();
            $exist = $admin->adminExist($data->id);

            if($exist){
                $result = $admin->pictureUpdate($data);

                if($result == TRUE){
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

    public function fetch(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $admin = new Admin();
            $result = $admin->select();

            if($result['STATE'] == TRUE){
                http_response_code(200);

                echo json_encode(array(
                    'success'   => TRUE,
                    'data'      => $result['USER_LIST'],
                    'auth'      => TRUE
                ));
            }else{
                http_response_code(200);
                
                echo json_encode(array(
                    'success'   => FALSE,
                    'data'      => array(),
                    'auth'      => TRUE
                ));
            }
        }else{
            http_response_code(401);

            echo json_encode(array(
                'auth' => FALSE
            ));
        }
    }

    public function getAdmin(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $data->id = htmlspecialchars(strip_tags($data->id));

            $admin = new Admin();
            $result = $admin->where($data->id);

            if($result['STATE'] == TRUE){
                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'data' => $result['USER_DATA'],
                    'auth' => TRUE
                ));
            }else{
                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
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

    public function remove(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
                $data->id = htmlspecialchars(strip_tags($data->id));

                $admin = new Admin();
                $result = $admin->delete($data->id);

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

    public function put(){
        $data = json_decode(file_get_contents('php://input'));

        $validate = new ValidateToken();
        $validateResult = $validate->validation($data);

        $validateDecode = json_decode($validateResult, TRUE);
        
        if($validateDecode['statu']){
            $data->name         = htmlspecialchars(strip_tags($data->name));
            $data->surname      = htmlspecialchars(strip_tags($data->surname));
            $data->username     = htmlspecialchars(strip_tags($data->username));
            $data->authority    = htmlspecialchars(strip_tags($data->authority));
            $data->password     = htmlspecialchars(strip_tags($data->password));

            $admin = new Admin();
            $result = $admin->update($data);

            if($result['STATE'] == TRUE){
                http_response_code(200);

                echo json_encode(array(
                    'success' => TRUE,
                    'data' => $result['USER_DATA'],
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