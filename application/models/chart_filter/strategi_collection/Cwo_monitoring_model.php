<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cwo_monitoring_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_cwo = "tb_cwo";
    const SESSION_KEY = 'user_id';
    public function cwo_monitoring_chart($params,$filter='',$subfilter=''){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select('YEAR(periode) as year, MONTH(periode) as month,'.$this->_table_cwo.'.persentasi as ytd_persentasi');
        $this->db->from($this->_table_cwo);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_cwo.'.id_cabang');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%01-01") AND NOW()) AND DAY(periode) = DATE_FORMAT(LAST_DAY(periode), "%d")');
            $this->db->group_by('periode');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year)) AND DAY(periode) = DATE_FORMAT(LAST_DAY(periode), "%d")');
            $this->db->group_by('periode');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())  AND DAY(periode) = DAY(CURDATE())');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>