<?php

/**
 * @file
 */

class forms {
  public $form;

  // Initiate the form.
  function __construct($form = array()) {
    $this->form['meta'] = $form;
  }

  // Add elements to the form.
  function add_field($field = array()) {
    $name = $field['name'];
    $this->form['fields'][$name] = $field;
  }

  // Add form actions.
  function add_button($button = array()) {
    $name = $button['name'];
    $this->form['buttons'][$name] = $button;
  }

  // Deal with the validation and submission.
  function validate($function) {
    $this->form['callbacks']['validate'] = $function;
  }
  
  // Deal with the submit function.
  function submit($function) {
    $this->form['callbacks']['submit'] = $function;
  }
  
  // Get the form ready for rendering with Smarty.
  function render() {
    // Use Smarty to create the form HTML because I'm kind of lazy.
    $smarty = new Smarty();

    $smarty->template_dir = SERUM_ROOT .'/core/classes/forms/templates';
    $smarty->compile_dir = SERUM_ROOT .'/custom/files/tmp/';
    $smarty->config_dir = SERUM_ROOT .'/custom/files/tmp/';
    $smarty->cache_dir = SERUM_ROOT .'/custom/files/tmp/';

    $smarty->debugging = false;
    $smarty->caching = false;

    // Deal with the form meta data.
    foreach ($this->form['meta'] as $meta_key => $meta_val) {
      $meta_string .= "$meta_key=\"$meta_val\" ";
    }
    $meta_string = rtrim($meta_string, ' ');

    // Before we go any further we need to set some default hidden fields.
    $this->form['fields']['submitted_form'] = array(
      'type' => 'hidden',
      'name' => 'submitted_form',
      'value' => $this->form['meta']['name'],
    );

    // Check if the form has already been submitted.
    if ($_POST['submitted_form']) {
      // Store the field values.
      $this->store_values();

      // Check if there is a validation callback.
      if (isset($this->form['callbacks']['validate'])) {
        // Then we call the validate function.
        $this->validate_form();
      }
      else {
        // Otherwise just call the submit function.
        $this->submit_form();
      }
    }

    // Assign smarty vars for all the form bits.
    $smarty->assign('meta', $meta_string);
    $smarty->assign('fields', $this->form['fields']);
    $smarty->assign('buttons', $this->form['buttons']);

    // Use Smarty to make the form.
    $form_html = $smarty->fetch('form.tpl');

    // After creating the form rendering.
    tpl_set('form', $form_html);

    // The raw form.
    tpl_set('form_raw', $this->form);
  }

  // Temporarily store the inputted form values.
  function store_values() {
    // Kill the old form_values session.
    unset($_SESSION['form_values']);

    $fields = $this->form['fields'];

    foreach ($fields as $k => $field) {
      $_SESSION['form_values'][$k] = $_POST[$k];

      // And we add that to this form as well as to the session.
      $this->form['fields'][$k]['value'] = $_POST[$k];
    }
  }
  
  // Call the form validate function.
  function validate_form() {
    $function = explode('.', $this->form['callbacks']['validate']);
    
    // Load up the validate function.
    $function[0] = new $function[0]();
    if (method_exists($function[0], $function[1])) {
      // If the forms validation returns true then we can call the submit function.
      if ($function[0]->{$function[1]}($this->form)) {
        unset($_SESSION['form_values']);
        $this->submit_form();
      }
      // Otherwise we will just return to the form.
    }
  }
  
  // Call the form submit function.
  function submit_form() {
    $function = explode('.', $this->form['callbacks']['submit']);

    // Load up the validate function.
    $function[0] = new $function[0]();
    if (method_exists($function[0], $function[1])) {
      // And now we're done and just let the submit function do it's thing.
      $this->form = $function[0]->{$function[1]}($this->form);
    }

    foreach ($this->form['fields'] as $k => $field) {
      unset($this->form['fields'][$k]['value']);
    }
  }
}
