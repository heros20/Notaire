import "./scss/main.scss";
import $ from "jquery";
import noUiSlider from "nouislider";
import 'nouislider/dist/nouislider.css';




$(document).ready(() => {
    $('.deroulant').on('mouseenter',function(){
        $(".sous").fadeIn(350);
      });
      $('.sous').on('mouseleave',function(){
        $(".sous").fadeOut("slow");
      });
})

// $(window).load(function() {
//   $('.flexslider').flexslider({
//     animation: "slide"
//   });
// });

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

