<?php
include_once 'classes/MYSQL_DB.php';


/**
 * A class to manage products
 */
class Product
{
  private $dataBase;

  public function __construct()
  {
    $this->dataBase = new MYSQL_DB();
  }

  public function all()
  {
    $products = $this->dataBase->getCon()->query("SELECT * FROM products", PDO::FETCH_ASSOC);
    return $products;
  }
}
