<?php
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

    <title>PHP-CRUD-Create-Repeat-Update-Delete</title>
  </head>
  <body>
<?php include 'pages/nav.php' ?>

    <!-- form -->

    <div class="container my-3">
      <h2><strong>Add a Note</strong></h2>
      <form>
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
      <?php
       $sql = "SELECT * FROM `notes`";
       $result = mysqli_query($connect,$sql);

       while($note = mysqli_fetch_assoc($result)){
         echo $note['SL.NO'].'hello'.$note['title'].'Hi'.$note['description'].'.';
       }

       ?>

    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
