var twittickApp = angular.module('twittick', ['$strap.directives', 'twittick.services', 'SharedServices']).
        config(['$routeProvider', function($routeProvider) {
        $routeProvider.
                when('/dashlist', {templateUrl: 'partials/dashlist.php', controller: DashCtrl}).
                when('/dashbox', {templateUrl: 'partials/dashbox.php', controller: DashCtrl}).
                when('/list', {templateUrl: 'partials/list.php', controller: ListCtrl}).
                when('/new', {templateUrl: 'partials/form.php', controller: FormCtrl}).
                when('/ticket/:ticketId/edit', {templateUrl: 'partials/form.php', controller: FormCtrl}).
                when('/ticket/:ticketId', {templateUrl: 'partials/show.php', controller: ShowCtrl}).
                otherwise({redirectTo: '/dashlist'});
    }]);

// disable template cache
//twittickApp.run(function($rootScope, $templateCache) {
//    $rootScope.$on('$viewContentLoaded', function() {
//        console.log('cache');
//        $templateCache.removeAll();
//    });
//});