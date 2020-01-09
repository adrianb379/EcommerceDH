<?php

class JSON_DB implements DB {

  public function getUsers()
  {
    $users = file_get_contents('json/users.json');
    return json_decode($users, true);
  }

  public function addUser($user)
  {
    $users = $this->getUsers();
    $users[] = $user;
    $users = json_encode($users);
    file_put_contents('json/users.json', $users);
  }

  public function findUser($requestedUser)
  {
    $users = $this->getUsers();

    foreach ($users as $user) {
      if ($user['email'] === $requestedUser) {
        return $user;
      }
    }
    return FALSE;
  }

  public function updateFavCategories($categories, $email)
  {
    $users = $this->getUsers();

    foreach ($users as $key => $userInDB) {
      if($userInDB['email'] == $email){
        $userInDB['fav_categories'] = $categories;
        $users[$key] = $userInDB;
      }
    }
    $users = json_encode($users);
    file_put_contents('json/users.json', $users);
  }
}
