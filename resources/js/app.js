angular.module('twittick', ['$strap.directives','twittick.services']).
        config(['$routeProvider', function($routeProvider) {
        $routeProvider.
                when('/dash/:username', {controller: DashCtrl}).
                when('/dash', {templateUrl: 'partials/dash.html', controller: DashCtrl}).
                when('/list', {templateUrl: 'partials/list.html', controller: ListCtrl}).
                when('/new', {templateUrl: 'partials/form.html', controller: FormCtrl}).
                when('/ticket/:ticketId/edit', {templateUrl: 'partials/form.html', controller: FormCtrl}).
                when('/ticket/:ticketId', {templateUrl: 'partials/show.html', controller: ShowCtrl}).
                otherwise({redirectTo: '/dash'});
    }]);


