<!-- ======================================================================
       01. TOP BAR  (desktop only)
       ====================================================================== -->
  <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    $homePrefix = $currentPage === 'index.php' ? '' : 'index.php';
    $industryActive = in_array($currentPage, array('industries.php', 'solutions.php'), true);
  ?>
  <div class="topbar">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="topbar-left d-flex align-items-center gap-4">
        <span><i class="bi bi-geo-alt-fill"></i> Mumbai, Maharashtra, India</span>
        <span><i class="bi bi-receipt"></i> GST No. 27AACCP1055K1Z8</span>
      </div>
      <div class="topbar-right d-flex align-items-center gap-4">
        <a href="<?php echo $homePrefix; ?>#products">Product Range</a>
        <a href="about.php">About Pristine</a>
        <a href="contact.php">Get in Touch</a>
      </div>
    </div>
  </div>


  <!-- ======================================================================
       02. HEADER / NAVBAR
       ====================================================================== -->
  <header class="site-header" id="siteHeader">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php" aria-label="Pristine Engineering Services - Home">
          <img src="assets/images/logo.jpeg" alt="Pristine Engineering Services Private Limited" width="230" height="77">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span></span><span></span><span></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav mx-lg-auto align-items-lg-center" aria-label="Main menu">
            <li class="nav-item"><a class="nav-link<?php echo $currentPage === 'index.php' ? ' active' : ''; ?>" href="index.php#hero"<?php echo $currentPage === 'index.php' ? ' aria-current="page"' : ''; ?>>Home</a></li>
            <li class="nav-item"><a class="nav-link<?php echo $currentPage === 'about.php' ? ' active' : ''; ?>" href="about.php"<?php echo $currentPage === 'about.php' ? ' aria-current="page"' : ''; ?>>About Us</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle<?php echo $currentPage === 'products.php' ? ' active' : ''; ?>" href="products.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products &amp; Services</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="products.php#heat-shrinkable">Heat Shrinkable Sleeves</a></li>
                <li><a class="dropdown-item" href="products.php#product-categories">Right Angle Boots &amp; Separable Connectors</a></li>
                <li><a class="dropdown-item" href="products.php#product-categories">Busbar Sleeves &amp; Cable Joints</a></li>
                <li><a class="dropdown-item" href="products.php#product-enquiry">Repair Services — enquire</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle<?php echo $industryActive ? ' active' : ''; ?>" href="industries.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Industries &amp; Solutions</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="industries.php">Industries</a></li>
                <li><a class="dropdown-item" href="solutions.php">Solutions</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link<?php echo $currentPage === 'blogs.php' ? ' active' : ''; ?>" href="blogs.php"<?php echo $currentPage === 'blogs.php' ? ' aria-current="page"' : ''; ?>>Blogs</a></li>
            <li class="nav-item"><a class="nav-link<?php echo $currentPage === 'contact.php' ? ' active' : ''; ?>" href="contact.php"<?php echo $currentPage === 'contact.php' ? ' aria-current="page"' : ''; ?>>Contact Us</a></li>
          </ul>

          <div class="header-cta d-flex align-items-center gap-3 mt-3 mt-lg-0">
            <a href="tel:07949313008" class="call-box d-none d-xl-flex">
              <span class="call-ico"><i class="bi bi-telephone-fill"></i></span>
              <span class="call-txt"><small>Call Us Now</small><strong>07949313008</strong></span>
            </a>
            <a href="<?php echo $homePrefix; ?>#enquiry" class="btn-brand btn-sm-x">Get a Quote <i class="bi bi-arrow-right"></i></a>
            <a href="products.php" class="search-btn d-none d-lg-grid" aria-label="Browse products"><i class="bi bi-search"></i></a>
          </div>
        </div>
      </div>
    </nav>
  </header>