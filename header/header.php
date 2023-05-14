<head>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Overpass&display=swap");

        :root {
        --grain: #d7cec7;
        --blackboard: #565656;
        --oxblood: #76323f;
        --tan: #c09f80;
        }

        header {
            background-color: white;
            border-bottom: 2px solid var(--black-board);
        }

        li {
        list-style: none;
        }

        a {
        color: var(--blackboard);
        text-decoration: none;
        }

        .navbar {
        min-height: 70px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 24px;
        }

        .nav-menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 2rem;
        }

        .nav-link {
        transition: 0.7s ease;
        }

        .nav-link:hover {
        color: var(--oxblood);
        }

        .nav-item.commerce-action a {
        display: flex;
        align-items: center;
        gap: 0.2rem;
        }

        .commerce-action.wishlist a img {
        width: 20px;
        height: 20px;
        }

        .commerce-action.cart a img {
        width: 40px;
        height: 20px;
        }

        .hamburger {
        display: none;
        cursor: pointer;
        }

        .bar {
        display: block;
        width: 25px;
        height: 3px;
        margin: 5px auto;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        background-color: var(--blackboard);

        }

        @media (max-width: 768px) {
        .hamburger {
            display: block;
        }

        .hamburger.active .bar:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active .bar:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .hamburger.active .bar:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        .nav-menu {
            position: fixed;
            left: -100%;
            top: 80px;
            gap: 0;
            flex-direction: column;
            background-color: white;
            width: 100%;
            text-align: center;
            transition: 0.3s;
        }

        .nav-item {
            margin: 16px 0;
        }

        .nav-menu.active {
            left: 0;
        }
        }
    </style>
</head>
<header>
  <?php session_start(); ?>
      <nav class="navbar">
        <a href="#" class="nav-branding"><img width="90px" height="90px" src="https://media.discordapp.net/attachments/1085644871508971680/1097857675913605220/logo4_18_22544.png?width=677&height=677" alt=""></a>
        <ul class="nav-menu">
          <li class="nav-item">
            <a href="#" class="nav-link">My Account</a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="/shop/shop.php" class="nav-link">Shop</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
          <li class="nav-item commerce-action wishlist">
            <a href="#" class="nav-link">
              <img src="https://media.discordapp.net/attachments/1085644871508971680/1096945276733902898/ezgif.com-optimize_7.gif">Wishlist</a>
          </li>
          <li class="nav-item commerce-action cart">
            <a href="#" class="nav-link"></i>
              <img src="https://media3.giphy.com/media/wsTyMcJnYxnSyaGleS/giphy.gif?cid=ecf05e478e7awupm0e0062f071mwde6ut0y0mbvbqb7irfsr&rid=giphy.gif&ct=s">Cart</a>
          </li>
        </ul>
        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </nav>
    </header>
<script>
    const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
});

addEventListener("scroll", () => {
  if (hamburger.classList.contains("active")) {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
  }
});

</script>