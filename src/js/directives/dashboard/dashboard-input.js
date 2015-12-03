import _                    from 'lodash';

export default (ngModule) =>
    ngModule.directive('dashboardInput', (CategoryFactory, $rootScope) => {
        return {
            restrict: 'E',
            scope: { activities: '=' },
            template: require('./dashboard-input.html'),
            link: function(scope, element) {

                scope.tagsList = [
                    { id: 1, title: 'One' },
                    { id: 2, title: 'Two' },
                    { id: 3, title: 'Three' },
                    { id: 4, title: 'Four' }
                ];
                CategoryFactory.all().then( data => scope.categories = data );

                scope.add = () => {
                    console.log(scope.user);
                };
            }
        };
    });
