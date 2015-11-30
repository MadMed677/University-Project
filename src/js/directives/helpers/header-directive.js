export default (ngModule) =>
    ngModule.directive('headerDirective', () => {
        return {
            restrict: 'E',
            scope: {},
            template: require('./header-directive.html'),
            link: function(scope, element) {



            }
        };
    });