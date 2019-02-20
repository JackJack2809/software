$(document).ready(function () {

    var navigation = $('.navbar-static-top');
    var origOffsetY = navigation.offset().top;

    function scroll() {
        if ($(window).scrollTop() >= origOffsetY) {
            $('.navbar-static-top').addClass('fixed-top');
        } else {
            $('.navbar-static-top').removeClass('fixed-top');
        }


    }

    document.onscroll = scroll;

});

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})


        if($(".contact-form").length > 0) {
     
          $('.contact-form').validate({
    
            rules: {
              name: {
                required: true,
                minlength: 2
              },
              email: {
                required: true,
                email: true
              },
              message: {
                required: true,
                minlength: 10
              }
            },

       
            messages: {
              name: {
                required: "Please enter your first name.",
                minlength: $.format("At least {0} characters required.")
              },
              email: {
                required: "Please enter your email.",
                email: "Please enter a valid email."
              },
              message: {
                required: "Please enter a message.",
                minlength: $.format("At least {0} characters required.")
              }
            },

          
            submitHandler: function(form) {
              $(".submit-contact").html("Sending...");
              $(form).ajaxSubmit({
                success: function(responseText, statusText, xhr, $form) {
                  $("#contact-content").slideUp(600, function() {
                    $("#contact-content").html(responseText).slideDown(600);
                    $(".submit-contact").html("Send");
                  });
                }
              });
              return false;
            }
          });
        }

function myMap() {
  var mapCanvas = document.getElementById("map");
  var myCenter = new google.maps.LatLng(43.240148, 76.922153); 
  var mapOptions = {center: myCenter, zoom: 17};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}




