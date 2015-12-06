export default (ngModule) =>
    ngModule.controller('DashboardCtrl', ($scope, $rootScope, DashboardFactory) => {

        $scope.activities = [];
        $scope.activity = {};

        DashboardFactory.getDay().then( data => {
            $scope.activities = data;
        });

        $scope.prevDay = () => {
            let today = $rootScope.data;
            const prev = new Date( today.setDate( today.getDate()-1) );
            $rootScope.data = prev;

            DashboardFactory.getDay(prev).then( data => {
                $scope.activities = data;
            });
        };

        $scope.nextDay = () => {
            let today = $rootScope.data;
            const next = new Date( today.setDate( today.getDate()+1) );
            $rootScope.data = next;

            DashboardFactory.getDay(next).then( data => {
                $scope.activities = data;
            });
        };

    });
