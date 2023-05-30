$(document).ready(function(){
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    
    load_library();
    function load_library(){
        $('.dt-table').DataTable({
            'responsive': true
        });
    }

    get_products_api();
    function get_products_api(){
        $('body').on('submit','#frm-getproducts',function(e){
            e.preventDefault();
            let root = $(this);
            let data = root.serializeArray();

            $.ajax({
                url:baseUrl+'/cproducts/get_products_api',
                data: data,
                type:'POST',
                dataType:'JSON',
                beforeSend:function(){
                    root.find('button').html('Sedang Mencari ...');
                    root.find('button').attr('disabled',true);
                },
                success:function(response){
                    root.find('button').html('Submit');
                    root.find('button').removeAttr('disabled');
                    $('#frm-getproducts').before('<div class="alert alert-'+response.msg+'" role="alert">'+response.txt+'</div>');
                },
                error:function(xhr){
                    alert('Maaf Mohon Coba Lagi Beberapa Saat Lagi - ' + xhr.status);
                    return false;
                }
            });
        });
    }

    handle_form_editproducts();
    function handle_form_editproducts(){
        $('body').on('submit','#frm-editproduct',function(e){
            e.preventDefault();
            let root = $(this);
            let data = root.serializeArray();

            $.ajax({
                url:baseUrl+'/chome/simpan',
                data: data,
                type:'POST',
                dataType:'JSON',
                beforeSend:function(){
                    root.find('button').html('Mohon Tunggu ...');
                    root.find('button').attr('disabled',true);
                },
                success:function(response){
                    root.find('button').html('Simpan');
                    root.find('button').removeAttr('disabled');
                    $('#frm-editproduct').after('<div class="alert alert-'+response.msg+'" role="alert">'+response.txt+'</div>');
                    setTimeout(function() {
                        location.href=response.url; 
                    }, 1000);
                },
                error:function(xhr){
                    alert('Maaf Mohon Coba Lagi Beberapa Saat Lagi - ' + xhr.status);
                    return false;
                }
            });
        });
    }
});