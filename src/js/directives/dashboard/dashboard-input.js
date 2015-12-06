import _                    from 'lodash';

export default (ngModule) =>
    ngModule.directive('dashboardInput', (CategoryFactory, TagFactory, ActivitiesFactory, $rootScope) => {
        return {
            restrict: 'E',
            scope: { activities: '=', activity: '=' },
            template: require('./dashboard-input.html'),
            link: function(scope, element) {
                scope.showLocationTooltip = false;

                // Get all tags
                TagFactory.all().then( data => scope.tagsList = data );
                // Get all categories
                CategoryFactory.all().then( data => scope.categories = data );
                // Set location
                $rootScope.$on('location:set', (e, location) => {
                    scope.activity.location = location

                    if ( scope.activity.location ) {
                        const location = scope.activity.location;
                        ymaps.geocode([location.latitude, location.longitude]).then( res => {
                            scope.activity.location.name = res.geoObjects.get(0).properties.get('name');
                            scope.showLocationTooltip = true;
                        });
                    }
                });

                scope.$watch('activity.tags', (newTags) => {
                    console.log('newTags: ', newTags);
                }, true);

                scope.add = () => {
                    let request = { ...scope.activity };
                    request.tags = _.pluck(request.tags, 'id');

                    ActivitiesFactory.add(request).then( res => {
                        scope.activities = res;
                    });
                };

                scope.dynamicPopover = {
                    templateUrl: 'locationTemplate.html',
                    title: 'Location'
                };

                scope.tagsPopover = {
                    templateUrl: 'tagsTemplate.html',
                    title: 'Create new tags'
                };

                scope.submit = () => {
                    TagFactory.save(scope.tagsPopover.tag).then( () => {
                        // Grab updated data from the
                        TagFactory.all().then( data => {
                            scope.tagsList = data;
                            scope.tagsPopover.tag = '';
                        });
                    });
                };

                scope.showModalLocation = () => $rootScope.$emit('modalLocation:show');
            }
        };
    });
