<?php if ($selectedProduct): ?>
<?php
$escape = static function ($value) {
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$relatedProducts = [];
foreach ($selectedProduct['related'] as $relatedSlug) {
  if (isset($products[$relatedSlug])) {
    $relatedProducts[$relatedSlug] = $products[$relatedSlug];
  }
}
?>
<!-- ==================== PRODUCT DETAIL PAGE START ==================== -->
<main class="inner-main product-detail-page">
  <div class="container detail-breadcrumb-wrap">
    <p class="breadcrumbs"><a href="index.php">Home</a><span>›</span><a href="products.php">Products &amp; Services</a><span>›</span><?php echo $escape($selectedProduct['title']); ?></p>
  </div>

  <section class="detail-hero">
    <div class="container detail-hero-grid">
      <div class="detail-product-media reveal">
        <img class="detail-main-image" src="<?php echo $escape($selectedProduct['image']); ?>" alt="<?php echo $escape($selectedProduct['alt']); ?>">
        <?php if (!empty($selectedProduct['gallery'])): ?>
          <div class="detail-gallery" aria-label="More product images">
            <?php foreach ($selectedProduct['gallery'] as $image): ?>
              <img src="<?php echo $escape($image['image']); ?>" alt="<?php echo $escape($image['alt']); ?>" loading="lazy">
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <?php if ($selectedProduct['image_note'] !== ''): ?>
          <p class="detail-image-note"><?php echo $escape($selectedProduct['image_note']); ?></p>
        <?php endif; ?>
      </div>
      <div class="detail-intro reveal">
        <span class="page-eyebrow"><?php echo $escape($selectedProduct['type']); ?></span>
        <h1><?php echo $escape($selectedProduct['title']); ?></h1>
        <p class="detail-lead"><?php echo $escape($selectedProduct['summary']); ?></p>
        <p><?php echo $escape($selectedProduct['overview']); ?></p>
        <div class="detail-actions">
          <a class="btn-brand" href="contact.php" data-open-enquiry data-product-name="<?php echo $escape($selectedProduct['title']); ?>">Enquire About This <?php echo $selectedProduct['type'] === 'Service' ? 'Service' : 'Product'; ?> <i class="bi bi-arrow-right"></i></a>
          <a class="btn-outline-brand" href="products.php">Browse All Products</a>
        </div>
        <p class="detail-availability">Product availability, specifications and suitability should be confirmed for your application.</p>
      </div>
    </div>
  </section>

  <section class="detail-content inner-section">
    <div class="container detail-content-grid">
      <article class="detail-article">
        <span class="page-eyebrow">Overview</span>
        <h2>About <?php echo $escape($selectedProduct['title']); ?></h2>
        <p><?php echo $escape($selectedProduct['overview']); ?></p>
        <h2>Applications to discuss</h2>
        <p>Share your project context with our team to confirm whether this product category is relevant to your installation.</p>
        <ul class="detail-check-list">
          <?php foreach ($selectedProduct['applications'] as $application): ?>
            <li><i class="bi bi-check2-circle" aria-hidden="true"></i><?php echo $escape($application); ?></li>
          <?php endforeach; ?>
        </ul>
        <div class="detail-guidance">
          <i class="bi bi-info-circle" aria-hidden="true"></i>
          <p>Exact technical specifications and compatibility details are not published here. Confirm them with the product supplier and your project’s responsible technical professional.</p>
        </div>
      </article>
      <aside class="detail-enquiry-card">
        <span class="page-eyebrow">Product Guidance</span>
        <h2>Discuss Your Requirement</h2>
        <p>Tell us about the equipment, application and project requirements. Our team can discuss the available product range with you.</p>
        <a class="btn-brand" href="contact.php" data-open-enquiry data-product-name="<?php echo $escape($selectedProduct['title']); ?>">Start an Enquiry <i class="bi bi-arrow-right"></i></a>
        <a href="tel:07949313008"><i class="bi bi-telephone"></i> 07949313008</a>
      </aside>
    </div>
  </section>

  <section class="related-products inner-section">
    <div class="container">
      <div class="section-heading-row">
        <div><span class="page-eyebrow">Explore the Range</span><h2>Related Products &amp; Services</h2></div>
        <a class="btn-outline-brand" href="products.php">View All <i class="bi bi-arrow-right"></i></a>
      </div>
      <div class="detail-related-grid">
        <?php foreach ($relatedProducts as $relatedSlug => $relatedProduct): ?>
          <a class="detail-related-card reveal" href="product-details.php?slug=<?php echo rawurlencode($relatedSlug); ?>">
            <img src="<?php echo $escape($relatedProduct['image']); ?>" alt="<?php echo $escape($relatedProduct['alt']); ?>" loading="lazy">
            <span><?php echo $escape($relatedProduct['type']); ?></span>
            <h3><?php echo $escape($relatedProduct['title']); ?></h3>
            <span class="detail-related-link">View Details <i class="bi bi-arrow-right"></i></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="inner-cta product-detail-cta">
    <div class="container"><div><span class="page-eyebrow">Need Product Information?</span><h2>Let’s Discuss Your Application</h2><p>Contact our team to confirm current availability and product information.</p></div><a href="contact.php" data-open-enquiry data-product-name="<?php echo $escape($selectedProduct['title']); ?>" class="btn-brand">Enquire Now <i class="bi bi-arrow-right"></i></a></div>
  </section>
</main>
<!-- ==================== PRODUCT DETAIL PAGE END ==================== -->
<?php else: ?>
<main class="inner-main detail-not-found">
  <section class="container">
    <span class="page-eyebrow">Product Not Found</span>
    <h1>We couldn’t find that product</h1>
    <p>The link may be outdated or the product may no longer be listed. Browse the current catalogue to explore available categories.</p>
    <a class="btn-brand" href="products.php">View Products &amp; Services <i class="bi bi-arrow-right"></i></a>
  </section>
</main>
<?php endif; ?>