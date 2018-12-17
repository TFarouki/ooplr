
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>OOPLR</title>
  </head>
  <body>
    <?php
    require_once 'core/init.php';
    if(Input::exists()){
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'username' => array(
          'required' => true,
          'min' => 4,
          'max' => 20,
          'unique' => 'users'
        ),
        'password' => array(
          'required' => true,
          'min' => 6,
        ),
        'password_again' => array(
          'required' => true,
          'min' => 6,
          'matches' => 'password'
        ),
        'name' => array(
          'required' => true,
          'min' => 4,
          'max' => 50
        )
      ));

      if ($validation->passed()){
        echo "passed";
      }else{
        print_r($validation->errors());
      }
    }
    ?>
    <form class="" action="" method="post">
      <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="Username" value="<?php echo escape(Input::get('username'));?>" autocomplete="off">
      </div>
      <div class="field">
        <label for="password">choose a password</label>
        <input type="password" name="password" id="password">
      </div>
      <div class="field">
        <label for="password_again">Retape password again</label>
        <input type="password" name="password_again" id="password_again">
      </div>
      <div class="field">
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" value="<?php echo escape(Input::get('name'));?>">
      </div>
      <button type="submit" name="button" value="Register">Submit</button>
    </form>
  </body>
</html>
