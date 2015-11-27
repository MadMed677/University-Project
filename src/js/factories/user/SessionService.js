import _                from 'lodash';

export default (ngModule) =>
ngModule.factory('SessionService', ($injector) => {
    return {
        checkAccess(event, toState, toParams, fromState, fromParams) {
            let $scope = $injector.get('$rootScope'),
                $sessionStorage = $injector.get('$sessionStorage');

            if ( !_.isUndefined(toState.data) ) {
                if ( !_.isUndefined(toState.data) && toState.data.needAuth ) {
                    console.log('Need Auth');
                    /**
                     * действия до входа БЕЗ авторизации
                     */

                    event.preventDefault();
                    $scope.$state.go('auth.login');
                } else {
                    console.log('No Need Auth');
                    /**
                     * Вход С авторизацией
                     */

                    if ( $sessionStorage.user ) {
                        $scope.$root.user = $sessionStorage.user;
                    } else {
                        /**
                         * если пользователь НЕ авторизован
                         * отправляем на страницу авторизации
                         */

                        //event.preventDefault();
                        //$scope.$state.go('auth.login');
                    }
                }
            }
        }
    };
});