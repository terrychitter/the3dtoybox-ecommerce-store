<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <script src="removeParams.js"></script>
    <script
      src="https://kit.fontawesome.com/805e2252e6.js"
      crossorigin="anonymous"
    ></script>
    <title>The 3DToyBox</title>
  </head>
  <body>
    <?php include "header/header.php";
    include "popup/popup.php";?>
            <div id="promotions" class="promotions" data-carousel>
          <button class="carousel-button prev" data-carousel-button="prev">
              <i class="fa-solid fa-circle-chevron-left fa-xl"></i></i>
          </button>
          <button class="carousel-button next" data-carousel-button="next">
            <i class="fa-solid fa-circle-chevron-right fa-xl"></i>
          </button>
          <div class="carousel">
            <ul data-slides>
              <li class="promotional-slide" data-active>
                <img
                  src="https://media.discordapp.net/attachments/1085644871508971680/1112797089534062643/1.png?width=790&height=395"
                  alt=""
                  class="promotion-img"
                />
              </li>
              <li class="promotional-slide">
                <img
                  src="https://media.discordapp.net/attachments/1085644871508971680/1112797090389696562/2.png?width=790&height=395"
                  alt=""
                  class="promotion-img"
                />
              </li>
              <li class="promotional-slide">
                <img
                  src="https://media.discordapp.net/attachments/1085644871508971680/1112797091245338706/3.png?width=790&height=395"
                  alt=""
                  class="promotion-img"
                />
              </li>
            </ul>
          </div>
        </div>
    <main>
    <section class="categories">
      <h2>Search Categories</h2>
      <div class="categories-grid">
        <button class="category-button marvel"><a href="">Marvel</a></button>
        <button class="category-button dc"><a href="">DC</a></button>
        <button class="category-button anime"><a href="">Anime</a></button>
        <button class="category-button star-wars">
          <a href="">Star Wars</a>
        </button>
      </div>
    </section>
    <section class="featured">
      <h2>Featured Products</h2>
            <ul class="scroller product-scroller">
            <?php // Getting all featured products
            include "db_conn.php";
              $sql = "SELECT * FROM products WHERE featured=true";
              $result = mysqli_query($conn, $sql);
              
              while ($row = mysqli_fetch_assoc($result)) { ?>
              <li class="product-card" data-productId="<?php echo $row['product_id'] ?>">
                <img src="../product_images/<?php echo $row['product_id']?>.png" loading="lazy" alt="<?php echo $row['name']; ?>">
                <div class="add-to-wishlist">
                <i class="<?php if (isset($_SESSION['wishlist'])) {
                    if (in_array($row['product_id'], $_SESSION['wishlist'])) {
                      ?> fa-solid <?php } else  { echo "fa-regular"; }
                      } else {?>fa-regular <?php } ?>
                      fa-heart"></i>
                </div>
                <p class="product-name"><?php echo $row['name']; ?></p>
                <p class="product-desc">
                  <?php echo $row['description']; ?>
                </p>
                <p class="product-price">R 
                  <?php echo $row['price']; ?>
                </p>
                <button class="add-to-cart">Add to Cart</button>
              </li><?php } ?>
            </ul>
    </section>
      <section class="new">
      <h2>New Products</h2>
          <ul class="scroller product-scroller">
            <?php
            // Getting all new products
            $sql = "SELECT * FROM products WHERE new=true";
            $result = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <li class="product-card" data-productId="<?php echo $row['product_id'] ?>">
              <img src="../product_images/<?php echo $row['product_id']?>.png" loading="lazy" alt="<?php echo $row['name'];?>">
              <div class="add-to-wishlist">
                <i class="<?php if (isset($_SESSION['wishlist'])) {
                  if (in_array($row['product_id'], $_SESSION['wishlist'])) {
                    ?> fa-solid <?php } else  { echo "fa-regular"; }
                    } else {?>fa-regular <?php } ?>
                    fa-heart"></i>
              </div>
              <p class="product-name"><?php echo $row['name']; ?></p>
              <p class="product-desc">
                <?php echo $row['description']; ?>
              </p>
              <p class="product-price">R 
                <?php echo $row['price']; ?>
              </p>
              <button class="add-to-cart">Add to Cart</button>
            </li><?php } ?>
          </ul>
      </section>
    </main>
    <?php include "footer/footer.php" ?>
  </body>
</html>
