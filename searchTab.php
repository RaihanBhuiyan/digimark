<div class="container" id="searchTab">
        <!--<form class="form-inline" action="Result-All" method="POST">-->
			<input id="search" type="search" placeholder="Search" aria-label="Search"
            autocomplete="off" name="keyWord" onkeyup="getResult(this.id)">
            <!-- <a  data-toggle="modal" data-target="#modal" onclick="clearResult()" style="color:red;font-size: 2vh;width: 5%;margin-left: 3%" style="background-color: red"> <i class="fas fa-search"></i></a>
            <button type="submin" name="submit" style="display: none;"></button> -->
        <!--</form>-->
    </div>
    <div id="searchResult" class="form-control" style="display:none;width: 100%;">

</div>

<script>
$('#search').keypress(function (e) {
  if (e.which == 13) {
        var keyWord = document.getElementById('search').value;
        location="Result-All/"+keyWord;
  }
});
</script>

<style type="text/css">
#searchTab{padding: 0px !important;}
#search{width: 100% !important;}
#search:focus{border-color:#f16724;}
#searchResult{max-height:50vh;border-radius:0px;overflow-y: scroll;}
</style>


<script type="text/javascript">
  function getResult(id){
    var value = document.getElementById(id).value;

    if(id === 'search'){

	    if(value === ''){ document.getElementById('searchResult').style.display="none";}
	    /*document.getElementById('searchResult').innerHTML = value;*/
	    else{
		    $.ajax({
		      type:"post",
		      url:"ajaxSearch.php",
		      data:{keyWord:value},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('searchResult').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('searchResult').style.display="block";
		          $('#searchResult').html(data);
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('searchResult').style.display="none";
		      	  }
		        }
		            
		      }
		    });
		}
	}else{

	    if(value === ''){ document.getElementById('searchResult2').style.display="none";}
	    /*document.getElementById('searchResult').innerHTML = value;*/
	    else{
		    $.ajax({
		      type:"post",
		      url:"ajaxSearch.php",
		      data:{keyWord:value},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('searchResult2').style.display="none";
		        }else{
		          document.getElementById('searchResult2').style.display="block";
		          $('#searchResult2').html(data);
		        }
		            
		      }
		    });
		}

	}
  }
</script>