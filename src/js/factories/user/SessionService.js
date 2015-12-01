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
                     * действия для входа БЕЗ авторизации
                     */

                    const strUser = window.localStorage.getItem('user');
                    if ( strUser ) {
                        if ( !JSON.parse(strUser) ) {
                             /**
                              * Пользователь не авторизован
                              */
                              event.preventDefault();
                              $scope.$state.go('auth.login');
                         }
                     } else {
                         event.preventDefault();
                         $scope.$state.go('auth.login');
                     }
                } else {
                    console.log('No Need Auth');
                    /**
                     * Вход С авторизацией
                     */

                    
                }
            }
        }
    };
});
