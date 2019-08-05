window.jQuery = window.$ = jQuery;


function getReportDetails(listCode, reportKey, reportDetails) {

    var response = undefined;

    if (reportDetails[listCode] !== undefined) {

        if (reportDetails[listCode][reportKey] !== undefined) {

            response = reportDetails[listCode][reportKey];

        } else {

            response = undefined;

        };

    } else {

        response = undefined;

    };

    if (typeof(response) === 'undefined') {

        response = "The reportKey provided does not match a reportURL";

    };

    return response;

}

function getListName(listCode) {

    var listName = 'this newsletter';

    if (listCode === 'INVESTME') {
        var listName = 'Investment U';
    }

    else if (listCode === 'WEALTHRE') {
        var listName = 'Wealthy Retirement';
    }

    else if (listCode === 'EARLYIN') {
        var listName = 'Early Investing';
    }

    else if (listCode === 'ENRESDIG') {
        var listName = 'Energy & Resources Digest';
    }

    else if (listCode === 'MANDIGES') {
        var listName = 'Manward Digest';
    }

    else if (listCode === 'LIBWEALT') {
        var listName = 'Liberty Through Wealth';
    }

    else if (listCode === 'PROFTRND') {
        var listName = 'Profit Trends';
    }

    else if (listCode === 'TRADEDAY') {
        var listName = 'Trade Of The Day';
    }

    return listName;

}

function isSubscribed(emailAddressVal, thisList, listCode) {


    // Check for Signup Cookie
    if (getCookie('signup')) {

      return true;

    }

    // Check for Lytics Segments
    if (thisList === 'EARLYINV' && getCookie('ly_segs').includes('earlyinv_active') || thisList === 'MANDIGEST' && getCookie('ly_segs').includes('mandiges_active') || thisList === 'ENRESDIG' && getCookie('ly_segs').includes('enresdig_active') || thisList === 'WEALTHRE' && getCookie('ly_segs').includes('wealthre_active') ||
    thisList === 'INVESTME' && getCookie('ly_segs').includes('investme_active') || thisList === 'LIBWEALT' && getCookie('ly_segs').includes('libwealt_active') || thisList === 'PROFTRND' && getCookie('ly_segs').includes('proftrnd_active') || thisList === 'TRADEDAY' && getCookie('ly_segs').includes('tradeday_active')) {
      return true;
    }

    // else {

    //     return false;

    // };


    if (typeof(carl) !== 'undefined') {

        function getCustomerNumber(handleData) {
          $.ajax({
            url:'https://carl.pubsvs.com/customerNumberByEmail/9/'+emailAddressVal,
            type: 'get',
            async: false,
            success:function(data) {
              handleData(data);
            }
          });
        }

        getCustomerNumber(function(output){
            // console.log(output);
            customerNumber = output;
        });

        if(window.jstag) {
            window.jstag.send({
                customer_number:customerNumber
            });
        }

        var currentLists = carl.getLists(emailAddressVal,'9');

        function getListInfo(handleData) {
          $.ajax({
            url:'https://carl.pubsvs.com/listStatusByEmail/9/'+emailAddressVal+'/'+thisList,
            type: 'get',
            async: false,
            success:function(data) {
              handleData(data);
            }
          });
        }

        getListInfo(function(output){
        //   console.log(output);
          // here you use the output
          listStatus = output;
        });

        if (currentLists !== undefined && $.inArray(thisList, currentLists) !== -1 && (listStatus === 'A' || listStatus === 'X')) {

            return true;

        }

    }


}

function placeSignupCookie() {

    var date = new Date();
    date.setTime(date.getTime()+(365*86400000)); //24*60*60*1000
    var expires = "; expires="+date.toGMTString();
    document.cookie = name+"signup=complete"+expires+"; path=/";
    if (window.location.hostname === "www.investmentu.com") {
        document.cookie = name+"iu_signup=complete"+expires+"; path=/";
    };

}

function setLeadGenCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (365*86400000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function placeModalSignupCookie() {
    var date = new Date();
    date.setTime(date.getTime()+(365*86400000)); //24*60*60*1000
    var expires = "; expires="+date.toGMTString();
    document.cookie = name+"modalsignup=complete"+expires+"; path=/";
    if (window.location.hostname === "www.investmentu.com") {
        document.cookie = name+"iu_signup=complete"+expires+"; path=/";
    };
    $('#genericModal').hide();
    $('#genericModalTwo').hide();
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function changeRedirectUrl(){
    var url = window.location.href;
    $("input#redirectUrl").val(url);
}

function checkGenericCookie() {
    changeRedirectUrl();
    var cvaluet = getCookie("genericSignup");
    var cvalueg = getCookie("genericSignup2");
    var cvaluet2 = getCookie("modalsignup");
    if (cvaluet != "" || cvalueg != "") {
        if (cvaluet2 == "" || cvaluet2 == null){
          if(cvalueg =! ""){
            $('#genericModalTwo').show();
          }
            if(cvaluet != "") {
            $('#genericModal').show();
          }
        }
    }

}

/*
*
* Verify the user-supplied input is a valid submission by checking it against a few parameters:
*   1) Is the input value empty?
*   2) Does it pass a regex test?
*   3) Is the supplied email address currently subscribed to the current list (as indicated by the listcode)?
*/

function validateEmailWithCarl(emailAddressVal, listCode, toSubmit, emailPage) {

    var invalidEmail = "Please enter a valid email address.";

    var missingEmail = "Please enter your email address.";

    $(".error").remove();

    var hasError = false;

    var emailReg = /^([\w-\.\+]+@([\w-]+\.)+[\w-]{2,4})?$/;



    if(emailAddressVal === '' || emailAddressVal === "Enter Email Here") {

        // console.log('No Input');

        $('body').append('<div class="modal fade" id="modal_window" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"><div class="modal-dialog" role="document"><div class="modal-content error"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+missingEmail+'</div></div></div>');

        // $('#modal_window').on('show.bs.modal', function (e) {
        //     console.log('Triggered Show');
        // });

        // $('#modal_window').on('shown.bs.modal', function (e) {
        //     console.log('Shown');
        // });


        $('#modal_window').on('hidden.bs.modal', function (e) {
            // console.log('Hidden Existing #modal_window');
            $('#modal_window').remove();
            $('#modal_window').modal('dispose');
        });

        $('#modal_window').modal('show');
        hasError = true;

    }

    else if(!emailReg.test(emailAddressVal) || emailAddressVal.includes('@apple.com')) {

        // console.log('Invalid Format');

      $('body').append('<div class="modal fade" id="modal_window" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"><div class="modal-dialog" role="document"><div class="modal-content error"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+invalidEmail+'</div></div></div>');
      $('#modal_window').on('hidden.bs.modal', function (e) {
        $('#modal_window').remove();
        $('#modal_window').modal('dispose');
        // console.log('Remove Existing #modal_window');
    });
      $('#modal_window').modal('show');

      hasError = true;

    }

    else if (isSubscribed(emailAddressVal, listCode)) {

        // console.log('Subscribed');

        placeSignupCookie();

        if(window.jstag) {
            window.jstag.send({
                email:emailAddressVal
            });
        }

        var thisListName = getListName(listCode);

        var currentURL = window.location.href;

        var thisReportDetails = getReportDetails(listCode, emailPage, reportDetails);

        var response = '<div class="modal fade" id="modal_window" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"><div class="modal-dialog" role="document"><div class="modal-content success"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>You are already subscribed to ' + thisListName + '.</div></div></div>';

        if (typeof(thisReportDetails) === "object") {

            if (typeof(thisReportDetails.title) === "string") {

                var thisReportTitle = thisReportDetails["title"];

            };

            if (typeof(thisReportDetails.url) === "string") {

                var thisReportURL = thisReportDetails["url"];

                var response = '<div class="modal fade" id="modal_window" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"><div class="modal-dialog" role="document"><div class="modal-content success"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Good news!</strong> You are already subscribed to ' + thisListName + '. You can access the report <a href="' + thisReportURL +'" target="_blank">here</a>.</div></div></div>';
            };

            if (typeof(thisReportDetails.free) === "string") {

              var response = '<div class="alert alert-success error col-sm-12" role="alert"><p><strong>Good news!</strong> You are already subscribed to ' + thisListName + '.</p> <p><a class="already-subscribed" href="">Click here to view the reports</a></p></div>';

            };

        };


        $('body').append(response);
        $('#modal_window').modal('show');
        $('#modal_window').on('hidden.bs.modal', function (e) {
            $('#modal_window').remove();
            $('#modal_window').modal('dispose');
            // console.log('Remove Existing #modal_window');
        });
        hasError = true;

    };

    if(hasError === true) {

        return false;

    }

    else {

        if(window.jstag) {
            window.jstag.send({
                email:emailAddressVal
            });
        }

        return true;

    };

}

function validateEmailFormat(emailAddressVal, toSubmit) {

    var invalidEmail = "Please enter a valid email address.";

    var missingEmail = "Please enter your email address.";

    $(".error").remove();

    var hasError = false;

    var emailReg = /^([\w-\.\+]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if(emailAddressVal === '' || emailAddressVal === "Enter Email Here") {

        $(toSubmit).after('<div class="alert alert-danger error col-sm-12">'+missingEmail+'</div>');

        hasError = true;

    }

    else if(!emailReg.test(emailAddressVal)) {

        $(toSubmit).after('<div class="alert alert-danger error col-sm-12">'+invalidEmail+'</div>');

        hasError = true;

    };

    if(hasError === true) {

        return false;

    }

    else {

        return true;

    };

}

function validateHoneyPot(toSubmit) {
    if ($(toSubmit)) {};
}

/*
*
* Handle the click event on submit and image type inputs
*
*/

$('input[type=submit], input[type=image], button[type=submit]').click(function(e) {

    //use the form's name attribute to determine if the form is a sign up form

    // create a reference to the current form

    var signUpForm = $(this).closest('form')[0];

    if ($(this).closest('form').attr('name') !== undefined && !$(this).closest('form').hasClass('subwall')) {



        // if the form has a name attribute, let's store it in a variable

        var thisFormName = $(signUpForm).attr('name');


        if (thisFormName.indexOf('SimpleSignUp') === -1) {

            return true;

        };

        // we're only interested in inputs of the 'text' and 'email' variety

        if ($(signUpForm).find('input[type=text]').length !== 0) {

            var textInputValue = $(signUpForm).find('input[type=text]').not('input[name=poo]').val();

        } else {

            var textInputValue = $(signUpForm).find('input[type=email]').val();

        };

        if ($(signUpForm).find('input[name=\'signup.listCode\']').length !== 0) {

            var listCode = $(signUpForm).find('input[name=\'signup.listCode\']').val();

        };

        if ($(signUpForm).find('input[name=\'signup.welcomeEmailTemplateName\']').length !== 0) {

            var emailPage = $(signUpForm).find('input[name=\'signup.welcomeEmailTemplateName\']').val();

        };

        if ($(signUpForm).find('input[name=poo]').length !== 0) {

            var honeyPot = $(signUpForm).find('input[name=poo]').val();

        };

        if (!honeyPot) {

            var validationResult = validateEmailWithCarl(textInputValue, listCode, signUpForm, emailPage);

            return validationResult;

        } else {

            return false;

        }



    } else if ($(signUpForm).attr('id') !== undefined && $(signUpForm).attr('id') === "LeadGen") {

        // just check the email format, no CARL

        // var signUpForm = $(this).closest('form');

        if ($(signUpForm).find('input[type=text]').length !== 0) {

            var textInputValue = $(signUpForm).find('input[type=text]').not('input[name=poo]').val();

        } else {

            var textInputValue = $(signUpForm).find('input[type=email]').val();

        };

        if ($(signUpForm).find('input[name=poo]').length !== 0) {

            var honeyPot = $(signUpForm).find('input[name=poo]').val();

        };

        if (!honeyPot) {

            validationResult = validateEmailFormat(textInputValue, signUpForm);

            return validationResult;

        } else {

            return false;

        }


    } else if($(signUpForm).hasClass('subwall')) {

        // just check the email format, no CARL

        // var signUpForm = $(this).closest('form');

        if ($(signUpForm).find('input[type=text]').length !== 0) {

            var textInputValue = $(signUpForm).find('input[type=text]').not('input[name=poo]').val();

        } else {

            var textInputValue = $(signUpForm).find('input[type=email]').val();

        };

        validationResult = validateEmailFormat(textInputValue, signUpForm);

        return validationResult;

    } else {

        return true;

    };

});

// Add functions on submit to form and onclick to modal for leadgen adzones
/*
//window.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('closeGenericModal').addEventListener("click", function(){
        placeModalSignupCookie();
        console.log("click added");
    });
//});

//window.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('generic-signup').addEventListener("submit", function(){
        setLeadGenCookie('genericSignup', true, 1);
        console.log("submit added");
    });
//});

(function() {

console.log("window load");
console.log("set redirect value");
var redirect = window.location.replace("https://dev.wealthyretirement.com/" + window.location.pathname);
$("#redirectUrl").val(redirect);

    $( "#closeGenericModal" ).on( "click", function() {
      placeModalSignupCookie();
      console.log("Add signup cookie");
    });

    $( "#generic-signup" ).on("submit", function() {
            setLeadGenCookie('genericSignup', true, 1);
            console.log("submit added");
    });
});
/*
/*
/*
*
* Identify signup forms by looking for the listCode input in each form
*
*/
checkGenericCookie();



    // If the form contains an input with the attribute name set to listCode, set the name on the closest form up the DOM

    var forms = $('form input[name=\'signup.listCode\']');

    $(forms).each(function() {

        // if ($(this).closest('form').attr('class') !== undefined) {

            // if ($(this).closest('form').attr('class').indexOf('gpoll') === -1) {

                $(this).closest('form').attr('name', 'SimpleSignUp');

            // };

        // };

            // $(this).closest('form').append('<input type="text" style="display:none;" name="poo" class="poo" />');

    });

        // Add iuded coreg field to all IU forms

    var investmeForms = $("form input[value=INVESTME]");
    if (investmeForms !== undefined && investmeForms.length !== 0) {
        $(investmeForms).each(function(){
            var form = $(this)[0].parentNode;
            var xcode = $(form).children("input[name=\'signup.sourceId\']")[0].value;
            var listCode = $(form).children("input[name=\'signup.listCode\']")[0].value;
            if (listCode === "INVESTME") {
                var coregInput = "<input name=\"coreg[]\" type=\"hidden\" value=\""+xcode+":IUDED\">";
                $(this).after(coregInput);
            };
        });
    };

    $('body').append('<style>#modal_window .modal-content \{font-size: 17px;margin-top: 30%;padding: 15px; display:block !important; }#modal_window .error {background-color: #f2dede;border-color: #ebccd1;color: #a94442; }#modal_window .success {color: #468847;background-color: #dff0d8;border-color: #468847; }#modal_window .success a {color: #367ee0;text-decoration: underline; }</style>');
