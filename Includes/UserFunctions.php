<?php
  class UserFunctions {
    protected $pdo = null;
    protected $salt = "NS{3c (RJuAtIF;*e,ol@AtjUT+^+;qHxcQd~HVCr[m},JwH&+%AhinWie@*7[V`t|#MN";

    public function __construct($pdo){
      $this->pdo = $pdo;
    }

    public function CreateUser($username, $password){
      $options = [
        'cost' => 14,
      ];
      $passwordHash = password_hash($password.$this->salt, PASSWORD_BCRYPT, $options);

      $sql = "SELECT CustomerID, Username, Password FROM Customer WHERE Username = :username";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $username);

      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if($user){
        echo "<script> alert('Sorry, that user already exists.')</script>";
      }
      else {
        $sqlInsert = "INSERT INTO Customer(Username, Password) VALUES('$username', '$passwordHash')";
        $stmt = $this->pdo->prepare($sqlInsert);

        $stmt->execute();

        session_start();
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        echo $_SESSION['username'];
      }
    }

    public function SignIn($username, $password){
      $sql = "SELECT * FROM Customer WHERE Username = :username";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $username);

      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if($user && password_verify($password.$this->salt, $user['Password'])){
          session_start();
          $_SESSION['username'] = $user['Username'];
          header('Location: index.php');
          echo $_SESSION['username'];
      }
      else {
        echo "<script> alert('Incorrect username or password.') </script>";
      }
    }
  }
?>
