import _                from 'lodash';

export default (ngModule) =>
    ngModule.directive('locationDirective', ($rootScope) => {
        return {
            restrict: 'E',
            scope: {
                activity: '='
            },
            template: require('./location.html'),
            link: function(scope, element) {

                scope.location = {};

                let map = null,
                    placemark = null;

                ymaps.ready( () => {
                    map = new ymaps.Map('map', {
                        center: [0,0],
                        zoom: 16,
                        options: {
                            minZoom: 16,
                            maxZoom: 16,
                        },
                        controls: []
                    });
                });

                console.log('activity: ', scope.activity);
                scope.$watch('activity', (newActivity) => {
                    if ( !_.isEmpty(newActivity) ) {
                        console.log('newActivity: ', newActivity);
                        console.log('location: ', scope.location);
                        scope.location.center = [
                            newActivity.location.latitude,
                            newActivity.location.longitude
                        ];

                        // Remove previous placemark
                        if ( placemark ) map.geoObjects.remove(placemark);
                        // Set center for new center location
                        map.setCenter(scope.location.center);

                        // Create new placemark
                        placemark = new ymaps.Placemark(scope.location.center, {
                            hintContent: `${scope.activity.location.title}`
                        });

                        // Add new placemark to the map
                        map.geoObjects.add(placemark);

                    }
                });
            }
        };
    });
