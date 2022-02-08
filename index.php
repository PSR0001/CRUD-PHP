<?php
//INSERT INTO `notes` (`SL.NO`, `title`, `description`, `DT`) VALUES (NULL, 'he he ', 'nice boi', current_timestamp());
$insert = false;
// Connecting to Database
$serverName = "localhost";
$userName = "root";
$pass = "";
$DB = "notes";

// Create a connection
$connect = mysqli_connect($serverName, $userName, $pass,$DB);

// Die if connection was not successfull
if ($connect) {
    // echo 'Database is connected !!';
} else {
    // echo alert-->
    echo 'Error !!';
    echo mysqli_connect_error($connect);
}

//submit form data
if($_SERVER['REQUEST_METHOD']=="POST"){
    $title = $_POST["title"];
    $description = $_POST["des"];

    $sql = "INSERT INTO `notes` (`SL.NO`, `title`, `description`, `DT`) VALUES (NULL, '$title', '$description', current_timestamp())";
    $result = mysqli_query($connect,$sql);

    if ($result) {
      $insert = true;
    }else{
      echo 'Error'.$mysqli_error($connect);
    }
}


 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
<link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready( function () {
  $('#myTable').DataTable();
} );
</script>
    <title>PHP-CRUD-Create-Repeat-Update-Delete</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"
          ><img src="images/php-logo.png" width="40px" alt="php"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="webpages/about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="webpages/contact.php">Contact Us</a>
            </li>
          </ul>
          <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
<?php
if ($insert){
  echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Success ! </strong> Your note has been inserted Sucessfully !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
}

?>
    <!-- form -->

    <div class="container my-3">
      <h2><strong>Add a Note</strong></h2>
      <form action="index.php" method="post">
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title"/>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Description</label>
          <textarea class="form-control" id="des" name="des" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Note</button>
      </form>
    </div>
    <div class="container">

       <table class="table">
         <thead>
           <tr>
             <th scope="col">Sl.No</th>
             <th scope="col">Title</th>
             <th scope="col">Description</th>
             <th scope="col">Actions</th>
           </tr>
         </thead>
         <tbody>
           <?php
            $sql = "SELECT * FROM `notes`";
            $result = mysqli_query($connect,$sql);
            $SL = 1;
            while($note = mysqli_fetch_assoc($result)){
              echo "<tr>
                 <th scope='row'>".$SL."</th>
                 <td>".$note['title']."</td>
                 <td>".$note['description']."</td>
                 <td> Actions </td>
               </tr>";
               $SL=$SL+1;
              // echo $note['SL.NO'].' hello '.$note['title'].' Hi '.$note['description'].' . <br>';

            }
            ?>
         </tbody>
       </table>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
