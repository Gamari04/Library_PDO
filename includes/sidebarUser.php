<?php 
include("header.php");
session_start();
$id = $_GET['id'];
?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/Untitled_design__12_-removebg-preview.png" class="navbar-brand-img h-100 w-50" alt="main_logo">
       
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white sidebar " href="../../views/user/books.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">All Books</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../../views/user/reserveBook.php?id=<?=$_SESSION["id"]?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Reserve Book</span>
          </a>
        </li>
        <li class="nav-item">
  <a class="nav-link text-white " href="../../views/user/allReservation.php">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">assignment</i>
      </div>
    
    <span class="nav-link-text ms-1">Reserved Books</span>
  </a>

</li>
<li class="nav-item">
  <a class="nav-link text-white " href="Confirmed.php">
    
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">assignment</i>
      </div>
    
    <span class="nav-link-text ms-1">Books Available</span>
  </a>
  
</li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn sidebar mt-4 w-100" href="#" type="button" >Upgrade to pro</a>
      </div>
    </div>
  </aside>