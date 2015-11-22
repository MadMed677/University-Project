export default (ngModule) =>
    ngModule.controller('IndexCtrl', ($scope) => {
        $scope.name = 'some name';
    });