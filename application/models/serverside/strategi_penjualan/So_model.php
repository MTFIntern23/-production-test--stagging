<?php
defined('BASEPATH') or exit('No direct script access allowed');
class So_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_pfm_so = "tb_pfm_so";
    private $_table_so = "tb_so";
    private $_table_cbg = "tb_cabang";
    private $_table_spv = "tb_spv";
    const SESSION_KEY = 'user_id';
    var $table = 'tb_pfm_so';
    var $column_order = array(null, 'nama_so','nama_spv','mtd_pencapaian','target','mtd_lending','mtd_persentasi',null); 
    var $column_search = array('nama_so','nama_spv'); 
    var $order = array('nama_so' => 'asc'); 
    private function _so($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        if($params == 'curr_year'){
            $this->db->select('YEAR(periode),'.$this->_table_pfm_so.'.`id_so`,SUM('.$this->_table_pfm_so.'.`pencapaian`) AS mtd_pencapaian, SUM(CASE WHEN DAY('.$this->_table_pfm_so.'.`periode`) = 1 THEN '.$this->_table_pfm_so.'.target END) AS target,SUM('.$this->_table_pfm_so.'.`lending`) AS mtd_lending,FORMAT(((SUM('.$this->_table_pfm_so.'.`pencapaian`)/ SUM(CASE WHEN DAY('.$this->_table_pfm_so.'.`periode`) = 1 THEN '.$this->_table_pfm_so.'.target END))*100),0) AS mtd_persentasi,'.$this->_table_so.'.`nama_so`,'.$this->_table_spv.'.`nama_spv`');
        }else if($params == 'curr_month'){
            $this->db->select('YEAR(periode),MONTH(periode),'.$this->_table_pfm_so.'.`id_so`,SUM('.$this->_table_pfm_so.'.`pencapaian`) AS mtd_pencapaian,'.$this->_table_pfm_so.'.`target`,SUM('.$this->_table_pfm_so.'.`lending`) AS mtd_lending,FORMAT(((SUM('.$this->_table_pfm_so.'.`pencapaian`)/'.$this->_table_pfm_so.'.`target`)*100),0) AS mtd_persentasi,'.$this->_table_so.'.`nama_so`,'.$this->_table_spv.'.`nama_spv`');
        }
        $this->db->from($this->_table_pfm_so);
        $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_pfm_so.'.id_so');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_so.'.id_cabang');
        $this->db->join($this->_table_spv,$this->_table_spv.'.id_spv='.$this->_table_pfm_so.'.id_spv');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%01-01") AND NOW())');
            $this->db->group_by('YEAR(`periode`),`id_so`');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
            $this->db->group_by('YEAR(`periode`),`id_so`');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
            $this->db->group_by('YEAR(`periode`),MONTH(`periode`),`id_so`');
        }else if($params == 'last_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
            $this->db->group_by('YEAR(`periode`),MONTH(`periode`),`id_so`');
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
    function get_datatables($params)
    {
        $this->db->cache_on();
        $this->_so($params);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    function count_filtered($params)
    {
        $this->_so($params);
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