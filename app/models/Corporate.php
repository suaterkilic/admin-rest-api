

<?php


class Corporate extends Model{

    public function aboutFetch(){

        $conn = $this->Connect();

        $query = "SELECT * FROM tbl_about";

        try {
            $select = $conn->prepare($query);
            $select->execute();
    
            if($select->rowCount() > 0){
                $get = $select->fetch(PDO::FETCH_ASSOC);
                
                return [
                    'STATE' => TRUE,
                    'DATA' => $get
                ];
                
            }
        } catch (Exception $e) {
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function aboutUpdate($data){

        $conn = $this->Connect();

        $id = 1;

        $isRecord = "SELECT * FROM tbl_about WHERE Id = " . $id;

        try {

            $select = $conn->prepare($isRecord);
            $select->execute();
    
            if($select->rowCount() > 0){

                $query = "UPDATE tbl_about SET Title = ?, Content = ? WHERE Id = ?";
                
                $update = $conn->prepare($query);

                $result = $update->execute(array(
                    $data->title,
                    $data->content,
                    $id
                ));

                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            }else {
                return [
                    'STATE' => FALSE
                ];
            }
        } catch (Exception $e) {
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function orderInfoFetch(){

        $conn = $this->Connect();

        $query = "SELECT * FROM tbl_order_info";

        try {
            $select = $conn->prepare($query);
            $select->execute();
    
            if($select->rowCount() > 0){
                $get = $select->fetch(PDO::FETCH_ASSOC);
                
                return [
                    'STATE' => TRUE,
                    'DATA' => $get
                ];
                
            }
        } catch (Exception $e) {
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function orderInfoUpdate($data){

        $conn = $this->Connect();

        $id = 1;

        $isRecord = "SELECT * FROM tbl_about WHERE Id = " . $id;

        try {

            $select = $conn->prepare($isRecord);
            $select->execute();
    
            if($select->rowCount() > 0){

                $query = "UPDATE tbl_order_info SET Title = ?, Content = ? WHERE Id = ?";
                
                $update = $conn->prepare($query);

                $result = $update->execute(array(
                    $data->title,
                    $data->content,
                    $id
                ));

                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            }else {
                return [
                    'STATE' => FALSE
                ];
            }
        } catch (Exception $e) {
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function contactFetch(){

        $conn = $this->Connect();

        $query = "SELECT * FROM tbl_contact";

        try {
            $select = $conn->prepare($query);
            $select->execute();
    
            if($select->rowCount() > 0){
                $get = $select->fetch(PDO::FETCH_ASSOC);
                
                return [
                    'STATE' => TRUE,
                    'DATA' => $get
                ];
                
            }
        } catch (Exception $e) {
            return [
                'STATE' => FALSE
            ];
        }
    }

    public function contactUpdate($data){

        $conn = $this->Connect();

        $id = 1;

        $isRecord = "SELECT * FROM tbl_contact WHERE Id = " . $id;

        try {

            $select = $conn->prepare($isRecord);
            $select->execute();
    
            if($select->rowCount() > 0){

                $query = "UPDATE tbl_contact SET 
                Address = ?, Phone = ?,
                Map = ?, Facebook = ?,
                Instagram = ?, Twitter = ? 
                WHERE Id = ?";
                
                $update = $conn->prepare($query);

                $result = $update->execute(array(
                    $data->address,
                    $data->phone,
                    $data->map,
                    $data->facebook,
                    $data->instagram,
                    $data->twitter,
                    $id
                ));

                if($result){
                    return [
                        'STATE' => TRUE
                    ];
                }
            }else {
                return [
                    'STATE' => FALSE
                ];
            }
        } catch (Exception $e) {
            return [
                'STATE' => FALSE
            ];
        }
    }

}