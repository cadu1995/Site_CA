<?php

/**
 * Description of historia
 *
 * @author ronieri
 */

class Conteudo_model extends CI_Model {
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       //$this->load->model('adm/funcionalidade_model');
       
       $this->tabela = 'conteudo';
    }
    
    function get_all(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_by_id($id){
    
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('con_id', $id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function cadastrar($conteudo){
        
        $this->db->insert($this->tabela, $conteudo);
        
        $criou_conteudo = $this->db->insert_id();
        
        
        return((int)$criou_conteudo);
    }
    

    function atualizar($conteudo){
        
        $this->db->where('con_id', (int)$conteudo->con_id);
        
        $this->db->update($this->tabela,$conteudo);
        
        $atualizou_conteudo = (bool)$this->db->affected_rows();
        
        
        return ($atualizou_conteudo);
    }
    

    function remover($id){
        
        $this->db->where('con_id', (int)$id);
        
        $this->db->delete($this->tabela);
        
        return (bool)$this->db->affected_rows();
    
    }
    
    function get_all_by_date(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->order_by('con_data_registro', 'desc');
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_noticias(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('tipo_conteudo_tp_con_id', 1);
        
        $this->db->order_by('con_data_registro', 'desc');
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_eventos(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('tipo_conteudo_tp_con_id', 2);
        
        $this->db->order_by('con_data_registro', 'desc');
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_by_link($link){
    
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('con_link', $link);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function get_by_categoria($categoria){
    
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('con_link', $categoria);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function link($link){
        $this->db->select('COUNT(con_link) as cnt');
        
        $this->db->from($this->tabela);
        
        $this->db->where('con_link', $link);
        
        $result = $this->db->get();
        
        $ret = $result->row(0);
        
        return (int)$ret->cnt;
    }
    
    function get_noticias_destaque(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('tipo_conteudo_tp_con_id', 1);
        
        $this->db->where('con_destaque', 1);
        
        $this->db->order_by('con_data_registro', 'desc');
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_eventos_destaque(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('tipo_conteudo_tp_con_id', 2);
        
        $this->db->where('con_destaque', 1);
        
        $this->db->order_by('con_data_registro', 'desc');
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function search($keyword, $id)
    {
        $Nkeyword = $this->db->escape('%'.$keyword.'%');
        $Nid = $this->db->escape($id);
        $this->db->select('*')->from($this->tabela)->where("tipo_conteudo_tp_con_id = $Nid"
                . " and (con_titulo LIKE $Nkeyword or con_subtitulo LIKE $Nkeyword or"
                . " con_descricao LIKE $Nkeyword)")->order_by('con_data_registro', 'desc');

        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }
    
    public function noticias_areas($area) {

        $this->load->model('adm/areas_conhecimento_model');
        $areas = $this->areas_conhecimento_model->get_all();

        foreach ($areas as $area) {
            $aux = new stdClass();
            $aux->are_id = $area->are_id;
            $aux->are_nome = $area->are_nome;
            $aux->are_numero = $area->are_numero;

            $this->db->select('sub_area_id, sub_area_titulo, sub_area_numero');
            $this->db->from($this->tabela);
            $this->db->join('areas_conhecimento', 'are_id = areas_conhecimento_are_id');
            $this->db->where('areas_conhecimento_are_id = ' . $area->are_id);

            $result = $this->db->get();

            $aux->sub_areas = $result->result();

            $retorno->sub_areas[] = $aux;
        }

        return $retorno;
    }
    
    function search_by_area($number, $id){
        
        $this->db->select('con_id, con_titulo, con_subtitulo, con_link, con_imagem')->from($this->tabela)->
                join('conteudo_sub_area', 'con_id = conteudo_id')->
                join('sub_areas_conhecimento', 'sub_areas_conhecimento.sub_area_id = conteudo_sub_area.sub_area_id')->
                join('areas_conhecimento', 'areas_conhecimento_are_id = are_id')->
                where('are_numero', $number)->
                where('tipo_conteudo_tp_con_id', $id)->
                group_by('con_id')->order_by('con_data_registro', 'desc');

        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }

}
