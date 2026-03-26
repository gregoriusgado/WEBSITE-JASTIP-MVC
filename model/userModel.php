<?php

class UserModel {
    private $conn;

    public function __construct($conn) {
        $this -> conn = $conn;
    }
     public function register($username,$password,$role="users") {
        $hash = password_hash ($password, PASSWORD_DEFAULT);
        $prepare_statement = $this->conn->prepare ("INSERT INTO users (username,password,role) VALUES (?,?,?)");
        $prepare_statement->bind_param("sss", $username, $hash, $role );
        return $prepare_statement->execute();
     }

     public function findUser($username) {
        $prepare_statement = $this->conn->prepare ("SELECT * FROM users where username=?");
        $prepare_statement ->bind_param("s", $username);
        $prepare_statement->execute();
        return $prepare_statement->get_result()->fetch_assoc();
     }


}
?>