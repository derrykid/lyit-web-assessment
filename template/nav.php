<div class="topnav" id="myTopnav">

        <!-- Button for smallest screens -->
        <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> -->
            <div class="nav-logo">
                <img src="static/images/logo.png" alt="Brilliant Home property">
            </div>

    <a href="index.php" class="active">Home</a>
    <!-- Dropdown start -->
    <div class="dropdown">
        <button class="dropbtn">Property
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="property.php?property=all">All Properties</a>
            <a href="property.php?property=residential">Residential</a>
            <a href="property.php?property=commercial">Commercial</a>
            <a href="property.php?property=site">Site</a>
        </div>
    </div>
    <!-- Dropdown end -->
    <a href="testimonial.php">Testimonials</a>
    <a href="contact.php?address=&town=&county=&title=">Contact Us</a>
    <a href="about.php">About Us</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>