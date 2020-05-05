<?php
  /**
   * Defines functions that are used to insert data into the EventAttendance entity
   * in the pub DB
   */
  class EventRegister
  {
    protected $pdo = null;

    // Constructor
    function __construct($pdo)
    {
      $this->pdo = $pdo;
    }

    // Check if user has already registered for Event already
    public function checkExists($userID, $eventID, $quantity){
      $ID = $this->getID($userID);

      // Prepare and execute statement to check whether already registered
      $sql = 'SELECT * FROM EventAttendance WHERE CustomerID = :userID AND EventID = :eventID';
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindParam(':userID', $ID);
      $stmt->bindParam(':eventID', $eventID);

      $stmt->execute();

      $event = $stmt->fetch(PDO::FETCH_ASSOC);

      // If exists send alert, else, register for event
      if($event) {
        return '0';
      }
      else {
        $out = $this->registerForEvent($ID, $eventID, $quantity);
        return $out;
      }
    }

    // Register for event
    private function registerForEvent($userID, $eventID, $quantity){
      // Prepare and execute INSERT statement
      $sql = "INSERT INTO EventAttendance VALUES('$eventID', '$userID', '$quantity')";
      $stmt = $this->pdo->prepare($sql);

      $stmt->execute();
      return '1';
    }

    private function getID($userID) {
      $sql = 'SELECT CustomerID FROM Customer WHERE Username = :userID';
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':userID', $userID);

      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      $ID = $user['CustomerID'];
      return $ID;
    }
  }
?>
