<?php

class classs {

	//insert
  public function insert($id_degree, $code, $fullName, $credits, $hours, $active, $destination) {
    if ($this->valid($code, $fullName)) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          INSERT INTO tClasses (id_degree, code, fullName, credits, hours, active) 
          VALUES ( :i, :c, :n, :cd, :h, :a)';
        $data = $con->prepare($sql);
        $data->bindvalue(':i', $id_degree);
        $data->bindvalue(':c', $code);
        $data->bindvalue(':n', $fullName);
        $data->bindvalue(':cd', $credits);
        $data->bindvalue(':h', $hours);
        $data->bindvalue(':a', $active);
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
  }

  //update
  public function update($id_class, $id_degree, $code, $fullName, $credits, $hours, $active, $destination) {
    if ($this->valid($code, $fullName)) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          UPDATE tClasses 
          SET id_degree = :i, 
            code = :c, 
            fullName = :n, 
            credits = :cd, 
            hours = :h, 
            active = :a 
          WHERE id_class = :id';
        $data = $con->prepare($sql);
        $data->bindvalue(':i', $id_degree);
        $data->bindvalue(':c', $code);
        $data->bindvalue(':n', $fullName);
        $data->bindvalue(':cd', $credits);
        $data->bindvalue(':h', $hours);
        $data->bindvalue(':a', (isset($active) ? true : false));
        $data->bindvalue(':id', $id_class);
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
  public function delete($id_class, $destination) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        DELETE FROM tClasses 
        WHERE id_class = :i';
      $data = $con->prepare($sql);
      $data->bindvalue(':i', $id_class);
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
  public function fetch($id_degree) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT id_degree, 
          code, 
          fullName, 
          credits, 
          hours, 
          active 
        FROM tClasses 
        WHERE id_class = :i';
      $data = $con->prepare($sql);
      $data->bindvalue(':i', $id_degree);
      $data->execute();
      $class = $data->fetch();
      return $class;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //list
  public function classes($id_degree_level = -1, $id_degree = -1) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT tClasses.id_class, 
          tDegrees.code as dcode, 
          tClasses.code, 
          tClasses.fullName, 
          tClasses.credits, 
          tClasses.hours, 
          tClasses.active 
        FROM tClasses, tDegrees
        WHERE tDegrees.id_degree = tClasses.id_degree 
          AND (tClasses.id_degree = :id OR :id = -1) 
          AND (tDegrees.id_degree_level = :idl OR :idl = -1)
        ORDER BY tClasses.id_degree, tClasses.fullName';
      $data = $con->prepare($sql);
      $data->bindvalue(':id', $id_degree);
      $data->bindvalue(':idl', $id_degree_level);
      $data->execute();
      $classes = $data->fetchAll();
      return $classes;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //list for professors students
  public function classesUser($id_user = -1) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT tClasses.id_class, 
          tClasses.code, 
          tClasses.fullName, 
          tClasses.credits, 
          tClasses.hours, 
          tClasses.active
        FROM tClasses, tClassInscription
        WHERE tClasses.id_class = tClassInscription.id_class 
          AND (tClassInscription.id_user = :id OR :id = -1)
        ORDER BY tClasses.id_degree, tClasses.fullName';
      $data = $con->prepare($sql);
      $data->bindvalue(':id', $id_user);
      $data->execute();
      $classes = $data->fetchAll();
      return $classes;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //validation
  public function valid($code, $fullName) {
    require_once 'error.class.php';
    $e = new error();
    if (strlen($code) < 2) {
      echo $e->errorMessage('danger', 'Código muito pequeno', "Tamanho mínimo 2 caracteres");
      return false;
    } elseif (strlen($fullName) < 4) {
      echo $e->errorMessage('danger', 'Nome de curso muito pequeno', "Tamanho mínimo 4 caracteres");
      return false;
    }
    else return true;
  }

}

?>