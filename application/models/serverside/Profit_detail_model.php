<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profit_detail_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_pfm_profit = "tb_pfm_profit";
    private $_table_kp = "tb_komponen";
    private $_table_cbg = "tb_cabang";
    const SESSION_KEY = 'user_id';
    var $table = 'tb_pfm_profit';
    var $column_order = array(null, 'month','profit'); 
    var $column_search = array('month','SUM(profit)'); 
    var $order = array('month' => 'asc'); 
    private function _profit_detail($id_komponen,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select('YEAR(periode) AS year,MONTH(periode)as month,komponen_profit,SUM(profit) AS profit');
        $this->db->from($this->_table_pfm_profit);
        $this->db->join($this->_table_kp,$this->_table_kp.'.id_komponen='.$this->_table_pfm_profit.'.id_komponen');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_profit.'.id_cabang');
        if($params == 'curr_year_val'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_kp.'.`id_komponen` = '.$id_komponen);
        }else if($params == 'last_year_val'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_kp.'.`id_komponen` = '.$id_komponen);
        }else{
            return null;
        }
        $this->db->group_by('YEAR(periode),MONTH(periode)');
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
    function get_datatables($id_komponen,$params)
    {
        $this->db->cache_on();
        $this->_profit_detail($id_komponen,$params);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered($id_komponen,$params)
    {
        $this->_profit_detail($id_komponen,$params);
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