export default (ngModule) =>
    ngModule.controller('DashboardCtrl', ($scope, $rootScope, DashboardFactory) => {

        $scope.activities = {};
        DashboardFactory.getDay().then( data => {
            $scope.activities = data;
        });

    });
