

<?php

error_reporting(E_ALL);

date_default_timezone_set('Europe/Istanbul');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

/**
 * Home operations
 */


class HomeController extends Controller{

    public function sliderFetch(){
        
        $slider = new Slider();
        $result = $slider->fetchAll();

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
    }

    public function categoriesAllFetch(){

        $categories = new Category();
        $result = $categories->selectAll();

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

    }
}