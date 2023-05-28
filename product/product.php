<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Name</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <script src="../removeParams.js" defer></script>
    <script
      src="https://kit.fontawesome.com/805e2252e6.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <?php
     if (!isset($_GET['product_id'])) {
       header("Location: ../index.php?error=No Item ID");
       exit();
     }
    include "../header/header.php";
    include "../popup/popup.php";
    // Get the item
    include "../db_conn.php";
    $productId = $_GET['product_id'];

    $sql = "SELECT * FROM products WHERE product_id='$productId'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    ?>
    <main>
      <section class="product-img">
        <img
        src="../product_images/<?php echo $row['product_id']?>.png" loading="lazy"
          alt="product"
        />
        <div class="share">
          <i class="fa-solid fa-share-nodes fa-lg"></i>
        </div>
      </section>
      <section class="product-details" data-productID="<?php echo $row['product_id']; ?>">
        <div class="row-1">
          <h1><?php echo $row['name']; ?></h1>
          <i class="<?php if (isset($_SESSION['wishlist'])) {
                  if (in_array($row['product_id'], $_SESSION['wishlist'])) {
                    ?> fa-solid <?php } else  { echo "fa-regular"; }
                    } else {?>fa-regular <?php } ?>
                    fa-heart fa-xl" style="color: crimson;"></i>
        </div>
        <hr />
        <span class="price">R <?php echo $row['price']; ?></span>
        <p class="product-desc"><?php echo $row['description']; ?></p>
        <?php if (isset($_SESSION['cart'])) {
          if (!in_array($row['product_id'], $_SESSION['cart'])) { ?>
           <button class="add-to-cart">
          <i class="fa-solid fa-cart-shopping fa-rg"></i>
          <p>Add to Cart</p>
        </button> <?php } else { ?>
        <button class="add-to-cart remove">
          <p>Remove from Cart</p>
        </button> <?php }} else { ?>
          <button class="add-to-cart">
          <i class="fa-solid fa-cart-shopping fa-rg"></i>
          <p>Add to Cart</p>
        </button> <?php } ?>
      </section>
    </main>
    <?php include "../footer/footer.php"; ?>
  </body>
</html>
