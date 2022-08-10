<?php
    require_once "Database.php";

    class User extends Database{

        public function createUser($first_name, $last_name, $username, $password){
            # CREATE THE SQL QUERY
            $sql = "INSERT INTO users (first_name, last_name, username, password)
                    VALUES('$first_name', '$last_name', '$username', '$password')";
                
            # EXECUTE THE QUERY
            if($this->conn->query($sql)){
                header("location: ../");
                exit;
            }else{
                die("Error in CREATING USER: " . $this->conn->error);
            }
        }

        public function login($username, $password){
            $sql = "SELECT id, username, password FROM users WHERE username = '$username'";

            $result = $this->conn->query($sql);

            if($result->num_rows == 1){
                $user_details = $result->fetch_assoc(); 
                // fetch_assoc() ~~ retrieve the database record and convert it into an associative array 

                if(password_verify($password, $user_details['password'])){
                    # SESSION VARIABLES

                    session_start();

                    $_SESSION['user_id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];

                    # REDIRECT
                    header("location: ../views/dashboard.php");
                    exit;
                 }else{  
                    die("Password is incorrect");
                }

            }else{
                die("Username not found");
            }
        }

        public function getAllUsers(){
            $sql = "SELECT id, first_name, last_name, username FROM users";

            if($result = $this->conn->query($sql)){
                while($row = $result->fetch_assoc()){
                    $users[] = $row;
                }
                return $users;
            }else{
                die("ERROR in retrieving user list: " . $this->conn->error);
            }
        }

        public function getUserDetails($user_id){
            $sql = "SELECT * FROM users WHERE id = '$user_id'";

            $result = $this->conn->query($sql);

            if($result->num_rows == 1){
                return $result->fetch_assoc();
            }else{
                die("ERROR in retrieving user details: " . $this->conn->error);
            }
        }

        public function updateUser($user_id, $first_name, $last_name, $username, $password){
            $sql = "UPDATE users
                    SET first_name  = '$first_name',
                        last_name   = '$last_name',
                        username    = '$username',
                        password    = '$password'
                    WHERE id = '$user_id'";
            if($this->conn->query($sql)){
                header('location: ../views/dashboard.php');
                exit;
            }else{
                die("ERROR in updating user details: " . $this->conn->error);
            }
        }

        public function deleteUser($user_id){
            $sql = "DELETE FROM users WHERE id = '$user_id'";

            if($this->conn->query($sql)){
                header('location: ../views/dashboard.php');
                exit;
            }else{
                die("ERROR in deleting user ". $user_id. ": " . $this->conn->error);
            }
        }

        public function uploadPhoto($user_id, $image_name, $tmp_name){
            $sql = "UPDATE users
                    SET photo = '$image_name'
                    WHERE id = '$user_id'";
            
            if($this->conn->query($sql)){
                $destination = "../assets/images/$image_name";

                if(move_uploaded_file($tmp_name, $destination)){
                    header('location: ../views/profile.php');
                    exit;
                }else{
                    die("ERROR in moving the photo");
                }

            }else{
                die("ERROR in uploading the photo: " . $this->conn->error);
            }
        }

    }

?>