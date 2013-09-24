function FormCtrl($scope, $routeParams, $route, $location, ticketService, alertService) {

    $scope.isNew = true;
    $scope.selection = 'new';
    // EDIT
    if ($routeParams.ticketId) {
        $scope.isNew = false;
        $scope.selection = 'edit';
        ticketService.getTicket().then(function(data) {
            $scope.ticket = data;
        });
    }

    $scope.submit = function() {

        if ($routeParams.ticketId) {
            // EDIT
            ticketService.updateTicket($.param($scope.ticket)).then(function(data) {
                $route.reload();
                if (data) {
                    alertService.showSuccess('Success!', 'Ticket saved');
                }
                else {
                    alertService.showError('Error', 'An unknown error has occurred');
                }
            });
        } else {
            // NEW
            $scope.ticket.status_id = 1;
            ticketService.createTicket($.param($scope.ticket)).then(function(data) {
                if (data) {
                    $location.path('/ticket/' + data.ticket_id + '/edit');
                    alertService.showSuccess('Success!', 'Ticket saved');
                }
                else {
                    $route.reload();
                    alertService.showError('Error', 'An unknown error has occurred');
                }
            });
        }
    };

}

