<?php
defined('BASEPATH') or exit('No direct script access allowed');
class History_chart_detail_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_bd = "tb_brand";
    private $_table_tp = "tb_tipe";
    const SESSION_KEY = 'user_id';
    public function history_detail_chart($id,$params,$type){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params=='curr_year'||$params=='last_year'){
            $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending');
        }else{
            $this->db->select(''.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending');
        }
        if($type=='tipe'){
            $this->db->from(''.$this->_table_tp.'');
            $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_tipe='.$this->_table_tp.'.id_tipe');
        }else if($type=='brand'){
            $this->db->from(''.$this->_table_bd.'');
            $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_brand='.$this->_table_bd.'.id_brand');
        }
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        if($params == 'curr_month'){
            if($type=='tipe'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
            }else if($type=='brand'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_bd.'.`id_brand` = '.$id);
            }
                $this->db->group_by('tgl_golive');
        }else if($params == 'last_month'){
            if($type=='tipe'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
            }else if($type=='brand'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_bd.'.`id_brand` = '.$id);
            }
                $this->db->group_by('tgl_golive');
        }else if($params == 'curr_year'){
            if($type=='tipe'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
            }else if($type=='brand'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_bd.'.`id_brand` = '.$id);
            }
                $this->db->group_by('MONTH(tgl_golive)');
        }else if($params == 'last_year'){
            if($type=='tipe'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
            }else if($type=='brand'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_bd.'.`id_brand` = '.$id);
            }
                $this->db->group_by('MONTH(tgl_golive)');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>