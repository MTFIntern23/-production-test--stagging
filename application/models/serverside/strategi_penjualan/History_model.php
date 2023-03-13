<?php
defined('BASEPATH') or exit('No direct script access allowed');
class History_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_bd = "tb_brand";
    private $_table_tp = "tb_tipe";
    const SESSION_KEY = 'user_id';
    var $table = 'tb_agreement';
    private function _history($params,$type){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        if($type=='tipe'){
            $column_order = array(null, 'tipe','mtd_amt','mtd_unit',null); 
            $column_search = array('tipe'); 
            $order = array('tipe' => 'asc'); 
            $this->db->select(''.$this->_table_tp.'.id_tipe,'.$this->_table_tp.'.tipe,SUM(lending_amt) as mtd_amt,COUNT(*) as mtd_unit');
        }else if($type=='brand'){
            $column_order = array(null, 'brand','mtd_amt','mtd_unit',null); 
            $column_search = array('brand'); 
            $order = array('brand' => 'asc'); 
            $this->db->select(''.$this->_table_bd.'.id_brand,'.$this->_table_bd.'.brand,SUM(lending_amt) as mtd_amt,COUNT(*) as mtd_unit');
        }
        $this->db->from(''.$this->_table_agreement.'');
        $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
        $this->db->join($this->_table_tp,$this->_table_tp.'.id_tipe='.$this->_table_agreement.'.id_tipe');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
        }else if($params == 'last_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
        }else if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year))');
        }else{
            return null;
        }
        if($type=='tipe'){
            $this->db->group_by('id_tipe');
        }else if($type=='brand'){
            $this->db->group_by('id_brand');
        }
        $i = 0;
        foreach ($column_search as $item) 
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
                if(count($column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($order))
        {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables($params,$type)
    {
        $this->db->cache_on();
        $this->_history($params,$type);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered($params,$type)
    {
        $this->_history($params,$type);
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