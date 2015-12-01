import _                from 'lodash';
import Request          from '../../helpers/_api.js';

export default (ngModule) =>
    ngModule.factory('UserFactory', (SessionService, $http, $q) => {
        const url = 'api/v1/user';

        return {
            auth(req) {
                const deffered = $q.defer();
                const request = new Request.http({
                    method: 'POST',
                    body: req,
                    url: `${url}`
                });

                // Wait until data is loaded
                request.then( (data) => {
                    // If everything is all right
                    if ( data.status == 200 ) {
                        // Save to localStorage
                        window.localStorage.setItem('user', JSON.stringify(data.data));

                        // Response
                        deffered.resolve(data.data);
                    } else {
                        // Clear localStorage
                        window.localStorage.setItem('user', "");

                        // Reject
                        deffered.reject();
                    }
                });

                return deffered.promise;
            },

            login() {
                const deffered = $q.defer();
                const request = new Request.http({
                    method: 'GET',
                    url: `${url}`
                });

                // Try find this user in localStorage
                // if it fail set "GET" request to `${url}`
                const user = JSON.parse( window.localStorage.getItem('user') );
                if ( !user || !_.isEmpty(user) ) { deffered.resolve(user) }

                // Wait while data is going to load
                request.then( (data) => {
                    // If all ok
                    if ( data.status == 200 ) {
                        deffered.resolve(data.data);
                    } else {
                        deffered.reject();
                    }
                });

                return deffered.promise;
            },

            logout() {
                const deffered = $q.defer();
                const request = new Request.http({
                    method: 'GET',
                    url: `api/v1/logout`
                });

                // Wait while data is going to load
                request.then( (data) => {
                    // If all ok
                    if ( data.status == 200 ) {
                        deffered.resolve(data.data);
                    } else {
                        deffered.reject();
                    }
                });

                return deffered.promise;
            }
        };
    });
