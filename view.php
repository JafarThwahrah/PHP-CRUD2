<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <title>View item details</title>
</head>

<body>


  <?php
  require_once 'conn.php';

  $View = $_REQUEST['vid'];

  $sql = "SELECT * FROM patients WHERE ID = :viewID";

  $query = $conn->prepare($sql);

  $query->bindParam(':viewID', $View, PDO::PARAM_STR);

  $query->execute();

  $results = $query->fetchAll(PDO::FETCH_OBJ);

  // var_dump($results);

  foreach ($results as $result) {
  ?>





    <h1 class="text-center">Patient Details</h1>

    <div class="container-xl d-flex justify-content-center">


      <div class="card text-bg-light mb-3 mt-5" style="max-width: 50rem;">
        <div class="card-header p-5">
          <h2> Paitent ID:<?php echo ($result->ID); ?></h2>
        </div>
        <div class="card-body p-5 ">
          <h4 class="card-text p-2">Patient Name: <?php echo ($result->Name); ?></h4>
          <h4 class="card-text p-2">Patient Age: <?php echo ($result->Age); ?></h4>
          <h4 class="card-text p-2">Patient Address: <?php echo ($result->Address); ?></h4>
          <hr>
          <a href="index.php" class="btn btn-outline-dark">Back to Home Page</a>

        </div>
      </div>
    </div>

  <?php
  };
  ?>

</body>

</html>