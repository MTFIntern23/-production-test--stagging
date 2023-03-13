<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profit_chart_detail_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_pfm_profit = "tb_pfm_profit";
    private $_table_kp = "tb_komponen";
    private $_table_cbg = "tb_cabang";
    const SESSION_KEY = 'user_id';
    public function profit_detail_chart($id_komponen,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select('YEAR(periode) AS year,MONTH(periode)as month, komponen_profit,SUM(profit) AS profit');
        $this->db->from($this->_table_pfm_profit);
        $this->db->join($this->_table_kp,$this->_table_kp.'.id_komponen='.$this->_table_pfm_profit.'.id_komponen');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_profit.'.id_cabang');
        if($params == 'curr_year_val'){
            if(!isset($id_komponen)||$id_komponen==''){
                return null;
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_kp.'.`id_komponen` = '.$id_komponen);
            }
        }else if($params == 'last_year_val'){
            if(!isset($id_komponen)||$id_komponen==''){
                return null;
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_kp.'.`id_komponen` = '.$id_komponen);
            }
        }else{
            return null;
        }
        $this->db->group_by('YEAR(periode),MONTH(periode)');
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>