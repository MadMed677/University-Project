export default (ngModule) =>
    ngModule.directive('modalAuth', (UserFactory, $rootScope) => {
        return {
            restrict: 'E',
            scope: {},
            template: require('./modal-auth.html'),
            link: function(scope, element) {

                const modal = $('#myModal');

                scope.formAuthorize = () => {
                    UserFactory.auth(scope.user).then( data => {
                        $rootScope.user = data;
                        modal.modal('hide');
                    });
                };

            }
        };
    });
