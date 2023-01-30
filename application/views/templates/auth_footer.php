</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/wow/wow.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<!-- Custom scripts for all pages-->
<script>
    //loader
    $(window).on('load',()=>{
        if((Date.now()-timerStart)<1500){
            setTimeout(() => {
                $('.loader').fadeOut('slow');
                $('.container-login').fadeIn('slow');
            }, 1300);
        }else{
            $('.loader').fadeOut('slow');
            $('.container-login').fadeIn('slow');
        }
    })
    //notyf
    var notyf = new Notyf({
        duration: 3000,
        position: {
            x: 'right',
            y: 'top',
        },
        dismissible: true
    });
    //submit AJAX
    $(document).ready(function(){
        $('#password').keypress(function(e){
            if(e.keyCode==13)$('#btn-auth').click();
        });
    });
    const authLogin = function () {
        let err = 0
        let username = document.querySelector('#username')
        let password = document.querySelector('#password')
        const error_msg = document.querySelectorAll('.notyf-err')
        const msg = ['Username required','Password required']
        const fields = [username,password]
        const form_is_null = function (sum = 2,field = fields){
            let eyes = document.querySelector('#eyes')
            if(sum==2){
                field.forEach((data,idx)=>{
                    data.classList.add('border-err');
                })
                error_msg.forEach((err,idx)=>{
                    err.classList.remove('d-none')
                    err.innerHTML = msg[idx];
                })
                eyes.classList.remove('eye-hide');
                eyes.classList.add('eye-hide-err');
                notyf.error('Pastikan username dan password diisi !');
            }else{
                field.classList.add('border-err');
                if(field == username){
                    error_msg[0].classList.remove('d-none')
                    error_msg[0].innerHTML = msg[0];
                    notyf.error('Pastikan username diisi !');
                    if(eyes.classList.contains('eye-hide-err')){
                        eyes.classList.remove('eye-hide-err');
                        eyes.classList.add('eye-hide');
                    }
                }else{
                    error_msg[1].classList.remove('d-none')
                    error_msg[1].innerHTML = msg[1];
                    notyf.error('Pastikan password diisi !');
                    eyes.classList.remove('eye-hide');
                    eyes.classList.add('eye-hide-err');
                }
            }
        }
        // if((username.value == ''|| username.value == undefined)&&(password.value == ''|| password.value == undefined))err = 1
        if(err==0){
            fields.forEach((field,idx)=>{
                    field.classList.remove('border-err');
                })
            error_msg.forEach((err,idx)=>{
                    err.classList.add('d-none')
            })
            $.ajax({
                url:'<?= base_url('login')?>',
                method:'POST',
                dataType: 'json',
                data: $('#form').serialize(),
                success:(result)=>{
                    if(result.value==1){
                        window.location.href = '<?= base_url('dashboard')?>'
                    }else if(result.value == 2){
                        form_is_null(1,username);
                    }else if(result.value == 3){
                        form_is_null(1,password);
                    }else if(result.value == 4){
                        form_is_null();
                    }else{
                        notyf.error('Pastikan username dan password benar !');
                    }
                    $('input[name=csrf_mtf_log]').val(result.token);
                }
            })
        }
        // else{
        //     form_is_null();
        // }
    }
    const toggle = function () {
        let eye = document.querySelector('#eyes')
        var temp = document.getElementById('password');
        if (temp.type === 'password') {
            temp.type = 'text';
            eye.classList.remove('bx-low-vision');
            eye.classList.add('bx-show');
        }
        else {
            temp.type = 'password';
            eye.classList.remove('bx-show');
            eye.classList.add('bx-low-vision');
        }
    }
    new WOW().init();
    //disable right click and inspect
    $(document).bind("contextmenu", function (e) {
        e.preventDefault();
    });
    document.onkeydown = function (e) {

        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
        }
    }
    //console-warning
    var _0x44a1 = ["log", "color: #546FE6; font-size: 18px;", "color: red; font-size: 24px;",
        "%cBy doing anthing in this console, you risk giving attackers access to your account or computer",
        "%cWARNING", "color: red; font-size: 75px; text-shadow: 2px 2px #546FE6;"
    ];
    ! function (o, e) {
        ! function (e) {
            for (; --e;) o.push(o.shift())
        }(++e)
    }(_0x44a1, 343);
    var _0x30b5 = function (o, e) {
        return _0x44a1[o -= 0]
    };
    setTimeout(function () {
        console.log(_0x30b5("0x3"), _0x30b5("0x4")), console.log(
            "%cIf someone tells you to write, copy/paste or read anything from this console, there is a 101% chance you're being scammed!",
            _0x30b5("0x0")), console[_0x30b5("0x5")](_0x30b5("0x2"), _0x30b5("0x0")), console[_0x30b5(
                "0x5")](
                    "%cNo, this console CANNOT be used to gain access to someone elses account, only yours. ",
                    _0x30b5("0x0")), console[_0x30b5("0x5")]("%cStay safe and close this side-bar.", _0x30b5("0x1"))
    }, 1500);
</script>
</body>

</html>