$(document).ready(function(){
  
  $(".far.fa-heart").click(function() {
    $(this).toggleClass("far fa-heart");
  });

  //dùng để hieeuj ung cho login
  // $('.list-inline li > a').click(function() {
  //   var activeForm = $(this).attr('href') + ' > form';
  //   $(activeForm).addClass('animated fadeIn');
  //   setTimeout(function() {
  //     $(activeForm).removeClass('animated fadeIn');
  //   }, 1000);
  // });

  $('#other').click(function(){
    $('#target').click();
    //$('#target-image').click();
  });


  // modal nhap xem 1 anh
  $('#exampleModal').on('show.bs.modal', function (event) {  // modal mo hinh trang feeds photo
    var button = $(event.relatedTarget) // Button that triggered the modal
    var title = $('.strong-title-news .tieude-photo').text();
    var detail = $('.card-text.description').text();
    //var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(title)
    modal.find('.modal-detail').text(detail)
    //modal.find('.modal-body input').val(recipient)
  });


	//menu mobi hamguger
	$('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    $("#menu-mobile").toggleClass("show-menu");
    $("#menu-mobile").fadeIn();
    $('header .backdrop').toggleClass('active');
    $('header .backdrop').css('top', '0');
    $('header .backdrop').css('position', 'fixed');
  });
	$('header .backdrop').click(function() {
   /* Act on the event */
   $('header .backdrop').removeClass('active');
   $('.navTrigger').removeClass('active');
   $("#menu-mobile").removeClass("show-menu");
   $('header .backdrop').css('top', '');
   $('header .backdrop').css('position', '');
 });


//dropzone();
//dropzoneProcess();
// uploadOneImage();
// uploadImage();
uploadImageAvatar();
uploadImageAvatarUser();

// function uploadOneImage(){
//   var button = $('.upload-images .pic');
//   var uploader = $('<input type="file" accept="image/*" />');
//   var images = $('.upload-images');

//   button.click(function() {
//     uploader.click();
//     /* Act on the event */
//   });
//   uploader.on('change', function () {
//     var reader = new FileReader()
//     reader.onload = function(event) {
//       images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span><i class="far fa-trash-alt mr-2"></i>remove</span></div>')
//       $('.pic').css('display', 'none');
//     }
//     reader.readAsDataURL(uploader[0].files[0]);
//   })

//   images.on('click', '.img', function () {
//     $(this).remove()
//     $('.pic').css('display', '');
//   })
// }


// function uploadImage() {
//   var button = $('.images .pic')
//   var uploader = $('<input type="file" accept="image/*" />')
//   var images = $('.images')

//   button.on('click', function () {
//     uploader.click()
//   })
//   uploader.on('change', function () {
//     var reader = new FileReader()
//     reader.onload = function(event) {
//       images.prepend('<div class="img col-lg-3" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>')

//     }
//     reader.readAsDataURL(uploader[0].files[0]);
//   })

//   images.on('click', '.img', function () {
//     $(this).remove()
//   })
// }


function uploadImageAvatar() {
  var button = $('#change .btn-overlay')
  var uploader = $('<input type="file" accept="image/*" />')
  var images = $('#change')

  button.on('click', function () {
    uploader.click()
  })
  uploader.on('change', function () {
    var reader = new FileReader()
    reader.onload = function(event) {
      $('#change .image').remove();
      $('#change .img').remove();
      images.prepend('<div class="image" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"></div>  <input class="img" type="hidden" name="ValueImageUser" value="'+ event.target.result+ '"><input class="img" type="hidden" name="avatarImageUser" value="'+ uploader.val().replace(/.*(\/|\\)/, '')+ '">')
    }
    reader.readAsDataURL(uploader[0].files[0]);
  })

  images.on('click', '.img', function () {
    $(this).remove()
  })
}
function uploadImageAvatarUser() {
  var button = $('#change-avatar .btn-overlay')
  var uploader = $('<input type="file" accept="image/*" />')
  var images = $('#change-avatar')

  button.on('click', function () {
    uploader.click()
  })
  uploader.on('change', function () {
    var reader = new FileReader()
    reader.onload = function(event) {
      $('#change-avatar .image').remove();
      $('#change-avatar .img').remove();
      images.prepend('<div class="image" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"></div>  <input class="img" type="hidden" name="ValueImageUser" value="'+ event.target.result+ '"><input class="img" type="hidden" name="avatarImageUser" value="'+ uploader.val().replace(/.*(\/|\\)/, '')+ '">')
    }
    reader.readAsDataURL(uploader[0].files[0]);
  })

  images.on('click', '.img', function () {
    $(this).remove()
  })
}










});