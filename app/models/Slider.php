

<?php


class Slider extends Model{

    public $table = 'tbl_slider';

    public function insert($data){

        $conn = $this->Connect();

        $query = "INSERT INTO " . $this->table . " 
        (TitleFirst, TitleSecond, Content, ButtonText, RandId) VALUES (?,?,?,?,?)";

        $randId = randId();

        try {
            $insert = $conn->prepare($query);
            $result = $insert->execute(array(
                $data->firstTitle,
                $data->secondTitle,
                $data->content,
                $data->buttonValue,
                $randId
            ));

            if($result){

                $isRecord = "SELECT * FROM " . $this->table . " WHERE RandId='".$randId."'";

                $select = $conn->prepare($isRecord);
                $select->execute();

                if($select->rowCount() > 0){

                    $slider = $select->fetch(PDO::FETCH_ASSOC);

                    return [
                        'STATE' => TRUE,
                        'DATA' => $slider
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

    public function imageUpdate($data){

        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->table . " WHERE Id = " . $data->id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){

            $query = "UPDATE " . $this->table . " SET Image = ? WHERE Id = ?";

            try {
                $update = $conn->prepare($query);
                $result = $update->execute(array(
                    $data->image,
                    $data->id
                ));

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

    public function fetchAll(){
        $conn = $this->Connect();
        
        $list = [];
        $query = "SELECT * FROM " . $this->table;

        try{
            $select = $conn->prepare($query);
            $select->execute();
    
            if($select->rowCount() > 0){
    
                while($get = $select->fetch(PDO::FETCH_ASSOC)){
                    $list[] = $get;
                }

                if(isset($list)){
                    return [
                        'STATE' => TRUE,
                        'DATA' => $list
                    ];
                }
            }

        }catch(Exception $e){
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function delete($id){
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->table . " WHERE Id = " . $id;

        $select = $conn->prepare($isRecord);
        $select->execute();

        if($select->rowCount() > 0){

            $query = "DELETE FROM " . $this->table . " WHERE Id = " . $id;

            
            try{
                $delete = $conn->prepare($query);
                $result = $delete->execute();
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

    public function update($data){
        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->table . " WHERE Id = " . $data->id;

        try {
            
            $select = $conn->prepare($isRecord);
            $select->execute();

            if($select->rowCount() > 0){
                
                $query = "UPDATE " . $this->table . " 
                SET TitleFirst = ?, TitleSecond = ?, Content = ?, ButtonText = ? WHERE Id = ?";

                $update = $conn->prepare($query);
                $result = $update->execute(array(
                    $data->firstTitle,
                    $data->secondTitle,
                    $data->content,
                    $data->buttonValue,
                    $data->id
                ));

                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            }
        } catch (Exception $e) {
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function fetchWhere($id){

        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->table . " WHERE Id = " . $id;

        try {
            $select = $conn->prepare($isRecord);
            $select->execute();

            if($select->rowCount() > 0){
                
                $get = $select->fetch(PDO::FETCH_ASSOC);
                
                if(isset($get)){
                    return [
                        'STATE' => TRUE,
                        'DATA' => $get
                    ];
                }
            }
        } catch (Exception $e) {
            return [
                'STATE' => FALSE
            ];
        }
    }
}