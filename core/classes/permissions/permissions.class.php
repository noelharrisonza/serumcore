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
  function login_form() 
  {
    tpl_set('page_description', 'Login');
    $arg1 = arg(0);
    $arg2 = arg(1);
    $arg3 = arg(2);
    if($arg1[0] == "register")
    {
      if(!$arg2[0])
      {
        // Initiate a new form.
        $form = new forms(array(
          'name' => 'register_form',
          'method' => 'post',
          'action' => '',
          'class' => 'register_form form-horizontal',
          'id' => 'register-form',
        ));

        $form->add_field(array(
          'type' => 'text',
          'name' => 'name',
          'label' => t('Name & Surname'),
        ));
        
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

        $form->add_field(array(
          'type' => 'password',
          'name' => 'password_again',
          'label' => t('Password Again'),
        ));

        // Add a submit button.
        $form->add_button(array(
          'type' => 'submit',
          'name' => 'register_button',
          'value' => 'Register',
          'class' => 'btn btn-primary',
        ));

        // And now we deal with validations and submissions.
        $form->validate('permissions.validate_register_form');
        $form->submit('permissions.submit_register_form');
      }
      elseif($arg2[0] == 2)
      {
        $node = new node($arg3);
        tpl_set('node',objectArray($node));
        
        // Initiate a new form.
        $form = new forms(array(
          'name' => 'register_form',
          'method' => 'post',
          'action' => '',
          'class' => 'register_form form-horizontal',
          'id' => 'register-form',
        ));

        $form->add_field(array(
          'type' => 'text',
          'name' => 'activation_code',
          'label' => t('Activation Code'),
        ));

        // Add a submit button.
        $form->add_button(array(
          'type' => 'submit',
          'name' => 'register_button',
          'value' => 'Activate',
          'class' => 'btn btn-primary',
        ));

        // And now we deal with validations and submissions.
        $form->validate('permissions.validate_activation_form');
        $form->submit('permissions.submit_activation_form');
      }
      elseif($arg2[0] == 3)
      {

      }
    }
    else if($arg1[0] == 'lostpassword')
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

  function validate_activation_form($form)
  {
    $node_id = arg(2);
    $node = new node($node_id);

    $form_errors = array();
    if($form['fields']['activation_code']['value'] != $node->activation_code)
    {
      $form_errors['activation_code'] = 'Incorrect activation code';
    }

    if (!empty($form_errors)) {
      form_set_error($form, $form_errors);
      return false;
    }
    return true;
  }

  function validate_register_form($form)
  {
    $form_errors = array();

    // We need to have a name.
    if (!$form['fields']['name']['value']) {
      $form_errors['name'] = 'Name & Surname required';
    }

    // We need to have a email.
    if (!$form['fields']['email']['value']) {
      $form_errors['email'] = 'Email address is a required field';
    }

    // And we also have to have a password.
    if (!$form['fields']['password']['value']) {
      $form_errors['password'] = 'Password is a required field';
    }

    // And we also have to have a password.
    if ($form['fields']['password']['value'] != $form['fields']['password_again']['value']) {
      $form_errors['password_again'] = 'Passwords do not match';
    }

    // If there are any errors we return must tell the user about them and return the form.
    if (!empty($form_errors)) {
      form_set_error($form, $form_errors);
      return false;
    }

    // If everyone is happy we can return true.
    return true;
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
    $node = node::add_new('title',$form['fields']['name']['value'],1);
    $node->add_field('email',$form['fields']['email']['value']);
    $node->add_field('password',sha1($form['fields']['password']['value']));
    $node->add_field('activation_code',uniqid().rand());
    header('location:'. base_path().'register/2/'.$node->id);
  }

  function submit_activation_form($form)
  {
    header('location:'. base_path().'register/3/'.arg(2)); 
  }
}