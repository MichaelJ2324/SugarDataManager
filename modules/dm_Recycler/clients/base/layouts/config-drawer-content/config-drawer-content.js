({
    extendsFrom: 'ConfigDrawerContentLayout',

    recyclerSystemTitle: undefined,
    recyclerSystemText: undefined,
    purgeSettingsTitle: undefined,
    purgeSettingsText: undefined,

    /**
     * @inheritdoc
     * @override
     */
    _initHowTo: function() {

        this.recyclerSystemTitle = app.lang.get('LBL_RECYCLER_SYSTEM_CONFIG_TITLE', 'dm_Recycler');
        this.recyclerSystemText = app.lang.get('LBL_RECYCLER_SYSTEM_CONFIG_HELP', 'dm_Recycler');
        this.purgeSettingsTitle = app.lang.get('LBL_RECYCLER_PURGE_CONFIG_TITLE', 'dm_Recycler');
        this.purgeSettingsText = app.lang.get('LBL_RECYCLER_PURGE_CONFIG_HELP', 'dm_Recycler');
    },

    /**
     * @inheritdoc
     * @override
     */
    _switchHowToData: function(helpId) {
        switch(helpId) {
            case 'config-system':
                this.currentHowToData.title = this.recyclerSystemTitle;
                this.currentHowToData.text = this.recyclerSystemText;
                break;

            case 'config-purge':
                this.currentHowToData.title = this.purgeSettingsTitle;
                this.currentHowToData.text = this.purgeSettingsText;
                break;
        }
    }
})
