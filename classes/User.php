<?php

class User {

  private $id;
  private $favCategories;
  private $MYSQL_DB;
  private $JSON_DB;

  public function __construct($id = 0)
  {
    $this->id = $id;
    $this->MYSQL_DB = new MYSQL_DB();
    $this->JSON_DB = new JSON_DB();
  }

  public function register()
  {
    $picToken = bin2hex(random_bytes(5));
    $data = array(
      'user_name' => strstr($_POST['email'],'@',true),
      'email' => $_POST['email'],
      'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
      'address' => $_POST['address'],
      'second_address' => $_POST['secondAddress'],
      'city' => $_POST['city'],
      'province' => $_POST['province'],
      'zip' => $_POST['zip'],
      'user_pic' => $picToken . $_POST['email'] . "." . pathinfo($_FILES['userPic']['name'], PATHINFO_EXTENSION),
      'fav_categories' => []
    );
    if ($_FILES['userPic']['error'] === 4) {
      $data['user_pic'] = "default-avatar.jpg";
    }

    move_uploaded_file($_FILES['userPic']['tmp_name'],"images/users/". $picToken . $_POST['email'] . "." . pathinfo($_FILES['userPic']['name'], PATHINFO_EXTENSION));

    $this->MYSQL_DB->addUser($data);
    $this->JSON_DB->addUser($data);
  }

  public function login($email, $pass, $remember)
  {
    if (!$user = $this->MYSQL_DB->findUser($email)) {
      return "Email y/o contraseña incorrectos";
    }
    if(password_verify($pass, $user['password'])){
      $_SESSION["login"] = true;
      $_SESSION["user"] = $user;
      if($remember){
        setcookie('login', 'true', time() + 60*60*24*30);
        setcookie('user', $user['email'], time() + 60*60*24*30);
      }
      header('Location: index.php');
    } else {
      return 'Email y/o contraseña incorrectos';
    }
  }

  public function updateFavCategories($categories, $email)
  {
    $this->MYSQL_DB->deleteFavCategories($this->id);
    $this->MYSQL_DB->addFavCategories($categories, $this->id);
    $this->JSON_DB->updateFavCategories($categories, $email);
  }

  public function getFavCategories()
  {
    return $this->favCategories;
  }

  public function setFavCategories($id)
  {
    try {
      $stmt = $this->MYSQL_DB->getCon()->prepare("SELECT fav_category_id FROM fav_category__user WHERE user_id = :id");
      $stmt->bindValue(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $categories = [];
      foreach ($results as $result) {
        $categories[] = $result['fav_category_id'];
      }

      $this->favCategories = $categories;

    } catch (\Exception $e) {
      $this->favCategories = $this->JSON_DB->findUser($_SESSION['user']['email'])['fav_categories'];
    }
  }

  public function getId()
  {
    return $this->id;
  }

  public function getMYSQL_DB()
  {
    return $this->MYSQL_DB;
  }
}
