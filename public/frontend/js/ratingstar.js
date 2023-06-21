$(".stars").mousemove(function(e) {
   var gLeft = $(".stars .stars-ghost").offset().left,
      pX = e.pageX;

   $(".stars .stars-ghost").width(pX - gLeft);

});