<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Cabang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    private $_table_pfm_so = "tb_pfm_so";
    private $_table_pfm_profit = "tb_pfm_profit";
    private $_table_pfm_dl = "tb_pfm_dealer";
    private $_table_pfm_ld = "tb_pfm_lending";
    private $_table_pfm_gp = "tb_pfm_gp";
    private $_table_pfm_armo = "tb_pfm_armo";
    private $_table_so = "tb_so";
    private $_table_dl = "tb_dealer";
    private $_table_kp = "tb_komponen";
    private $_table_cbg = "tb_cabang";
    private $_table_pic = "tb_pic";
    private $_table_prod = "tb_produk";
    private $_table_spv = "tb_spv";
    private $_table_agreement = "tb_agreement";
    private $_table_cst = "tb_customer";
    private $_table_jns = "tb_jenis";
    private $_table_bd = "tb_brand";
    private $_table_tp = "tb_tipe";
    private $_table_gp = "tb_gp";
    private $_table_epd = "tb_epd";
    private $_table_npl = "tb_npl";
    private $_table_tod = "tb_tod";
    private $_table_cwo = "tb_cwo";
    private $_table_armo = "tb_armo";
    private $_table_pfs ="tb_profesi";
    private $_table_history = "tb_history_asset";
    const SESSION_KEY = 'user_id';

    public function current_cabang()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $query = $this->db->get_where($this->_table_cbg , ['id_cabang' => $cabangUser]);
        return $query->row();
    }
    public function profit_cabang($id_komponen,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select(''.$this->_table_kp.'.`id_komponen`,komponen_profit');
        $this->db->from($this->_table_pfm_profit);
        $this->db->join($this->_table_kp,$this->_table_kp.'.id_komponen='.$this->_table_pfm_profit.'.id_komponen');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_profit.'.id_cabang');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_kp.'.`id_komponen` = '.$id_komponen);
        }else{
            return null;
        }
        $this->db->group_by('komponen_profit');
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function performa_so($id,$params,$is_graph)
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if(isset($id)&&$id!=''){
            $this->db->select(''.$this->_table_so.'.`id_so`,'.$this->_table_so.'.`nama_so`');
            $this->db->from($this->_table_so);
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_so.'.id_cabang');
            $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_so='.$this->_table_so.'.id_so');
            if($params == 'curr_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id);
            }else{
                return null;
            }
        }else{
            $this->db->select('YEAR(periode),MONTH(periode),SUM('.$this->_table_pfm_so.'.`pencapaian`) AS mtd_pencapaian,'.$this->_table_pfm_so.'.`target`,'.$this->_table_so.'.`nama_so`,'.$this->_table_spv.'.`nama_spv` AS nama_spv,((SUM('.$this->_table_pfm_so.'.`pencapaian`)-'.$this->_table_pfm_so.'.`target`)) AS diff, ROW_NUMBER() OVER(ORDER BY diff DESC) AS peringkat');
            $this->db->from($this->_table_pfm_so);
            $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_pfm_so.'.id_so');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_so.'.id_cabang');
            $this->db->join($this->_table_spv,$this->_table_spv.'.id_spv='.$this->_table_pfm_so.'.id_spv');
            if($params == 'curr_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
                $this->db->group_by('YEAR(`periode`),MONTH(`periode`),'.$this->_table_pfm_so.'.`id_so`');
            }else{
                return null;
            }
        }
        $query = $this->db->get();
        $this->db->cache_off();
        // return $query->row();
        return $query->result();
    }
    public function performa_lending($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select('`periode`,komitment,target,aktual,achv,gap,app_in,approved,purchase_order,golive,`lending`,totalepd,totaloverdue,totalnpl,totalcwo,(`aktual`)+(`purchase_order`) AS actpo,(`aktual`)+(`purchase_order`)+(`approved`) AS actpoapp');
        $this->db->from($this->_table_pfm_ld);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_ld.'.id_cabang');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
        }else if($params == 'today'){
            $this->db->where('DATE(periode) <= CURDATE() AND DATE(periode) >= CURDATE() - INTERVAL 1 DAY AND '.$this->_table_cbg.'.id_cabang = '.$cabangUser);
            $this->db->order_by("periode", "desc");
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function performa_dealer($id,$params,$is_graph){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if(!isset($params)&&!isset($id)){
            $this->db->select($this->_table_dl.'.nama_dealer,'.$this->_table_pic.'.nama_pic AS nama_pic, SUM('.$this->_table_pfm_dl.'.pencapaian) as pencapaian,'.$this->_table_pfm_dl.'.target,('.$this->_table_pfm_dl.'.pencapaian - '.$this->_table_pfm_dl.'.target) AS diff, ROW_NUMBER() OVER(ORDER BY diff DESC) AS peringkat');
            $this->db->from($this->_table_pfm_dl);
            $this->db->join($this->_table_dl,$this->_table_dl.'.id_dealer='.$this->_table_pfm_dl.'.id_dealer');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_dl.'.id_cabang');
            $this->db->join($this->_table_pic,$this->_table_pic.'.id_pic='.$this->_table_pfm_dl.'.id_pic');
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
            $this->db->group_by($this->_table_pfm_dl.'.id_dealer');
            $this->db->limit(10);
        }else{
            if(isset($id)&&$id!=''){
                $this->db->select(''.$this->_table_dl.'.id_dealer,'.$this->_table_dl.'.nama_dealer,'.$this->_table_dl.'.alamat AS alamat_dealer, '.$this->_table_dl.'.kota AS kota_dealer,
                '.$this->_table_dl.'.kecamatan AS kecamatan_dealer, '.$this->_table_dl.'.kelurahan AS kelurahan_dealer, '.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_pic.'.`nama_pic`,'.$this->_table_pic.'.`no_telp`,'.$this->_table_pic.'.`jabatan`');
                $this->db->from(''.$this->_table_dl.'');
                $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_dl.'.id_cabang');
                $this->db->join($this->_table_pic,$this->_table_pic.'.id_pic='.$this->_table_dl.'.id_pic');
                $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_dealer='.$this->_table_dl.'.id_dealer');
                if($params == 'curr_month'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_dl.'.`id_dealer` = '.$id);
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function performa_product($id,$params,$is_graph){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select(''.$this->_table_gp.'.id_gp,'.$this->_table_gp.'.gp');
        $this->db->from(''.$this->_table_gp.'');
        $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_gp='.$this->_table_gp.'.id_gp');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_gp.'.`id_gp` = '.$id);
            if($is_graph==true){
                $this->db->group_by('tgl_golive');
            }
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function history_assets($id,$params,$type,$is_graph){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if(isset($id)&&$id!=''){
            if($type=='tipe'){
                $this->db->select(''.$this->_table_tp.'.id_tipe,'.$this->_table_tp.'.tipe');
            }else if($type=='brand'){
                $this->db->select(''.$this->_table_bd.'.id_brand,'.$this->_table_bd.'.brand,'.$this->_table_bd.'.logo');
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
            }else{
                return null;
            }
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function epd_monitoring($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select('YEAR(`periode`),MONTH(`periode`),epd,SUM(target) AS target,SUM(account) AS account,SUM(persentasi) AS persentasi');
        $this->db->from(''.$this->_table_epd.'');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_epd.'.id_cabang');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) ');
            $this->db->group_by('epd');
        }else if($params == 'last_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) ');
            $this->db->group_by('epd');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year)) AND month(periode) = month(curdate()) ');
            $this->db->group_by('epd');
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function tod_monitoring($id,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if(isset($id)&&$id!=''){
            $this->db->select(''.$this->_table_agreement.'.`bucket_od`');
            $this->db->from($this->_table_agreement);
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
            if($params == 'curr_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.`bucket_od` = '.$id);
            }else{
                return null;
            }
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function performa_armo($id,$params,$is_graph)
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select(''.$this->_table_armo.'.`id_armo`,'.$this->_table_armo.'.`nama_armo`');
        $this->db->from($this->_table_agreement);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_armo.'.`id_armo` = '.$id);
            if($is_graph==true){
                $this->db->group_by('tgl_golive');
            }
        }else{
            return null;
        }
        $query = $this->db->get();
        // return $query->row();
        $this->db->cache_off();
        return $query->result();
    }
}
?>