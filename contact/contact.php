<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/805e2252e6.js"
      crossorigin="anonymous"
    ></script>
    <script src="script.js" defer></script>
  </head>
  <body>
    <?php include "../header/header.php"; ?>
    <main>
      <section class="contact-decor">
        <div class="svg-wrapper">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="-50 -60 612 612"
            width="128px"
            height="128px"
          >
            <path
              d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"
            />
          </svg>
        </div>
      </section>
      <form action="contactform.php" method="post" class="contact-form">
        <h2>We'd love to hear from you, Get in touch 👋</h2>
        <div class="details">
          <div class="form-control">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Your Name" required />
          </div>
          <div class="form-control">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Your Email" required />
          </div>
        </div>
        <div class="form-control">
          <label for="reason">Reason</label>
          <select name="reason" id="reason" required>
            <option value="order_status">Order Status Inquiry</option>
            <option value="product_inquiry">Product Inquiry</option>
            <option value="shipping_delivery">
              Shipping and Delivery Questions
            </option>
            <option value="returns_refunds">Returns and Refunds</option>
            <option value="payment_issues">Payment Issues</option>
            <option value="account_management">Account Management</option>
            <option value="technical_support">Technical Support</option>
            <option value="website_navigation">
              Website Navigation Assistance
            </option>
            <option value="privacy_security">
              Privacy and Security Concerns
            </option>
            <option value="promotions_discounts">
              Promotions and Discounts
            </option>
            <option value="product_reviews_feedback">
              Product Reviews and Feedback
            </option>
            <option value="wholesale_bulk_ordering">
              Wholesale or Bulk Ordering
            </option>
            <option value="affiliate_partnership">
              Affiliate or Partnership Inquiries
            </option>
            <option value="advertising_marketing">
              Advertising or Marketing Opportunities
            </option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-control">
          <label for="message">Message</label>
          <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Messsage" required></textarea>
          <p id="character-count">Character limit: 0/301</p>
        </div>
        <button type="submit" class="send-email-button">
          Send<i class="fa-solid fa-paper-plane fa-lg"></i>
        </button>
      </form>
    </main>
    <?php include "../footer/footer.php"; ?>
  </body>
</html>
