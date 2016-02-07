<?php

/**
 * Description of historia
 *
 * @author ronieri
 */

class Historia extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    function index() {

        $dados['page'] = 'historia';

        $this->load->view('/front/historia', $dados);
    }
}
