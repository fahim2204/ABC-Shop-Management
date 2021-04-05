<!-- <!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/ABC-Shop-Management/css/homeIndex.css" >        
    </head>
    <body>
        <div class="menu-container">
        <ul class="menu">
        <li class="logo"><a href="#">Creative Mind Agency</a></li>
        <li class="item"><a href="#">Home</a></li>
        <li class="item"><a href="#">About</a></li>
        <li class="item has-submenu">
            <a tabindex="0">Services</a>
            <ul class="submenu">
                <li class="subitem"><a href="#">Design</a></li>
                <li class="subitem"><a href="#">Development</a></li>
                <li class="subitem"><a href="#">SEO</a></li>
                <li class="subitem"><a href="#">Copywriting</a></li>
            </ul>
        </li>
        <li class="item has-submenu">
            <a tabindex="0">Plans</a>
            <ul class="submenu">
                <li class="subitem"><a href="#">Freelancer</a></li>
                <li class="subitem"><a href="#">Startup</a></li>
                <li class="subitem"><a href="#">Enterprise</a></li>
            </ul>
        </li>
        <li class="item"><a href="#">Blog</a></li>
        <li class="item"><a href="#">Contact</a>
        </li>
        <li class="item button"><a href="#">Log In</a></li>
        <li class="item button secondary"><a href="#">Sign Up</a></li>
        <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
    </ul>
        </div>

    </body>
</html>
 -->

 <!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 95%;
  width: 100%;
  top: 0;
  left: 0;
  background-color: transparent;
  /* overflow-x: hidden; */
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
  <button class="dropdown-btn">Dropdown 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
  <a href="#contact">Search</a>
</div>



<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html> 
