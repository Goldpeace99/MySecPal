var $flappear = $('#flapp');
var $frappear = $('#frapp');
var $slappear = $('#slapp');
var $text = $('#text');
var $text2 = $('#text_2');
var $text3 = $('#text_3');
var $rappear = $('.rapp');
var $win = $(window);

$(document).ready(function() {
    var space_top = $win.scrollTop();
    
    if(space_top < 1)
    {
        $flappear.fadeOut(1);
        $text.fadeOut(1);
    }
    if(space_top < 300)
    {
        $frappear.fadeOut(1);
        $text2.fadeOut(1);
    }
    if(space_top < 500)
    {
        $slappear.fadeOut(1);
        $text3.fadeOut(1);
    }
});

$win.on('scroll', function() {
    var space_top = $win.scrollTop();
    
    if(space_top >= 1)
    {
        $flappear.fadeIn(2000);
        $text.fadeIn(2000);
    }
    if(space_top >= 300)
    {
        $frappear.fadeIn(2000);  
        $text2.fadeIn(2000);
    }
    if(space_top >= 500)
    {
        $slappear.fadeIn(2000); 
        $text3.fadeIn(2000);
    }
});