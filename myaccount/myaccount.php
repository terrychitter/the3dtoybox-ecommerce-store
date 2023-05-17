<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <script
      src="https://kit.fontawesome.com/805e2252e6.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <?php include '../header/header.php' ?>
    <main>
      <section class="profile-decor">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          viewBox="0,0,256,256"
          width="128px"
          height="128px"
          fill-rule="nonzero"
        >
          <g
            fill="#000"
            fill-rule="nonzero"
            stroke="none"
            stroke-width="1"
            stroke-linecap="butt"
            stroke-linejoin="miter"
            stroke-miterlimit="10"
            stroke-dasharray=""
            stroke-dashoffset="0"
            font-family="none"
            font-weight="none"
            font-size="none"
            text-anchor="none"
            style="mix-blend-mode: normal"
          >
            <g transform="scale(2,2)">
              <path
                d="M64,27c-12.7,0 -23,10.3 -23,23c0,12.7 10.3,23 23,23c12.7,0 23,-10.3 23,-23c0,-12.7 -10.3,-23 -23,-23zM64,33c9.4,0 17,7.6 17,17c0,9.4 -7.6,17 -17,17c-9.4,0 -17,-7.6 -17,-17c0,-9.4 7.6,-17 17,-17zM64,81c-16.4,0 -31.59922,8.89961 -39.69922,23.09961c-0.8,1.4 -0.30078,3.29961 1.19922,4.09961c0.5,0.3 1,0.40039 1.5,0.40039c1,0 2.09961,-0.5 2.59961,-1.5c7,-12.4 20.20039,-20.09961 34.40039,-20.09961c14.2,0 27.4,7.69961 34.5,20.09961c0.8,1.4 2.59961,1.89961 4.09961,1.09961c1.4,-0.8 1.89961,-2.59961 1.09961,-4.09961c-8.1,-14.2 -23.29922,-23.09961 -39.69922,-23.09961z"
              ></path>
            </g>
          </g>
        </svg>
      </section>
      <section class="username">
        <form class="username-form editable-form">
          <div>
            <h1 class="username">txrry_x</h1>
            <input type="text" name="username" id="username" />
            <button class="edit-button">
              <i class="fa-solid fa-pen fa-lg"></i>
            </button>
          </div>
          <button type="submit">Save Changes</button>
        </form>
      </section>
      <section class="personal-info">
        <form
          action="update-personal.php"
          method="post"
          class="personal-form editable-form"
        >
          <h2>Personal Information</h2>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" />
          <label for="contact-number">Contact Number</label>
          <input type="tel" name="contact-number" id="contact-number" />
          <button type="submit">Save Changes</button>
        </form>
      </section>
      <section class="address-info">
        <form
          action="edit-account.php"
          method="post"
          class="address-form editable-form"
        >
          <h2>Address Information</h2>
          <label for="house-number">House Number</label>
          <input type="text" name="house-number" id="house-number" />

          <label for="street-name">Street Name</label>
          <input type="text" name="street-name" id="street-name" />

          <label for="Suburb">Suburb</label>
          <input type="text" name="suburb" id="suburb" />

          <label for="city">City</label>
          <input type="text" name="city" id="city" />

          <label for="province">province</label>
          <input type="text" name="province" id="province" />

          <label for="postal-code">Postal Code</label>
          <input type="text" name="postal-code" id="postal-code" />
          <button type="submit">Save Changes</button>
        </form>
      </section>
      <section class="order-history" id="order-history">
        <h2>My Order History</h2>
        <ul class="scroller">
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
          <li class="order-card">
            <div class="order-card-head">
              <span class="order-num-label">order no.</span>
              <span class="order-num">#A67cDW</span>
              <span class="order-date">1 Jan 2023</span>
            </div>
            <ul class="order-items">
              <li>1 x Figure</li>
              <li>1 x Keyring</li>
              <li>1 x Home Decor</li>
            </ul>
            <div class="total-footer">
              <span class="total-label">Total</span>
              <span class="total">R299.90</span>
            </div>
          </li>
        </ul>
      </section>
    </main>
    <button class="logout-button">Log Out</button>
    <?php include '../footer/footer.php'; ?>
  </body>
</html>
