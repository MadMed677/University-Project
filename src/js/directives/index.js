export default ngModule => {

    require('./helpers/navigation.js')(ngModule);
    require('./helpers/header-directive.js')(ngModule);

    require('./home/modal-auth.js')(ngModule);

    require('./profile/location.js')(ngModule);

};
