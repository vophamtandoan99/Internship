<?php
    require_once('config.php');
    $db = new database(HOST, DB_USER, DB_PASSWORD, DB_NAME);

    class database {
        public $connection;
        // Hàm khởi tạo đối tượng database
        function __construct($host, $db_user, $db_pass, $db_name){
            // Tạo đối tượng kết nối mysqli
            $this->connection = new mysqli($host, $db_user, $db_pass, $db_name);
            // Kiem tra ket noi den mysql
            if($this->connection->errno){
                die("Kết nối database thất bại");
            }
        }
        //Hàm truy vấn dữ liệu
        function query($sql){
            $result = $this->connection->query($sql);
            if(!$result){
                echo $this->connection->error;
            }
            return $result;
        }
        // Hàm lấy dữ liệu
        function getData($sql){
            $result = $this->connection->query($sql);
            $data = [];
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row; 
                }
            }
            return $data;
        }
        //Hàm xóa dữ liệu
        function delete($table, $id){
            $sql = "DELETE FROM {$table} WHERE id = {$id}";
            $result = $this->connection->query($sql);
            if(!$result){
                echo $this->connection->error;
            }
            return $result;
        }
        //Hàm thêm dữ liệu
        function add($sql){
            $result = $this->connection->query($sql);
            if(!$result){
                echo $this->connection->error;
            }
            return $result;
        }
        //Hàm sửa dữ liệu
        function update($sql){
            $result = $this->connection->query($sql);
            if(!$result){
                echo $this->connection->error;
            }
            return $result;
        }

        //dem du lieu
         function sum($result){
            $sum = $result->num_rows;
            if(!$sum){
                echo $this->connection->error;
            }
            return $sum;
        }

        //result
        function result($result){
            $row = $row = $result->fetch_assoc();
            $data[] = $row; 
            return $data;
        }
    }
?>