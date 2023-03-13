<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Epd_monitoring_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_epd = "tb_epd";
    const SESSION_KEY = 'user_id';
    public function epd_monitoring_chart($params,$filter='',$subfilter=''){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params=='curr_month_0' || $params == 'curr_month_1' || $params=='last_month_0' || $params == 'last_month_1'){
            $this->db->select('epd,target,account,persentasi,periode');
        }else{
            $this->db->select('YEAR(`periode`),MONTH(`periode`),epd,SUM(target) AS target,SUM(account) AS account,SUM(persentasi) AS persentasi,periode');
        }
        $this->db->from(''.$this->_table_epd.'');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_epd.'.id_cabang');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) ');
            $this->db->group_by('epd');
        }else if($params=='curr_month_0'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND epd ="0"');
        }else if($params == 'curr_month_1'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND epd ="1"');
        }else if($params == 'last_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) ');
                $this->db->group_by('epd');
        }else if($params=='last_month_0'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND epd ="0"');
        }else if($params == 'last_month_1'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND epd ="1"');
        }else if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) ');
                $this->db->group_by('epd');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year)) AND month(periode) = month(curdate()) ');
                $this->db->group_by('epd');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>