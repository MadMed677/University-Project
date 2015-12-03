import _                    from 'lodash';

export default (ngModule) =>
    ngModule.directive('dashboardInput', (CategoryFactory, $rootScope) => {
        return {
            restrict: 'E',
            scope: { activities: '=' },
            template: require('./dashboard-input.html'),
            link: function(scope, element) {

                CategoryFactory.all().then( data => scope.categories = data );

            }
        };
    });
