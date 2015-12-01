export default (ngModule) =>
    ngModule.controller('BodyCtrl', ($scope, $rootScope, UserFactory) => {
        $rootScope.user = null;

        UserFactory.login().then( data => {
            $rootScope.user = data;
        });
    });