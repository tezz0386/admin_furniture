(function ($) {
	"use strict";
	var medical = {
		initialised: false,
		version: 1.0,
		Solar: false,
		init: function () {

			if(!this.initialised) {
				this.initialised = true;
			} else {
				return;
			}

			// Functions Calling
			
			this.loader();
			this.testimonial();
			this.timer();
			this.partners();
			this.product();
			this.product_gallary();
			this.quantity();
			this.edit_account();
			this.menu();
			this.sub_menu();
			this.counter();
        },
        // loader start
        loader: function () {
            jQuery(window).on("load", function() {
                jQuery(".cv-ellipsis").fadeOut(), jQuery(".cv-preloader").delay(200).fadeOut("slow")
            });
        },
        // loader end
        // testimonial start
        testimonial: function () {
            if($('.cv-testimonial').length > 0){
                var swiper = new Swiper('.cv-testimonial .swiper-container', {
                    slidesPerView: 2,
                    spaceBetween: 0, 
                    loop:true,
                    autoplay:true,
                    speed:1500,         
                    navigation: {
                        nextEl: '.cv-testimonial .swiper-button-next',
                        prevEl: '.cv-testimonial .swiper-button-prev',
                    },
                    breakpoints: {
                        767: {
                          slidesPerView: 1,
                          spaceBetween: 0
                        }
                    }
                });
            }
        },
        // testimonial end
        // timer js start
        timer: function () {
            if($('#me_timer').length > 0){
                var countDownDate = new Date("May 5, 2021 3:37:25").getTime();
                var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("me_timer").innerHTML = "<span>" + days + "</span>" + "<span>" + hours + "</span>"
                +"<span>"+ minutes +"</span>"+"<span>"+ seconds + "</span>";
                    
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("me_timer").innerHTML = "EXPIRED";
                }
                }, 1000);
            }
        },
        // timer js end
        // partner slider start
        partners: function () {
            if($('.cv-partners').length > 0){
                var swiper = new Swiper('.cv-partners .swiper-container', {
                    slidesPerView: 5,
                    spaceBetween: 30, 
                    loop:true,
                    autoplay:true,
                    speed:1500,
                    breakpoints: {
                        480: {
                          slidesPerView: 2,
                          spaceBetween: 15
                        },
                        767: {
                            slidesPerView: 3,
                            spaceBetween: 15
                        },
                        991: {
                            slidesPerView: 4,
                            spaceBetween: 30
                        }
                    }
                });
            }
        },
        // partner slider end
        // partner slider start
        product: function () {
            if($('.cv-product-slider').length > 0){
                var swiper = new Swiper('.cv-product-slider .swiper-container', {
                    slidesPerView: 4,
                    spaceBetween: 30, 
                    loop:true,
                    autoplay:true,
                    speed:1500,         
                    navigation: {
                        nextEl: '.cv-product-slider .swiper-button-next',
                        prevEl: '.cv-product-slider .swiper-button-prev',
                    },
                    breakpoints: {
                        480: {
                          slidesPerView: 1,
                          spaceBetween: 0
                        },
                        767: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        991: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        }
                    }
                });
            }
        },
        // partner slider end
        // product gallary start
        product_gallary: function () {
            jQuery(window).on("load", function() {
                if($('.cv-product-all').length > 0){
                    $('.cv-gallery-grid').isotope({
                        itemSelector: '.cv-product-item',
                        filter: '*'
                    });
                    $('.cv-product-nav > ul > li').on( 'click', 'a', function() {
                        // filter button click
                        var filterValue = $( this ).attr('data-filter');
                        $('.cv-gallery-grid').isotope({ filter: filterValue });
            
                        //active class added
                        $('a').removeClass('cv-product-active');
                        $(this).addClass('cv-product-active');
                    });
                }
            });
        },
        // product gallary end
        // quantity start
        quantity: function () {
            $('.cv-add').on('click',function(){
                if ($(this).prev().val() < 50000) {
                    $(this).prev().val(+$(this).prev().val() + 1);
                }
            });
            $('.cv-sub').on('click',function(){
                if ($(this).next().val() > 1) {
                    if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
                }
            });
        },
        // quantity end
        // edit account start
        edit_account: function () {
            if($('.cv-account-text').length > 0){
                $(".cv-edit-click").on('click',function(){
                    $(".cv-account-text").addClass("cv-edit-open");
                })
                $(".cv-close-edit").on('click',function(){
                    $(".cv-account-text").removeClass("cv-edit-open");
                })
            }
        },
        // edit account end
        // menu start
        menu: function () {
            if($('.cv-nav-bar').length > 0){
                $(".cv-toggle-nav").on('click',function(e){
                    event.stopPropagation();
                    $(".cv-nav-bar").toggleClass("cv-open-menu");
                });
                $("body").on('click',function(){
                    $(".cv-nav-bar").removeClass("cv-open-menu");
                });
                $(".cv-menu").on('click',function(){
                    event.stopPropagation();
                });
            }
        },
        // menu end
        // sub menu start
        sub_menu: function () {
            if($('.cv-menu').length > 0){
                var w = window.innerWidth;
                if (w <= 1199) {
                    $(".cv-children-menu").on('click',function(){
                        $(this).find(".cv-sub-mmenu").slideToggle();
                        $(this).find(".cv-mega-menu").slideToggle("slow");
                    });
                };
            }
        },
        // sub menu end
        // Counter Start
        counter: function() {
            if ($('.cv-counter-wrap').length > 0) {
                var a = 0;
                $(window).scroll(function() {
                    var topScroll = $('.cv-counter-wrap').offset().top - window.innerHeight;
                    if (a == 0 && $(window).scrollTop() > topScroll) {
                        $('.count_no').each(function() {
                            var $this = $(this),
                                countTo = $this.attr('data-count');
                            $({
                                countNum: $this.text()
                            }).animate({
                                countNum: countTo
                            }, {
                                duration: 5000,
                                easing: 'swing',
                                step: function() {
                                    $this.text(Math.floor(this.countNum));
                                },
                                complete: function() {
                                    $this.text(this.countNum);
                                }
                            });
                        });
                        a = 1;
                    }
                });
            };
        },
        // Counter end
	};	
	medical.init();
	
})(jQuery);	
// Contact Form Submission
function checkRequire(formId , targetResp){
    targetResp.html('');
    var email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
    var url = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
    var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
    var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
    var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
    var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
    var google_plus = /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
    var check = 0;
    $('#er_msg').remove();
    var target = (typeof formId == 'object')? $(formId):$('#'+formId);
    target.find('input , textarea , select').each(function(){
        if($(this).hasClass('require')){
            if($(this).val().trim() == ''){
                check = 1;
                $(this).focus();
                $(this).parent('div').addClass('form_error');
                targetResp.html('You missed out some fields.');
                $(this).addClass('error');
                return false;
            }else{
                $(this).removeClass('error');
                $(this).parent('div').removeClass('form_error');
            }
        }
        if($(this).val().trim() != ''){
            var valid = $(this).attr('data-valid');
            if(typeof valid != 'undefined'){
                if(!eval(valid).test($(this).val().trim())){
                    $(this).addClass('error');
                    $(this).focus();
                    check = 1;
                    targetResp.html($(this).attr('data-error'));
                    return false;
                }else{
                    $(this).removeClass('error');
                }
            }
        }
    });
    return check;
}
$(".submitForm").on('click', function() {
    var _this = $(this);
    var targetForm = _this.closest('form');
    var errroTarget = targetForm.find('.response');
    var check = checkRequire(targetForm , errroTarget);
    
    if(check == 0){
       var formDetail = new FormData(targetForm[0]);
        formDetail.append('form_type' , _this.attr('form-type'));
        $.ajax({
            method : 'post',
            url : 'ajaxmail.php',
            data:formDetail,
            cache:false,
            contentType: false,
            processData: false
        }).done(function(resp){
            console.log(resp);
            if(resp == 1){
                targetForm.find('input').val('');
                targetForm.find('textarea').val('');
                errroTarget.html('<p style="color:green;">Mail has been sent successfully.</p>');
            }else{
                errroTarget.html('<p style="color:red;">Something went wrong please try again latter.</p>');
            }
        });
    }
});





$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 0) && (positiontop < 100)){

            $('#cardone').addClass('animate__animated animate__fadeInLeft animate__delay-0.1s');
            $('#cardtwo').addClass('animate__animated animate__fadeInDown animate__delay-0.1s');
            $('#cardthree').addClass('animate__animated animate__fadeInRight animate__delay-0.1s');
        }
    });
});


$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 200) && (positiontop < 800)){

            $('#cardfour').addClass('animate__animated animate__fadeInLeft animate__delay-1.6s');
            $('#cardfive').addClass('animate__animated animate__fadeInLeft animate__delay-1.6s');
            $('#cardsix').addClass('animate__animated animate__fadeInLeft animate__delay-1.6s');
            $('#cardseven').addClass('animate__animated animate__fadeInLeft animate__delay-1.6s');
            $('#cardeight').addClass('animate__animated animate__fadeInRight animate__delay-1.6s');
            $('#cardnine').addClass('animate__animated animate__fadeInRight animate__delay-1.6s');
            $('#cardten').addClass('animate__animated animate__fadeInRight animate__delay-1.6s');
            $('#cardimage').addClass('animate__animated animate__fadeInDown animate__delay-1.6s');
            $('#cardeleven').addClass('animate__animated animate__fadeInRight animate__delay-1.6s');
            $('#title-biomed').addClass('animate__animated animate__flipInX animate__delay-1.6s');
        }
    });
});



$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 800) && (positiontop < 1310)){

            $('#arrival-new').addClass('animate__animated animate__flipInX animate__delay-1s');
        }
    });
});

$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 1385) && (positiontop < 1685)){

            $('#Newsletter').addClass('animate__animated animate__shakeX animate__delay-1s');
        }
    });
});



$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 2075) && (positiontop < 2755)){

            $('#gallery-product').addClass('animate__animated animate__zoomIn animate__delay-0.3s');
        }
    });
});


$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 2743) && (positiontop < 3543)){

            $('#contacti').addClass('animate__animated animate__fadeInLeft animate__delay-1s');
        }
    });
});


$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 2743) && (positiontop < 3543)){

            $('#Regards').addClass('animate__animated animate__fadeInRight animate__delay-1s');
        }
    });
});

$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 0) && (positiontop < 200)){

            $('#about-image').addClass('animate__animated animate__fadeInLeft animate__delay-0.1s');
            $('#about-info').addClass('animate__animated animate__fadeInRight animate__delay-0.1s');
        }
    });
});

$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 80) && (positiontop < 700)){

            $('#team-slider').addClass('animate__animated animate__bounceInDown animate__delay-1.5s');
        }
    });
});

$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 0) && (positiontop < 500)){

            $('#aside-left').addClass('animate__animated animate__fadeInLeft animate__delay-0.1s');
            $('#aside-right').addClass('animate__animated animate__fadeInRight animate__delay-0.1s');
        }
    });
});

$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 0) && (positiontop < 500)){

            $('#event-left').addClass('animate__animated animate__fadeInLeft animate__delay-0.1s');
            $('#event-right').addClass('animate__animated animate__fadeInRight animate__delay-0.1s');
        }
    });
});

$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 0) && (positiontop < 200)){

            $('#partner-sl').addClass('animate__animated animate__bounceInDown animate__delay-0.1s');
        }
    });
});

$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 100) && (positiontop < 200)){

            $('#c-l').addClass('animate__animated animate__fadeInLeft animate__delay-0.1s');
            $('#c-r').addClass('animate__animated animate__fadeInRight animate__delay-0.1s');
        }
    });
});

$(document).ready(function(){
    $(window).scroll(function(){

        var positiontop = $(document).scrollTop();
        console.log(positiontop);

        if((positiontop > 200) && (positiontop < 600)){

            $('#map-l').addClass('animate__animated animate__fadeInDownBig animate__delay-0.9s');
        }
    });
});



//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

$(document).ready(function() {
    var count = 0;
    $("a.add-to-cart").click(function(event) {
        count++;
        $("a.add-to-cart").addClass("size");
        setTimeout(function() {
            $("a.add-to-cart").addClass("hover");
        }, 200);
        setTimeout(function() {
            $("a.cart > span").addClass("counter");
            $("a.cart > span.counter").text(count);
        }, 400);
        setTimeout(function() {
            $("a.add-to-cart").removeClass("hover");
            $("a.add-to-cart").removeClass("size");
        }, 600);
        event.preventDefault();
    });
});

$(document).ready(function(){
    
       var html = '<tr><td><select class="form-control" id="product-name"><option value="325">Floor Cleaner</option><option value="324">Pupa One Piece Paragon White -2</option></select></td><td>10</td><td></td><td></td><td><button class="btn btn-danger remove"><i class="fa fa-times" aria-hidden="true"></i></button></td></tr>'; 
        $("#addProduct").click(function(){
            $('tbody').append(html);
    });
    
    $(document).on('click','.remove',function(){
        $(this).parents('tr').remove();
    });
});

(function($, window, document, undefined) {
  var pluginName = "editable",
    defaults = {
      keyboard: true,
      dblclick: true,
      button: true,
      buttonSelector: ".edit",
      maintainWidth: true,
      dropdowns: {},
      edit: function() {},
      save: function() {},
      cancel: function() {}
    };

  function editable(element, options) {
    this.element = element;
    this.options = $.extend({}, defaults, options);

    this._defaults = defaults;
    this._name = pluginName;

    this.init();
  }

  editable.prototype = {
    init: function() {
      this.editing = false;

      if (this.options.dblclick) {
        $(this.element)
          .css('cursor', 'pointer')
          .bind('dblclick', this.toggle.bind(this));
      }

      if (this.options.button) {
        $(this.options.buttonSelector, this.element)
          .bind('click', this.toggle.bind(this));
      }
    },

    toggle: function(e) {
      e.preventDefault();

      this.editing = !this.editing;

      if (this.editing) {
        this.edit();
      } else {
        this.save();
      }
    },

    edit: function() {
      var instance = this,
        values = {};

      $('td[data-field]', this.element).each(function() {
        var input,
          field = $(this).data('field'),
          value = $(this).text(),
          width = $(this).width();

        values[field] = value;

        $(this).empty();

        if (instance.options.maintainWidth) {
          $(this).width(width);
        }

        if (field in instance.options.dropdowns) {
          input = $('<select></select>');

          for (var i = 0; i < instance.options.dropdowns[field].length; i++) {
            $('<option></option>')
              .text(instance.options.dropdowns[field][i])
              .appendTo(input);
          };

          input.val(value)
            .data('old-value', value)
            .dblclick(instance._captureEvent);
        } else {
          input = $('<input type="text" />')
            .val(value)
            .data('old-value', value)
            .dblclick(instance._captureEvent);
        }

        input.appendTo(this);

        if (instance.options.keyboard) {
          input.keydown(instance._captureKey.bind(instance));
        }
      });

      this.options.edit.bind(this.element)(values);
    },

    save: function() {
      var instance = this,
        values = {};

      $('td[data-field]', this.element).each(function() {
        var value = $(':input', this).val();

        values[$(this).data('field')] = value;

        $(this).empty()
          .text(value);
      });

      this.options.save.bind(this.element)(values);
    },

    cancel: function() {
      var instance = this,
        values = {};

      $('td[data-field]', this.element).each(function() {
        var value = $(':input', this).data('old-value');

        values[$(this).data('field')] = value;

        $(this).empty()
          .text(value);
      });

      this.options.cancel.bind(this.element)(values);
    },

    _captureEvent: function(e) {
      e.stopPropagation();
    },

    _captureKey: function(e) {
      if (e.which === 13) {
        this.editing = false;
        this.save();
      } else if (e.which === 27) {
        this.editing = false;
        this.cancel();
      }
    }
  };

  $.fn[pluginName] = function(options) {
    return this.each(function() {
      if (!$.data(this, "plugin_" + pluginName)) {
        $.data(this, "plugin_" + pluginName,
          new editable(this, options));
      }
    });
  };

})(jQuery, window, document);

editTable();

//custome editable starts
function editTable(){
  
  $(function() {
  var pickers = {};

  $('table tr').editable({
    dropdowns: {
      sex: ['Male', 'Female']
    },
    edit: function(values) {
      $(".edit i", this)
        .removeClass('fa-pencil')
        .addClass('fa-save')
        .attr('title', 'Save');

      pickers[this] = new Pikaday({
        field: $("td[data-field=birthday] input", this)[0],
        format: 'MMM D, YYYY'
      });
    },
    save: function(values) {
      $(".edit i", this)
        .removeClass('fa-save')
        .addClass('fa-pencil')
        .attr('title', 'Edit');

      if (this in pickers) {
        pickers[this].destroy();
        delete pickers[this];
      }
    },
    cancel: function(values) {
      $(".edit i", this)
        .removeClass('fa-save')
        .addClass('fa-pencil')
        .attr('title', 'Edit');

      if (this in pickers) {
        pickers[this].destroy();
        delete pickers[this];
      }
    }
  });
});
  
}

$(".add-row").click(function(){
  $("#editableTable").find("tbody tr:first").before("<tr><td data-field='name'></td><td data-field='name'></td><td data-field='name'></td><td data-field='name'></td><td data-field='name'></td><td><a class='button button-small edit' title='Edit'><i class='fa fa-pencil'></i></a> <a class='button button-small' title='Delete'><i class='fa fa-trash'></i></a></td></tr>");   
  editTable();  
  setTimeout(function(){   
    $("#editableTable").find("tbody tr:first td:last a[title='Edit']").click(); 
  }, 200); 
  
  setTimeout(function(){ 
    $("#editableTable").find("tbody tr:first td:first input[type='text']").focus();
      }, 300); 
  
   $("#editableTable").find("a[title='Delete']").unbind('click').click(function(e){
        $(this).closest("tr").remove();
    });
   
});

function myFunction() {
    
}

$("#editableTable").find("a[title='Delete']").click(function(e){  
  var x;
    if (confirm("Are you sure you want to delete entire row?") == true) {
        $(this).closest("tr").remove();
    } else {
        
    }     
});

// var options = {
//     importCSS = false;
//     loadCSS = "assets/css/bootstrap.min.css",
//     pageTitle = "<h1>print this</h1>",
//     base = "http://localhost/jquery/print-this/"
// }
// $('printall').click (function(){
//     $(container).printThis(options);
// });
//Use this function on click event and provide id of the element to print or leave it blank.
        // Example: printDocument("") OR printDocument("myDivId") OR printDocument("myDivId1, myDivId2")
        function printDocument(elemid) {

            //Check if element is empty
            if (elemid == "") {
                window.print();
            }
            else {
                //array to store ids separated with comma if available
                var arrelemid = elemid.split(',');
                var htmlContent = "";
                for (var i = 0; i < arrelemid.length; i++) {
                    htmlContent += document.getElementById(arrelemid[i]).innerHTML;
                }

                
                var ww = screen.availWidth;
                var wh = screen.availHeight - 90;

                
                var pw = window.open("", "newWin", "width=" + ww + ",height=" + wh);
                pw.document.write('<html><title>Printed Page</title><body>');
                pw.document.write('</head><body>');
                pw.document.write(htmlContent);
                pw.document.write('</body></html>');
                pw.document.close();
                pw.print();
                pw.close();

                
            }
        }




function download(filename, text) {
    var createDl = document.createElement('a');
    createDl.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    createDl.setAttribute('download', filename);
    createDl.style.display = 'none';
    document.body.appendChild(createDl);
    createDl.click();
    document.body.removeChild(createDl);
}


document.getElementById("downloadMe").onclick = function(){
    download("myFileName.txt", ".files");
}



  $('.slider-main').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    speed:10,

    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})






