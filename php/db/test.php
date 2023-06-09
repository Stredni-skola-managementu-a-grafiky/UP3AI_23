<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login and Register Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        nav {
            background-color: #333;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav li {
            margin-right: 10px;
        }

        nav li a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .form-container {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-width: 400px;
            width: 90%;
        }

        .form-container h2 {
            text-align: center;
        }

        .form-container form {
            margin: 20px auto;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container input[type="submit"] {
            width: 95%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
        }
        .main {  
  display: flex;
  flex-wrap: wrap;
}


.side {
  flex: 20%;
  background-color: #f1f1f1;
  padding: 20px;
}
.row{
  display: flex;
  flex-wrap: wrap;
}

.main {
  justify-content: space-around;
  flex: 80%;
  background-color: white;
  padding: 20px;
}


.foto {
  background-color: rgba(4, 10, 80, 0.774);
  width: 100%;
  padding: 20px;

}


.product {
  width: 250px;
  height: 350px;
  margin: 40px 5px 5px 5px;
  background-color: lightgray;
  border-spacing:0 15px;
  float: left;
  border-radius: 10px;
  text-align: center;
  box-shadow: 2px 2px 5px gray;
  
}

.product img {
  width: 60%;
  height: 100px;
  background-color: rgba(4, 10, 80, 0.774);
  padding: 12px 12px 12px 12px;
}



@media screen and (max-width: 850px) {
  .row,.main, .navbar, .product {   
    flex-direction: row;
  }

  .main{
    justify-content: space-around;
  }
  .product{
    width: 150px;
  }


  .navbar a {
    width: 10%;
  }
}

    </style>
</head>
<body>
    <nav>
        <ul>
        <?php
        // load  menu data from database
        require "Nav_Menu.php";
        $menu_array = getmenu();
        foreach ($menu_array as $element) {
            $url = $element["url"];
            $text = $element["text"];
            echo "<li><a href='$url'>$text</a></li>";
        }
        ?>
        </ul>
    </nav>

    <nav>
    <ul>
        <?php
        // load  menu_tag data from database
        require "Nav_Menu_Tag.php";
        $tag_menu_array = gettag();
        foreach ($tag_menu_array as $element) {
            $url = $element["url"];
            $text = $element["text"];
                echo "<li><a href='$url'>$text</a></li>";
        }
        ?>
        
    </ul>
    </nav>

    <h1>Login and Register Page</h1>

    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <?php
            // Check if login failed
            if (isset($_GET["Login_message"]) && $_GET["Login_message"] === "Login failed") {
                echo "<p class='error-message'>Login failed. Please check your credentials.</p>";
            }
            ?>
            <form method="POST" action="Login_confirmation.php">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <br>
                <input type="submit" value="Login">
            </form>
        </div>

        <div class="form-container">
            <h2>Register</h2>
            <?php
            // Check if registration failed
            if (isset($_GET["register_message"]) && $_GET["register_message"] === "Registration failed") {
                echo "<p class='error-message'>Registration failed. Please fill in all required fields.</p>";
            }
            ?>
            <form method="POST" action="Register_confirmation.php">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <br>
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" required>
                <br>
                <input type="submit" value="Register">
            </form>
        </div>
    </div>


    <div class="row">
  <div class="side">
    <h2>Info</h2>
    <div class="foto">
      <img src="en.png" alt="Product 3 Image"></div>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    <h3>More Text</h3>
    <p>Lorem ipsum dolor sit ame.</p>
  </div>
  <div class="main">
    <?php
    require "Advertisment.php";
    $Advertisment_array = getAdvertisment();
    foreach ($Advertisment_array as $element) {
        $name = $element["name"];
        $text = $element["text"];
        $place = $element["place"];
        $price = $element["price"];
        $created = $element["created"];
        $timeRemaining = $element["timeRemaining"];
        
        echo '
        <div class="product">
            <h3>'.$name.'</h3>
            <img src="en.png" alt=" Image">
            <p>'.$text.'.</p>
            <p><b>Price:</b> '.$price.'</p>
            <p>Time remaining: '.$timeRemaining.'</p>
        </div>';
    }
    ?>
</div>









    

    
    
    
</div>

</body>
</html>