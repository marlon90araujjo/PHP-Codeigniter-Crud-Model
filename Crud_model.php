<?php

class Crud_model extends CI_Model {
    
    public function inserir($tabela, $dados){
        $this->db->insert($tabela, $dados);

        if ($this->db->insert_id() >= 1) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    public function atualizar($tabela, $dados, $where){

        $this->db->set($dados);
        $this->db->where($where);

        if ($this->db->update($tabela)) {
            //print_r($this->db->last_query());exit;
            return true;
        } else {
            return false;
        }
    }

    public function excluir($tabela, $prefixo, $codigo){
        $this->db->where('codigo_' . $prefixo, $codigo);

        if ($this->db->delete($tabela)) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir_condicionado($tabela, $where){
        $this->db->where($where);

        if ($this->db->delete($tabela)) {
            return true;
        } else {
            return false;
        }
    }

    public function inativar($tabela, $prefixo, $codigo){
        $this->db->set("ativo_" . $prefixo, false);
        $this->db->where('codigo_' . $prefixo, $codigo);

        if ($this->db->update($tabela)) {
            return true;
        } else {
            return false;
        }
    }

    public function buscar($campos, $tabela, $where, $order = "", $join = ""){
        $this->db->select($campos);
        $this->db->from($tabela);
        $this->db->where($where);
        if(!empty($join)) {
            $this->db->join($join['tabela'], $join['condicao'], $join['tipo']);
        }

        if(!empty($order)){
            $this->db->order_by($order);
        }

        $query = $this->db->get();
        //print_r($this->db->last_query());exit;

        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function busca_livre($select){
        //$this->db->query($select);
        $query = $this->db->query($select);
        //$query = $this->db->get();
        //print_r($this->db->last_query());exit;

        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function executa_comando($query){
        $query = $this->db->query($query);
        //print_r($this->db->last_query());exit;

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function verificar($tabela, $where){
        $this->db->select("*");
        $this->db->from($tabela);
        $this->db->where($where);
        $query = $this->db->get();
        //print_r($this->db->last_query());exit;

        if ($query->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }
}
