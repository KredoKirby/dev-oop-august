<?php

    class Database{
        private $server_name = "localhost";
        private $db_username = "root";
        private $db_password = "root"; // WINDOWS users: "";
        private $db_name     = "the_company_am";
        protected $conn;

        public function __construct(){
            # CREATE THE CONNECTION
            $this->conn = new mysqli($this->server_name, $this->db_username, $this->db_password, $this->db_name);

            # ERROR HANDLING
            if($this->conn->connect_error){
                die("Unable to connect to the Database " . $this->db_name . " : ".$this->conn->connect_error);
            }
        }
    }

?>