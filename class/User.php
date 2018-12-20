<?php
  class User{
    private $_db,
            $_data,
            $_sessionName,
            $_IsLoggedIn;
    public function __construct($user = null){
      $this->_db = Db::getInstance();
      $this->_sessionName = Config::get("session/session_name");
      if(!$user){
        if(Session::exists($this->_sessionName)){
          $user = Session::get($this->_sessionName);
          if($this->find($user)){
            $this->_IsLoggedIn = true;
          }else{
            //logout
          }
        }
      }else{
        $this->find($user);
      }
    }

    public function create($fields = array()){
      if(!$this->_db->insert('users',$fields)){
        throw new Exception('there was a problem when try creating your account');
      }
    }

    public function find($user){
      $field = (is_numeric($user))?"id":"username";
      $data = $this->_db->get('users',array($field , "=", $user));

      if ($data->count()) {
        $this->_data = $data->first();
        return true;
      }
      return false;
    }

    public function login($username=null,$password=null){
      if($this->find($username)){
        if ($this->data()->password === Hash::make($password,$this->data()->salt)){
          Session::put($this->_sessionName,$this->data()->id);
          return true;
        }
      }
      return false;
    }

    public function data($value=''){
      return $this->_data;
    }

    public function isLoggedIn(){
      return $this->_IsLoggedIn;
    }

    public function logout(){
      Session::delete($this->_sessionName);
    }
  }
?>
