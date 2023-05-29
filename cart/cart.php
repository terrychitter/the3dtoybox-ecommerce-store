<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <script
      src="https://kit.fontawesome.com/805e2252e6.js"
      crossorigin="anonymous"
    ></script>
    <script src="../removeParams.js"></script>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php include "../header/header.php";
    include "../popup/popup.php"?>
    <main>
      <section class="cart-decor">
        <div class="svg-wrapper">
          <svg
            version="1.1"
            id="Layer_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 -15 128 128"
            style="enable-background: new 0 0 128 128"
            xml:space="preserve"
            width="128px"
            height="128px"
          >
            <g>
              <path
                d="M3.9,7.9C1.8,7.9,0,6.1,0,3.9C0,1.8,1.8,0,3.9,0h10.2c0.1,0,0.3,0,0.4,0c3.6,0.1,6.8,0.8,9.5,2.5c3,1.9,5.2,4.8,6.4,9.1 c0,0.1,0,0.2,0.1,0.3l1,4H119c2.2,0,3.9,1.8,3.9,3.9c0,0.4-0.1,0.8-0.2,1.2l-10.2,41.1c-0.4,1.8-2,3-3.8,3v0H44.7 c1.4,5.2,2.8,8,4.7,9.3c2.3,1.5,6.3,1.6,13,1.5h0.1v0h45.2c2.2,0,3.9,1.8,3.9,3.9c0,2.2-1.8,3.9-3.9,3.9H62.5v0 c-8.3,0.1-13.4-0.1-17.5-2.8c-4.2-2.8-6.4-7.6-8.6-16.3l0,0L23,13.9c0-0.1,0-0.1-0.1-0.2c-0.6-2.2-1.6-3.7-3-4.5 c-1.4-0.9-3.3-1.3-5.5-1.3c-0.1,0-0.2,0-0.3,0H3.9L3.9,7.9z M96,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C86.4,92.6,90.7,88.3,96,88.3L96,88.3z M53.9,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C44.3,92.6,48.6,88.3,53.9,88.3L53.9,88.3z M33.7,23.7l8.9,33.5h63.1l8.3-33.5H33.7L33.7,23.7z"
              />
            </g>
          </svg>
        </div>
      </section>
      <section class="cart-items">
        <ul class="scroller">
          <div class="no-items">
            <img
              src="https://media.discordapp.net/attachments/1085644871508971680/1097878753037799424/my-image.png?width=662&height=662"
              width="200px"
              height="200px"
              alt=""
            />
            <h2>Oops! Your Cart is empty!</h2>
            <p>Explore more and add some goodies to the list</p>
            <a href="../shop/shop.php" class="start-shopping">Start Shopping</a>
          </div>
          <?php // Getting all wishlist items
          if (!empty($_SESSION['cart'])) {
            include '../db_conn.php';
            $cartItemIds = implode(',', $_SESSION['cart']);
            $sql = "SELECT * FROM products WHERE product_id IN ($cartItemIds)";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) { ?>
            <li class="cart-item" data-productID="<?php echo $row['product_id']; ?>">
            <div class="col1">
              <img src="../product_images/<?php echo $row['product_id']?>.png" loading="lazy" />
              <div class="cart-item-actions">
                <i
                  class="fa-solid fa-trash fa-lg"
                ></i>
              </div>
            </div>
            <div class="col2 desc-col">
              <span><?php echo $row['name']; ?></span>
              <span>Default Style</span>
            </div>
            <div class="col5 desc-col">
              <span>total</span>
              <span>R <?php echo $row['price'];?></span>
            </div>
          </li>
          <?php } }?>
        </ul>
      </section>
      <section class="bill">
        <form class="promo-code-form">
          <p>Got a promo code? Enter it in here for discounts</p>
          <div class="promo-code-enter">
            <input
              type="text"
              name="promo-code"
              id="promo-code"
              placeholder="Enter Promo Code Here"
              pattern="[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}"
              maxlength="14"
              oninput="this.value = this.value.toUpperCase(); formatPromoCode();"
            />
            <button type="submit">Submit</button>
          </div>
        </form>
        <div class="bill-item">
          <p>Shipping Cost</p>
          <p id="shipping">R 20</p>
        </div>
        <div class="bill-item">
          <p>Discount</p>
          <p id="discount">-R 0</p>
        </div>
        <div class="bill-item">
          <p>Tax</p>
          <p id="tax">R 0</p>
        </div>
        <div class="bill-item bill-total">
          <p>Total</p>
          <p id="bill-total">R 0</p>
        </div>
        <button class="checkout-button" id="checkout-btn">
          <i class="fa-solid fa-lock"></i>
          Checkout
        </button>
      </section>
    </main>
    <?php include "../footer/footer.php"; ?>
  </body>
</html>
