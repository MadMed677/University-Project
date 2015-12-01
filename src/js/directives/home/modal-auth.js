export default (ngModule) =>
    ngModule.directive('modalAuth', () => {
        return {
            restrict: 'E',
            scope: {},
            template: require('./modal-auth.html'),
            link: function(scope, element) {

                scope.formAuthorize = () => {
                    console.log( scope.user );
                };

            }
        };
    });
