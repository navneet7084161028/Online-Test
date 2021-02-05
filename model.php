<?php
require "dbcon.php";

class Model extends Dbcon
{
    public $conn;
    public $a=[];

    public function __construct()
    {
        $user = new Dbcon();
        $this->conn = $user->connection();
    }

        public function register_Data($email,$name,$number,$password)
        {
            $sql = "INSERT INTO `user`(`email`, `name`, `number`, `password`,`is_admin`) 
                VALUES ('$email','$name','$number','$password',0)";
                if($row = $this->conn->query($sql))
                {
                    return true;
                }
                else
                {
                    return false;
                }
        }

        public function show_Data($email,$password)
        {
            $sql = "SELECT * FROM `user` where `email` = '$email' and `password` = '$password' ";
            $data = $this->conn->query($sql);
            $row = mysqli_fetch_assoc($data);
            return $row;
        }

        public function create_Category($category)
        {
            $sql = "INSERT INTO `category`(`topic`) 
            VALUES ('$category')";
            if($row = $this->conn->query($sql))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function add_Questions($question,$ans1,$ans2,$ans3,$ans4,$answer,$cat_name)
        {
            $sql = "INSERT INTO `question`(`cat_id`,`question`, `option1`, `option2`, `option3`, `option4`, `answer`) 
                        VALUES ((SELECT `topic_id` from `category` where `topic`='$cat_name'),'$question','$ans1','$ans2','$ans3','$ans4','$answer')";
            if($row = $this->conn->query($sql))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function display_Category()
        {
            $sql = "SELECT * FROM `category`";
            if($data = $this->conn->query($sql))
            {
                while($row = mysqli_fetch_assoc($data))
                {
                    $this->a[] = $row;
                }
                return $this->a;
            }
            return false;
        }

        public function display_Data($select)
        {
            $sql1 = "SELECT `topic_id` FROM `category` where `topic`='$select'";
            $result = $this->conn->query($sql1);
            $row = $result->fetch_assoc();
            $id = $row['topic_id'];

            $sql = "SELECT * FROM `question` where `cat_id`='$id'";
            if($data = $this->conn->query($sql))
            {
                while($row = mysqli_fetch_assoc($data))
                {
                    $this->a[]=array(
                        'id'=>$row['id'],
                        'question'=>$row['question'],
                        'option1'=>$row['option1'],
                        'option2'=>$row['option2'],
                        'option3'=>$row['option3'],
                        'option4'=>$row['option4'],
                    );
                }
                return $this->a;
            }
            return false;

        }

        public function display_Score($opt,$select)
        {
            $sql1 = "SELECT `topic_id` FROM `category` where `topic`='$select'";
            $result = $this->conn->query($sql1);
            $row = $result->fetch_assoc();
            $id = $row['topic_id'];

            $sql = "SELECT `answer` FROM `question` where `answer`='$opt'";
            $result1 = $this->conn->query($sql);
            $row1 = $result1->fetch_assoc();
            return $row1;

        }

        public function insert_Marks($uname,$select,$marks)
        {
            $sql = "SELECT `user_id` FROM `user` where `name`='$uname'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            $u_id = $row['user_id'];

            $sql1 = "INSERT INTO `test`(`user_id`, `topic`, `marks`) 
                    VALUES ('$u_id','$select','$marks') ";
                if($row = $this->conn->query($sql1))
                {
                    return true;
                }
                else
                {
                    return false;
                }
        }

        public function display_Marks($uname)
        {
            $sql = "SELECT `user_id` FROM `user` where `name`='$uname'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            $u_id = $row['user_id'];

            $sql1 = "SELECT * FROM `test` where `user_id`='$u_id'";
            if($result = $this->conn->query($sql1))
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $this->a[] = $row;
                    }
                    return $this->a;
            }
            return false;
        }

        public function showMarks()
        {
            $sql = "Select `user_id`, `topic`, `marks` from `test`";
            $result = $this->conn->query($sql);
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result)){
                    $this->a['data'][] = $row;
                }
                return $this->a;
            }
            else
            {
                return false;
            }
            
        }

        public function show_User()
        {
            $sql = "SELECT * FROM `user` ";
            if($result = $this->conn->query($sql))
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $this->a[] = $row;
                }
                return $this->a;
            }
            return false;
        }

}
?>