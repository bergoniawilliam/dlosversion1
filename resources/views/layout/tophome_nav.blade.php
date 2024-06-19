<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DLOS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
          </div>
        </li>
     
      <div>
          </div>
          <style>

  .dropdown-menu a.dropdown-item:hover {
    background-color: #8BB7F7 ; /* Set the desired background color */
  }

</style>

<div class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" style="color: white;" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person" viewBox="0 0 16 16">
      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
    </svg>
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="login">LOGIN</a>
    <!-- Additional dropdown items can be added here -->
  </div>
</div>
      
    </div>
  </div>
</nav>

<script>
  // Wait for the document to load
  document.addEventListener("DOMContentLoaded", function() {
    var dropdownToggle = document.querySelector(".dropdown-toggle");
    var dropdownMenu = document.querySelector(".dropdown-menu");
    var mouseLeaveTimer;

    dropdownToggle.addEventListener("mouseover", function() {
      clearTimeout(mouseLeaveTimer);
      dropdownMenu.style.display = "block";
    });

    dropdownToggle.addEventListener("mouseout", function() {
      mouseLeaveTimer = setTimeout(function() {
        dropdownMenu.style.display = "none";
      }, 200); // Adjust the delay time (in milliseconds) as needed
    });

    dropdownMenu.addEventListener("mouseover", function() {
      clearTimeout(mouseLeaveTimer);
    });

    dropdownMenu.addEventListener("mouseout", function() {
      dropdownMenu.style.display = "none";
    });
  });
</script>