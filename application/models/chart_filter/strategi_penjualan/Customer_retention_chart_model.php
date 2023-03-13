<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Customer_retention_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_cst = "tb_customer";
    const SESSION_KEY = 'user_id';
    public function customer_retention_chart($params,$is_ro){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params=='curr_year'||$params=='last_year'){
            $this->db->select('YEAR(tgl_golive) AS year,MONTH(tgl_golive) AS month,SUM(lending_amt) AS mtd_amt');
        }else{
            $this->db->select('tgl_golive,SUM(lending_amt) AS mtd_amt');
        }
        $this->db->from(''.$this->_table_agreement.'');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        if($params == 'curr_month'){
            if($is_ro=='1'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND status_ro ="1"');
            }else if($is_ro=='0'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND status_ro ="0"');
            }
            $this->db->group_by('tgl_golive');
        }else if($params == 'last_month'){
            if($is_ro=='1'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND status_ro ="1"');
            }else if($is_ro=='0'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND status_ro ="0"');
            }
            $this->db->group_by('tgl_golive');
        }else if($params == 'curr_year'){
            if($is_ro=='1'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND status_ro ="1"');
            }else if($is_ro=='0'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND status_ro ="0"');
            }
            $this->db->group_by('MONTH(tgl_golive)');
        }else if($params == 'last_year'){
            if($is_ro=='1'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND status_ro ="1"');
            }else if($is_ro=='0'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND status_ro ="0"');
            }
            $this->db->group_by('MONTH(tgl_golive)');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function get_ro($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select(''.$this->_table_cst.'.id_customer,'.$this->_table_cst.'.nama_cust,MAX(status_ro) as status_ro');
        $this->db->from(''.$this->_table_agreement.'');
        $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
        }else if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
        }else{
            return null;
        }
        $this->db->group_by(''.$this->_table_cst.'.id_customer');
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>