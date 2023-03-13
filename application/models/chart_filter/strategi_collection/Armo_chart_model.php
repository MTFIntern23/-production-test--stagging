<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Armo_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_pfm_armo = "tb_pfm_armo";
    private $_table_cbg = "tb_cabang";
    private $_table_spv = "tb_spv";
    private $_table_agreement = "tb_agreement";
    private $_table_armo = "tb_armo";
    const SESSION_KEY = 'user_id';
    public function armo_chart($params,$filter='',$subfilter=''){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params == 'curr_year'||$params == 'last_year'||$params == 'curr_month'||$params == 'last_month'||$params == 'curr_month_inside'||$params == 'curr_month_outside'||$params == 'last_month_outside'||$params == 'last_month_inside'){
            $this->db->select('YEAR(`periode`),MONTH(periode),'.$this->_table_armo.'.`nama_armo`,COUNT(tgl_golive) as pencapaian,'.$this->_table_pfm_armo.'.target AS target');
        }else{
            return null;
        }
        $this->db->from($this->_table_agreement);
        $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
        $this->db->join($this->_table_pfm_armo,$this->_table_pfm_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_spv,$this->_table_spv.'.id_spv='.$this->_table_armo.'.id_spv');
        if($params == 'curr_month_inside'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_pfm_armo.'.periode = '.$this->_table_agreement.'.`tgl_golive` AND '.$this->_table_armo.'.id_cabang = '.$this->_table_cbg.'.`id_cabang`');
            $this->db->group_by('YEAR(`tgl_golive`),MONTH(`tgl_golive`),'.$this->_table_armo.'.`id_armo`');
        }else if($params == 'curr_month_outside'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_pfm_armo.'.periode = '.$this->_table_agreement.'.`tgl_golive` AND '.$this->_table_armo.'.id_cabang != '.$this->_table_cbg.'.`id_cabang`');
            $this->db->group_by('YEAR(`tgl_golive`),MONTH(`tgl_golive`),'.$this->_table_armo.'.`id_armo`');
        }else if($params == 'last_month_inside'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_pfm_armo.'.periode = '.$this->_table_agreement.'.`tgl_golive` AND '.$this->_table_armo.'.id_cabang = '.$this->_table_cbg.'.`id_cabang`');
            $this->db->group_by('YEAR(`tgl_golive`),MONTH(`tgl_golive`),'.$this->_table_armo.'.`id_armo`');
        }else if($params == 'last_month_outside'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_pfm_armo.'.periode = '.$this->_table_agreement.'.`tgl_golive` AND '.$this->_table_armo.'.id_cabang != '.$this->_table_cbg.'.`id_cabang`');
            $this->db->group_by('YEAR(`tgl_golive`),MONTH(`tgl_golive`),'.$this->_table_armo.'.`id_armo`');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>