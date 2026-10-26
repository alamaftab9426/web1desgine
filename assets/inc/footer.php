 <!-- ======================FOOTER============================= -->
  <?php $footerHome = basename($_SERVER['PHP_SELF']) === 'index.php' ? '' : 'index.php'; ?>
  <footer class="site-footer" id="siteFooter">
    <div class="container">
      <div class="row g-4 g-xl-5 footer-main">
        <div class="col-lg-4">
          <a href="index.php#hero" class="footer-logo"><img src="assets/images/logo.jpeg" alt="Pristine Engineering Services" width="230" height="77"></a>
          <p class="footer-about">Your trusted partner for electrical insulation materials, cable accessories, providing high quality products and reliable solutions since 2017.</p>
          <div class="footer-social" aria-label="Social media profiles not provided">
            <span><i class="bi bi-linkedin" aria-hidden="true"></i></span>
            <span><i class="bi bi-instagram" aria-hidden="true"></i></span>
            <span><i class="bi bi-facebook" aria-hidden="true"></i></span>
          </div>
        </div>

        <div class="col-6 col-lg-2">
          <h4>Quick Links</h4>
          <ul class="footer-links">
            <li><a href="index.php#hero">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="products.php">Products &amp; Services</a></li>
            <li><a href="industries.php">Industries</a></li>
            <li><a href="solutions.php">Solutions</a></li>
            <li><a href="blogs.php">Blogs</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-3">
          <h4>Our Products</h4>
          <ul class="footer-links">
            <li><a href="product-details.php?slug=heat-shrinkable-sleeves">Heat Shrinkable Sleeves</a></li>
            <li><a href="product-details.php?slug=right-angle-boots">Right Angle Boots</a></li>
            <li><a href="product-details.php?slug=busbar-sleeves">Busbar Sleeves</a></li>
            <li><a href="product-details.php?slug=separable-connectors">Separable Connectors</a></li>
            <li><a href="product-details.php?slug=cable-jointing-kits">Cable Jointing Kits</a></li>
            <li><a href="product-details.php?slug=heat-shrinkable-joints">Heat Shrinkable Joints</a></li>
            <li><a href="product-details.php?slug=outdoor-termination-kits">Outdoor Termination Kits</a></li>
            <li><a href="product-details.php?slug=repair-services">Repair Services</a></li>
            <li><a href="product-details.php?slug=other-accessories">Other Accessories</a></li>
          </ul>
        </div>

        <div class="col-lg-3">
          <h4>Contact Information</h4>
          <ul class="footer-contact">
            <li><i class="bi bi-geo-alt-fill"></i><span>First Floor, B-47, Nand Bhuvan Industrial Estate, Mahakali Caves Road, Andheri East, Mumbai - 400093, Maharashtra, India</span></li>
            <li><i class="bi bi-telephone-fill"></i><a href="tel:07949313008">07949313008</a></li>
            <li><i class="bi bi-envelope-fill"></i><a href="mailto:info@pristineengineering.com">info@pristineengineering.com</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
        <p class="mb-0">© <span id="year">2026</span> Pristine Engineering Services Private Limited. All Rights Reserved.</p>
        <div class="footer-legal"><span>Privacy Policy</span><span>Terms &amp; Conditions</span><a href="<?php echo $footerHome; ?>#hero">Back to top</a></div>
        <p class="mb-0">Designed with <i class="bi bi-heart-fill text-orange"></i> for a Safer Tomorrow</p>
      </div>
    </div>
  </footer>

  <button class="to-top" id="toTop" type="button" aria-label="Back to top"><i class="bi bi-arrow-up"></i></button>
