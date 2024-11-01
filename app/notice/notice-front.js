jQuery(document).ready(function($){
    
    YPS_WC_Dynamic_Notices = window.YPS_WC_Dynamic_Notices || {};
        
    YPS_WC_Dynamic_Notices.Front = function(){

        var $this       = this;

        this.construct  = function(){

            $( document.body ).on('updated_cart_totals', function(event){

            });

            $(".yps-wc-dynamic-notices-alert .yps-wc-dynamic-notices-alert-button").hover(
                function() {
                    $(this).css('background-color',$(this).attr('data-background-color-hover'));

                    $(this).css('border-color',$(this).attr('data-border-color-hover'));
                    $(this).css('border-width', '1px');
                    $(this).css('border-style', 'solid');

                }, function() {
                    $(this).css('background-color', $(this).attr('data-background-color'));
                    $(this).css('border-color', $(this).attr('data-border-color'));

                    if($(this).attr('data-border-color') == ''){
                        $(this).css('border-width', '0px');
                    }else{
                        $(this).css('border-width', '1px');
                    }
                    
                });

        };

        this.construct();
    };

    new YPS_WC_Dynamic_Notices.Front();
    
});
