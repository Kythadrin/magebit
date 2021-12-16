<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/svg+xml" href="images/logo.svg">
    <title><?php echo $pageData['title'] ?></title>
</head>
<body>
<div id="app">
    <div class="content">
        <div class="navbar">
            <div class="navbar-brand">
                <img src="./images/logo.svg" alt="logo" class="logo">
                <img src="./images/logo_text.svg" class="logo-text" alt="logo-text">
            </div>
            <ul class="navbar-items">
                <li class="list-item"><a href="#">About</a></li>
                <li class="list-item"><a href="#">How it works</a></li>
                <li class="list-item"><a href="#">Contact</a></li>
            </ul>
        </div>

        <div class="subscription-form">
            <div class="subscription-completed">
                <img src="images/cup.svg" alt="cup">
                <h1>Thanks for subscribing!</h1>
                <h2>You have successfully subscribed to our email listing. Check your email for the discount code.</h2>
            </div>

            <div class="footer">
                <ul class="social">
                    <a href="#">
                        <li id="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </li>
                    </a>
                    <a href="#">
                        <li id="instagram">
                            <i class="fab fa-instagram"></i>
                        </li>
                    </a>
                    <a href="#">
                        <li id="twitter">
                            <i class="fab fa-twitter"></i>
                        </li>
                    </a>
                    <a href="#">
                        <li id="youtube">
                            <i class="fab fa-youtube"></i>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script type="text/javascript" src="js/App.js"></script>
</body>
</html>