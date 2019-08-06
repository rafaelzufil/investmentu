window.jQuery = window.$ = jQuery;

$(document).on('submit', '#lead-gen', function(e) {
  var emailAddress = $(this).closest("form").find("input[name='signup.emailAddress']").val();
  var sourceId = $(this).closest("form").find("input[name='signup.sourceId']").val();
  var listCode = $(this).closest("form").find("input[name='signup.listCode']").val();
  var welcomeEmail = $(this).closest("form").find("input[name='signup.welcomeEmailTemplateName']").val();

  e.preventDefault();
  


});
