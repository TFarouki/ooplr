<?php
  session_start();
  $GLOBALS['config'] = array(
    'MariaDB' => array(
      'host' => '127.0.0.1:3307',
      'username' => 'root',
      'password' => '',
      'db' => 'lr'
    ),
    'remember' =>  array(
      'cookie_name' => 'hash',
      'cookie_expiry' => 604800
    ),
    'session' => array(
      'session_name' => 'user',
    )
  );
  spl_autoload_register(function($class){
    require_once 'class/' . $class . '.php' ;
  });

  require_once 'function/sanitize.php';
?>
