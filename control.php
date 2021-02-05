<?php
session_start();
error_reporting(0);

require "model.php";
$obj = new Model();
$action = $_REQUEST['action'];

switch($action)
{
    case "insert":
            $email = $_POST['email'];
            $name = $_POST['name'];
            $number = $_POST['number'];
            $password = $_POST['password'];

            $data = $obj->register_Data($email,$name,$number,$password);
            if($data==0)
            {
                echo "1";
            }
            else if($data == 2)
            {
                echo "2";
            }
            break;

    case "show":
            $email = $_POST['email'];
            $password = $_POST['password'];

            $data = $obj->show_Data($email,$password);
            if($data==0)
            {
                echo "1";
            }
            else if($data['is_admin']==1)
            {
                $_SESSION['admin'] = $data['name'];
                echo "2";
            }
            else if($data['is_admin']==0 && $data['email']==$email)
            {
                $_SESSION['user'] = $data['name'];
                echo "3";
            }
            break;     

    case "create":
            $category = $_POST['category'];

            $data = $obj->create_Category($category);
            if($data==0)
            {
                echo "1";
            }
            else if($data == 2)
            {
                echo "2";
            }
            break;

    case "add_Question":
            $cat_name = $_POST['select'];
            $question = $_POST['question'];
            $ans1 = $_POST['ans1'];
            $ans2 = $_POST['ans2'];
            $ans3 = $_POST['ans3'];
            $ans4 = $_POST['ans4'];
            $answer = $_POST['answer'];
            
            $data = $obj->add_Questions($question,$ans1,$ans2,$ans3,$ans4,$answer,$cat_name);
                if($data==0)
                {
                    echo "1";
                }
                else if($data==1)
                {
                    echo "2";
                }
            break;
            
    case "display":
            $marks = $_POST['marks'];
            $uname = $_SESSION['user'];
            $id = $_POST['id'];
            // $id = rand(1,10);
            $select = $_POST['select'];
            $opt=$_POST['opt'];

            $data = $obj->display_Data($select);
            $data1 = $obj->display_Score($opt,$select);
                    
                foreach($data1 as $key =>$value2)
                {
                    if($opt==$value2)
                    {
                        echo "&nbsp";
                    }
                }
            foreach($data as $key => $value)
            {
                if($key==$id)
                { 
                    foreach($value as $key =>$value1)
                    {
                        if($key == 'question')
                        {
                            echo "<h2>".($id+1)." .". $value1."</h2>";
                        }
                        else if($key!='id')
                        {
                            echo "<span style='margin-left:4%;'><input type='radio' name='opt' value='$value1'></span>";
                            echo "<span style='color:black;margin-left:1%;font-size:20px;'>$value1</span>"."<br>";
                        }
                    }
                        
                }
            }

            if($id==10)
            {
            $data3 = $obj->insert_Marks($uname,$select,$marks);
                echo $data3;
                if($data3 == 0)
                {
                    echo "error_occured";
                }
                else if($data3 == 1)
                {
                    echo "marks inserted";
                }
            }
            break;

    case "showresults":
            $data3 = $obj->showMarks();
                echo json_encode($data3);
            break;

           
}








?>