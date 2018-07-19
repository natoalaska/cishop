<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends MX_Controller {

	public function test() {
		$this->public_jqm();
	}

	public function admin($data = NULL) {
		$this->load->view('admin/index', $data);
	}

	function public_bootstrap($data = NULL) {
        $this->load->view('public_bootstrap/index', $data);
    }

	function public_jqm($data = NULL) {
        $this->load->view('public_jqm/index', $data);
    }

}

/* End of file templates.php */
/* Location: ./application/modules/templates/controllers/templates.php */
