<?php
defined('BASEPATH') or exit('No direct script access allowed');
class So_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_pfm_so = "tb_pfm_so";
    private $_table_so = "tb_so";
    private $_table_cbg = "tb_cabang";
    const SESSION_KEY = 'user_id';
    public function so_chart($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params == 'curr_year'||$params == 'last_year'){
            $this->db->select('YEAR(periode),SUM('.$this->_table_pfm_so.'.`pencapaian`) AS mtd_pencapaian, SUM(CASE WHEN DAY('.$this->_table_pfm_so.'.`periode`) = 1 THEN '.$this->_table_pfm_so.'.target END) AS target,'.$this->_table_so.'.`nama_so`');
        }else if($params == 'curr_month'||$params == 'last_month'){
            $this->db->select('YEAR(periode),MONTH(periode),SUM('.$this->_table_pfm_so.'.`pencapaian`) AS mtd_pencapaian,'.$this->_table_pfm_so.'.`target`,'.$this->_table_so.'.`nama_so`');
        }
        $this->db->from($this->_table_pfm_so);
        $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_pfm_so.'.id_so');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_so.'.id_cabang');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%01-01") AND NOW())');
            $this->db->group_by('YEAR(`periode`),'.$this->_table_pfm_so.'.`id_so`');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
            $this->db->group_by('YEAR(`periode`),'.$this->_table_pfm_so.'.`id_so`');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
            $this->db->group_by('YEAR(`periode`),MONTH(`periode`),'.$this->_table_pfm_so.'.`id_so`');
        }else if($params == 'last_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
            $this->db->group_by('YEAR(`periode`),MONTH(`periode`),'.$this->_table_pfm_so.'.`id_so`');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>