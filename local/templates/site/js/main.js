$(function(){
   $('.js-top-slider').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
      var cu=currentSlide?currentSlide+1:1;
      var co=slick.slideCount;
      $('.js-slider-current').text(cu>=10?cu:'0'+cu);
      $('.js-slider-count').text(co>=10?co:'0'+co);      
   }).slick({
      prevArrow: $('.js-slider-prev'),
      nextArrow: $('.js-slider-next'),
      customPaging: function (slider, i) {
         return  (i + 1) + '/' + slider.slideCount;
      }
     // dots: true,
      /*  infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true*/
   })
   
   $(window).on('scroll',function(){
      $('.js-scroll-helper').fadeOut();
   });


   /** Блок номинаций на главной */
   $('.js-main-nominations').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){ 
      currentSlide=(currentSlide==undefined)?0:currentSlide;

      $activeSlide=$(event.target).find('.slick-active');
      $('.js-main-nominations-nav li.active').removeClass('active');
      
      if($activeSlide.data('ph')){
         var dataid=$activeSlide.data('id');
         var $existSlide=$activeSlide.parent().find('[data-id="'+dataid+'"]:first');
         var existSlideIndex=$existSlide.index();
         $existSlide.addClass('slick-active');
         $('.js-main-nominations-nav li').eq(existSlideIndex).addClass('active');  
         
         setTimeout(function(){
         	$('.js-main-nominations').slick('slickGoTo',existSlideIndex,true);
         },300);
      }else{
         $('.js-main-nominations-nav li').eq(currentSlide).addClass('active');  
      }
      
      
   }).slick({
      dots: false,
      arrows : false,
       infinite: false,
       
      speed: 300,
      /*slidesToShow: 3,*/
      centerMode: false,
      variableWidth: true
   })

   $('.js-main-nominations .it-card-wrapper').on('click',function(){
      $('.js-main-nominations').slick('slickGoTo',$(this).index());
   });
   $('.js-main-nominations-nav a').on('click',function(e){
      e.stopPropagation();
      e.preventDefault();
      $('.js-main-nominations').slick('slickGoTo',$(this).parent().index());
   })

});
 
/** Скроллбар */
$(function(){  
   var lastScrollTop = 0;
   var threshold =10;
   
   var fcheck=function(){
      var st = $(this).scrollTop();
      
      if (st > lastScrollTop+threshold){
         $(window).trigger('scrolldown');
      }  

      if (st < lastScrollTop-threshold){ 
         $(window).trigger('scrollup');
      }

      if (st==0){ 
         $(window).trigger('topped');
      }

      if (st>threshold){ 
         $(window).trigger('untopped');
      }

      lastScrollTop = st;
     

     
   };
   
 
   
   $(window).on('scroll',fcheck);

   $(window)
      .on('scrollup',function(){
    //  $('header').removeClass('__hidden');
   })
      .on('scrolldown',function(){
   //   $('header').addClass('__hidden');
   })

      .on('untopped',function(){
      $('header').addClass('__untopped');
   })
      .on('topped',function(){
      $('header').removeClass('__untopped');
   })


  fcheck();
   
});

/** Модальные окна */
$(function(){  
   
   $('.modal').each(function(){
      var url= $(this).find('iframe').attr('src')+'?enablejsapi=1';
   	var $iframe=$(this).find('iframe');
      if (!$iframe.length) return;
      $iframe.attr('src',url)
   });
   
   $('.modal').on('shown.bs.modal',function(){
   	var $iframe=$(this).find('iframe');
      if (!$iframe.length) return;
      $iframe.get(0).contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*')      
   });
   
   $('.modal').on('hidden.bs.modal',function(){
   	var $iframe=$(this).find('iframe');
      if (!$iframe.length) return;
   	$iframe.get(0).contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*')         	
   });
   
   
   

   /*
	$('[data-modal-target]').each(function(){
   	var target=$(this).data('modal-target');
   	var _t=this;
     
      if ($(target)){
         var modal = new Custombox.modal({
            content: {
               effect: 'fadein',
               target: target
            }
         });

      	$(_t)	.on('click',function(e){
            e.stopPropagation();
            e.preventDefault();
            modal.open(); 
         });
      }
   
  
   });*/


});

/** Голосование */
$(function(){ 

   $(document).on('click','.js-vote',function(){
   	alert('Голосование завершено');
      return;
   
   	var _t=this;
   	var id=$(_t).data('vote-id');
      if (id){
      	$.get('/ajax/vote.php',{id:id},function(d){
            console.log(d);
            if (!d.error){
            	$(_t).find('.js-vote-count').text(d.data.length);
            }else{
               var text='';
               
               switch (d.code){
                    case 'sectionvoted':text='Вы уже проголосовали в этой номинации'
               }
               
               alert(text?text:d.code)
            }
         });
      }
   });

});

/** Динамическая загрузка */
$(function(){ 
   $(document).on('click','.js-more',function(){
      var url=$(this).data('next-url');
      var items=$(this).data('items');
      var _this=this;
      $(_this).addClass('__loading');
      if ($(items).length){

         $.get(url,function(d){
            var $d=$(d);
            var $nItems=$d.find(items+'>*');
            $(_this).removeClass('__loading');
            
            if ($nItems.length){
               //$nItems.css('opacity',0);
               $(items).append($nItems);  
               $(items).trigger('on_more');                
            }
            
            var $more=$d.find('.js-more');
            if ($more.length){            	
               $(_this).html($more.html());
               $(_this).data('next-url',$more.data('next-url'));               
            }else{
               $(_this).fadeOut();
            }
            
         });
      }
   });  

});

/** Ссылки */
$(function(){ 
   $(document).on('click','.js-href',function(){
     	var url=$(this).data('href');
     	var target=$(this).data('href-target');
      var _this=this;
      if (target=='_blank'){
         window.open(url);
      }else{
         location=url;
     }
   });  

});

/** Слайдер в блоке смотрите так же*/
$(function(){ 
   $('.js-more-slider').slick({
      prevArrow: $('.js-more-slider-arrow-left'),
      nextArrow: $('.js-more-slider-arrow-right'),
      infinite: false,
      slidesToShow: 3,
      responsive: [
         {
            breakpoint: 575,
            settings: {               
               slidesToShow: 1
            }
         }
      ]
   });
});

/** Слайдер в блоке смотрите так же*/
$(function(){
   $(document)
      .off('mouseout.hoverclass')
      .off('mouseover.hoverclass')
      .on('mouseover.hoverclass','.js-hover-class',function(){
      var hoverclass=$(this).data('hover-class');
      var _this=this;
      $(_this).addClass(hoverclass);
   })
      .on('mouseout.hoverclass','.js-hover-class',function(){
      var hoverclass=$(this).data('hover-class');
      var _this=this;
      $(_this).removeClass(hoverclass);
   });  


});

/** Фотогалерея - Фильтр*/
 
 
$(function(){
   var fpl=function(){	
      $('.js-msnry').each(function(){	  
         var h= h?1*h:320;

         $(this).removeWhitespace().collagePlus({		
            'targetHeight'    : h,
            'effect'          : 'default',
            'fadeSpeed'       : "fast",
            'direction'       : 'vertical',
          /*  'allowPartialLastRow' : MOB?false:true*/
         });
      });
   }

   var resizeTimer = null;
   $(window).on('resize', function() {
      $('.js-msnry').trigger('on_more');
   }); 
   
   $(document).on('on_more','.js-msnry', function() {
      if (resizeTimer) clearTimeout(resizeTimer);
      resizeTimer = setTimeout(fpl, 200);		
   });

   fpl();

});





(function(){

 
   $('.it-photo-slider').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      responsive: [
         {
            breakpoint: 1600,
            settings: {
               slidesToShow: 3,
               slidesToScroll: 3,
            }
         },          {
            breakpoint: 1024,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 2,
            }
         },       
         {
            breakpoint: 750,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }

         }]
   });
   
   $('.it-news-slider').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      responsive: [
               {
            breakpoint: 1024,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 2,
            }
         },       
         {
            breakpoint: 750,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }

         }]
   });

   $('.it-features-slider').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
         {
            breakpoint: 1600,
            settings: {
               slidesToShow: 3,
               slidesToScroll: 3,
            }
         },          {
            breakpoint: 1024,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 2,
            }
         },       
         {
            breakpoint: 750,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }

         }]
   });


   $('.it-partners-slider').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 7,
      slidesToScroll: 7,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
         {
            breakpoint: 1600,
            settings: {
               slidesToShow: 6,
               slidesToScroll: 6,
            }
         },          {
            breakpoint: 1024,
            settings: {
               slidesToShow: 5,
               slidesToScroll: 5,
            }
         },       
         {
            breakpoint: 750,
            settings: {
               slidesToShow: 3,
               slidesToScroll: 3
            }

         }]
   });


   $('a[role!="tab"]').smoothScroll();
   

   $('.it-photo ._item').hover(function(){
      var o=$(this).find('._info').get(0);
      var d=$(this).find('._icon').get(0);
      var b=$(this).find('._text').get(0);
     

      $(o).css({height:0,opacity:0});
      $(d).css({marginTop:-10,opacity:0});
      $(b).css({marginTop:-10,opacity:0});
     

      dynamics.animate(o,{
         height: '100%',
         opacity:1
      }, {
         type: dynamics.spring,
         frequency: 171,
         friction: 346
      })

      dynamics.animate(d,{marginTop:0,opacity:1},{type: dynamics.easeIn,duration:400,delay:20});
      dynamics.animate(b,{marginTop:0,opacity:1},{type: dynamics.easeIn,duration:400,delay:200});
 
   },function(){
      var o=$(this).find('._info').get(0);
      var d=$(this).find('._icon').get(0);
      var b=$(this).find('._text').get(0);
     
      dynamics.animate(o,{
         height: 0
      }, {
         type: dynamics.spring,
         friction: 500
      })		
      dynamics.animate(d,{marginTop:-10,opacity:0},{type: dynamics.easeIn,duration:100,delay:0});
      dynamics.animate(b,{marginTop:-10,opacity:0},{type: dynamics.easeIn,duration:100,delay:0});
     

   }); 
   
   
   
   
   
   $('.it-news ._item').hover(function(){
      var o=$(this).find('._info').get(0);
      var d=$(this).find('._header').get(0);
      var b=$(this).find('._text').get(0);
     

     // $(o).css({height:"30%",opacity:1});
     // $(d).css({marginTop:-10,opacity:1});
      $(b).css({marginTop:-10,opacity:0});
     

      dynamics.animate(o,{
         height: '233',
       
      }, {
         type: dynamics.spring,
         frequency: 171,
         friction: 346
      })

    //  dynamics.animate(d,{marginTop:0,opacity:1},{type: dynamics.easeIn,duration:400,delay:20});
      dynamics.animate(b,{marginTop:0,opacity:1},{type: dynamics.easeIn,duration:400,delay:200});
 
   },function(){
      var o=$(this).find('._info').get(0);
      var d=$(this).find('._header').get(0);
      var b=$(this).find('._text').get(0);
     
      dynamics.animate(o,{
         height: "101"
      }, {
         type: dynamics.spring,
         friction: 500
      })		
     // dynamics.animate(d,{marginTop:-10,opacity:1},{type: dynamics.easeIn,duration:100,delay:0});
      dynamics.animate(b,{marginTop:-10,opacity:0},{type: dynamics.easeIn,duration:100,delay:0});
     

   }); 
   
   
   
   
   
});

