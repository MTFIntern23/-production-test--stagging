<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dealer_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_dl = "tb_dealer";
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    const SESSION_KEY = 'user_id';
    public function dealer_chart($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select(''.$this->_table_dl.'.nama_dealer,SUM(lending_amt) as mtd_amt');
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
        $this->db->group_by($this->_table_dl.'.id_dealer');
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>