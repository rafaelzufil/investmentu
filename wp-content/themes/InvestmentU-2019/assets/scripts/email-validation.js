window.jQuery = window.$ = jQuery;

$(document).on('submit', '#lead-gen', function(e) {
    var sourceId = $(this).closest("form").find("input[name='signup.sourceId']").val();
    var listCode = $(this).closest("form").find("input[name='signup.listCode']").val();
    var welcomeEmail = $(this).closest("form").find("input[name='signup.welcomeEmailTemplateName']").val();

    e.preventDefault();
    console.log(sourceId);
    console.log(listCode);
    console.log(welcomeEmail);


});
