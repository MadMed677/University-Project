export default (ngModule) =>
    ngModule.directive('inputOnEnter', () =>
            (scope, element, attrs) => {
                element.bind('keydown keypress', event => {
                    if ( event.which == 13 ) {
                        scope.$apply( () => scope.$eval(attrs.inputOnEnter));
                        event.preventDefault();
                    }
                })
            }
    );