<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dealer_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_dl = "tb_dealer";
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    const SESSION_KEY = 'user_id';
    var $table = 'tb_dealer';
    var $column_order = array(null, 'nama_dealer','mtd_amt','mtd_unit',null); 
    var $column_search = array('nama_dealer'); 
    var $order = array('nama_dealer' => 'asc'); 
    private function _dealer($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select(''.$this->_table_dl.'.id_dealer,'.$this->_table_dl.'.nama_dealer,SUM(lending_amt) as mtd_amt,COUNT(*) as mtd_unit');
        $this->db->from(''.$this->_table_dl.'');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_dl.'.id_cabang');
        $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_dealer='.$this->_table_dl.'.id_dealer');
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
        $this->db->group_by('id_dealer');
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
        $this->_dealer($params);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered($params)
    {
        $this->_dealer($params);
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