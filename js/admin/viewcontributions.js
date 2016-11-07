$(document).ready(function() { 

  $(window).load(function (){
    $("#loading-contribution").fadeOut("slow",function(){ 
          $('#list-contributions').DataTable( {
              scrollX:        true,
              scrollCollapse: true,
              paging:         false,
              fixedColumns:   true,
              aoColumnDefs: [
                 { aTargets: [ '_all' ], bSortable: false },
                 { aTargets: [ 0 ], bSortable: true }
              ]
          } );
          $("#list-contributions")
           .css("visibility","visible")
           .fadeIn() 

    }); 	 

    $('.date').datetimepicker({
        format: 'YYYY-MM-DD'
    });

  })

  $("#REPORTTYPE").change(function(e){
    var select = $(this).val()
    $(".form-reporttype").hide();
    if(select == "1")
      $("#form-range").show();
    else if(select == "2")
      $("#form-monthly").show();
    else if(select == "3")
      $("#form-yearly").show(); 
  })

  $(".btn-generate").click(function(e){
      var param = new Object()
      param.p = $("#projectid").val();

      var select = $("#REPORTTYPE option:selected").val() 
      if(select == "1"){
        param.df = $("#STARTDATE").val();
        param.dt = $("#ENDDATE").val();
      }
      else if(select == "2"){
        var month = $("#MONTH option:selected").val();
        param.df = month + " 01, " + $("#YEAR option:selected").val();
        param.dt = month + " 01, " + $("#YEAR option:selected").val();
      }
      else if(select == "3"){
        
      }
      location.href= baseUrl + 'indexpage/generateExcelProject/' + param.p + "/" + encodeURIComponent(param.df) + "/" + encodeURIComponent(param.dt);

      //callAjaxJson("indexpage/generateExcelProject",param,function(response){},ajaxError)

      

  })

})