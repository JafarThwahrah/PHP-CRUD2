<?php
require_once 'conn.php';
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>

<body>


  <div class="d-flex justify-content-center">
    <hr class="w-75">
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Patients record</h3>
        <hr />
        <a href="AddPatient.php"> <button type="button" class="btn btn-primary btn-lg">Add new Patient</button></a>
        <div class="table-responsive">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>ID</th>
              <th>Name</th>
              <th>Info</th>

              <th>Update</th>
              <th>Delete</th>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM patients";
              $query = $conn->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              foreach ($results as $result) {
              ?>
                <!-- Display Records -->
                <tr>
                  <td><?php echo ($result->ID); ?></td>
                  <td><?php echo ($result->Name); ?></td>

                  <td> <a href="view.php?vid=<?php echo ($result->ID); ?>" class="btn btn-primary">
                      More Info
                    </a></td>
                  <td> <a href="UpdatePatient.php?id=<?php echo ($result->ID); ?>"><button class="btn btn-info btn-s"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                  <td><a href="RemovePatient.php?del=<?php echo ($result->ID); ?>"><button class="btn btn-danger btn-s" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                </tr>





              <?php
                // for serial number increment
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>












  <!-- JavaScript Bundle with Popper -->

</body>

</html>