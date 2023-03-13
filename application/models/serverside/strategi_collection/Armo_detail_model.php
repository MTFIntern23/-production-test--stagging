<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Armo_detail_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_so = "tb_so";
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_cst = "tb_customer";
    private $_table_armo = "tb_armo";
    const SESSION_KEY = 'user_id';
    var $table = 'tb_agreement';
    var $column_order = array(null, 'no_aplikasi','nama_cust','lending_amt','tgl_appin','tgl_golive','nama_so','od','osp','instalment_amt','instalment_number','tenor'); 
    var $column_search = array('no_aplikasi','nama_cust','lending_amt','tgl_appin','tgl_golive','nama_so','od','osp','instalment_amt','instalment_number','tenor'); 
    var $order = array('tgl_golive' => 'desc'); 
    private function _armo_detail($id,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select(''.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_armo.'.`id_armo`,'.$this->_table_cbg.'.`id_cabang`,'.$this->_table_armo.'.`nama_armo`,'.$this->_table_so.'.`nama_so`,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,'.$this->_table_agreement.'.`lending_amt`,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_agreement.'.`od`,'.$this->_table_agreement.'.`osp`,'.$this->_table_agreement.'.`instalment_amt`,'.$this->_table_agreement.'.`instalment_number`,'.$this->_table_agreement.'.`tenor`');
        $this->db->from($this->_table_agreement);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
        $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
        $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
        if($params == 'curr_year'){
            //get all days (1st month to curr month) of current year
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_armo.'.`id_armo` = '.$id);
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_armo.'.`id_armo` = '.$id);
        }else if($params == 'curr_month'){
            //get all days (1st day to curr day) of current month
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_armo.'.`id_armo` = '.$id);
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
        $this->_armo_detail($id,$params);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered($id,$params)
    {
        $this->_armo_detail($id,$params);
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