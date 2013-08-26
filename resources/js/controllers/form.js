function FormCtrl($scope, $routeParams, ticketService) {

    // EDIT
    $scope.isNew = true;
    $scope.selection = 'new';
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
                if (data) {
                    $('.alert-success').show();
                }
            });
        } else {
            // NEW
            $scope.ticket.status_id = 1;
            ticketService.createTicket($.param($scope.ticket)).then(function(data) {
                if (data) {
                    $('.alert-success').show();
                }
            });
        }
    };

}

