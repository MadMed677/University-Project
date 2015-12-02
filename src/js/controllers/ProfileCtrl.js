export default (ngModule) =>
    ngModule.controller('ProfileCtrl', ($scope, UserFactory) => {

        $scope.activities = [];

        UserFactory.profile().then( data => {
            $scope.activities = data.activities;
        });

    });
