<?php
  class showData {
    protected $pdo = null;

    public function __construct($pdo) {
      $this->pdo = $pdo;
    }

    public function output() {
      $sql = "SELECT * FROM event";
      $stmt = $this->pdo->query($sql);

      while($row = $stmt->fetch()){
        $mysqldate = strtotime($row['Details']);
        $details = date('jS M, yy - h:ia', $mysqldate);

        echo "<section class='info-container'>";
        echo "<img src='CSS/Images/pub.jpg' class='info-container-image' />";
        echo "<h1 class='info-container-header'>".$row['Name']."</h1>";
        echo "<h1 class='info-container-subheader'>".$details."</h1>";
        echo "<p class='info-container-text'>".$row['Description']."</p></section>";
      }
    }
  }
?>
