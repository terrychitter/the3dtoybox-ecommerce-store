<?php 
session_start();
if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
  exit();
} else if ($_SESSION['is_admin'] == FALSE) {
  header('Location: ../index.php?error=This page is restricted for customers');
  exit();
}?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <script src="../removeParams.js"></script>
    <script
      src="https://kit.fontawesome.com/805e2252e6.js"
      crossorigin="anonymous"
    ></script>
    <title>Document</title>
  </head>
  <body>
    <?php include "../popup/popup.php";?>
    <main>
      <section class="admin-decor">
        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
        <svg
          version="1.1"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px"
          y="0px"
          viewBox="0 0 1000 1000"
          enable-background="new 0 0 1000 1000"
          xml:space="preserve"
          width="128px"
          height="128px"
        >
          <metadata>
            Svg Vector Icons : http://www.onlinewebfonts.com/icon
          </metadata>
          <g>
            <path
              d="M484.8,941.2l-48.5-84.1c-16.9-29.3-6.9-66.7,22.4-83.6l10.7-6.2c-0.7-6.7-1-13.5-1-20.2s0.3-13.4,1-20.2l-10.7-6.1c-14-8.1-24.3-21.6-28.5-37.2c-4.2-15.7-2-32.4,6.1-46.5l48.5-84.1c8.1-14,21.6-24.3,37.2-28.5c5.2-1.4,10.5-2.1,15.9-2.1c10.7,0,21.3,2.8,30.6,8.2l10.8,6.2c11-7.5,22.7-14.1,34.8-19.8v-12.8c0-1,0.6-1.9,0.6-2.9c-32.4-24.6-73-43.7-125.4-53.8v-30.3c72.2-34.5,122.5-107.6,122.5-192.9C611.8,106,515.8,10,397.4,10C279,10,183.1,106,183.1,224.4c0,85.4,50.3,158.5,122.5,192.9v30.3c-244.1,46.8-245,283.2-245,419.9c0,106.7,466.7,103.7,461.5,102.3C506.3,965.6,492.9,955.3,484.8,941.2z"
            />
            <path
              d="M899.1,747.1c0-18-3.2-35-7.8-51.6l48.1-27.7l-48.6-84.1l-47.5,27.4c-24.3-24.7-55.2-42.4-89.9-51.4l0-55.4h-97.1v55.4c-34.6,9-65.6,26.6-89.9,51.4l-47.5-27.4l-48.6,84.1l48.1,27.7c-4.5,16.6-7.8,33.6-7.8,51.6s3.2,35,7.8,51.6l-48.1,27.8l48.6,84.1l47.5-27.4c24.3,24.7,55.3,42.4,90,51.4V990l97.1-0.1v-55.3c34.6-8.9,65.7-26.7,90-51.4l47.5,27.4l48.5-84.1l-48-27.7C896,782.2,899.1,765.2,899.1,747.1z M704.9,864.4c-64.8,0-117.2-52.4-117.2-117.2c0-64.7,52.4-117.2,117.2-117.2s117.2,52.5,117.2,117.2C822.1,811.9,769.7,864.4,704.9,864.4z"
            />
          </g>
        </svg>
      </section>
      <section class="products">
        <h2>Products</h2>
        <ul class="scroller">
          <?php
          // Displaying all products
          include "../db_conn.php";

          $sql = "SELECT * FROM products";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) { ?>
          <li
            class="product-item"
            data-productID="<?php echo $row['product_id']; ?>"
          >
            <div class="col1">
              <img
                src="../product_images/<?php echo $row['product_id']?>.png"
                loading="lazy"
              />
              <div class="product-item-actions">
                <i class="fa-solid fa-trash fa-lg" style="cursor: pointer;"></i>
              </div>
            </div>
            <div class="col2 desc-col">
              <span><?php echo $row['name']; ?></span>
            </div>
            <div class="col5 desc-col">
              <span>total</span>
              <span><?php echo $row['price']; ?></span>
            </div>
          </li> <?php } ?>
        </ul>
      </section>
      <section class="add-products">
        <form action="../add_product.php" class="add-products-form" method="post" enctype="multipart/form-data">
          <h2>Add Product</h2>
          <label for="product-name">Product Name</label>
          <input type="text" name="product-name" />
          <label for="product-desc">Product Desc</label>
          <textarea name="product-desc" cols="30" rows="10"></textarea>
          <label for="category">Category</label>
          <select name=category>
          <option value="mini-figures">Mini-Figures</option>
          <option value="collectibles">Collectibles</option>
          <option value="keychains">Keychains</option>
          <option value="home-decor">Home Decor</option>
          <option value="pins">Pins</option>
          <option value="toys">Toys</option>
        </select>
          <label for="product-price">Product Price</label>
          <br />
          <span class="r">R</span
          ><input type="number" name="product-price" id="" min="1" />
        <br />
          <input type="checkbox" name="featured" />
          <label for="featured">Featured</label>
          <br />
          <input type="checkbox" name="new" id="" />
          <label for="new">New</label>
          <br />
          <label for="product-img">Product Image</label>
          <br />
          <input type="file" name="product-img" id="product-img">
          <br />
          <button type="reset">Cancel</button>
          <button type="submit">Add</button>
        </form>
      </section>
    </main>
  </body>
</html>
