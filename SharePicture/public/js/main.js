$(document).ready(function(){

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
   $('header .backdrop').removeClass('active');
   $('.navTrigger').removeClass('active');
   $("#menu-mobile").removeClass("show-menu");
   $('header .backdrop').css('top', '');
   $('header .backdrop').css('position', '');
 });

  uploadImageAvatar();
  uploadImageAvatarUser();

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