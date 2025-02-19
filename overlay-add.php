<?php

if($adv == 1){
echo '<div id="overlay-add" style="display: none;">
    <div class="container" style="padding-top:10vh;">
    	<div class="row">
    		<div class="col-12">
    			<button class="btn btn-sm float-right" style="font-size:18px;color:white;background-color: rgba(0,0,0,0.6);z-index:9999;position: absolute;right: 0px;top:-20px;border:1px solid white" 
    			onclick="closeAdd()"><b>x</b></button>
    		</div>
    		<div class="col-12" id="adv" style="margin: auto;">
    			<img src="assets/images/adv/'.$advImg.'" alt="'.$advImg.'" style="width: 100%;">
    		</div>
    	</div>
    </div>
</div>';
}?>

<style type="text/css">
#adv {
  animation: advimg .5s;
}
@keyframes advimg {
  from {
    transform: scale(0);
  }
  to {
    transform: scale(1);
  }
}
</style>
<script type="text/javascript">
function showAdd() {
  try{
      var x = document.getElementById("overlay-add");
        if (x.style.display === "none") {
            x.style.display = "block";
        } 
        else {
            x.style.display = "none";
        }
   setTimeout(function(){ closeAdd(); }, 10000);
  }catch{}
} 

function closeAdd(){
var x = document.getElementById("overlay-add");
x.style.display = "none";
}
</script>