export default (ngModule) =>
    ngModule.controller('BodyCtrl', ($scope, $rootScope, UserFactory, $state) => {
        $rootScope.user = null;

        UserFactory.login().then( data => {
            $rootScope.user = data;
        });

        $scope.$on('user:logout', () => {
            UserFactory.logout().then( () => {
                $rootScope.user = null;
                $state.go('list');
            });
        });
    });
