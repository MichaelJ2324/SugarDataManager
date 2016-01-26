/**
 * @class View.Fields.Base.EnumField
 * @alias SUGAR.App.view.fields.BaseEnumField
 * @extends View.Field
 */
({
    fieldTag: 'input.select2',

    plugins: ['EllipsisInline'],

    items: null,

    /*
    extraField: false,
    extraFieldTag: "moduleField",
    moduleDD: "dm_moduleList",
    */
    selectedModule: null,
    moduleField: null,

    initialize: function(){
        this._super("initialize", arguments);
        console.log(this);
        if (!_.isEmpty(this.def.moduleField)){
            this.moduleField = this.def.moduleField;
        }
    },

    /**
     * Bind the additional keydown handler on select2
     * search element (affected by version 3.4.3).
     *
     * Invoked from {@link app.plugins.Editable}.
     * @param {Function} callback Callback function for keydown.
     */
    bindKeyDown: function(callback) {
        var $el = this.$(this.fieldTag);
        if ($el) {
            $el.on('keydown.record', {field: this}, callback);
            var plugin = $el.data('select2');
            if (plugin) {
                if (plugin.focusser) {
                    plugin.focusser.on('keydown.record', {field: this}, callback);
                }
                plugin.search.on('keydown.record', {field: this}, callback);
            }
        }
    },

    /**
     * Unbind the additional keydown handler.
     *
     * Invoked from {@link app.plugins.Editable}.
     * @param {Function} callback Callback function for keydown.
     */
    unbindKeyDown: function(callback) {
        if (this.$el) {
            var $el = this.$(this.fieldTag);
            if ($el) {
                $el.off('keydown.record', callback);
                var plugin = $el.data('select2');
                if (plugin) {
                    plugin.search.off('keydown.record', callback);
                }
            }
        }
    },

    /**
     * @returns {Field} this
     * @override
     * @private
     */
    _render: function() {
        var self = this;

        var module = self.model.get(this.moduleField);
        if (!_.isEmpty(module)){
            if (!this.items || _.isEmpty(this.items)) {
                if (_.isEmpty(this.selectedModule)){
                    this.$el.html(app.lang.get('LBL_PLEASE_SELECT_MODULE'));
                    return this;
                }
                this.loadEnumOptions(this.selectedModule);
            }
        }else{

        }

        this.items = this._filterOptions(this.items);

        app.view.Field.prototype._render.call(this);
        // if displaying the noaccess template, just exit the method
        if (this.tplName == 'noaccess') {
            return this;
        }
        var select2Options = this.getSelect2Options(optionsKeys);
        var $el = this.$(this.fieldTag);
        //FIXME remove check for tplName SC-2608
        if (this.tplName === 'edit' || this.tplName === 'list-edit') {
            $el.select2(select2Options);
            var plugin = $el.data('select2');

            if (this.dir) {
                plugin.container.attr('dir', this.dir);
                plugin.results.attr('dir', this.dir);
            }

            if (plugin && plugin.focusser) {
                plugin.focusser.on('select2-focus', _.bind(_.debounce(this.handleFocus, 0), this));
            }
            $el.select2("container").addClass("tleft");
            $el.on('change', function(ev) {
                var value = ev.val;
                if (_.isUndefined(value)) {
                    return;
                }
                if (self.model) {
                    self.model.set(self.name, self.unformat(value));
                }
            });
            if (this.def.ordered) {
                $el.select2('container').find('ul.select2-choices').sortable({
                    containment: 'parent',
                    start: function() {
                        $el.select2('onSortStart');
                    },
                    update: function() {
                        $el.select2('onSortEnd');
                    }
                });
            }
        } else if (this.tplName === 'disabled') {
            $el.select2(select2Options);
            $el.select2('disable');
        }
        //Setup selected value in Select2 widget
        if (!_.isUndefined(this.value)) {
            // To make pills load properly when autoselecting a string val
            // from a list val needs to be an array
            if (!_.isArray(this.value)) {
                this.value = [this.value];
            }
            // Trigger the `change` event only if we automatically set the
            // default value.
            $el.select2('val', this.value, !!defaultValue);
        }
        return this;
    },

    /**
     * Called when focus on inline editing
     */
    focus: function () {
        //We must prevent focus for multi select otherwise when inline editing the dropdown is opened and it is
        //impossible to click on a pill `x` icon in order to remove an item
    },

    /**
     * Load the options for this field and pass them to callback function.  May be asynchronous.
     * @param {Boolean} fetch (optional) Force use of Enum API to load options.
     * @param {Function} callback (optional) Called when enum options are available.
     */
    loadEnumOptions: function() {
        var self = this;

        if (!_.isEmpty(this.selectedModule)){
            var fields = app.metdata.getModule(this.selectedModule,'fields');
            _.each(fields,function(field, index){
                 this.items[field] = app.lang.getModString(field.label, this.selectedModule);
            }, this);
            return this.items;
        }else{
            this.items = [];
        }
    },

    /**
     * Helper function for generating Select2 options for this enum
     * @param {Array} optionsKeys Set of option keys that will be loaded into Select2 widget
     * @returns {{}} Select2 options, refer to Select2 documentation for what each option means
     */
    getSelect2Options: function(optionsKeys){
        var select2Options = {};
        select2Options.allowClear = _.indexOf(optionsKeys, "") >= 0;

        /* From http://ivaynberg.github.com/select2/#documentation:
         * Initial value that is selected if no other selection is made
         */
        select2Options.placeholder = app.lang.get("LBL_SEARCH_SELECT");

        /* From http://ivaynberg.github.com/select2/#documentation:
         * "Calculate the width of the container div to the source element"
         */
        select2Options.width = this.def.enum_width ? this.def.enum_width : '100%';

        /* Because the select2 dropdown is appended to <body>, we need to be able
         * to pass a classname to the constructor to allow for custom styling
         */
        select2Options.dropdownCssClass = this.def.dropdown_class ? this.def.dropdown_class : '';

        /* To get the Select2 multi-select pills to have our styling, we need to be able
         * to either pass a classname to the constructor to allow for custom styling
         * or set the 'select2-choices-pills-close' if the isMultiSelect option is set in def
         */
        select2Options.containerCssClass = this.def.container_class ? this.def.container_class : (this.def.isMultiSelect ? 'select2-choices-pills-close' : '');

        /* Because the select2 dropdown is calculated at render to be as wide as container
         * to make it differ the dropdownCss.width must be set (i.e.,100%,auto)
         */
        if (this.def.dropdown_width) {
            select2Options.dropdownCss = { width: this.def.dropdown_width };
        }

        /* All select2 dropdowns should only show the search bar for fields with 7 or more values,
         * this adds the ability to specify that threshold in metadata.
         */
        select2Options.minimumResultsForSearch = this.def.searchBarThreshold ? this.def.searchBarThreshold : 7;

        /* If is multi-select, set multiple option on Select2 widget.
         */
        select2Options.multiple = true;

        /* If we need to define a custom value separator
         */
        select2Options.separator = this.def.separator || ',';
        if (this.def.separator) {
            select2Options.tokenSeparators = [this.def.separator];
        }

        select2Options.initSelection = _.bind(this._initSelection, this);
        select2Options.query = _.bind(this._query, this);
        select2Options.sortResults = _.bind(this._sortResults, this);

        return select2Options;
    },

    /**
     * Set the option selection during select2 initialization.
     * Also used during drag/drop in multiselects.
     * @param {Selector} $ele Select2 element selector
     * @param {Function} callback Select2 data callback
     * @private
     */
    _initSelection: function($ele, callback){
        var data = [];
        var options = this.items;
        options = this.items = this._filterOptions(options);
        var values = $ele.val();
        values = values.split(this.def.separator || ',');
        _.each(_.pick(options, values), function(value, key){
            data.push({id: key, text: value});
        }, this);
        if(data.length === 1){
            callback(data[0]);
        } else {
            callback(data);
        }
    },

    /**
     * Returns dropdown list options which can be used for editing
     *
     * @param {Object} Dropdown list options
     * @returns {Object}
     * @private
     */
    _filterOptions: function (options) {
        var currentValue,
            syncedVal,
            newOptions = {},
            filter = app.metadata.getEditableDropdownFilter(this.def.options);

        if (_.isEmpty(filter)) {
            return options;
        }

        if (!_.contains(this.view.plugins, "Editable")) {
            return options;
        }
        //Force the current value(s) into the availible options
        syncedVal = this.model.getSyncedAttributes();
        currentValue = _.isUndefined(syncedVal[this.name]) ? this.model.get(this.name) : syncedVal[this.name];
        if (_.isString(currentValue)) {
            currentValue = [currentValue];
        }

        var currentIndex = {};

        // add current values to the index in case if current model is saved to the server in order to prevent data loss
        if (!this.model.isNew()) {
            _.each(currentValue, function(value) {
                currentIndex[value] = true;
            });
        }

        //Now remove the disabled options
        if (!this._keysOrder) {
            this._keysOrder = {};
        }
        _.each(filter, function(val, index) {
            var key = val[0],
                visible = val[1];
            if ((visible || key in currentIndex) && !_.isUndefined(options[key]) && options[key] !== false) {
                this._keysOrder[key] = index;
                newOptions[key] = options[key];
            }
        }, this);

        return newOptions;
    },

    /**
     * Adapted from eachOptions helper in hbt-helpers.js
     * Select2 callback used for loading the Select2 widget option list
     * @param {Object} query Select2 query object
     * @private
     */
    _query: function(query){
        var options = this.items;
        var data = {
            results: [],
            // only show one "page" of results
            more: false
        };
        if (_.isObject(options)) {
            _.each(options, function(element, index) {
                var text = "" + element;
                //additionally filter results based on query term
                if(query.matcher(query.term, text)){
                    data.results.push({id: index, text: text});
                }
            });
        } else {
            options = null;
        }
        query.callback(data);
    },

    /**
     * Sort the dropdown items.
     *
     * - If `def.sort_alpha` is `true`, return the dropdown items sorted
     * alphabetically.
     * - If {@link Core.Language#getAppListKeys} is defined for
     * `this.def.options`, return the items in this order.
     * - Otherwise, fall back to the default behavior and just return the
     * `results`.
     *
     * This method is the implementation of the select2 `sortResults` option.
     * See {@link http://ivaynberg.github.io/select2/ official documentation}.
     *
     * @param {Array} results The list of results `{id: *, text: *}.`
     * @param {jQuery} container jQuery wrapper of the node that should contain
     *  the representation of the result.
     * @param {Object} query The query object used to request this set of
     *  results.
     * @return {Array} The list of results {id: *, text: *} sorted.
     * @private
     */
    _sortResults: function(results, container, query) {
        var sortedResults;

        sortedResults = _.sortBy(results, function(item) {
            return item.text;
        });
        return sortedResults;
    },

    /**
     *  Convert select2 value into model appropriate value for sync
     *
     * @param value Value from select2 widget
     * @return {String|Array} Unformatted value as String or String Array
     */
    unformat: function(value) {
        if (_.isArray(value)) {
            var possibleKeys = _.keys(this.items);
            value = _.intersection(possibleKeys, value);
            return value;
        }else{
            return [];  // Returning value that is null equivalent to server.  Backbone.js won't sync attributes with null values.
        }
    },

    /**
     * Convert server value into one appropriate for display in widget
     *
     * @param value
     * @return {Array} Value for select2 widget as String Array
     */
    format: function(value){
        if (_.isArray(value) && _.indexOf(value, '') > -1) {
            value = _.clone(value);
            // Delete empty values from the select list
            delete value[''];
        }
        if(_.isString(value)){
            return this.convertMultiSelectDefaultString(value);
        } else {
            return value;
        }
    },

    /**
     * Converts multiselect default strings into array of option keys for template
     * @param {String} defaultString string of the format "option1,option2,option3"
     * @return {Array} of the format ["option1","option2","option3"]
     */
    convertMultiSelectDefaultString: function(defaultString) {
        var result = defaultString.split(",");
        _.each(result, function(value, key) {
            result[key] = value.replace(/\^/g,"");
        });
        return result;
    },

    /**
     * {@inheritDoc}
     * Avoid rendering process on select2 change in order to keep focus.
     */
    bindDataChange: function() {
        if (this.model) {
            this.model.on('change:' + this.name, function() {
                if (_.isEmpty(this.$(this.fieldTag).data('select2'))) {
                    this.render();
                } else {
                    this.$(this.fieldTag).select2('val', this.format(this.model.get(this.name)));
                }
            }, this);
        }
    },

    /**
     * Override to remove default DOM change listener, we use Select2 events instead
     * Binds append value checkbox change for massupdate.
     *
     * @override
     */
    bindDomChange: function() {
        var $el = this.$(this.appendValueTag);
        if ($el.length) {
            $el.on('change', _.bind(function() {
                this.appendValue = $el.prop('checked');
                //FIXME: Should use true booleans (SC-2828)
                this.model.set(this.name + '_replace', this.appendValue ? '1' : '0');
            }, this));
        }

    },

    /**
     * @override
     */
    unbindDom: function() {
        this.$(this.appendValueTag).off();
        this.$(this.fieldTag).select2('destroy');
        this._super('unbindDom');
    },

    /**
     * @override
     */
    unbindData: function() {
        var _key = 'request:' + this.module + ':' + this.name;
        this.context.unset(_key);
        app.view.Field.prototype.unbindData.call(this);
    },

    /**
     * @inheritdoc
     */
    _dispose: function() {
        this.unbindKeyDown();
        this._super('_dispose');
    }
})
