<?php
  /**
  * Defines functions for users to interact with the DB
  */
  class UserFunctions {
    // DB variable and salt for hashing purposes
    protected $pdo = null;
    protected $salt = "NS{3c (RJuAtIF;*e,ol@AtjUT+^+;qHxcQd~HVCr[m},JwH&+%AhinWie@*7[V`t|#MN";

    // Contructor
    public function __construct($pdo){
      $this->pdo = $pdo;
    }

    // Function to add user to DB
    public function CreateUser($forename, $surname, $username, $password, $dob){
      // Password hashing
      $options = [
        'cost' => 14,
      ];
      $passwordHash = password_hash($password.$this->salt, PASSWORD_BCRYPT, $options);

      // Check if user already exists
      $sql = "SELECT Username FROM Customer WHERE Username = :username";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $username);

      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if($user){
        echo "<script> alert('Sorry, that user already exists.')</script>";
      }
      else {
        // Insert into DB and log in
        $sqlInsert = "INSERT INTO Customer(Forename, Surname, Username, Password, Age) VALUES('$forename', '$surname', '$username', '$passwordHash', '$dob')";
        $stmt = $this->pdo->prepare($sqlInsert);

        $stmt->execute();

        $_SESSION['username'] = $username;
        header('Location: index.php');
      }
    }

    // Function to sign user in
    public function SignIn($username, $password){
      // Check user exists
      $sql = "SELECT * FROM Customer WHERE Username = :username";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $username);

      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      // If exists and passwords match, log in
      if($user && password_verify($password.$this->salt, $user['Password'])){
          $_SESSION['username'] = $user['Username'];
          header('Location: index.php');
      }
      else {
        echo "<script> alert('Incorrect username or password.') </script>";
      }
    }
  }
?>
