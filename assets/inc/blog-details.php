<?php if ($selectedArticle): ?>
<?php
$escape = static function ($value) {
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$relatedArticles = [];
foreach ($selectedArticle['related_articles'] as $relatedSlug) {
  if (isset($articles[$relatedSlug])) {
    $relatedArticles[$relatedSlug] = $articles[$relatedSlug];
  }
}
?>
<!-- ==================== BLOG DETAIL PAGE START ==================== -->
<main class="inner-main article-detail-page">
  <div class="container detail-breadcrumb-wrap">
    <p class="breadcrumbs"><a href="index.php">Home</a><span>›</span><a href="blogs.php">Insights</a><span>›</span><?php echo $escape($selectedArticle['title']); ?></p>
  </div>

  <section class="article-hero">
    <div class="container article-hero-grid">
      <div class="article-featured-image reveal">
        <img src="<?php echo $escape($selectedArticle['image']); ?>" alt="<?php echo $escape($selectedArticle['alt']); ?>">
      </div>
      <div class="article-intro reveal">
        <span class="blog-category"><?php echo $escape($selectedArticle['category']); ?></span>
        <h1><?php echo $escape($selectedArticle['title']); ?></h1>
        <p><?php echo $escape($selectedArticle['excerpt']); ?></p>
        <a class="btn-outline-brand" href="#article-body">Read the article <i class="bi bi-arrow-down"></i></a>
      </div>
    </div>
  </section>

  <section class="article-body-section inner-section" id="article-body">
    <div class="container article-layout">
      <article class="article-body">
        <p class="article-opening"><?php echo $escape($selectedArticle['excerpt']); ?></p>
        <?php foreach ($selectedArticle['sections'] as $section): ?>
          <section>
            <h2><?php echo $escape($section['heading']); ?></h2>
            <?php foreach ($section['paragraphs'] as $paragraph): ?>
              <p><?php echo $escape($paragraph); ?></p>
            <?php endforeach; ?>
            <?php if (!empty($section['list'])): ?>
              <ul>
                <?php foreach ($section['list'] as $item): ?>
                  <li><?php echo $escape($item); ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </section>
        <?php endforeach; ?>
        <div class="article-related-products">
          <span class="page-eyebrow">Related Products</span>
          <div class="article-product-links">
            <?php foreach ($selectedArticle['related_products'] as $relatedSlug): ?>
              <?php if (isset($products[$relatedSlug])): ?>
                <a href="product-details.php?slug=<?php echo rawurlencode($relatedSlug); ?>"><?php echo $escape($products[$relatedSlug]['title']); ?> <i class="bi bi-arrow-up-right"></i></a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </article>
      <aside class="article-sidebar">
        <span class="page-eyebrow">Need Product Guidance?</span>
        <h2>Talk to Our Team</h2>
        <p>Share your application and we’ll help you explore the relevant product categories.</p>
        <a class="btn-brand" href="contact.php">Contact Us <i class="bi bi-arrow-right"></i></a>
        <a class="article-sidebar-link" href="products.php">Browse Products <i class="bi bi-arrow-right"></i></a>
      </aside>
    </div>
  </section>

  <section class="related-articles inner-section">
    <div class="container">
      <div class="section-heading-row"><div><span class="page-eyebrow">More Insights</span><h2>Related Articles</h2></div><a class="btn-outline-brand" href="blogs.php">All Insights <i class="bi bi-arrow-right"></i></a></div>
      <div class="detail-related-grid article-related-grid">
        <?php foreach ($relatedArticles as $relatedSlug => $relatedArticle): ?>
          <a class="detail-related-card reveal" href="blog-details.php?slug=<?php echo rawurlencode($relatedSlug); ?>">
            <img src="<?php echo $escape($relatedArticle['image']); ?>" alt="<?php echo $escape($relatedArticle['alt']); ?>" loading="lazy">
            <span><?php echo $escape($relatedArticle['category']); ?></span>
            <h3><?php echo $escape($relatedArticle['title']); ?></h3>
            <span class="detail-related-link">Read Article <i class="bi bi-arrow-right"></i></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="inner-cta article-detail-cta">
    <div class="container"><div><span class="page-eyebrow">Have a Project in Mind?</span><h2>Discuss Your Product Requirements</h2><p>Talk with our team about your application and the products you need.</p></div><a href="contact.php" class="btn-brand">Get in Touch <i class="bi bi-arrow-right"></i></a></div>
  </section>
</main>
<!-- ==================== BLOG DETAIL PAGE END ==================== -->
<?php else: ?>
<main class="inner-main detail-not-found">
  <section class="container">
    <span class="page-eyebrow">Article Not Found</span>
    <h1>We couldn’t find that article</h1>
    <p>The link may be outdated or the article may no longer be available. Visit Insights to browse the published articles.</p>
    <a class="btn-brand" href="blogs.php">Browse Insights <i class="bi bi-arrow-right"></i></a>
  </section>
</main>
<?php endif; ?>