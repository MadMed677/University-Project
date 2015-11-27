import angular                  from 'angular';
import 'ngstorage';

const ngModule                  = angular.module('university', [
    require('angular-ui-router'),
    require('angular-resource'),
    'ngStorage'
]);

/* Loading Controllers */   require('./controllers/index.js')(ngModule);
/* Loading Directives */    require('./directives/index.js')(ngModule);
/* Loading Factories */     require('./factories/index.js')(ngModule);

ngModule.config( ($stateProvider, $locationProvider, $httpProvider) => {

    $locationProvider.html5Mode(true);
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    //delete $httpProvider.defaults.headers.common['X-Requested-With'];

    $stateProvider
        .state('index', {
            url: '/',
            controller: ('IndexCtrl'),
            template: require('./templates/index.html'),
            data: { needAuth: false }
        })

        .state('auth', {
            url: '/auth',
            abstract: true,
            template: '<ui-view>'
        })

        .state('auth.login', {
            url: '/login',
            controller: ('LoginCtrl'),
            template: require('./templates/login.html'),
            data: { needAuth: false }
        })
})

ngModule.run( ($rootScope, $state, $stateParams, SessionService) => {
    $rootScope.$state = $state;
    $rootScope.$stateParams = $stateParams;

    /**
     * Crear User at start
     * @type {{}}
     */
    $rootScope.user = {};

    /**
     * Check Authorization
     */

    $rootScope.$on('$stateChangeStart', (event, toState, toParams, fromState, fromParams) => {
        SessionService.checkAccess(event, toState, toParams, fromState, fromParams);
    });
});
