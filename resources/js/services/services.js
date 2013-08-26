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

twittick.service('userService', function($http, $q) {
    var userService = {};
    userService.apiPath = 'server/users.php';

    userService.getUser = function() {

        var deferred = $q.defer();

        $http.get(userService.apiPath).success(function(data) {
            deferred.resolve(data);
        }).error(function() {
            deferred.reject("An error occured when fetching data");
        });

        return deferred.promise;
    };
    return userService;
});
