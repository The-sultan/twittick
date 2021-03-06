function DashCtrl($scope, $route, ticketService, userService, alertService) {

    $scope.alertService = alertService;
    $scope.$watch('alertService.alert', function(newValue, oldValue) {
        $scope.alert = newValue;
    }, true);
    
    ticketService.getTickets().then(function(data) {
        $scope.tickets = data;
    });
	
//    ticketService.getTickets().then(function(data) {
//		$scope.tickets = [];
//		var i= -1;
//		for(var j=0;j<data.length;j++){
//			var mod = j % 4;
//			if( mod == 0){
//				i++;
//				$scope.tickets[i] = [];
//				
//			}
//			$scope.tickets[i][mod] = data[j];
//		}
//    });
	
//    $scope.submitCancelTicket = function(index) {
//        var qs = $.param($scope.tickets[index]) + '&comment=' + $scope.comment;
//        ticketService.updateTicket(qs).then(function(data) {
//            return true;
//        });
//    };
    $scope.approveTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticket.status_id = '2';
        ticketService.updateTicket($.param(ticket)).then(function(data) {
            $route.reload();
            alertService.showSuccess('Success!', 'Ticket approved');
        });
    };
    $scope.cancelTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticket.status_id = '3';
        ticketService.updateTicket($.param(ticket)).then(function(data) {
            $route.reload();
            alertService.showSuccess('Success!', 'Ticket cancelled');
        });
    };
    $scope.rejectTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticket.status_id = '4';
        ticketService.updateTicket($.param(ticket)).then(function(data) {
            $route.reload();
            alertService.showSuccess('Success!', 'Ticket rejected');
        });
    };
    $scope.doneTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticket.status_id = '5';
        ticketService.updateTicket($.param(ticket)).then(function(data) {
            $route.reload();
            alertService.showSuccess('Success!', 'Ticket marked as done');
        });
    };
    $scope.deleteTicket = function(id) {
        var ticket = getTicket(id, $scope.tickets);
        ticketService.deleteTicket($.param(ticket)).then(function(data) {
            $route.reload();
            alertService.showSuccess('Success!', 'Ticket deleted');
        });
    };

    $scope.setListView = function(is_list) {
        userService.setListView(is_list).then(function(data) {
            $route.reload();
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