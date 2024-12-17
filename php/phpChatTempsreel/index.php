<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat en direct</title>
    <link reel="stylesheet" type="text/css" href="asset/css/app.css">
    <link reel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<?php include_once "header.php"; ?>
<body>

  <div class="wrapper">
    <section class="form signup">
        <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text">
            </div>
            <div class="name-details">
                <div class="field input">
                    <label>Prenom</label>
                    <input type="text" name="fname" placeholder="Prenom" required>
                </div>
                <div class="field input">
                    <label>Nom</label>
                    <input type="text" name="lname" placeholder="Nom" required>
                </div>
            </div>

            <div class="field input">
                <label>Adresse Email</label>
                <input type="text" name="email" placeholder="entrer votre email" required>

            </div>

            <div class="field input">
                <label>password</label>
                <input type="password" name="password" placeholder="enter new password" required>

            </div>

            <div class="field image">
                <label>profile image</label>
                <input type="file" name="image" accept="#" required>
            </div>

            <div class="field button">
                <input type="submit" name="submit" value="continue to chat">

            </div>


                
        </form>

        <div class="link"> Already signed up? <a href="login.php">Login now </a>
        </div>


    </section>

  </div>
</body>
</html>