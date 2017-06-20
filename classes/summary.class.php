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
  public function update($id_summary, $summary, $class_date, $destination) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          UPDATE tSummarys 
          SET summary = :s, 
            class_date = :d 
          WHERE id_summary = :ids';
        $data = $con->prepare($sql);
        $data->bindvalue(':ids', $id_summary);
        $data->bindvalue(':s', $summary);
        $data->bindvalue(':d', $class_date);
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
<<<<<<< HEAD
      $sql = 'SELECT tDegrees.code as dcode, tSummarys.id_summary, tClasses.code, tClasses.fullName, tUsers.name, tSummarys.summary, tSummarys.class_date
        FROM tClasses, tDegrees, tUsers, tSummarys, tClassInscriptions
        WHERE tSummarys.id_user = tUsers.id_user AND tSummarys.id_class = tClasses.id_class AND tClasses.id_degree = tDegrees.id_degree AND tSummarys.id_user = tClassInscriptions.id_user AND (tClassInscriptions.id_user = :i OR tClassInscriptions.id_user = -1)
        ORDER BY tSummarys.class_date, tClasses.code';
=======
      $sql = '
        SELECT tSummarys.id_summary, 
          tUsers.name, 
          tSummarys.summary, 
          tSummarys.class_date
        FROM tClassInscriptions, tSummarys, tUsers
        WHERE tClassInscriptions.id_class = :idc
          AND tClassInscriptions.id_class = tSummarys.id_class
          AND tSummarys.id_user = tUsers.id_user
          OR tClassInscriptions.id_user = -1)
        ORDER BY tSummarys.class_date';
>>>>>>> bc94a4fc6979cd472dc2aa8a061d6b8187e32a2c
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