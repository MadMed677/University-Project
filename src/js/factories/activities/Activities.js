import _                from 'lodash';

export default (ngModule) =>
    ngModule.factory('ActivitiesFactory', (SessionService) => {
        return {
            all() {
                return 'hello'
            }
        };
    });