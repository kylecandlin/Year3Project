<?php
  class eventList {
    protected $pdo = null;

    public function __construct($pdo) {
      $this->pdo = $pdo;
    }

    public function outputAll() {
      $sql = "SELECT * FROM event";
      $stmt = $this->pdo->query($sql);

      while($row = $stmt->fetch()){
        $mysqldate = strtotime($row['Details']);
        $details = date('jS M, yy - h:ia', $mysqldate);

        // echo section containing relevant information and buttons.
        echo "<section class='event-container'>";
        echo "<h1 class='event-header'>".$row['Name']."</h1>";
        echo "<h1 class='event-subheader'>".$details."</h1>";
        echo "<p class='event-text'>".$row['Description']."</p>";
        echo "<p id='text-fade'></p>";
        echo "<input id='view-event-btn' name='".$row['EventID']."' class='input-button'
              type='submit' value='View more...' /></section>";

        if(isset($_POST[$row['EventID']])) {
          $_SESSION['eventID'] = $row['EventID'];
          echo "<script> location.replace('showEvent.php'); </script>";
        }
      }
    }

    public function outputSingle($ID){
      $sql = "SELECT * FROM Event Where EventID = :ID";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':ID', $ID);

      $stmt->execute();

      $event = $stmt->fetch(PDO::FETCH_ASSOC);

      echo "<h1 class='event-header'>".$event['Name']."</h1>";
      echo "<h1 class='event-subheader'>".$event['Details']."</h1>";
      echo "<p class='event-text'>".$event['Description']."</p>";
    }

    public function addEvent($name, $date, $desc, $username) {
      $checkExists = "SELECT Name FROM event WHERE Name = :name";
      $stmt = $this->pdo->prepare($checkExists);

      $stmt->bindValue(':name', $name);

      $stmt->execute();

      $event = $stmt->fetch(PDO::FETCH_ASSOC);

      if($event){
        echo "<script> alert('Sorry, that event already exists.')</script>";
      }
      else {
        $ID = $this->getStaffID($username);

        $sqlInsert = "INSERT INTO Event(StaffID, Name, Details, Description) VALUES('$ID', '$name', '$date', '$desc')";
        $stmt = $this->pdo->prepare($sqlInsert);

        $stmt->execute();

        header('location: event.php');
      }
    }

    private function getStaffID($username) {
      $sql = 'SELECT StaffID FROM Staff WHERE Username = :username';
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':username', $username);

      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      $ID = $user['StaffID'];
      return $ID;
    }
  }
?>
