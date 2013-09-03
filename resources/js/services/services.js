var twittick = angular.module('twittick.services', []);

twittick.service('ticketService', function($http, $q, $routeParams) {
    var ticketService = {};
    ticketService.apiPath = 'server/tickets.php';

    ticketService.getTickets = function() {

        var deferred = $q.defer();

        $http.get(ticketService.apiPath).success(function(data) {
            deferred.resolve(data);
        }).error(function() {
            deferred.reject("An error occured when fetching data");
        });

        return deferred.promise;
    };

    ticketService.getTicket = function() {

        var deferred = $q.defer();

        $http.get(ticketService.apiPath + '?id=' + $routeParams.ticketId).success(function(data) {
            deferred.resolve(data);
        }).error(function() {
            deferred.reject("An error occured when fetching data");
        });

        return deferred.promise;
    };

    ticketService.createTicket = function($ticket) {

        var deferred = $q.defer();

        $http.put(ticketService.apiPath, $ticket, {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data) {
            deferred.resolve(data);
        }).error(function(data) {
            deferred.reject("An error occured when fetching data");
        });

        return deferred.promise;
    };

    ticketService.updateTicket = function($ticket) {

        var deferred = $q.defer();

        $http.post(ticketService.apiPath, $ticket, {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data) {
            deferred.resolve(data);
        }).error(function(data) {
            deferred.reject("An error occured when fetching data");
        });

        return deferred.promise;
    };

    ticketService.deleteTicket = function($ticket) {

        var deferred = $q.defer();

        $http.post(ticketService.apiPath + '?delete=true', $ticket, {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data) {
            deferred.resolve(data);
        }).error(function(data) {
            deferred.reject("An error occured when fetching data");
        });

        return deferred.promise;
    };

    return ticketService;
});

// source: http://jsfiddle.net/dBR2r/8/
angular.module('SharedServices', [])
        .config(function($httpProvider) {
    $httpProvider.responseInterceptors.push('myHttpInterceptor');
    var spinnerFunction = function(data, headersGetter) {
        // todo start the spinner here
        $('#tw-loading').show();
        return data;
    };
    $httpProvider.defaults.transformRequest.push(spinnerFunction);
})
// register the interceptor as a service, intercepts ALL angular ajax http calls
        .factory('myHttpInterceptor', function($q, $window) {
    return function(promise) {
        return promise.then(function(response) {
            // do something on success
            // todo hide the spinner
            $('#tw-loading').hide();
            return response;

        }, function(response) {
            // do something on error
            // todo hide the spinner
            $('#tw-loading').hide();
            return $q.reject(response);
        });
    };
})