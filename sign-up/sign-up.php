<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>THE3DToyBox - Sign In</title>
    <script src="../removeParams.js"></script>
    <script defer src="script.js"></script>
  </head>
  <body>
    <div class="img-container">
      <img
        src="https://media.discordapp.net/attachments/1085644871508971680/1097858040243421294/logo4_18_141534.png?width=677&height=677"
        alt="The3dToyBox logo"
        class="logo"
      />
    </div>
    <form action="../create_account.php" method="post" id="create-account-form">
      <h1>Sign Up</h1>
      <p>Create your account to be able to purchase products from our site.</p>
      <div class="inputs">
      <?php if (isset($_GET['error'])) { ?>
        <div class="error"><?php echo $_GET['error']; ?></div>
      <?php } ?>
        <div class="form-control">
          <input
            type="text"
            name="username"
            id="username"
            placeholder="Username *"
            required
          />
          <label for="first-name">Error Message</label>
        </div>
        <div class="form-control">
          <input
            type="tel"
            name="phone"
            id="phone"
            placeholder="Phone Number *"
            pattern="\d{3}-\d{3}-\d{4}"
            required
          />
          <label for="phone">Error Message</label>
        </div>
        <div class="form-control">
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Email *"
            required
          />
          <label for="email">Error Message</label>
        </div>
        <div class="form-control">
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password *"
            required
          />
          <label for="password">Error Message</label>
        </div>
      </div>
      <p class="already">
        Already have an account?
        <a href="/sign-in/sign-in.php" class="create">Sign In</a>
      </p>
      <button type="submit" id=submission-button>Create Account</button>
    </form>
  </body>
</html>
