function LoginCtrl($http, $window, $routeParams) {
    
    $http.get('server_users.php?user=' + $routeParams.username).success(function(data) {
//        $location.path('/dash');
        $window.location='/dash';
    });

}

