<?php
session_start();
$email = $_SESSION['email'];
if($email == false){
  header('Location: sign-up.php');
} else {

  $to = $email;
  $subject = "OTP Code - The3dToyBox";
  $headers = 'From: support@the3dtoybox.com';
  $message = '<!doctype html>
  <html>
    <head>
      <meta name="viewport" content="width=device-width" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Verification Code</title>
    </head>
    <style>
    /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      @import url("https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Overpass&display=swap");
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #eaebed;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

     body::before {
  content: "";
  background: url("https://media.discordapp.net/attachments/1085644871508971680/1103343395163885578/terryc_visual_effects_doodle_style_minimalistic_white_c3e62385-d02e-485b-b828-8d20e351f2c2.png?width=677&height=677");
  position: absolute;
  top: 0px;
  right: 0px;
  bottom: 0px;
  left: 0px;
  opacity: 0.2;
  z-index: -999;
} 

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        min-width: 100%;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #eaebed;
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; 
      }

      .header {
        padding: 20px 0;
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #9a9ea6;
          font-size: 12px;
          text-align: center; 
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #06090f;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #ec0867;
        text-decoration: underline; 
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        min-width: 100%;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          min-width: auto;
          width: auto; 
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; 
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #ec0867;
          border-radius: 5px;
          box-sizing: border-box;
          color: #ec0867;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }

      .btn-primary a {
        background-color: #ec0867;
        border-color: #ec0867;
        color: #ffffff; 
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; 
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; 
        }
        table[class=body] .content {
          padding: 0 !important; 
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table[class=body] .btn table {
          width: 100% !important; 
        }
        table[class=body] .btn a {
          width: 100% !important; 
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        .btn-primary a:hover {
          background-color: #d5075d !important;
          border-color: #d5075d !important; 
        } 
      }

input {
    border: solid 2px gold;
    border-radius: 5px;
    padding: 0.5rem;
    text-align: center;
    letter-spacing: 1rem;
    font-weight: bold;
}

input :focus {
    border-color: gold;
}
    </style>
    <body class="">
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
          <td>&nbsp;</td>
          <td class="container">
            <div class="header">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="align-center">
                    <a href="https://the3dtoybox.com"><img src="https://media.discordapp.net/attachments/1085644871508971680/1097857675150241872/logo4_18_22549.png?width=677&height=677" height="250" alt="The3DToyBox"></a>
                  </td>
                </tr>
              </table>
            </div>
            <div class="content">
  
              <!-- START CENTERED WHITE CONTAINER -->
              <span class="preheader">Here is your OTP - The3DToyBox</span>
              <table role="presentation" class="main">
  
                <!-- START MAIN CONTENT AREA -->
                <tr>
                  <td class="wrapper">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <p>Hi '.$_SESSION['username']. ',</p>
                          <p>Welcome to The3DToyBox! Your account has already been set up. You email verifcation code is below. Glad to have you!</p>
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                            <tbody>
                              <tr>
                                <td align="left">
                                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                      <tr>
                                        <td><input value="' .$_SESSION['otp'] .'" readonly></td>
                                      </tr>
                                    </tbody>
                                  </table>
                      </tr>
                    </table>
                  </td>
                </tr>
  
              <!-- END MAIN CONTENT AREA -->
              </table>
  
              <!-- START FOOTER -->
              <div class="footer">
              </div>
              <!-- END FOOTER -->
  
            <!-- END CENTERED WHITE CONTAINER -->
            </div>
          </td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </body>
  </html>
  ';

  // Send email
   if (!mail($to, $subject, $message, $headers)) {
     header("Location: ../index.php?error=Failed to send email verification code");
     exit();
   }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OTP Verification</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Overpass&display=swap");

      :root {
        --grain: #d7cec7;
        --blackboard: #565656;
        --oxblood: #76323f;
        --tan: #c09f80;
        --banana: rgb(252, 239, 169);
        --light-gray: rgb(233, 233, 233);
        --gray: rgb(212, 212, 212);
      }

      ::selection {
        background-color: gold;
      }

      html {
        height: 100vh;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Overpass", sans-serif;
        font-size: 1.04rem;
      }

      h1 {
        font-family: "Josefin Sans", sans-serif;
        text-transform: uppercase;
        font-size: 1.5rem;
        margin-bottom: 1rem;
      }

      i {
        color: var(--blackboard);
      }

      body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        padding-inline: 1rem;
      }

      body::before {
        content: "";
        background: url("https://media.discordapp.net/attachments/1085644871508971680/1097570295260389407/terryc_toys_doodle_style_yellow_8019458a-59bf-4e82-860d-49cb6ee8ac0c.png?width=677&height=677");
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        z-index: -999;
      }

      button {
        color: #fff;
        background-color: #ffd700;
        padding: 10px 10px;
        border: solid #ffd700 1px;
        box-shadow: rgb(0, 0, 0) 0px 0px 0px 0px;
        border-radius: 12px;
        transition: 375ms;
        display: flex;
        flex-direction: row;
        align-items: center;
        cursor: pointer;
      }

      button:hover {
        transition: 375ms;
        padding: 7px 12px;
        background-color: #fff;
        color: #ffd700;
        border: solid 1px #ffd700;
      }

      input {
        display: flex;
        width: 100%;
        border-radius: 5px;
        padding: 0.5rem;
        border: solid 1px var(--gray);
        outline: none;
        transition: box-shadow 0.25s;
        margin-bottom: 1rem;
      }

      input:focus {
        box-shadow: 0 0 2px var(--banana);
        border: 1px solid gold;
      }

      input::placeholder {
        color: rgb(94, 94, 94);
      }

      main {
        border-radius: 10px;
        border: 1px solid var(--light-gray);
        text-align: center;
        background-color: white;
        padding: 2rem;
        max-width: 400px;
        box-shadow: 10px 10px 11px -5px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 10px 10px 11px -5px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 10px 10px 11px -5px rgba(0, 0, 0, 0.3);
      }

      .error,
      .success {
        padding: 5px;
        text-align: center;
        border-radius: 5px;
        margin-bottom: 0.5rem;
      }

      .error {
        display: none;
        background-color: crimson;
        color: darkred;
      }

      .success {
        background-color: lightgreen;
        color: green;
      }

      .submit-code {
        width: 200px;
        justify-content: center;
        margin: auto;
      }
    </style>
  </head>
  <body>
    <main>
      <h1>OTP Verification</h1>
      <div class="error">Error Text</div>
      <div class="success">
        We've sent a verification code to your email (<?php echo $email ?>)
      </div>
      <form action="" method="post">
        <input type="text" placeholder="Enter verification code" />
        <button type="submit" class="submit-code">Submit</button>
      </form>
    </main>
  </body>
</html>
