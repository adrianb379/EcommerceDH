<?php
include_once 'classes/DB.php';

class MYSQL_DB implements DB {
  private $dsn = "mysql:host=127.0.0.1;dbname=iphone_db;port=3306;charset=utf8";
  private $user = "root";
  private $pass = "";
  private $con;

  public function __construct()
  {
    $this->con = new PDO($this->dsn, $this->user, $this->pass);
  }

  public function getCon()
  {
    return $this->con;
  }

  public function getUsers()
  {

  }

  public function findUser($requestedUser)
  {
    $stmt = $this->con->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue(":email", $requestedUser, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
      return $user;
    }else{
      return FALSE;
    }
  }

  public function addUser($data)
  {
    $stmt = $this->con->prepare("INSERT INTO users(email, password, address, second_address, city, province, zip, user_pic, user_name)
                                  VALUES (:email, :password, :address, :second_address, :city, :province, :zip, :user_pic, :user_name)");
    $stmt->bindValue(":email", $data['email'], PDO::PARAM_STR);
    $stmt->bindValue(":password", $data['password'], PDO::PARAM_STR);
    $stmt->bindValue(":address", $data['address'], PDO::PARAM_STR);
    $stmt->bindValue(":second_address", $data['second_address'], PDO::PARAM_STR);
    $stmt->bindValue(":city", $data['city'], PDO::PARAM_STR);
    $stmt->bindValue(":province", $data['province'], PDO::PARAM_STR);
    $stmt->bindValue(":zip", $data['zip'], PDO::PARAM_STR);
    $stmt->bindValue(":user_pic", $data['user_pic'], PDO::PARAM_STR);
    $stmt->bindValue(":user_name", $data['user_name'], PDO::PARAM_STR);

    if (!$stmt->execute()) {
      Echo "Hubo un error al cargar el usuario, intente de nuevo más tarde";
    }
  }

  public function deleteFavCategories($user_id)
  {
    $stmt = $this->con->prepare("DELETE FROM fav_category__user WHERE user_id = :id");
    $stmt->bindValue(":id", $user_id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function addFavCategories($categories, $id)
  {
    $stmt = $this->con->prepare("INSERT INTO fav_category__user(fav_category_id, user_id) VALUES(:fav_category_id, :user_id)");

    $stmt->bindValue(":user_id", $id, PDO::PARAM_INT);
    foreach ($categories as $category) {
      $stmt->bindValue(":fav_category_id", $category, PDO::PARAM_INT);

      $stmt->execute();
    }
  }

  public function updateUser_email($email, $id)
  {
    $stmt = $this->con->prepare("UPDATE users SET email = :email WHERE id = :id");
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_userName($userName, $id)
  {
    $stmt = $this->con->prepare("UPDATE users SET user_name = :user_name WHERE id = :id");
    $stmt->bindValue(":user_name", $userName, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_address($address, $id)
  {
    $stmt = $this->con->prepare("UPDATE users SET address = :address WHERE id = :id");
    $stmt->bindValue(":address", $address, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_secondAddress($secondAddress, $id)
  {
    $stmt = $this->con->prepare("UPDATE users SET second_address = :second_address WHERE id = :id");
    $stmt->bindValue(":second_address", $secondAddress, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_city($city, $id)
  {
    $stmt = $this->con->prepare("UPDATE users SET city = :city WHERE id = :id");
    $stmt->bindValue(":city", $city, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_province($province, $id)
  {
    $stmt = $this->con->prepare("UPDATE users SET province = :province WHERE id = :id");
    $stmt->bindValue(":province", $province, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }


  public function updateUser_zip($zip, $id)
  {
    $stmt = $this->con->prepare("UPDATE users SET zip = :zip WHERE id = :id");
    $stmt->bindValue(":zip", $zip, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_userPic($userPic, $id)
  {
    $stmt = $this->con->prepare("UPDATE users SET user_pic = :user_pic WHERE id = :id");
    $stmt->bindValue(":user_pic", $userPic, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_password($password, $id)
  {
    $stmt = $this->con->prepare("UPDATE users SET password = :password WHERE id = :id");
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

}
