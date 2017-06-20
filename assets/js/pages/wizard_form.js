/* ------------------------------------------------------------------------------
*
*  # Form wizard
*
*  Specific JS code additions for wizard_form.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Wizard examples
    // ------------------------------

    // Basic setup
    $(".form-basic").formwizard({
        disableUIStyles: true,
        disableInputFields: false,
        inDuration: 150,
        outDuration: 150
    });


    

    // Uncomment if you use styled checkboxes/radios to update them dynamically when step changed
    $(".form-basic").on("step_shown", function(event, data){
        //$.uniform.update();
    });
    
});
