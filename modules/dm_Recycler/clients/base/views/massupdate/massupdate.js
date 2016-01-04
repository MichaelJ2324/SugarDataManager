({
    extendsFrom: 'MassupdateView',

    initialize: function(options){
        console.log("dm_Recycler Mass Update View Initialization.");
        this._super("initialize",[options]);
    },

    delegateListFireEvents: function(){
        this.layout.on("list:massRestore:fire", this.restore, this);
        this.layout.on("list:massRestoreAll:fire", this.restoreAll, this)
        this.layout.on("list:massdelete:fire", this.warnDelete, this);
        this.layout.on("list:massDeleteAll:fire", this.warnDeleteAll, this);
    },

    warnDelete: function(relationshipData){
        relationshipData = relationshipData || false;
        this._modelsToDelete = this.getMassUpdateModel(this.module);
        this._modelsToDelete.setChunkSize(this._settings.mass_delete_chunk_size);

        this._targetUrl = Backbone.history.getFragment();
        //Replace the url hash back to the current staying page
        if (this._targetUrl !== this._currentUrl) {
            app.router.navigate(this._currentUrl, {trigger: false, replace: true});
        }

        this.hideAll();

        var warnLabel = 'LBL_MASS_DELETE_WARNING';
        if (relationshipData==true){
            warnLabel = 'LBL_MASS_DELETE_ALL_WARNING'
        }

        app.alert.show('delete_confirmation', {
            level: 'confirmation',
            messages: app.lang.getModString(warnLabel,'dm_Recycler'),
            onConfirm: _.bind(this.deleteModels, this,relationshipData),
            onCancel: _.bind(function() {
                this._modelsToDelete = null;
                app.router.navigate(this._targetUrl, {trigger: false, replace: true});
            }, this)
        });
    },
    warnDeleteAll: function(){
        this.warnDelete(true);
    },
    deleteModels: function(relationshipData) {
        relationshipData = relationshipData || false;
        var self = this,
            collection = self._modelsToDelete;
        var lastSelectedModels = _.clone(collection.models);
        if(collection) {
            collection.fetch({
                relate: relationshipData,
                showAlerts: false,
                method: 'delete',
                error: function() {
                    app.alert.show('error_while_mass_update', {
                        level:'error',
                        title: app.lang.get('ERR_INTERNAL_ERR_MSG'),
                        messages: app.lang.get('ERR_HTTP_500_TEXT')
                    });
                },
                success: function(data, response, options) {
                    self.layout.trigger("list:records:deleted", lastSelectedModels);
                    var redirect = self._targetUrl !== self._currentUrl;
                    if (options.status === 'done') {
                        //TODO: Since self.layout.trigger("list:search:fire") is deprecated by filterAPI,
                        //TODO: Need trigger for fetching new record list
                        self.layout.context.reloadData({showAlerts: false});
                    } else if (options.status === 'queued') {
                        app.alert.show('jobqueue_notice', {level: 'success', title: app.lang.get('LBL_MASS_UPDATE_JOB_QUEUED'), autoClose: true});
                    }
                    self._modelsToDelete = null;
                    if (redirect) {
                        self.unbindBeforeRouteDelete();
                        //Replace the url hash back to the current staying page
                        app.router.navigate(self._targetUrl, {trigger: true});
                    }
                }
            });
        }
    },
    restore: function(relationshipData){

    },
    restoreAll: function(){
        this.restore(true);
    }
})