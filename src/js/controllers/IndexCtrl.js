export default (ngModule) =>
    ngModule.controller('IndexCtrl', ($scope, ActivitiesFactory) => {

        $scope.activities = [];
        ActivitiesFactory.all().then( (activities) => {
            $scope.activities = activities;
        });

        $scope.dynamicPopover = {
            templateUrl: 'myPopoverTemplate.html',
            title: 'Tags'
        };

        $scope.selectActivity = (activity) => {
            $scope.activeActivity = activity;
        };

    });