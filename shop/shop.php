  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>The 3DToyBox Shop</title>
      <link rel="stylesheet" href="style.css" />
      <script src="script.js" defer></script>
    </head>
    <body>
    <!-- <script src="../removeParams.js" defer></script> -->
      <script
        src="https://kit.fontawesome.com/805e2252e6.js"
        crossorigin="anonymous"
      ></script>
      <?php include "../header/header.php";
      include "../popup/popup.php";?>
      <main>
        <div id="categories" class="categories">
          <h2>Go to Category</h2>
          <ul>
            <li class="new-category">
              <a href="#new">New</a>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="featured-category">
              <a href="#featured">Featured</a>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li>
              <a href="#mini-figures">Miniature-Figurines</a>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li>
              <a href="#collectibles">Collectibles</a>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li>
              <a href="#keychains">Keychains</a>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li>
              <a href="#home-decor">Home Decor</a>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li>
              <a href="#pins">Pins</a>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li>
              <a href="#toys">Toys</a>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
          </ul>
        </div>
        <div id="promotions" class="promotions" data-carousel>
          <button class="carousel-button prev" data-carousel-button="prev">
              <i class="fa-solid fa-circle-chevron-left fa-lg"></i></i>
          </button>
          <button class="carousel-button next" data-carousel-button="next">
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
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
        <div id="brands" class="brands">
          <h2>Shop By Brands</h2>
          <ul class="scroller">
              <li>
                  <img class="brand-image" src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Xbox_one_logo.svg" alt="xbox">
              </li>
              <li>
                  <img class="brand-image" src="https://upload.wikimedia.org/wikipedia/commons/0/00/PlayStation_logo.svg" alt="">
              </li>
              <li>
                  <img class="brand-image" src="https://media.discordapp.net/attachments/1085644871508971680/1103701655146467479/Batman_Logo_PNG25.png?width=551&height=310" alt="">
              </li>
              <li>
                  <img class="brand-image" src="https://upload.wikimedia.org/wikipedia/en/5/5d/Genshin_Impact_logo.svg" alt="">
              </li>
              <li>
                  <img class="brand-image" src="https://media.discordapp.net/attachments/1085644871508971680/1103750701210935469/nintendo-2-logo-png-transparent.png?width=677&height=677" alt="">
              </li>
              <li>
                  <img class="brand-image" src="https://media.discordapp.net/attachments/1085644871508971680/1103702232114929675/Demon-Slayer-Logo-PNG3.png?width=551&height=310" alt="">
              </li>
          </ul>
        </div>
        <section id="new" class="category-group new">
          <h2>New Products</h2>
          <ul class="scroller product-scroller">
            <?php include "../db_conn.php";

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
        <section id="featured" class="category-group featured">
          <h2>Featured Products</h2>
          <ul class="scroller product-scroller">
          <?php // Getting all featured products
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
        <section id="mini-figures" class="category-group mini-figures">
          <h2>Mini-Figures</h2>
          <ul class="scroller product-scroller">
          <?php // Getting all mini-figure products
            $sql = "SELECT * FROM products WHERE category='Mini-Figures'";
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
        <section id="collectibles" class="category-group Collectibles">
          <h2>Collectibles</h2>
          <ul class="scroller product-scroller">
          <?php // Getting all collectible products
            $sql = "SELECT * FROM products WHERE category='Collectibles'";
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
        <section id="keychains" class="category-group keychains">
          <h2>Keychains</h2>
          <ul class="scroller product-scroller">
          <?php // Getting all keychains products
            $sql = "SELECT * FROM products WHERE category='Keychains'";
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
        <section id="home-decor" class="category-group home-decor">
          <h2>Home Decor</h2>
          <ul class="scroller product-scroller">
          <?php // Getting all hone decor products
            $sql = "SELECT * FROM products WHERE category='Home Decor'";
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
        <section id="pins" class="category-group pins">
          <h2>Pins</h2>
          <ul class="scroller product-scroller">
          <?php // Getting all pins products
            $sql = "SELECT * FROM products WHERE category='Pins'";
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
        <section id="toys" class="category-group toys">
          <h2>Toys</h2>
          <ul class="scroller product-scroller">
          <?php // Getting all toys products
            $sql = "SELECT * FROM products WHERE category='Toys'";
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
        <div id="news" class="news">
          <h2>News</h2>
          <p>No current news</p>
        </div>
      </main>
      <?php include "../footer/footer.php" ?>
    </body>
  </html>
