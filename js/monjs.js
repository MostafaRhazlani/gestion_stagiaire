$(function () {
  var txtOldPwd = $('.oldPwd');

  $('.show_old_pwd').hover(
    function () {
      txtOldPwd.attr('type', 'text');
    },

    function () {
      txtOldPwd.attr('type', 'password');
    }
  );

  var txtNewPwd = $('.newPwd');

  $('.show_new_pwd').hover(
    function () {
      txtNewPwd.attr('type', 'text');
    },

    function () {
      txtNewPwd.attr('type', 'password');
    }
  )

});