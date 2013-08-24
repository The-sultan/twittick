function FormCtrl($scope, $routeParams, ticketService) {

    // EDIT
    if ($routeParams.ticketId) {
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
            ticketService.createTicket($.param($scope.ticket)).then(function(data) {
                $scope.ticket = data;
            });
        }
    };

}

