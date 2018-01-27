<script>
$('input[type=radio]').change(function(){
    var $p = $(this).closest('.controls');
    var $checked = $p.find(':checked');
    $('#travelDetails_' + this.id.slice(-1)).prop('disabled',$checked.val() == 'No');   
}).change();



</script>