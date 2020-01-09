<?php

interface DB {

  public function addUser($data);

  public function getUsers();

  public function findUser($email);
}
