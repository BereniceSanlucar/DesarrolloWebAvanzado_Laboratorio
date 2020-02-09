<?php
  class User {
    // Constructor de la clase
    public function __construct() {
    }

    // Función para regisrar al usuario en la base de datos
    public function saveUser($temp) {
      if(file_put_contents("../app/models/LoginData.txt", serialize($temp))) {
        return true;
      } else {
        return false;
      }
    }

    // Función para buscar un nombre de usuario en la base de datos
    public function findUsername($username) {
      $loginData = unserialize(file_get_contents("../app/models/LoginData.txt"));
      if($loginData['username'] == $username) {
        return true;
      } else {
        return false;
      }
    }

    // Función para buscar un email en la base de datos
    public function findEmail($email) {
      $loginData = unserialize(file_get_contents("../app/models/LoginData.txt"));
      if($loginData['email'] == $email){
        return true;
      } else {
        return false;
      }
    }

    // Función para autenticar a un usuario con su nombre de usuario y contraseña
    public function authenticateUser($username, $password) {
      $loginData = unserialize(file_get_contents("../app/models/LoginData.txt"));
      $hashed_password = $loginData['password'];
      if(password_verify($password, $hashed_password)){
        return $hashed_password;
      } else {
        return false;
      }
    }
  }
?>