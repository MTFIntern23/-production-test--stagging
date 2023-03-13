<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_detail_chart_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_cbg = "tb_cabang";
    private $_table_prod = "tb_produk";
    private $_table_agreement = "tb_agreement";
    private $_table_gp = "tb_gp";
    const SESSION_KEY = 'user_id';
    public function product_detail_chart($id,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params=='curr_year'||$params=='last_year'){
            $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,'.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) AS mtd_lending');
        }else{
            $this->db->select(''.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) AS mtd_lending');
        }
        $this->db->from(''.$this->_table_gp.'');
        $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_gp='.$this->_table_gp.'.id_gp');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_gp.'.`id_gp` = '.$id);
            $this->db->group_by('tgl_golive');
        }else if($params == 'last_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_gp.'.`id_gp` = '.$id);
            $this->db->group_by('tgl_golive');
        }else if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_gp.'.`id_gp` = '.$id);
            $this->db->group_by('MONTH(tgl_golive)');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_gp.'.`id_gp` = '.$id);
            $this->db->group_by('MONTH(tgl_golive)');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function get_product($id,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select('gp,produk,COUNT(produk)AS jml_produk');
        $this->db->from(''.$this->_table_agreement.'');
        $this->db->join($this->_table_prod,$this->_table_prod.'.id_produk='.$this->_table_agreement.'.id_produk');
        $this->db->join($this->_table_gp,$this->_table_gp.'.id_gp='.$this->_table_agreement.'.id_gp');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.id_gp ='.$id);
        }else if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_agreement.'.id_gp ='.$id);
        }else{
            return null;
        }
        $this->db->group_by('produk');
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>