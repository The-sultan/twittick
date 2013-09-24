function ModalCtrl($scope, $route, ticketService, alertService) {
    
    $scope.submitActionModal = function() {
        $scope.ticket.status_id=3
        var qs = $.param($scope.ticket) + '&comment=' + $scope.comment;
        ticketService.updateTicket(qs).then(function(data) {
            $('.modal').modal('hide');
            $route.reload();
            alertService.showSuccess('Success!', 'Ticket cancelled');
            return true;
        });
    };

}