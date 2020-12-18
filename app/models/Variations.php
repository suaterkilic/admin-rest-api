

<?php

class Variations extends Model{


    public $groupTable = 'tbl_variations_group';
    public $childTable = 'tbl_variations';

    public function selectGroup(){

        $conn = $this->Connect();

        $query = "SELECT * FROM " . $this->groupTable;

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
                }
            } catch (Exception $e) {
                return [
                    'STATE' => FALSE,
                    'ERROR' => $e->getMessage()
                ];
            }
        }
    }

    public function whereSingle($id){

        $conn = $this->Connect();

        $isRecord = "SELECT * FROM " . $this->groupTable . " WHERE Id = " . $id;

        $record = $conn->prepare($isRecord);
        $record->execute();

        if($record->rowCount() > 0){
            $query = "SELECT * FROM " . $this->childTable . " WHERE GroupId = " . $id;
            
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
}