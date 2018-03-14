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
         $('#all-header, #ini-header').removeClass('shadow');
         $('#ini-header, nav.menu').removeClass('black');
      } else {
         $('#ini-header, nav.menu').addClass('black');
         $('#ini-header, nav.menu').removeClass('white');
      }
      cero = $(window).scrollTop();

      // inizio matrimonio
      // Offset images categories (Y Position)
      var posMatri = document.querySelector('article.matrimonio .image').offsetTop;
      var posRitratti = document.querySelector('article.ritratti .image').offsetTop;
      var posModa = document.querySelector('article.moda .image').offsetTop;

      // Scroll Position
      var scrollPos = window.pageYOffset;
      // Window Vertical Size
      var heightWindow = document.documentElement.clientHeight;

      // Images categories
      var imgMatri = document.querySelector('article.matrimonio .image img');
      var imgRitratti = document.querySelector('article.ritratti .image img');
      var imgModa = document.querySelector('article.moda .image img');
      // Show when position
      if (scrollPos > (posMatri - (heightWindow/3*2))) {
         imgMatri.classList.add('show');
      }
      if (scrollPos > (posRitratti - (heightWindow/3*2))) {
         imgRitratti.classList.add('show');
      }
      if (scrollPos > (posModa - (heightWindow/3*2))) {
         imgModa.classList.add('show');
      }

   });// fin on scroll

   // ---------
   // portfilio click events
   $('.image img').on('click', function(){
      // object image
      var arrayElements = $('.image img');
      //  src image
      var src = arrayElements.index(this);

      // show overlay div with image
      $('#overlay').css("display", "block");
      // add src image in img tag
      $('#over-img').attr("src", arrayElements[src].src);

      // click previous
      var previous = document.getElementById('previous');
      // click next
      var next = document.getElementById('next');

      // Listener previous
      previous.addEventListener('click', previousClick);
      // Listener next
      next.addEventListener('click', nextClick);

      function previousClick(){
         if(src == 0){
            src = arrayElements.length - 1;
            setImage;
         } else {
            src -= 1;
            $('#over-img').attr("src", arrayElements[src].src);
         }
      }//Fin next click
      function nextClick(){
         if(src == arrayElements.length - 1){
            src = 0;
            $('#over-img').attr("src", arrayElements[src].src);
         } else {
            src += 1;
            $('#over-img').attr("src", arrayElements[src].src);
         }
      }//Fin next click

      // Div Overlay
      var overlay = document.getElementById('overlay');
      // listener event click, when click out of the img
      var fullImage = document.getElementById('full-image');
      // container image and buttons next previous
      var fImg = document.getElementById('f-img');
      // close button
      var close = document.querySelector('#close img');
      // image tag
      var coverImage = document.getElementById('cover-image');
      // listener event click, when click out of the img
      window.addEventListener('click', clickOutk);
      // listener event click, when click out of the img
      function clickOutk(e){
         if((e.target == close ||e.target == overlay || e.target == fullImage || e.target == fImg) && !(e.target == coverImage)){
            overlay.style.display = "none";
         }
      }//fin clickOut

   });//  fin .image img (click)

   /*$('#filter-ritratti').on('click', function(e){
      $('.image.matrimonio, .image.moda, .image.ritratti').css("display", "none");
      $('.image.ritratti').css("display", "block");
      e.preventDefault();
   });// fin click filter ritratti

   $('#filter-matrimonio').on('click', function(e){
      $('.image.matrimonio, .image.moda, .image.ritratti').css("display", "none");
      /*$.get('matrimonio-portfolio.txt', function (ob) {
         var txtArray = ob.split(" ");
         var images = {};
         images = $('.image.matrimonio img');

         for (var key in images) {
            if (images.hasOwnProperty(key)) {
               
               for (var i in txtArray) {
                  images[key].src = txtArray[i];
                  console.log(i + " -> " + txtArray[i]);
                  console.log(key + " -> " + images[key].src);

               }
            }
         }

      });  *//*
      $('.image.matrimonio').css("display", "block");
      $('#del').css("display", "none");
      e.preventDefault();

   });// fin click filter matrimonio*/

   /*$('#filter-moda').on('click', function(e){
      $('.image.matrimonio, .image.moda, .image.ritratti').css("display", "none");
      $('.image.moda').css("display", "block");
      e.preventDefault();
   });// fin click filter moda*/


   //
});// Document ready