var twittick = angular.module('twittick.services', []);

twittick.service('ticketService', function($http,$q) {
    var ticketService = {};
	ticketService.apiPath = 'server_tickets.php';
	ticketService.getTickets = function(){

		
		var deferred = $q.defer();

		$http.get(ticketService.apiPath).success(function(data){
			deferred.resolve(data);
		}).error(function(){
			deferred.reject("An error occured when fetching data");
		});

		return deferred.promise;
    }
	return ticketService;
});