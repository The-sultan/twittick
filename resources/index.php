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

                    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="tw-header-box">
                    <div class="container">                    
                        <a href="/" id="logo" class="tw-logo" title="Home">
                            <span class="tw-twitter-bird"></span> Twittick HOLA      

                        </a>
                        <div class="btn-group tw-align-right">
                            <a href="#" class="btn tw-btn-primary"><i class="tw-icon-user tw-icon-white"></i><?php echo $_SESSION['user']['name'] ?> (<?php echo $_SESSION['user']['role'] ?>)</a>
                            <a href="#" data-toggle="dropdown" class="btn tw-btn-primary dropdown-toggle"><span class="caret tw-white"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> Make admin</a></li>
								<li class="divider"></li>
                                <li><a href="login.php?logout=1"><i class="i"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tw-menu-navbar">
                    <div class="container">
                        <div class="tw-btn-toolbar span9">
                            <?php if ($_SESSION['user']['role'] == 'requestor') : ?>
                                <div class="btn-group">
                                    <a href="#/new" class="btn tw-btn-primary">Create Ticket</a>                                
                                </div>
                                                            
                            <?php endif; ?>
                            
                            <div class="btn-group">
                                <a href="#/dash" class="btn tw-btn-primary">View Ticket</a>
                            </div>
                            
                            <div class="btn-group pull-right">
                                <a href="#dashlist" class="btn tw-btn-view"><i class="icon-th-large"></i></a>
                                <a href="#dashbox" class="btn tw-btn-view"><i class="icon-th-list"></i></a>
                            </div>
                            <div class="btn-group pull-right">
                                <a class="btn tw-btn-primary" href="#"><i class="icon-user"></i></a>
                                <a class="btn tw-btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret tw-white"></span></a>                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                    <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                                    <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="i"></i> Make admin</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="tw-align-right">
                            <div class="input">
                                <input type="text" class="span2 search-query" placeholder="Search">
                                <span class="tw-search"><i class="icon-search"></i></span>                                
                            </div>
                        </div>
                    </div>
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