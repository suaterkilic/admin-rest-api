

<?php

class Product extends Model{

    public $table = 'tbl_products';
    public $tableImg = 'tbl_product_images';
    public $subSubTable = 'tbl_sub_sub_categories';

    public function insert($data){
        $conn = $this->Connect();

        $query = "INSERT INTO " . $this->table . " 
            (ProductName, ProductDescription, ProductNormalPrice, ProductDiscountPrice, ProductFeatures,
            ParentCategoryId, SubCategoryId, SubSubCategoryId, ProductSize, ProductColor, ProductVariationId) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $impVariations = implode(',', $data->variations);

        $insert = $conn->prepare($query);
        $result = $insert->execute(array(
            $data->productName,
            $data->productDescription,
            $data->productNormalPrice,
            $data->productDiscountPrice,
            $data->productFeautures,
            $data->parentCategory,
            $data->subCategory,
            $data->subSubCategory,
            $impVariations,
            $data->color,
            $data->variationGroupValue
        ));

        $isRecord = "SELECT * FROM " . $this->table . " WHERE ProductName = '".$data->productName."' 
            AND ParentCategoryId = '".$data->parentCategory."'"; 
            
        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            $get = $select->fetch(PDO::FETCH_ASSOC);
            try {
                if($result && isset($get)){
                    return [
                        'STATE' => TRUE,
                        'DATA' => $get
                    ];
                }
            } catch (Exception $e) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }

    }

    public function coverUpdate($data){

        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->table . " WHERE Id = " . $data->id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){

            $query = "UPDATE " . $this->table . " SET ProductCoverPhoto = ? WHERE Id = ?";
            
            $update = $conn->prepare($query);
            $result = $update->execute(array(
                $data->picture,
                $data->id
            ));

            try {
                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            } catch (Exception $e) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }   
    }

    public function imagesInsert($data){

        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->table . " WHERE Id = " . $data->id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            
            $query = "INSERT INTO " . $this->tableImg . " (Image, ProductId) VALUES (?, ?)";

            $insert = $conn->prepare($query);
            $result = $insert->execute(array(
                $data->url,
                $data->id
            ));

            try {
                if($result){
                    return [
                        'STATE' => TRUE  
                    ];
                }
            } catch (Exception $e) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }
    }

    public function whereList($id){

        $conn = $this->Connect();

        $list = [];


        $query = "SELECT " . $this->table . ".Id, " .
        $this->table . '.ProductName, '. $this->table . '.SubSubCategoryId, ' . $this->table . '.ProductDescription, ' .
        $this->table . '.ProductNormalPrice, ' . $this->table . '.ProductCoverPhoto, ' . 
        $this->subSubTable . '.Name FROM ' . $this->subSubTable .
        ' INNER JOIN ' . $this->table . ' ON ' . $this->subSubTable . '.Id = ' . $this->table . 
        '.SubSubCategoryId WHERE SubSubCategoryId = ' . $id;



        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            while($get = $select->fetch(PDO::FETCH_ASSOC)){
                $list[] = $get;
            }

            try {
                if(isset($list)){
                    return [
                        'STATE' => TRUE,
                        'DATA' => $list
                    ];
                }
            } catch (Exception $e) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }
    }

    public function delete($id){
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->table . " WHERE Id = " . $id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){

            $query = "DELETE FROM " . $this->table . " WHERE Id = " . $id;

            $delete = $conn->prepare($query);
            $result = $delete->execute();

            try{
                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            }catch(Exception $e){
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }
    }

    public function where($id){
        
        $conn = $this->Connect();

        $subSubList = [];
        $variationList = [];
        $imageList = [];

        $query = "SELECT * FROM " . $this->table . " WHERE Id = " . $id;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            
            $get = $select->fetch(PDO::FETCH_ASSOC);

            $category = new Category();
            $parentList = $category->selectAll()['DATA'];
            $subList = $category->selectSub($get['ParentCategoryId'])['DATA'];
            $subSubResult = $category->subSubFromSub($get['SubCategoryId']);
            
            $variation = new Variations();
            $variationList = $variation->whereSingle($get['ProductVariationId']); 

            $sizeCheck = explode(',', $get['ProductSize']);

            for($i = 0; $i < count($variationList['DATA']); $i++){
                for($k = 0; $k < count($sizeCheck); $k++){
                    if($sizeCheck[$k] == $variationList['DATA'][$i]['Id']){
                        $variationList['DATA'][$i]['CHECKED'] = TRUE;
                    }
                }
            }

            $imgsQuery = "SELECT * FROM " . $this->tableImg . " WHERE ProductId = " . $get['Id'];

            $images = $conn->prepare($imgsQuery);
            $images->execute();

            if($images->rowCount() > 0){

                while($getImg = $images->fetch(PDO::FETCH_ASSOC)){
                    $imageList[] = $getImg;
                }
            }
            
            if($subSubResult['STATE'] == TRUE){
                $subSubList = $subSubResult['DATA'];
            }else{
                $subSubList = array();
            }

            try {
                return [
                    'STATE' => TRUE,
                    'DATA'  => array(
                        'PRODUCT'           => $get,  
                        'PARENT_CATEGORY'   => $parentList,
                        'SUB_CATEGORY'      => $subList,
                        'SUB_SUB_CATEGORY'  => $subSubList,
                        'VARIATIONS'        => $variationList['DATA'],
                        'IMAGE_LIST'        => $imageList
                    )
                ];
            } catch (Exception $e) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }
    }

    public function imagesDelete($id){

        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->tableImg . " WHERE Id = " . $id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){

            $query = "DELETE FROM " . $this->tableImg . " WHERE Id = " . $id;

            $delete = $conn->prepare($query);
            $result = $delete->execute();

            try{
                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            }catch(Exception $e){
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
            
        }
    }

    public function update($data) {

        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->table . " WHERE Id = " . $data->id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){

            $sizeList = implode(',', $data->variations);

            $query = "UPDATE " . $this->table . " SET 
                ProductName = ?,
                ProductDescription = ?,
                ProductNormalPrice = ?,
                ProductDiscountPrice = ?,
                ProductFeatures = ?,
                ParentCategoryId = ?,
                SubCategoryId = ?,
                SubSubCategoryId = ?,
                ProductSize = ?,
                ProductColor = ?,
                ProductVariationId = ?
                WHERE Id = ?
            ";

            $update = $conn->prepare($query);
            $result = $update->execute(array(
                $data->productName,
                $data->productDescription,
                $data->productNormalPrice,
                $data->productDiscountPrice,
                $data->productFeautures,
                $data->parentCategory,
                $data->subCategory,
                $data->subSubCategory,
                $sizeList,
                $data->color,
                $data->vGroupId,
                $data->id
            ));

            try {
                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            } catch (Exception $e) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }
    }
}