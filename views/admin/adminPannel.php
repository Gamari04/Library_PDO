

<?php 
session_start();
if(isset($_SESSION['role']) &&  $_SESSION['role']!='1'){
    header("Location: ../login.php");
}
include(__DIR__ .'/../../includes/header.php');
include(__DIR__ . '/../../app/models/Book.php');
use App\models\User;

$users = new User('', '', '', '', '');
$result = $users->getAllUsers();
?>
<div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card  mb-2">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">weekend</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Bookings</p>
                                    <h4 class="mb-0">281</h4>
                                </div>
                            </div>

                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                    last week</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card  mb-2">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">leaderboard</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                                    <h4 class="mb-0">2,300</h4>
                                </div>
                            </div>

                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than
                                    last month</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card  mb-2">
                            <div class="card-header p-3 pt-2 bg-transparent">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">store</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize ">Revenue</p>
                                    <h4 class="mb-0 ">34k</h4>
                                </div>
                            </div>
    
                            <hr class="horizontal my-0 dark">
                            <div class="card-footer p-3">
                                <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">+1% </span>than
                                    yesterday</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-2">
                            <div class="card-header p-3 pt-2 bg-transparent">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person_add</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize ">Followers</p>
                                    <h4 class="mb-0 ">+91</h4>
                                </div>
                            </div>
    
                            <hr class="horizontal my-0 dark">
                            <div class="card-footer p-3">
                                <p class="mb-0 ">Just updated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    if(isset($_GET['msg'])){
      $msg = $_GET['msg'];
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
  
  ?>

        <div class="fresh-table full-color-orange">
  <!--
    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
  -->

  
    <div class="col-lg-3 col-sm-6 col-12 mt-3 mb-3">
                  <button class="btn bg-gradient-success w-50 mb-0 toast-btn" type="button" data-target="successToast"><a href="form.php">ADD Client</a></button>
                </div>
  

  <table id="fresh-table" class="table">
    <thead>
      <th data-field="id">ID</th>
      <th data-field="name">Name</th>
      <th data-field="Last name">Last Name</th>
      <th data-field="Email">Email</th>
      <th data-field="Role">Role</th>
      <th data-field="Phone" data-formatter="operateFormatter" data-events="operateEvents">Phone</th>
      
    </thead>
    <tbody>
    <?php foreach($result as $result1) :?>
      <tr>
        <td><?php echo $result1['id']?></td>
        <td><?php echo $result1['Name']?></td>
        <td><?php echo $result1['Last name']?></td>
        <td><?php echo $result1['email']?></td>
        <td><?php echo $result1['namer']?></td>
        <td><?php echo $result1['phone']?></td>
        <!-- <td><button  class="btn btn-default"><a href="edit.php?id=<?= $row['id']?>">Edit</a></button></td> -->
        <td><a class="btn btn-link text-dark px-3 mb-0" href="../dashboard/edit.php?id=<?= $row['id']?>"><i class="material-icons text-sm me-2">edit</i>Edit</a></td>
        <td><button  class="btn btn-default"><a href="../dashboard/delete.php?id=<?= $row['id']?>"><lord-icon
    src="https://cdn.lordicon.com/skkahier.json"
    trigger="hover"
    style="width:30px;height:30px">
</lord-ico></a></button></td>
  </div>
      </tr>
      
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

    </div>


    
    


<script src="https://cdn.lordicon.com/lordicon.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>