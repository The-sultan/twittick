function DashCtrl($scope, $rootScope, ticketService, userService) {

    ticketService.getTickets().then(function(data) {
        $scope.tickets = data;
    });

    userService.getUser().then(function(data) {
        $rootScope.user = data;
    });

    $scope.submitCancelTicket = function(index) {
        console.log($scope.tickets[index]);
//        ticketService.updateTicket($.param($scope.tickets[index])).then(function(data) {
//            $scope.ticket = data;
//        });
    };

}

