<?php

require "../model.php";
 $user = new Model();

 $data = $user->display_Category();
//  print_r($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserDashboard</title>
    <style>
        #btn4{
            display: none;
            margin-left: 5%;
        }
        #btn5{
            display: none;
            margin-left: 25%;
        }
        #h2{
            color: rgb(88, 151, 233);
            margin-left: 20%;
        }
        #div2{
            float: left;
            width: 100%;
            height: auto;
        }
        #btn{
            margin-top:2%;
            margin-left: 10%;
        }
        #h3{
            padding-left:40px;
            padding-top:50px;
            
        }
        form{
            margin:auto;
            width:60%;
            margin-top:5%;
            display:none;
        }
        label{
            font-weight:bolder;
            font-size:20px;
        }
        #demo{
            float: right;
            width: 60%;
            height: 72.4vh;
            background-image: url('https://thumbs.dreamstime.com/b/flat-lay-composition-laptop-smartphone-phrase-online-exam-wooden-background-179521400.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        #demo2{
            margin-left:35%;
            margin-top:12%;
            font-size:50px;
            font-weight:bolder;
            color:red;
        }
        #demo3{
            display:none;
            margin-left:45%;
            margin-top:1%;
            font-size:50px;
            font-weight:bolder;
            color:green;
        }
        #demo5{
            margin-left:40%;
            font-size:60px;
            color:red;
        }
        #tim{
            margin-left:20%;
            font-size:60px;
            color:blue;
            display:none;
        }
        #pp{
            color:black;
            font-size:30px;
            font-weight:bolder;
        }
    </style>
</head>
<body>
<?php require "header.php";?>

<form id="form_data">
    <p id="pp">Please Select Any Category To Start the Specified Test</p>
    <div class="form-group">
        <label>Choose Category</label><br>
            <select class="form-control" name="select" id="select">
                <option>Choose</option>
                <?php
                    foreach($data as $key => $value)
                    {
                        foreach($value as $key => $value1)
                        {
                            if($key!='topic_id')
                            {
                                echo "<option value='$value1'>$value1</option>";
                            }
                        }
                    }
                ?>
            </select>
    </div>
        <input type="submit" name="submit" id="choose" class="btn btn-outline-warning" value="Choose" disabled>
        
</form>
<div id="div2">
    <div id='demo'></div>
    <div><p id="tim">Timer<span id="demo5"></span></p></div>
        <h2 id="h2"></h2>
            <input type="button" class="btn btn-outline-info" value="PREV" id="btn5">
            <input type="button" class="btn btn-outline-info" value="NEXT" id="btn4">
            

        <h3 id="h3">Click Here To Start Quiz...</h3>
            <input type="button" class="btn btn-outline-danger" value="Start_Quiz" id="btn" >
            <p id="demo2"></p>
            <p id="demo3"></p>
            
</div>
<?php require "footer.php"; ?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    var id = 0;
        $('#select').on('change',function(){
            $('#choose').prop('disabled',false);
        });

        $('#choose').on('click',function(){
            setInterval(() => {show();
            
            }, 1000);
        });
    
        $('#btn').on('click',function(e){
            e.preventDefault();
                $('#demo').hide();
                $('#btn').hide();
                $('#h3').hide();
                $('#form_data').show();
            });

        $('#form_data').submit(function(e){
            $('#form_data').hide();
            $('#h2').show();
            $('#btn4').show();
            $('#btn5').show();
            $('#tim').show();
                e.preventDefault();
                    let select = $('#select').val();
                        id=id+1;
                            $.ajax({
                                method:'POST',
                                url:'../control.php',
                                data:$(this).serialize()+"&action=display"+"&id=0",
                                success:function(data){
                                // console.log(data);
                                $('#h2').html(data);
                            },
                        });
                    });

        $('#btn5').on('click',function(e){
            e.preventDefault();
                var select = $('#select').val();
                var opt=$('input[name="opt"]:checked').val();
                    id = id-1;
                        $.ajax({
                            method:'POST',
                            url:'../control.php',
                            data:{
                                'select':select,
                                'id':id,
                                'opt':opt,
                                'action':'display'
                            },
                            success:function(data){
                            // console.log(data);
                            $('#h2').html(data);
                        },
                    });
                });

        var i=0;
        $('#btn4').on('click',function(e){
            e.preventDefault();
                var select = $('#select').val();
                var opt=$('input[name="opt"]:checked').val(); 
                    $.ajax({
                        method:'POST',
                        url:'../control.php',
                        data:{
                            'select':select,
                            'id':id,
                            'marks':i,
                            'opt':opt,
                            'action':'display'
                        },
                        success:function(data){
                        // console.log(data);
                            if(data.match(/&nbsp/))
                            {
                                i=i+5;
                                    console.log(i);
                            }
                            if(i<25)
                            {
                                $('#demo3').html("Fail");  
                            }
                            if(i>25)
                            {
                                $('#demo3').html("Pass"); 
                            }
                            if(id>10)
                            {   
                                $('#demo5').hide();
                                $('#tim').hide();
                                $('#btn4').hide();
                                $('#btn5').hide();
                                $('#h2').hide();
                                $('#demo3').show();
                                $('#demo2').html("Your Marks is: "+i);
                            }
                            $('#h2').html(data);
                        },
                    });
                    id = id+1;
                });

        var sec = 30;
        var min = 0;
        function show(){
            $('#demo5').text(min+":"+sec);
                sec = sec-1;
                if(sec==0)
                {
                    sec = 59;
                    min = min-1;
                        $('#btn4').hide();
                        $('#btn5').hide();
                        $('#h2').hide();
                        $('#demo3').show();
                        $('#demo2').html("Your Marks is: "+i);
                        $('#demo5').hide();
                        $('#tim').hide();
                }
            }
});


</script>