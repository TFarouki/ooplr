<?php
  class User{
    private $_db;

    public function __construct(){
      $this->_db = Db::getInstance();
    }

    public function create($fields = array()){
      if(!$this->_db->insert('users',$fields)){
        throw new Exception('there was a problem when try creating your account');
      }
    }
  }
?>
