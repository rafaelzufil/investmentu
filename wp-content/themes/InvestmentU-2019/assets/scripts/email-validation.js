window.jQuery = window.$ = jQuery;

$(document).on('submit', '#lead-gen', function(e) {
  var emailAddress = $(this).closest("form").find("input[name='signup.emailAddress']").val();
  var sourceId = $(this).closest("form").find("input[name='signup.sourceId']").val();
  var listCode = $(this).closest("form").find("input[name='signup.listCode']").val();
  var welcomeEmail = $(this).closest("form").find("input[name='signup.welcomeEmailTemplateName']").val();

  e.preventDefault();

  $.ajax({
      type        : 'GET', // define the type of HTTP verb we want to use (POST for our form)
      url         : '/apps/signupapp.php?email='+emailAddress+'&source='+sourceId+'&list='+listCode+'&welcome='+welcomeEmail, // the url where we want to POST
      //data        : formData, // our data object
      dataType    : 'json', // what type of data do we expect back from the server
      encode          : true
  }) // using the done promise callback
  .done(function(data) {

      // log data to the console so we can see
      if (data === 'success') {

        displayConfirmModal(listCode);
        revive.setCookie(listCode, true, 365);

      } else if (data === 'duplicate') {

      } else {

      }

      // here we will handle errors and validation messages
  });


});

function displayConfirmModal( list ) {
  alert (list);
};
