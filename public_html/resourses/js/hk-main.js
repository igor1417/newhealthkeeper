function setHeight($from, $to){
    $to.css('height',$from.height());
}

$(document).ready(function(){
    setHeight($('.right-col'), $('.side-bar'));
});
