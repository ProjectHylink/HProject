</body>
</html>
<script>

function login() {
    var data = $('#formLogin').serialize();
    console.log(data);
    $.ajax({
        method: 'POST',
        url: "http://localhost/HProject/login/index.php/Login/goLogin",
        data: data,
        success: function(response) {
            var dataObj = JSON.parse(response);
            console.log(dataObj);
            var username = $('#email').val();
            var password = $('#password').val();
            if (!username || !password) {
                // $.each(dataObj, function(key, value) {
                    iziToast.error({
                        title: 'Opps...',
                        message: dataObj.pesan2,
                        position: 'topRight'
                    });
                // });
            } else {
                if (dataObj.status === 'success') {
                    iziToast.success({
                        title: 'Selamat Datang Di',
                        message: dataObj.message,
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.href = "<?=site_url('Welcome');?>";
                    }, 1700);
                } else {
                    iziToast.error({
                        title: 'Opps...',
                        message: dataObj.pesan,
                        position: 'topRight'
                    });
                }
            }
        }
    });
}



    // function login() {
    //     var data = $('#formLogin').serialize();
    //     console.log(data);
    //     $.ajax({
    //         method: 'POST',
    //         url: "http://localhost/HProject/login/index.php/Login/goLogin",
    //         data: data,
    //         success: function(data) {
    //             const datas = JSON.parse(data);
    //             console.log(datas);
    //             $.each(datas,function(key,val){
    //                 if (val == 'success') {
    //                     alert('selamat datang di - <?=$this->session->flashdata('message');?> ');
    //                     setTimeout(function() {
    //                         window.location.href = "<?=site_url('Welcome');?>";
    //                     }, 1700);
    //                 } else {
    //                     alert('Masyaallah - <?=$this->session->flashdata('pesan');?>');
    //                 }
    //             });
    //         }
        // });
    // }
</script>

</script>

<script src="<?=base_url();?>TOAST/dist/js/iziToast.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>