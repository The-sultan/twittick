<?php require_once 'server/login.php'; ?>

<!DOCTYPE html>
<html lang="en" ng-app="twittick">
    <head>

        <link href="css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="css/lib/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="css/tw.css" rel="stylesheet">
        
    </head>
    <body>

        <div class="container">

            <div class="navbar">
                <div class="navbar-inner">
                    <a class="brand" href="#">Twittick</a>
                    <ul class="nav">
                        <li><a href="#/dash">View tickets</a></li>
                        <?php if ($_SESSION['user']['role'] == 'requestor') : ?>
                            <li><a href="#/new">Create ticket</a></li>
                        <?php endif; ?>
                    </ul>
                    <div class="pull-right">
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_SESSION['user']['name'] ?> (<?php echo $_SESSION['user']['role'] ?>)<b class="caret"></b></a>
                                <ul class="dropdown-menu">
<!--                                    <li><a href="server/users.php?user=r"><i class="icon-user"></i> Login as requestor</a></li>
                                    <li><a href="server/users.php?user=a"><i class="icon-user"></i> Login as approver</a></li>
                                    <li><a href="server/users.php?user=e"><i class="icon-user"></i> Login as executor</a></li>
                                    <li class="divider"></li>-->
                                    <li><a href="login.php?logout=1"><i class="icon-off"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="tw-loading">Loading...</div>
            
            <div ng-view></div>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
        <script src="js/lib/bootstrap.min.js"></script>

        <script src="js/lib/angular-strap.min.js?v=0.7.5"></script>

        <script src="js/directives/alert.js"></script>
        <script src="js/directives/button.js"></script>
        <script src="js/directives/buttonSelect.js"></script>
        <script src="js/directives/datepicker.js"></script>
        <script src="js/directives/dropdown.js"></script>
        <script src="js/directives/modal.js"></script>
        <script src="js/directives/navbar.js"></script>
        <script src="js/directives/popover.js"></script>
        <script src="js/directives/select.js"></script>
        <script src="js/directives/tab.js"></script>
        <script src="js/directives/timepicker.js"></script>
        <script src="js/directives/tooltip.js"></script>
        <script src="js/directives/typeahead.js"></script>

        <script src="js/services/services.js"></script>

        <script src="js/controllers/dash.js"></script>
        <script src="js/controllers/list.js"></script>
        <script src="js/controllers/show.js"></script>
        <script src="js/controllers/form.js"></script>

        <script src="js/app.js"></script>

    </body>
</html> 