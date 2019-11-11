$('#state').change(function(){
    var paisID = $(this).val();

    if(paisID){
      $.ajax({
        type:"GET",
        url:"{{url('towns')}}/"+paisID,
        success:function(res){
          if(res){
            $("#town").empty();
            $("#town").append('<option>Seleccione</option>');
            $.each(res,function(key,value){
              $("#town").append('<option value="'+key+'">'+value+'</option>');
            });
          }else{
            $("#town").empty();
          }
        }
      });
    }
  });