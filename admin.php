<?php

// db connect function
require_once 'functions/functions.php';


// Getting all users from DB
if ($link = db_connect()) {
    
    $sql = "SELECT * FROM users ORDER BY created_at DESC";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
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

    <title>Be Mine - ADMIN Panel</title>
</head>

<body>

    <header>
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


        <section id="users" class="container p-4 mt-5">
            <div class="row">
                <div class="col-12">
                    <h1>ADMIN PANEL</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4 mb-2">
                    <h2><i class="fas fa-users"></i> Users list</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if (isset($users)): ?>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['country'] ?></td>
                                <td><?= $user['phone'] ?></td>
                                <td><?= $user['email'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p>ERROR</p>
                    <?php endif ?>
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
