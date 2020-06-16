<?php
  require "header.php";
?>

  <main>
    <h1>Signup</h1>
    <form action="include/signup.inc.php" method="post">
      <input type="text" name="uid" placeholder="Username">
      <input type="text" name="mail" placeholder="E_mail">
      <input type="password" name="pwd" placeholder="password">
      <input type="password" name="pwd_repeat" placeholder="Repeat password">
      <button type="submit" name="signup_submit">signup</button>
    </form>
  </main>

<?php
  require "footer.php";
?>