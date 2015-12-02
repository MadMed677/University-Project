import _                    from 'lodash';

export default (ngModule) =>
    ngModule.controller('ProfileCtrl', ($scope, UserFactory) => {

        $scope.activities = [];
        $scope.activitiesList = [];

        UserFactory.profile().then( data => {
            $scope.activities = data.activities;
        });

        $scope.$watch('activities', (newActivities) => {
            let localActivityList = [];

            _.each(newActivities, newActivity => {
                // Add label
                localActivityList.push({
                    date: newActivity.date,
                    view: 'label'
                });

                // Add data
                localActivityList.push(newActivity);
            });

            $scope.activitiesList = localActivityList;

            console.log('$scope.activitiesList: ', $scope.activitiesList);
        }, true);

    });
