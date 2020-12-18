

<?php


class Category extends Model{

    /**
     * Table Name List
     */
    public $mainTable = 'tbl_main_categories';
    public $subTable = 'tbl_sub_categories';
    public $subSubTable = 'tbl_sub_sub_categories';
    
    /**
     * Main Categories
     */
    public function categoryLimit(){
        $conn = $this->Connect();
        $query = "SELECT * FROM " . $this->mainTable;

        $rows = $conn->prepare($query);
        $rows->execute();

        return $rows->rowCount();
    }

    public function mainGet($name){
        $conn = $this->Connect();

        $query = "SELECT * FROM " . $this->mainTable . " WHERE Name='".$name."'";

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            $get = $select->fetch(PDO::FETCH_ASSOC);

            if(isset($get)){
                return $get;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }

    public function mainInsert($name){

        $conn = $this->Connect();
        $rows = $this->categoryLimit();

        if($rows < 5){
            $query = "INSERT INTO " . $this->mainTable. " (Name) VALUES (?)";
    
            $insert = $conn->prepare($query);
            $result = $insert->execute(array(
                $name
            ));
            try {
                if($result){
                    $mainGet = $this->mainGet($name);
                    return [
                        'STATE' => TRUE,
                        'LIMIT' => TRUE,
                        'DATA' => $mainGet
                    ];
                }
            } catch (Exception $e) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }else{
            return [
                'STATE' => FALSE,
                'LIMIT' => FALSE
            ];
        }

    }

    public function selectAll(){
        $conn = $this->Connect();
        
        $result = array();

        $query = "SELECT * FROM " . $this->mainTable;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            while($get = $select->fetch(PDO::FETCH_ASSOC)){
                $result[] = $get;
            }

            try {
                if(isset($result)){
                    return [
                        'STATE' => TRUE,
                        'DATA' => $result 
                    ];
                }else{
                    return [
                        'STATE' => FALSE,
                        'DATA' => array()
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

    public function mainFetch($id){
        $conn = $this->Connect();

        $query = "SELECT * FROM " . $this->mainTable . " WHERE Id = " . $id;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            $get = $select->fetch(PDO::FETCH_ASSOC);

            try {
                if(isset($get)){
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
        }else{
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function mainDelete($id){
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->mainTable . " WHERE Id = " . $id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){

            $query = "DELETE FROM " . $this->mainTable . " WHERE Id = " . $id;
            
            $delete = $conn->prepare($query);
            $result = $delete->execute();

            try {
                if($delete){
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
        }else{
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function mainUpdate($id, $name){
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->mainTable . " WHERE Id = " . $id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            $query = "UPDATE " . $this->mainTable . " SET Name = ? WHERE Id = ?";

            $update = $conn->prepare($query);
            $result = $update->execute(array(
                $name,
                $id
            ));

            try {
                if($update){
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
    
    public function mainPictureUpdate($id, $picture){
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->mainTable . " WHERE Id = " . $id;
        
        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            $query = "UPDATE " . $this->mainTable . " SET Picture = ? WHERE Id = ?";
            
            $update = $conn->prepare($query);
            $result = $update->execute(array(
                $picture,
                $id
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

    /**
     * Sub Categories
     */

    public function selectSub($value){
        $conn = $this->Connect();
        $value = (int) $value;

        $query = "SELECT * FROM tbl_sub_categories WHERE ParentId = " . $value;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
           while($get = $select->fetch(PDO::FETCH_ASSOC)){

            $mainName   = $this->whereInfoMain($get['ParentId'])['DATA']['CategoryName'];
            
            $result[] = [
                'Id'             => $get['Id'],
                'Name'           => $get['Name'],
                'Type'           => $get['Type'],
                'ParentId'       => $get['ParentId'],
                'Display'        => $get['Display'],
                'PARENT_NAME'    => $mainName
            ];
           }
           
           try {
               if(isset($get)){
                return[
                    'STATE' => TRUE,
                    'DATA' => $result
                ];
               }
           } catch (Exception $e) {
               return [
                   'STATE' => FALSE,
                   'ERROR' => $e->getMessage()
               ];
           }
        }else{
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function selectSubSub($value){
        $conn = $this->Connect();
        $value = (int) $value;

        $query = "SELECT * FROM tbl_sub_sub_categories WHERE SubId = " . $value;


        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
           while($get = $select->fetch(PDO::FETCH_ASSOC)){
               
               $mainName   = $this->whereInfoMain($get['ParentId'])['DATA']['CategoryName'];
               $subName    = $this->whereInfoSub($get['SubId'])['DATA']['Name'];
               
               $result[] = [
                   'Id'             => $get['Id'],
                   'Name'           => $get['Name'],
                   'Type'           => $get['Type'],
                   'ParentId'       => $get['ParentId'],
                   'SubId'          => $get['SubId'],
                   'Display'        => $get['Display'],
                   'PARENT_NAME'    => $mainName,
                   'SUB_NAME'       => $subName
               ];
           }
           
           try {
               if(isset($get)){
                return[
                    'STATE' => TRUE,
                    'DATA' => $result
                ];
               }
           } catch (Exception $e) {
               return [
                   'STATE' => FALSE,
                   'ERROR' => $e->getMessage()
               ];
           }
        }else{
            return [
                'STATE' => FALSE
            ];
        }
    }
     
    public function subInsert($newCategory, $data){

        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->mainTable . " WHERE Id = " . $data->Id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            $query = "INSERT INTO " . $this->subTable . " (Name, ParentId) VALUES (?, ?)";

            $insert = $conn->prepare($query);
            $result = $insert->execute(array(
                $newCategory,
                $data->Id
            ));

            try {
                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            } catch(Exception $e){
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }else{
            return [
                'STATE' => FALSE
            ];
        }
    }
    
    public function whereInfoSub($value){
        
        $conn = $this->Connect();

        $query = "SELECT * FROM tbl_sub_categories WHERE Id = " . $value;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
             $get = $select->fetch(PDO::FETCH_ASSOC);

             try {
                 if(isset($get)){
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
        }else{
            return [
                'STATE' => FALSE
            ];
        }

    }

    public function whereInfoMain($value){
        
        $conn = $this->Connect();

        $query = "SELECT * FROM tbl_main_categories WHERE Id = " . $value;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
             $get = $select->fetch(PDO::FETCH_ASSOC);

             $list = [
                 'Id' => $get['Id'],
                 'CategoryName' => $get['Name']
             ];
             
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
        }else{
            return [
                'STATE' => FALSE
            ];
        }

    }

    public function subSubInsert($newCategory, $data) {
        
        $conn = $this->Connect();
        
        $isRecord = "SELECT " . $this->subTable . ".ParentId, " . $this->mainTable . ".Id FROM ".
        $this->subTable . " INNER JOIN " . $this->mainTable . " ON " . $this->subTable . ".ParentId = " . 
        $this->mainTable . ".Id WHERE ParentId = " . $data->ParentId;
        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            $query = "INSERT INTO " . $this->subSubTable . " (Name, ParentId, SubId) VALUES (?, ?, ?)";

            $insert = $conn->prepare($query);
            $result = $insert->execute(array(
                $newCategory,
                $data->ParentId,
                $data->Id
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

        
        /*$parentRecord = "SELECT * FROM " . $this->mainTable . " WHERE Id = " . $data->ParentId;

        $parent = $conn->prepare($parentRecord);
        $parent->execute();

        if($parent->rowCount() > 0){
            $subRecord = "SELECT * FROM " . $this->subTable . " WHERE Id = " . $data->Id;

            $sub = $conn->prepare($subRecord);
            $sub->execute();

            if($sub->rowCount){

            }
        }*/
    }

    public function subDelete($id){
        
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->subTable . " WHERE Id = " . $id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            $query = "DELETE FROM " . $this->subTable . " WHERE Id = " . $id;

            $disabled = $conn->prepare("SET FOREIGN_KEY_CHECKS=0");
            $disabled->execute();

            $delete = $conn->prepare($query);
            $delete->execute();

            try {
                if($delete){
                
                $enabled = $conn->prepare("SET FOREIGN_KEY_CHECKS=1");
                $enabled->execute();

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

    public function subSubDelete($id) {

        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->subSubTable . " WHERE Id = " . $id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            
            $query = "DELETE FROM " . $this->subSubTable . " WHERE Id = " . $id;

            $disabled = $conn->prepare("SET FOREIGN_KEY_CHECKS=0");
            $disabled->execute();

            $delete = $conn->prepare($query);
            $delete->execute();

            try {
                if($delete){
                    
                    $enabled = $conn->prepare("SET FOREIGN_KEY_CHECKS=1");
                    $enabled->execute();
                    
                    return[
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

    /***
     * Sub Update
     */

    public function subUpdate($data){

        $conn = $this->Connect();
        
        $PARENT_ID;
        
        $isRecord = "SELECT * FROM " . $this->subTable . " WHERE Id = " . $data->id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){

            $getParent = $select->fetch(PDO::FETCH_ASSOC);
            
            $PARENT_ID = $getParent['ParentId'];

            $query = "UPDATE " . $this->subTable . " SET Name = ?, ParentId = ?, 
            Display = ? WHERE Id = " . $data->id;

            $update = $conn->prepare($query);
            $result = $update->execute(array(
                $data->newName,
                $data->parentId,
                $data->display
            ));

            try {
                if($result){

                    $subSubQuery = "UPDATE " . $this->subSubTable . " SET ParentId = ? 
                        WHERE ParentId='".$PARENT_ID."' AND SubId='".$data->id."'";


                    $updateSubSub = $conn->prepare($subSubQuery);
                    $resultSubSub = $updateSubSub->execute(array(
                        $data->parentId
                    ));

                    if($resultSubSub){
                        $subInfo = $this->whereInfoSub($data->id);
                        return [
                            'STATE' => TRUE,
                            'DATA' => $subInfo 
                        ];
                    }
                }
            } catch (Exception $e) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }
    }

    public function subSubFetch($id) {
        $conn = $this->Connect();

        $query = "SELECT * FROM " . $this->subSubTable . " WHERE Id = " . $id;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            
            $get = $select->fetch(PDO::FETCH_ASSOC);
            $subCategory = $this->selectSub($get['ParentId'])['DATA'];

            try {
                if(isset($get)){
                    return [
                        'STATE' => TRUE,
                        'DATA' => [
                            'SUB_LIST' => $subCategory,
                            'SUBSUB' => $get
                        ]
                    ];
                }
            } catch (\Throwable $th) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }

        }
    }

    public function subSubUpdate($data){
        
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->subSubTable . " WHERE Id = " . $data->id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            
            $query = "UPDATE " . $this->subSubTable . " SET Name = ?, ParentId = ?, 
            SubId = ?, Display = ? WHERE Id = ?";

            $update = $conn->prepare($query);
            $result = $update->execute(array(
                $data->categoryName,
                $data->parentValue,
                $data->subValue,
                $data->display,
                $data->id
            ));

            try {
                if($result){

                    $getSubCategory = $this->subSubFetch($data->id);

                    return [
                        'STATE' => TRUE,
                        'DATA' => $getSubCategory
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

    /**
     * SubSubSub
     */

    public function subSubFromSub($id){

        $conn = $this->Connect();
        $list = [];

        $query = "SELECT * FROM " . $this->subSubTable . " WHERE SubId = " . $id;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            while($get = $select->fetch(PDO::FETCH_ASSOC)){
                $list[] = $get;
            }


            try{
                if(isset($list)){
                    return [
                        'STATE' => TRUE,
                        'DATA' => $list
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

    public function fetchAllMenu(){

        $conn = $this->Connect();

        $parentList = array();
        $subList = array();
        $subSubList = array();

        $allList = array();
        
        $parentCount = 0;
        $subCount = 0;
        $subSubCount = 0;

        $display = 1;

        $parentQuery = "SELECT * FROM " . $this->mainTable . " WHERE Display = " . $display;


        try{
            $parentSelect = $conn->prepare($parentQuery);
            $parentSelect->execute();
    
            if($parentSelect->rowCount() > 0){
                while($parentGet = $parentSelect->fetch(PDO::FETCH_ASSOC)){
                    
                    $allList[$parentCount]['PARENT_LIST'] = $parentGet;
                    $parentId = $parentGet['Id'];
                    
                    $subSelect = $conn->prepare("SELECT * FROM " . $this->subTable . " WHERE ParentId = $parentId AND Display = $display");
                    $subSelect->execute();
    
                    if($subSelect->rowCount() > 0){

                        $subCount = 0;

                        while($subGet = $subSelect->fetch(PDO::FETCH_ASSOC)){
                            $allList[$parentCount]['SUB_LIST'][$subCount] = $subGet;
    
                            $subId = $subGet['Id'];
    
                            $subSubSelect = $conn->prepare("SELECT * FROM " . $this->subSubTable . " WHERE SubId = $subId AND Display = $display");
                            $subSubSelect->execute();
    
                            if($subSubSelect->rowCount() > 0){
                                
                                $subSubCount = 0;

                                while($subSubGet = $subSubSelect->fetch(PDO::FETCH_ASSOC)){
    
                                    $allList[$parentCount]['SUB_LIST'][$subCount]['SUB_SUB_LIST'][$subSubCount] = $subSubGet;
    
                                    $subSubCount++;
                                }
                            }
                            $subCount++;
                        }
                    }
                    $parentCount++;
                }

                if(count($allList) > 0){
                    return [
                        'STATE' => TRUE,
                        'DATA' => $allList
                    ];
                }else{
                    return [
                        'STATE' => FALSE,
                        'DATA' => array()
                    ];
                }
            }
        }catch(Exception $e){
            return[
                'STATE' => FALSE,
                'ERROR' => $e->getMessage()
            ];
        }
    }
}