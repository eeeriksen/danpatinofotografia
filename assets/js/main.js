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
         $('#ini-header, nav.menu').addClass('white');
         $('#ini-header, nav.menu').removeClass('black');
      } else if($(window).scrollTop() == 0){
         $('#ini-header, nav.menu').removeClass('black');
      } else {
         $('#ini-header, nav.menu').addClass('black');
         $('#ini-header, nav.menu').removeClass('white');
      }
      cero = $(window).scrollTop();
   });
});