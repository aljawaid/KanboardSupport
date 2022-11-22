// KANBOARD PLUGIN ASSET FILE

// TOGGLE DATA-SENSITIVE TEXT VISIBILITY FOR SCREENSHOTS
$(document).ready(function(){
    $(".data-btn").click(function(){
        $(".privacy").toggleClass("privacy-data");
        $(".privacy-delete").toggleClass("privacy-none");
    });
});
