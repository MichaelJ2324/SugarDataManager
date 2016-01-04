({
    extendsFrom: 'RecordlistView',

    initialize: function(options) {
        console.log("dm_Recycle RecordList View init");
        this._super('initialize', [options]);
        this.layout.on("list:restorerow:fire",this.restore,this);
        this.layout.on("list:restoreAllrow:fire",this.restoreAll,this);
        this.layout.on("list:deleteAllrow:fire",this.warnDeleteAll,this);
    },
    warnDeleteAll: function(){
        console.log("Need to get the model to pass to WarnDelete");
        console.log(this.context);
    },
    warnDelete: function(model,relationshipData) {
        var self = this;
        this._modelToDelete = model;
        relationshipData = relationshipData || false;

        self._targetUrl = Backbone.history.getFragment();
        //Replace the url hash back to the current staying page
        if (self._targetUrl !== self._currentUrl) {
            app.router.navigate(self._currentUrl, {trigger: false, replace: true});
        }

        var warnLabel = 'LBL_MASS_DELETE_WARNING';
        if (relationshipData==true){
            warnLabel = 'LBL_MASS_DELETE_ALL_WARNING'
        }

        app.alert.show('delete_confirmation', {
            level: 'confirmation',
            messages: app.lang.getModString(warnLabel,'dm_Recycler'),
            onConfirm: _.bind(self.deleteModel, self),
            onCancel: function() {
                self._modelToDelete = null;
            }
        });
    },

    toggleEdit: function(isEdit) {
        return false;
    },
    deleteModel: function() {
        var self = this,
            model = this._modelToDelete;

        model.destroy({
            //Show alerts for this request
            showAlerts: {
                'process': true,
                'success': {
                    messages: self.getDeleteMessages(self._modelToDelete).success
                }
            },
            success: function() {
                var redirect = self._targetUrl !== self._currentUrl;
                self._modelToDelete = null;
                self.collection.remove(model, { silent: redirect });
                if (redirect) {
                    self.unbindBeforeRouteDelete();
                    //Replace the url hash back to the current staying page
                    app.router.navigate(self._targetUrl, {trigger: true});
                    return;
                }
                app.events.trigger("preview:close");
                if (!self.disposed) {
                    self.render();
                }

                self.layout.trigger("list:record:deleted", model);
            }
        });
    }
})
