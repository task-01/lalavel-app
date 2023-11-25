$(document).on("click", ".tab", function() {
    $(".active").removeClass("active");
    $(this).addClass("active");
    const index = $(".tab").index(this);
    $(".content").removeClass("show").eq(index).addClass("show");
});
