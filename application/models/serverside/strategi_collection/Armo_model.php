<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Armo_model extends CI_Model{
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
    var $table = 'tb_agreement';
    var $column_order = array(null, 'nama_armo','nama_spv','pencapaian','target','persentasi',null); 
    var $column_search = array('nama_armo','nama_spv','pencapaian','target','persentasi'); 
    var $order = array('nama_armo' => 'asc'); 
    private function _armo(){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select('YEAR(`periode`),MONTH(periode),'.$this->_table_pfm_armo.'.`id_armo`,'.$this->_table_armo.'.`nama_armo`,'.$this->_table_armo.'.`id_cabang`,nama_spv,COUNT(tgl_golive) as pencapaian,'.$this->_table_pfm_armo.'.target AS target,(COUNT(tgl_golive)/target)*100 AS persentasi');
        $this->db->from($this->_table_agreement);
        $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
        $this->db->join($this->_table_pfm_armo,$this->_table_pfm_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_spv,$this->_table_spv.'.id_spv='.$this->_table_armo.'.id_spv');
        $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_pfm_armo.'.periode = '.$this->_table_agreement.'.`tgl_golive`');
        $this->db->group_by('YEAR(`tgl_golive`),MONTH(`tgl_golive`),'.$this->_table_armo.'.`id_armo`');
        $i = 0;
        foreach ($this->column_search as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->db->cache_on();
        $this->_armo();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_armo();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
?>