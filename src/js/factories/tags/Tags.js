import _                from 'lodash';
import Request          from '../../helpers/_api.js';

export default (ngModule) =>
    ngModule.factory('TagFactory', ($http, $q) => {
        const url = 'api/v1/tags';

        return {
            all() {
                const deffered = $q.defer();
                const request = new Request.http({
                    method: 'GET',
                    url: `${url}`
                });

                // Ждем, когда придут данные
                request.then( (data) => {
                    // Если все ok
                    if ( data.status === 200 ) {
                        deffered.resolve(data.data);
                    } else {
                        deffered.reject();
                    }
                });

                return deffered.promise;
            },

            save(tags = []) {
                if ( !_.isArray(tags) ) tags = [tags];

                const deffered = $q.defer();
                const request = new Request.http({
                    method: 'POST',
                    url: `${url}`,
                    body: { tags }
                });

                request.then( (data) => {
                    if ( data.status === 200 ) {
                        deffered.resolve(data.data);
                    } else {
                        deffered.reject();
                    }
                }, deffered.reject());

                return deffered.promise;
            }
        };
    });
