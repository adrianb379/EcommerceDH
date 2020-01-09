<?php

spl_autoload_register(function ($className)
{
  require_once "classes/". $className . ".php";
});

include 'includes/functions.inc.php';

session_start();
