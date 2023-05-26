<!DOCTYPE html>
<html>
  <head>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Overpass&display=swap");

      ::selection {
        background-color: gold;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Overpass", sans-serif;
        font-size: 1.04rem;
      }

      .popup {
        position: fixed;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #f1f1f1;
        padding: 10px;
        text-align: center;
        z-index: 9999;
        opacity: 0;
        transition: top 0.5s ease-in-out, opacity 0.5s ease-in-out;
        min-width: 70%;
        max-width: 90%;
        border-radius: 5px;
      }

      .popup.error {
        background-color: lightcoral;
        color: darkred;
      }

      .popup.success {
        background-color: palegreen;
        color: green;
      }

      .popup.show {
        top: 10px;
        opacity: 1;
      }
    </style>
  </head>
  <body>
    <?php if (isset($_GET['error']) || isset($_GET['success'])) { ?>
    <div id="popup" class="popup <?php if (isset($_GET['error'])) {?> error <?php } else {?> success <?php }?>">
      <span id="popup-text"><?php if (isset($_GET['error'])) {echo $_GET['error'];} else {echo $_GET['success'];}?></span>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var popup = document.getElementById("popup");

        // Show the popup
        function showPopup() {
          popup.classList.add("show");
        }

        // Hide the popup
        function hidePopup() {
          popup.classList.remove("show");
        }

        // Set timeout to hide the popup after 6 seconds
        setTimeout(function () {
          hidePopup();
        }, 6000);

        // Display the popup
        showPopup();
      });
    </script>
    <?php } ?> 
  </body>
</html>
