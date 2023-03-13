<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lending_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_pfm_ld = "tb_pfm_lending";
    private $_table_cbg = "tb_cabang";
    const SESSION_KEY = 'user_id';
    var $table = 'tb_pfm_lending';
    var $column_order = array(null, 'periode','komitment','target','aktual','achv','gap','app_in','approved','purchase_order','golive','actpo','actpoapp'); 
    var $column_search = array('periode','komitment','target'); 
    var $order = array('periode' => 'desc'); 
    private function _lending($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        if($params == 'curr_year'){
            $this->db->select('YEAR(`periode`) AS year,
            MONTH(`periode`) AS periode,
            (`komitment`) AS komitment,
            (`target`) AS target,
            SUM(`aktual`) AS aktual,
            (SUM(`aktual`)/(`target`))*100 AS achv,
            ABS(SUM(`aktual`)-(`target`)) AS gap,
            SUM(`app_in`) AS app_in,
            SUM(`approved`) AS approved,
            SUM(`purchase_order`) AS purchase_order,
            SUM(`golive`) AS golive,
            SUM(`aktual`)+SUM(`purchase_order`) AS actpo,
            SUM(`aktual`)+SUM(`purchase_order`)+SUM(`approved`) AS actpoapp');
        }else{
            $this->db->select('`periode`,komitment,target,aktual,achv,gap,app_in,approved,purchase_order,golive,(`aktual`)+(`purchase_order`) AS actpo,(`aktual`)+(`purchase_order`)+(`approved`) AS actpoapp');
        }
        $this->db->from($this->_table_pfm_ld);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_ld.'.id_cabang');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
            $this->db->group_by('YEAR(`periode`), MONTH(`periode`)');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
        }else{
            return null;
        }
        $i = 0;
        foreach ($this->column_search as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables($params)
    {
        $this->db->cache_on();
        $this->_lending($params);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered($params)
    {
        $this->_lending($params);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
?>