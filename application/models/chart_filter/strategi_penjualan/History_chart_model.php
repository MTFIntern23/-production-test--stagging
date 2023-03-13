<?php
defined('BASEPATH') or exit('No direct script access allowed');
class History_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_bd = "tb_brand";
    private $_table_tp = "tb_tipe";
    const SESSION_KEY = 'user_id';
    public function history_chart($params,$type){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($type=='tipe'){
            $this->db->select(''.$this->_table_tp.'.id_tipe,'.$this->_table_tp.'.tipe,SUM(lending_amt) as mtd_amt,COUNT(*) as mtd_unit');
        }else if($type=='brand'){
            $this->db->select(''.$this->_table_bd.'.id_brand,'.$this->_table_bd.'.brand,SUM(lending_amt) as mtd_amt,COUNT(*) as mtd_unit');
        }
        $this->db->from(''.$this->_table_agreement.'');
        $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
        $this->db->join($this->_table_tp,$this->_table_tp.'.id_tipe='.$this->_table_agreement.'.id_tipe');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
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
        if($type=='tipe'){
            $this->db->group_by('id_tipe');
        }else if($type=='brand'){
            $this->db->group_by('id_brand');
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>