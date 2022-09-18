<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">PHP OOP CRUD</h1>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                             <th>Email</th>
                            <th>Mobile No</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include 'model.php';
                        $model = new Model;
                        $rows = $model->fetch();
                        if (!empty($rows)) {
                        foreach($rows as $row){
                            ?>
                            <tr>
                              <td><?php echo $row['id']?></td>
                              <td><?php echo $row['name']?></td>
                              <td><?php echo $row['email']?></td>
                              <td><?php echo $row['phone']?></td>
                              <td><?php echo $row['address']?></td>
                               <td>
                                <button class ="btn btn-info"> 
                                    <a href="read.php?id=<?php echo $row['id']; ?>" class=" text-light">Read</a></button>
                                <button class ="btn btn-primary">
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="text-light">Delete</a>
                                </button>
                                <button class ="btn btn-success">
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-light">Edit</a>
                                </button>
                                   
                                   
                                    
                                </td>
                            </tr>
                        <?php
                        }
                        }
                        ?>
                       
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

   
  </body>
</html>