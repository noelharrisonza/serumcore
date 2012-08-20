<?php

/**
 * @file
 */

class node {

	public function __construct($id = null) {
		global $db;
		if (isset($id)) {
			$rs = $db->get_row("SELECT * FROM nodes WHERE id = '{$id}'");

			$key 		= $rs->node_key;
			$value 		= $rs->node_value;
			
			$this->id 	= $rs->id;
			$this->$key = $value;
			
			$fields = $this->load_fields();
	  }
	}

	public function load_fields()
	{
		global $db;
		$rs = $db->get_results("SELECT * FROM nodes WHERE parent_node_id = '{$this->id}'");
		foreach($rs as $k => $v)
		{
			$key = $v->node_key;
			$this->$key = $v->node_value;
		}
		return $rs;
	}

	public static function lookup_type_id($str)
	{
		global $db;
		$rs = $db->get_col("SELECT id FROM node_types WHERE type = '{$str}'");
		return $rs[0];
	}

	//Some static methods

	public static function get_all_of_type($id,$limit=null)
	{
		global $db;
		if($limit) $limit_str = "LIMIT $limit";
		$rs = $db->get_results("SELECT * FROM nodes WHERE node_type = '{$id}' $limit_str");
		foreach($rs as $k => $v)
		{
			$arr[] = new Node($v->id);
		}
		return $arr;
	}

	//Load a node template

	public static function load_node_template($id)
	{	
		global $db;
		$rs = $db->get_results("SELECT * FROM node_templates WHERE id = '{$id}' OR parent_node_id = '{$id}'");
		return $rs;
	}

	public static function authenticate_node($email,$password)
	{
		global $db;

		//Sanatise Data
		$email		 	= $db->escape($email);
		$password 	= sha1($db->escape($password));

		//Authenticate against the nodes
		$rs = $db->get_col("SELECT parent_node_id FROM nodes WHERE node_key='email' AND node_value = '{$email}'");
		$node_id = $rs[0];
		$rs = $db->get_col("SELECT COUNT(id) as qryCount FROM nodes WHERE node_key = 'password' AND node_value = '{$password}' AND parent_node_id = '{$node_id}'");
		if($rs[0] > 0)
		{
			return new Node($node_id);
		}
		else
		{
			return false;
		}
	}

	/**
   * Add a new node.
	 */
  function add_node($fields = array(), $type) {
  	global $db;
    
    $parent_node_id = 0;
    $args = array();
  	foreach ($fields as $k => $field) {
  		$node_id = uniqid().rand();

  		$args = array(
        $node_id,
        $parent_node_id,
        $k,
        $field['value'],
        $type,
  		);

  		// Look for the parent field first.
  		if ($field['parent_field']) {
  			$parent_node_id = $node_id;
  			$args[1] = 0;
  		}
  		else {
  			$args[4] = null;
  		}
  		
  		if ($k != 'submitted_form') {
  	  	$db->query(vsprintf("insert into nodes (id, parent_node_id, node_key, node_value, date_created, revison, node_type) values ('%s', '%s', '%s', '%s', NOW(), 1, '%s')", $args));
  	  }
  	}
  }
}