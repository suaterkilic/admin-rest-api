


<?php

class Admin extends Model{

    public $tableName = 'tbl_admins';

    public function adminUsernameExist($username){

        $conn = $this->Connect();

        $query = "SELECT * FROM tbl_admins WHERE Username='".$username."'";

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            $get = $select->fetch(PDO::FETCH_ASSOC);
            return $get;
        }else{
            return FALSE;
        }
    }

    public function adminExist($id){

        $conn = $this->Connect();

        $query = "SELECT * FROM " . $this->tableName . " WHERE Id = " . $id;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function insert($data){
        $conn = $this->Connect();

        $insertQuery = "INSERT INTO " . $this->tableName . " (Name, Surname, Username, Password, Authority) " .
        "VALUES (?, ?, ?, ?, ?)";

        $insert = $conn->prepare($insertQuery);
        $result = $insert->execute(array(
            $data->name,
            $data->surname,
            $data->username,
            $data->password,
            $data->authority
        ));

        try{
            if($result){
                $userData = $this->adminUsernameExist($data->username);
                if(is_array($userData) && $userData != FALSE){
                    return [
                        'STATE'     => TRUE,
                        'USER_DATA' => $userData
                    ];
                }
            }

        } catch(Exception $e){
            if(!$insert){
                return [
                    'STATE'         => FALSE,
                    'MYSQL_ERROR'   => $conn->errorInfo(),
                    'CATCH_ERROR'   => $e->getMessage()
                ];
            }
        }

    }

    public function pictureUpdate($data){

        $conn = $this->Connect();

        $query = "UPDATE " . $this->tableName . " SET ProfilePicture = ? WHERE Id = ?";
        
        $update = $conn->prepare($query);
        $result = $update->execute(array(
            $data->picture,
            $data->id
        ));

        try {
            if($result){
                return TRUE;
            }
        } catch(Exception $e){
            if(!$update){
                return [
                    'STATE' => FALSE,
                    'MYSQL_ERROR' => $conn->errorInfo(),
                    'CATCH_ERROR' => $e->getMessage()
                ];
            }
        }
    }

    public function select(){
        $conn = $this->Connect();

        $query = "SELECT * FROM " . $this->tableName;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            while($get = $select->fetch(PDO::FETCH_ASSOC)){
                $result[] = [
                    'id'            => $get['Id'],
                    'name'          => $get['Name'],
                    'surname'       => $get['Surname'],
                    'username'      => $get['Username'],
                    'authority'     => $get['Authority'],
                    'picture'       => $get['ProfilePicture']
                ];
            }

            try{
                if(isset($result)){
                    return [
                        'STATE' => TRUE,
                        'USER_LIST' => $result
                    ];
                }
            }catch(Exception $e){
                if(!$select){
                    return [
                        'STATE' => FALSE,
                        'ERROR' => $e->getMessage()
                    ];
                }
            }
        }
    }

    public function where($id){
        $conn = $this->Connect();

        $query = "SELECT * FROM " . $this->tableName . " WHERE Id = " . $id;

        $select = $conn->prepare($query);
        $select->execute();

        if($select->rowCount() > 0){
            $get = $select->fetch(PDO::FETCH_ASSOC);

            try {
                if(isset($get)){
                    return [
                        'STATE' => TRUE,
                        'USER_DATA' => $get
                    ];
                }
            } catch (Exception $e){
                if(!$select){
                    return [
                        'STATE' => FALSE,
                        'ERROR' => $e->getMessage()
                    ];
                }
            }
        }
    }

    public function delete($id){
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->tableName . " WHERE Id = " . $id;
        
        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            $query = "DELETE FROM " . $this->tableName . " WHERE Id = " . $id;
            
            $delete = $conn->prepare($query);
            $result = $delete->execute();

            try {
                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            } catch(Exception $e) {
                if(!$delete){
                    return [
                        'STATE' => FALSE,
                        'ERROR' => $e->getMessage()
                    ];
                }
            }
        }
    }

    public function update($data){
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->tableName . " WHERE Id = " . $data->id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){
            $query = "UPDATE " . $this->tableName . 
            " SET Name = ?, Surname = ?, Username = ?, Password = ?, Authority = ? 
            WHERE Id = ?";

            $update = $conn->prepare($query);
            $result = $update->execute(array(
                $data->name,
                $data->surname,
                $data->username,
                $data->password,
                $data->authority,
                $data->id
            ));

            try {
                if($result){
                    $userInfo = $this->where($data->id);

                    return $userInfo;
                }
            } catch(Exception $e){
                if(!$update){
                    return [
                        'STATE' => FALSE,
                        'ERROR' => $e->getMessage()
                    ];
                }
            }

        }
    }
}


