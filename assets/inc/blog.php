<?php
require_once __DIR__ . '/blog-catalog.php';
$escape = static function ($value) {
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$featuredSlug = 'reliable-electrical-insulation';
$featuredArticle = $articles[$featuredSlug];
$topicIds = [
  'understanding-heat-shrinkable-sleeves' => 'heat-shrink',
  'key-considerations-for-cable-jointing' => 'cable-jointing',
  'electrical-insulation-across-industries' => 'applications',
];
?>
<!-- ==================== BLOGS PAGE START ==================== -->
<main class="inner-main blogs-page">
  <section class="page-hero blogs-hero">
    <img src="assets/images/blogs-banner.png" alt="" aria-hidden="true">
    <div class="page-hero-shade"></div>
    <div class="container page-hero-content">
      <p class="breadcrumbs"><a href="index.php">Home</a><span>›</span>Insights</p>
      <h1>Ideas for <span>Safer Connections</span></h1>
      <p>Practical perspectives on electrical insulation, cable accessories and the industries they support.</p>
    </div>
  </section>
  <section class="blog-intro inner-section">
    <div class="container">
      <span class="page-eyebrow">Insights &amp; Guidance</span>
      <h2>Knowledge for Better Connections</h2>
      <p>Explore foundational topics and application guidance from the electrical insulation and cable accessories field.</p>
      <div class="blog-feature-grid">
        <article class="blog-featured reveal">
          <img src="<?php echo $escape($featuredArticle['image']); ?>" alt="<?php echo $escape($featuredArticle['alt']); ?>" loading="lazy">
          <div>
            <span class="blog-category"><?php echo $escape($featuredArticle['category']); ?></span>
            <h3><?php echo $escape($featuredArticle['title']); ?></h3>
            <p><?php echo $escape($featuredArticle['excerpt']); ?></p>
            <a href="blog-details.php?slug=<?php echo rawurlencode($featuredSlug); ?>">Read Featured Article <i class="bi bi-arrow-right"></i></a>
          </div>
        </article>
        <aside class="blog-aside reveal">
          <span class="page-eyebrow">Explore Topics</span>
          <h3>What would you like to learn about?</h3>
          <a href="#cable-jointing">Cable jointing <i class="bi bi-arrow-right"></i></a>
          <a href="#heat-shrink">Heat shrink products <i class="bi bi-arrow-right"></i></a>
          <a href="#applications">Industry applications <i class="bi bi-arrow-right"></i></a>
        </aside>
      </div>
      <div class="blog-card-grid">
        <?php foreach ($articles as $articleSlug => $article): ?>
          <?php if ($articleSlug === $featuredSlug) continue; ?>
          <article class="reveal"<?php echo isset($topicIds[$articleSlug]) ? ' id="' . $escape($topicIds[$articleSlug]) . '"' : ''; ?>>
            <a class="blog-card-image" href="blog-details.php?slug=<?php echo rawurlencode($articleSlug); ?>" aria-label="Read <?php echo $escape($article['title']); ?>">
              <img src="<?php echo $escape($article['image']); ?>" alt="<?php echo $escape($article['alt']); ?>" loading="lazy">
            </a>
            <div>
              <span class="blog-category"><?php echo $escape($article['category']); ?></span>
              <h3><?php echo $escape($article['title']); ?></h3>
              <p><?php echo $escape($article['excerpt']); ?></p>
              <a href="blog-details.php?slug=<?php echo rawurlencode($articleSlug); ?>">Read More <i class="bi bi-arrow-right"></i></a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <section class="inner-cta">
    <div class="container">
      <div><span class="page-eyebrow">Need Product Guidance?</span><h2>Talk to Our Electrical Product Team</h2><p>Share your project details and ask us about products for your application.</p></div>
      <a href="contact.php" class="btn-brand">Get in Touch <i class="bi bi-arrow-right"></i></a>
    </div>
  </section>
</main>
<!-- ==================== BLOGS PAGE END ==================== -->
