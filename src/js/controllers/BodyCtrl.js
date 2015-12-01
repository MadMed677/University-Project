export default (ngModule) =>
    ngModule.controller('BodyCtrl', ($scope, $rootScope, UserFactory) => {
        $rootScope.user = null;

        UserFactory.auth({ login :'madmed677', password: 'password'}).then( data => {
            console.log('data: ', data);
        })
    });