<?php

class inscription {

  //insert
  public function insert($id_user, $id_class, $inscription_year, $destination) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        INSERT INTO tClassInscriptions (id_user, id_class, inscription_year) 
        VALUES (:idu, :idc, :iy)';
      $data = $con->prepare($sql);
      $data->bindvalue(':idu', $id_user);
      $data->bindvalue(':idc', $id_class);
      $data->bindvalue(':iy', $inscription_year);
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

  //list
  public function inscriptions($id_class) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT tClassInscriptions.id_class_inscription, 
          tClassInscriptions.id_user, 
          tClassInscriptions.inscription_year, 
          tUsers.id_role,
          tUsers.name
        FROM tClassInscriptions, tUsers
        WHERE tClassInscriptions.id_class = :idc
          AND tClassInscriptions.id_user = tUsers.id_user
        ORDER BY tClassInscriptions.inscription_year, tUsers.name';
      $data = $con->prepare($sql);
      $data->bindvalue(':idc', $id_class);
      $data->execute();
      $inscriptions = $data->fetchAll();
      return $inscriptions;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }


  /*  
  //list by user
  public function inscription($id_user = -1, $year = -1) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = 'SELECT tDegrees.code as dcode, tClasses.code, tClasses.fullName, tClassInscriptions.inscription_year
        FROM tClasses, tDegrees, tUsers, tClassInscriptions
        WHERE tClassInscriptions.id_user = tUsers.id_user AND tClassInscriptions.id_class = tClasses.id_class AND tClasses.id_degree = tDegrees.id_degree AND (tClassInscriptions.id_user = :i OR tClassInscriptions.id_user = -1) AND (YEAR(tClassInscriptions.inscription_year) = :y OR YEAR(tClassInscriptions.inscription_year) = -1)
        ORDER BY tClassInscriptions.inscription_year, tClasses.code';
      $data = $con->prepare($sql);
      $data->bindvalue(':i', $id_user);
      $data->bindvalue(':y', $year);
      $data->execute();
      $inscription = $data->fetchAll();
      return $inscription;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //list inscription years by user
  public function inscriptionYears($id_user = -1) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = 'SELECT tClassInscriptions.inscription_year
        FROM tClassInscriptions
        WHERE tClassInscriptions.id_user = :id OR :id = -1
        ORDER BY tClassInscriptions.inscription_year DESC';
      $data = $con->prepare($sql);
      $data->bindvalue(':id', $id_user);
      $data->execute();
      $i_years = $data->fetchAll();
      return $i_years;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }*/


}

?>