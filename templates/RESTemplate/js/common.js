$(function() {
  if (!Modernizr.svg) {
    $("img[src*='svg']").attr("src", function() {
      return $(this)
        .attr("src")
        .replace(".svg", ".png");
    });
  }
  $(".ajax_form").submit(function() {
    var th = $(this);
    $.ajax({ type: "POST", url: "/bot.php", data: th.serialize() }).done(
      function() {
        alert("Дякуємо ми скоро перетелефонуємо");
        setTimeout(function() {
          th.trigger("reset");
        }, 1000);
      }
    );
    return false;
  });
  try {
    $.browserSelector();
    if ($("html").hasClass("chrome")) {
      $.smoothScroll();
    }
  } catch (err) {}
  $("img, a").on("dragstart", function(event) {
    event.preventDefault();
  });
});
$(window).load(function() {
  $(".loader_inner").fadeOut();
  $(".loader")
    .delay(400)
    .fadeOut("slow");
});
$("#loginModal").on("shown.bs.modal", function() {

});

$(document).ready(function () {
	$("#calme_phone").inputmask("+38(999)999-99-99");
});

setInterval(() => {
	console.log($('#Call_me').html())
	
	if ($('#Call_me').html() === '<svg class="svg-inline--fa fa-phone fa-w-16" style="font-size: 48px;color: #333;" aria-hidden="true" data-prefix="fa" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M493.397 24.615l-104-23.997c-11.314-2.611-22.879 3.252-27.456 13.931l-48 111.997a24 24 0 0 0 6.862 28.029l60.617 49.596c-35.973 76.675-98.938 140.508-177.249 177.248l-49.596-60.616a24 24 0 0 0-28.029-6.862l-111.997 48C3.873 366.516-1.994 378.08.618 389.397l23.997 104C27.109 504.204 36.748 512 48 512c256.087 0 464-207.532 464-464 0-11.176-7.714-20.873-18.603-23.385z"></path></svg><!-- <i class="fa fa-phone" style="font-size:48px;color:#333"></i> -->') {
		$('#Call_me').html("<span>Кнопка <br> зв`язку</span>");
		
	}else{
		$('#Call_me').html('<svg class="svg-inline--fa fa-phone fa-w-16" style="font-size: 48px;color: #333;" aria-hidden="true" data-prefix="fa" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M493.397 24.615l-104-23.997c-11.314-2.611-22.879 3.252-27.456 13.931l-48 111.997a24 24 0 0 0 6.862 28.029l60.617 49.596c-35.973 76.675-98.938 140.508-177.249 177.248l-49.596-60.616a24 24 0 0 0-28.029-6.862l-111.997 48C3.873 366.516-1.994 378.08.618 389.397l23.997 104C27.109 504.204 36.748 512 48 512c256.087 0 464-207.532 464-464 0-11.176-7.714-20.873-18.603-23.385z"></path></svg><!-- <i class="fa fa-phone" style="font-size:48px;color:#333"></i> -->');
	}
	
}, 2200);