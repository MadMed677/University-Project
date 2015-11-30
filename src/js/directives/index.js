export default ngModule => {

    require('./helpers/navigation.js')(ngModule);
    require('./helpers/header-directive.js')(ngModule);

};