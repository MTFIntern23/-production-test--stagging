<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
        // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_kecamatan',false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        History Assets</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="border-bottom: 3px solid #202657;">
                    <h5 class="card-header text-dark fs-4 text-start">
                        History Assets <b>
                            <?= $current_cabang->nama_cabang;?>
                        </b>
                    </h5>
                    <div class="row ms-2 me-2">
                        <div class="col">
                            <div class="d-md-block">
                                <button id="btn-history" class="badge btn bg-chart-active-2" onclick="show_history()"
                                    type="button"><i class='bx bxs-car me-1'></i>Tipe Kendaraan</button>
                                <button id="btn-history-jbrand" class="badge btn btn-history-null "
                                    onclick="show_jbrand()" type="button"><i class='bx bxs-credit-card me-1'></i>Jenis
                                    Brand</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tipe-kendaraan-field" class="d-none">
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
                                            <option value="all">All</option>
                                            <option value="group_product">Group
                                                Product</option>
                                            <option value="so">SO</option>
                                            <option value="jenis_customer">Jenis
                                                Customer</option>
                                            <option value="jenis_pekerjaan">Jenis Pekerjaan</option>
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
                    <div class="row  ms-2 me-2 mt-3">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <h5 class="text-dark fs-5 text-start">
                                    <b>Top 5</b> Tipe Kendaraan Cabang
                                    <?= $current_cabang->nama_cabang;?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_mtd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                        <th>Lending MTD <span class="show_month"></span> (M)</th>
                                        <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                        <th>Unit MTD <span class="show_month"></span> (Unit)</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=1; 
                                        foreach ($current_month_history_tipe as $key=>$row) { ?>
                                        <tr>
                                            <td>
                                                <?= $no++;?>
                                            </td>
                                            <td>
                                                <?= htmlentities($row->tipe);?>
                                            </td>
                                            <td class="get_val">
                                                <?= htmlentities($last_month_history_tipe[$key]->mtd_amt);?>
                                            </td>
                                            <td class="get_val">
                                                <?= htmlentities($row->mtd_amt);?>
                                            </td>
                                            <td >
                                            <?= htmlentities($last_month_history_tipe[$key]->mtd_unit);?>
                                            </td>
                                            <td >
                                                <?= htmlentities($row->mtd_unit);?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>history_assets_detail/<?php echo $CI->security_idx->encrypt_url($row->id_tipe);?>"
                                                    onclick="sessionStorage.setItem('is_mtd', true);">
                                                    <button id="to_detail_mtd" type="button"
                                                        class="btn_session badge btn btn-primary me-2"><i
                                                            class='bx bx-detail me-1'></i>
                                                        Detail</button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_ytd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Lending YTD <span class="show_prev_year"></span> </th>
                                        <th>Lending YTD <span class="show_year"></span> </th>
                                        <th>Unit YTD <span class="show_prev_year"></span> </th>
                                        <th>Unit YTD <span class="show_year"></span> </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=1; 
                                        foreach ($current_year_history_tipe as $key=>$row) { ?>
                                        <tr>
                                            <td>
                                                <?= $no++;?>
                                            </td>
                                            <td>
                                                <?= htmlentities($row->tipe);?>
                                            </td>
                                            <td class="get_val">
                                                <?= htmlentities($last_year_history_tipe[$key]->mtd_amt);?>
                                            </td>
                                            <td class="get_val">
                                                <?= htmlentities($row->mtd_amt);?>
                                            </td>
                                            <td >
                                            <?= htmlentities($last_year_history_tipe[$key]->mtd_unit);?>
                                            </td>
                                            <td >
                                                <?= htmlentities($row->mtd_unit);?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>history_assets_detail/<?php echo $CI->security_idx->encrypt_url($row->id_tipe);?>"
                                                    onclick="sessionStorage.setItem('is_mtd', false);">
                                                    <button id="to_detail_mtd" type="button"
                                                        class="btn_session badge btn btn-primary me-2"><i
                                                            class='bx bx-detail me-1'></i>
                                                        Detail</button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>
                </div>
                <div id="jenis-brand-field" class="d-none">
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
                                            <option value="all">All</option>
                                            <option value="group_product">Group
                                                Product</option>
                                            </option>
                                            <option value="so">SO</option>
                                            <option value="jenis_customer">Jenis
                                                Customer</option>
                                            <option value="jenis_pekerjaan">Jenis Pekerjaan</option>
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
                    <div class="row  ms-2 me-2 mt-3">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <h5 class="text-dark fs-5 text-start">
                                    <b>Top 5</b> Jenis Brand Kendaraan Cabang
                                    <?= $current_cabang->nama_cabang;?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_jbrand_mtd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_jbrand_mtd_table"
                                class="table table-striped table-hover display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Brand Kendaraan</th>
                                        <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                        <th>Lending MTD <span class="show_month"></span> (M)</th>
                                        <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                        <th>Unit MTD <span class="show_month"></span> (Unit)</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=1; 
                                        foreach ($current_month_history_brand as $key=>$row) { ?>
                                        <tr>
                                            <td>
                                                <?= $no++;?>
                                            </td>
                                            <td>
                                                <?= htmlentities($row->brand);?>
                                            </td>
                                            <td class="get_val">
                                                <?= htmlentities($last_month_history_brand[$key]->mtd_amt);?>
                                            </td>
                                            <td class="get_val">
                                                <?= htmlentities($row->mtd_amt);?>
                                            </td>
                                            <td >
                                            <?= htmlentities($last_month_history_brand[$key]->mtd_unit);?>
                                            </td>
                                            <td >
                                                <?= htmlentities($row->mtd_unit);?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>history_assets_jbrand_detail/<?php echo $CI->security_idx->encrypt_url($row->id_brand);?>"
                                                    onclick="sessionStorage.setItem('is_mtd', true);">
                                                    <button id="to_detail_mtd" type="button"
                                                        class="btn_session badge btn btn-primary me-2"><i
                                                            class='bx bx-detail me-1'></i>
                                                        Detail</button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_jbrand_ytd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_jbrand_ytd_table"
                                class="table table-striped table-hover display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Brand Kendaraan</th>
                                        <th>Lending YTD <span class="show_prev_year"></span> </th>
                                        <th>Lending YTD <span class="show_year"></span> </th>
                                        <th>Unit YTD <span class="show_prev_year"></span> </th>
                                        <th>Unit YTD <span class="show_year"></span> </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=1; 
                                        foreach ($current_year_history_brand as $key=>$row) { ?>
                                        <tr>
                                            <td>
                                                <?= $no++;?>
                                            </td>
                                            <td>
                                                <?= htmlentities($row->brand);?>
                                            </td>
                                            <td class="get_val">
                                                <?= htmlentities($last_year_history_brand[$key]->mtd_amt);?>
                                            </td>
                                            <td class="get_val">
                                                <?= htmlentities($row->mtd_amt);?>
                                            </td>
                                            <td >
                                            <?= htmlentities($last_year_history_brand[$key]->mtd_unit);?>
                                            </td>
                                            <td >
                                                <?= htmlentities($row->mtd_unit);?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>history_assets_jbrand_detail/<?php echo $CI->security_idx->encrypt_url($row->id_brand);?>"
                                                    onclick="sessionStorage.setItem('is_mtd', false);">
                                                    <button id="to_detail_mtd" type="button"
                                                        class="btn_session badge btn btn-primary me-2"><i
                                                            class='bx bx-detail me-1'></i>
                                                        Detail</button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
    let num_abv = document.querySelectorAll('.get_val');
    let months_field = document.querySelectorAll('.show_month');
    let months_prev_field = document.querySelectorAll('.show_prev_month');
    let years_field = document.querySelectorAll('.show_year');
    let years_prev_field = document.querySelectorAll('.show_prev_year');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    months_field.forEach((field,idx)=>{
        field.innerHTML=month_name(new Date().getMonth()+1) + ' '+ (new Date().getFullYear());
        if(new Date().getMonth()==0){
            months_prev_field[idx].innerHTML=month_name(12) + ' '+ (new Date().getFullYear()-1);
        }else{
            months_prev_field[idx].innerHTML=month_name(new Date().getMonth()) + ' '+ (new Date().getFullYear());
        }
    })
    years_field.forEach((field,idx)=>{
        field.innerHTML=new Date().getFullYear();
        years_prev_field[idx].innerHTML=new Date().getFullYear()-1;
    })
    //config
    const btn_history = document.querySelector('#btn-history')
    const btn_history_jbrand = document.querySelector('#btn-history-jbrand')
    const history_field = document.querySelector('#tipe-kendaraan-field')
    const jbrand_field = document.querySelector('#jenis-brand-field')
    //btn session
    if ((sessionStorage.getItem("is_jbrand") == 'true')) {
            if (btn_history_jbrand.classList.contains('btn-history-null')) {
                btn_history_jbrand.classList.remove('btn-history-null');
            }
            if (!btn_history_jbrand.classList.contains('bg-chart-active-2')) {
                btn_history_jbrand.classList.add('bg-chart-active-2');
            }
            btn_history.classList.remove('bg-chart-active-2');
            btn_history.classList.add('btn-history-null');
    }
    //chart field session
    if (sessionStorage.getItem("is_jbrand") == 'true') {
            jbrand_field.classList.remove('d-none');
            if (!history_field.classList.contains('d-none')) {
                history_field.classList.add('d-none');
            }
    } else {
            history_field.classList.remove('d-none');
            if (!jbrand_field.classList.contains('d-none')) {
                jbrand_field.classList.add('d-none');
            }
    }
    //show btn
    function show_history() {
        sessionStorage.setItem('is_jbrand',false);
        history_field.classList.remove('d-none');
        if (!jbrand_field.classList.contains('d-none')) {
            jbrand_field.classList.add('d-none');
        }
        //btn
        if (btn_history_jbrand.classList.contains('bg-chart-active-2')) {
            btn_history_jbrand.classList.remove('bg-chart-active-2');
            btn_history_jbrand.classList.add('btn-history-null');
        }
        if (!btn_history.classList.contains('bg-chart-active-2')) {
            btn_history.classList.remove('btn-history-null');
            btn_history.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
    }
    function show_jbrand() {
        sessionStorage.setItem('is_jbrand',true)
        jbrand_field.classList.remove('d-none');
        if (!history_field.classList.contains('d-none')) {
            history_field.classList.add('d-none');
        }
        //btn
        if (btn_history.classList.contains('bg-chart-active-2')) {
            btn_history.classList.remove('bg-chart-active-2');
            btn_history.classList.add('btn-history-null');
        }
        if (!btn_history_jbrand.classList.contains('bg-chart-active-2')) {
            btn_history_jbrand.classList.remove('btn-history-null');
            btn_history_jbrand.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
    }
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "so", "jenis_customer", "jenis_pekerjaan", "dealer"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["Captive Fleet", "Captive KKB", "Captive Multiguna", "Reguler Retail", "Reguler Multiguna",
                "Reguler Fleet"
            ],
            'sub2': ["Aji Andika", "Abyan Estu", "Ana Lestari", "Budi Yoga", "Yupi Wardana", "Oti Satria",
                "Haydar Ekawira", "Hamid Irawan", "Rania Parama"
            ],
            'sub3': ["NONRO", "RO"],
            'sub4': ["Buruh", "Guru", "Dosen", "Manager", "Teller", "Wiraswasta"],
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
    <?php
        //mtd init
        $tipe_items_mtd = array();
        $tipe_lending_mtd = array();
        $tipe_lending_prev_mtd = array();
        $brand_items_mtd = array();
        $brand_lending_mtd = array();
        $brand_lending_prev_mtd = array();
        //ytd init
        $tipe_items_ytd = array();
        $tipe_lending_ytd = array();
        $tipe_lending_prev_ytd = array();
        $brand_items_ytd = array();
        $brand_lending_ytd = array();
        $brand_lending_prev_ytd = array();
        //mtd
        foreach($current_month_history_tipe as $key=>$row) {
            $tipe_items_mtd[] = htmlentities($row -> tipe);
            $tipe_lending_mtd[] = htmlentities($row -> mtd_amt);
            $tipe_lending_prev_mtd[] = htmlentities($last_month_history_tipe[$key]->mtd_amt);
        }
        foreach($current_month_history_brand as $key=>$row) {
            $brand_items_mtd[] = htmlentities($row -> brand);
            $brand_lending_mtd[] = htmlentities($row -> mtd_amt);
            $brand_lending_prev_mtd[] = htmlentities($last_month_history_brand[$key]->mtd_amt);
        }
        //ytd
        foreach($current_year_history_tipe as $key=>$row) {
            $tipe_items_ytd[] = htmlentities($row -> tipe);
            $tipe_lending_ytd[] = htmlentities($row -> mtd_amt);
            $tipe_lending_prev_ytd[] = htmlentities($last_year_history_tipe[$key]->mtd_amt);
        }
        foreach($current_year_history_brand as $key=>$row) {
            $brand_items_ytd[] = htmlentities($row -> brand);
            $brand_lending_ytd[] = htmlentities($row -> mtd_amt);
            $brand_lending_prev_ytd[] = htmlentities($last_year_history_brand[$key]->mtd_amt);
        }
    ?>
    //mtd
    var tipe_fields_mtd = <?php echo json_encode($tipe_items_mtd) ?>;
    var tipe_lending_mtd = <?php echo json_encode($tipe_lending_mtd) ?>;
    var tipe_lending_prev_mtd = <?php echo json_encode($tipe_lending_prev_mtd) ?>;
    var tipe_keys_mtd = Array.from(tipe_lending_mtd.keys()).sort((a, b) => tipe_lending_mtd[b] - tipe_lending_mtd[a])
    var brand_fields_mtd = <?php echo json_encode($brand_items_mtd) ?>;
    var brand_lending_mtd = <?php echo json_encode($brand_lending_mtd) ?>;
    var brand_lending_prev_mtd = <?php echo json_encode($brand_lending_prev_mtd) ?>;
    var brand_keys_mtd = Array.from(brand_lending_mtd.keys()).sort((a, b) => brand_lending_mtd[b] - brand_lending_mtd[a])
    //ytd
    var tipe_fields_ytd = <?php echo json_encode($tipe_items_ytd) ?>;
    var tipe_lending_ytd = <?php echo json_encode($tipe_lending_ytd) ?>;
    var tipe_lending_prev_ytd = <?php echo json_encode($tipe_lending_prev_ytd) ?>;
    var tipe_keys_ytd = Array.from(tipe_lending_ytd.keys()).sort((a, b) => tipe_lending_ytd[b] - tipe_lending_ytd[a])
    var brand_fields_ytd = <?php echo json_encode($brand_items_ytd) ?>;
    var brand_lending_ytd = <?php echo json_encode($brand_lending_ytd) ?>;
    var brand_lending_prev_ytd = <?php echo json_encode($brand_lending_prev_ytd) ?>;
    var brand_keys_ytd = Array.from(brand_lending_ytd.keys()).sort((a, b) => brand_lending_ytd[b] - brand_lending_ytd[a])
    // chart history_assets mtd
    var options_history_assets_mtd = {
        series: [{
            name: 'Lending ' + months_prev_field[0].innerHTML,
            type: 'column',
            data: tipe_keys_mtd.map(i => tipe_lending_prev_mtd.map(bFormatter)[i]).slice(0,5)
        }, {
            name: 'Lending ' + months_field[0].innerHTML,
            type: 'column',
            data: tipe_keys_mtd.map(i => tipe_lending_mtd.map(bFormatter)[i]).slice(0,5)
        }],
        chart: {
            height: 350,
            type: 'line',
        },
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
            formatter: function (val) {
                return val + " M";
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 1]
        },
        xaxis: {
            categories:  tipe_keys_mtd.map(i => tipe_fields_mtd[i]).slice(0,5),
            tooltip: {
                enabled: false
            }
        },
        yaxis: [
            {
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
            },
        ],
        tooltip: {
            y: {
                formatter: function (val) {
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
                    formatter: function (val) {
                        return val;
                    },
                },
            }
        }],
    };

    var chart_history_assets_mtd = new ApexCharts(document.querySelector("#history_assets_mtd_chart"),
        options_history_assets_mtd);
    chart_history_assets_mtd.render();
    // chart history_assets ytd
    var options_history_assets_ytd = {
        series: [{
            name: 'Lending ' + years_prev_field[0].innerHTML,
            type: 'column',
            data: tipe_keys_ytd.map(i => tipe_lending_prev_ytd.map(bFormatter)[i]).slice(0,5)
        }, {
            name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'column',
            data: tipe_keys_ytd.map(i => tipe_lending_ytd.map(bFormatter)[i]).slice(0,5)
        }],
        chart: {
            height: 350,
            type: 'line',
        },
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
            formatter: function (val) {
                return val + " M";
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 1]
        },
        xaxis: {
            categories: tipe_keys_ytd.map(i => tipe_fields_ytd[i]).slice(0,5),
            tooltip: {
                enabled: false
            }
        },
        yaxis: [
            {
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
            },
        ],
        tooltip: {
            y: {
                formatter: function (val) {
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
                    formatter: function (val) {
                        return val;
                    },
                },
            }
        }],
    };
    var chart_history_assets_ytd = new ApexCharts(document.querySelector("#history_assets_ytd_chart"),
        options_history_assets_ytd);
    chart_history_assets_ytd.render();

    // chart history_assets jbrand_ mtd
    var options_history_assets_jbrand_mtd = {
        series: [{
            name: 'Lending ' + months_prev_field[0].innerHTML,
            type: 'column',
            data: brand_keys_mtd.map(i => brand_lending_prev_mtd.map(bFormatter)[i]).slice(0,5)
        }, {
            name: 'Lending ' + months_field[0].innerHTML,
            type: 'column',
            data: brand_keys_mtd.map(i => brand_lending_mtd.map(bFormatter)[i]).slice(0,5)
        }],
        chart: {
            height: 350,
            type: 'line',
        },
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
            formatter: function (val) {
                return val + " M";
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 1]
        },
        xaxis: {
            categories:  brand_keys_mtd.map(i => brand_fields_mtd[i]).slice(0,5),
            tooltip: {
                enabled: false
            }
        },
        yaxis: [
            {
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
            },
        ],
        tooltip: {
            y: {
                formatter: function (val) {
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
                    formatter: function (val) {
                        return val;
                    },
                },
            }
        }],
    };
    var chart_history_assets_jbrand_mtd = new ApexCharts(document.querySelector("#history_assets_jbrand_mtd_chart"),
        options_history_assets_jbrand_mtd);
    chart_history_assets_jbrand_mtd.render();

    // chart history_assets ytd
    var options_history_assets_jbrand_ytd = {
        series: [{
            name: 'Lending ' + years_prev_field[0].innerHTML,
            type: 'column',
            data: brand_keys_ytd.map(i => brand_lending_prev_ytd.map(bFormatter)[i]).slice(0,5)
        }, {
            name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'column',
            data: brand_keys_ytd.map(i => brand_lending_ytd.map(bFormatter)[i]).slice(0,5)
        }],
        chart: {
            height: 350,
            type: 'line',
        },
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
            formatter: function (val) {
                return val + " M";
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 1]
        },
        xaxis: {
            categories: brand_keys_ytd.map(i => brand_fields_ytd[i]).slice(0,5),
            tooltip: {
                enabled: false
            }
        },
        yaxis: [
            {
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
            },
        ],
        tooltip: {
            y: {
                formatter: function (val) {
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
                    formatter: function (val) {
                        return val;
                    },
                },
            }
        }],
    };
    var chart_history_assets_jbrand_ytd = new ApexCharts(document.querySelector("#history_assets_jbrand_ytd_chart"),
        options_history_assets_jbrand_ytd);
    chart_history_assets_jbrand_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#history_assets_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
        $('#history_assets_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
        $('#history_assets_jbrand_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
        $('#history_assets_jbrand_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->