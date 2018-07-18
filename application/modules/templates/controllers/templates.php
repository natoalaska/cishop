<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends MX_Controller {

	public function admin($data = NULL) {
		$this->load->view('admin/index', $data);
	}

}

/* End of file templates.php */
/* Location: ./application/modules/templates/controllers/templates.php */
