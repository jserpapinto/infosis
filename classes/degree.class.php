<?php

class degree {
 
	//insert
  public function insert($id_degree_level, $code, $fullName, $destination) {
    if ($this->valid($code, $fullName)) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          INSERT INTO tDegrees (id_degree_level, code, fullName) 
          VALUES (:idl, :c, :n)';
        $data = $con->prepare($sql);
        $data->bindvalue(':idl', $id_degree_level);
        $data->bindvalue(':c', $code);
        $data->bindvalue(':n', $fullName);
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

  //insert level
  public function insertLevel($designation, $semesters, $destination) {
    if ($this->validLevel($destination)) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          INSERT INTO tDegreeLevels (designation, semesters) 
          VALUES (:d, :s)';
        $data = $con->prepare($sql);
        $data->bindvalue(':d', $designation);
        $data->bindvalue(':s', $semesters);
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

  //update
  public function update($id_degree, $id_degree_level, $code, $fullName, $destination) {
    if ($this->valid($code, $fullName)) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          UPDATE tDegrees 
          SET id_degree_level = :i, 
            code = :c, 
            fullName = :f 
          WHERE id_degree = :id';
        $data = $con->prepare($sql);
        $data->bindvalue(':i', $id_degree_level);
        $data->bindvalue(':c', $code);
        $data->bindvalue(':f', $fullName);
        $data->bindvalue(':id', $id_degree);
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

  //update level
  public function updateLevel($id_degree_level, $designation, $semesters, $destination) {
    if ($this->validLevel($designation)) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = '
          UPDATE tDegreeLevels 
          SET designation = :d, 
            semesters = :s
          WHERE id_degree_level = :id';
        $data = $con->prepare($sql);
        $data->bindvalue(':d', $designation);
        $data->bindvalue(':s', $semesters);
        $data->bindvalue(':id', $id_degree_level);
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
  public function delete($id, $destination) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        DELETE FROM tDegrees 
        WHERE id_degree = :i';
      $data = $con->prepare($sql);
      $data->bindvalue(':i', $id);
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

  // delete level
  public function deleteLevel($id, $destination) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        DELETE FROM tDegreeLevels 
        WHERE id_degree_level = :i';
      $data = $con->prepare($sql);
      $data->bindvalue(':i', $id);
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
  public function fetch($id) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT tDegrees.id_degree_level, 
          tDegrees.code, 
          tDegrees.fullName, 
          tDegreeLevels.semesters
        FROM tDegrees, tDegreeLevels
        WHERE tDegrees.id_degree_level = tDegreeLevels.id_degree_level
          AND tDegrees.id_degree = :i';
      $data = $con->prepare($sql);
      $data->bindvalue(':i', $id);
      $data->execute();
      $degree = $data->fetch();
      return $degree;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //list
  public function degrees($id_degree_level = -1) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT tDegrees.id_degree, 
          tDegreeLevels.designation, 
          tDegrees.code, 
          tDegrees.fullName,
          tDegreeLevels.semesters
        FROM tDegrees, tDegreeLevels 
        WHERE tDegrees.id_degree_level = tDegreeLevels.id_degree_level 
          AND (tDegrees.id_degree_level = :idl OR :idl = -1) 
        ORDER BY tDegrees.id_degree_level, tDegrees.fullName';
      $data = $con->prepare($sql);
      $data->bindvalue(':idl', $id_degree_level);
      $data->execute();
      $degrees = $data->fetchAll();
      return $degrees;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //verify degree level dependencies
  public function levelDepend($id_degree_level) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = '
        SELECT id_degree 
        FROM tDegrees 
        WHERE id_degree_level = :id';
      $data = $con->prepare($sql);
      $data->bindvalue(':id', $id_degree_level);
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

  //level enum
 	public function levels() {
    try {
    	require_once 'db.class.php';
    	$db = new database();
    	$con = $db->getCon();
    	$sql = '
        SELECT id_degree_level, 
          designation, 
          semesters
        FROM tDegreeLevels
        ORDER BY id_degree_level';
    	$data = $con->prepare($sql);
    	$data->execute();
    	$levels = $data->fetchAll();
    	return $levels;
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

  //validation level
  public function validLevel($designation) {
    require_once 'error.class.php';
    $e = new error();
    if (strlen($designation) < 3) {
      echo $e->errorMessage('danger', 'Designação muito pequena', "Tamanho mínimo 2 caracteres");
      return false;
    } 
    else return true;
  }

}

?>