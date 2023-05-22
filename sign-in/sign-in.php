<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>THE3DToyBox - Sign In</title>
    <script
      src="https://kit.fontawesome.com/805e2252e6.js"
      crossorigin="anonymous"
    ></script>
    <script src="script.js" defer></script>
  </head>
  <body>
    <div class="img-container">
      <img
        src="https://media.discordapp.net/attachments/1085644871508971680/1097858040243421294/logo4_18_141534.png?width=677&height=677"
        alt="The3dToyBox logo"
        class="logo"
      />
    </div>
    <form action="../login.php" method="post">
      <h1>Sign In</h1>
      <p>Stay updated on new and exciting products.</p>
      <div class="inputs">
        <?php if (isset($_GET['error'])) {?>
          <div class="error"><?php echo $_GET['error']; ?></div>
          <?php } ?>
        <div class="form-control">
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Email or Phone"
            required
          />
        </div>
        <div class="form-control">
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password"
            required
          />
          <i class="fa-solid fa-eye-slash fa-lg password-eye" onclick="togglePasswordVisibility();" id="password-eye"></i>
        </div>
      </div>
      <button class="forgot">Forgot Password?</button>
      <button type="submit">Sign In</button>
      <p>
        Don't have an account?
        <a href="/sign-up/sign-up.php" class="create">Create One.</a>
      </p>
    </form>
  </body>
</html>
