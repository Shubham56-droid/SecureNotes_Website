<?php
    $servername = "localhost";
    $username = "root";
    $passowrd = "";
    $database = "notes";

    $conn = mysqli_connect($servername,$username,$passowrd,$database);

    if(!$conn){
      die("Sorry failed to connect to database");
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add - Notes</title>

    <!---------Bootstrap CSS---------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <!--- icon cdn --->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <!---------Bootstrap JS-------------->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


    <!---------  table ------------------------>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <!------Custom CSS ----------->
    <link rel="stylesheet" href="style.css">
  
    <script>
      $(document).ready( function () { $('#table_id').DataTable();});
    </script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand brand-name" href="#"><ion-icon name="pencil"></ion-icon>Personal Note</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

      </ul>
    </div>
  </div>
</nav>


<?php
      
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      if(isset($_POST['snoEdit'])){

            //if :  update the record
            $snoedit = $_POST['snoEdit'];
            $updatetopic = $_POST['titleEdit'];
            $updatedesc = $_POST['descriptionEdit'];

            // checking weather $updatetopic and $updatedesc are empty or not.
            if($updatetopic == '' or $updatedesc == ''){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Update Failed !</strong> Sorry, failed to update data. You have to fill both notetopic and description to update data.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
            else{
                  //sql for update
                  $updatesql = "UPDATE `noteitem` SET `notetopic` = '$updatetopic' , `notedesc` = '$updatedesc' WHERE `noteitem`.`sno` = '$snoedit'";
                  $updateins = mysqli_query($conn,$updatesql);

                  if(!$updateins){
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Update Failed !</strong> Sorry, failed to update data in database due to technical problem.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                  }else{
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Update Successfull !</strong> Note is Updated successfully into database.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                  }
            }


      }
      else if(isset($_POST['snoDel']))
      {
        $snoDel = $_POST['snoDel'];
        // else if: Delete the record
        $delsql = "DELETE FROM `noteitem` WHERE `noteitem`.`sno` = '$snoDel'";
        $delcheck = mysqli_query($conn,$delsql);

        if(!$delcheck){

              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Update Failed !</strong> Sorry, failed to delete data in database due to technical problem.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

        }else{

              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Deleted Successfull !</strong> Note is Deleted successfully into database.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

        }
      }
      else if(isset($_POST['delAll'])){
          $delallsql = "DELETE FROM `noteitem`";
          $delallcheck = mysqli_query($conn,$delallsql);
          if(!$delallcheck){

            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Failed To Delete All Notes !</strong> Sorry, failed to delete all data from database due to technical problem.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

          }else{

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Deleted All Notes Successfull !</strong>All Notes is Deleted successfully from database.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

          }
      }
      else{ 
            
          //else: insertion of the record
          $topic = $_POST['topic'];
          $desc = $_POST['desc'];

          if($topic != '' || $desc != ''){

              // sql for insertion
              $sqlins = "INSERT INTO `noteitem`(`notetopic`,`notedesc`) VALUES('$topic','$desc')";
      
              $resins = mysqli_query($conn,$sqlins);
              
              if(!$resins){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Insertion Failed !</strong> Sorry, failed to insert data in database.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              }else{
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Inserted Successfully !</strong> Note is inserted successfully into database.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              }
          }else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Please fill data properly.</strong> Either note topic or note description is empty please fill both the section.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          } 
      }
      
  }

?>

<div class="container_custom">


      
<div class="container my-4  con1">
<h2 style="text-align: center; color: #444">Add Your Notes</h2>
<form method="post" action="/notes_php/index.php" autocomplete="off">

    <div class="mb-3 my-3">
        <label for="exampleInputEmail1" class="form-label">Note Topic</label>
        <input type="text" class="form-control" id="topic" name="topic" >
        
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Note Description</label>
        <textarea class="form-control" id="desc"  name="desc" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Add Note</button>
    <button type="button" class="btn btn-danger" id="deleteAll">Delete All Notes</button>

</form>
</div>

<div class="container my-4 con2">
<table class="table table-striped table-hover" id="table_id" class="display">
  <thead class="table-dark">
    <tr>
      <th scope="col">Sno.</th>
      <th scope="col">Note Topic</th>
      <th scope="col">Note Description</th>
      <th scope="col">Changes</th>
    </tr>
  </thead>
  <tbody>

    <?php
        // showing data stored into database
        $sqldisdata = "SELECT * FROM noteitem ORDER BY sno DESC";
        $resdis = mysqli_query($conn,$sqldisdata);
        $sno = 0;

        $nrow = mysqli_num_rows($resdis);

        if($nrow > 0){
          while($row = mysqli_fetch_assoc($resdis)){
            $sno = $sno + 1;
 

            echo '<tr>
            <td>'.$sno.'</td>
            <td>'.$row['notetopic'].'</td>
            <td>'.$row['notedesc'].'</td>

            <td>
              
              <button class="edit btn btn-sm btn-warning" id=" '.$row['sno'].' ">
                Update
              </button>

              <button class="deleteRow btn btn-sm btn-danger" id=" '.$row['sno'].' ">
                  Delete
                </button>

            </td>
          </tr>';
          }
        }

        
    ?>
    
    
  </tbody>
</table>
</div>




</div>





<!--------------------- Update Modal ------------------>

<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
        <form  method="post" action="/notes_php/index.php" autocomplete="off">

        <!----   hidden input   ----->
          <input type="hidden" name="snoEdit" id="snoEdit">

          <div class="mb-3">
              <label for="titleEdit" class="form-label">Update Note Topic</label>
              
              <input type="text" class="form-control" id="titleEdit" name="titleEdit">
          </div>
          <div class="mb-3">
              <label for="descriptionEdit" class="form-label">Update Note Description</label>

              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-success">Update Confirm</button>
            </div>

        </form>

      </div>

      

    </div>
  </div>
</div>

<!-----------------Delete Modal ------------------> 

<div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete note ?
      </div>
        <form method="post" action="/notes_php/index.php" autocomplete="off">

              <input type="hidden" name="snoDel" id="snoDel">

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete Confirm</button>
              </div>

        </form>
    </div>
  </div>
</div>



<!----------------------------   Modal to delete all notes in databese -------------------->
<div class="modal fade" id="delAllModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete All Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete all the notes?
      </div>
        <form method="post" action="/notes_php/index.php" autocomplete="off">
            <input type="hidden" name="delAll" id="delAll">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="delAllVal">Delete All Confirm</button>
              </div>
        </form>
    </div>
  </div>
</div>


<script>

    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((elements)=>{
      elements.addEventListener("click", (e)=>{
          
          tr = e.target.parentNode.parentNode;
          
          title = tr.getElementsByTagName("td")[1].innerText;

          description = tr.getElementsByTagName("td")[2].innerText;

          console.log(title, description);

          titleEdit.value = title;
          descriptionEdit.value = description;
          snoEdit.value = e.target.id;


          console.log(e.target.id);

          $('#editModal').modal('toggle');
      })
    })



    dels = document.getElementsByClassName('deleteRow');
    Array.from(dels).forEach((elements)=>{
      elements.addEventListener("click", (d)=>{

          snoDel.value = d.target.id;
          console.log(d.target.id);
          $('#delModal').modal('toggle');
      })
    })


 
    delAll = document.getElementById('deleteAll');
    delAll.addEventListener("click",(e)=>{
      delAll.value = e.target.id;
      console.log(e.target.id);
      $('#delAllModal').modal('toggle');
    })
    
</script>

</body>
</html>
