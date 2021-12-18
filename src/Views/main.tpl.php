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
    <noscript>
        <style>
            .nojs{display: none;}
        </style>
        <?php $_SESSION['js'] = false; ?>
    </noscript>
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
            <div class="subscribtion" v-if="<?php print $pageData['visible']; ?>">
                <div class="description">
                    <h1>Subscribe to newsletter</h1>
                    <h2>Subscribe to our newsletter and get 10% discount on pineapple glasses.</h2>
                </div>
                <?php 
                if (!empty($pageData['email-exist'])) {
                    echo '<p class="email-exist">' . $pageData['email-exist'] . '</p>';
                }
                ?>
                <form id="subscription-form" method="post">
                    <input name="email" ref="email" type="text" maxlength="254" placeholder="Type your email address here…" v-on:input="checkEmail" v-model.trim="email">
                    <button name="submit" type="submit" :disabled='canSubmit'>
                        <svg class="ic_arrow" width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M17.7071 0.2929C17.3166 -0.0976334 16.6834 -0.0976334 16.2929 0.2929C15.9023 0.683403 15.9023 1.31658 16.2929 1.70708L20.5858 5.99999H1C0.447693 5.99999 0 6.44772 0 6.99999C0 7.55227 0.447693 7.99999 1 7.99999H20.5858L16.2929 12.2929C15.9023 12.6834 15.9023 13.3166 16.2929 13.7071C16.6834 14.0976 17.3166 14.0976 17.7071 13.7071L23.7071 7.70708C24.0977 7.31658 24.0977 6.6834 23.7071 6.2929L17.7071 0.2929Z" fill="#131821"/>
                        </svg>
                    </button>
                </form>

                <div class="terms">
                    <input id="terms" name="terms" type="checkbox" form="subscription-form" v-on:change="isChecked" v-model="terms">
                    <label for="terms">I agree to <a href="#">terms of service</a></label>
                </div>

                <div class="error nojs" v-show="canSubmit">
                    <ul>
                        <li v-for="error in errors" v-show="error.display">
                            {{ error.text }} 
                        </li>
                    </ul>
                </div>
                <noscript>
                    <div class="error">
                        <ul>    
                            <?php 
                            if (!empty($pageData['errors'])) {
                                foreach ($pageData['errors'] as $value) {
                                    echo '<li>' . $value . '</li>'; 
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </noscript>
            </div>

            <div class="subscription-completed nojs" v-else>
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