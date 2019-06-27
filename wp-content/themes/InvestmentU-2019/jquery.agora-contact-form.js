/**
 * Agora Contact Form v0.0.1
 *
 * This script makes it easy to add a customizable contact form to
 * your website that sends customer questions and comments to
 * Customer Service in a structured, easy-to-manage format.
 *
 * You can see an example of how to use it in the example.html file.
 *
 * It depends on jQuery for DOM manipulation, but you could probably
 * get by with something lighter like Zepto or Angular's Jqlite.
 * 
 * 
 * Legal Stuffs
 * ------------
 * 
 * This is free and open source, and comes with absolutely no warranty
 * whatsoever. Use at your own risk.
 * 
 * @author    Derek Conjar <dconjar@oxfordclub.com>
 * @copyright The Oxford Club 2014
 * @license   http://opensource.org/licenses/MIT
 *
 * @todo  Add client-side form validation
 * @todo  Maybe provide feedback when options are missing?
 */

;(function (window) {

  var $ = window.jQuery;

  /**
   * Construct the contact form
   * @param {object} options
   */
  var AgoraContactForm = function (opts) {
    this.redirect     = opts.redirect;     // Redirect here onsubmit 
    this.website      = opts.email;        // i.e. "oxfordclub"
    this.requestTypes = opts.requestTypes; // see example.html
    this.service      = opts.service;      // see example.html
    this.includeService  = opts.includeService;  // include name fields?
    this.includeName  = opts.includeName;  // include name fields?
    this.includePhone = opts.includePhone; // include phone fields?
    this.selector     = opts.selector;     // jQuery selector for form
    this.action       = opts.action;       // form action URI

    // Now let's add the contact form to the page based on the values
    // provided in the opts object.

    this.addFormAction();
    this.addFormMethod();
    
    this.addEmailField();
    this.addSeparator();

    if (this.includeName === true) {
      this.addNameFields();
      this.addSeparator();
    }

    if (this.includePhone === true) {
      this.addPhoneField();
      this.addSeparator();
    }

    this.addRequestTypes();
    // this.addSeparator();

    if (this.includeService === true) {
      this.addServices();
      // this.addSeparator();
    }

    this.addMessageField();
    // this.addSeparator();

    this.addHiddenField('website',      this.website);
    this.addHiddenField('redirect_url', this.redirect);

    this.addSubmitButton();
  }


  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //
  // These "impure methods" take no params and return nothing.
  // 
  // They are responsible for taking form info provided via the
  // "opts" object, and constructing the form via DOM manipulation.
  //
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  /**
   * Add the form action based on the provided "action" option
   */
  AgoraContactForm.prototype.addFormAction = function () {
    $(this.selector).attr('action', this.action);
  }

  /**
   * Add the form method
   */
  AgoraContactForm.prototype.addFormMethod = function () {
    $(this.selector).attr('method', 'post');
  }

  /**
   * Create the email address field and append it to the form.
   */
  AgoraContactForm.prototype.addEmailField = function () {
    var email = this.textField('email', 'Email Address');
    
    this.add(email);
    email.attr('placeholder', 'Email');
    email.attr('class', 'form-control form-control-lg');
  }

  /**
   * Create the firstname and lastname fields (including labels)
   * Append them to the form.
   */
  AgoraContactForm.prototype.addNameFields = function () {
    var first_name = this.textField('first_name');
    //var last_name = this.textField('last_name');

    this.add(first_name);
    first_name.attr('placeholder', 'First Name and Last Name');
    first_name.attr('class', 'form-control form-control-lg');

    //this.add(last_name);
    //last_name.attr('placeholder', 'Last Name');
  }

  /**
   * Creates a phone number field and appends it to the form
   */
  AgoraContactForm.prototype.addPhoneField = function () {
    var phoneField = this.textField('phone');

    this.add(phoneField);
    phoneField.attr('placeholder', 'Phone Number');
    phoneField.attr('class', 'form-control form-control-lg');
  }

  /**
   * Create the questions/comments textbox and add it to the form.
   */
  AgoraContactForm.prototype.addMessageField = function () {
    var textarea = $('<textarea></textarea>');
    var label    = this.label('message', 'Questions/Comments');

    textarea.attr('name', 'message');
    textarea.attr('placeholder', 'Questions/Comments');
    textarea.attr('class', 'form-control form-control-lg');
    textarea.attr('rows', '4');
    textarea.attr('cols', '50');

    this.add(label);
    this.add(textarea);
  }

  /**
   * Create the "Reason for Contacting" select and add it to the form.
   */
  AgoraContactForm.prototype.addRequestTypes = function () {
    var select = $('<select></select>');
    var label  = this.label('request_type', 'Reason for Contacting');
    var option;

    select.attr('name', 'request_type');
    select.attr('class', 'form-control form-control-lg');

    for (requestType in this.requestTypes) {
      option = $('<option></option>');

      option.attr('value', this.requestTypes[requestType]);
      option.html(requestType);

      select.append(option);
    }

    this.add(label);
    this.add(select);
  }

   /**
   * Create the "Service" select and add it to the form.
   */
  AgoraContactForm.prototype.addServices = function () {
    var select = $('<select></select>');
    var label  = this.label('service', 'Service');
    var option;

    select.attr('name', 'service');

    for (service in this.service) {
      option = $('<option></option>');

      option.attr('value', this.service[service]);
      option.html(service);

      select.append(option);
    }

    this.add(label);
    this.add(select);
  }

  /**
   * Add a textfield and label paired together to the form.
   * @param  {str} fieldName => "name" attr of form field
   * @param  {str} labelName => what the label should say
   */
  AgoraContactForm.prototype.addField = function (fieldName, labelName) {
    var label = this.label(fieldName, labelName);
    var field = this.textField(fieldName);
 
    this.add(label);
    this.add(field);
  }

  /**
   * Add custom hidden fields to the form.
   * @param {str} fieldName => the "name" attr
   * @param {str} value     => the "value" attr
   */
  AgoraContactForm.prototype.addHiddenField = function (fieldName, value) {
    var field = this.hiddenField(fieldName, value);

    this.add(field);
  }

  /**
   * Add the submit button to the form.
   */
  AgoraContactForm.prototype.addSubmitButton = function () {
    var button = $('<button></button>');

    button.attr('type', 'submit');
    button.attr('class', 'btn navy-button');
    button.html('Send Now');

    this.add(button);
  }

  /**
   * Append a horizontal rule to the form
   */
  AgoraContactForm.prototype.addSeparator = function () {
    var separator = $('');

    this.add(separator);
  }


  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //
  // These helper methods are used by the methods above. They 
  // provide abstractions for creating new fields and manipulating
  // the DOM.
  //
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  /**
   * Construct a new text input field based on the "name" attr
   * @param  {str} name
   * @return {obj} => the input field's jQuery object
   */
  AgoraContactForm.prototype.textField = function (fieldName) {
    var field = $('<input>');

    field.attr('type', 'text');
    field.attr('name', fieldName);
    field.attr('class', fieldName);

    return field;
  }

  /**
   * Construct a new hidden field based on the "name" and "value" attrs
   * @param  {fieldName} => "name"  HTML attr
   * @param  {value}     => "value" HTML attr
   * @return {obj}       => the jQuery object
   */
  AgoraContactForm.prototype.hiddenField = function (fieldName, value) {
    var field = $('<input>');

    field.attr('type', 'hidden');
    field.attr('name', fieldName);
    field.attr('value', value);

    return field;
  }

  /**
   * Construct a new form label based on the "name" attr
   * @param  {str} fieldName => "name" attr of form field 
   * @param  {str} labelName => what the label should say
   * @return {obj} => the label's jQuery object
   */
  AgoraContactForm.prototype.label = function (fieldName, labelName) {
    var label = $('');

    label.attr('for', fieldName);
    label.html(labelName)

    return label;
  }

  /**
   * Adds an element to the end of the form
   * @param  {obj} element => the jQuery object
   */
  AgoraContactForm.prototype.add = function (element) {
    $(this.selector).append(element);
  }

  window.AgoraContactForm = AgoraContactForm;

})(window);