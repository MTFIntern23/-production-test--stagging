<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Customer_segment_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_cst = "tb_customer";
    private $_table_pfs ="tb_profesi";
    const SESSION_KEY = 'user_id';
    var $table = 'tb_agreement';
    private function _customer_segment($params,$type){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        if(isset($params)){
            if($type=='pekerjaan'){
                $column_order = array(null, 'profesi_cust','mtd_amt','mtd_unit'); 
                $column_search = array('profesi'); 
                $order = array('profesi' => 'asc'); 
                $this->db->select(''.$this->_table_pfs.'.profesi as profesi_cust,SUM(lending_amt) AS mtd_amt,COUNT(*) AS mtd_unit');
            }else if($type=='pendidikan'){
                $column_order = array(null, 'pendidikan_cust','mtd_amt','mtd_unit'); 
                $column_search = array('pendidikan_cust'); 
                $order = array('pendidikan_cust' => 'asc'); 
                $this->db->select('pendidikan_cust,SUM(lending_amt) AS mtd_amt,COUNT(*) AS mtd_unit');
            }else if($type=='kecamatan'){
                $column_order = array(null, 'kecamatan_cust','mtd_amt','mtd_unit'); 
                $column_search = array('kecamatan_cust'); 
                $order = array('kecamatan_cust' => 'asc'); 
                $this->db->select('kecamatan_cust,SUM(lending_amt) AS mtd_amt,COUNT(*) AS mtd_unit');
            }else if($type=='gaji'){
                $column_order = array(null, 'gaji_cust','mtd_amt','mtd_unit'); 
                $column_search = array('gaji_cust'); 
                $order = array('gaji_cust' => 'asc'); 
                $this->db->select('gaji_cust,SUM(lending_amt) AS mtd_amt,COUNT(*) AS mtd_unit');
            }else if($type=='umur'){
                $column_order = array(null, 'umur_cust','mtd_amt','mtd_unit'); 
                $column_search = array('umur_cust'); 
                $order = array('umur_cust' => 'asc'); 
                $this->db->select('umur_cust,SUM(lending_amt) AS mtd_amt,COUNT(*) AS mtd_unit');
            }
            $this->db->from(''.$this->_table_agreement.'');
            $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
            $this->db->join($this->_table_pfs,$this->_table_pfs.'.id_profesi='.$this->_table_cst.'.id_profesi');
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
            if($type=='pekerjaan'){
                $this->db->group_by('tb_customer.id_profesi');
            }else if($type=='pendidikan'){
                $this->db->group_by('pendidikan_cust');
            }else if($type=='kecamatan'){
                $this->db->group_by('kecamatan_cust');
            }else if($type=='gaji'){
                $this->db->group_by('gaji_cust');
            }else if($type=='umur'){
                $this->db->group_by('umur_cust');
            }
        }else{
            return null;
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
        $this->_customer_segment($params,$type);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered($params,$type)
    {
        $this->_customer_segment($params,$type);
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