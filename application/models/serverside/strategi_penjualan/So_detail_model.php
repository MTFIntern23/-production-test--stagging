<?php
defined('BASEPATH') or exit('No direct script access allowed');
class So_detail_model extends CI_Model
{
    public function __construct()
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
    const SESSION_KEY = 'user_id';
    public $table = 'tb_agreement';
    public $column_order = array(null, 'no_aplikasi','nama_cust','lending_amt','tgl_appin','tgl_golive','jenis','nama_dealer');
    public $column_search = array('no_aplikasi','nama_cust','lending_amt','tgl_appin','tgl_golive','jenis','nama_dealer');
    public $order = array('tgl_golive' => 'desc');
    private function _so_detail($id, $params, $filter='', $subfilter='')
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->select(''.$this->_table_agreement.'.`no_aplikasi`,'.$this->_table_so.'.`id_so`,'.$this->_table_cbg.'.`id_cabang`,'.$this->_table_bd.'.`id_brand`,'.$this->_table_jns.'.`id_jenis`,'.$this->_table_so.'.`nama_so`,'.$this->_table_cbg.'.`nama_cabang`,'.$this->_table_cst.'.`nama_cust`,'.$this->_table_agreement.'.`lending_amt`,'.$this->_table_agreement.'.`tgl_appin`,'.$this->_table_agreement.'.`tgl_golive`,'.$this->_table_bd.'.`brand`,'.$this->_table_jns.'.`jenis`,'.$this->_table_dl.'.`nama_dealer`');
        $this->db->from($this->_table_agreement);
        $this->db->join($this->_table_cbg, $this->_table_cbg.'.id_cabang='.$this->_table_agreement.'.id_cabang');
        $this->db->join($this->_table_so, $this->_table_so.'.id_so='.$this->_table_agreement.'.id_so');
        $this->db->join($this->_table_cst, $this->_table_cst.'.id_customer='.$this->_table_agreement.'.id_customer');
        $this->db->join($this->_table_dl, $this->_table_dl.'.id_dealer='.$this->_table_agreement.'.id_dealer');
        $this->db->join($this->_table_jns, $this->_table_jns.'.id_jenis='.$this->_table_agreement.'.id_jenis');
        $this->db->join($this->_table_bd, $this->_table_bd.'.id_brand='.$this->_table_agreement.'.id_brand');
        if ($params == 'curr_year') {
            if (isset($subfilter)&&$subfilter!=''&&$subfilter!='null') {
                if ($filter=='group_product') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.id_gp = '.$subfilter);
                } elseif ($filter=='jenis_asset') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.status_aset = '.$subfilter);
                } elseif ($filter=='jenis_customer') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.status_ro = '.$subfilter);
                } elseif ($filter=='jenis_pekerjaan') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_cst.'.id_profesi = '.$subfilter);
                } elseif ($filter=='dealer') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.id_dealer = '.$subfilter);
                } elseif ($filter=='pareto') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.id_dealer = '.$subfilter);
                }
            } else {
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-01-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id);
            }
        } elseif ($params == 'last_year') {
            if (isset($subfilter)&&$subfilter!=''&&$subfilter!='null') {
                if ($filter=='group_product') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.id_gp = '.$subfilter);
                } elseif ($filter=='jenis_asset') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.status_aset = '.$subfilter);
                } elseif ($filter=='jenis_customer') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.status_ro = '.$subfilter);
                } elseif ($filter=='jenis_pekerjaan') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_cst.'.id_profesi = '.$subfilter);
                } elseif ($filter=='dealer') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.id_dealer = '.$subfilter);
                } elseif ($filter=='pareto') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.id_dealer = '.$subfilter);
                }
            } else {
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (YEAR(tgl_golive) = YEAR(curdate() - interval 1 year)) AND '.$this->_table_so.'.`id_so` = '.$id);
            }
        } elseif ($params == 'curr_month') {
            if (isset($subfilter)&&$subfilter!=''&&$subfilter!='null') {
                if ($filter=='group_product') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.id_gp = '.$subfilter);
                } elseif ($filter=='jenis_asset') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.status_aset = '.$subfilter);
                } elseif ($filter=='jenis_customer') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.status_ro = '.$subfilter);
                } elseif ($filter=='jenis_pekerjaan') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_cst.'.id_profesi = '.$subfilter);
                } elseif ($filter=='dealer') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.id_dealer = '.$subfilter);
                } elseif ($filter=='pareto') {
                    $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id.' AND '.$this->_table_agreement.'.id_dealer = '.$subfilter);
                }
            } else {
                $this->db->where($this->_table_cbg.'.id_cabang = '.$cabangUser.' AND (tgl_golive BETWEEN  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW()) AND '.$this->_table_so.'.`id_so` = '.$id);
            }
        } else {
            return null;
        }
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i===0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } elseif (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function get_datatables($id, $params)
    {
        $this->db->cache_on();
        $this->_so_detail($id, $params);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
    public function count_filtered($id, $params)
    {
        $this->_so_detail($id, $params);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
