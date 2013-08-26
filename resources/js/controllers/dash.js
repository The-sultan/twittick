function DashCtrl($scope, $rootScope, ticketService, userService) {

    ticketService.getTickets().then(function(data) {
        $scope.tickets = data;
    });

    userService.getUser().then(function(data) {
        $rootScope.user = data;
    });

    $scope.submitCancelTicket = function(index) {
        var qs = $.param($scope.tickets[index]) + '&comment=' + $scope.comment;
        ticketService.updateTicket(qs).then(function(data) {
            return true;
        });
    };



    $scope.approveTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticket.status_id = '2';
        ticketService.updateTicket($.param(ticket)).then(function(data) {
            $scope.$apply();
        });
    };
    $scope.cancelTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticket.status_id = '3';
        ticketService.updateTicket($.param(ticket)).then(function(data) {
            $scope.$apply();
        });
    };
    $scope.rejectTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticket.status_id = '4';
        ticketService.updateTicket($.param(ticket)).then(function(data) {
            $scope.$apply();
        });
    };
    $scope.doneTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticket.status_id = '5';
        ticketService.updateTicket($.param(ticket)).then(function(data) {
            $scope.$apply();
        });
    };
    $scope.deleteTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticketService.deleteTicket($.param(ticket)).then(function(data) {
            $scope.$apply();
        });
    };

}

function getTicket(id, tickets) {
    var ticket;
    $.each(tickets, function(index, elem) {
        if (elem.id === id)
            ticket = elem;
    });
    return ticket;
}