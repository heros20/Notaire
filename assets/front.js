import "./scss/main.scss";
import $ from "jquery";
import noUiSlider from "nouislider";
import 'nouislider/dist/nouislider.css';
import './FlexSlider/flexslider.css';
import './FlexSlider/jquery.flexslider-min.js';



$(document).ready(() => {
    $('.deroulant').on('mouseenter',function(){
        $(".sous").fadeIn(350);
    });
    $('.sous').on('mouseleave',function(){
        $(".sous").fadeOut("slow");
    });

     $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
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
        animationLoop: false,
        slideshow: false,
        sync: "#carousel"
    });
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

