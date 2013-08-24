function FormCtrl($scope, $routeParams, $http) {

    // EDIT
    if ($routeParams.ticketId) {
        $http.get('server_tickets.php?id=' + $routeParams.ticketId).success(function(data) {
            $scope.ticket = data;
        });
    }

    $scope.submit = function() {

        if ($routeParams.ticketId) {
            // EDIT
            $http.post('server_tickets.php', $.param($scope.ticket), {
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data) {
                $('.alert-success').show();
            });
        } else {
            // NEW
            $http.put('server_tickets.php', $.param($scope.ticket), {
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data) {
                $('.alert-success').show();
            });
        }
    };

}

