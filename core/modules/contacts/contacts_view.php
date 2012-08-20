<?php

/**
 * @file
 */
 
class contacts_add 
{
   function view_contact() {
     $node = new Node(arg(2));
     tpl_set('page_title',$node->title);
     tpl_set('page_description','Contact Card');
     tpl_set('node',objectArray($node));
     tpl_set('keys',array_flip(objectArray($node)));

     //Get the default contact template
     $type = node::lookup_type_id('contacts');
     $template = node::load_node_template($type);
   }
}
