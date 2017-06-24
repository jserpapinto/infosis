<?php

class inscription {

  //insert
  public function insert($id_user, $id_class, $id_year, $destination) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      foreach ($id_user as $user) {
        foreach ($id_class as $class ) {
          $sql = '
            INSERT INTO tClassInscriptions (id_user, id_class, id_year) 
            VALUES (:idu, :idc, :iy)';
          $data = $con->prepare($sql);
          $data->bindvalue(':idu', $user);
          $data->bindvalue(':idc', $class);
          $data->bindvalue(':iy', $id_year);
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
    
  //delete
  public function delete($id_class_inscription, $destination) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        DELETE FROM tClassInscriptions
        WHERE id_class_inscription = :ici';
      $data = $con->prepare($sql);
      $data->bindvalue(':ici', $id_class_inscription);
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
    
  //list
  public function inscriptions($id_year = -1, $id_user = -1, $id_class = -1) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT tClassInscriptions.id_class_inscription,
          tYears.beginning,
          tYears.ending,
          tUsers.name,
          tRoles.role,
          tClasses.fullName
        FROM tClassInscriptions, tUsers, tRoles, tClasses, tYears
        WHERE tClassInscriptions.id_year = tYears.id_year
          AND tClassInscriptions.id_user = tUsers.id_user
          AND tUsers.id_role = tRoles.id_role
          AND tClassInscriptions.id_class = tClasses.id_class
          AND (tClassInscriptions.id_year = :idy OR :idy = -1)
          AND (tClassInscriptions.id_user = :idu OR :idu = -1)
          AND (tClassInscriptions.id_class = :idc OR :idc = -1)
        ORDER BY tRoles.role, tUsers.name, tClasses.fullName';
      $data = $con->prepare($sql);
      $data->bindvalue(':idy', $id_year);
      $data->bindvalue(':idu', $id_user);
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

}

?>