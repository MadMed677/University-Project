import _                    from 'lodash';

export default (ngModule) =>
    ngModule.directive('dashboardInput', (CategoryFactory, TagFactory, $rootScope) => {
        return {
            restrict: 'E',
            scope: { activities: '=' },
            template: require('./dashboard-input.html'),
            link: function(scope, element) {
                // Get all tags
                TagFactory.all().then( data => scope.tagsList = data );
                // Get all categories
                CategoryFactory.all().then( data => scope.categories = data );

                scope.add = () => {
                    console.log(scope.user);
                };
            }
        };
    });
