<?php
require_once('./user/userDAO.php');

class User implements \JsonSerializable {
  // Properties
  private $user_id;
  private $username;
  private $first_name;
  private $last_name;
  private $password;

  // Methods
  function __construct() {
  }
  function getUserId(){
    return $this->user_id;
  }
  function setUserId($user_id){
    $this->user_id = $user_id;
  }
  function getUsername() {
    return $this->username;
  }
  function setUsername($username){
    $this->username = $username;
  }
  function getFirstName() {
    return $this->first_name;
  }
  function setFirstName($first_name){
    $this->first_name = $first_name;
  }
  function getLastName() {
    return $this->last_name;
  }
  function setLastName($last_name){
    $this->last_name = $last_name;
  }
  function setPassword($password){
    $this->password = hash("sha256", $password);
  }
  function getPassword(){
    return $this->password;
  }

  function getUserByID($user_id){
    $this->user_id = $user_id;
    $userDAO = new userDAO();
    $userDAO->getUser($this, 0);
    return $this;
  }

  function getUserByUsername($username){
    $this->username = $username;
    $userDAO = new userDAO();
    $userDAO->getUser($this, 1);
    return $this;
  }

  function getUserByFirstName($first_name){
    $this->first_name = $first_name;
    $userDAO = new userDAO();
    $userDAO->getUser($this, 2);
    return $this;
  }

  function getUserByLastName($last_name){
    $this->last_name = $last_name;
    $userDAO = new userDAO();
    $userDAO->getUser($this, 3);
    return $this;
  }

  function createUser(){
    $userDAO = new userDAO();
    $userDAO->createUser($this);
  }

  function deleteUser($username){
    $userDAO = new userDAO();
    $userDAO->deleteUser($username);
  }

  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }
}
?>