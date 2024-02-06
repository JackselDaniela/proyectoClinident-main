src="https://code.jquery.com/jquery-3.7.0.js"
    integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"
  
  
  
      $('#add-register').click(function(event) {
        event.preventDefault();
        let fondo='<div class="modal-backdrop fade show"></div>'
        $('body').append(fondo).addClass('modal-open').css({overflow: 'hidden'});
        $('#modal-data').addClass('show').css('display', 'block');
      });
  
       //cerrar modal cuando se precione la x
      $(document).on('click', '#btn-close', function(event) {
        event.preventDefault();
        $('#modal-data').removeClass('show').removeAttr('style');
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open').removeAttr('style');
      });
  