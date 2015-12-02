export default ngModule => {

    require('./BodyCtrl.js')(ngModule);
    require('./IndexCtrl.js')(ngModule);
    require('./LoginCtrl.js')(ngModule);
    require('./ProfileCtrl.js')(ngModule);
    require('./DashboardCtrl.js')(ngModule);

};
