({
    extendsFrom: 'ConfigDrawerLayout',


    _checkConfigMetadata: function() {
        var hasConfig = this._super("_checkConfigMetadata");
        if (!hasConfig){
            console.log("Initial Setup");
        }
        return true;
    },

    _checkModuleAccess: function() {
        var acls = app.user.getAcls().dm_Recycler,
            isSysAdmin = (app.user.get('type') == 'admin'),
            isDev = (!_.has(acls, 'developer'));

        return (isSysAdmin || isDev);
    }
})
