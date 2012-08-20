<?php

/**
* @file
*/

class contacts_add {
  function add_contact() {
    // Initiate a new form.
    $form = new forms(array(
      'name' => 'create_a_contact',
      'method' => 'post',
      'action' => '',
      'class' => 'create_a_contact_form form-horizontal',
      'id' => 'create-a-contact-form',
    ));

    // Now we start to add some elements.
    $form->add_field(array(
      'type' => 'text',
      'name' => 'title',
      'label' => t('Name'),
      'placeholder' => t('Enter your contact\'s full name'),
    ));

    $form->add_field(array(
      'type' => 'text',
      'name' => 'mobile',
      'label' => t('Mobile'),
      'placeholder' => t('Enter your contact\'s mobile number'),
    ));

    $form->add_field(array(
      'type' => 'text',
      'name' => 'email',
      'label' => t('Email'),
      'placeholder' => t('Enter your contact\'s email address'),
    ));

    // Add a submit button.
    $form->add_button(array(
      'type' => 'submit',
      'name' => 'add_contact',
      'value' => 'Add Contact',
      'class' => 'btn btn-primary',
    ));

    // And now we deal with validations and submissions.
    $form->validate('contacts_add.add_contact_validate');
    $form->submit('contacts_add.add_contact_submit');

    // form testing
    $form->render();
  }

  // Validate the user input
  function add_contact_validate($form) {
    // Make sure that there is at least a name with each contact.
    $form_errors = array();

    // We need to have a username.
    if (!$form['fields']['title']['value']) {
      $form_errors['title'] = 'The contact\'s namer is required';
    }

    // If there are any errors we return must tell the user about them and return the form.
    if (!empty($form_errors)) {
      form_set_error($form, $form_errors);
      return false;
    }

    // If everyone is happy we can return true.
    return true;
  }

  // Validate the user input
  function add_contact_submit($form) {
    $node = node::add_new('title',$form['fields']['title']['value'],1);
    //Now loop through the rest of this array and add it to the node.
    foreach($form['fields'] as $k => $v)
    {
      $node->add_field($v['name'],$v['value']);
    }
    die();
    // Then we tell the user about it.
    //serum_set_message('Contact has been added successfully.');
  }
}
