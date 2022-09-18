<?php

class Model{
 private $server ="localhost";
 private $username="root";
 private $password ="";
 private $db ="oop_crud";

 private $conn;

    public function __construct(){
      

       try {
         $this->conn =  new mysqli($this->server,$this->username,$this->password,$this->db);
        
       } catch (Exception $e) {
        echo "Connection failed" . $e->getMessage();
       }
    }

  public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])) {
					if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address']) ) {
						
						$name = $_POST['name'];
						$phone = $_POST['mobile'];
						$email = $_POST['email'];
						$address = $_POST['address'];

						$query = "INSERT INTO tbl_register (name,email,phone,address) VALUES ('$name','$email','$phone','$address')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = 'record.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}


        public function fetch(){
            $data = null;

            $query = "SELECT * from tbl_register";
            
            if($sql = $this->conn->query($query)){
               while($row = mysqli_fetch_assoc($sql)){
                $data[]=$row;
               }
            }
            return $data;
        }

        public function delete($id){
            $query = "DELETE FROM tbl_register where id ='$id'";

            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }

        public function fetch_single($id){
            $data = null;
            $query = "SELECT * FROM tbl_register  WHERE id = '$id'";

            if($sql =$this->conn->query($query)){
                while ($row = $sql->fetch_assoc()) {
                    $data =$row;
                }
            }

            return $data;
        }


        public function edit($id){

			$data = null;

			$query = "SELECT * FROM records WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE records SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}


}


?>