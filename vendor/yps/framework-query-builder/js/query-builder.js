jQuery(document).ready(function($){
    
    YPS_Framework = window.YPS_Framework || {};
        
    YPS_Framework.Query_Builder = function(){

        var $this       = this;

        this.xhr        = null;

        this.construct  = function(){

            $.each($(".yps-query-builder"), function (index, value){

                var query_builder           = $(this);
                var target                  = $(this).attr('data-target');
                var filters                 = $(this).attr('data-filters');
                var rules                   = $(this).attr('data-rules');

                var form                    = $(this).closest("form");

                $(this).queryBuilder({
                    'filters': $.parseJSON(filters),
                    
                    plugins: {
                        'sortable': {
                            icon: 'fas fa-arrows-alt'
                        }
                    },

                    icons: {
                        add_group       : 'fas fa-plus-square',
                        add_rule        : 'fas fa-plus',
                        remove_group    : 'fas fa-minus-square',
                        remove_rule     : 'far fa-trash-alt',
                        error           : 'fas fa-exclamation-circle',
                    },

                    allow_empty: true,

                });

                $this.set_rules($(this), rules);

                
                $(form).on("submit", function(e){
                    e.preventDefault();

                    var validate    = $(query_builder).queryBuilder('validate');

                    /* If errors don't submit the form */
                    if(validate == true){
                        var result      = $(query_builder).queryBuilder('getRules');
                        var sql         = $(query_builder).queryBuilder('getSQL').sql;
    
                        if (!$.isEmptyObject(result)) {
                            $(target).val(JSON.stringify({
                                'json'  : result,
                                'sql'   : sql
                            }));
                        }
    
                        $(form).unbind('submit');
                        $(this).submit();
                    }

                });
            });
        };

        this.set_rules = function(query_builder_selector, rules){


            $(query_builder_selector).on('afterUpdateRuleValue.queryBuilder', function(e, rule, previousValue) {

                if (typeof rule.filter.data !== 'undefined'){
                    var custom_field_type   = rule.filter.data['custom_field_type'];

                    if(custom_field_type == 'wc_products'){

                        var rule_value_container       = rule.$el.find('.rule-value-container');
                        var chosen_select              = $(rule_value_container).find("select");
                        var chosen_input               = $(rule_value_container).find(".chosen-search-input");
                        var selected_options           = $(chosen_select).find('option:selected').length;

                        if(selected_options == 0){
                            xhr = $.ajax({
                                url         : YPS_FRAMEWORK_QUERY_BUILDER.wc_products_url,
                                dataType    : "json",
                                method      : "POST",
                                data        : {
                                    'post__in': rule.value
                                },   
                                beforeSend: function(jqXHR, settings){ 
        
                                }
                            }).done(function(data) {
    
                                $.each(data, function(key, value){
                                    $(chosen_select).append('<option value="' + value.id + '" selected="selected">' + value.name + '</option>');
                                });
    
                                $(chosen_select).trigger("chosen:updated");
                                $(chosen_select).trigger("liszt:updated");

                            });
                        }

                    }

                }

            });

            $(query_builder_selector).on('afterUpdateRuleFilter.queryBuilder', function(e, rule, error, value) {

                $this.set_chosen_filter();
                $this.set_chosen_operator();
                $this.set_chosen_value();


                if (typeof rule.filter.data !== 'undefined'){
                    var custom_field_type   = rule.filter.data['custom_field_type'];

                    //console.log(custom_field_type);

                    if(custom_field_type == 'wc_products'){
                        var rule_value_container       = rule.$el.find('.rule-value-container');
                        var chosen_select              = $(rule_value_container).find("select");
                        var chosen_input               = $(rule_value_container).find(".chosen-search-input");

                        $(chosen_input).bind('keyup',function(e) {

                            var select_value        = $(this).val();
                            var selected_options    = [];
                            

                            $(chosen_select).find('option:selected').each(function() {
                                selected_options.push(parseInt($(this).val()));
                            });

                            xhr = $.ajax({
                                url         : YPS_FRAMEWORK_QUERY_BUILDER.wc_products_url + '&s=' + select_value,
                                dataType    : "json",
                                method      : "POST",
                                beforeSend: function(jqXHR, settings){ 

                                    if($this.xhr && $this.xhr.readyState != 4){
                                        console.log("ABORT!");
                                        $this.xhr.abort();
                                    }

                                    $this.xhr   = jqXHR;

                                    $(chosen_select).find("option").each(function() {
                                        if(!selected_options.includes(parseInt($(this).val()))){
                                            $(this).remove();
                                        }
                                        
                                    });
                                    //$(chosen_select).empty(); 
                                }
                            }).done(function(data) {

                                //console.log(data);
                                console.log(list_options);

                                var list_options        = [];

                                $(chosen_select).find('option').each(function() {
                                    list_options.push(parseInt($(this).val()));
                                });

                                $.each(data, function(key, value){
                                    
                                    console.log(value.id);

                                    if(!list_options.includes(value.id)){
                                        $(chosen_select).append('<option value="' + value.id + '">' + value.name + '</option>');
                                    }
                                });

                                /*
                                data.forEach(function(value, key, array){
                                    console.log(key + ": " + value);
                                });
                                */

                                
                                $(chosen_select).trigger("chosen:updated");
                                $(chosen_select).trigger("liszt:updated");

                                $(chosen_input).val(select_value);
                                $(chosen_input).css("width", "100%");
                            });

                        });

                        
                    }

                }

            });

            $(query_builder_selector).on('afterAddRule.queryBuilder', function(e, rule, error, value){
                setTimeout(function(){
                    $this.set_chosen_filter();
                    $this.set_chosen_operator();
                    $this.set_chosen_value();
                }, 200);
            });

            if(rules && rules != null && rules != '' && rules != 'null'){
                $(query_builder_selector).queryBuilder('setRules', JSON.parse(rules));
            }else{
                $(query_builder_selector).queryBuilder('reset');
            }

        
            $this.set_chosen_filter();
            $this.set_chosen_operator();
            $this.set_chosen_value();




          
        };

        this.set_chosen_value    = function(){
            $('.rule-value-container > select').chosen({
                width                   : "100%",
                allow_single_deselect   : true
            });

            $('.rule-value-container > select').trigger("chosen:updated");
        };

        this.set_chosen_operator    = function(){
            $('.rule-operator-container > select').chosen({
                width: "150px",
                allow_single_deselect: true
            });

            $('.rule-operator-container > select').trigger("chosen:updated");
        };

        this.set_chosen_filter      = function(){
            $('.rule-filter-container > select').chosen({
                width: "200px",
                allow_single_deselect: true
            });

            $('.rule-filter-container > select').trigger("chosen:updated");
        };

        this.construct();
    };

    new YPS_Framework.Query_Builder();
    
});
