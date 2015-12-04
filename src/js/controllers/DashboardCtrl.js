export default (ngModule) =>
    ngModule.controller('DashboardCtrl', ($scope, $rootScope, DashboardFactory) => {

        $scope.activities = [];
        $scope.activity = {};

        DashboardFactory.getDay().then( data => {
            $scope.activities = data;
        });

    });
