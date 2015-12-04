import _                    from 'lodash';

export default (ngModule) =>
    ngModule.directive('modalLocation', ($rootScope, $state) => {
        return {
            restrict: 'E',
            scope: { activities: '=', activity: '=' },
            template: require('./modal-location.html'),
            link: function(scope, element) {

                const modal = $('#myModalLocation');
                const ymapId = 'activity-map';
                scope.position = null;

                let map = null,
                    placemark = null;

                ymaps.ready( () => {
                    map = new ymaps.Map(ymapId, {
                        center: [0,0],
                        zoom: 16,
                        //options: {
                        //    minZoom: 16,
                        //    maxZoom: 16,
                        //},
                        //controls: []
                    });

                    map.events.add('click', event => {
                        // Get new coords
                        const coords = event.get('coords');

                        // Remove old placemark
                        if ( placemark ) map.geoObjects.remove(placemark);
                        // Add new placemark
                        placemark = new ymaps.Placemark(coords, { hintContent: `This location` });
                        // Add new placemark to the map
                        map.geoObjects.add(placemark);
                    });

                    window.navigator.geolocation.getCurrentPosition( (position) => {
                        scope.position = position.coords;
                        if ( scope.position.latitude ) {
                            // Remove previous placemark
                            if ( placemark ) map.geoObjects.remove(placemark);

                            // Centered map
                            const center = [
                                scope.position.latitude,
                                scope.position.longitude
                            ];
                            map.setCenter(center);

                            // Create new placemark
                            placemark = new ymaps.Placemark(center, {
                                hintContent: `${scope.activity.title || 'Your location'}`
                            });

                            // Add new placemark to the map
                            map.geoObjects.add(placemark);
                        }
                    });
                });


                $rootScope.$on('modalLocation:show', () => modal.modal('show'));

            }
        };
    });
