<?php
  class StaffFunctions {
    protected $pdo = null;
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

      $sql = "SELECT * FROM Staff WHERE Forename = :forename AND Surname = :surname";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':forename', $forename);
      $stmt->bindValue(':surname', $surname);

      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if($user){
        echo "<script> alert('Sorry, that user already exists.')</script>";
      }
      else {
        // Create Username
        $year = substr($age, 2, 2);
        $username = substr($surname, 0, 3).$forename[0].$year;
        $username = strtolower($username);

        // Insert User into Database
        $sqlInsert = "INSERT INTO Staff(Forename, Surname, Username, Password, Age) VALUES('$forename', '$surname', '$username', '$passwordHash', '$age')";
        $stmt = $this->pdo->prepare($sqlInsert);

        $stmt->execute();

        // Log user in
        $_SESSION['sUsername'] = $username;
        header('Location: index.php');
      }
    }

    public function SignIn($username, $password){
      $sql = "SELECT * FROM Staff WHERE Username = :username";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $username);

      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if($user && password_verify($password.$this->salt, $user['Password'])){
          $_SESSION['sUsername'] = $user['Username'];
          header('Location: index.php');
      }
      else {
        echo "<script> alert('Incorrect username or password.') </script>";
      }
    }
  }
?>
