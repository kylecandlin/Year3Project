<?php
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
        echo "<table id='account-details' class='account-details-table'>";
        echo "<tr><th> ID </th><td>".$row['CustomerID']."</td></tr>";
        echo "<tr><th> Name </th><td>".$row['Username']."</td></tr>";
        echo "<tr><th> Date of Birth </th><td>".$row['Age']."</td></tr></table>";
      }
    }

    function showEvent(){
      $sql = "SELECT Name, Details, Description
                FROM Event
                INNER JOIN EventAttendance ON Event.EventID = EventAttendance.EventID
                INNER JOIN Customer ON EventAttendance.CustomerID = Customer.CustomerID
                WHERE Customer.Username = :username";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $_SESSION['username']);

      $stmt->execute();

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $mysqldate = strtotime($row['Details']);
        $details = date('jS M, yy - h:ia', $mysqldate);

        echo "<h1> Event Details </h1>";
        echo "<table class='account-details-table'>";
        echo "<tr><th>Name</th> <th>Details</th> <th>Description</th></tr>";
        echo "<tr><td>".$row['Name']."</td>";
        echo "<td>".$details."</td>";
        echo "<td>".$row['Description']."</td></tr></table>";
      }
    }
  }

?>
