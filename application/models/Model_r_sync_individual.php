<?php
class Model_r_sync_individual extends CI_Model{

	public function list_cv()
	{
		return $this->db->get('m_cv');
	}

}