🧋 Chai Garam – Pocket Café

A complete modern café ordering system built with HTML, CSS, JavaScript, PHP & MySQL.
It includes a beautiful mobile-friendly UI, an interactive menu, cart system, and a backend for saving orders.

⭐ Features
🔹 Frontend

Fully responsive modern UI

Category-wise menu items

Dynamic cart system

Customer name input

Item quantity manager

Auto price calculation

Smooth animations & UI design

🔹 Backend (PHP + MySQL)

Save orders to database

Save items of each order

Auto calculate total price

Unique Order ID generated

Admin API to view all orders

JSON API responses

🔹 Tech Used

HTML5

CSS3

JavaScript (Vanilla JS)

PHP 8

MySQL

XAMPP (Local development)

GitHub Pages (Frontend hosting optional)

InfinityFree / AwardSpace (Backend hosting optional)

📂 Project Folder Structure
chai_garam/
│── index.html
│── style.css
│── script.js
│── /images
│── db.php
│── place_order.php
│── fetch_menu.php
│── view_orders.php
│── README.md

🛠️ Setup Instructions (Local XAMPP)
1️⃣ Install XAMPP

Start Apache and MySQL from XAMPP Control Panel.

2️⃣ Create Database

Go to:

👉 http://localhost/phpmyadmin

Create database:

chaigaramdb


Run SQL:

CREATE TABLE menu_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  category VARCHAR(100),
  price DECIMAL(10,2),
  is_available TINYINT(1) DEFAULT 1
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(255),
  total_amount DECIMAL(10,2),
  order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  status ENUM('pending','preparing','ready','completed','cancelled') DEFAULT 'pending'
);

CREATE TABLE order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  item_name VARCHAR(255),
  unit_price DECIMAL(10,2),
  quantity INT,
  FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);

3️⃣ Place Backend Files in htdocs

Move your project folder to:

C:\xampp\htdocs\chai_garam\

4️⃣ Update db.php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "chaigaramdb";

$conn = new mysqli($host, $user, $pass, $dbname);

5️⃣ Run the Website

Open browser:

👉 http://localhost/chai_garam

🌐 Deployment Options
✔ Deploy Frontend (FREE)

You can deploy only the frontend on GitHub Pages:

Commit your frontend files

Go to Settings → Pages

Select Main branch

Your site goes live!

✔ Deploy Backend (FREE)

Use free PHP hosting:

InfinityFree

FreeHostingNoAds

AwardSpace

Upload backend files → Create MySQL DB → Update db.php → Done!

🔥 API Endpoints
➤ place_order.php

Saves a new order + its items.

➤ fetch_menu.php

Fetches menu items from database.

➤ view_orders.php

Returns all orders for admin panel.

🎨 Screenshots (Add Your Own)

You can add:

/images/screenshot1.png
/images/screenshot2.png

🤝 Contributing

Pull requests are welcome!
Feel free to open issues for new ideas or fixes.

💛 Author

Radhe
Student | Developer | Creative Builder
