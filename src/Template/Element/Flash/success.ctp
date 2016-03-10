<div class="alert alert-info alert-dismissable" id="flash_notification">
	<button  class="close" type="button">x</button>
	<i class="fa fa-info-circle"></i>  <strong><?= h($message) ?></strong>
</div>
<script>
$(document).ready(function(){
	 $(".close").click(function(){
        $("#flash_notification").slideToggle();
    });
});
</script>