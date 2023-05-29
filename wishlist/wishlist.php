<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wishlist</title>
    <link rel="stylesheet" href="style.css" />
    <script src="../removeParams.js"></script>
    <script
      src="https://kit.fontawesome.com/805e2252e6.js"
      crossorigin="anonymous"
    ></script>
    <script src="script.js" defer></script>
  </head>
  <body>
    <?php include "../header/header.php";
    include "../popup/popup.php";?>
    <main>
      <section class="wishlist-decor">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 50 50"
          enable-background="new 0 0 50 50"
          width="128px"
          height="128px"
        >
          <path
            d="M25 39.7l-.6-.5C11.5 28.7 8 25 8 19c0-5 4-9 9-9 4.1 0 6.4 2.3 8 4.1 1.6-1.8 3.9-4.1 8-4.1 5 0 9 4 9 9 0 6-3.5 9.7-16.4 20.2l-.6.5zM17 12c-3.9 0-7 3.1-7 7 0 5.1 3.2 8.5 15 18.1 11.8-9.6 15-13 15-18.1 0-3.9-3.1-7-7-7-3.5 0-5.4 2.1-6.9 3.8L25 17.1l-1.1-1.3C22.4 14.1 20.5 12 17 12z"
            fill="black"
          />
        </svg>
      </section>
      <section class="wishlist-items">
        <ul class="scroller">
          <div class="no-items">
            <img
              src="https://media.discordapp.net/attachments/1085644871508971680/1097878753037799424/my-image.png?width=662&height=662"
              width="200px"
              height="200px"
              alt=""
            />
            <h2>Oops! Your Wishlist is empty!</h2>
            <p>Explore more and add some goodies to the list</p>
            <a href="../shop/shop.php" class="start-shopping">Start Shopping</a>
          </div>
          <?php // Getting all wishlist items
          if (!empty($_SESSION['wishlist'])) {
            include '../db_conn.php';
            $wishlistIds = implode(',', $_SESSION['wishlist']);
            $sql = "SELECT * FROM products WHERE product_id IN ($wishlistIds)";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) { ?>
          <li class="wishlist-item" data-productId="<?php echo $row['product_id'];?>">
            <div class="col1">
              <div class="col1-col1">
                <i class="fa-solid fa-trash fa-lg"></i>
                <img src="../product_images/<?php echo $row['product_id'];?>.png" alt="" />
              </div>
              <div class="col1-col2">
                <p><?php echo $row['name']; ?></p>
                <p>R <?php echo $row['price']; ?></p>
              </div>
            </div>
            <div class="col2">
              <button class="add-to-cart">
                <i class="fa-solid fa-cart-shopping fa-rg"></i>
                <p class="add-to-cart-text">Add to Cart</p>
                <i class="fa-solid fa-check"></i>
              </button>
            </div>
          </li>
          <?php } }?>
        </ul>
      </section>
    </main>
    <?php include "../footer/footer.php"; ?>
  </body>
</html>
