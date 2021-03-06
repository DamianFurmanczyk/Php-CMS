<?php
    include('db_conn.php');

    $query = 'Select username, id from users where private=0 order by id';
    $users_result = mysqli_query($db, $query);
?>

<nav class="navbar navbar-expand-md navbar-dark bg-primary" id='nav'>
    <a class="navbar-brand" href="#">Blog Spot</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="../public_html/index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Użytkownicy</a>
        <div class="dropdown-menu" aria-labelledby="navDropdown">
            <?php 
                while($user = mysqli_fetch_assoc($users_result)) 
                {
            ?>
                <a class="dropdown-item" href="/_projects/cms/public_html/user.php?id=<?= $user['id'] ?>">
                    <?= $user['username'] ?>
                </a>
            <?php } ?>
            <a href="/public_html/users" class="dropdown-item">Zobacz więcej</a>
        </div>
        </li>
    </ul>
    <?php

    if(isset($_SESSION['username'])) {

        $current_uri_file = basename($_SERVER['REQUEST_URI']);

        if($current_uri_file != 'profile.php') {
            print('
                <a href="profile.php" class="btn btn-outline-light my-2 mr-2 my-sm-0">Mój profil</a>
            ');
        }

        print('
            <a href="../includes/logout.php" class="btn btn-outline-light my-2 mr-2 my-sm-0">Wyloguj się</a>
        ');
    } else {

        
        print('
            <a href="login.php" class="btn btn-outline-light my-2 mr-2 my-sm-0">Logowanie</a>
            <a href="register.php" class="btn btn-outline-light my-2 my-sm-0">Rejestracja</a>
        ');
    }
    
    ?>
    </div>
</nav>