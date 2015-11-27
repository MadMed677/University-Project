export default (ngModule) =>
    ngModule.directive('navigation', () => {
        return {
            restrict: 'E',
            scope: {},
            template: require('./navigation.html'),
            link: function(scope, element) {



            }
        };
    });