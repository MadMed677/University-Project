export default (ngModule) =>
    ngModule.controller('IndexCtrl', ($scope, ActivitiesFactory) => {
        console.log( 'activities: ', ActivitiesFactory.all() );
    });