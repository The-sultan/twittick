function ShowCtrl($scope, $routeParams, $http) {
    $http.get('server/tickets.php?id=' + $routeParams.ticketId).success(function(data) {
        $scope.ticket = data;
    });
}

