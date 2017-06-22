<?php

class summary {

	//insert
  public function insert($id_class, $id_user, $class_n, $summary, $summary_date, $id_year, $attendancies, $students, $destination) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          INSERT INTO tSummarys (id_class, id_user, class_n, summary, summary_date, id_year) 
          VALUES (:idc, :idu, :cn, :s, :d, :idy)';
        $data = $con->prepare($sql);
        $data->bindvalue(':idc', $id_class);
        $data->bindvalue(':cn', $class_n);
        $data->bindvalue(':idc', $id_class);
        $data->bindvalue(':idy', $id_year);
        $data->bindvalue(':s', $summary);

        // handle date
        $date = date("Y-m-d H:i:s", strtotime($summary_date));
        $data->bindvalue(':d', $date);

        $data->execute();

        $id_summary = $data->lastInsertId();

        //insert attendancies
        foreach ($students as $id_userA) {
          $a = (in_array($id_userA, $attendancies)) ? 1 : 0;
            $sql = '
              INSERT INTO tAttendancies (id_summary, id_user, attendancy) 
              VALUES (:ids, :idu, :a)';
            $data = $con->prepare($sql);
            $data->bindvalue(':ids', $id_summary);
            $data->bindvalue(':idu', $id_userA);
            $data->bindvalue(':a', $a);
            $data->execute();
          }
        } 
        
        if ($destination != null) header('Location:' . $destination);
        return true;

      }
      catch (PDOException $e){
        echo("Erro de ligação:" . $e);
        exit();
        return false;
      }
  }

  //update
  public function update($id_summary, $summary, $id_user, $summary_date, $destination) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          UPDATE tSummarys 
          SET summary = :s, 
            summary_date = :d,
            id_user = :idu
          WHERE id_summary = :ids';
        $data = $con->prepare($sql);
        $data->bindvalue(':ids', $id_summary);
        $data->bindvalue(':s', $summary);

        // handle date
        $date = date("Y-m-d H:i:s", strtotime($summary_date));
        
        $data->bindvalue(':d', $date);
        $data->bindvalue(':idu', $id_user);
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

  //delete
  public function delete($id_summary, $destination) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        DELETE FROM tSummarys 
        WHERE id_summary = :ids';
      $data = $con->prepare($sql);
      $data->bindvalue(':ids', $id_summary);
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
  public function fetch($id_summary) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT tSummarys.id_class, 
          tSummarys.id_user, 
          tSummarys.summary, 
          tSummarys.summary_date, 
          tClasses.fullName, 
          tClasses.code
        FROM tSummarys, tClasses
        WHERE tClasses.id_class = tSummarys.id_class
          AND tSummarys.id_summary = :ids';
      $data = $con->prepare($sql);
      $data->bindvalue(':ids', $id_summary);
      $data->execute();
      $summary = $data->fetch();
      return $summary;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //list
  public function summarys($id_class) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT tSummarys.id_summary, 
          tUsers.name, 
          tSummarys.summary, 
          tSummarys.summary_date
        FROM tClassInscriptions, tSummarys, tUsers
        WHERE tClassInscriptions.id_class = :idc
          AND tClassInscriptions.id_class = tSummarys.id_class
          AND tSummarys.id_user = tUsers.id_user
        ORDER BY tSummarys.summary_date';
      $data = $con->prepare($sql);
      $data->bindvalue(':idc', $id_class);
      $data->execute();
      $summarys = $data->fetchAll();
      return $summarys;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //get sumarized class numbers
  public function summarized($id_class) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT class_n 
        FROM tSummarys
        WHERE id_class = :idc';
      $data = $con->prepare($sql);
      $data->bindvalue(':idc', $id_class);
      $data->execute();
      $summarys = $data->fetchAll();
      return $summarys;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

}

  ?>