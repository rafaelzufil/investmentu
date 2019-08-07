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
      dataType    : 'json', // what type of data do we expect back from the server
      encode          : true
  }) // using the done promise callback
  .done(function(data) {

      // log data to the console so we can see
      if (data === 'success') {

        displayConfirmModal(listCode, data);
        revive.setCookie(listCode, true, 365);

      } else if (data === 'duplicate') {

        displayConfirmModal(listCode, data);
        revive.setCookie(listCode, true, 365);

      } else {

      }

      // here we will handle errors and validation messages
  });

  //Send email to Lytics
  if(window.jstag) {
        window.jstag.send({
            email: emailAddress
        });
    }

});

function displayConfirmModal( list, status ) {
  switch(list) {
    case 'INVESTME':
      var listName = 'Investment U';
      var confirmMessage = '<p>Welcome to the family! We’ve received your subscription to the free <em>Investment U</em> daily e-letter, your first step to becoming a smarter, more confident and self-reliant investor. Check your inbox for a special welcome email from us.</p><p>To ensure our expert analysis doesn’t go to spam, please take a moment now to <a href=”/whitelist/” target=”_blank”>whitelist us</a>.</p>';
      break;
    case 'TRADEDAY':
      var listName = 'Trade of the Day';
      var confirmMessage = '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/trade-of-the-day-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Trade of the Day</em> e-letter, where you’ll find everything you need for options and other fast-moving trades. Check your inbox for a personal note from founder Bryan Bottarelli.</p>';
      break;
    case 'LIBWEALT':
      var listName = 'Liberty Through Wealth';
      var confirmMessage = '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/liberty-through-wealth-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Liberty Through Wealth</em> daily e-letter, your first step toward being free of financial worry and living life on your terms. Check your inbox for a personal note from leading contributor Alexander Green.</p>';
      break;
    case 'MANDIGES':
      var listName = 'Manward Digest';
      var confirmMessage = '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/manward-digest-icon.png" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Manward Digest</em> daily e-letter, your first step to living a fuller, richer life. Check your inbox for a personal note from Founder Andy Snyder.</p>';
      break;
    case 'PROFTRND':
      var listName = 'Profit Trends';
      var confirmMessage = '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/profit-trends-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Profit Trends</em> e-letter, your essential guide to the market’s emerging, breakthrough and disruptive trends. Check your inbox for a personal note from leading contributor Matthew Carr.</p>';
      break;
    case 'EARLYINV':
      var listName = 'Early Investing';
      var confirmMessage = '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/early-investing-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Early Investing</em> e-letter, where you’ll find everything you need to navigate the private startup and cryptocurrency spaces. Check your inbox for a personal note from Co-Founder Adam Sharp.</p>';
      break;
    case 'WEALTHRE':
      var listName = 'Wealthy Retirement';
      var confirmMessage = '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/wealthy-retirement-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Wealthy Retirement</em> daily e-letter, your first step to living out your golden years on your terms. Check your inbox for a personal note from leading contributor Marc Lichtenfeld.</p>';
      break;
  }

  if (status === 'success') {
    var welcomeMessage = '<h2>Thank you for signing up for <em>' + listName + '</em>!</h2>' + confirmMessage;
  } else {
    var welcomeMessage = '<h2>It appears you are already subscribed to <em>' + listName + '</em></h2>';
  }

  $('body').append(
    '<div class="modal fade" id="modal_window" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">'+
    '<div class="modal-dialog" role="document"><div class="modal-content">'+
    '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right; padding: 10px 15px 0;">'+
    '<span aria-hidden="true">&times;</span></button>'+
    '<div style="padding:0 30px 15px">'+ welcomeMessage +
    '</div></div></div></div>');

  $('#modal_window').on('hidden.bs.modal', function (e) {
    $('#modal_window').remove();
    $('#modal_window').modal('dispose');
    // console.log('Remove Existing #modal_window');
  });

  $('#modal_window').modal('show');

};
