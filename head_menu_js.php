<script src="../js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../js/jquery.js"><\/script>')</script>
<script src="../js/menu/bootstrap.min.js"></script>
<script src="../js/menu/temas.min.js"></script>
<script type="text/javascript">
    $(function (){
    $(document).on('click','#edicionRegistros',function(e){
        e.preventDefault();
        var id=$(this).data('id');
        $.ajax({
            url: "./php/preedit.php",
            type: 'POST',
            data: {
                i:id
            },cache: false,
            success: function (v) {
                $('#resultedit').html(v);
            },error: function () {
                $('#resultedit').html('Erroe en la operacion');
            }            
        });
    });
    });
</script>
<script src="../js/jQueryForms.min.js"></script>