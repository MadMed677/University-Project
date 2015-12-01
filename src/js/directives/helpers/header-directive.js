export default (ngModule) =>
    ngModule.directive('headerDirective', ($rootScope) => {
        return {
            restrict: 'E',
            scope: {},
            template: require('./header-directive.html'),
            link: function(scope, element) {

                scope.showAuthModal = () => {
                    $('#myModal').modal('show');
                };

                scope.signOut = () => { scope.$emit('user:logout') };

            }
        };
    });
