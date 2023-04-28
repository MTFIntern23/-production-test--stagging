<?php
defined('BASEPATH') or exit('No direct script access allowed');
class So_detail_chart_model extends CI_Model
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
    public function so_detail_chart($id, $params, $filter='', $subfilter='')
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $cabangUser = $this->auth_model->current_user()->id_cabang;
        $this->db->cache_on();
        if ($params=='curr_year'||$params=='last_year') {
            $this->db->select('YEAR(tgl_golive)as year,MONTH(tgl_golive) as tgl_golive, SUM('.$this->_table_agreement.'.`lending_amt`) as mtd_lending_amt,');
        } else {
            $this->db->select('SUM('.$this->_table_agreement.'.`lending_amt`) as mtd_lending_amt,'.$this->_table_agreement.'.`tgl_golive`');
        }
        $this->db->from($this->_table_so);
        $this->db->join($this->_table_cbg, $this->_table_cbg.'.id_cabang='.$this->_table_so.'.id_cabang');
        $this->db->join($this->_table_agreement, $this->_table_agreement.'.id_so='.$this->_table_so.'.id_so');
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
            $this->db->group_by('MONTH(tgl_golive)');
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
            $this->db->group_by('MONTH(tgl_golive)');
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
            $this->db->group_by('tgl_golive');
        } else {
            return null;
        }
        $query = $this->db->get();
        $this->db->cache_off();
        return $query->result();
    }
}
