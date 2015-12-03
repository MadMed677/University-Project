import _                    from 'lodash';

export default (ngModule) =>
    ngModule.directive('dashboardInput', ($rootScope) => {
        return {
            restrict: 'E',
            scope: { activities: '=' },
            template: require('./dashboard-input.html'),
            link: function(scope, element) {

                

            }
        };
    });
