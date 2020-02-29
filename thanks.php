<?php

// db connect function
require_once 'functions/functions.php';



// Saving form data to DB
if (isset($_POST['submit'])) {
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = strtolower(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
    $country = trim(filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING));

    if ($link = db_connect()) {
        $name = mysqli_real_escape_string($link, $name);
        $email = mysqli_real_escape_string($link, $email);
        $phone = mysqli_real_escape_string($link, $phone);
        $country = mysqli_real_escape_string($link, $country);

        $sql = "INSERT INTO users (id, name, email, phone, country, created_at) VALUES ('', '$name', '$email', '$phone', '$country', CURRENT_TIME());";
        $result = mysqli_query($link, $sql);

        if ($result && mysqli_affected_rows($link) > 0) {
            $success_msg = TRUE;
        } else {
            $error_msg = TRUE;
        }
    }
} else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha256-BtbhCIbtfeVWGsqxk1vOHEYXS6qcvQvLMZqjtpWUEx8=" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title>Be Mine</title>
</head>

<body>

    <header class="fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="logo-bg" class="mx-auto">
                        <img id="logo-img" src="imgs/logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>

        <!--   Carousel    -->

        <section id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="imgs/image1.jpg?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/image2.jpg?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/image3.jpg?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/image4.jpg?auto=yes&bg=555&fg=333&text=Fourth slide" alt="Fourth slide">
                </div>
            </div>
        </section>
        
        <section id="thanks-section" class="container mt-5 mb-5">
            <div class="row justify-content-md-center">
                <div class="col-xl-1 col-md-2 col-4 text-right">
                    <?php if($success_msg): ?>
                    <i class="text-success fas fa-check-circle"></i>
                    <?php elseif($error_msg): ?>
                    <i class="text-danger fas fa-times-circle"></i>
                    <?php endif ?>
                </div>
                <div class="col-xl-7 col-md-8 col-8 text-left">
                    <?php if($success_msg): ?>
                    <h2>Thank you for leaving your contact info</h2>
                    <p>Our representative will contact you soon with more information</p>
                    <?php elseif($error_msg): ?>
                    <h2>Something went wrong</h2>
                    <p>Please try again later</p>
                    <?php endif ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <button id="visit-btn" class="btn">VISIT OUR SITE</button>
                    <a href="index.php"><button id="visit-btn" class="btn">GO BACK</button></a>
                </div>
            </div>
        </section>

    </main>

    <footer>
        <p class="mt-4">All rights reserved &copy; <a href="index.php">Be Mine</a></p>
    </footer>


    <!--  SCRIPTS  -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js/scripts.js"></script>
</body>

</html>