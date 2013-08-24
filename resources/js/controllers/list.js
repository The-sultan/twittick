function ListCtrl($scope, $http) {
    $http.get('server_tickets.php').success(function(data) {
        $scope.tickets = data;
    });
}