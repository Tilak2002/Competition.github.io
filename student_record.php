<?php
require 'session.php';

include 'class.php';
$ob = new DB();

$res = $ob->selectquery("student");


// $res=$obj->selectquery("record_details"); 
// // $mob="9876543210";
// $mob = $_SESSION['uname'];
// $arr=array('username'=>$mob);
// $res1=$obj->selectquery("c_details",$arr); 

// $arr1=array('invoice_no'=>$inv)
// $obj->deletequery("record_details",$arr1);
?>


<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <title>Purchase Records</title>

    <style>
            .container
            {
                background: silver;
                overflow-y: scroll;
                height: 100vh;
                width: 100%;
            }
            .table th,td{
                border-radius:5px;
                
            }
            #tab{
                box-shadow:7px 7px #888888;
            }

            #h1{
                margin-top: 20px;
                display:block;
                text-align:center;
                border:1px solid black;
                border-radius:7px;
                box-shadow:5px 5px #888888;
            }
            #h{
                text-align:center
            }
            body {
                display: flex;
            }
        </style>

</head>

<body>
<div>
    <?php 
        include 'sidebars.php';
      ?>
</div>

    
    <div class="container" id="con">
            <header id="h1"><h3>Records</h3></header>
        <h1 id="h">Purchase Details</h1>
        <table id="tab"class="table table-bordered table-hover table-success table-striped">
            <thead class="table-info">
                <th class="serial">Serial No.</th>
                <th>Roll No.</th>
                <th>Student Name</th>
                <th>Marks</th>
                <th>Acitivities</th>
                <th>Delete</th>
            </thead>
            <tbody>
               <?php $i=1;
                // $row1=mysqli_fetch_assoc($res1);
                // $code=$row1['code'];

                
                 while($row=mysqli_fetch_assoc($res))
                {?>
                    <tr  id="<?php echo 't_'.$row['rollno']?>">
                        <td><?php echo $i?></td>
                        <td><?php echo $row['rollno']?></td>
                        <td><?php echo $row['name']?></td>
                        <!-- <td><?php// echo $code.$row['invoice_no']?></td>
                        <td><?php// echo $row['order_date']?></td> -->
                        <td><button  data-fancybox data-src="#content" id="btn" class="btn btn-info" value="<?php echo $row['rollno']?>">view</button></td>
                        <td><button  data-fancybox data-src="#content1" id="btn" class="btn btn btn-info" value="<?php echo $row['rollno']?>">View</button></td>
                        <td><button class="del-btn btn btn-info" value="<?php echo $row['rollno']?>">Delete</button></td>
                    </tr><?php
                    
                    $i++;
                }?>
            </tbody>
            </table>
        
    </div>
    <!-- <div id="content"  style="display:none;">
           <h1>Hello</h1>
    </div> -->
    <div id="content" style="display:none;">
            <table class="table table-bordered table-hover table-success table-striped" >
                <thead class="table-info">
                    <th>Sr No.</th>
                    <th>Physics</th>
                    <th>Chemistry </th>
                    <th>Maths</th>
                    <th>Biology</th>
                    <!-- <th>Total</th> -->
                </thead>
                <tbody id="tb">
                </tbody>
            </table>
    </div>
    <div id="content1" style="display:none;">
            <table class="table table-bordered table-hover table-success table-striped" >
                <thead class="table-info">
                    <th>Sr No.</th>
                    <th>Activity</th>
                </thead>
                <tbody id="tb1">
                </tbody>
            </table>
    </div>



    <script>
            $('.btn').click(function(){

                var value = $(this).val();
                // var code = "<?php //echo $code ?>"
                console.log(value);

                $.ajax({
                    method: "POST",
                    url:"http://sql213.epizy.com/Competition/view_mark.php",
                    data:
                    {
                        value: value 
                        // code: code
                    }

                }).done(function(msg){
                    

                    $("#tb").html(msg);
                    

                });

                $.ajax({
                    method: "POST",
                    url:"http://sql213.epizy.com/Competition/view_activity.php",
                    data:
                    {
                        value: value 
                        // code: code
                    }

                }).done(function(msg){
                    

                    $("#tb1").html(msg);

                });
                  
            });

            

        $('.del-btn').click(function(){

            if(confirm("Are you sure want to delete it?")) {
                let val = $(this).val();
                    console.log(val);

                $.ajax({
                    method: "POST",
                    url:"http://sql213.epizy.com/Competition/delete_student_record.php",
                    
                    data:
                    {
                        value: val 
                    }
                }).done(function(response){

                    // let var="<?php// echo $var?>";
                    alert("Data deleted successfully");
                    $('#t_'+val).html("");
                });
            }
        });

        // $('.print-btn').click(function(){

        //     var print = $(this).val();
        //     window.open("http://sql213.epizy.com/Invoice/table1.php?id="+print+"");
        // });


    </script>

</body>

</html>