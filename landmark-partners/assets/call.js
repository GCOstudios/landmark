jQuery(document).ready(function($) {

    $('.ctf-tweets').cycle({
		fx: 'scrollUp',
		speed: 3000,
		timeout: 3000,
		cleartype: true,
		cleartypeNoBg: true
	});

    $('.staff-img').click(function(){
   $('.togglebox').slideUp();
   $(this).next('div').slideToggle();
   return false;
});

    // REMOVE AND ADD CLICK EVENT 
                $('.doAddItem').on('click', function () {
                    $(".gridder").data('gridderExpander').gridderAddItem('TEST');
                });

                // Call Gridder
                $(".gridder").gridderExpander({
                    scrollOffset: 200,
                    scrollTo: "panel", // "panel" or "listitem"
                    animationSpeed: 400,
                    animationEasing: "easeInOutExpo",
                    nextText: "<i class=\"fa fa-arrow-right\"></i>",
                    prevText: "<i class=\"fa fa-arrow-left\"></i>",
                    closeText: "<i class=\"fa fa-times\"></i>",
                    showNav: true,
                    onStart: function () {
                        console.log("Gridder Inititialized");
                    },
                    onExpanded: function (object) {
                        console.log("Gridder Expanded");
                    },
                    onChanged: function (object) {
                        console.log("Gridder Changed");
                    },
                    onClosed: function () {
                        console.log("Gridder Closed");

 
                    }
                });

});

/*
jQuery(document).keydown(function(e) {
 
    $('.wph-modal').on("keyup", function(e){
    if (e.which === 27){
        return false;
    } 
    });

});*/


