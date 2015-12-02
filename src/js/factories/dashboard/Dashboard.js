import _                from 'lodash';
import Request          from '../../helpers/_api.js';

export default (ngModule) =>
    ngModule.factory('DashboardFactory', ($http, $q) => {
        const url = 'api/v1/dashboard';

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

            getDay(day = new Date()) {

                const date = {
                    year: (day.getFullYear()).toString(),
                    month: (day.getMonth() + 1).toString(),
                    day: day.getDate() < 10 ? `0${day.getDate()}` : day.getDate().toString()
                };

                const dateString = `${date.year}-${date.month}-${date.day}`;
                const deffered = $q.defer();
                const request = new Request.http({
                    method: 'GET',
                    url: `${url}/${dateString}`
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
            }
        };
    });
