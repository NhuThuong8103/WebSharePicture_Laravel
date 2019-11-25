$(document).ready(function(){
	

  //dùng để hieeuj ung cho login
  $('.list-inline li > a').click(function() {
    var activeForm = $(this).attr('href') + ' > form';
    $(activeForm).addClass('animated fadeIn');
    setTimeout(function() {
      $(activeForm).removeClass('animated fadeIn');
    }, 1000);
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
uploadOneImage();
uploadImage();
uploadImageAvatar();
uploadImageAvatarUser();

function uploadOneImage(){
  var button = $('.upload-images .pic');
  var uploader = $('<input type="file" accept="image/*" />');
  var images = $('.upload-images');

  button.click(function() {
    uploader.click();
    /* Act on the event */
  });
  uploader.on('change', function () {
    var reader = new FileReader()
    reader.onload = function(event) {
      images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span><i class="far fa-trash-alt mr-2"></i>remove</span></div>')
      $('.pic').css('display', 'none');
    }
    reader.readAsDataURL(uploader[0].files[0]);
  })

  images.on('click', '.img', function () {
    $(this).remove()
    $('.pic').css('display', '');
  })
}


function uploadImage() {
  var button = $('.images .pic')
  var uploader = $('<input type="file" accept="image/*" />')
  var images = $('.images')

  button.on('click', function () {
    uploader.click()
  })
  uploader.on('change', function () {
    var reader = new FileReader()
    reader.onload = function(event) {
      images.prepend('<div class="img col-lg-3" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>')

    }
    reader.readAsDataURL(uploader[0].files[0]);
  })

  images.on('click', '.img', function () {
    $(this).remove()
  })
}


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
      images.prepend('<div class="image" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"></div>')

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
      images.prepend('<div class="image" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"></div>')

    }
    reader.readAsDataURL(uploader[0].files[0]);
  })

  images.on('click', '.img', function () {
    $(this).remove()
  })
}

// function dropzone(){
//   Dropzone.autoDiscover = false;
//   var dropzone = new Dropzone('#demo-upload', {
//     previewTemplate: document.querySelector('#preview-template').innerHTML,
//     parallelUploads: 2,
//     thumbnailHeight: 120,
//     thumbnailWidth: 120,
//     maxFilesize: 10,
//     filesizeBase: 1000,
//     thumbnail: function(file, dataUrl) {
//       if (file.previewElement) {
//         file.previewElement.classList.remove("dz-file-preview");
//         var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
//         for (var i = 0; i < images.length; i++) {
//           var thumbnailElement = images[i];
//           thumbnailElement.alt = file.name;
//           thumbnailElement.src = dataUrl;
//         }
//         setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
//       }
//     }

//   });
//   dropzone.on("complete", function(file) {
//     myDropzone.removeFile(file);
//   });
// }


function dropzone(){
  Dropzone.autoDiscover = false;
  var dropzone = new Dropzone('#demo-upload', {
      maxFilesize: 12,
      renameFile: function(file) {
      var dt = new Date();  
      var time = dt.getTime();
          return time+file.name;
      },
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      addRemoveLinks: true,
      timeout: 5000,

          removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: 'public/image/upload_images/',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
          success: function(file, response) 
            {
              console.log(response);
            },
          error: function(file, response)
            {
               return false;
            }

  });
  // dropzone.on("complete", function(file) {
  //   myDropzone.removeFile(file);
  // });
}









});