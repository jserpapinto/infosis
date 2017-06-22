<?php

class year {
 
  //insert
  public function insert($beginning, $ending, $current, $destination) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();

        // remove current 
        if ($current) {
          $sql = '
          UPDATE tYears
          SET current = 0
          ';
          $data = $con->prepare($sql);
          $data->execute();
        }

        // Insert year
        $sql = '
          INSERT INTO tYears (beginning, ending, current) 
          VALUES (:b, :e, :c)';
        $data = $con->prepare($sql);

        // handle dates
        $beginning = date("Y-m-d H:i:s", strtotime($beginning));
        $ending = date("Y-m-d H:i:s", strtotime($ending));

        $data->bindvalue(':b', $beginning);
        $data->bindvalue(':e', $ending);
        $data->bindvalue(':c', $current);
        $data->execute();
        if ($destination != null) header('Location:' . $destination);
        return true;
      }
      catch (PDOException $e) {
        echo("Erro de ligação:" . $e);
        exit();
        return false;
      }
  }

  //update
  public function update($id_year, $beginning, $ending, $current, $destination) {
    if ($this->valid($code, $fullName)) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();

        // remove current 
        if ($current) {
          $sql = '
          UPDATE tYears
          SET current = 0
          ';
          $data = $con->prepare($sql);
          $data->execute();
        }

        // Insert year
        $sql = '
          UPDATE tYears
          SET beginning = :b, 
            ending = :e, 
            current = :c
          WHERE id_year = :id
          ';
        $data = $con->prepare($sql);

        // handle dates
        $beginning = date("Y-m-d H:i:s", strtotime($beginning));
        $ending = date("Y-m-d H:i:s", strtotime($ending));

        $data->bindvalue(':id', $id_year);
        $data->bindvalue(':b', $beginning);
        $data->bindvalue(':e', $ending);
        $data->bindvalue(':c', $current);
        $data->execute();
        if ($destination != null) header('Location:' . $destination);
        return true;
      }
      catch (PDOException $e) {
        echo("Erro de ligação:" . $e);
        exit();
        return false;
      }
    }
  }

  //delete
  public function delete($id_year, $destination) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        DELETE FROM tYears 
        WHERE id_year = :id';
      $data = $con->prepare($sql);
      $data->bindvalue(':id', $id_year);
      $data->execute();
      if ($destination != null) header('Location:' . $destination);
      return true;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //fetch
  public function fetch($id_year) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT beginning, ending, current
        FROM tYears
        WHERE id_year = :id';
      $data = $con->prepare($sql);
      $data->bindvalue(':id', $id_year);
      $data->execute();
      $year = $data->fetch();
      return $year;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //list
  public function years() {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT id_year, beginning, ending, current
        FROM tYears 
      ';
      $data = $con->prepare($sql);
      $data->execute();
      $years = $data->fetchAll();
      return $years;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //verify years class_inscription dependencies
  public function yearDepend($id_year) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT id_class_inscription
        FROM tclassinscriptions
        WHERE id_year = :id';
      $data = $con->prepare($sql);
      $data->bindvalue(':id', $id_year);
      $data->execute();
      $degree = $data->fetch();
      return ($degree);
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

}

?>