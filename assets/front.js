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
    if (slider) {
      noUiSlider.create(slider, {
        start: [20, 80],
        connect: true,
        range: {
            'min': 0,
            'max': 100
        }
    });
    }

