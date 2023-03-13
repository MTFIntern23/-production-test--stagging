<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tod_monitoring_detail_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    const SESSION_KEY = 'user_id';
    public function tod_monitoring_chart($id,$params,$filter='',$subfilter=''){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params=='curr_year'||$params=='last_year'){
            $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,SUM('.$this->_table_agreement.'.`osp`) as mtd_osp');
        }else{
            $this->db->select('SUM('.$this->_table_agreement.'.`osp`) as mtd_osp,'.$this->_table_agreement.'.`tgl_golive`');
        }
        $this->db->from($this->_table_agreement);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_agreement.'.`bucket_od` = '.$id);
            $this->db->group_by('MONTH(tgl_golive)');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_agreement.'.`bucket_od` = '.$id);
            $this->db->group_by('MONTH(tgl_golive)');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.`bucket_od` = '.$id);
            $this->db->group_by('tgl_golive');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function get_bucketod($id,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if(isset($id)&&$id!=''){
            return null;
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>