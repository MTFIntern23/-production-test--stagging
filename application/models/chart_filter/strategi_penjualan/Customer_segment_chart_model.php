<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Customer_segment_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_cst = "tb_customer";
    private $_table_pfs ="tb_profesi";
    const SESSION_KEY = 'user_id';
    public function customer_segment_chart($params,$type){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if(isset($params)){
            if($type=='pekerjaan'){
                $this->db->select(''.$this->_table_pfs.'.profesi as profesi_cust,SUM(lending_amt) AS mtd_amt, COUNT('.$this->_table_pfs.'.profesi) as total');
            }else if($type=='pendidikan'){
                $this->db->select('pendidikan_cust,SUM(lending_amt) AS mtd_amt, COUNT(pendidikan_cust) as total');
            }else if($type=='kecamatan'){
                $this->db->select('kecamatan_cust,SUM(lending_amt) AS mtd_amt, COUNT(kecamatan_cust) as total');
            }else if($type=='gaji'){
                $this->db->select('gaji_cust,SUM(lending_amt) AS mtd_amt, COUNT(gaji_cust) as total');
            }else if($type=='umur'){
                $this->db->select('umur_cust,SUM(lending_amt) AS mtd_amt, COUNT(umur_cust) as total');
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
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>