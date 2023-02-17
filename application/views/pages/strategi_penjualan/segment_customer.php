<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_aov',true);
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
                                    <button  id="btn-historiw" class="badge btn bg-chart-active-2"
                                    onclick="show_this_field('pekerjaan-field',this.id)" type="button"><i class='bx bx-briefcase-alt-2'></i> Jenis
                                    Pekerjaan</button>
                                                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                <button  id="btn-historiw-jbrand" class="badge btn btn-history-null " onclick="show_this_field('pendidikan-field',this.id)"
                                    type="button"><i class='bx bxs-graduation me-1'></i>Jenis Pendidikan</button>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                    <button  id="btn-historiw-jbrand-1" class="badge btn btn-history-null "
                                    onclick="show_this_field('kecamatan-field',this.id)" type="button"><i
                                        class='bx bxs-school me-1'></i>Kecamatan</button>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                                    <button  id="btn-historiw-jbrand-2" class="badge btn btn-history-null "
                                    onclick="show_this_field('gaji-field',this.id)" type="button"><i class='bx bx-money-withdraw'></i>
                                    Gaji</button>
 
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="d-md-block">
                            <button  id="btn-historiw-jbrand-3" class="badge btn btn-history-null "
                            onclick="show_this_field('umur-field',this.id)" type="button"><i class='bx bxs-face'></i>
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
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>SMA</td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>D3</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>S1</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>S2</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
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
                                        <td>SMA</td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>D3</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>S1</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>S2</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
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
                                        <td>Fatmawati</td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Ciracas</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Cibubur</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Cibinong</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
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
                                        <td>Fatmawati</td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Ciracas</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Cibubur</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Cibinong</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
                                    </tr>
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
                                        <td>Guru</td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Dosen</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Wiraswasta</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Manager</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
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
                                        <td>Guru</td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Dosen</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Wiraswasta</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Manager</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
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
                                        <th>Gaji</th>
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td>1</td>
                                        <td>
                                            < 4 Juta </td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>4-10 Juta</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>10-15 Juta</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>15-25 Juta</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>> 25 Juta</td>
                                        <td>Rp 7,000,000,000</td>
                                        <td>Rp 10,000,000,000</td>
                                        <td>32</td>
                                        <td>45</td>
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
                                        <th>Gaji</th>
                                        <th>Lending MTD 2022</th>
                                        <th>Lending MTD 2023</th>
                                        <th>Unit MTD 2022</th>
                                        <th>Unit MTD 2023</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td>1</td>
                                        <td>
                                            < 4 Juta </td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>4-10 Juta</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>10-15 Juta</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>15-25 Juta</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>> 25 Juta</td>
                                        <td>Rp 7,000,000,000</td>
                                        <td>Rp 10,000,000,000</td>
                                        <td>32</td>
                                        <td>45</td>
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
                                        <td>
                                            20-25 Tahun </td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>26-30 Tahun</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>31-40 Tahun</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>41-45 Tahun</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
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
                                        <td>
                                            20-25 Tahun </td>
                                        <td>Rp 3,000,000,000</td>
                                        <td>Rp 1,000,000,000</td>
                                        <td>34</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>26-30 Tahun</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>8</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>31-40 Tahun</td>
                                        <td>Rp 4,000,000,000</td>
                                        <td>Rp 6,000,000,000</td>
                                        <td>12</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>41-45 Tahun</td>
                                        <td>Rp 5,000,000,000</td>
                                        <td>Rp 8,000,000,000</td>
                                        <td>14</td>
                                        <td>23</td>
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
    const btns_db = [btn_histori,btn_histori_jbrand,btn_histori_jbrand_1,btn_histori_jbrand_2,btn_histori_jbrand_3]
    //fields
    const pendidikan_field = document.querySelector('#pendidikan-field')
    const kecamatan_field = document.querySelector('#kecamatan-field')
    const pekerjaan_field = document.querySelector('#pekerjaan-field')
    const gaji_field = document.querySelector('#gaji-field')
    const umur_field = document.querySelector('#umur-field')
    const fields_db = [pendidikan_field,kecamatan_field,pekerjaan_field,gaji_field,umur_field]
    function show_this_field(field_name,btn_name){
        document.querySelector('#'+field_name).classList.remove('d-none');
        fields_db.forEach((field,idx)=>{
            if (field!=document.querySelector('#'+field_name)&&!field.classList.contains('d-none')) {
                field.classList.add('d-none');
            }
        })
        btns_db.forEach((btn,idx)=>{
            if (btn!=document.querySelector('#'+btn_name)&&btn.classList.contains('bg-chart-active-2')) {
                btn.classList.remove('bg-chart-active-2');
                btn.classList.add('btn-history-null');
            }
        })
        if (!document.querySelector('#'+btn_name).classList.contains('bg-chart-active-2')) {
            document.querySelector('#'+btn_name).classList.remove('btn-history-null');
            document.querySelector('#'+btn_name).classList.add('bg-chart-active-2');
        }
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
        labels: ['SMA', 'D3', 'S1', 'S2'],
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
        labels: ['SMA', 'D3', 'S1', 'S2'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Jenis Pendidikan',
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
            categories: ['SMA', 'D3', 'S1', 'S2'],
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
        labels: ['SMA', 'D3', 'S1', 'S2'],
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
        labels: ['SMA', 'D3', 'S1', 'S2'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Jenis Pendidikan',
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
            categories: ['SMA', 'D3', 'S1', 'S2'],
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
        labels: ['Fatmawati', 'Ciracas', 'Cibubur', 'Cibinong'],
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
        labels: ['Fatmawati', 'Ciracas', 'Cibubur', 'Cibinong'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Kecamatan',
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
            categories: ['Fatmawati', 'Ciracas', 'Cibubur', 'Cibinong'],
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
        labels: ['Fatmawati', 'Ciracas', 'Cibubur', 'Cibinong'],
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
        labels: ['Fatmawati', 'Ciracas', 'Cibubur', 'Cibinong'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Kecamatan',
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
            categories: ['Fatmawati', 'Ciracas', 'Cibubur', 'Cibinong'],
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
        labels: ['Fatmawati', 'Ciracas', 'Cibubur', 'Cibinong'],
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
        labels: ['Fatmawati', 'Ciracas', 'Cibubur', 'Cibinong'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Jenis Pekerjaan',
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
            categories: ['Fatmawati', 'Ciracas', 'Cibubur', 'Cibinong'],
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
        labels: ['Guru', 'Wiraswasta', 'Manager', 'Dosen'],
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
        labels: ['Guru', 'Wiraswasta', 'Manager', 'Dosen'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Jenis Pekerjaan',
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
            categories: ['Guru', 'Wiraswasta', 'Manager', 'Dosen'],
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
        series: [44, 55, 13, 43, 54],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['< 4 Juta', '4-10 Juta', '10-15 Juta', '15-25 Juta','> 25 Juta'],
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
        series: [44, 55, 13, 43, 54],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['< 4 Juta', '4-10 Juta', '10-15 Juta', '15-25 Juta','> 25 Juta'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24, 54]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42, 45]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Gaji',
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
            categories: ['< 4 Juta', '4-10 Juta', '10-15 Juta', '15-25 Juta','> 25 Juta'],
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
        series: [44, 55, 13, 43, 54],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['< 4 Juta', '4-10 Juta', '10-15 Juta', '15-25 Juta','> 25 Juta'],
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
        series: [44, 55, 13, 43, 54],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['< 4 Juta', '4-10 Juta', '10-15 Juta', '15-25 Juta','> 25 Juta'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24, 45]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42, 54]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Gaji',
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
            categories: ['< 4 Juta', '4-10 Juta', '10-15 Juta', '15-25 Juta','> 25 Juta'],
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
        labels: ['20-25 Tahun', '26-30 Tahun', '31-40 Tahun', '41-45 Tahun'],
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
        labels: ['20-25 Tahun', '26-30 Tahun', '31-40 Tahun', '41-45 Tahun'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Umur',
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
            categories: ['20-25 Tahun', '26-30 Tahun', '31-40 Tahun', '41-45 Tahun'],
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
        labels: ['20-25 Tahun', '26-30 Tahun', '31-40 Tahun', '41-45 Tahun'],
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
        labels: ['20-25 Tahun', '26-30 Tahun', '31-40 Tahun', '41-45 Tahun'],
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
            name: "Lending Jan 2023",
            type:'column',
            data: [45, 52, 38, 24]
        },
        {
            name: "Lending Feb 2023",
            type:'column',
            data: [35, 41, 62, 42]
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
            width: [1,1]
        },
        title: {
            text: 'Lending Umur',
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
            categories: ['20-25 Tahun', '26-30 Tahun', '31-40 Tahun', '41-45 Tahun'],
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