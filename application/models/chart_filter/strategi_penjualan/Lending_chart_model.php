<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lending_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_pfm_ld = "tb_pfm_lending";
    private $_table_cbg = "tb_cabang";
    const SESSION_KEY = 'user_id';
    public function lending_chart($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params == 'curr_year'){
            $this->db->select('YEAR(`periode`) AS year,
            MONTH(`periode`) AS month,
            (`komitment`) AS ytd_komitment,
            (`target`) AS ytd_target,
            SUM(`aktual`) AS ytd_aktual');
        }else if($params == 'last_year'){
            $this->db->select('YEAR(`periode`) AS year,
            MONTH(`periode`) AS month,
            SUM(`aktual`) AS ytd_aktual');
        }else{
            $this->db->select('`periode`,komitment,target,aktual');
        }
        $this->db->from($this->_table_pfm_ld);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_ld.'.id_cabang');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
            $this->db->group_by('YEAR(`periode`), MONTH(`periode`)');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
            $this->db->group_by('YEAR(`periode`), MONTH(`periode`)');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
        }else if($params == 'last_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>