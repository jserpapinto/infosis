<?php

class user {

  //insert
  public function insert($id_role, $username, $password, $name, $picture, $active, $destination) {
    if ($this->valid($name, $username, $password)) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = 'INSERT INTO tUsers (id_role, username, password, name, picture ,active) VALUES ( :i, :u, :p, :n, :pic, :a)';
        $data = $con->prepare($sql);
        $data->bindvalue(':i', $id_role);
        $data->bindvalue(':u', $username);
        $data->bindvalue(':p', $password);
        $data->bindvalue(':n', $name);
        $data->bindvalue(':a', $active);
        //upload
        if ($_FILES[$picture]['size'] == 0) $pic = 'uploads/user_default.png'; //default image
        else {
          require_once 'libs/upload.php';
          $pic = uploadUPicture($picture, $username);
        }
        $data->bindvalue(':pic', $pic);
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
  public function update($id_user, $id_role, $username, $password, $name, $picture, $picture_old, $active, $destination) {
    if ($this->valid($name, $username, $password)) {
      try {
        require_once 'db.class.php';
        $db = new database();
        $con = $db->getCon();
        $sql = 'UPDATE tUsers SET id_role = :i, username = :u, password = :p, name = :n, picture = :pic, active = :a WHERE id_user = :id';
        $data = $con->prepare($sql);
        $data->bindvalue(':i', $id_role);
        $data->bindvalue(':u', $username);
        $data->bindvalue(':p', $password);
        $data->bindvalue(':n', $name);
        $data->bindvalue(':a', $active);
        $data->bindvalue(':id', $id_user);
        if ($_FILES[$picture]['size'] == 0) $pic = $picture_old; //old image
        else {
          require_once 'libs/upload.php';
          $pic = uploadUPicture($picture, $username);
          unlink($picture_old);
        }
        $data->bindvalue(':pic', $pic);
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
      $sql = 'DELETE FROM tUsers WHERE id_user = :i';
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
      $sql = 'SELECT id_role, username, name, password, picture, active FROM tUsers WHERE id_user = :i';
      $data = $con->prepare($sql);
      $data->bindvalue(':i', $id);
      $data->execute();
      $user = $data->fetch();
      return $user;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //list
  public function users($id_role = -1) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = 'SELECT tUsers.id_user, tRoles.role, tUsers.username, tUsers.name, tUsers.picture, tUsers.active FROM tUsers, tRoles WHERE tUsers.id_role = tRoles.id_role AND (tUsers.id_role = :id OR :id = -1) ORDER BY tRoles.role, tUsers.name';
      $data = $con->prepare($sql);
      $data->bindvalue(':id', $id_role);
      $data->execute();
      $users = $data->fetchAll();
      return $users;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //list by class
  public function usersClass($id_role = -1, $id_class) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = 'SELECT tUsers.id_user, tUsers.name, tUsers.picture, tUsers.active FROM tUsers, tRoles, tClassInscriptions WHERE tClassInscriptions.id_class = :idc AND tClassInscriptions.id_user = tUsers.id_user AND tUsers.id_role = tRoles.id_role AND (tUsers.id_role = :id OR :id = -1) ORDER BY tRoles.role, tUsers.name';
      $data = $con->prepare($sql);
      $data->bindvalue(':id', $id_role);
      $data->bindvalue(':idc', $id_class);
      $data->execute();
      $users = $data->fetchAll();
      return $users;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //login
  public function login($username, $password) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
  	  $sql = 'SELECT name, id_user, picture FROM tUsers WHERE username LIKE :u AND password LIKE :p AND active = true';
      $data = $con->prepare($sql);
 	    $data->bindvalue(':u', $username);
  	  $data->bindvalue(':p', $password);
  	  $data->execute();
  	  $user = $data->fetch();
      if (isset($user['id_user'])) {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['picture'] = $user['picture'];
      }
  	  return (isset($user['id_user'])) ? true : false;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }
  
  //logout
  public function logout($destination) {
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    if (isset($destination) && $destination != null) header('Location:' . $destination);
  }
  
  //verify login
  public function logged() {
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login']) return true;
    else {
      $this->logout('index.php?error2=true');
      return false;
    }
  }

  //verify existing user
  public function existUser($username) {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = 'SELECT id_user FROM tUsers WHERE username LIKE :u';
      $data = $con->prepare($sql);
      $data->bindvalue(':u', $username);
      $data->execute();
      $user = $data->fetch();
      return (isset($user['id_user'])) ? true : false;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //role enum
  public function roles() {
    try {
      require_once 'db.class.php';
      $db = new database();
      $con = $db->getCon();
      $sql = 'SELECT id_role, role FROM tRoles WHERE active = true ORDER BY id_role';
      $data = $con->prepare($sql);
      $data->execute();
      $roles = $data->fetchAll();
      return $roles;
    }
    catch (PDOException $e) {
      echo("Erro de ligação:" . $e);
      exit();
      return false;
    }
  }

  //validation
  public function valid($name, $username, $password) {
    require_once 'error.class.php';
    $e = new error();
    if (strlen($name) < 4) {
      echo $e->errorMessage('danger', 'Nome muito pequeno', "Tamanho mínimo 4 caracteres");
      return false;
    } elseif (strlen($username) < 4) {
      echo $e->errorMessage('danger', 'Utilizador já existe no sistema ou Nome de utilizador muito pequeno', "Utilizador <b>" . $username . "</b> já existente e tamanho mínimo 4 caracteres");
      return false;
    } elseif (strlen($password) < 4) {
      echo $e->errorMessage('danger', 'Password muito pequena', "Tamanho mínimo 4 caracteres");
      return false;
    }
    else return true;
  }

}

?>