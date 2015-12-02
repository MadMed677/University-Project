export default (ngModule) =>
    ngModule.controller('DashboardCtrl', ($scope, $rootScope, DashboardFactory) => {

        DashboardFactory.getDay().then( data => {
            console.log('data: ', data);
        });

    });
