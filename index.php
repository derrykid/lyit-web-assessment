  <?php include("template/header.php") ?>

  <div class="banner">
    <div class="banner-text">
      <h1>Build it better!</h1>
      <button><a href="./contact.php?title=&county=&address=&town=">Book appointment</a></button>
    </div>
  </div>

  <div class="whyus">
    <section class="container-fluid ">

        <img src="static/images/why-us.jpeg" alt="choose brilliant home property as your team" class="img-responsive">

      <div class="whyus-text">
        <h2>Why Brilliant Home?</h2>
        <p class="short-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. An unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset. </p>
        <button><a href="./about.php">Learn more about us</a></button>
      </div><!-- End container -->
    </section>
  </div>

  <!-- recent property -->
  <?php
  require('db/connect.php');
  $residential_sql = 'SELECT * FROM `property` WHERE categoryid = 1 ORDER BY propertyid DESC limit 1';
  $commercial_sql = 'SELECT * FROM `property` WHERE categoryid = 2 ORDER BY propertyid DESC limit 1';
  $site_sql = 'SELECT * FROM `property` WHERE categoryid = 3 ORDER BY propertyid DESC limit 1';

  $residential_result = mysqli_query($conn, $residential_sql);
  $commercial_result = mysqli_query($conn, $commercial_sql);
  $site_result = mysqli_query($conn, $site_sql);

  $res_row = mysqli_fetch_array($residential_result);
  $com_row = mysqli_fetch_array($commercial_result);
  $site_row = mysqli_fetch_array($site_result);

  $res_link = $res_row['propertyid'];
  $res_img = $res_row['image'];

  $com_link = $com_row['propertyid'];
  $com_img = $com_row['image'];

  $site_link = $site_row['propertyid'];
  $site_img = $site_row['image'];

  ?>
  <!-- <div class="container-bottom-padding"> -->
    <h2 style="margin-top: 5rem; margin-left: 5rem; text-align: left;">Most recent properties: </h2>
    <div class="recent-property">

      <div>
        <a href="detail.php?propertyid=<?php echo $res_link ?>"><img src="<?php echo $res_img ?>"></a>
        <div style="text-align: center;">
          <a href="detail.php?propertyid=<?php echo $res_link ?>" class="btn">Residential</a>
        </div>
      </div>

      <div>
        <a href="detail.php?propertyid=<?php echo $com_link ?>"><img src="<?php echo $com_img ?>"></a>
        <div style="text-align: center;">
          <a href="detail.php?propertyid=<?php echo $com_link ?>" class="btn">Commercial</a>
        </div>
      </div>

      <div>
        <a href="detail.php?propertyid=<?php echo $site_link ?>"><img src="<?php echo $site_img ?>"></a>
        <div style="text-align: center;">
          <a href="detail.php?propertyid=<?php echo $site_link ?>" class="btn">Site</a>
        </div>
      </div>

    </div>
  <!-- </div> -->
  <!-- End property -->

  <!-- testimonial -->
  <div style="background-color: rgba(221,221,221, 0.3); padding-top: 2rem;">
    <h2>What clients say about us</h2>

    <div class="testimonial-flexbox ">

      <?php include 'homeQuery/home_testimonial.php'; ?>
    </div>
  </div>
  <!-- End testimonial -->

  <!-- newsletter -->
  <div class="newsletter">
    <h2>Sign up to newsletter</h2>
    <form action="newsletter.php" method="POST">
      <input class="newsletter-email" type="text" name="email" id="email" placeholder="your-email@email.com" />
      <input class="newsletter-submit" type="submit" name=submit value="Subscribe" />
    </form>
  </div>
  <!-- End newsletter -->

  <?php include("template/footer.php");?>
  