<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Armo_detail_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_armo = "tb_armo";
    const SESSION_KEY = 'user_id';
    public function armo_detail_chart($id,$params,$filter='',$subfilter=''){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params=='curr_year'||$params=='last_year'){
            $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,SUM('.$this->_table_agreement.'.`lending_amt`) as mtd_lending_amt,'.$this->_table_agreement.'.`tgl_golive`');
        }else{
            $this->db->select('SUM('.$this->_table_agreement.'.`lending_amt`) as mtd_lending_amt,'.$this->_table_agreement.'.`tgl_golive`');
        }
        $this->db->from($this->_table_agreement);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_armo.'.`id_armo` = '.$id);
                $this->db->group_by('MONTH(tgl_golive)');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_armo.'.`id_armo` = '.$id);
                $this->db->group_by('MONTH(tgl_golive)');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_armo.'.`id_armo` = '.$id);
                $this->db->group_by('tgl_golive');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>