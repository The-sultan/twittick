function DashCtrl($scope, $http, $routeParams, $rootScope, ticketService) {

//function DashCtrl($scope, $http, ticketListService) {
//    $scope.tickets = ticketListService.sayHello();
	/*
    $http.get('server_tickets.php').success(function(data) {
        $scope.tickets = data;
    });
	*/
	
	 ticketService.getTickets().then(function(data) {$scope.tickets = data});
    var usernameQueryString = '';
    if ($routeParams.username) {
        usernameQueryString = '?user=' + $routeParams.username;
    }

    $http.get('server_users.php' + usernameQueryString).success(function(data) {
        $rootScope.user = data;
    });



}

