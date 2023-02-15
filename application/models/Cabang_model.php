<?php 
class Cabang_model extends CI_Model
{
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
        if($params == 'curr_year_val'||$params == 'last_year_val'){
            $this->db->select('YEAR(periode) AS year,MONTH(periode)as month,id_pfm_profit,'.$this->_table_cbg.'.id_cabang,'.$this->_table_kp.'.`id_komponen`,komponen_profit,SUM(profit) AS profit,SUM(profit_v2) profit_v2,SUM(sim_profit) sim_profit');
        }else{
            $this->db->select('id_pfm_profit,'.$this->_table_cbg.'.id_cabang,'.$this->_table_kp.'.`id_komponen`,komponen_profit,SUM(profit) AS profit,SUM(profit_v2) profit_v2,SUM(sim_profit) sim_profit');
        }
        $this->db->from($this->_table_pfm_profit);
        $this->db->join($this->_table_kp,$this->_table_kp.'.id_komponen='.$this->_table_pfm_profit.'.id_komponen');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_profit.'.id_cabang');
        if($params == 'curr_month'){
            if(!isset($id_komponen)||$id_komponen==''){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_kp.'.`id_komponen` = '.$id_komponen);
            }
        }else if($params == 'last_month'){
            if(!isset($id_komponen)||$id_komponen==''){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_kp.'.`id_komponen` = '.$id_komponen);
            }
        }else if($params == 'curr_year'||$params == 'curr_year_val'){
            if(!isset($id_komponen)||$id_komponen==''){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_kp.'.`id_komponen` = '.$id_komponen);
            }
        }else if($params == 'last_year'||$params == 'last_year_val'){
            if(!isset($id_komponen)||$id_komponen==''){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_kp.'.`id_komponen` = '.$id_komponen);
            }
        }else if($params == 'curr_year_val_2'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) and month(periode) = month(curdate())');
        }else if($params == 'last_year_val_2'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year)) and month(periode) = month(curdate())');
        }else{
            return null;
        }
        if($params == 'curr_year_val'||$params == 'last_year_val'){
            $this->db->group_by('YEAR(periode),MONTH(periode)');
        }else{
            $this->db->group_by('komponen_profit');
        }
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
            if($is_graph==true){
                if($params=='curr_year'||$params=='last_year'){
                    $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_so.'.`id_so`,'.$this->_table_cbg.'.`id_cabang`,'.$this->_table_bd.'.`id_brand`,'.$this->_table_jns.'.`id_jenis`,'.$this->_table_so.'.`nama_so`,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,SUM('.$this->_table_agreement.'.`lending_amt`) as mtd_lending_amt,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_bd.'.`brand`,'.$this->_table_jns.'.`jenis`,'.$this->_table_dl.'.`nama_dealer`');
                }else{
                    $this->db->select(''.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_so.'.`id_so`,'.$this->_table_cbg.'.`id_cabang`,'.$this->_table_bd.'.`id_brand`,'.$this->_table_jns.'.`id_jenis`,'.$this->_table_so.'.`nama_so`,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,SUM('.$this->_table_agreement.'.`lending_amt`) as mtd_lending_amt,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_bd.'.`brand`,'.$this->_table_jns.'.`jenis`,'.$this->_table_dl.'.`nama_dealer`');
                }
            }else{
                $this->db->select(''.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_so.'.`id_so`,'.$this->_table_cbg.'.`id_cabang`,'.$this->_table_bd.'.`id_brand`,'.$this->_table_jns.'.`id_jenis`,'.$this->_table_so.'.`nama_so`,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,'.$this->_table_agreement.'.`lending_amt`,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_bd.'.`brand`,'.$this->_table_jns.'.`jenis`,'.$this->_table_dl.'.`nama_dealer`');
            }
            $this->db->from($this->_table_so);
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_so.'.id_cabang');
            $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_so='.$this->_table_so.'.id_so');
            $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
            $this->db->join($this->_table_dl,$this->_table_dl.'.id_dealer='.$this->_table_agreement.'.id_dealer');
            $this->db->join($this->_table_jns,$this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
            $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
            if($params == 'curr_year'){
                //get all days (1st month to curr month) of current year
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
                }
            }else if($params == 'last_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_so.'.`id_so` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
                }
            }else if($params == 'curr_month'){
                //get all days (1st day to curr day) of current month
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('tgl_golive');
                }
            }else{
                return null;
            }
        }else{
            if($params == 'curr_year'||$params == 'last_year'){
                $this->db->select('YEAR(periode),'.$this->_table_pfm_so.'.`id_pfm_so`,'.$this->_table_pfm_so.'.`id_so`,'.$this->_table_pfm_so.'.`id_cabang`,'.$this->_table_pfm_so.'.`id_spv`,SUM('.$this->_table_pfm_so.'.`pencapaian`) AS ytd_pencapaian, SUM(CASE WHEN DAY('.$this->_table_pfm_so.'.`periode`) = 1 THEN '.$this->_table_pfm_so.'.target END) AS ytd_target,SUM('.$this->_table_pfm_so.'.`lending`) AS ytd_lending,FORMAT(((SUM('.$this->_table_pfm_so.'.`pencapaian`)/ SUM(CASE WHEN DAY('.$this->_table_pfm_so.'.`periode`) = 1 THEN '.$this->_table_pfm_so.'.target END))*100),0) AS ytd_persentasi,'.$this->_table_so.'.`nama_so`,'.$this->_table_spv.'.`nama_spv` AS nama_spv,'.$this->_table_cbg.'.`nama_cabang` AS nama_cabang,'.$this->_table_cbg.'.`lokasi` AS lokasi_cabang,((SUM('.$this->_table_pfm_so.'.`pencapaian`)-'.$this->_table_pfm_so.'.`target`)) AS diff, ROW_NUMBER() OVER(ORDER BY diff DESC) AS peringkat');
            }else if($params == 'curr_month'||$params=='last_month'){
                $this->db->select('YEAR(periode),MONTH(periode),'.$this->_table_pfm_so.'.`id_pfm_so`,'.$this->_table_pfm_so.'.`id_so`,'.$this->_table_pfm_so.'.`id_cabang`,'.$this->_table_pfm_so.'.`id_spv`,SUM('.$this->_table_pfm_so.'.`pencapaian`) AS mtd_pencapaian,'.$this->_table_pfm_so.'.`target`,SUM('.$this->_table_pfm_so.'.`lending`) AS mtd_lending,FORMAT(((SUM('.$this->_table_pfm_so.'.`pencapaian`)/'.$this->_table_pfm_so.'.`target`)*100),0) AS mtd_persentasi,'.$this->_table_so.'.`nama_so`,'.$this->_table_spv.'.`nama_spv` AS nama_spv,'.$this->_table_cbg.'.`nama_cabang` AS nama_cabang,'.$this->_table_cbg.'.`lokasi` AS lokasi_cabang,((SUM('.$this->_table_pfm_so.'.`pencapaian`)-'.$this->_table_pfm_so.'.`target`)) AS diff, ROW_NUMBER() OVER(ORDER BY diff DESC) AS peringkat');
            }else{
                $this->db->select('*');
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
        if($params == 'curr_year'|| $params == 'last_year'){
            $this->db->select('YEAR(`periode`) AS year,
            MONTH(`periode`) AS month,
            COUNT(*) AS total_Rows,
            (`komitment`) AS ytd_komitment,
            (`target`) AS ytd_target,
            SUM(`aktual`) AS ytd_aktual,
            (SUM(`aktual`)/SUM(`target`))*100 AS ytd_achv,
            ABS(SUM(`aktual`)-SUM(`target`)) AS ytd_gap,
            SUM(`app_in`) AS ytd_appin,
            SUM(`approved`) AS ytd_approved,
            SUM(`purchase_order`) AS ytd_po,
            SUM(`golive`) AS ytd_golive,
            SUM(`aktual`)+SUM(`purchase_order`) AS ytd_actpo,
            SUM(`aktual`)+SUM(`purchase_order`)+SUM(`approved`) AS ytd_actpoapp');
        }else{
            $this->db->select('*');
        }
        $this->db->from($this->_table_pfm_ld);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_ld.'.id_cabang');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
            $this->db->group_by('YEAR(`periode`), MONTH(`periode`)');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
            $this->db->group_by('YEAR(`periode`), MONTH(`periode`)');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
        }else if($params == 'last_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
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
            $this->db->select($this->_table_pfm_dl.'.id_pfm_dealer,'.$this->_table_pfm_dl.'.id_dealer,'.$this->_table_pfm_dl.'.id_cabang,'.$this->_table_pfm_dl.'.id_pic,'.$this->_table_cbg.'.nama_cabang AS nama_cabang,'.$this->_table_cbg.'.lokasi AS lokasi_cabang,'.$this->_table_dl.'.nama_dealer,'.$this->_table_pic.'.nama_pic AS nama_pic, SUM('.$this->_table_pfm_dl.'.pencapaian) as pencapaian,'.$this->_table_pfm_dl.'.target,'.$this->_table_pfm_dl.'.periode,('.$this->_table_pfm_dl.'.pencapaian - '.$this->_table_pfm_dl.'.target) AS diff, ROW_NUMBER() OVER(ORDER BY diff DESC) AS peringkat');
            $this->db->from($this->_table_pfm_dl);
            $this->db->join($this->_table_dl,$this->_table_dl.'.id_dealer='.$this->_table_pfm_dl.'.id_dealer');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_dl.'.id_cabang');
            $this->db->join($this->_table_pic,$this->_table_pic.'.id_pic='.$this->_table_pfm_dl.'.id_pic');
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
            $this->db->group_by('id_dealer');
            $this->db->limit(10);
        }else{
            if(!isset($id)&&isset($params)){
                $this->db->select(''.$this->_table_dl.'.id_dealer,'.$this->_table_dl.'.nama_dealer,SUM(lending_amt) as mtd_amt,COUNT(*) as mtd_unit');
                $this->db->from(''.$this->_table_dl.'');
                $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_dl.'.id_cabang');
                $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_dealer='.$this->_table_dl.'.id_dealer');
                if($params == 'curr_month'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
                }else if($params == 'last_month'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
                }else if($params == 'curr_year'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
                }else if($params == 'last_year'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year))');
                }else{
                    return null;
                }
                $this->db->group_by('id_dealer');
            }else if(isset($id)&&$id!=''){
                if($is_graph==true){
                    if($params=='curr_year'||$params=='last_year'){
                        $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,'.$this->_table_dl.'.id_dealer,'.$this->_table_dl.'.nama_dealer,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_pic.'.`nama_pic`,
                        '.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending, '.$this->_table_cst.'.`nama_cust`,'.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis` ,'.$this->_table_bd.'.`brand`');
                    }else{
                        $this->db->select(''.$this->_table_dl.'.id_dealer,'.$this->_table_dl.'.nama_dealer,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_pic.'.`nama_pic`,
                        '.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending, '.$this->_table_cst.'.`nama_cust`,'.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis` ,'.$this->_table_bd.'.`brand`');
                    }
                }else{
                    $this->db->select(''.$this->_table_dl.'.id_dealer,'.$this->_table_dl.'.id_cabang,'.$this->_table_dl.'.id_pic,'.$this->_table_agreement.'.id_customer,
                    '.$this->_table_agreement.'.id_tipe,'.$this->_table_agreement.'.id_so,'.$this->_table_dl.'.nama_dealer,'.$this->_table_dl.'.alamat AS alamat_dealer, '.$this->_table_dl.'.kota AS kota_dealer,
                    '.$this->_table_dl.'.kecamatan AS kecamatan_dealer, '.$this->_table_dl.'.kelurahan AS kelurahan_dealer, '.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_pic.'.`nama_pic`,'.$this->_table_pic.'.`no_telp`,'.$this->_table_pic.'.`jabatan`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_agreement.'.`lending_amt`, '.$this->_table_cst.'.`nama_cust`,'.$this->_table_cst.'.`kecamatan_cust`,'.$this->_table_cst.'.`pendidikan_cust`,'.$this->_table_cst.'.`profesi_cust`,'.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis`,'.$this->_table_bd.'.`brand`');
                }
                $this->db->from(''.$this->_table_dl.'');
                $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_dl.'.id_cabang');
                $this->db->join($this->_table_pic,$this->_table_pic.'.id_pic='.$this->_table_dl.'.id_pic');
                $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_dealer='.$this->_table_dl.'.id_dealer');
                $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
                $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
                $this->db->join($this->_table_jns,$this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
                $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
                if($params == 'curr_month'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_dl.'.`id_dealer` = '.$id);
                    if($is_graph==true){
                        $this->db->group_by('tgl_golive');
                    }
                }else if($params == 'last_month'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_dl.'.`id_dealer` = '.$id);
                    if($is_graph==true){
                        $this->db->group_by('tgl_golive');
                    }
                }else if($params == 'curr_year'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_dl.'.`id_dealer` = '.$id);
                    if($is_graph==true){
                        $this->db->group_by('MONTH(tgl_golive)');
                    }
                }else if($params == 'last_year'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_dl.'.`id_dealer` = '.$id);
                    if($is_graph==true){
                        $this->db->group_by('MONTH(tgl_golive)');
                    }
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
        if(!isset($id)&&isset($params)){
            $this->db->select(''.$this->_table_gp.'.id_gp,'.$this->_table_gp.'.gp,SUM(lending_amt) as mtd_amt,COUNT(*) as mtd_unit');
            $this->db->from(''.$this->_table_agreement.'');
            $this->db->join($this->_table_gp,$this->_table_gp.'.id_gp='.$this->_table_agreement.'.id_gp');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
            if($params == 'curr_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
            }else if($params == 'last_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
            }else if($params == 'curr_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
            }else if($params == 'last_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year))');
            }else{
                return null;
            }
            $this->db->group_by('id_gp');
        }else if(isset($id)&&$id!=''){
            if($is_graph==true){
                if($params=='curr_year'||$params=='last_year'){
                    $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,'.$this->_table_gp.'.id_gp,'.$this->_table_gp.'.gp,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending, '.$this->_table_so.'.`nama_so`,'.$this->_table_prod.'.`produk`,'.$this->_table_prod.'.`deskripsi`,'.$this->_table_jns.'.`jenis` ,'.$this->_table_bd.'.`brand`');
                }else{
                    $this->db->select(''.$this->_table_gp.'.id_gp,'.$this->_table_gp.'.gp,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending, '.$this->_table_so.'.`nama_so`,'.$this->_table_prod.'.`produk`,'.$this->_table_prod.'.`deskripsi`,'.$this->_table_jns.'.`jenis` ,'.$this->_table_bd.'.`brand`');
                }
            }else{
                $this->db->select(''.$this->_table_gp.'.id_gp,'.$this->_table_agreement.'.id_customer,
                '.$this->_table_agreement.'.id_tipe,'.$this->_table_agreement.'.id_so,'.$this->_table_gp.'.gp,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_agreement.'.`lending_amt`, '.$this->_table_so.'.`nama_so`,'.$this->_table_prod.'.`produk`,'.$this->_table_prod.'.`deskripsi`,'.$this->_table_jns.'.`jenis`,'.$this->_table_bd.'.`brand`');
            }
            $this->db->from(''.$this->_table_gp.'');
            $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_gp='.$this->_table_gp.'.id_gp');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
            $this->db->join($this->_table_prod,$this->_table_prod.'.id_produk='.$this->_table_agreement.'.id_produk');
            $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
            $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
            $this->db->join($this->_table_jns,$this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
            $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
            if($params == 'curr_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_gp.'.`id_gp` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('tgl_golive');
                }
            }else if($params == 'last_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_gp.'.`id_gp` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('tgl_golive');
                }
            }else if($params == 'curr_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_gp.'.`id_gp` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
                }
            }else if($params == 'last_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_gp.'.`id_gp` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
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
    public function history_assets($id,$params,$type,$is_graph){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if(!isset($id)&&isset($params)){
            if($type=='tipe'){
                $this->db->select(''.$this->_table_tp.'.id_tipe,'.$this->_table_tp.'.tipe,SUM(lending_amt) as mtd_amt,COUNT(*) as mtd_unit');
            }else if($type=='brand'){
                $this->db->select(''.$this->_table_bd.'.id_brand,'.$this->_table_bd.'.brand,SUM(lending_amt) as mtd_amt,COUNT(*) as mtd_unit');
            }
            $this->db->from(''.$this->_table_agreement.'');
            $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
            $this->db->join($this->_table_tp,$this->_table_tp.'.id_tipe='.$this->_table_agreement.'.id_tipe');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
            if($params == 'curr_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
            }else if($params == 'last_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
            }else if($params == 'curr_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
            }else if($params == 'last_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year))');
            }else{
                return null;
            }
            if($type=='tipe'){
                $this->db->group_by('id_tipe');
            }else if($type=='brand'){
                $this->db->group_by('id_brand');
            }
        }else if(isset($id)&&$id!=''){
            if($is_graph==true){
                if($params=='curr_year'||$params=='last_year'){
                    if($type=='tipe'){
                        $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,'.$this->_table_tp.'.id_tipe,'.$this->_table_tp.'.tipe,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending, '.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis` ,'.$this->_table_bd.'.`brand`');
                    }else if($type=='brand'){
                        $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,'.$this->_table_bd.'.id_brand,'.$this->_table_bd.'.brand,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending, '.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis`');
                    }
                }else{
                    if($type=='tipe'){
                        $this->db->select(''.$this->_table_tp.'.id_tipe,'.$this->_table_tp.'.tipe,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending, '.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis` ,'.$this->_table_bd.'.`brand`');
                    }else if($type=='brand'){
                        $this->db->select(''.$this->_table_bd.'.id_brand,'.$this->_table_bd.'.brand,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,SUM('.$this->_table_agreement.'.`lending_amt`) mtd_lending, '.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis`');
                    }
                }
            }else{
                if($type=='tipe'){
                    $this->db->select(''.$this->_table_tp.'.id_tipe,'.$this->_table_agreement.'.id_customer,
                    '.$this->_table_agreement.'.id_brand,'.$this->_table_agreement.'.id_so,'.$this->_table_tp.'.tipe,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_agreement.'.`lending_amt`, '.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis`,'.$this->_table_bd.'.`brand`');
                }else if($type=='brand'){
                    $this->db->select(''.$this->_table_bd.'.id_brand,'.$this->_table_agreement.'.id_customer,
                    '.$this->_table_agreement.'.id_tipe,'.$this->_table_agreement.'.id_so,'.$this->_table_bd.'.brand,'.$this->_table_bd.'.logo,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`tgl_appin`, '.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_agreement.'.`lending_amt`, '.$this->_table_so.'.`nama_so`,'.$this->_table_jns.'.`jenis`');
                }
            }
            if($type=='tipe'){
                $this->db->from(''.$this->_table_tp.'');
                $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_tipe='.$this->_table_tp.'.id_tipe');
                $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
            }else if($type=='brand'){
                $this->db->from(''.$this->_table_bd.'');
                $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_brand='.$this->_table_bd.'.id_brand');
            }
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
            $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
            $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
            $this->db->join($this->_table_jns,$this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
            if($params == 'curr_month'){
                if($type=='tipe'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
                }else if($type=='brand'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_bd.'.`id_brand` = '.$id);
                }
                if($is_graph==true){
                    $this->db->group_by('tgl_golive');
                }
            }else if($params == 'last_month'){
                if($type=='tipe'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
                }else if($type=='brand'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND '.$this->_table_bd.'.`id_brand` = '.$id);
                }
                if($is_graph==true){
                    $this->db->group_by('tgl_golive');
                }
            }else if($params == 'curr_year'){
                if($type=='tipe'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
                }else if($type=='brand'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_bd.'.`id_brand` = '.$id);
                }
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
                }
            }else if($params == 'last_year'){
                if($type=='tipe'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_tp.'.`id_tipe` = '.$id);
                }else if($type=='brand'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_bd.'.`id_brand` = '.$id);
                }
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
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
    public function cust_retention($params,$is_graph,$is_ro){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($is_graph==true){
            if($params=='curr_year'||$params=='last_year'){
                $this->db->select('YEAR(tgl_golive) AS year,MONTH(tgl_golive) AS month,SUM(lending_amt) AS mtd_amt');
            }else{
                $this->db->select('tgl_golive,SUM(lending_amt) AS mtd_amt');
            }
        }else{
            $this->db->select('MAX('.$this->_table_agreement.'.`no_aplikasi`) AS no_aplikasi,'.$this->_table_cst.'.id_customer,'.$this->_table_cst.'.nama_cust,COUNT(status_ro) AS total_ro,status_ro,SUM(lending_amt) AS mtd_amt,COUNT(*) AS mtd_unit,MAX(tgl_appin) AS tgl_appin,MAX(tgl_golive) AS tgl_golive,'.$this->_table_dl.'.`nama_dealer`');
        }
        $this->db->from(''.$this->_table_agreement.'');
        $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_dl,$this->_table_dl.'.id_dealer='.$this->_table_agreement.'.id_dealer');
        if($params == 'curr_month'){
            if($is_graph==true){
                if($is_ro=='1'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND status_ro ="1"');
                }else if($is_ro=='0'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND status_ro ="0"');
                }
                $this->db->group_by('tgl_golive');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
                $this->db->group_by(''.$this->_table_cst.'.id_customer,'.$this->_table_dl.'.`nama_dealer`');
            }
        }else if($params == 'last_month'){
            if($is_graph==true){
                if($is_ro=='1'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND status_ro ="1"');
                }else if($is_ro=='0'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND status_ro ="0"');
                }
                $this->db->group_by('tgl_golive');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) ');
                $this->db->group_by(''.$this->_table_cst.'.id_customer,'.$this->_table_dl.'.`nama_dealer`');
            }
        }else if($params == 'curr_year'){
            if($is_graph==true){
                if($is_ro=='1'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND status_ro ="1"');
                }else if($is_ro=='0'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND status_ro ="0"');
                }
                $this->db->group_by('MONTH(tgl_golive)');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
                $this->db->group_by(''.$this->_table_cst.'.id_customer,'.$this->_table_dl.'.`nama_dealer`');
            }
        }else if($params == 'last_year'){
            if($is_graph==true){
                if($is_ro=='1'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND status_ro ="1"');
                }else if($is_ro=='0'){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND status_ro ="0"');
                }
                $this->db->group_by('MONTH(tgl_golive)');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year))');
                $this->db->group_by(''.$this->_table_cst.'.id_customer,'.$this->_table_dl.'.`nama_dealer`');
            }
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function epd_monitoring($params,$is_graph){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($is_graph==true){
            if($params=='curr_month_0' || $params == 'curr_month_1' || $params=='last_month_0' || $params == 'last_month_1'){
                $this->db->select('epd,target,account,persentasi,periode');
            }else{
                $this->db->select('YEAR(`periode`),MONTH(`periode`),epd,SUM(target) AS target,SUM(account) AS account,SUM(persentasi) AS persentasi,periode');
            }
            $this->db->from(''.$this->_table_epd.'');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_epd.'.id_cabang');
        }else{
            $this->db->select('no_aplikasi,nama_cust,lending_amt,tgl_appin,tgl_golive,jenis,nama_so,nama_armo,epd');
            $this->db->from(''.$this->_table_agreement.'');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
            $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
            $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
            $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
            $this->db->join($this->_table_jns,$this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
            $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
        }
        if($params == 'curr_month'){
            if($is_graph==true){
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) ');
                    $this->db->group_by('epd');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) ');
            }
        }else if($params=='curr_month_0'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND epd ="0"');
        }else if($params == 'curr_month_1'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND epd ="1"');
        }else if($params == 'last_month'){
            if($is_graph==true){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) ');
                $this->db->group_by('epd');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) ');
            }
        }else if($params=='last_month_0'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND epd ="0"');
        }else if($params == 'last_month_1'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59")) AND epd ="1"');
        }else if($params == 'curr_year'){
            if($is_graph==true){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) ');
                $this->db->group_by('epd');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) ');
            }
        }else if($params == 'last_year'){
            if($is_graph==true){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year)) AND month(periode) = month(curdate()) ');
                $this->db->group_by('epd');
            }else{
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year)) AND month(periode) = month(curdate())');
            }
        }else{
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function tod_monitoring($id,$params,$is_graph){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if(!isset($id)&&isset($params)){
            $this->db->select('bucket_od,SUM(osp_all)AS osp_all,SUM(osp_restru)AS osp_restru,SUM(osp_normal)AS osp_normal,SUM(ratio_all)/COUNT(ratio_all) AS ratio_all,SUM(ratio_restru)/COUNT(ratio_restru)AS ratio_restru,SUM(ratio_normal)/COUNT(ratio_normal) AS ratio_normal');
            $this->db->from(''.$this->_table_tod.'');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_tod.'.id_cabang');
            if($params == 'curr_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
            }else if($params == 'last_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
            }else if($params == 'curr_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
            }else if($params == 'last_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
            }else{
                return null;
            }
            $this->db->group_by('bucket_od');
        }else if(isset($id)&&$id!=''){
            if($is_graph==true){
                if($params=='curr_year'||$params=='last_year'){
                    $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`bucket_od`,'.$this->_table_cbg.'.`id_cabang`,SUM('.$this->_table_agreement.'.`osp`) as mtd_osp,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`');
                }else{
                    $this->db->select(''.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`bucket_od`,'.$this->_table_cbg.'.`id_cabang`,SUM('.$this->_table_agreement.'.`osp`) as mtd_osp,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`');
                }
            }else{
                $this->db->select(''.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_agreement.'.`bucket_od`,'.$this->_table_cbg.'.`id_cabang`,'.$this->_table_armo.'.`nama_armo`,'.$this->_table_so.'.`nama_so`,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,'.$this->_table_agreement.'.`lending_amt`,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_agreement.'.`od`,'.$this->_table_agreement.'.`osp`,'.$this->_table_agreement.'.`instalment_amt`,'.$this->_table_agreement.'.`instalment_number`,'.$this->_table_agreement.'.`tenor`');
            }
            $this->db->from($this->_table_agreement);
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
            $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_agreement.'.id_armo');
            $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
            $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
            if($params == 'curr_year'){
                //get all days (1st month to curr month) of current year
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_agreement.'.`bucket_od` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
                }
            }else if($params == 'last_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_agreement.'.`bucket_od` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
                }
            }else if($params == 'curr_month'){
                //get all days (1st day to curr day) of current month
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_agreement.'.`bucket_od` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('tgl_golive');
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
    public function npl_monitoring($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params == 'curr_year'||$params == 'last_year'){
            $this->db->select('YEAR(periode) as year, MONTH(periode) as month,'.$this->_table_npl.'.`id_npl`,'.$this->_table_cbg.'.`id_cabang`,SUM('.$this->_table_npl.'.persentasi) as ytd_persentasi,'.$this->_table_npl.'.`periode`');
            //SUM('.$this->_table_npl.'.persentasi)/COUNT('.$this->_table_npl.'.persentasi) as ytd_persentasi

        }else if($params == 'curr_month'){
            $this->db->select(''.$this->_table_npl.'.`id_npl`,'.$this->_table_cbg.'.`id_cabang`,'.$this->_table_npl.'.persentasi,'.$this->_table_npl.'.`periode`');
        }else{
            return null;
        }
        $this->db->from($this->_table_npl);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_npl.'.id_cabang');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%01-01") AND NOW())');
            $this->db->group_by('YEAR(`periode`), MONTH(`periode`)');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
            $this->db->group_by('YEAR(`periode`), MONTH(`periode`)');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
        }else{
            return null;
        }
        $query = $this->db->get();
        // return $query->row();
        $this->db->cache_off();
        return $query->result();
    }
    public function cwo_monitoring($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if($params == 'curr_year'||$params == 'last_year'){
            $this->db->select('YEAR(periode) as year, MONTH(periode) as month,'.$this->_table_cwo.'.`id_cwo`,'.$this->_table_cbg.'.`id_cabang`,SUM('.$this->_table_cwo.'.persentasi) as ytd_persentasi,'.$this->_table_cwo.'.`periode`');
            //SUM('.$this->_table_cwo.'.persentasi)/COUNT('.$this->_table_cwo.'.persentasi) as ytd_persentasi

        }else if($params == 'curr_month'){
            $this->db->select(''.$this->_table_cwo.'.`id_cwo`,'.$this->_table_cbg.'.`id_cabang`,'.$this->_table_cwo.'.persentasi,'.$this->_table_cwo.'.`periode`');
        }else{
            return null;
        }
        $this->db->from($this->_table_cwo);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_cwo.'.id_cabang');
        if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%01-01") AND NOW())');
            $this->db->group_by('YEAR(`periode`), MONTH(`periode`)');
        }else if($params == 'last_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
            $this->db->group_by('YEAR(`periode`), MONTH(`periode`)');
        }else if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
        }else{
            return null;
        }
        $query = $this->db->get();
        // return $query->row();
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
        if(isset($id)&&$id!=''){
            if($is_graph==true){
                if($params=='curr_year'||$params=='last_year'){
                    $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as month,'.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_armo.'.`id_armo`,'.$this->_table_cbg.'.`id_cabang`,SUM('.$this->_table_agreement.'.`lending_amt`) as mtd_lending_amt,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`');
                }else{
                    $this->db->select(''.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_armo.'.`id_armo`,'.$this->_table_cbg.'.`id_cabang`,SUM('.$this->_table_agreement.'.`lending_amt`) as mtd_lending_amt,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`');
                }
            }else{
                $this->db->select(''.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_armo.'.`id_armo`,'.$this->_table_cbg.'.`id_cabang`,'.$this->_table_armo.'.`nama_armo`,'.$this->_table_so.'.`nama_so`,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,'.$this->_table_agreement.'.`lending_amt`,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_agreement.'.`od`,'.$this->_table_agreement.'.`osp`,'.$this->_table_agreement.'.`instalment_amt`,'.$this->_table_agreement.'.`instalment_number`,'.$this->_table_agreement.'.`tenor`');
            }
            $this->db->from($this->_table_armo);
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_armo.'.id_cabang');
            $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_armo='.$this->_table_armo.'.id_armo');
            $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
            $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
            if($params == 'curr_year'){
                //get all days (1st month to curr month) of current year
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_armo.'.`id_armo` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
                }
            }else if($params == 'last_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_armo.'.`id_armo` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('MONTH(tgl_golive)');
                }
            }else if($params == 'curr_month'){
                //get all days (1st day to curr day) of current month
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_armo.'.`id_armo` = '.$id);
                if($is_graph==true){
                    $this->db->group_by('tgl_golive');
                }
            }else{
                return null;
            }
        }else{
            if($params == 'curr_year'||$params == 'last_year'||$params == 'curr_month'||$params == 'last_month'){
                $this->db->select('YEAR(`periode`),MONTH(periode),'.$this->_table_pfm_armo.'.`id_armo`,'.$this->_table_armo.'.`nama_armo`,nama_spv,SUM(pencapaian) as pencapaian,target,(SUM(pencapaian)/target)*100 AS persentasi');
            }else{
                return null;
            }
            $this->db->from($this->_table_pfm_armo);
            $this->db->join($this->_table_armo,$this->_table_armo.'.id_armo='.$this->_table_pfm_armo.'.id_armo');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_armo.'.id_cabang');
            $this->db->join($this->_table_spv,$this->_table_spv.'.id_spv='.$this->_table_pfm_armo.'.id_spv');
            if($params == 'curr_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%01-01") AND NOW())');
                $this->db->group_by('YEAR(`periode`),`id_armo`');
            }else if($params == 'last_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
                $this->db->group_by('YEAR(`periode`),`id_armo`');
            }else if($params == 'curr_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
                $this->db->group_by('YEAR(`periode`),MONTH(`periode`),`id_armo`');
            }else if($params == 'last_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
                $this->db->group_by('YEAR(`periode`),MONTH(`periode`),`id_armo`');
            }else{
                return null;
            }
        }
        $query = $this->db->get();
        // return $query->row();
        $this->db->cache_off();
        return $query->result();
    }
    public function get_brand($id,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select(''.$this->_table_dl.'.id_dealer,'.$this->_table_dl.'.nama_dealer,'.$this->_table_cbg.'.`nama_cabang`,COUNT('.$this->_table_jns.'.`jenis`) total_jenis,'.$this->_table_bd.'.`brand`');
        $this->db->from(''.$this->_table_dl.'');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_dl.'.id_cabang');
        $this->db->join($this->_table_agreement,$this->_table_agreement.'.id_dealer='.$this->_table_dl.'.id_dealer');
        $this->db->join($this->_table_jns,$this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
        $this->db->join($this->_table_bd,$this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_dl.'.`id_dealer` = '.$id);
        }else if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_dl.'.`id_dealer` = '.$id);
        }else{
            return null;
        }
        $this->db->group_by('brand');
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function get_ro($params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        $this->db->select(''.$this->_table_cst.'.id_customer,'.$this->_table_cst.'.nama_cust,MAX(status_ro) as status_ro');
        $this->db->from(''.$this->_table_agreement.'');
        $this->db->join($this->_table_cst,$this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_dl,$this->_table_dl.'.id_dealer='.$this->_table_agreement.'.id_dealer');
        if($params == 'curr_month'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
        }else if($params == 'curr_year'){
            $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
        }else{
            return null;
        }
        $this->db->group_by(''.$this->_table_cst.'.id_customer');
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
    public function get_bucketod($id,$params){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if(!isset($id)&&isset($params)){
            $this->db->select('bucket_od,COUNT(bucket_od) as jml_bucket');
            $this->db->from(''.$this->_table_tod.'');
            $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_tod.'.id_cabang');
            if($params == 'curr_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW())');
            }else if($params == 'last_month'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, "%Y-%m-01 00:00:00") AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), "%Y-%m-%d 23:59:59"))');
            }else if($params == 'curr_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (periode BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW())');
            }else if($params == 'last_year'){
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(periode) = YEAR(curdate() - interval 1 year))');
            }else{
                return null;
            }
            $this->db->group_by('bucket_od');
        }else if(isset($id)&&$id!=''){
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