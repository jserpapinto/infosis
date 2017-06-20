<?php

class summary {

	//insert
  public function insert($id_class, $id_user, $summary, $class_date, $destination) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          INSERT INTO tSummarys (id_class, id_user, summary, class_date) 
          VALUES (:idc, :idu, :s, :d)';
        $data = $con->prepare($sql);
        $data->bindvalue(':idc', $id_class);
        $data->bindvalue(':idu', $id_user);
        $data->bindvalue(':s', $summary);
        $data->bindvalue(':d', $class_date);
        $data->execute();
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
  public function update($id_summary, $summary, $id_user, $class_date, $destination) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          UPDATE tSummarys 
          SET summary = :s, 
            class_date = :d,
            id_user = :idu
          WHERE id_summary = :ids';
        $data = $con->prepare($sql);
        $data->bindvalue(':ids', $id_summary);
        $data->bindvalue(':s', $summary);
        $data->bindvalue(':d', $class_date);
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
        SELECT id_class, id_user, summary, class_date 
        FROM tSummarys 
        WHERE id_summary = :ids';
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
          tSummarys.class_date
        FROM tClassInscriptions, tSummarys, tUsers
        WHERE tClassInscriptions.id_class = :idc
          AND tClassInscriptions.id_class = tSummarys.id_class
          AND tSummarys.id_user = tUsers.id_user
          OR tClassInscriptions.id_user = -1
        ORDER BY tSummarys.class_date';
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