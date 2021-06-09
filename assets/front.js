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

    const slider = document.getElementById('price-slider');
    const min = document.getElementById('min')
    const max = document.getElementById('max')
    if (slider) {
      const range =  noUiSlider.create(slider, {
          start: [1000, 1000000],
          connect: true,
          step: 1000,
          range: {
              'min': 10000,
              'max': 30000
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

