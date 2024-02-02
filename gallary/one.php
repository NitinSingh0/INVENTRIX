<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inventrix Gallery - A Digital Universe</title>
<link rel="stylesheet" href="../partials/nav.css">
<link rel="shortcut icon" href="../logo.png">
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
</head>
<body>
    <style></style>
    <header>
        <nav>
        <a href="logo.png" id="logo">INVENTRIX</a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
          <li>
            <a href="index.html#home">HOME</a>
          </li>
          <li>
            <a href="index.html#theme">THEME</a>
          </li>
          <li>
            <a href="index.html#about">ABOUT US</a>
          </li>
          
          <li>
            <a href="event1.html">EVENTS</a>
          </li>
          <li>
            <a href="schedule.html">SCHEDULE</a>
          </li>
          <li>
            <a href="contact.html">CONTACT US</a>
          </li>
        </ul>
</nav>
    </header>
    <script>
            let hamMenuIcon = document.getElementById("ham-menu");
let navBar = document.getElementById("nav-bar");
let navLinks = navBar.querySelectorAll("li");

hamMenuIcon.addEventListener("click", () => {
  navBar.classList.toggle("active");
  hamMenuIcon.classList.toggle("fa-times");
});
navLinks.forEach((navLinks) => {
  navLinks.addEventListener("click", () => {
    navBar.classList.remove("active");
    hamMenuIcon.classList.toggle("fa-times");
  });
});
    </script>
    <main style="padding-top:14vh;">
        <div class="categories-container">
            <h2>Explore the Digital Universe</h2>
            <?php
// Database connection details
$servername = "localhost";
$username = "id21786985_inventrix";
$password = "M@keith@ppen1";
$database = "id21786985_registration";
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

// Fetch categories
$cat_query = "SELECT * FROM categories";
$cat_result = $conn->query($cat_query);

// Display category portals
if ($cat_result->num_rows > 0) {
    while ($cat_row = $cat_result->fetch_assoc()) {
        echo "<div class='category-portal' data-cat-id='{$cat_row['id']}'>";
        // Display category name, icon, and animation elements
        // $_GET['cat_id'];
        $cat_id = $_GET['id'];
        $photo_query = "SELECT * FROM photos WHERE cat_id = $cat_id";
        $photo_result = $conn->query($photo_query);

// Prepare photos data for JSON response
$photos = array();
if ($photo_result->num_rows > 0) {
    while ($photo_row = $photo_result->fetch_assoc()) {
        $photos[] = $photo_row;
    }
}
        echo "</div>";
    }
} else {
    echo "No categories found.";
}

// Close database connection
$conn->close();
?>
        </div>

        <div class="photos-container">
            <h2 class="current-category"></h2>
            <div class="photo-grid">
                </div>
        </div>
    </main>

    <footer>
        </footer>

    
</body>
</html>