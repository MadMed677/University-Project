export default ngModule => {

    require('./user/SessionService.js')(ngModule);
    require('./activities/Activities.js')(ngModule);

};