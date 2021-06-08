import "./styles/front.css";

import $ from "jquery";



$(document).ready(() => {
    $('.deroulant').mouseenter(function(){
        $(".sous").fadeIn(350);
      });
    //   $('.deroulant').mouseover(function(){
    //     $(".sous").fadeOut("slow");
    //   });
})
