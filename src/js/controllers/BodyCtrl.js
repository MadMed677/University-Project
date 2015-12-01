export default (ngModule) =>
    ngModule.controller('BodyCtrl', ($scope, $rootScope, UserFactory) => {
        $rootScope.user = null;

        UserFactory.auth({ login :'madmed', password: 'password', email: 'madmed677@gmail.com' }).then( data => {
            $rootScope.user = data;
        });
    });