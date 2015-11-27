import angular                  from 'angular';

const ngModule                  = angular.module('university', [
    require('angular-ui-router')
]);

/* Loading Controllers */   require('./controllers/index.js')(ngModule);

ngModule.config( ($stateProvider, $locationProvider, $httpProvider) => {

    $locationProvider.html5Mode(true);

    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    //delete $httpProvider.defaults.headers.common['X-Requested-With'];

    $stateProvider
        .state('index', {
            url: '/',
            controller: ('IndexCtrl'),
            template: require('./templates/index.html')
        })

        .state('auth', {
            url: '/auth',
            abstract: true,
            template: '<ui-view>'
        })

        .state('auth.login', {
            url: '/login',
            template: require('./templates/login.html'),
            data: { noLogin: true }
        })
})
