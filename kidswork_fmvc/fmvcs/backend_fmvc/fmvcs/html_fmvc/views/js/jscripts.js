$(document).on('click', function (e) {
    var tar = $(e.target).closest("body").find(".show-absolute");
    if (tar.length !== '' && !$(e.target).hasClass("menu-f-i")) {
        $(".show-absolute").removeClass("show-absolute");
    }

});

$(document).delegate(".c-box-bot-menu", "click", function () {
    
    $per = $(this).closest(".center-box-bot");
    
    $per.find(".c-box-bot-menu").removeClass("c-box-bot-menu-a");
    $(this).addClass("c-box-bot-menu-a");
    $(this).removeClass(".c-box-bot-menu-a");
    $per.find(".center-box-cont").hide();
    $per.find(".tab-"+$(this).data("tab-btn")).show();
});

$(document).delegate(".tab-text-edit textarea", "click", function () {
    $(this).height("34px");
    $(this).closest(".tab-text-edit").find(".tab-text-flags").show();
});


$(document).ready(function () {



});