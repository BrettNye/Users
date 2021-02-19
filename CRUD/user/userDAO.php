<?php
class UserDAO {
  function getUser($user, $type){
    require_once('./utilities/connection.php');

    switch($type){
      case 0:
        $sql = "SELECT FirstName, LastName, Username, user_id FROM newuser WHERE user_id =" . $user->getUserId();
        break;
      case 1: 
        $sql = "SELECT FirstName, LastName, Username, user_id FROM newuser WHERE Username ='" . $user->getUsername() . "'";
        break;
      case 2:
        $sql = "SELECT FirstName, LastName, Username, user_id FROM newuser WHERE FirstName ='" . $user->getFirstName() . "'";
        break;
      case 3:
        $sql = "SELECT FirstName, LastName, Username, user_id FROM newuser WHERE LastName ='" . $user->getLastName() . "'";
        break;
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["FirstName"]);
        $user->setLastName($row["LastName"]);
        $user->setUsername($row["Username"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function createUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "INSERT INTO cs3620_proj.newuser
    (
    `Username`,
    `Password`,
    `FirstName`,
    `LastName`)
    VALUES
    ('" . $user->getUsername() . "',
    '" . $user->getPassword() . "',
    '" . $user->getFirstName() . "',
    '" . $user->getLastName() . "'
    );";

    if ($conn->query($sql) === TRUE) {
      echo "user created";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }

  function deleteUser($un){
    require_once('./utilities/connection.php');
    
    $sql = "DELETE FROM cs3620_proj.newuser WHERE Username = '" . $un . "';";

    if ($conn->query($sql) === TRUE) {
      echo "user deleted";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>