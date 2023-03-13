<?php
defined('BASEPATH') or exit('No direct script access allowed');
class History_detail_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_so = "tb_so";
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_cst = "tb_customer";
    private $_table_jns = "tb_jenis";
    private $_table_bd = "tb_brand";
    private $_table_tp = "tb_tipe";
    const SESSION_KEY = 'user_id';
    var $table = 'tb_tipe';
    var $column_order = array(null, 'no_aplikasi','nama_cust','lending_amt','tgl_appin','tgl_golive','jenis','nama_so'); 
    var $column_search = array('no_aplikasi','nama_cust','lending_amt','tgl_appin','tgl_golive','jenis','nama_so'); 
    var $order = array('tgl_golive' => 'desc'); 
    private function _history_detail($id,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select(''.$this->_table_tp.'.id_tipe,'.$this->_table_agreement.'.id_customer,
                '.$this->_table_agreement.'.id_brand,'.$this->_table_agreement.'.id_so,'.$this->_table_tp.'.tipe,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_agreement.'.`lending_amt`, '.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis`,'.$this->_table_bd.'.`brand`');
        $this->db->from(''.$this->_table_tp.'');
        $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_tipe='.$this->_table_tp.'.id_tipe');
        $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
        $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
        $this->db->join($this->_table_jns,$this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
        }else if($params == 'last_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
        }else if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
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
    function get_datatables($id,$params)
    {
        $this->db->cache_on();
        $this->_history_detail($id,$params);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered($id,$params)
    {
        $this->_history_detail($id,$params);
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