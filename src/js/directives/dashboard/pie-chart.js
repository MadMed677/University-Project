import d3                   from 'd3';
import c3                   from 'c3';

export default (ngModule) =>
    ngModule.directive('pieChart', (UserFactory, $rootScope) => {
        return {
            restrict: 'E',
            scope: { activities: '=' },
            template: require('./pie-chart.html'),
            link: function(scope, element) {

                scope.$watch('activities', () => { console.log(scope.activities); });

                let chart = c3.generate({
                    bindto: '#chart',
                    data: {
                        type: 'pie',
                        columns: []
                    }
                });

                setTimeout( () => {
                    chart.load({
                        columns: [
                            ['data1', 50],
                            ['data2', 15],
                            ['data3', 60]
                        ]
                    });
                }, 1000);

                setTimeout( () => {
                    chart.unload({
                        ids: 'data1'
                    });
                }, 1500);

            }
        };
    });
