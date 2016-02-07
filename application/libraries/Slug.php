<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of historia
 *
 * @author ronieri
 */

class Slug {
    
    private $CI;
    
    function __construct() {
        
        $this->CI = &get_instance();
    
    }
    
    private function link($link, $tabela){
        
        if($tabela == 'conteudo'){
            $this->CI->db->select('COUNT(con_link) as cnt');
            $this->CI->db->where('con_link', $link);
        }else{
            $this->CI->db->select('COUNT(rep_link) as cnt');
            $this->CI->db->where('rep_link', $link);
        }
        
        $this->CI->db->from($tabela);
        
        $result = $this->CI->db->get();
        
        $ret = $result->row(0);
        
        return (int)$ret->cnt;
    }
    
    function conteudo($title){        
        $this->CI->load->model('adm/conteudo_model');
        
        $url = $url1 = url_title($title, '_', TRUE);
        $cont = 1;
        if($this->link($url1, 'conteudo') != 0){
            $url1 = $url.$cont;
            while($this->link($url1, 'conteudo') != 0){
                $url1 = $url.$cont;
                $cont++;
            }
            $cont--;
        }else{
           return $url; 
        }
        return $url.$cont;
    }
    
    function repositorio($title){        
        
        $url = $url1 = url_title($title, '_', TRUE);
        $cont = 1;
        if($this->link($url1, 'repositorios') != 0){
            $url1 = $url.$cont;
            while($this->link($url1, 'repositorios') != 0){
                $url1 = $url.$cont;
                $cont++;
            }
            $cont--;
        }else{
           return $url; 
        }
        return $url.$cont;
    }
}
