if (window.jQuery) {
    document.write(unescape('%3Clink href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Raleway:300,400,600" rel="stylesheet" type="text/css"%3E'));
}
else {
   document.write(unescape('%3Clink href="css/fonts.css" rel="stylesheet" type="text/css"%3E'));
   document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
}

$(document).ready(function(){$(document).foundation(),$("body").on("click","a.page-scroll",function(a){var b=$(this);$("html, body").stop().animate({scrollTop:$(b.attr("href")).offset().top},1500,"easeInOutExpo"),a.preventDefault()})}),$(document).ready(function(){function b(a,b,c){$(window).scrollTo(a,b,{easing:c})}$("#carousel").carouFredSel({width:"670",pagination:".pagination",responsive:!0,scroll:{fx:"fade"},items:{visible:1,width:"670"},swipe:{onMouse:!0}});var a=$("#back_top");a.click(function(a){a.preventDefault(),b(0,900,"easeInOutCubic")}),$(window).on("scroll",function(){$(this).scrollTop()>749?a.stop().animate({opacity:1},250):a.stop().animate({opacity:0},250)})});

