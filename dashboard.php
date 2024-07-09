<?php
	session_start();

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    
    <link rel="stylesheet" href="styleup7.css" />

     
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	
  </head>
  <body>
  <form method="POST">
    <div class="sidebar">
      <div class="logo-details">
       
        
      </div>
	  <ul class="nav-links">
        <li>
          <a href="dash_data.php" class="active" id="autoclick" onclick="loaddash()" target="home">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name" id="tab1">Dashboard</span>
          </a>
        </li>
	
			
        <li>
          <a href="doctors.php" target="home" onclick="loadContent()" >
           <i class='bx bx-plus-medical'></i>
            <span class="links_name">Doctors</span>
          </a>
        </li>
        <li>
          <a href="patients.php" onclick="scheduleclick()" target="home">
            <i class='bx bx-handicap'></i>
            <span class="links_name">Patients</span>
          </a>
        </li>
		
		<li class="dropdown">
            <i class="bx bx-task" style="padding-top:15px;padding-bottom:3px;"></i>
            <span type="button" class="collapsible"class="links_name" style="background-color:transparent;" >Appointments &#9662;</span></a>
			<ul class="content">
			  <li class="links_name" ><a href="book_appointment.php"  target="home" style=" font-size: 15px;width:240px;padding-left:50px;color:white">&#9656;Book Appointment</a></li>
			  <li class="links_name"><a  href="view_appointment.php"  target="home" style=" font-size: 15px;width:240px;padding-left:50px;color:white">&#9656;View Appointment</a></li>
			 
			</ul>
			</li>
			
        
        <li>
          <a href="specialization.php" target="home">
		  
            <i class="bx bx-message"></i>
            <span class="links_name">Specialization</span>
          </a>
        </li>
        <li>
          <a href="users.php" target="home">
            <i class="bx bx-user"></i>
            <span class="links_name">Users</span>
          </a>
        </li>
       
  
        <li class="log_out">
          <a href="index.html">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
	  </div>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
           <i class="bx bx-menu sidebarBtn"></i> 
          <span class="dashboard">Dashboard</span>
        </div>
       
		
       
      </nav>
	 
	  
	  <!-- initial content-->
	  
	  <div class="home-content"  id="mydiv" style="padding-top: 100px;">
        <iframe name="home" id="home" frameborder="0" height="100%" width="100%" scrolling="yes" onload="resizeIframe()"></iframe> 
		
     
		<?PHP
		$projectcr = false;
		if($projectcr == false){
		?>
		
		<?php } 
		else if($projectcr == true){
		?>
		
		  
		  
		  
		<?php 
	}
	
	
		?>
		
        </div>
	
      </div> 
	  <!-- home-content end -->
     
    </section>
	
	
	
	<script>
	function resizeIframe(){
		var iframe = document.getElementById("home");
		iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
	}
	
    </script>
	
	<script>
		window.addEventListener('load',function(){
			var button= document.getElementById('autoclick');
			button.click();
		});
	</script>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
	<script>
	var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
		  coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
			  content.style.display = "none";
			} else {
			  content.style.display = "block";
			}
		  });
		}
	</script>
  </body>
</html>