<?php 
class Cabang_model extends CI_Model
{
    private $_table_pfm_so = "tb_pfm_so";
    private $_table_pfm_dl = "tb_pfm_dealer";
    private $_table_pfm_ld = "tb_pfm_lending";
    private $_table_so = "tb_so";
    private $_table_dl = "tb_dealer";
    private $_table_cbg = "tb_cabang";
    private $_table_pic = "tb_pic";
    private $_table_spv = "tb_supervisor";
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
    
    public function performa_so()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select($this->_table_pfm_so.'.id_pfm_so,'.$this->_table_pfm_so.'.id_so,'.$this->_table_pfm_so.'.id_cabang,'.$this->_table_pfm_so.'.id_spv,'.$this->_table_cbg.'.nama AS nama_cabang,'.$this->_table_cbg.'.lokasi AS lokasi_cabang,'.$this->_table_pfm_so.'.pencapaian,'.$this->_table_pfm_so.'.target,'.$this->_table_pfm_so.'.periode,'.$this->_table_so.'.nama_so,'.$this->_table_spv.'.nama AS nama_spv,('.$this->_table_pfm_so.'.pencapaian - '.$this->_table_pfm_so.'.target) AS diff, ROW_NUMBER() OVER(ORDER BY diff DESC) AS peringkat');
        $this->db->from($this->_table_pfm_so);
        $this->db->join($this->_table_so,$this->_table_so.'.id_so='.$this->_table_pfm_so.'.id_so');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_so.'.id_cabang');
        $this->db->join($this->_table_spv,$this->_table_spv.'.id_spv='.$this->_table_pfm_so.'.id_spv');
        $this->db->where($this->_table_cbg.'.id_cabang',$cabangUser);
        $query = $this->db->get();
        // return $query->row();
        return $query->result();
    }

    public function performa_dealer(){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select($this->_table_pfm_dl.'.id_pfm_dealer,'.$this->_table_pfm_dl.'.id_dealer,'.$this->_table_pfm_dl.'.id_cabang,'.$this->_table_pfm_dl.'.id_pic,'.$this->_table_cbg.'.nama AS nama_cabang,'.$this->_table_cbg.'.lokasi AS lokasi_cabang,'.$this->_table_dl.'.nama_dealer,'.$this->_table_pic.'.nama AS nama_pic,'.$this->_table_pfm_dl.'.pencapaian,'.$this->_table_pfm_dl.'.target,'.$this->_table_pfm_dl.'.periode,('.$this->_table_pfm_dl.'.pencapaian - '.$this->_table_pfm_dl.'.target) AS diff, ROW_NUMBER() OVER(ORDER BY diff DESC) AS peringkat');
        $this->db->from($this->_table_pfm_dl);
        $this->db->join($this->_table_dl,$this->_table_dl.'.id_dealer='.$this->_table_pfm_dl.'.id_dealer');
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_dl.'.id_cabang');
        $this->db->join($this->_table_pic,$this->_table_pic.'.id_pic='.$this->_table_pfm_dl.'.id_pic');
        $this->db->where($this->_table_cbg.'.id_cabang',$cabangUser);
        $query = $this->db->get();
        return $query->result();
    }

    public function performa_lending_db_today(){
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select('*');
        $this->db->from($this->_table_pfm_ld);
        $this->db->join($this->_table_cbg,$this->_table_cbg.'.id_cabang='.$this->_table_pfm_ld.'.id_cabang');
        $this->db->where('DATE(periode) <= CURDATE() AND DATE(periode) >= CURDATE() - INTERVAL 1 DAY AND '.$this->_table_cbg.'.id_cabang = '.$cabangUser);
        // $this->db->where($this->_table_cbg.'.id_cabang',$cabangUser);
        $query = $this->db->get();
        return $query->result();
    }
}

?>