export default (ngModule) =>
    ngModule.controller('BodyCtrl', ($scope, $rootScope, UserFactory) => {
        $rootScope.user = null;

        UserFactory.login().then( data => {
            console.log('data: ', data);
            $rootScope.user = data;
        });

        $scope.$on('user:logout', () => {
            UserFactory.logout().then( () => {
                $rootScope.user = null;
            });
        });
    });
