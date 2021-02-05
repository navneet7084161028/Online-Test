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
    <table class="table table-dark text-center display" id="example">
        <thead>
          <tr>
            <th scope="col">User Id</th>
            <th scope="col">Topic</th>
            <th scope="col">Marks</th>
          </tr>
        </thead>
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
        $('#example').DataTable({
            ajax: '../control.php?action=showresults',
            dataSrc: 'data',
            columns: 
            [
                { "data": "user_id" },
                { "data": "topic" },
                { "data": "marks" }
            ]
        });
    });
</script>