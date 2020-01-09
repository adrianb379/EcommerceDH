<?php

include_once 'classes/JSON_DB.php';
include_once 'classes/MYSQL_DB.php';

/**
 * Validaciones de input de usuario
 */
class Validator
{

  private $errors;
  private $JSON_DB;
  private $MYSQL_DB;

  public function __construct()
  {
    $this->errors = [];
    $this->JSON_DB = new JSON_DB();
    $this->MYSQL_DB = new MYSQL_DB();
  }

  public function validateEmail($email)
  {
    if (!$email) {
      $this->errors['email'] = 'Por favor, ingrese su dirección de email';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->errors['email'] = "El email es inválido";
    } else if ($this->MYSQL_DB->findUser($email) !== FALSE){
      $this->errors['email'] = "Este email ya pertenece a un usuario";
    }
  }

  public function validatePassword($value)
  {
    if (!$value) {
      $this->errors['password'] = "Por favor, elija una contraseña";
    } else if (!(strlen($value) >= 6)) {
      $this->errors['password'] = "La contraseña debe tener al menos 6 caracteres";
    }
  }

  public function validateAddress($value)
  {
    if (!$value) {
      $this->errors['address'] = "Por favor, ingrese su dirección";
    }
  }

  public function validateZip($value)
  {
    if (!$value) {
      $this->errors['zip'] = "Por favor, ingrese su código postal";
    }
  }

  public function validateUserPic($value)
  {
    $ext = pathinfo($value['name'], PATHINFO_EXTENSION);

    if ($value['error'] == 1) {
      $this->errors['userPic'] = 'La imagen no debe pesar mas de 2mb';
    } else if ($value['error'] !== 0 and $value['error'] !== 4) {
      $this->errors['userPic'] = 'Hubo un error al cargar el archivo';
    } else if ($ext != "" && $ext != "jpeg" && $ext != "jpg" && $ext != "png"){
      $this->errors['userPic'] = 'La imagen debe estar en formato PNG, JPG o JPEG';
    }
  }

  public function validateUserName($userName)
  {
    if (strlen($userName) < 4 || !preg_match("/[a-z]{2,}/i", $userName)) {
      $this->errors['userName'] = "El nombre de usuario debe tener más de 4 caracteres y al menos dos letras";
    }
  }

  public function getErrors()
  {
    return $this->errors;
  }
}
