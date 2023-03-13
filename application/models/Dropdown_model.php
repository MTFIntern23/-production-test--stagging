<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dropdown_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_so = "tb_so";
    private $_table_dl = "tb_dealer";
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_cst = "tb_customer";
    private $_table_jns = "tb_jenis";
    private $_table_bd = "tb_brand";
    private $_table_gp = "tb_gp";
    private $_table_armo = "tb_armo";
    private $_table_pfs ="tb_profesi";
    const SESSION_KEY = 'user_id';
    public function subFilters($params)
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params=='group_product'){
            $this->db->select('tb_agreement.`id_gp`,tb_gp.`gp`');
        }else if($params=='so'){
            $this->db->select('tb_agreement.`id_so`,tb_so.`nama_so`');
        }else if($params=='status_asset'){
            $this->db->select('tb_agreement.`status_aset`');
        }else if($params=='status_ro'){
            $this->db->select('tb_agreement.`status_ro`');
        }else if($params=='nama_cust'){
            $this->db->select('tb_agreement.`id_customer`,tb_customer.`nama_cust`');
        }else if($params=='profesi_cust'){
            $this->db->select('tb_agreement.`id_customer`,tb_customer.`id_profesi`,tb_profesi.`profesi` as profesi_cust');
        }else if($params=='dealer'||$params=='pareto'){
            $this->db->select('tb_agreement.`id_dealer`,tb_dealer.`nama_dealer`');
        }else if($params=='armo'){
            $this->db->select('tb_agreement.`id_armo`,tb_armo.`nama_armo`');
        }else{
            return null;
        }
        $this->db->from($this->_table_agreement);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_gp,$this->_table_gp.'.id_gp='.$this->_table_agreement.'.id_gp');
        $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
        $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
        $this->db->join($this->_table_pfs,$this->_table_pfs.'.id_profesi='.$this->_table_cst.'.id_profesi');
        $this->db->join($this->_table_dl,$this->_table_dl.'.id_dealer='.$this->_table_agreement.'.id_dealer');
        $this->db->join($this->_table_jns,$this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
        $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
        $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
        if($params=='pareto'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND '.$this->_table_dl.'.`pareto` = 1');
        }else{
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser);
        }
        if($params=='group_product'){
            $this->db->group_by('tb_agreement.`id_gp`');
        }else if($params=='so'){
            $this->db->group_by('tb_agreement.`id_so`');
        }else if($params=='status_asset'){
            $this->db->group_by('tb_agreement.`status_aset`');
        }else if($params=='status_ro'){
            $this->db->group_by('tb_agreement.`status_ro`');
        }else if($params=='nama_cust'){
            $this->db->group_by('tb_agreement.`id_customer`');
        }else if($params=='profesi_cust'){
            $this->db->group_by('tb_customer.`id_profesi`');
        }else if($params=='dealer'||$params=='pareto'){
            $this->db->group_by('tb_agreement.`id_dealer`');
        }
        else if($params=='armo'){
            $this->db->group_by('tb_agreement.`id_armo`');
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
?>