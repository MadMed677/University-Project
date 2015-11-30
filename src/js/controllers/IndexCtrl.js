export default (ngModule) =>
    ngModule.controller('IndexCtrl', ($scope, ActivitiesFactory) => {

        $scope.activities = [];
        ActivitiesFactory.all().then( (activities) => {
            $scope.activities = activities;
        });

    });