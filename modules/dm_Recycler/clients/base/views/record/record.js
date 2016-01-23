({
    extendsFrom: 'RecordView',

 //    events: {
	// 	'click *' : 'preventClick'
	// },

    initialize: function(options){
        console.log("dm_Recycler Record View Initialization.");
        this._super("initialize",[options]);
    },

    delegateButtonEvents: function() {
        this._super("delegateButtonEvents");
        this.context.on('button:restore_button:click', this.restoreRecord, this);
    },

    restoreRecord: function(){
    	
    	var self = this;

    	//Disable buttons to avoide collision clicks
    	this.toggleButtons(false);

    	//Add loading message...
    	app.alert.show('Recycler_restoreRecord', {
            level: 'process'
        });

    	var url = app.api.buildURL('Recycler', this.model.id);

		var params = {
            bean_module: this.model.get("bean_module"),
            bean_id: this.model.get("bean_id")
        };

    	app.api.call('update', url, params, {
    		success: function(data, request) {
                self.toggleButtons(true);
                app.alert.dismiss('Recycler_restoreRecord');

                if(!_.isEmpty(data.error) && !_.isEmpty(data.error_message)) {
                	//An error occured
                    app.alert.show('Recycler_restoreRecordError', {
                        level: 'error',
                        messages: data.error_message,
                        autoClose: false
                    });
                } else {
                    //Record has been restored
                    self.model.set("restored",1);
                    //TODO: Add date_restored
                    self.model.save();
                    app.alert.show('Recycler_restoreRecordComplete', {
                        level: 'info',
                        messages: "Record restore complete.",
                        autoClose: true
                    });
                }
            },
            error: function(data) {
                self.toggleButtons(true);
                app.alert.dismiss('Recycler_restoreRecord');
                // refresh token if it has expired
                app.error.handleHttpError(data, {});
            }
        });
    	
    }

    

})