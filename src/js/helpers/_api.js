import _                    from 'lodash';
import ApiSettings          from './settings.js';

export default class Request {
    constructor(params, $resource) {
        this.url        = params.url;
        this.method     = params.method || 'get';
        this.param      = params.param || {};
        this.body       = params.body || {};
        this.methods    = params.methods || {};
        this.$resource  = $resource(
            ApiSettings.baseURL+this.url,
            this.param,
            this.methods
        );

        _.each(this.methods, (method, key) => {
            _.assign(method, this.commonMethods());
            this[key] = this.$resource[key];
        });
    }

    commonMethods() {
        return {
            method: 'get',
            headers: { 'Access-token': 'cf13cf1c287fc0cf5285' }
        };
    }

    static http(params, $http) {
        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

        if ( params.params ) params.params = `?${$.param(params.params)}`;
        else params.params = '';

        let deffered = new Promise( (resolve, reject) => {
            $.ajax(ApiSettings.baseURL + params.url + params.params, {
                type: params.method,
                data: params.body,
                headers: {},
                xhrFields: { withCredentials: true },
                crossDomain: true,
                success: (res, status, params) => {
                    //console.log('res: ', res);
                    let result = { data: res, status: params.status };
                    //console.log('res jQuery: ', result);
                    resolve(result);
                },
                error: (error) => reject(error)
            });
        });

        return deffered;
    }
}