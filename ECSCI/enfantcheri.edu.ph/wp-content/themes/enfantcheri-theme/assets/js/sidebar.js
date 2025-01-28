window.onload = function() {
    window.jQuery ? $(document).ready(function() {
        $(".navbar-section .navbar-collapse").clone().appendTo("body").removeAttr("class").addClass("sideMenu").show(), $("body").append("<div class='overlay'></div>"), $(".navbar-toggler").on("click", function() {
            $(".sideMenu").addClass($(".navbar-section").attr("data-sidebarClass")), $(".sideMenu, .overlay").toggleClass("open"), $(".overlay").on("click", function() {
                $(this).removeClass("open"), $(".sideMenu").removeClass("open")
            })
        }), $(window).resize(function() {
            $(".navbar-toggler").is(":hidden") ? $(".sideMenu, .overlay").hide() : $(".sideMenu, .overlay").show()
        })
    }) : console.log("sidebarNavigation Requires jQuery")
};