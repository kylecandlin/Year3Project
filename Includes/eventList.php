<?php
  /**
  * Defines function used to output and add events
  */
  class eventList {
    protected $pdo = null;

    // Constructor
    public function __construct($pdo) {
      $this->pdo = $pdo;
    }

    // Outputs all events in date order, closest first
    public function outputAll() {
      $sql = "SELECT * FROM Event ORDER BY Details ASC";
      $stmt = $this->pdo->query($sql);

      // Outputs data in a container
      while($row = $stmt->fetch()){
        $mysqldate = strtotime($row['Details']);
        $details = date('jS M, yy - h:ia', $mysqldate);

        // echo section containing relevant information and buttons.
        echo "<section class='event-container'>";
        echo "<h1 class='event-header'>".$row['Name']."</h1>";
        echo "<h1 class='event-subheader'>".$details."</h1>";
        echo "<h1 class='event-subheader'>£".$row['Price']." pp</h1>";
        echo "<p class='event-text'>".$row['Description']."</p>";
        echo "<p id='text-fade'></p>";
        echo "<input id='view-event-btn' name='".$row['EventID']."' class='input-button'
              type='submit' value='View more...' /></section>";

        // If buttons pressed, redirect user to page displaying full information
        if(isset($_POST[$row['EventID']])) {
          $_SESSION['eventID'] = $row['EventID'];
          echo "<script> location.replace('showEvent.php'); </script>";
        }
      }
    }

    // Outputs information about a single event
    public function outputSingle($ID){
      $sql = "SELECT * FROM Event Where EventID = :ID";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':ID', $ID);

      $stmt->execute();

      $event = $stmt->fetch(PDO::FETCH_ASSOC);

      $mysqldate = strtotime($event['Details']);
      $date = date('jS M, yy', $mysqldate);
      $time = date('h:ia', $mysqldate);

      // Displays event details
      echo "<h1 class='event-header'>".$event['Name']."</h1>";
      echo "<h1 class='event-subheader'>".$date."</h1>";
      echo "<h1 class='event-subheader'>".$time."</h1>";
      echo "<h1 class='event-subheader'>£".$event['Price']." pp</h1>";
      echo "<p class='event-text'>".$event['Description']."</p>";
    }

    // Adds event to Event entity in pub DB
    public function addEvent($name, $date, $desc, $price, $username) {
      $checkExists = "SELECT Name FROM event WHERE Name = :name";
      $stmt = $this->pdo->prepare($checkExists);

      $stmt->bindValue(':name', $name);

      $stmt->execute();

      $event = $stmt->fetch(PDO::FETCH_ASSOC);

      // If already exists, don't input
      if($event){
        echo "<script> alert('Sorry, that event already exists.')</script>";
      }
      // Gets ID of staff who is adding into database, input data into entity
      else {
        $ID = $this->getStaffID($username);

        $sqlInsert = "INSERT INTO Event(StaffID, Name, Details, Price, Description) VALUES('$ID', '$name', '$date', '$price', '$desc')";
        $stmt = $this->pdo->prepare($sqlInsert);

        $stmt->execute();

        header('location: event.php');
      }
    }

    // Retreives ID of staff member from username
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
