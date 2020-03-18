$(document).ready(function () {
$('.drophover').mouseenter(function(){
    $('.overlay').css("display", "block");
});
$('.drophover').mouseleave(function(){
    $('.overlay').css("display", "none");
});
// slider
    $('#imageGallery').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        thumbItem: 9,
        slideMargin: 0,
        prevHtml: '<i class="fas fa-caret-left"></i>',
        nextHtml: '<i class="fas fa-caret-right"></i>',
        enableDrag: false,
        currentPagerPosition: 'left',
        onSliderLoad: function (el) {

        }
    });

});




    $(document).on("click",".searchBox",function() {
        $('.searchBox').removeClass('activeLabel');
        // $('.SearchRadioInput').attr('cheacked',false);
        $(this).addClass('activeLabel');
       // $(this).find('.SearchRadioInput').attr('cheacked',true);
    });


