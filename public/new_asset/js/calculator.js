(function (jQuery) {
    "use strict";
    var registerDependencies = function () {
        // if (null != PluginJsConfig && null != PluginJsConfig.js_dependencies) {
        //     var js_dependencies = PluginJsConfig.js_dependencies;
        //     for (var dependency in js_dependencies) {
        //         asyncloader.register(js_dependencies[dependency], dependency);
        //     }
        // }
        // console.log(PluginJsConfig.js_dependencies);
    },
        cost_calc = function () {
            var treatment = jQuery('#treatment').find(":selected").val();
            var treatmentplanname = jQuery('#treatment-plan').find(":selected").val();
            var treatmentplan = jQuery('#treatment-plan').find(':selected').data('plan');
            var treatment_location = jQuery('#location').find(':selected').data('location');
            var appointment = jQuery('#appointment').is(":checked");
            var appointment_price = jQuery('#appointment').val();

            var appointment_final_price;

            if (appointment == true) {
                appointment_final_price = parseInt(appointment_price);
            }
            else {
                appointment_final_price = 0;
            }

            if (!isNaN(treatmentplan) && !isNaN(treatment_location)) {
                var final_cost = treatmentplan + treatment_location + appointment_final_price;
            }


            if (jQuery.isNumeric(final_cost) == true) {

                jQuery(".pq-cost-calculator .pq-calculator-price .pq-total-title").text('Final Price : ');
                jQuery(".pq-cost-calculator .pq-calculator-price .pq-cost-value").text('$' + final_cost);
            }

        }

        if (jQuery('.pq-cost-calculator').length > 0) {
            // asyncloader.require(['progressbar.js'], function() {
            cost_calc();
            // console.log('onload');
            // });
        }

    jQuery('.pq-cost-calculator').each(function () {
        jQuery(document).on('change', '.treatment-plan , .treatment , .location , .appointment', function () {
            cost_calc();
        });
        jQuery("#time").on('click', 'li', function () {
            jQuery("#time li.active").removeClass("active");
            jQuery(this).addClass("active");  // adding active class
        });
    });
})(jQuery);