<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_aov', true);
    sessionStorage.setItem('is_jbrand', false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Segment Customer</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="border-bottom: 3px solid #202657;">
                    <h5 class="card-header text-dark fs-4 text-start">
                        Customer Segment <b>
                            <?= $current_cabang->nama_cabang;?>
                        </b>
                    </h5>
                    <div class="row ms-2 me-2">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                <button id="btn-historiw" class="badge btn bg-chart-active-2"
                                    onclick="show_this_field('pekerjaan-field',this.id)" type="button"><i
                                        class='bx bx-briefcase-alt-2'></i> Jenis
                                    Pekerjaan</button>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                <button id="btn-historiw-jbrand" class="badge btn btn-history-null "
                                    onclick="show_this_field('pendidikan-field',this.id)" type="button"><i
                                        class='bx bxs-graduation me-1'></i>Jenis Pendidikan</button>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                <button id="btn-historiw-jbrand-1" class="badge btn btn-history-null "
                                    onclick="show_this_field('kecamatan-field',this.id)" type="button"><i
                                        class='bx bxs-school me-1'></i>Kecamatan</button>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                <button id="btn-historiw-jbrand-2" class="badge btn btn-history-null "
                                    onclick="show_this_field('gaji-field',this.id)" type="button"><i
                                        class='bx bx-money-withdraw'></i>
                                    Gaji</button>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                <button id="btn-historiw-jbrand-3" class="badge btn btn-history-null "
                                    onclick="show_this_field('umur-field',this.id)" type="button"><i
                                        class='bx bxs-face'></i>
                                    Umur</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="pendidikan-field" class="d-none">
                    <div class="row mt-4 mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                                <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="pendidikan_mtd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="pendidikan_mtd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="pendidikan_mtd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="pendidikan_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pendidikan</th>
                                        <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                        <th>Lending MTD <span class="show_month"></span> (M)</th>
                                        <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                        <th>Unit MTD <span class="show_month"></span> (Unit)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="pendidikan_ytd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="pendidikan_ytd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="pendidikan_ytd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="pendidikan_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pendidikan</th>
                                        <th>Lending YTD <span class="show_prev_year"></span> </th>
                                        <th>Lending YTD <span class="show_year"></span> </th>
                                        <th>Unit YTD <span class="show_prev_year"></span> </th>
                                        <th>Unit YTD <span class="show_year"></span> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>
                </div>
                <div id="kecamatan-field" class="d-none">
                    <div class="row mt-4 mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                                <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="kecamatan_mtd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="kecamatan_mtd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="kecamatan_mtd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="kecamatan_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                        <th>Lending MTD <span class="show_month"></span> (M)</th>
                                        <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                        <th>Unit MTD <span class="show_month"></span> (Unit)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="kecamatan_ytd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="kecamatan_ytd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="kecamatan_ytd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="kecamatan_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Lending YTD <span class="show_prev_year"></span> </th>
                                        <th>Lending YTD <span class="show_year"></span> </th>
                                        <th>Unit YTD <span class="show_prev_year"></span> </th>
                                        <th>Unit YTD <span class="show_year"></span> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>
                </div>

                <div id="pekerjaan-field">
                    <div class="row mt-4 mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                                <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <div class="row justify-content-sm-start">
                                    <div class="select-filter col-xl-3 col-lg-3 col-md-5 col-sm-12"
                                        style="margin-right: -15px;">
                                        <select class="form-select" id='filter'
                                            onchange="setSubFilter(this.options[this.selectedIndex].value)">
                                            <option selected disabled>Pilih Filter</option>
                                            option value="all">All</option>
                                            <option value="group_product">Group
                                                Product</option>
                                            <option value="jenis_asset">Jenis Asset
                                            </option>
                                            <option value="so">SO</option>
                                            <option value="jenis_customer">Jenis
                                                Customer</option>
                                            <option value="dealer">Dealer</option>
                                        </select>
                                    </div>
                                    <div class="select-sub-filter col-xl-3 col-lg-3 col-md-5 col-sm-12 col-sub-filter"
                                        style="margin-right: -15px;">
                                        <select class="form-select" id="sub-filter" disabled>
                                            <option value="">Pilih Sub-Filter</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button id="filter-btn" class="btn btn-warning btn-search" onclick=""
                                            type="button"><i class='bx bx-search me-1'></i>Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="pekerjaan_mtd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="pekerjaan_mtd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="pekerjaan_mtd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="pekerjaan_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pekerjaan</th>
                                        <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                        <th>Lending MTD <span class="show_month"></span> (M)</th>
                                        <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                        <th>Unit MTD <span class="show_month"></span> (Unit)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="pekerjaan_ytd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="pekerjaan_ytd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="pekerjaan_ytd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="pekerjaan_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pekerjaan</th>
                                        <th>Lending YTD <span class="show_prev_year"></span> </th>
                                        <th>Lending YTD <span class="show_year"></span> </th>
                                        <th>Unit YTD <span class="show_prev_year"></span> </th>
                                        <th>Unit YTD <span class="show_year"></span> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>
                </div>

                <div id="gaji-field" class="d-none">
                    <div class="row mt-4 mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                                <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="gaji_mtd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="gaji_mtd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="gaji_mtd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="gaji_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gaji (JT)</th>
                                        <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                        <th>Lending MTD <span class="show_month"></span> (M)</th>
                                        <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                        <th>Unit MTD <span class="show_month"></span> (Unit)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="gaji_ytd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="gaji_ytd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="gaji_ytd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="gaji_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gaji (JT)</th>
                                        <th>Lending YTD <span class="show_prev_year"></span> </th>
                                        <th>Lending YTD <span class="show_year"></span> </th>
                                        <th>Unit YTD <span class="show_prev_year"></span> </th>
                                        <th>Unit YTD <span class="show_year"></span> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>
                </div>

                <div id="umur-field" class="d-none">
                    <div class="row mt-4 mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                                <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="umur_mtd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="umur_mtd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="umur_mtd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="umur_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Umur</th>
                                        <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                        <th>Lending MTD <span class="show_month"></span> (M)</th>
                                        <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                        <th>Unit MTD <span class="show_month"></span> (Unit)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="umur_ytd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="umur_ytd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="umur_ytd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="umur_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Umur</th>
                                        <th>Lending YTD <span class="show_prev_year"></span> </th>
                                        <th>Lending YTD <span class="show_year"></span> </th>
                                        <th>Unit YTD <span class="show_prev_year"></span> </th>
                                        <th>Unit YTD <span class="show_year"></span> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG Dashboard JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    <?php
        $ids_gp = array();
$items_gp = array();
$ids_asset = array();
$items_so = array();
$ids_so = array();
$ids_ro = array();
$items_dealer = array();
$ids_dealer = array();
foreach ($subfilter_gp as $row) {
    $items_gp[]=htmlentities($row -> gp);
    $ids_gp[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_gp));
}
foreach ($subfilter_jenis_assets as $row) {
    $ids_asset[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> status_aset));
}
foreach ($subfilter_so as $row) {
    $items_so[]=htmlentities($row -> nama_so);
    $ids_so[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_so));
}
foreach ($subfilter_jenis_ro as $row) {
    $ids_ro[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> status_ro));
}
foreach ($subfilter_dealer as $row) {
    $items_dealer[]=htmlentities($row -> nama_dealer);
    $ids_dealer[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_dealer));
}
?>
    let num_abv = document.querySelectorAll('.get_val');
    let gaji_abv = document.querySelectorAll('.get_gaji');
    let months_field = document.querySelectorAll('.show_month');
    let months_prev_field = document.querySelectorAll('.show_prev_month');
    let years_field = document.querySelectorAll('.show_year');
    let years_prev_field = document.querySelectorAll('.show_prev_year');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    gaji_abv.forEach((val) => {
        val.innerHTML = mFormatter(parseFloat(val.innerHTML));
    })
    months_field.forEach((field, idx) => {
        field.innerHTML = month_name(new Date().getMonth() + 1) + ' ' + (new Date().getFullYear());
        if (new Date().getMonth() == 0) {
            months_prev_field[idx].innerHTML = month_name(12) + ' ' + (new Date().getFullYear() - 1);
        } else {
            months_prev_field[idx].innerHTML = month_name(new Date().getMonth()) + ' ' + (new Date()
                .getFullYear());
        }
    })
    years_field.forEach((field, idx) => {
        field.innerHTML = new Date().getFullYear();
        years_prev_field[idx].innerHTML = new Date().getFullYear() - 1;
    })
    //button
    const btn_histori = document.querySelector('#btn-historiw')
    const btn_histori_jbrand = document.querySelector('#btn-historiw-jbrand')
    const btn_histori_jbrand_1 = document.querySelector('#btn-historiw-jbrand-1')
    const btn_histori_jbrand_2 = document.querySelector('#btn-historiw-jbrand-2')
    const btn_histori_jbrand_3 = document.querySelector('#btn-historiw-jbrand-3')
    const btns_db = [btn_histori, btn_histori_jbrand, btn_histori_jbrand_1, btn_histori_jbrand_2, btn_histori_jbrand_3]
    //fields
    const pendidikan_field = document.querySelector('#pendidikan-field')
    const kecamatan_field = document.querySelector('#kecamatan-field')
    const pekerjaan_field = document.querySelector('#pekerjaan-field')
    const gaji_field = document.querySelector('#gaji-field')
    const umur_field = document.querySelector('#umur-field')
    const fields_db = [pendidikan_field, kecamatan_field, pekerjaan_field, gaji_field, umur_field]

    function show_this_field(field_name, btn_name) {
        document.querySelector('#' + field_name).classList.remove('d-none');
        fields_db.forEach((field, idx) => {
            if (field != document.querySelector('#' + field_name) && !field.classList.contains('d-none')) {
                field.classList.add('d-none');
            }
        })
        btns_db.forEach((btn, idx) => {
            if (btn != document.querySelector('#' + btn_name) && btn.classList.contains('bg-chart-active-2')) {
                btn.classList.remove('bg-chart-active-2');
                btn.classList.add('btn-history-null');
            }
        })
        if (!document.querySelector('#' + btn_name).classList.contains('bg-chart-active-2')) {
            document.querySelector('#' + btn_name).classList.remove('btn-history-null');
            document.querySelector('#' + btn_name).classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
        if (field_name == 'kecamatan-field') {
            show_content_kecamatan()
        } else if (field_name == 'pendidikan-field') {
            show_content_pendidikan()
        } else if (field_name == 'gaji-field') {
            show_content_gaji()
        } else if (field_name == 'umur-field') {
            show_content_umur()
        }
        hideOthers(field_name)
    }
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_customer", "dealer"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': <?php echo json_encode($items_gp) ?> ,
            'sub2': ["Second", "New"],
            'sub3': <?php echo json_encode($items_so) ?> ,
            'sub4': ["NONRO", "RO"],
            'sub5': <?php echo json_encode($items_dealer) ?> ,
        }
        let valuesSubFilters = {
            'sub0': ["null"],
            'sub1': <?php echo json_encode($ids_gp) ?> ,
            'sub2': <?php echo json_encode($ids_asset) ?> ,
            'sub3': <?php echo json_encode($ids_so) ?> ,
            'sub4': <?php echo json_encode($ids_ro) ?> ,
            'sub5': <?php echo json_encode($ids_dealer) ?> ,
        }
        if (dataFilter == "all") {
            areaSubFilter.forEach((subs) => {
                subs.innerHTML = callSubFilter(subFilters.sub0, valuesSubFilters.sub0);
                subs.setAttribute("disabled", 'true');
            })
        }
        filters.forEach((filter, idx) => {
            if (dataFilter == filter) {
                areaSubFilter.forEach((subs) => {
                    subs.innerHTML = callSubFilter(subFilters['sub' + (idx + 1)], valuesSubFilters[
                        'sub' + (idx + 1)]);
                    subs.removeAttribute("disabled");
                })
            }
        })
    }
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    // chart history_assets mtd
    var options_pendidikan_mtd = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth() + 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pendidikan_mtd = new ApexCharts(document.querySelector("#pendidikan_mtd_chart_2"),
        options_pendidikan_mtd);
    chart_pendidikan_mtd.render();

    var options_pendidikan_mtd_2 = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pendidikan_mtd_2 = new ApexCharts(document.querySelector("#pendidikan_mtd_chart"),
        options_pendidikan_mtd_2);
    chart_pendidikan_mtd_2.render();

    var options_pendidikan_mtd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_pendidikan_mtd_3 = new ApexCharts(document.querySelector("#pendidikan_mtd_chart_3"),
        options_pendidikan_mtd_3);
    chart_pendidikan_mtd_3.render();

    // chart history_assets ytd
    var options_pendidikan_ytd = {
        title: {
            text: 'YTD ' + (new Date().getFullYear()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pendidikan_ytd = new ApexCharts(document.querySelector("#pendidikan_ytd_chart_2"),
        options_pendidikan_ytd);
    chart_pendidikan_ytd.render();

    var options_pendidikan_ytd_2 = {
        title: {
            text: 'YTD ' + (new Date().getFullYear() - 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pendidikan_ytd_2 = new ApexCharts(document.querySelector("#pendidikan_ytd_chart"),
        options_pendidikan_ytd_2);
    chart_pendidikan_ytd_2.render();

    var options_pendidikan_ytd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_pendidikan_ytd_3 = new ApexCharts(document.querySelector("#pendidikan_ytd_chart_3"),
        options_pendidikan_ytd_3);
    chart_pendidikan_ytd_3.render();

    // chart kecamatan mtd
    var options_kecamatan_mtd = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth() + 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_kecamatan_mtd = new ApexCharts(document.querySelector("#kecamatan_mtd_chart_2"),
        options_kecamatan_mtd);
    chart_kecamatan_mtd.render();

    var options_kecamatan_mtd_2 = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_kecamatan_mtd_2 = new ApexCharts(document.querySelector("#kecamatan_mtd_chart"),
        options_kecamatan_mtd_2);
    chart_kecamatan_mtd_2.render();

    var options_kecamatan_mtd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_kecamatan_mtd_3 = new ApexCharts(document.querySelector("#kecamatan_mtd_chart_3"),
        options_kecamatan_mtd_3);
    chart_kecamatan_mtd_3.render();

    // chart kecamatan ytd
    var options_kecamatan_ytd = {
        title: {
            text: 'YTD ' + (new Date().getFullYear()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_kecamatan_ytd = new ApexCharts(document.querySelector("#kecamatan_ytd_chart_2"),
        options_kecamatan_ytd);
    chart_kecamatan_ytd.render();

    var options_kecamatan_ytd_2 = {
        title: {
            text: 'YTD ' + (new Date().getFullYear() - 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_kecamatan_ytd_2 = new ApexCharts(document.querySelector("#kecamatan_ytd_chart"),
        options_kecamatan_ytd_2);
    chart_kecamatan_ytd_2.render();

    var options_kecamatan_ytd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_kecamatan_ytd_3 = new ApexCharts(document.querySelector("#kecamatan_ytd_chart_3"),
        options_kecamatan_ytd_3);
    chart_kecamatan_ytd_3.render();

    // chart pekerjaan mtd
    var options_pekerjaan_mtd = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth() + 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pekerjaan_mtd = new ApexCharts(document.querySelector("#pekerjaan_mtd_chart_2"),
        options_pekerjaan_mtd);
    chart_pekerjaan_mtd.render();

    var options_pekerjaan_mtd_2 = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pekerjaan_mtd_2 = new ApexCharts(document.querySelector("#pekerjaan_mtd_chart"),
        options_pekerjaan_mtd_2);
    chart_pekerjaan_mtd_2.render();

    var options_pekerjaan_mtd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_pekerjaan_mtd_3 = new ApexCharts(document.querySelector("#pekerjaan_mtd_chart_3"),
        options_pekerjaan_mtd_3);
    chart_pekerjaan_mtd_3.render();


    // chart pekerjaan ytd
    var options_pekerjaan_ytd = {
        title: {
            text: 'YTD ' + (new Date().getFullYear()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pekerjaan_ytd = new ApexCharts(document.querySelector("#pekerjaan_ytd_chart_2"),
        options_pekerjaan_ytd);
    chart_pekerjaan_ytd.render();

    var options_pekerjaan_ytd_2 = {
        title: {
            text: 'YTD ' + (new Date().getFullYear() - 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pekerjaan_ytd_2 = new ApexCharts(document.querySelector("#pekerjaan_ytd_chart"),
        options_pekerjaan_ytd_2);
    chart_pekerjaan_ytd_2.render();

    var options_pekerjaan_ytd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_pekerjaan_ytd_3 = new ApexCharts(document.querySelector("#pekerjaan_ytd_chart_3"),
        options_pekerjaan_ytd_3);
    chart_pekerjaan_ytd_3.render();

    // chart gaji mtd
    var options_gaji_mtd = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth() + 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_gaji_mtd = new ApexCharts(document.querySelector("#gaji_mtd_chart_2"),
        options_gaji_mtd);
    chart_gaji_mtd.render();

    var options_gaji_mtd_2 = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_gaji_mtd_2 = new ApexCharts(document.querySelector("#gaji_mtd_chart"),
        options_gaji_mtd_2);
    chart_gaji_mtd_2.render();

    var options_gaji_mtd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_gaji_mtd_3 = new ApexCharts(document.querySelector("#gaji_mtd_chart_3"),
        options_gaji_mtd_3);
    chart_gaji_mtd_3.render();


    // chart gaji ytd
    var options_gaji_ytd = {
        title: {
            text: 'YTD ' + (new Date().getFullYear()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_gaji_ytd = new ApexCharts(document.querySelector("#gaji_ytd_chart_2"),
        options_gaji_ytd);
    chart_gaji_ytd.render();

    var options_gaji_ytd_2 = {
        title: {
            text: 'YTD ' + (new Date().getFullYear() - 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_gaji_ytd_2 = new ApexCharts(document.querySelector("#gaji_ytd_chart"),
        options_gaji_ytd_2);
    chart_gaji_ytd_2.render();

    var options_gaji_ytd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_gaji_ytd_3 = new ApexCharts(document.querySelector("#gaji_ytd_chart_3"),
        options_gaji_ytd_3);
    chart_gaji_ytd_3.render();

    // chart umur mtd
    var options_umur_mtd = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth() + 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_umur_mtd = new ApexCharts(document.querySelector("#umur_mtd_chart_2"),
        options_umur_mtd);
    chart_umur_mtd.render();

    var options_umur_mtd_2 = {
        title: {
            text: 'MTD ' + month_name(new Date().getMonth()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_umur_mtd_2 = new ApexCharts(document.querySelector("#umur_mtd_chart"),
        options_umur_mtd_2);
    chart_umur_mtd_2.render();

    var options_umur_mtd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_umur_mtd_3 = new ApexCharts(document.querySelector("#umur_mtd_chart_3"),
        options_umur_mtd_3);
    chart_umur_mtd_3.render();


    // chart umur ytd
    var options_umur_ytd = {
        title: {
            text: 'YTD ' + (new Date().getFullYear()),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_umur_ytd = new ApexCharts(document.querySelector("#umur_ytd_chart_2"),
        options_umur_ytd);
    chart_umur_ytd.render();

    var options_umur_ytd_2 = {
        title: {
            text: 'YTD ' + (new Date().getFullYear() - 1),
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_umur_ytd_2 = new ApexCharts(document.querySelector("#umur_ytd_chart"),
        options_umur_ytd_2);
    chart_umur_ytd_2.render();

    var options_umur_ytd_3 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_umur_ytd_3 = new ApexCharts(document.querySelector("#umur_ytd_chart_3"),
        options_umur_ytd_3);
    chart_umur_ytd_3.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    var pendidikan_mtd, kecamatan_mtd, pekerjaan_mtd, gaji_mtd, umur_mtd, pendidikan_ytd, kecamatan_ytd, pekerjaan_ytd,
        gaji_ytd, umur_ytd

    function show_content_pendidikan() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'pendidikan',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                chart_pendidikan_mtd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_pendidikan_mtd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
                chart_pendidikan_mtd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_pendidikan_mtd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'pendidikan',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                chart_pendidikan_ytd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_pendidikan_ytd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
                chart_pendidikan_ytd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_pendidikan_ytd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'pendidikan',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                var pendidikan_keys_mtd = Array.from((res.data_lending).keys()).sort((a, b) => (res
                    .data_lending)[b] - (res.data_lending)[a])
                chart_pendidikan_mtd_3.updateSeries([{
                    name: 'Lending ' + months_prev_field[0].innerHTML,
                    type: 'column',
                    data: pendidikan_keys_mtd.map(i => (res.data_lending2).map(bFormatter)[i])
                        .slice(0, 5)
                }, {
                    name: 'Lending ' + months_field[0].innerHTML,
                    type: 'column',
                    data: pendidikan_keys_mtd.map(i => (res.data_lending).map(bFormatter)[i])
                        .slice(0, 5)
                }])
                chart_pendidikan_mtd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: pendidikan_keys_mtd.map(i => (res.data_tipe)[i]).slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'pendidikan',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                var pendidikan_keys_ytd = Array.from((res.data_lending).keys()).sort((a, b) => (res
                    .data_lending)[b] - (res.data_lending)[a])
                chart_pendidikan_ytd_3.updateSeries([{
                    name: 'Lending ' + years_prev_field[0].innerHTML,
                    type: 'column',
                    data: pendidikan_keys_ytd.map(i => (res.data_lending2).map(bFormatter)[i])
                        .slice(0, 5)
                }, {
                    name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' + month_name((
                        new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: pendidikan_keys_ytd.map(i => (res.data_lending).map(bFormatter)[i])
                        .slice(0, 5)
                }])
                chart_pendidikan_ytd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: pendidikan_keys_ytd.map(i => (res.data_tipe)[i]).slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        pendidikan_mtd = $('#pendidikan_mtd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'pendidikan',
                    'params': 'curr_month',
                    'params2': 'last_month'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        //ytd
        pendidikan_ytd = $('#pendidikan_ytd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'pendidikan',
                    'params': 'curr_year',
                    'params2': 'last_year'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
    }

    function show_content_kecamatan() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'kecamatan',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                chart_kecamatan_mtd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_kecamatan_mtd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
                chart_kecamatan_mtd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_kecamatan_mtd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'kecamatan',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                chart_kecamatan_ytd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_kecamatan_ytd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
                chart_kecamatan_ytd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_kecamatan_ytd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'kecamatan',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                var kecamatan_keys_mtd = Array.from((res.data_lending).keys()).sort((a, b) => (res
                    .data_lending)[b] - (res.data_lending)[a])
                chart_kecamatan_mtd_3.updateSeries([{
                    name: 'Lending ' + months_prev_field[0].innerHTML,
                    type: 'column',
                    data: kecamatan_keys_mtd.map(i => (res.data_lending2).map(bFormatter)[i])
                        .slice(0, 5)
                }, {
                    name: 'Lending ' + months_field[0].innerHTML,
                    type: 'column',
                    data: kecamatan_keys_mtd.map(i => (res.data_lending).map(bFormatter)[i])
                        .slice(0, 5)
                }])
                chart_kecamatan_mtd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: kecamatan_keys_mtd.map(i => (res.data_tipe)[i]).slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'kecamatan',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                var kecamatan_keys_ytd = Array.from((res.data_lending).keys()).sort((a, b) => (res
                    .data_lending)[b] - (res.data_lending)[a])
                chart_kecamatan_ytd_3.updateSeries([{
                    name: 'Lending ' + years_prev_field[0].innerHTML,
                    type: 'column',
                    data: kecamatan_keys_ytd.map(i => (res.data_lending2).map(bFormatter)[i])
                        .slice(0, 5)
                }, {
                    name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' + month_name((
                        new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: kecamatan_keys_ytd.map(i => (res.data_lending).map(bFormatter)[i])
                        .slice(0, 5)
                }])
                chart_kecamatan_ytd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: kecamatan_keys_ytd.map(i => (res.data_tipe)[i]).slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        kecamatan_mtd = $('#kecamatan_mtd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'kecamatan',
                    'params': 'curr_month',
                    'params2': 'last_month'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        kecamatan_ytd = $('#kecamatan_ytd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'kecamatan',
                    'params': 'curr_year',
                    'params2': 'last_year'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
    }

    function show_content_gaji() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'gaji',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                chart_gaji_mtd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_gaji_mtd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: (res.data_tipe).map(mFormatter),
                })
                chart_gaji_mtd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_gaji_mtd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: (res.data_tipe).map(mFormatter),
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'gaji',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                chart_gaji_ytd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_gaji_ytd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: (res.data_tipe).map(mFormatter),
                })
                chart_gaji_ytd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_gaji_ytd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: (res.data_tipe).map(mFormatter),
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'gaji',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                var gaji_keys_mtd = Array.from((res.data_lending).keys()).sort((a, b) => (res.data_lending)[
                    b] - (res.data_lending)[a])
                chart_gaji_mtd_3.updateSeries([{
                    name: 'Lending ' + months_prev_field[0].innerHTML,
                    type: 'column',
                    data: gaji_keys_mtd.map(i => (res.data_lending2).map(bFormatter)[i]).slice(
                        0, 5)
                }, {
                    name: 'Lending ' + months_field[0].innerHTML,
                    type: 'column',
                    data: gaji_keys_mtd.map(i => (res.data_lending).map(bFormatter)[i]).slice(0,
                        5)
                }])
                chart_gaji_mtd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: gaji_keys_mtd.map(i => (res.data_tipe).map(mFormatter)[i])
                            .slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'gaji',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                var gaji_keys_ytd = Array.from((res.data_lending).keys()).sort((a, b) => (res.data_lending)[
                    b] - (res.data_lending)[a])
                chart_gaji_ytd_3.updateSeries([{
                    name: 'Lending ' + years_prev_field[0].innerHTML,
                    type: 'column',
                    data: gaji_keys_ytd.map(i => (res.data_lending2).map(bFormatter)[i]).slice(
                        0, 5)
                }, {
                    name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' + month_name((
                        new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: gaji_keys_ytd.map(i => (res.data_lending).map(bFormatter)[i]).slice(0,
                        5)
                }])
                chart_gaji_ytd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: gaji_keys_ytd.map(i => (res.data_tipe).map(mFormatter)[i])
                            .slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        gaji_mtd = $('#gaji_mtd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'gaji',
                    'params': 'curr_month',
                    'params2': 'last_month'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [1],
                render: function(data, type, row, meta) {
                    return mFormatter(data);
                }
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        gaji_ytd = $('#gaji_ytd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'gaji',
                    'params': 'curr_year',
                    'params2': 'last_year'
                },
                datatype: "json"
            },
            columnDefs: [{
                    targets: [0],
                    orderable: false,
                }, {
                    targets: [1],
                    render: function(data, type, row, meta) {
                        return mFormatter(data);
                    }
                },
                {
                    targets: [2],
                    render: function(data, type, row, meta) {
                        return bFormatter(data);
                    }
                }, {
                    targets: [3],
                    render: function(data, type, row, meta) {
                        return bFormatter(data);
                    }
                }
            ],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
    }

    function show_content_umur() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'umur',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                chart_umur_mtd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_umur_mtd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
                chart_umur_mtd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_umur_mtd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'umur',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                chart_umur_ytd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_umur_ytd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
                chart_umur_ytd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_umur_ytd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'umur',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                var umur_keys_mtd = Array.from((res.data_lending).keys()).sort((a, b) => (res.data_lending)[
                    b] - (res.data_lending)[a])
                chart_umur_mtd_3.updateSeries([{
                    name: 'Lending ' + months_prev_field[0].innerHTML,
                    type: 'column',
                    data: umur_keys_mtd.map(i => (res.data_lending2).map(bFormatter)[i]).slice(
                        0, 5)
                }, {
                    name: 'Lending ' + months_field[0].innerHTML,
                    type: 'column',
                    data: umur_keys_mtd.map(i => (res.data_lending).map(bFormatter)[i]).slice(0,
                        5)
                }])
                chart_umur_mtd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: umur_keys_mtd.map(i => (res.data_tipe)[i]).slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'umur',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                var umur_keys_ytd = Array.from((res.data_lending).keys()).sort((a, b) => (res.data_lending)[
                    b] - (res.data_lending)[a])
                chart_umur_ytd_3.updateSeries([{
                    name: 'Lending ' + years_prev_field[0].innerHTML,
                    type: 'column',
                    data: umur_keys_ytd.map(i => (res.data_lending2).map(bFormatter)[i]).slice(
                        0, 5)
                }, {
                    name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' + month_name((
                        new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: umur_keys_ytd.map(i => (res.data_lending).map(bFormatter)[i]).slice(0,
                        5)
                }])
                chart_umur_ytd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: umur_keys_ytd.map(i => (res.data_tipe)[i]).slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        umur_mtd = $('#umur_mtd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'umur',
                    'params': 'curr_month',
                    'params2': 'last_month'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        umur_ytd = $('#umur_ytd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'umur',
                    'params': 'curr_year',
                    'params2': 'last_year'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
    }
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'pekerjaan',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                chart_pekerjaan_mtd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_pekerjaan_mtd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
                chart_pekerjaan_mtd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_pekerjaan_mtd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/pie_chartdata',
            data: {
                'tipe': 'pekerjaan',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                chart_pekerjaan_ytd.updateSeries((res.data_total).map(e => parseInt(e)))
                chart_pekerjaan_ytd.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
                chart_pekerjaan_ytd_2.updateSeries((res.data_total2).map(e => parseInt(e)))
                chart_pekerjaan_ytd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_tipe,
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'pekerjaan',
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                var pekerjaan_keys_mtd = Array.from((res.data_lending).keys()).sort((a, b) => (res
                    .data_lending)[b] - (res.data_lending)[a])
                chart_pekerjaan_mtd_3.updateSeries([{
                    name: 'Lending ' + months_prev_field[0].innerHTML,
                    type: 'column',
                    data: pekerjaan_keys_mtd.map(i => (res.data_lending2).map(
                        bFormatter)[i]).slice(0, 5)
                }, {
                    name: 'Lending ' + months_field[0].innerHTML,
                    type: 'column',
                    data: pekerjaan_keys_mtd.map(i => (res.data_lending).map(
                        bFormatter)[i]).slice(0, 5)
                }])
                chart_pekerjaan_mtd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: pekerjaan_keys_mtd.map(i => (res.data_tipe)[i]).slice(0,
                            5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/double_chartdata',
            data: {
                'tipe': 'pekerjaan',
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                var pekerjaan_keys_ytd = Array.from((res.data_lending).keys()).sort((a, b) => (res
                    .data_lending)[b] - (res.data_lending)[a])
                chart_pekerjaan_ytd_3.updateSeries([{
                    name: 'Lending ' + years_prev_field[0].innerHTML,
                    type: 'column',
                    data: pekerjaan_keys_ytd.map(i => (res.data_lending2).map(
                        bFormatter)[i]).slice(0, 5)
                }, {
                    name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' +
                        month_name((new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: pekerjaan_keys_ytd.map(i => (res.data_lending).map(
                        bFormatter)[i]).slice(0, 5)
                }])
                chart_pekerjaan_ytd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: pekerjaan_keys_ytd.map(i => (res.data_tipe)[i]).slice(0,
                            5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        pekerjaan_mtd = $('#pekerjaan_mtd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'pekerjaan',
                    'params': 'curr_month',
                    'params2': 'last_month'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        pekerjaan_ytd = $('#pekerjaan_ytd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/segment_customer/listdata',
                type: "POST",
                data: {
                    'tipe': 'pekerjaan',
                    'params': 'curr_year',
                    'params2': 'last_year'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
    });
    var api_fields = {
        'pekerjaan-field': [chart_pekerjaan_mtd, chart_pekerjaan_mtd_2, chart_pekerjaan_mtd_3, chart_pekerjaan_ytd,
            chart_pekerjaan_ytd_2, chart_pekerjaan_ytd_3
        ],
        'kecamatan-field': [chart_kecamatan_mtd, chart_kecamatan_mtd_2, chart_kecamatan_mtd_3, chart_kecamatan_ytd,
            chart_kecamatan_ytd_2, chart_kecamatan_ytd_3
        ],
        'pendidikan-field': [chart_pendidikan_mtd, chart_pendidikan_mtd_2, chart_pendidikan_mtd_3,
            chart_pendidikan_ytd, chart_pendidikan_ytd_2, chart_pendidikan_ytd_3
        ],
        'gaji-field': [chart_gaji_mtd, chart_gaji_mtd_2, chart_gaji_mtd_3, chart_gaji_ytd, chart_gaji_ytd_2,
            chart_gaji_ytd_3
        ],
        'umur-field': [chart_umur_mtd, chart_umur_mtd_2, chart_umur_mtd_3, chart_umur_ytd, chart_umur_ytd_2,
            chart_umur_ytd_3
        ],
    }
    var datatable_fields = {
        'kecamatan-field': ['#kecamatan_mtd_table', '#kecamatan_ytd_table'],
        'pendidikan-field': ['#pendidikan_mtd_table', '#pendidikan_ytd_table'],
        'gaji-field': ['#gaji_mtd_table', '#gaji_ytd_table'],
        'umur-field': ['#umur_mtd_table', '#umur_ytd_table'],
    }

    function hideOthers(apiField) {
        for (const key in api_fields) {
            if (key != apiField) {
                api_fields[key].forEach((val, idx) => {
                    val.resetSeries();
                })
            }
        }
        for (const key in datatable_fields) {
            if (key != apiField) {
                datatable_fields[key].forEach((val, idx) => {
                    $(val).DataTable().destroy();
                })
            }
        }
    }
</script>
<!-- / Content -->