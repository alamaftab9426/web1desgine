<!-- ======================================================================
       01. TOP BAR  (desktop only)
       ====================================================================== -->
  <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    $homePrefix = $currentPage === 'index.php' ? '' : 'index.php';
    $productsActive = in_array($currentPage, ['products.php', 'product-details.php'], true);
    $blogsActive = in_array($currentPage, ['blogs.php', 'blog-details.php'], true);
  ?>
  <div class="topbar">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="topbar-left d-flex align-items-center gap-4">
        <span><i class="bi bi-geo-alt-fill"></i> Mumbai, Maharashtra, India</span>
        <span><i class="bi bi-receipt"></i> GST No. 27AACCP1055K1Z8</span>
        <a href="tel:07949313008"><i class="bi bi-telephone-fill"></i>07949313008</a>
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
            <li class="nav-item dropdown nav-dropdown">
              <div class="nav-dropdown-heading">
                <a class="nav-link<?php echo $productsActive ? ' active' : ''; ?>" href="products.php"<?php echo $productsActive ? ' aria-current="page"' : ''; ?>>Products &amp; Services</a>
                <button class="nav-dropdown-toggle" data-nav-toggle type="button" aria-label="Open Products &amp; Services menu" aria-controls="productsMenu" aria-expanded="false"><i class="bi bi-chevron-down" aria-hidden="true"></i></button>
              </div>
              <ul class="dropdown-menu" id="productsMenu">
                <li><a class="dropdown-item" href="product-details.php?slug=heat-shrinkable-sleeves">Heat Shrinkable Sleeves</a></li>
                <li><a class="dropdown-item" href="product-details.php?slug=right-angle-boots">Right Angle Boots</a></li>
                <li><a class="dropdown-item" href="product-details.php?slug=busbar-sleeves">Busbar Sleeves</a></li>
                <li><a class="dropdown-item" href="product-details.php?slug=separable-connectors">Separable Connectors</a></li>
                <li><a class="dropdown-item" href="product-details.php?slug=cable-jointing-kits">Cable Jointing Kits</a></li>
                <li><a class="dropdown-item" href="product-details.php?slug=outdoor-termination-kits">Outdoor Termination Kits</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link<?php echo $currentPage === 'industries.php' ? ' active' : ''; ?>" href="industries.php"<?php echo $currentPage === 'industries.php' ? ' aria-current="page"' : ''; ?>>Industries</a></li>
            <li class="nav-item"><a class="nav-link<?php echo $currentPage === 'solutions.php' ? ' active' : ''; ?>" href="solutions.php"<?php echo $currentPage === 'solutions.php' ? ' aria-current="page"' : ''; ?>>Solutions</a></li>
            <li class="nav-item"><a class="nav-link<?php echo $blogsActive ? ' active' : ''; ?>" href="blogs.php"<?php echo $blogsActive ? ' aria-current="page"' : ''; ?>>Blogs</a></li>
            <li class="nav-item"><a class="nav-link<?php echo $currentPage === 'contact.php' ? ' active' : ''; ?>" href="contact.php"<?php echo $currentPage === 'contact.php' ? ' aria-current="page"' : ''; ?>>Contact Us</a></li>
          </ul>

          <div class="header-cta d-flex align-items-center gap-3 mt-3 mt-lg-0">
            <a href="<?php echo $homePrefix; ?>#enquiry" class="btn-brand btn-sm-x">Get a Quote <i class="bi bi-arrow-right"></i></a>
            <button class="search-btn" type="button" aria-label="Open website search" aria-controls="siteSearchPanel" aria-expanded="false"><i class="bi bi-search" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>
    </nav>
    <form class="site-search-panel" id="siteSearchPanel" role="search" hidden>
      <label for="siteSearchInput">Search products, industries, solutions and insights</label>
      <div class="site-search-control">
        <input id="siteSearchInput" type="search" autocomplete="off" placeholder="Try “cable jointing”">
        <button type="submit" class="btn-brand">Search</button>
      </div>
      <p class="site-search-message" id="siteSearchMessage" role="status" aria-live="polite">Search the Pristine website.</p>
      <ul class="site-search-results" id="siteSearchResults" aria-label="Search results"></ul>
    </form>
  </header>