({
    extendsFrom: 'ConfigDrawerContentLayout',

    duplicatesSystemTitle: undefined,
    duplicatesSystemText: undefined,
    mergeSettingsTitle: undefined,
    mergeSettingsText: undefined,

    /**
     * @inheritdoc
     * @override
     */
    _initHowTo: function() {
        this.duplicatesSystemTitle = app.lang.get('LBL_DUPLICATES_SYSTEM_CONFIG_TITLE', 'dm_Duplicates');
        this.duplicatesSystemText = app.lang.get('LBL_DUPLICATES_SYSTEM_CONFIG_HELP', 'dm_Duplicates');
        this.mergeSettingsTitle = app.lang.get('LBL_DUPLICATES_MERGE_CONFIG_TITLE', 'dm_Duplicates');
        this.mergeSettingsText = app.lang.get('LBL_DUPLICATES_MERGE_CONFIG_HELP', 'dm_Duplicates');
    },

    /**
     * @inheritdoc
     * @override
     */
    _switchHowToData: function(helpId) {
        switch(helpId) {
            case 'config-system':
                this.currentHowToData.title = this.duplicatesSystemTitle;
                this.currentHowToData.text = this.duplicatesSystemText;
                break;

            case 'config-merge':
                this.currentHowToData.title = this.mergeSettingsTitle;
                this.currentHowToData.text = this.mergeSettingsText;
                break;
        }
    }
})
