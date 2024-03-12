# The 3DToyBox E-commerce store

<img src="https://i.ibb.co/BrwS5Gc/logo-banner.png" width="100%">

**Note: This site is not ready for production and is simply an assignment submission [dated 14/06/2023]**

## Introduction
### Background
The 3DToyBox is a new 3D printing business that specializes in printing and selling mini collectables. In response to the growing demand for unique and customizable collectibles, Previously, the store has been marketing and selling their products via the Facebook marketplace, however, the owner realized that as the business grows this will not be a reliable way to sell their collectables.

The owner wishes to have a more solid solution to this that will allow room for scalability and efficiency in the business. The 3DToybox would like to offer a wide range of products through its e-commerce site. This website would serve as the primary platform for customers to browse and purchase products and interact with the business.

### About this Website
Modern web technologies were used in the development of the website to ensure a fluid and user-friendly user experience. The frontend is created using HTML, CSS, and JavaScript, providing users with an interactive and aesthetically pleasing experience. A database management system like phpMyAdmin and server-side technologies like PHP work together to power the backend.

The uses Hostinger to host the website, a dependable web hosting solution that guarantees constant user accessibility. To keep the website operating efficiently, Hostinger provides dependable server infrastructure, security measures, and support services.

## Basics: Accesing the Website and Admin Page
### Accessing the Website
#### Customer Access
Simply launch a web browser and type the following URL to visit the website as a customer. [https://the3dtoybox.com](https://the3dtoybox.com).
You'll be directed to the homepage from there you may browse and buy things. It is important to note that some features such as adding items to your cart/wishlist, and accessing your account will not be avaliable if you have not logged into an account or created one.

<img src="https://i.ibb.co/wdnTzpm/home-page.png" width="100%">
<img src="https://i.ibb.co/NK5vwfT/limited-actions.png" width="100%">

##### Creating an Account
To create an account users should navigate to the Sign-Up page via the “Create an Account” link on the navigation bar. On the Sign-Up page users may fill in their details to create their account. The users information should pass the following criteria so that their accounts may be created:
-	Usernames should be between five and fifty characters long and not contain any special characters with the expception of hyphens (-) and underscores (_).
-	Phone numbers should be in a valid format (e.g, 555-555-5555). Users are not required to know this before hand as the input will correctly format the number as it is typed.
-	Email Addresses should neither be invalid, nor should they already exist in the database.
-	Users passwords should have the following criteria:
-	Password should be between 8-50 characters
-	At least one of the following: special character (!@$#%^&*), capital letter, small letter, number

<img src="https://i.ibb.co/42wgnZ2/create-account-guide.png" width="100%">
<img src="https://i.ibb.co/x38KCSJ/creating-an-account.png" width="100%">

Once the account has been successfully created users will be promoted to verify their accounts using an OTP (One-Time Pin) sent to their email address. It is important that customers check their spam folders if the OTP is not found.
After successful verification, users will be redirecte to the Shop page where they can browse items and take advantage of other features the website has.

<p align="center">
<img src="https://i.ibb.co/zSbWR2g/otp-verification.png">
</p>

##### Signing into an Existing Account
In some cases, users may have already created an account with the business. Customers can navigate to the Sign-In page to login to their existing accounts and pick up where they have left off. Access the Sign-In page from th navigation bar as shown below:

On the Sign-In Page users should provide their email address used when creating their account, as well as their password.

<img src="https://i.ibb.co/xXXtn70/sign-in-guide.png" width="100%">

Should the user provide incorrect information such as an incorrect email/password or perhaps the account does not exist, an appropriate error will be shown.

<p align="center">
  <img src="https://i.ibb.co/jJRNPJN/incorrect-sign-in.png" width="50%">
</p>

#### Administrator Access
By typing the URL, administrators can access the website's admin area: [https://the3dtoybox.com/admin/admin.php](https://the3dtoybox.com/admin/admin.php).

The Admin Page contains information that only Administrators should have access to; thus, users will only have access to this section if the following criteria are met:
-	The user is logged in
-	The user is an administrator

<img src="https://i.ibb.co/GQyxrPp/restricted-admin.png" width="100%">

If the user is not logged, or if they are not administrators, they will be redirected to the Home Page to avoid unauthorised accessed to the site’s data. The screenshot below shows the result if unauthorised users access the Admin Page.

### The Admin Area
The 3D Toybox website's admin section gives admins all the resources and functionality they need to control the website's products. On the left, administrators may view the current products on the sale. On the right, administrators can provide details to add a new product.

<img src="https://i.ibb.co/pbJq8n1/admin-page.png" width="100%">

## Products: Adding, and Removing Products
### Adding Products
From the Admin Page, administrators can add new products the business wishes to sell. To add a product the administrator needs to know the following details:

|Field|Description|
|:---|:-----------|
|Product Name|The name of the product.|
|Product Description|The description or other information regarding the product.|
|Category|Specifies the category the product will be apart of. This is to make browsing items more user-friendly and efficient. The category may be one of the following: Mini-Figures, Collectibles, Keychains, Home Décor, Pins or Toys.|
|Product Price|The price of the product.|
|New|Specifies whether the product is new.|
|Featured|Specifies whether the product is chosen to be featured by the business.|
|Product Image|The image associated with the product and what the product looks like.|

<p align="center">
<img src="https://i.ibb.co/h826mbP/add-product.png" width="50%">
</p>

Once all the information is provided, the administrator may add the product by clicking the “Add” button. The new product will be displayed at the bottom of the products list.

<p align="center">
  <img src="https://i.ibb.co/DWXB1hV/newly-added-product.png">
</p>

In addition to the products list, the product will also now appear on the Shop Page for customers to view and purchase as seen below:

<img src="https://i.ibb.co/Y38415J/newly-added-product-details.png" width="100%">

### Deleting Products
From the Admin Page, administrators also have the option to delete products from the products list by simply clicking the trash icon below the products’ image. Following successful deletion, an appropriate message will be displayed and the item will no longer be visible on the shop page.

<p align="center">
  <img src="https://i.ibb.co/d6XKG2L/delete-product.png">
</p>

<img src="https://i.ibb.co/XFxZLg1/successful-product-delete.png" width="100%">
