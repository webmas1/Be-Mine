<?php

// Brings countries list from "Rest Countries" API
$handle = curl_init();
$url = "https://restcountries.eu/rest/v2/all?fields=name";

curl_setopt_array($handle, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true
]);

if(curl_exec($handle)){
    $countries = curl_exec($handle);
    $countries = json_decode($countries);
};    

curl_close($handle);

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

        <!--   Info and Form   -->

        <section id="info" class="container p-4 mt-5">
            <div class="row">

                <div class="col-8 col-sm-6 col-md-4 mb-4">
                    <h2 class="mb-5">Welcome to our gardens</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu hendrerit augue, quis consequat tortor. Duisdolor sit pellentesque pellentesque magna, eu hendrerit non pellentesque mi dignissim a..</p>
                </div>

                <div class="col-4 col-sm-6 col-md-4 mb-4">
                    <img id="info-img" class="img-fluid" src="imgs/info_img.png" alt="">
                </div>

                <div id="form" class="col-12 col-sm-12 col-md-4 mb-4">

                    <!-- Form -->

                    <form id="contact-form" name="contactForm" action="thanks.php" method="post" onsubmit="return validateForm()">
                        <div class="form-group">
                            <label for="name" hidden>Full name:</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email" hidden>Email:</label>
                            <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="phone" hidden>Phone:</label>
                            <input id="phone" name="phone" type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="country" hidden>Country:</label>
                            <select id="country" name="country" class="form-control">
                                <option value="" disabled selected hidden>Select your country</option>
                                <!-- Countries list from API -->
                                <?php if($countries): ?>
                                    <?php foreach($countries as $country): ?>
                                    <option value="<?= htmlspecialchars($country->name) ?>"><?= htmlspecialchars($country->name) ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>

                            </select>
                        </div>
                        <span class="error"></span>
                        <input type="submit" name="submit" value="Send" class="btn btn-block mt-4">
                    </form>

                    <!-- Form ends -->

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
