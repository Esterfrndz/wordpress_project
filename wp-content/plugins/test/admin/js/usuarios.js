jQuery(document).ready(function($){

 


    $("#btnnuevo").click(function(){

        $("#modalnuevo").modal("show");

    });


    

    $(document).on('click','.btn_remove',function(){
        var button_id = $(this).attr('id');
        $("#row" +button_id+"").remove();
        return false;
    });



    $(document).on('click',"a[data-id]",function(){
            var id = this.dataset.id;
            var url = SolicitudesAjax.url;
            $.ajax({
                type: "POST",
                url: url,
                data:{
                    action : "peticioneliminar",
                    nonce : SolicitudesAjax.seguridad,
                    id: id,
                },
                success:function(){
                    alert("Datos borrados");
                    location.reload();
                }
            });
    });


    $(document).on('click',"a[data-ver]",function(){
        $("#modalestadisticas").modal("show");
    })




});