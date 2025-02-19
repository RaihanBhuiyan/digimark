function getList(listType){
	$.ajax({
		      type:"post",
		      url:"ajaxTableList.php",
		      data:{listType:listType},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('listResult').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('listResult').style.display="block";
		          $('#listResult').html(data);
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('listResult').style.display="none";
		      	  }
		        }
		            
		      }
		    });
}

function getProductSpecList(listType,productCode){
	$.ajax({
		      type:"post",
		      url:"ajaxTableList.php",
		      data:{listType:listType, productCode:productCode},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('listResult').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('listResult').style.display="block";
		          $('#listResult').html(data);
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('listResult').style.display="none";
		      	  }
		        }
		            
		      }
		    });
}

function getListTags(listType,tagCategory){
	$.ajax({
		      type:"post",
		      url:"ajaxTableList.php",
		      data:{listType:listType,tagCategory:tagCategory},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('listResult').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('listResult').style.display="block";
		          $('#listResult').html(data);
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('listResult').style.display="none";
		      	  }
		        }
		            
		      }
		    });
}

function reload(value){
	location=value;
}




//setupFilterValue.php
function categorySelected_for_head(value){
	var dtype='category';
	$.ajax({
		      type:"post",
		      url:"ajaxTableList.php",
		      data:{category:value,dtype:dtype},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('filterValue').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('filterValue').style.display="block";
		          $('#filterValue').html(data);
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('filterValue').style.display="none";
		      	  }
		        }
		            
		      }
		    });
}

function filter_for_head(value){
document.getElementById('filter_box').value = value;


var dtype='value';
	$.ajax({
		      type:"post",
		      url:"ajaxTableList.php",
		      data:{category:value,dtype:dtype},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('value_box').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('value_box').style.display="block";
		          $('#value_box').html(data);
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('value_box').style.display="none";
		      	  }
		        }
		            
		      }
		    });
}

//tagFilterToCategory.php
function filter_tag_with_category(){
	var output = jQuery.map($(':checkbox[name=filter\\[\\]]:checked'), function (n, i) {
    return n.value;
}).join(',');
document.getElementById('filter_box').value = output;
}

function categorySelected(value){
document.getElementById('category_box').value = value;

getListTags('category-tag',value);
uncheck_all();
}
function check_old_filter(){
	//alert("New Category Selected");
	var head_list = document.getElementById('head_list').value;
	//alert(head_list);
	if(head_list !== ''){
	var output = head_list.split(',');
	var filterParam = "filter";
	var elems = $('input[name^='+filterParam+']');

	output.forEach(function(val){
	 elems.filter("[value="+ val +"]").prop("checked",true);
	});
	}

}
function uncheck_all(){
	alert("New Category Selected");
	var cbarray = document.getElementsByName('filter[]');
	//alert(cbarray.length);

	for(var i = 0; i < cbarray.length; i++){
            //filter[i].checked = "false";
            if(cbarray[i].checked)
            {
            	//alert(cbarray[i].value);
            	cbarray[i].checked = false;
            }
	}
check_old_filter();
}
//tagFilterToCategory.php