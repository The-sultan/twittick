function ShowCtrl($scope, $routeParams, $http) {
    $http.get('server_tickets.php?id=' + $routeParams.ticketId).success(function(data) {
        $scope.ticket = data;
    });
}

