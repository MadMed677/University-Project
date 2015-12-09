export default (ngModule) =>
    ngModule.controller('DashboardCtrl', ($scope, $rootScope, DashboardFactory) => {

        $scope.activities = [];
        $scope.activity = {};
        $scope.disabled = true;

        const now = new Date();

        DashboardFactory.getDay().then( data => {
            $scope.activities = data;
        });

        $scope.prevDay = () => {
            let today = $rootScope.data;
            const prev = new Date( today.setDate( today.getDate()-1) );
            $rootScope.data = prev;
            $scope.disabled = false;

            DashboardFactory.getDay(prev).then( data => {
                $scope.activities = data;
            });
        };

        $scope.nextDay = () => {
            if ( $scope.disabled ) return;

            let today = $rootScope.data;
            const next = new Date( today.setDate( today.getDate()+1) );
            $rootScope.data = next;

            console.log('nextDate: ', next.getDate());
            console.log('todayDate: ', today.getDate());
            if ( next.getMonth() == now.getMonth() && next.getDate() == now.getDate() ) {
                $scope.disabled = true;
            }

            DashboardFactory.getDay(next).then( data => {
                $scope.activities = data;
            });
        };

    });
