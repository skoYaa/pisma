<?php
use yii\helpers\Html;
?>

<html>

<div class="container">
     <div style="color:LightBlue; overflow: hidden;"><h2>Napredna pretraga</h2></div>
	 <div style="color:black; overflow: hidden;"><hr></div>
	 <div class="row" >
		<div class="col-sm-4">Trazi : <input type="text" name="fname"> </div>
		<div class="col-sm-4">U dijelu teksta :<br>
			<input type="checkbox" name="sex"  value="male">Naslov<br>
			<input type="checkbox" name="sex"  value="male">Tekst<br>
			<input type="checkbox" name="sex"  value="male">Opis<br>
		</div>
		<div class="col-sm-4">
			U kategoriji :<select class="ui dropdown">
		  <option value=""></option>
		  <option value="1">Male</option>
		  <option value="0">Female</option>
	</select><br>
		</div>
	 </div>
	 <hr>
	 <div class="row" >
		<div class="col-sm-6">
			Autor :<select class="ui dropdown">
		  <option value=""></option>
		  <option value="1">Male</option>
		  <option value="0">Female</option>
	</select>
		</div>
		
		
	 </div>
	 <hr>
	 <div class="row" >
	 <div class="col-sm-6">
		    Datum : <input type="text" value="02-16-2012">

	
		</div>
		
	 </div>
	 <hr>
	 
	  
	  <button type="submit"  class="btn btn-primary">Trazi! </button>
	  <button type="submit"  class="btn btn-success">Nazad! </button>
	 
</div>
    <br>
</html>

<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker();
});
</script>