<?php
class Options extends CI_Model {

	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function get($option_name = 'theme')
	{
		$this->db->limit(1);
		$q = $this->db->get_where('options', array(
													'name' => $option_name
													));
		if ($this->db->count_all_results() > 0)
		{
			$res = $q->result();
			$option = $res[0]->value;
			return $option;
		}
		else
		{
			return FALSE;
		}		
	}
	
	public function get_fields(){
		$this->db->where('editable',1);
		$fields=$this->db->get('options');
		return $fields->result();
	}
	
	function get_all()
	{
		$q = $this->db->get('options');
		$options = array();
		foreach($q->result() as $row)
		{
			$options[$row->name] = $row->value;
		}
		return $options;
	}
	
	function get_themes(){
		$theme_folders = get_dir_file_info(dirname(dirname(__FILE__)).'/views');
		unset($theme_folders[$this->get('admin_theme')]);
		unset($theme_folders['thingys']);
		unset($theme_folders['index.html']);
		unset($theme_folders['recaptcha.php']);
		return $theme_folders;
	}
	/*DEPRECIATED - moved to languages model */
	function get_languages()
	{
		$theme_folders = get_dir_file_info(dirname(dirname(__FILE__)).'/language');
		//unset($la_folders[$this->get('admin_theme')]);
		unset($theme_folders['index.html']);
		return $theme_folders;	
	}
	
	function get_editable()
	{
		$q = $this->db->get_where('options', array('editable' => 1));
		return $q->result();
	}
	
	function set_rules_editable()
	{
		$options = $this->get_editable();
		foreach($options as $row)
		{
			$this->form_validation->set_rules($row->name, $row->nice_name, $row->rules);
		}
	}
	
	function save_editable_changes()
	{
		$options = $this->get_editable();
		foreach($options as $option)
		{
			$this->db->limit(1);
			$this->db->where('name', $option->name);
			$this->db->update('options', array('value' => $this->input->post($option->name)));
		}
	}
	
	function update($name = '', $value = '')
	{
		$this->db->limit(1);
		$this->db->where('name', $name);
		$this->db->update('options', array('value' => $value));
		if ($this->db->affected_rows() == 0)
		{
			//check if option exists
			if ($this->db->where('name', $name)->count_all_results('options') == 0)
			{
				$this->db->insert('options', array('name' => $name, 'value' => $value));
			}
		}
	}
	
}

?>