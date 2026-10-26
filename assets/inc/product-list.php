<?php
require_once __DIR__ . '/product-catalog.php';
$escape = static function ($value) {
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>
<!-- ==================== PRODUCTS PAGE START ==================== -->
<main class="inner-main products-page">
  <section class="page-hero products-hero">
    <img src="assets/images/products-banner.png" alt="" aria-hidden="true">
    <div class="page-hero-shade"></div>
    <div class="container page-hero-content">
      <p class="breadcrumbs"><a href="index.php">Home</a><span>›</span>Products &amp; Services</p>
      <h1>Our <span>Products &amp; Services</span></h1>
      <p>High quality electrical insulation materials and cable accessories for safe, reliable and efficient electrical connections.</p>
    </div>
  </section>

  <section class="product-benefits">
    <div class="container benefits-row">
      <div><i class="bi bi-box-seam"></i><span>Wide Product Range</span></div>
      <div><i class="bi bi-patch-check"></i><span>Industry Grade Quality</span></div>
      <div><i class="bi bi-people"></i><span>Custom Solutions</span></div>
      <div><i class="bi bi-truck"></i><span>Timely Delivery</span></div>
      <div><i class="bi bi-gear"></i><span>Technical Support</span></div>
    </div>
  </section>

  <section class="featured-product-category inner-section" id="heat-shrinkable">
    <div class="container featured-product-category-grid">
      <div class="featured-product-copy">
        <span class="page-eyebrow">Featured Range</span>
        <h2>Heat Shrinkable Sleeves</h2>
        <p>Explore sleeves for electrical insulation and cable applications. Share your installation details with our team to discuss available options and confirm product information.</p>
        <ul>
          <li><i class="bi bi-shield-check" aria-hidden="true"></i>Electrical insulation applications</li>
          <li><i class="bi bi-chat-square-text" aria-hidden="true"></i>Application and product guidance</li>
          <li><i class="bi bi-rulers" aria-hidden="true"></i>Ask our team about available sizes</li>
        </ul>
        <div class="detail-actions">
          <a class="btn-brand" href="product-details.php?slug=heat-shrinkable-sleeves">View Product Details <i class="bi bi-arrow-right"></i></a>
          <a class="btn-outline-brand" href="#product-categories">Browse the Range</a>
        </div>
      </div>
      <img src="assets/images/1-1kv-polyolefin-heat-shrinkable-sleeves-1000x1000.webp" alt="Coiled black heat shrinkable sleeve tubing" loading="lazy">
    </div>
  </section>

  <section class="product-catalog-section inner-section" id="product-categories">
    <div class="container">
      <div class="product-catalog-heading">
        <div><span class="page-eyebrow">Products &amp; Services</span><h2>Explore the Product Range</h2><p>Browse the product categories and services currently listed by Pristine Engineering Services. Open a detail page for an overview and an enquiry option.</p></div>
        <a class="btn-outline-brand" href="#product-enquiry">Need help choosing? <i class="bi bi-arrow-down"></i></a>
      </div>
      <nav class="product-category-shortcuts" aria-label="Product categories">
        <?php foreach ($products as $productSlug => $product): ?>
          <a href="#<?php echo $productSlug === 'heat-shrinkable-sleeves' ? 'heat-shrinkable' : 'product-' . $escape($productSlug); ?>"><?php echo $escape($product['title']); ?></a>
        <?php endforeach; ?>
      </nav>
      <div class="other-products-grid product-catalog-grid">
        <?php foreach ($products as $productSlug => $product): ?>
          <a class="catalog-product-card reveal" id="product-<?php echo $escape($productSlug); ?>" href="product-details.php?slug=<?php echo rawurlencode($productSlug); ?>">
            <span class="catalog-product-type"><?php echo $escape($product['type']); ?></span>
            <img src="<?php echo $escape($product['image']); ?>" alt="<?php echo $escape($product['alt']); ?>" loading="lazy">
            <h3><?php echo $escape($product['title']); ?></h3>
            <p><?php echo $escape($product['summary']); ?></p>
            <span class="catalog-product-link">View Details <i class="bi bi-arrow-right"></i></span>
          </a>
        <?php endforeach; ?>
      </div>
      <p class="product-image-note">Images marked as illustrative represent a product category, not a specification or confirmation of current availability.</p>
    </div>
  </section>

  <section class="product-applications">
    <div class="container">
      <div class="section-heading-row"><div><span class="page-eyebrow">Applications</span><h2>Wide Applications Across Industries</h2><p>Insulation products are used in power distribution, industrial infrastructure, renewable energy and more.</p></div><a class="btn-outline-brand" href="industries.php">Explore Industries <i class="bi bi-arrow-right"></i></a></div>
      <div class="application-grid">
        <article><img src="assets/images/Golden Hour Petrochemical Plant.png" alt="Power and industrial infrastructure"><strong>Power Distribution</strong></article>
        <article><img src="assets/images/Golden Hour Petrochemical Plant.png" alt="Industrial facility"><strong>Industrial Infrastructure</strong></article>
        <article><img src="assets/images/Modern Office Building with Reflective Glass Facade.png" alt="Commercial buildings"><strong>Commercial Buildings</strong></article>
        <article><img src="assets/images/Solar Panels and Wind Turbines Under Blue Skies.png" alt="Renewable energy systems"><strong>Renewable Energy</strong></article>
      </div>
    </div>
  </section>

  <section class="product-solution-banner">
    <div class="container"><div>
      <span class="page-eyebrow">Complete Electrical Insulation Solutions</span>
      <h2 id="product-solution-title">Designed for Safety, Reliability and Performance</h2>
      <p>Product choices and support for demanding industrial applications.</p>
      <a class="btn-brand" href="#product-enquiry">Get Best Quote <i class="bi bi-arrow-right"></i></a>
    </div>
      <ul><li><i class="bi bi-shield-check"></i>High Performance</li><li><i class="bi bi-patch-check"></i>Durable Products</li><li><i class="bi bi-boxes"></i>Wide Range</li><li><i class="bi bi-gear"></i>Technical Guidance</li></ul>
    </div>
  </section>

  <section class="product-process inner-section">
    <div class="container"><span class="page-eyebrow">From Enquiry to Delivery</span><h2>A Seamless Journey</h2><ol><li><i class="bi bi-chat-left-text"></i><strong>01</strong><span>Share your requirement</span></li><li><i class="bi bi-person-workspace"></i><strong>02</strong><span>Get expert consultation</span></li><li><i class="bi bi-file-earmark-text"></i><strong>03</strong><span>Receive a quotation</span></li><li><i class="bi bi-clipboard-check"></i><strong>04</strong><span>Confirm your order</span></li><li><i class="bi bi-truck"></i><strong>05</strong><span>Timely delivery</span></li></ol></div>
  </section>

  <section class="product-enquiry inner-cta" id="product-enquiry">
    <div class="container product-enquiry-grid">
      <div><span class="page-eyebrow">Product Enquiry</span><h2>Looking for the Right Product for Your Requirement?</h2><p>Share your application and our team will help you identify suitable products and pricing.</p><a href="#enquiryModal" data-open-enquiry class="product-modal-link">Need a callback? Open the contact form <i class="bi bi-arrow-right"></i></a></div>
      <form data-contact-email-form>
        <label for="productRequirement">Describe your requirement *</label>
        <textarea id="productRequirement" name="requirement" rows="3" required></textarea>
        <div><label for="productPhone">Mobile number * (+91)</label><input id="productPhone" name="phone" type="tel" inputmode="numeric" autocomplete="tel-national" maxlength="10" pattern="[6-9][0-9]{9}" required><label for="productName">Your name *</label><input id="productName" name="name" autocomplete="name" required></div>
        <button type="submit" class="btn-brand">Prepare Email Enquiry <i class="bi bi-arrow-right"></i></button>
        <p class="form-msg" data-contact-form-status role="status" aria-live="polite"></p>
      </form>
    </div>
  </section>
</main>
<!-- ==================== PRODUCTS PAGE END ==================== -->
