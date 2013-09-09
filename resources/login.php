<?php require_once 'server/login.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <link href="css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="css/lib/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="css/tw.css" rel="stylesheet">
        <link href="css/fonts.css" rel="stylesheet">

    </head>
    <body>

        <div class="navbar navbar-fixed-top tw-header-box">
            <div class="navbar-inner tw-header-box">
                <div class="container">                    
                    <a href="/" id="logo" class="tw-logo" title="Home">
                        <span class="tw-twitter-bird"></span> Twittick        

                    </a>                   
                </div>
            </div>
        </div>


        <div class="container">

            <div class="tw-box">
                <form class="tw-login-form" method="post" action="server/login.php">
                    <?php if (isset($_GET['error'])) : ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> Please check credentials
                    </div>
                    <?php endif; ?>                    
                    <h1 class="tw-h1">Sign in to Twitter Twittick</h1>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Username or email:
                            <span class="tw-form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input name="user" type="text" id="inputEmail" placeholder="Email" class="span4">                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword">Password: <span class="tw-form-required" title="This field is required.">*</span></label>
                        <div class="controls">
                            <input name="pass" type="password" id="inputPassword" placeholder="Password" class="span4">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn tw-btn-primary btn-info inline">Sign in</button>
                            <label class="checkbox inline tw-margin5">
                                <input type="checkbox"> Remember me
                            </label>                            
                        </div>
                    </div>
                    <div>
                        <a href="#">Can't access your account?</a>
                    </div>
                </form>

            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/lib/bootstrap.min.js"></script>


    </body>
</html>