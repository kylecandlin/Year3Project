<?php
  session_start();
  /**
   *
   */
  class AccountDetails {
    protected $pdo = null;

    function __construct($pdo) {
      $this->pdo = $pdo;
    }

    function showAccount(){
      $sql = "SELECT CustomerID, Username, Age FROM Customer WHERE Username = :username";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $_SESSION['username']);

      $stmt->execute();

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<h1> Account Details </h1>";
        echo "<p>".$row['CustomerID']."</p>";
        echo "<p>".$row['Username']."</p>";
        echo "<p>".$row['Age']."</p>";
      }
    }

    function showEvent(){
      $sql = "SELECT Name, Details, Description
                FROM Event
                INNER JOIN EventAttendance ON Event.EventID = EventAttendance.EventID
                INNER JOIN Customer ON EventAttendance.CustomerID = Customer.CustomerID
                WHERE Customer.Username = :username
                ";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $_SESSION['username']);

      $stmt->execute();

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<h1> Event Details </h1>";
        echo "<p>".$row['Name']."</p>";
        echo "<p>".$row['Details']."</p>";
        echo "<p>".$row['Description']."</p>";
      }
    }
  }

?>
