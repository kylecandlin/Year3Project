<?php
  class StaffFunctions {
    protected $pdo;
    protected $salt = ".!Ql6*zcn-IvWAk7]Jkg?Tz3*8j1wfCZ;h<X&$[W u^og:j#uo-OCy3mnt>LLyc";

    function __construct($pdo)
    {
      $this->pdo = $pdo;
    }

    public function CreateStaff($forename, $surname, $password, $age){
      $options = [
        'cost' => 14,
      ];
      $passwordHash = password_hash($password.$this->salt, PASSWORD_BCRYPT, $options);

      $sql = "SELECT * FROM Staff WHERE Username = :username";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $username);

      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if($user){
        echo "<script> alert('Sorry, that user already exists.')</script>";
      }
      else {
        $sqlInsert = "INSERT INTO Staff(Forename, Surname, Password, Age) VALUES('$forename', '$surname', '$passwordHash', '$age')";
        $stmt = $this->pdo->prepare($sqlInsert);

        $stmt->execute();

        session_start();
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        echo $_SESSION['username'];
      }
    }

    public function SignIn($username, $password){
      $sql = "SELECT * FROM Staff WHERE Username = :username";
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
