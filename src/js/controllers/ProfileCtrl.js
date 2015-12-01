export default (ngModule) =>
    ngModule.controller('ProfileCtrl', ($scope, UserFactory) => {

        UserFactory.profile().then( data => {
            console.log('data: ', data);
        });

    });
