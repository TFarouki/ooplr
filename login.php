<!DOCTYPE html>
<?php
  require_once 'core/init.php';




  if (Input::exists()) {
    if(Token::check(Input::get("token"))){
      $validate = new Validate();
      $validation = $validate->check($_POST,array(
        "username" => array('required' => true,'max' => 20),
        "password" => array('required' => true, 'max' => 30)
      ));
      if($validation->passed()){
        $user = new User();
        if($user->login(Input::get("username"),Input::get("password"))){
          Redirect::to("index.php");
        }else{
          echo "Sorry, username and password are inccorect ,please try again.";
        }
      }else{
        foreach ($validation->errors() as $error) {
          echo "<p>". $error . "</p>";
        }
      }
    }
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>OOPLR</title>
  </head>
  <body>
    <form class="" action="" method="post">
      <div class="field">
        <label for="username">username</label>
        <input type="text" name="username" id="username" value="">
      </div>
      <div class="field">
        <label for="passwprd">password</label>
        <input type="password" name="password" id="password" value="">
      </div>
      <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>">
      <button type="submit" name="submit">submit</button>
    </form>
  </body>
</html>
