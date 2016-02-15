<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
  <?php require '../../navigationCrud.php' ?>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="productCreate.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Cost</th>
                          <th>Description</th>
                          <th>Subcategory Id</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include '../../database.php';
                       $pdo = Database::connect();
                       $sql = 'SELECT * FROM product ORDER BY id desc';
                       foreach ($pdo->query($sql) as $row) {
                          echo '<tr>';
                          echo '<td>'. $row['name'] . '</td>';
                          echo '<td>'. $row['cost'] . '</td>';
                          echo '<td>'. $row['description'] . '</td>';
                          echo '<td>'. $row['subcategory_id'] . '</td>';
                          echo '<td width=250>';
                          echo '<a class="btn" href="productRead.php?id='.$row['id'].'">Read</a>';
                          echo ' ';
                          echo '<a class="btn btn-success" href="productUpdate.php?id='.$row['id'].'">Update</a>';
                          echo ' ';
                          echo '<a class="btn btn-danger" href="productDelete.php?id='.$row['id'].'">Delete</a>';
                          echo '</td>';
                          echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>