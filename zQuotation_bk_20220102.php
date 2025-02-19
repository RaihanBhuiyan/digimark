<!DOCTYPE html>
<html>
<head>
    <title>Build System</title>
    <?php include('includes.php');?>
    <style>
        .row-about-brand{
            margin-left:5%;
            margin-right:5%;
        }
    </style>
</head>
<body onload="check()">
<!--the container to add the table.-->
<?php include('menu.php');?>
<div class="row row-about-brand">
<div class="col-12" style="min-height:30vh;margin-bottom:3%">
    <div class="row" id="p-t-row" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);margin-top: 2.5%;background-image:url('assets/images/background/about_head_bg.jpg');background-size:cover">
    <h1 class="heading" style="width:100%;text-align:center;margin-top: 0.5%;padding:2.5%;color:#ffffff"><b>Build Your Own Solution</b></h1>
    </div>
    <div class="row" id="p-t-row" style="background-image:url('assets/images/background/about_head_bg.jpg');background-size:cover;color:white;font-weight: bold;margin-top: 2.5%">
    <div class="col-md-2 col-sm-2 col-6">Category</div>
    <div class="col-md-2 col-sm-4 col-6">Name</div>
    <div class="col-md-1 col-sm-4 col-6">Quantity</div>
    <div class="col-md-2 col-sm-2 col-6">Unit Price</div>
    <div class="col-md-2 col-sm-2 col-6">Total Price</div>
    <div class="col-md-2 col-sm-2 col-6">Image</div>
    <div class="col-md-1 col-sm-2 col-6">Action</div>
    </div>
    <div id="product-container"></div>


    <div class="container" style="background-color: white;font-weight: bold;margin-top:2.5%;text-align: center !important;">
    <button class="btn btn-info" id="btn2" style="border-radius:0px">Add item</button>
    <button class="btn btn-danger" id="clr" style="border-radius:0px">Clear</button>
    <a class="btn btn-success" href="basic-info" style="border-radius:0px">Get Quotation</a>
    </div>
</div>
</div>
<?php include('footer.php');?>


<script type="text/javascript">

    $(document).ready(function(){
      $("#btn2").click(function(){

        if(localStorage.getItem("getID")===null){
            //alert('no item');
            localStorage.setItem("getID",1);
            var val = localStorage.getItem("getID");
        }
        else{var val =(parseInt(localStorage.getItem("getID"))+1);//alert(val);
        localStorage.setItem("getID",val);}

        //$("#product-container").append('<div class="row" id="row_'+val+'"><div class="col-md-2 col-sm-2 col-6"><select><option value="1">1</option><option value="2">2</option></select></div><div class="col-md-3 col-sm-4 col-6"><label id="comp_name">Empty</label></div><div class="col-md-1 col-sm-4 col-6"><label id="comp_qty">Empty</label></div><div class="col-md-1 col-sm-2 col-6"><label id="comp_uprice">Empty</label></div><div class="col-md-1 col-sm-2 col-6"><label id="comp_tprice">Empty</label></div><div class="col-md-2 col-sm-2 col-6"><img id="comp_image" src="" alt="Select Item"></div><div class="col-md-2 col-sm-2 col-6"><a href="javascript:void(0)" class="btn btn-sm" id="'+val+'" onclick="openTab(this.id)" style="background-color: #4c4d4f;border-radius: 0px;color:white;font-weight: bold">Choose</a><a href="javascript:void(0)" class="btn btn-sm" id="action_button" onclick="remove_item()" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a></div></div>');
        $("#product-container").append('<div class="row" id="row_'+val+'" style="margin-top:1%;"><div class="col-md-2 col-sm-2 col-6"> <select class="form-control" id="row_cat_'+val+'"  onchange="openTab(this.id)"  style="width:100%;border-color:1px solid cyan;border-radius:0px"><option>Select Category</option> <?php include('assets/database/config.php'); $sql = "SELECT `category_name`, `category_code`,`category_url` FROM `tbl_category` WHERE `category_status` = '1'"; $result = mysqli_query($dbcon,$sql) or die ('error 404'); while($row = mysqli_fetch_assoc($result)){ $i++; $category_code = $row['category_code']; $category_url = $row['category_url']; $category_name = ucfirst($row['category_name']);echo '<option value="'.$category_url.'">'.$category_name.'</option>'; } ?> </select></div><div class="col-md-2 col-sm-4 col-6"> <label id="comp_name">Empty</label></div><div class="col-md-1 col-sm-4 col-6"> <label id="comp_qty">Empty</label></div><div class="col-md-2 col-sm-2 col-6"> <label id="comp_uprice">Empty</label></div><div class="col-md-2 col-sm-2 col-6"> <label id="comp_tprice">Empty</label></div><div class="col-md-2 col-sm-2 col-6"> <img id="comp_image" src="" alt="Select Item"></div><div class="col-md-1 col-sm-2 col-6"><a href="javascript:void(0)" class="btn btn-sm" id="action_button" onclick="remove_item()" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a></div></div><hr style="border-bottom:2px solid #1b4e90">');
        

        // $.get("test.php", function (data) {
        //   $("#product-container").append(data);
        // });
      });


      $("#clr").click(function(){
        localStorage.setItem("getID",0);
        //localStorage.clear();

        var i;
        locItem = parseInt(localStorage.getItem("getID"));
            for(i=1;i<=locItem;i++){
                    localStorage.setItem(("row_"+i+"_category"),'Empty');
                    localStorage.setItem(("row_"+i+"_name"),'Empty');
                    localStorage.setItem(("row_"+i+"_qty"),'Empty');
                    localStorage.setItem(("row_"+i+"_price"),'Empty');
                    localStorage.setItem(("row_"+i+"_tprice"),'Empty');
                    localStorage.setItem(("row_"+i+"_image"),'Empty');
                    $("#row_"+i).remove();

            }
        location.reload();
      });
    });
</script>

<script type="text/javascript">
function check(){
    var i;
    locItem = parseInt(localStorage.getItem("getID"));
            for(i=1;i<=locItem;i++){

                if(localStorage.getItem("row_"+i+"_category")!== 'Empty')
                {

                 $("#product-container").append('<div class="row" id="row_'+i+'" style="margin-top:1%"><div class="col-md-2 col-sm-2 col-6">'+localStorage.getItem("row_"+i+"_category")+'</div><div class="col-md-2 col-sm-4 col-6"><label id="comp_name">'+localStorage.getItem("row_"+i+"_name")+'</label></div><div class="col-md-1 col-sm-4 col-6"><label id="comp_qty">'+localStorage.getItem("row_"+i+"_qty")+'</label></div><div class="col-md-2 col-sm-2 col-6"><label id="comp_uprice">'+localStorage.getItem("row_"+i+"_price")+'</label></div><div class="col-md-2 col-sm-2 col-6"><label id="comp_tprice">'+localStorage.getItem("row_"+i+"_tprice")+'</label></div><div class="col-md-2 col-sm-2 col-6"><img id="comp_image" src="'+localStorage.getItem("row_"+i+"_image")+'" alt="No Image" style="width:50px"></div><div class="col-md-1 col-sm-2 col-6"><a href="javascript:void(0)" class="btn btn-sm" id="action_button" onclick="remove_item('+i+')" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a></div></div><hr style="border-bottom:2px solid #1b4e90">');
                }
                    // $("#product-container").append('<div class="row" id="row_'+i+'"><div class="col-md-2 col-sm-2 col-6">'+localStorage.getItem("row_"+i+"_category")+'</div><div class="col-md-3 col-sm-4 col-6"><label id="comp_name">'+localStorage.getItem("row_"+i+"_name")+'</label></div><div class="col-md-1 col-sm-4 col-6"><label id="comp_qty">'+localStorage.getItem("row_"+i+"_qty")+'</label></div><div class="col-md-1 col-sm-2 col-6"><label id="comp_uprice">'+localStorage.getItem("row_"+i+"_price")+'</label></div><div class="col-md-1 col-sm-2 col-6"><label id="comp_tprice">'+localStorage.getItem("row_"+i+"_tprice")+'</label></div><div class="col-md-2 col-sm-2 col-6"><img id="comp_image" src="'+localStorage.getItem("row_"+i+"_image")+'" alt="Select Item"></div><div class="col-md-2 col-sm-2 col-6"><a href="javascript:void(0)" class="btn btn-sm"  id="'+i+'"  onclick="openTab(this.id)" style="background-color: #4c4d4f;border-radius: 0px;color:white;font-weight: bold">Choose</a><a href="javascript:void(0)" class="btn btn-sm" id="action_button" onclick="remove_item()" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a></div></div>');
            }
            
}

function openTab(code){

    var fields = code.split('_');

    var currentRow = fields[2];

    //alert('test');
    localStorage.setItem("currentRow",currentRow);
    
    
    
    var category = document.getElementById('row_cat_'+currentRow+'').value;
    //alert(category);
    
     window.open('qcollections/'+category+'/','blank');
}


function remove_item(i){
    localStorage.setItem(("row_"+i+"_category"),'Empty');
    localStorage.setItem(("row_"+i+"_name"),'Empty');
    localStorage.setItem(("row_"+i+"_qty"),'Empty');
    localStorage.setItem(("row_"+i+"_price"),'Empty');
    localStorage.setItem(("row_"+i+"_tprice"),'Empty');
    localStorage.setItem(("row_"+i+"_image"),'Empty');
    
    $("#row_"+i).remove();
    location.reload();
}
</script>
</body>
</html>

    <!-- $("#product-container").append('<div class="row" id="row_'+val+'"><div class="col-md-2 col-sm-2 col-6">'+val+'</div><div class="col-md-3 col-sm-4 col-6"><label id="comp_name">Empty</label></div><div class="col-md-1 col-sm-4 col-6"><label id="comp_qty">Empty</label></div><div class="col-md-1 col-sm-2 col-6"><label id="comp_uprice">Empty</label></div><div class="col-md-1 col-sm-2 col-6"><label id="comp_tprice">Empty</label></div><div class="col-md-2 col-sm-2 col-6"><img id="comp_image" src="" alt="Select Item"></div><div class="col-md-2 col-sm-2 col-6"><a href="javascript:void(0)" class="btn btn-sm" id="" onclick="openTab(this.id)" style="background-color: #4c4d4f;border-radius: 0px;color:white;font-weight: bold">Choose</a><a href="javascript:void(0)" class="btn btn-sm" id="action_button" onclick="remove_item()" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a></div></div>'); -->


<!-- <div class="row" id="p-t-row"><div class="col-md-2 col-sm-2 col-6">'.$category_name.' - '.$j.'</div><div class="col-md-3 col-sm-4 col-6"><label id="comp_'.$i.$j.'_name">Empty</label></div><div class="col-md-1 col-sm-4 col-6"><label id="comp_'.$i.$j.'_qty">Empty</label></div><div class="col-md-1 col-sm-2 col-6"><label id="comp_'.$i.$j.'_uprice">Empty</label></div><div class="col-md-1 col-sm-2 col-6"><label id="comp_'.$i.$j.'_tprice">Empty</label></div><div class="col-md-2 col-sm-2 col-6"><img id="comp_'.$i.$j.'_image" src="" alt="Select Item"></div><div class="col-md-2 col-sm-2 col-6"><a href="javascript:void(0)" class="btn btn-sm" id="'.$category_url.'/'.$i.$j.'" onclick="openTab(this.id)" style="background-color: #4c4d4f;border-radius: 0px;color:white;font-weight: bold">Choose</a><a href="javascript:void(0)" class="btn btn-sm" id="action_button" onclick="remove_item('.$i.$j.')" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a></div></div> -->