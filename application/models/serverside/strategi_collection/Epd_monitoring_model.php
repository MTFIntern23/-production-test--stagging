<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Epd_monitoring_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_so = "tb_so";
    private $_table_cbg = "tb_cabang";
    private $_table_agreement = "tb_agreement";
    private $_table_cst = "tb_customer";
    private $_table_jns = "tb_jenis";
    private $_table_bd = "tb_brand";
    private $_table_armo = "tb_armo";
    private $_table_gp = "tb_gp";
    private $_table_pfs ="tb_profesi";
    const SESSION_KEY = 'user_id';
    var $table = 'tb_agreement';
    var $column_order = array(null, 'no_aplikasi','nama_cust','lending_amt','tgl_appin','tgl_golive','jenis','nama_so','nama_armo','epd'); 
    var $column_search = array('no_aplikasi','nama_cust','lending_amt','tgl_appin','tgl_golive','jenis','nama_so','nama_armo','epd'); 
    var $order = array('no_aplikasi' => 'desc'); 

    private function _epd_monitoring($params,$filter='',$subfilter=''){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select('no_aplikasi,nama_cust,lending_amt,tgl_appin,tgl_golive,jenis,nama_so,nama_armo,epd');
        $this->db->from(''.$this->_table_agreement.'');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
        $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
        $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
        $this->db->join($this->_table_jns,$this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
        $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
        $this->db->join($this->_table_pfs,$this->_table_pfs.'.id_profesi='.$this->_table_cst.'.id_profesi');
        $this->db->join($this->_table_gp,$this->_table_gp.'.id_gp='.$this->_table_agreement.'.id_gp');
        if($params == 'curr_month'){
            if(isset($subfilter)&&$subfilter!=''&&$subfilter!='null'){
                if($filter=='group_product'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.id_gp = '.$subfilter);
                }else if($filter=='jenis_asset'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.status_aset = '.$subfilter);
                }else if($filter=='so'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.id_so = '.$subfilter);
                }else if($filter=='jenis_customer'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.status_ro = '.$subfilter);
                }else if($filter=='jenis_pekerjaan'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_cst.'.id_profesi = '.$subfilter);
                }else if($filter=='dealer'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.id_dealer = '.$subfilter);
                }else if($filter=='armo'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.id_armo = '.$subfilter);
                }
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) ');
            }
        }else if($params == 'curr_year'){
            if(isset($subfilter)&&$subfilter!=''&&$subfilter!='null'){
                if($filter=='group_product'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_agreement.'.id_gp = '.$subfilter);
                }else if($filter=='jenis_asset'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_agreement.'.status_aset = '.$subfilter);
                }else if($filter=='so'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_agreement.'.id_so = '.$subfilter);
                }else if($filter=='jenis_customer'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_agreement.'.status_ro = '.$subfilter);
                }else if($filter=='jenis_pekerjaan'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_cst.'.id_profesi = '.$subfilter);
                }else if($filter=='dealer'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_agreement.'.id_dealer = '.$subfilter);
                }else if($filter=='armo'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_agreement.'.id_armo = '.$subfilter);
                }
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) ');
            }
        }else{
            return null;
        }
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
    function get_datatables($params,$filter='',$subfilter='')
    {
        $this->db->cache_on();
        $this->_epd_monitoring($params,$filter,$subfilter);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered($params,$filter='',$subfilter='')
    {
        $this->_epd_monitoring($params,$filter,$subfilter);
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