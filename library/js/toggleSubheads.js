$(document).ready(function(){
    $('#PostContent section').children().hide();
    $('#PostContent section:first').children().show();
    $('#PostContent section p.small-subhead').show();

    $('#PostContent section p.small-subhead').click(function(){
        console.log("clicked subhead");
//        $('#PostContent section').children().hide();
//        ($(this).parent().children().animate(
//            {'height':'hide'}, 'slow', 'swing'
//        ))
        $('#PostContent section p.small-subhead').show();
        ($(this).parent().children().animate(
            {'height':'show'}, 'slow', 'swing'
        ))
    })

//    jQuery("#PostContent section p.small-subhead").next(".hidden").hide();
//    jQuery("#PostContent section p.small-subhead").click(function()
//    {
//
//        $('.active').toggleClass('active').next('.hidden').slideToggle(300);
//        $(this).toggleClass('active').next().slideToggle("fast");
//
//    });
});
