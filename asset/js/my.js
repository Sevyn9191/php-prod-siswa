
    //   function initMap() {
    //     var map = new google.maps.Map(document.getElementById('map'), {
    //     //   center: {lat: -1.035721, lng: 118.436931},
    //       center: {lat: -6.22703, lng: 106.73274},
    //       zoom: 5
    //     });
    //   }

    //   var marker = new google.maps.Marker({
    //     position: new google.maps.LatLng(-6.22703,106.73274),
    //     map: map
    // });

    // function initMap() {
    //     var propertiPeta = {
    //       center:new google.maps.LatLng(-8.5830695,116.3202515),
    //       zoom:9,
    //       mapTypeId:google.maps.MapTypeId.ROADMAP
    //     };
        
    //     var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);
        
    //     // membuat Marker
    //     var marker=new google.maps.Marker({
    //         position: new google.maps.LatLng(-6.22703,106.73274),
    //         map: peta
    //     });
      
    //   }
      
      // event jendela di-load  
      // google.maps.event.addDomListener(window, 'load', initMap);

      // get value from provinsi
      function setDatePicker(){
        $(".datepicker").datetimepicker({
          format: "YYYY-MM-DD",
          useCurrent: false
        })
      }
      function setDatePicker2(){
        $(".datepicker2").datetimepicker({
          format: "YYYY-MM-DD",
          useCurrent: false
        })
      }
  
    
      // function setDateRangePicker(input1, input2){
      //   $(input1).datetimepicker({
      //     format: "YYYY-MM-DD",
      //     useCurrent: false
      //   })
      //   $(input1).on("change.datetimepicker", function (e) {
      //     $(input2).val("")
      //         $(input2).datetimepicker('minDate', e.date);
      //     })
      //   $(input2).datetimepicker({
      //     format: "YYYY-MM-DD",
      //     useCurrent: false
      //   })
      // }
      // function setMonthPicker(){
      //   $(".monthpicker").datetimepicker({
      //     format: "MM",
      //     useCurrent: false,
      //     viewMode: "months"
      //   })
      // }
      // function setYearPicker(){
      //   $(".yearpicker").datetimepicker({
      //     format: "YYYY",
      //     useCurrent: false,
      //     viewMode: "years"
      //   })
      // }
      // function setYearRangePicker(input1, input2){
      //   $(input1).datetimepicker({
      //     format: "YYYY",
      //     useCurrent: false,
      //     viewMode: "years"
      //   })
      //   $(input1).on("change.datetimepicker", function (e) {
      //     $(input2).val("")
      //         $(input2).datetimepicker('minDate', e.date);
      //     })
      //   $(input2).datetimepicker({
      //     format: "YYYY",
      //     useCurrent: false,
      //     viewMode: "years"
      //   })
      // }
     

      $(document).ready(function(){
        // $('.gol').load("<?php echo base_url(); ?>daftar/index");
        $("#search").click(function(){
          // var jurusan = $("#s_jurusan").val();
          var keyword = $("#s_keyword").val();
          $.ajax({
            url: "<?php echo base_url(); ?>daftar/search",
                type: 'POST',
                data: {keyword:keyword},
                success: function(hasil) {
                    $('.gol').html(hasil);
                }
            });
        });
    });
      