<?php session_start();
error_reporting(0);

require "../model.php";
$user = new Model();

$uname = $_SESSION['user'];
$data = $user->display_Marks($uname);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Details</title>
    <style>
        .container-fluid{
            margin-top:2%;
        }
    </style>
</head>
<body>
<?php require "header.php";?>

<div class="container-fluid">
    <table class="table table-dark text-center" id="tab">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Topic</th>
            <th scope="col">Marks</th>
          </tr>
        </thead>
        <tbody>
            <?php
                foreach($data as $key => $value){
                    echo "<tr>";
                        foreach($value as $key => $value1){
                            if($key!='user_id'){
                            echo "<td>$value1</td>";
                            }
                        }
                        echo "</tr>";
                }
            ?>
        </tbody>
      </table>
</div>
<?php require "footer.php" ?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src=https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js></script>
<script>
    $(document).ready(function() {
        $('#tab').DataTable();
    } );
</script>