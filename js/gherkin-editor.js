(function ($, Drupal) {
    'use strict';
    /**
     * @file
     */
    Drupal.behaviors.gherkin = {
      attach: function (context) {

       $(".form-textarea-wrapper pre").addClass("resize-vertical");

      }
    };
  
  })(jQuery, Drupal);
  