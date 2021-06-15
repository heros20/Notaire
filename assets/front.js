import "./scss/main.scss";
import $ from "jquery";
import noUiSlider from "nouislider";
import 'nouislider/dist/nouislider.css';
import './FlexSlider/flexslider.css';
import './FlexSlider/jquery.flexslider-min.js';
AOS.init();

$(document).ready(() => {
    $('.deroulant').on('mouseenter',function(){
        $(".sous").css('display','block');
    });
    $('.sous').on('mouseleave',function(){
        $(".sous").css('display','none');
    });

     $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        directionNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        slideshowSpeed: 7000,
        asNavFor: '#slider'
    });
 
    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        directionNav: false,
        animationLoop: true,
        slideshow: true,
        sync: "#carousel"
    });

    // const link = document.getElementById("action");
    //     $(link).click(function( e ) {
    //         e.preventDefault();
    //         console.log('click');
    // });
})

$(function() {
      // je stock la recherche d'une url
      var url = window.location.href;

      // je cible tous mes liens
      $(".navbar__menu a").each(function() {
          // je verifie que l'url du lien et de la recherche son les mêmes
          if (url == (this.href)) {
              $(this).closest("li").addClass("active");
          }
      });
  }); 

const slider = document.getElementById('price-slider');
const min = document.getElementById('min')
const max = document.getElementById('max')
if (slider) {
  const range =  noUiSlider.create(slider, {
      start: [400, 1000000],
      tooltips: [true,true],
      connect: true,
      step: 1000,
      range: {
          'min': 1000,
          'max': 300000
      }
  })
  range.on('slide',function(values,handle){
    if(handle === 0){
        min.value = Math.round(values[0])
    }
    if(handle === 1){
      max.value = Math.round(values[1])
  }
  });
}

var dpe = new DpeGes();
dpe.dpe({
    domId: 'dpe',
    value: 'B',
});
var ges = new DpeGes();
ges.ges({
    domId: 'ges',
    value: 'A'
});


