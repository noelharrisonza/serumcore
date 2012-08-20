<?php

/**
 * @file
 */
 
class permissions {
  // Check a permission.
  function check_perms() {
    global $db;

    // Check if the session has been set.
    if($_SESSION['SERUM_AUTHENTICATED']) {
      //Globalise.
      global $user;
      $user = new Node($_SESSION['ACTIVE_NODE_ID']);
      tpl_set('user',objectArray($user));
      return true;
    }
    
    // Otherwise we tell them to go away.
    return false;
  }

  // Check permissions in a role.
  function roles($role) {
    
  }

  function add_role() {
    
  }

  // The login form.
  function login_form() {
    tpl_set('page_description', 'Login');
    $arg = arg(0);
    if($arg[0] == "register")
    {
      // Initiate a new form.
      $form = new forms(array(
        'name' => 'register_form',
        'method' => 'post',
        'action' => '',
        'class' => 'register_form form-horizontal',
        'id' => 'register-form',
      ));

      // Now we start to add some fields.
      $form->add_field(array(
        'type' => 'text',
        'name' => 'email',
        'label' => t('Email Address'),
      ));

      $form->add_field(array(
        'type' => 'password',
        'name' => 'password',
        'label' => t('Password'),
      ));

      // Add a submit button.
      $form->add_button(array(
        'type' => 'submit',
        'name' => 'register_button',
        'value' => 'Register',
        'class' => 'btn btn-primary',
      ));

      // And now we deal with validations and submissions.
      $form->submit('permissions.submit_register_form');
    }
    elseif($arg[0] == 'lostpassword')
    {
      // Initiate a new form.
      $form = new forms(array(
        'name' => 'register_form',
        'method' => 'post',
        'action' => '',
        'class' => 'register_form form-horizontal',
        'id' => 'register-form',
      ));

      // Now we start to add some fields.
      $form->add_field(array(
        'type' => 'text',
        'name' => 'email',
        'label' => t('Email Address'),
      ));

      // Add a submit button.
      $form->add_button(array(
        'type' => 'submit',
        'name' => 'register_button',
        'value' => 'Retrieve',
        'class' => 'btn btn-primary',
      ));

      // And now we deal with validations and submissions.
      $form->validate('permissions.validate_login_form');
      $form->submit('permissions.submit_login_form');
    }
    else
    {
      // Initiate a new form.
      $form = new forms(array(
        'name' => 'login_form',
        'method' => 'post',
        'action' => '',
        'class' => 'login_form form-horizontal',
        'id' => 'login-form',
      ));

      // Now we start to add some fields.
      $form->add_field(array(
        'type' => 'text',
        'name' => 'username',
        'label' => t('Username'),
      ));

      $form->add_field(array(
        'type' => 'password',
        'name' => 'password',
        'label' => t('Password'),
      ));

      // Add a submit button.
      $form->add_button(array(
        'type' => 'submit',
        'name' => 'login_button',
        'value' => 'Login',
        'class' => 'btn btn-primary',
      ));

      // And now we deal with validations and submissions.
      $form->validate('permissions.validate_login_form');
      $form->submit('permissions.submit_login_form');
    }

    // form testing
    $form->render();
  }
  
  // Validate the form values.
  function validate_login_form($form) {
    $form_errors = array();

    // We need to have a username.
    if (!$form['fields']['username']['value']) {
      $form_errors['username'] = 'Username is a required field';
    }

    // And we also have to have a password.
    if (!$form['fields']['password']['value']) {
      $form_errors['password'] = 'Password is a required field';
    }

    // If there are any errors we return must tell the user about them and return the form.
    if (!empty($form_errors)) {
      form_set_error($form, $form_errors);
      return false;
    }

    // If everyone is happy we can return true.
    return true;
  }
  
  // Submit the form.
  function submit_login_form($form) 
  {
    $auth = node::authenticate_node($form['fields']['username']['value'],$form['fields']['password']['value']);
    if($auth)
    {
      $_SESSION['SERUM_AUTHENTICATED'] = true;
      $_SESSION['ACTIVE_NODE_ID'] = $auth->id;
    }
    else
    {
      //Send error message back to browser.
      $_SESSION['SERUM_AUTHENTICATED'] = false;
      serum_set_message('Authentication Failed.', $type = 'status');
    }
    header('location: '. base_path());
  }

  function submit_register_form($form)
  {
    /*$node = node::add_new('title','',1);
    //Now loop through the rest of this array and add it to the node.
    foreach($form['fields'] as $k => $v)
    {
      $node->add_field($v['name'],$v['value']);
    }*/
  }
}