function setHeight($obj){
    var height = $('.right-col').height();
    $obj.height(height);
}

$(document).ready(function(){
    setHeight($('.side-bar'));
});
$(window).resize(function(){
    setHeight($('.side-bar'));
});
