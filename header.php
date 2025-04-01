

<div class="container">
        
      <header class="d-flex align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
        <div class="logo-img">
        
        <a href='home.php' class='logo d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none'>
          EzQuiz
          </a>
        
        </div>

        <div class="menu">
          <ul class="main-menu nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          
            <li><a href='home.php' class='nav-link px-2 link-dark'>Home</a></li>
            <li><a href='about.php' class='nav-link px-2 link-dark'>About</a></li>
            <li><a href='subject.php' class='nav-link px-2 link-dark'>Subjects</a></li>
            <li><a href='contact.php' class='nav-link px-2 link-dark'>Contact Us</a></li>
          
            
          </ul>
        </div>
  
        
          <!--<div class="dropdown text-end">
            <a href="#" class="d-flex link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="files/user-icon.png" alt="mdo" width="30" height="30" class="rounded-circle">
              <?php echo $row['name']?>
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
          -->
          <div class="dropdown">
            <a class="nav-link dropdown-toggle rounded-pill" style="font-size:20px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="files/user-icon.png" alt="mdo" width="30" height="30" class="rounded-circle">
                <strong><?php echo $_SESSION["username"]; ?></strong>
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="old_exam_results.php">Last Results</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout.php">Log out</a></li>
            </ul>
          </div>


        
        

      </header>
    </div>
