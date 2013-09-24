function GlobalCtrl($scope, $rootScope, alertService) {

    $scope.alertService = alertService;
    $scope.$watch('alertService.alert', function(newValue, oldValue) {
        $scope.alert = newValue;
        if (!$rootScope.$$phase) {
            $rootScope.$digest();
        }
    }, true);

}