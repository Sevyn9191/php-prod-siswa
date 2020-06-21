
    $('#no_daftar').change(function(){
        var no_daftar =  $('#no_daftar').val();

        // console.log(no_daftar);
        $.ajax({
            url : '<?php echo base_url(); ?>siswa/getNoD',
            method : 'post',
            data : {daftar_no:no_daftar},
            dataType :'json',
            success:  function(data)
            {
                var html = '';
                var i;
                for(i=0;i<data.length;i++){
                    html += data[i].Agama; 
                    
                }

                $('#alamat').html(html);
                // console.log(html);
            }
        });
    });