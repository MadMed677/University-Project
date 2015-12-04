import _                    from 'lodash';

export default (ngModule) =>
    ngModule.directive('dashboardInput', (CategoryFactory, TagFactory, ActivitiesFactory, $rootScope) => {
        return {
            restrict: 'E',
            scope: { activities: '=', activity: '=' },
            template: require('./dashboard-input.html'),
            link: function(scope, element) {
                // Get all tags
                TagFactory.all().then( data => scope.tagsList = data );
                // Get all categories
                CategoryFactory.all().then( data => scope.categories = data );

                scope.add = () => {
                    let request = { ...scope.activity };
                    request.tags = _.pluck(request.tags, 'id');

                    ActivitiesFactory.add(request).then( res => {
                        console.warn('res: ', res);
                        scope.activities = res;
                    });
                };

                scope.showModalLocation = () => $rootScope.$emit('modalLocation:show');
            }
        };
    });
