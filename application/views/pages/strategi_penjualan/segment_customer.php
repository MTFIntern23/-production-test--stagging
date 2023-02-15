<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_jbrand_seg', false);
    sessionStorage.setItem('is_jbrand_seg_1', false);
    sessionStorage.setItem('is_jbrand_seg_2', false);
    sessionStorage.setItem('is_jbrand_seg_3', false);
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
                                <button  id="btn-historiw" class="badge btn bg-chart-active-2" onclick="show_pendikan()"
                                    type="button"><i class='bx bxs-graduation me-1'></i>Jenis Pendidikan</button>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                    <button  id="btn-historiw-jbrand" class="badge btn btn-history-null "
                                    onclick="show_kecamatan()" type="button"><i
                                        class='bx bxs-school me-1'></i>Kecamatan</button>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                    <button  id="btn-historiw-jbrand-1" class="badge btn btn-history-null "
                                    onclick="show_pekerjaan()" type="button"><i class='bx bx-briefcase-alt-2'></i> Jenis
                                    Pekerjaan</button>
                                                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                    <button  id="btn-historiw-jbrand-2" class="badge btn btn-history-null "
                                    onclick="show_gaji()" type="button"><i class='bx bx-money-withdraw'></i>
                                    Gaji</button>
 
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                            <button  id="btn-historiw-jbrand-3" class="badge btn btn-history-null "
                                    onclick="show_umur()" type="button"><i class='bx bxs-face'></i>
                                    Umur</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div id="pendidikan-field">
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
                    <!-- <div class="row  ms-2 me-2 mt-3">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <h5 class="text-dark fs-5 text-start">
                                    <b>Top 5</b> Jenis Pendidikan Cabang
                                    <?= $current_cabang->nama_cabang;?>
                                </h5>
                            </div>
                        </div>
                    </div> -->
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
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mitsubishi</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Agung Auto</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>205</td>
                                        <td>205</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>PT Cipta Karya</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
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
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>S1 YTD</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>D3</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>SMA</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
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
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mitsubishi</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Agung Auto</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>205</td>
                                        <td>205</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>PT Cipta Karya</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
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
                                        <th>Lending MTD 2022</th>
                                        <th>Lending MTD 2023</th>
                                        <th>Unit MTD 2022</th>
                                        <th>Unit MTD 2023</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tanah Abang</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pasar Senen</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Harmoni</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>
                </div>

                <div id="pekerjaan-field" class="d-none">
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
                                    <div class="select-filter col-xl-3 col-lg-3 col-md-5 col-sm-12" style="margin-right: -15px;">
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
                                        <button class="btn btn-warning btn-search" onclick="" type="button"><i
                                                class='bx bx-search me-1'></i>Search</button>
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
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Buruh</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Dosen</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>205</td>
                                        <td>205</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Manager</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
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
                                        <th>Lending MTD 2022</th>
                                        <th>Lending MTD 2023</th>
                                        <th>Unit MTD 2022</th>
                                        <th>Unit MTD 2023</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Manager</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Teller</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Wiraswasta</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
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
                                        <th>gaji</th>
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Buruh</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Dosen</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>205</td>
                                        <td>205</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Manager</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
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
                                        <th>gaji</th>
                                        <th>Lending MTD 2022</th>
                                        <th>Lending MTD 2023</th>
                                        <th>Unit MTD 2022</th>
                                        <th>Unit MTD 2023</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Manager</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Teller</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Wiraswasta</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
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
                                        <th>umur</th>
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Buruh</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Dosen</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>205</td>
                                        <td>205</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Manager</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
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
                                        <th>umur</th>
                                        <th>Lending MTD 2022</th>
                                        <th>Lending MTD 2023</th>
                                        <th>Unit MTD 2022</th>
                                        <th>Unit MTD 2023</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Manager</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Teller</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Wiraswasta</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
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
    //button
    const btn_histori = document.querySelector('#btn-historiw')
    const btn_histori_jbrand = document.querySelector('#btn-historiw-jbrand')
    const btn_histori_jbrand_1 = document.querySelector('#btn-historiw-jbrand-1')
    const btn_histori_jbrand_2 = document.querySelector('#btn-historiw-jbrand-2')
    const btn_histori_jbrand_3 = document.querySelector('#btn-historiw-jbrand-3')

    // row
    const pendidikan_field = document.querySelector('#pendidikan-field')
    const kecamatan_field = document.querySelector('#kecamatan-field')
    const pekerjaan_field = document.querySelector('#pekerjaan-field')
    const gaji_field = document.querySelector('#gaji-field')
    const umur_field = document.querySelector('#umur-field')

    //1 kecamatan
    //btn session
    // merubah warna kecamatan
    if ((sessionStorage.getItem("is_jbrand_seg") == 'true')) {
        if (btn_histori_jbrand.classList.contains('btn-history-null')) {
            btn_histori_jbrand.classList.remove('btn-history-null');
        }
        if (!btn_histori_jbrand.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand.classList.add('bg-chart-active-2');
        }
        btn_histori.classList.remove('bg-chart-active-2');
        btn_histori.classList.add('btn-history-null');
        btn_histori_jbrand_1.classList.remove('bg-chart-active-2');
        btn_histori_jbrand_1.classList.add('btn-history-null');
    }
    //chart field session
    if (sessionStorage.getItem("is_jbrand_seg") == 'true') {
        kecamatan_field.classList.remove('d-none'); // block = menampilkan
        if (!pendidikan_field.classList.contains('d-none')) {
            pendidikan_field.classList.add('d-none'); // hilangkan warna pendidikan
        }
    } else {
        pendidikan_field.classList.remove('d-none'); // jika tidak tampilkan pendidikan dan hilangkan kecamatan, pekerjaan
        if (!kecamatan_field.classList.contains('d-none')) {
            kecamatan_field.classList.add('d-none');
        }

        if (!pekerjaan_field.classList.contains('d-none')) {
            pekerjaan_field.classList.add('d-none');
        }
    }

    // 2 jenis pekerjaan
    //btn session
    if ((sessionStorage.getItem("is_jbrand_seg_1") == 'true')) {
        if (btn_histori_jbrand_1.classList.contains('btn-history-null')) {
            btn_histori_jbrand_1.classList.remove('btn-history-null');
        }
        if (!btn_histori_jbrand_1.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_1.classList.add('bg-chart-active-2');
        }
        btn_histori.classList.remove('bg-chart-active-2');
        btn_histori.classList.add('btn-history-null');
        btn_histori_jbrand.classList.remove('bg-chart-active-2');
        btn_histori_jbrand.classList.add('btn-history-null');
    }
    //chart field session
    if (sessionStorage.getItem("is_jbrand_seg_1") == 'true') {
        pekerjaan_field.classList.remove('d-none'); // tampilkan pekerjaan 
        if (!pendidikan_field.classList.contains('d-none')) {
            pendidikan_field.classList.add('d-none'); // hilangkan warna pendidikan
        }
        if (!kecamatan_field.classList.contains('d-none')) {
            kecamatan_field.classList.add('d-none'); // hilangkan warna pendidikan
        }
    } else {
        pendidikan_field.classList.remove('d-none');
        kecamatan_field.classList.add('d-none'); // jika tidak maka tampilkan pendidikan atau kecamatan

        if (!pekerjaan_field.classList.contains('d-none')) {
            pekerjaan_field.classList.add('d-none');
        }
    }

    // 3 Gaji
    //btn session
    if ((sessionStorage.getItem("is_jbrand_seg_2") == 'true')) {
        if (btn_histori_jbrand_2.classList.contains('btn-history-null')) {
            btn_histori_jbrand_2.classList.remove('btn-history-null');
        }
        if (!btn_histori_jbrand_2.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_2.classList.add('bg-chart-active-2');
        }
        btn_histori.classList.remove('bg-chart-active-2');
        btn_histori.classList.add('btn-history-null');
        btn_histori_jbrand.classList.remove('bg-chart-active-2');
        btn_histori_jbrand.classList.add('btn-history-null');
        btn_histori_jbrand_1.classList.remove('bg-chart-active-2');
        btn_histori_jbrand_1.classList.add('btn-history-null');
    }
    //chart field session
    if (sessionStorage.getItem("is_jbrand_seg_2") == 'true') {
        gaji_field.classList.remove('d-none'); // tampilkan gaji 
        if (!pendidikan_field.classList.contains('d-none')) {
            pendidikan_field.classList.add('d-none'); // hilangkan warna pendidikan
        }
        if (!kecamatan_field.classList.contains('d-none')) {
            kecamatan_field.classList.add('d-none'); // hilangkan warna kecamatan
        }
        if (!pekerjaan_field.classList.contains('d-none')) {
            pekerjaan_field.classList.add('d-none'); // hilangkan warna pekerjaan
        }
    } else {
        pendidikan_field.classList.remove('d-none');
        kecamatan_field.classList.add('d-none'); // jika tidak maka tampilkan pendidikan, kecamatan, pekerjaan
        pekerjaan_field.classList.add('d-none');

        if (!gaji_field.classList.contains('d-none')) {
            gaji_field.classList.add('d-none');
        }
    }

    // 4 Umur
    //btn session
    if ((sessionStorage.getItem("is_jbrand_seg_3") == 'true')) {
        if (btn_histori_jbrand_3.classList.contains('btn-history-null')) {
            btn_histori_jbrand_3.classList.remove('btn-history-null');
        }
        if (!btn_histori_jbrand_3.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_3.classList.add('bg-chart-active-2');
        }
        btn_histori.classList.remove('bg-chart-active-2');
        btn_histori.classList.add('btn-history-null');
        btn_histori_jbrand.classList.remove('bg-chart-active-2');
        btn_histori_jbrand.classList.add('btn-history-null');
        btn_histori_jbrand_1.classList.remove('bg-chart-active-2');
        btn_histori_jbrand_1.classList.add('btn-history-null');
        btn_histori_jbrand_2.classList.remove('bg-chart-active-2');
        btn_histori_jbrand_2.classList.add('btn-history-null');
    }
    //chart field session
    if (sessionStorage.getItem("is_jbrand_seg_3") == 'true') {
        umur_field.classList.remove('d-none'); // tampilkan umur 
        if (!pendidikan_field.classList.contains('d-none')) {
            pendidikan_field.classList.add('d-none'); // hilangkan warna pendidikan
        }
        if (!kecamatan_field.classList.contains('d-none')) {
            kecamatan_field.classList.add('d-none'); // hilangkan warna kecamatan
        }
        if (!pekerjaan_field.classList.contains('d-none')) {
            pekerjaan_field.classList.add('d-none'); // hilangkan warna pekerjaan
        }
        if (!gaji_field.classList.contains('d-none')) {
            gaji_field.classList.add('d-none'); // hilangkan warna gaji
        }
    } else {
        pendidikan_field.classList.remove('d-none');
        kecamatan_field.classList.add('d-none'); // jika tidak maka tampilkan pendidikan, kecamatan, pekerjaan, gaji
        pekerjaan_field.classList.add('d-none');
        gaji_field.classList.add('d-none');

        if (!umur_field.classList.contains('d-none')) {
            umur_field.classList.add('d-none');
        }
    }

    // show btn
    function show_pendikan() {
        sessionStorage.setItem('is_jbrand_seg', false);
        sessionStorage.setItem('is_jbrand_seg_1', false);
        sessionStorage.setItem('is_jbrand_seg_2', false);
        sessionStorage.setItem('is_jbrand_seg_3', false);
        pendidikan_field.classList.remove('d-none');
        if (!kecamatan_field.classList.contains('d-none')) {
            kecamatan_field.classList.add('d-none');
        }
        if (!pekerjaan_field.classList.contains('d-none')) {
            pekerjaan_field.classList.add('d-none');
        }
        if (!gaji_field.classList.contains('d-none')) {
            gaji_field.classList.add('d-none');
        }
        if (!umur_field.classList.contains('d-none')) {
            umur_field.classList.add('d-none');
        }
        //btn
        if (btn_histori_jbrand.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand.classList.remove('bg-chart-active-2');
            btn_histori_jbrand.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_1.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_1.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_1.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_2.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_2.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_2.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_3.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_3.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_3.classList.add('btn-history-null');
        }
        if (!btn_histori.classList.contains('bg-chart-active-2')) {
            btn_histori.classList.remove('btn-history-null');
            btn_histori.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
    }
    function show_kecamatan() {
        sessionStorage.setItem('is_jbrand_seg', true);
        sessionStorage.setItem('is_jbrand_seg_1', false);
        sessionStorage.setItem('is_jbrand_seg_2', false);
        sessionStorage.setItem('is_jbrand_seg_3', false);
        kecamatan_field.classList.remove('d-none');
        if (!pendidikan_field.classList.contains('d-none')) {
            pendidikan_field.classList.add('d-none');
        }
        if (!pekerjaan_field.classList.contains('d-none')) {
            pekerjaan_field.classList.add('d-none');
        }
        if (!gaji_field.classList.contains('d-none')) {
            gaji_field.classList.add('d-none');
        }
        if (!umur_field.classList.contains('d-none')) {
            umur_field.classList.add('d-none');
        }
        //btn
        if (btn_histori.classList.contains('bg-chart-active-2')) {
            btn_histori.classList.remove('bg-chart-active-2');
            btn_histori.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_1.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_1.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_1.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_2.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_2.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_2.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_3.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_3.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_3.classList.add('btn-history-null');
        }
        if (!btn_histori_jbrand.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand.classList.remove('btn-history-null');
            btn_histori_jbrand.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
    }
    function show_pekerjaan() {
        sessionStorage.setItem('is_jbrand_seg', false);
        sessionStorage.setItem('is_jbrand_seg_1', true);
        sessionStorage.setItem('is_jbrand_seg_2', false);
        sessionStorage.setItem('is_jbrand_seg_3', false);
        pekerjaan_field.classList.remove('d-none');
        if (!pendidikan_field.classList.contains('d-none')) {
            pendidikan_field.classList.add('d-none');
        }
        if (!kecamatan_field.classList.contains('d-none')) {
            kecamatan_field.classList.add('d-none');
        }
        if (!gaji_field.classList.contains('d-none')) {
            gaji_field.classList.add('d-none');
        }
        if (!umur_field.classList.contains('d-none')) {
            umur_field.classList.add('d-none');
        }
        //btn
        if (btn_histori.classList.contains('bg-chart-active-2')) {
            btn_histori.classList.remove('bg-chart-active-2');
            btn_histori.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand.classList.remove('bg-chart-active-2');
            btn_histori_jbrand.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_2.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_2.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_2.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_3.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_3.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_3.classList.add('btn-history-null');
        }
        if (!btn_histori_jbrand_1.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_1.classList.remove('btn-history-null');
            btn_histori_jbrand_1.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
    }
    function show_gaji() {
        sessionStorage.setItem('is_jbrand_seg', false);
        sessionStorage.setItem('is_jbrand_seg_1', false);
        sessionStorage.setItem('is_jbrand_seg_2', true);
        sessionStorage.setItem('is_jbrand_seg_3', false);
        gaji_field.classList.remove('d-none');
        if (!pendidikan_field.classList.contains('d-none')) {
            pendidikan_field.classList.add('d-none');
        }
        if (!kecamatan_field.classList.contains('d-none')) {
            kecamatan_field.classList.add('d-none');
        }
        if (!pekerjaan_field.classList.contains('d-none')) {
            pekerjaan_field.classList.add('d-none');
        }
        if (!umur_field.classList.contains('d-none')) {
            umur_field.classList.add('d-none');
        }
        //btn
        if (btn_histori.classList.contains('bg-chart-active-2')) {
            btn_histori.classList.remove('bg-chart-active-2');
            btn_histori.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand.classList.remove('bg-chart-active-2');
            btn_histori_jbrand.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_1.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_1.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_1.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_3.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_3.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_3.classList.add('btn-history-null');
        }
        if (!btn_histori_jbrand_2.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_2.classList.remove('btn-history-null');
            btn_histori_jbrand_2.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
    }
    function show_umur() {
        sessionStorage.setItem('is_jbrand_seg', false);
        sessionStorage.setItem('is_jbrand_seg_1', false);
        sessionStorage.setItem('is_jbrand_seg_2', false);
        sessionStorage.setItem('is_jbrand_seg_3', true);
        umur_field.classList.remove('d-none');
        if (!pendidikan_field.classList.contains('d-none')) {
            pendidikan_field.classList.add('d-none');
        }
        if (!kecamatan_field.classList.contains('d-none')) {
            kecamatan_field.classList.add('d-none');
        }
        if (!pekerjaan_field.classList.contains('d-none')) {
            pekerjaan_field.classList.add('d-none');
        }
        if (!gaji_field.classList.contains('d-none')) {
            gaji_field.classList.add('d-none');
        }
        //btn
        if (btn_histori.classList.contains('bg-chart-active-2')) {
            btn_histori.classList.remove('bg-chart-active-2');
            btn_histori.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand.classList.remove('bg-chart-active-2');
            btn_histori_jbrand.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_1.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_1.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_1.classList.add('btn-history-null');
        }
        if (btn_histori_jbrand_2.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_2.classList.remove('bg-chart-active-2');
            btn_histori_jbrand_2.classList.add('btn-history-null');
        }
        if (!btn_histori_jbrand_3.classList.contains('bg-chart-active-2')) {
            btn_histori_jbrand_3.classList.remove('btn-history-null');
            btn_histori_jbrand_3.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
    }
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_customer", "dealer"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["Captive Fleet", "Captive KKB", "Captive Multiguna", "Reguler Retail", "Reguler Multiguna",
                "Reguler Fleet"
            ],
            'sub2': ["New", "Second"],
            'sub3': ["Aji Andika", "Abyan Estu", "Ana Lestari", "Budi Yoga", "Yupi Wardana", "Oti Satria",
                "Haydar Ekawira", "Hamid Irawan", "Rania Parama"
            ],
            'sub4': ["NONRO", "RO"],
            'sub5': ["PT Cipta Karya", "Tunas", "Agung Auto", "PT Ida", "PT Sukacita", "Benny Automotives",
                "Kelapa Hijau", "PT Prakarsa", "Taskia Auto"
            ]
        }

        if (dataFilter == "all") {
            areaSubFilter.forEach((subs) => {
                subs.innerHTML = callSubFilter(subFilters.sub0);
                subs.setAttribute("disabled", 'true');
            })
        }
        filters.forEach((filter, idx) => {
            if (dataFilter == filter) {
                areaSubFilter.forEach((subs) => {
                    subs.innerHTML = callSubFilter(subFilters['sub' + (idx + 1)]);
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
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart:
        {
            height: 330,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_pendidikan_mtd = new ApexCharts(document.querySelector("#pendidikan_mtd_chart"),
        options_pendidikan_mtd);
    chart_pendidikan_mtd.render();

    var options_pendidikan_mtd_2 = {
        title: {
            text: 'MTD <?php  $oneMonthAgo = new \DateTime("1 month ago");echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart:
        {
            height: 330,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_pendidikan_mtd_2 = new ApexCharts(document.querySelector("#pendidikan_mtd_chart_2"),
        options_pendidikan_mtd_2);
    chart_pendidikan_mtd_2.render();

    var options_pendidikan_mtd_3 = {
        series: [{
            name: "History Assets MTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_pendidikan_mtd_3 = new ApexCharts(document.querySelector("#pendidikan_mtd_chart_3"),
        options_pendidikan_mtd_3);
    chart_pendidikan_mtd_3.render();

    // chart history_assets ytd
    var options_pendidikan_ytd = {
        title: {
            text: 'YTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_pendidikan_ytd = new ApexCharts(document.querySelector("#pendidikan_ytd_chart"),
        options_pendidikan_ytd);
    chart_pendidikan_ytd.render();

    var options_pendidikan_ytd_2 = {
        title: {
            text: 'YTD <?php  $oneMonthAgo = new \DateTime("1 month ago");echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_pendidikan_ytd_2 = new ApexCharts(document.querySelector("#pendidikan_ytd_chart_2"),
        options_pendidikan_ytd_2);
    chart_pendidikan_ytd_2.render();

    var options_pendidikan_ytd_3 = {
        series: [{
            name: "Pendidikan YTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_pendidikan_ytd_3 = new ApexCharts(document.querySelector("#pendidikan_ytd_chart_3"),
        options_pendidikan_ytd_3);
    chart_pendidikan_ytd_3.render();

    // chart kecamatan mtd
    var options_kecamatan_mtd = {
        title: {
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_kecamatan_mtd = new ApexCharts(document.querySelector("#kecamatan_mtd_chart"),
        options_kecamatan_mtd);
    chart_kecamatan_mtd.render();

    var options_kecamatan_mtd_2 = {
        title: {
            text: 'MTD <?php  $oneMonthAgo = new \DateTime("1 month ago");echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_kecamatan_mtd_2 = new ApexCharts(document.querySelector("#kecamatan_mtd_chart_2"),
        options_kecamatan_mtd_2);
    chart_kecamatan_mtd_2.render();

    var options_kecamatan_mtd_3 = {
        series: [{
            name: "Kecamatan MTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_kecamatan_mtd_3 = new ApexCharts(document.querySelector("#kecamatan_mtd_chart_3"),
        options_kecamatan_mtd_3);
    chart_kecamatan_mtd_3.render();

    // chart kecamatan ytd
    var options_kecamatan_ytd = {
        title: {
            text: 'YTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_kecamatan_ytd = new ApexCharts(document.querySelector("#kecamatan_ytd_chart"),
        options_kecamatan_ytd);
    chart_kecamatan_ytd.render();

    var options_kecamatan_ytd_2 = {
        title: {
            text: 'YTD <?php $oneMonthAgo = new \DateTime("1 month ago"); echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_kecamatan_ytd_2 = new ApexCharts(document.querySelector("#kecamatan_ytd_chart_2"),
        options_kecamatan_ytd_2);
    chart_kecamatan_ytd_2.render();

    var options_kecamatan_ytd_3 = {
        series: [{
            name: "kecamatan YTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_kecamatan_ytd_3 = new ApexCharts(document.querySelector("#kecamatan_ytd_chart_3"),
        options_kecamatan_ytd_3);
    chart_kecamatan_ytd_3.render();

    // chart pekerjaan mtd
    var options_pekerjaan_mtd = {
        title: {
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_pekerjaan_mtd = new ApexCharts(document.querySelector("#pekerjaan_mtd_chart"),
        options_pekerjaan_mtd);
    chart_pekerjaan_mtd.render();

    var options_pekerjaan_mtd_2 = {
        title: {
            text: 'MTD <?php  $oneMonthAgo = new \DateTime("1 month ago");echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_pekerjaan_mtd_2 = new ApexCharts(document.querySelector("#pekerjaan_mtd_chart_2"),
        options_pekerjaan_mtd_2);
    chart_pekerjaan_mtd_2.render();

    var options_pekerjaan_mtd_3 = {
        series: [{
            name: "pekerjaan MTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_pekerjaan_mtd_3 = new ApexCharts(document.querySelector("#pekerjaan_mtd_chart_3"),
        options_pekerjaan_mtd_3);
    chart_pekerjaan_mtd_3.render();


    // chart pekerjaan ytd
    var options_pekerjaan_ytd = {
        title: {
            text: 'YTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_pekerjaan_ytd = new ApexCharts(document.querySelector("#pekerjaan_ytd_chart"),
        options_pekerjaan_ytd);
    chart_pekerjaan_ytd.render();

    var options_pekerjaan_ytd_2 = {
        title: {
            text: 'YTD <?php $oneMonthAgo = new \DateTime("1 month ago"); echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_pekerjaan_ytd_2 = new ApexCharts(document.querySelector("#pekerjaan_ytd_chart_2"),
        options_pekerjaan_ytd_2);
    chart_pekerjaan_ytd_2.render();

    var options_pekerjaan_ytd_3 = {
        series: [{
            name: "pekerjaan YTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_pekerjaan_ytd_3 = new ApexCharts(document.querySelector("#pekerjaan_ytd_chart_3"),
        options_pekerjaan_ytd_3);
    chart_pekerjaan_ytd_3.render();

    // chart gaji mtd
    var options_gaji_mtd = {
        title: {
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_gaji_mtd = new ApexCharts(document.querySelector("#gaji_mtd_chart"),
        options_gaji_mtd);
    chart_gaji_mtd.render();

    var options_gaji_mtd_2 = {
        title: {
            text: 'MTD <?php  $oneMonthAgo = new \DateTime("1 month ago");echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_gaji_mtd_2 = new ApexCharts(document.querySelector("#gaji_mtd_chart_2"),
        options_gaji_mtd_2);
    chart_gaji_mtd_2.render();

    var options_gaji_mtd_3 = {
        series: [{
            name: "gaji MTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_gaji_mtd_3 = new ApexCharts(document.querySelector("#gaji_mtd_chart_3"),
        options_gaji_mtd_3);
    chart_gaji_mtd_3.render();


    // chart gaji ytd
    var options_gaji_ytd = {
        title: {
            text: 'YTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_gaji_ytd = new ApexCharts(document.querySelector("#gaji_ytd_chart"),
        options_gaji_ytd);
    chart_gaji_ytd.render();

    var options_gaji_ytd_2 = {
        title: {
            text: 'YTD <?php $oneMonthAgo = new \DateTime("1 month ago"); echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_gaji_ytd_2 = new ApexCharts(document.querySelector("#gaji_ytd_chart_2"),
        options_gaji_ytd_2);
    chart_gaji_ytd_2.render();

    var options_gaji_ytd_3 = {
        series: [{
            name: "gaji YTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_gaji_ytd_3 = new ApexCharts(document.querySelector("#gaji_ytd_chart_3"),
        options_gaji_ytd_3);
    chart_gaji_ytd_3.render();

    // chart umur mtd
    var options_umur_mtd = {
        title: {
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_umur_mtd = new ApexCharts(document.querySelector("#umur_mtd_chart"),
        options_umur_mtd);
    chart_umur_mtd.render();

    var options_umur_mtd_2 = {
        title: {
            text: 'MTD <?php  $oneMonthAgo = new \DateTime("1 month ago");echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_umur_mtd_2 = new ApexCharts(document.querySelector("#umur_mtd_chart_2"),
        options_umur_mtd_2);
    chart_umur_mtd_2.render();

    var options_umur_mtd_3 = {
        series: [{
            name: "umur MTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_umur_mtd_3 = new ApexCharts(document.querySelector("#umur_mtd_chart_3"),
        options_umur_mtd_3);
    chart_umur_mtd_3.render();


    // chart umur ytd
    var options_umur_ytd = {
        title: {
            text: 'YTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_umur_ytd = new ApexCharts(document.querySelector("#umur_ytd_chart"),
        options_umur_ytd);
    chart_umur_ytd.render();

    var options_umur_ytd_2 = {
        title: {
            text: 'YTD <?php $oneMonthAgo = new \DateTime("1 month ago"); echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
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
    var chart_umur_ytd_2 = new ApexCharts(document.querySelector("#umur_ytd_chart_2"),
        options_umur_ytd_2);
    chart_umur_ytd_2.render();

    var options_umur_ytd_3 = {
        series: [{
            name: "umur YTD",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
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
    $(document).ready(function () {
        $('#pendidikan_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#pendidikan_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#kecamatan_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#kecamatan_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#pekerjaan_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#pekerjaan_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#gaji_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#gaji_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#umur_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#umur_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->