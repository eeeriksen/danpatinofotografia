$(document).ready(function(){
   
   //Show header stuffs
   var cero = 0;
   var inizioStart = $('.header-image').innerHeight();
   $(window).on('scroll', function(){

      //Show and hide header when scroll up and down
      $('#all-header, #ini-header')
      .toggleClass('hide', $(window).scrollTop() > cero);

      //Add shadow to header
      $('#all-header, #ini-header')
      .toggleClass('shadow', !($(window).scrollTop() > cero));

      //Change background-color inizio.html header when content is white
      if($(window).scrollTop() > inizioStart){
         $('#ini-header').addClass('white');
         $('#ini-header').removeClass('black');
      } else if($(window).scrollTop() == 0){
         $('#ini-header').removeClass('black');
      } else {
         $('#ini-header').addClass('black');
         $('#ini-header').removeClass('white');
      }
      cero = $(window).scrollTop();
   });
});