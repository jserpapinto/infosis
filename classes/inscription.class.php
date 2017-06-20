<?php

class inscription {

  //insert
  public function insert($id_user, $id_class, $inscription_year, $destination) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = 'INSERT INTO tclassinscription (id_user, id_class, inscription_year) VALUES ( :idu, :idc, :iy)';
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

  //list by user
  public function inscription($id_user = -1, $year = -1) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = 'SELECT tDegrees.code as dcode, tClasses.code, tClasses.fullName, tclassinscription.inscription_year
        FROM tClasses, tDegrees, tusers, tclassinscription
        WHERE tclassinscription.id_user = tusers.id_user AND tclassinscription.id_class = tClasses.id_class AND tClasses.id_degree = tDegrees.id_degree AND (tclassinscription.id_user = :i OR tclassinscription.id_user = -1) AND (YEAR(tclassinscription.inscription_year) = :y OR YEAR(tclassinscription.inscription_year) = -1)
        ORDER BY tclassinscription.inscription_year, tClasses.code';
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
      $sql = 'SELECT tclassinscription.inscription_year
        FROM tClassInscription
        WHERE tClassInscription.id_user = :id OR :id = -1
        ORDER BY tclassinscription.inscription_year DESC';
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
  }
}

?>