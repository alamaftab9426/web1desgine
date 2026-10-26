
  <?php require_once __DIR__ . '/product-catalog.php'; ?>
  <?php $escape = static function ($value) { return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8'); }; ?>

  <main>
  <!-- HERO SECTION START -->
  <section class="hero" id="hero"> 
    <div class="swiper hero-swiper">
      <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide hero-slide">
          <img class="hero-bg" src="assets/images/banner1.png" alt="Electrical cable reels and industrial infrastructure">
          <div class="container hero-inner">
            <div class="hero-content">
              <span class="hero-eyebrow">Engineered <span class="hero-highlight">for a safer tomorrow</span></span>
              <h1>Electrical Insulation<br>&amp; <span>Cable Accessories</span></h1>
              <p class="hero-tags"><span>Reliable Products</span><span>Industry Expertise</span><span>Pan India Supply</span></p>
              <ul class="hero-points">
                <li><i class="bi bi-award"></i><span>High Quality<br>Products</span></li>
                <li><i class="bi bi-boxes"></i><span>Wide Product<br>Range</span></li>
                <li><i class="bi bi-truck"></i><span>Reliable<br>Supply Chain</span></li>
                <li><i class="bi bi-headset"></i><span>Expert<br>Support</span></li>
              </ul>
              <div class="hero-actions">
                <a href="#products" class="btn-brand">Explore Our Products <i class="bi bi-arrow-right"></i></a>
                <a href="#enquiry" class="btn-ghost-light">Request a Quote <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide hero-slide">
          <img class="hero-bg" src="assets/images/banner2.png" alt="Power distribution equipment and electrical cable accessories">
          <div class="container hero-inner">
            <div class="hero-content">
              <span class="hero-eyebrow">Trusted for HT &amp; LT cable networks</span>
              <h2>Heat Shrinkable Sleeves<br>&amp; <span>Jointing Solutions</span></h2>
              <p class="hero-tags"><span>Jointing Kits</span><span>Terminations</span><span>Repair Services</span></p>
              <ul class="hero-points">
                <li><i class="bi bi-shield-check"></i><span>Tested<br>Quality</span></li>
                <li><i class="bi bi-lightning-charge"></i><span>HT / LT<br>Ready</span></li>
                <li><i class="bi bi-tools"></i><span>Easy<br>Installation</span></li>
                <li><i class="bi bi-headset"></i><span>Technical<br>Guidance</span></li>
              </ul>
              <div class="hero-actions">
                <a href="#products" class="btn-brand">View Jointing Range <i class="bi bi-arrow-right"></i></a>
                <a href="#enquiry" class="btn-ghost-light">Talk to an Expert <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide hero-slide">
          <img class="hero-bg" src="assets/images/banner3.png" alt="Cable termination products and electrical insulation accessories">
          <div class="container hero-inner">
            <div class="hero-content">
              <span class="hero-eyebrow">Powering infrastructure across India</span>
              <h2>Reliable Connections<br>for <span>Every Industry</span></h2>
              <p class="hero-tags"><span>Power</span><span>Railways &amp; Metro</span><span>Renewable Energy</span></p>
              <ul class="hero-points">
                <li><i class="bi bi-geo-alt"></i><span>Pan India<br>Network</span></li>
                <li><i class="bi bi-clock-history"></i><span>Timely<br>Delivery</span></li>
                <li><i class="bi bi-people"></i><span>Industry<br>Applications</span></li>
                <li><i class="bi bi-gear-wide-connected"></i><span>Custom<br>Solutions</span></li>
              </ul>
              <div class="hero-actions">
                <a href="#industries" class="btn-brand">Explore Industries <i class="bi bi-arrow-right"></i></a>
                <a href="#enquiry" class="btn-ghost-light">Request a Quote <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- floating feature card (static, sits above all slides) -->
      <div class="container hero-ui">
        <ul class="hero-features d-none d-lg-block" aria-label="Our strengths">
          <li><i class="bi bi-plug"></i> Safe Connections</li>
          <li><i class="bi bi-shield-check"></i> Durable &amp; Reliable</li>
          <li><i class="bi bi-patch-check"></i> Industry Grade</li>
          <li><i class="bi bi-sliders"></i> Custom Solutions</li>
        </ul>
        <div class="hero-controls">
          <div class="hero-pagination" aria-label="Choose a banner"></div>
          <div class="hero-arrows">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- HERO SECTION END -->

  <!-- TRUSTED EXPERIENCE STRIP START -->
  <section class="stat-strip">
    <div class="container">
      <ul class="stat-strip-list">
        <li><i class="bi bi-calendar2-check"></i><div><strong>Since 2017</strong><span>Engineering Services</span></div></li>
        <li><i class="bi bi-lightning-charge"></i><div><strong>Electrical</strong><span>Insulation Materials</span></div></li>
        <li><i class="bi bi-box-seam"></i><div><strong>Cable</strong><span>Accessories</span></div></li>
        <li><i class="bi bi-headset"></i><div><strong>Product</strong><span>Guidance &amp; Support</span></div></li>
        <li><i class="bi bi-geo-alt"></i><div><strong>Pan India</strong><span>Supply Network</span></div></li>
      </ul>
    </div>
  </section>
  <!-- TRUSTED EXPERIENCE STRIP END -->


  <!-- ===========PRODUCTS========= -->
  <section class="products section-pad" id="products">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4 mb-lg-5">
        <div class="reveal">
          <span class="eyebrow">Our Products</span>
          <h2 class="section-title mb-2">Complete Range of Electrical Insulation &amp; Cable Accessories</h2>
          <p class="section-lead mb-0">We offer a comprehensive range of high-performance products designed for safe, reliable and efficient electrical connections across various industrial applications.</p>
        </div>
        <a href="#enquiry" class="btn-outline-brand btn-sm-x reveal">Enquire About Products <i class="bi bi-arrow-right"></i></a>
      </div>

      <div class="products-grid">
        <?php foreach ($products as $productSlug => $product): ?>
          <a href="product-details.php?slug=<?php echo rawurlencode($productSlug); ?>" class="product-card reveal">
            <div class="pc-visual"><img src="<?php echo $escape($product['image']); ?>" alt="<?php echo $escape($product['alt']); ?>" loading="lazy"></div>
            <h3><?php echo $escape($product['title']); ?></h3><span class="pc-link">View Details <i class="bi bi-arrow-right"></i></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>


  <!-- ========= ABOUT ========= -->
  <section class="about" id="about">
    <div class="container-xl about-grid">
      <div class="about-media reveal from-left">
        <div class="about-facade">
          <img src="assets/images/banner1.png" alt="Industrial electrical cables and cable reels at a project site" loading="lazy">
          <div class="facade-plate"><img src="assets/images/logo.jpeg" alt="Pristine Engineering Services"></div>
        </div>
        <button class="play-btn" type="button" data-bs-toggle="modal" data-bs-target="#videoModal" aria-label="Watch our company video">
          <span class="play-ring"><i class="bi bi-play-fill"></i></span>
          <span class="play-label">Watch Our Company Video</span>
        </button>
        <div class="trust-chip">
          <i class="bi bi-shield-fill-check"></i>
          <div><strong>Trusted by</strong><span>Industries Across India</span></div>
        </div>
      </div>

      <!-- centre: copy -->
      <div class="about-copy reveal">
        <span class="eyebrow">About Pristine</span>
        <h2 class="section-title">Your Partner in <br>Electrical Connectivity</h2>
        <p>Established in the year 2017, Pristine Engineering Services Private Limited is a leading wholesaler and service provider of electrical insulation materials and cable accessories. We are committed to providing high quality products, excellent customer service and technical support to meet the growing demands of the electrical industry.</p>
        <ul class="about-points">
          <li><i class="bi bi-gear"></i> Quality Products</li>
          <li><i class="bi bi-tag"></i> Competitive Pricing</li>
          <li><i class="bi bi-headset"></i> Technical Support</li>
          <li><i class="bi bi-emoji-smile"></i> Customer Satisfaction</li>
        </ul>
        <a href="#enquiry" class="btn-brand">Talk to Our Team <i class="bi bi-arrow-right"></i></a>
      </div>

      <!-- right: promise card + infrastructure -->
      <aside class="about-side reveal from-right">
        <div class="promise-card">
          <h3>Delivering <br>Safe &amp; Reliable <br>Connections</h3>
          <span class="since-badge"><small>Since</small>2017</span>
        </div>
        <div class="infra-card">
          <h4>Our Infrastructure</h4>
          <ul>
            <li><span><i class="bi bi-boxes"></i></span>Warehouse</li>
            <li><span><i class="bi bi-laptop"></i></span>Office Setup</li>
            <li><span><i class="bi bi-box-seam"></i></span>Inventory</li>
          </ul>
        </div>
      </aside>
    </div>
  </section>



  <!-- APPLICATION SUPPORT SECTION START -->
  <section class="home-guidance section-pad-sm" id="guidance">
    <div class="container">
      <div class="reveal mb-4">
        <span class="eyebrow">Product &amp; Application Support</span>
        <h2 class="section-title mb-0">Practical Guidance for Your Requirement</h2>
      </div>
      <div class="guidance-grid">
        <article class="guidance-card reveal">
          <i class="bi bi-box-seam" aria-hidden="true"></i>
          <h3>Explore the Product Range</h3>
          <p>Browse heat shrinkable sleeves, cable jointing kits, terminations and other cable accessories.</p>
          <a href="products.php">View Products <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </article>
        <article class="guidance-card reveal">
          <i class="bi bi-diagram-3" aria-hidden="true"></i>
          <h3>Discuss Your Application</h3>
          <p>Share where the product will be used and what your electrical connection requires.</p>
          <a href="industries.php">Explore Industries <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </article>
        <article class="guidance-card reveal">
          <i class="bi bi-chat-square-text" aria-hidden="true"></i>
          <h3>Send an Enquiry</h3>
          <p>Tell us what you need and choose to prepare a message by email or WhatsApp.</p>
          <a href="#enquiry" data-open-enquiry>Contact Our Team <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </article>
      </div>
    </div>
  </section>
  <!-- APPLICATION SUPPORT SECTION END -->


  <!-- ENQUIRY CTA SECTION START -->
  <section class="enquiry" id="enquiry">
    <div class="container">
      <div class="enquiry-grid">
        <div class="enq-visual" aria-hidden="true"><img src="assets/images/banner3.png" alt="" loading="lazy"></div>

        <div class="enq-copy reveal">
          <h2>Get the Right Solution <br>for Your Requirement</h2>
          <p>Tell us your requirement and our team will get back to you with the best products and pricing.</p>
        </div>

        <form class="enq-form reveal from-right" id="enquiryForm" novalidate>
          <label class="visually-hidden" for="enquiryRequirement">Describe your requirement</label>
          <textarea class="form-control" id="enquiryRequirement" name="requirement" rows="2" placeholder="Describe your requirement..." required></textarea>
          <div class="enq-row">
            <div class="phone-field">
              <span class="cc"><span class="flag-in"></span>+91</span>
              <label class="visually-hidden" for="enquiryPhone">10-digit mobile number</label>
              <input type="tel" id="enquiryPhone" name="phone" inputmode="numeric" autocomplete="tel-national" maxlength="10" placeholder="Enter your number" required pattern="[6-9][0-9]{9}">
            </div>
            <label class="visually-hidden" for="enquiryName">Your name</label>
            <input type="text" class="form-control" id="enquiryName" name="name" autocomplete="name" placeholder="Enter your name" required>
            <button type="submit" class="btn-brand">Prepare Email <i class="bi bi-arrow-right"></i></button>
          </div>
          <p class="form-msg" id="formMsg" role="status" aria-live="polite"></p>
        </form>
      </div>

      <ul class="enq-perks">
        <li><i class="bi bi-lightning-charge"></i> Quick Response</li>
        <li><i class="bi bi-person-check"></i> Expert Consultation</li>
        <li><i class="bi bi-currency-rupee"></i> Best Pricing</li>
      </ul>
    </div>
  </section>
  <!-- ENQUIRY CTA SECTION END -->


  <!-- INDUSTRIES SECTION START -->
  <section class="industries" id="industries">
    <div class="container">
      <div class="row align-items-center g-4 g-xl-5">
        <div class="col-xl-4 reveal">
          <span class="eyebrow">Industries</span>
          <h2 class="section-title text-white">Powering Multiple Industries with Reliable Solutions</h2>
          <p class="ind-lead">Our products are widely used across various sectors, ensuring safe, reliable and efficient electrical connections.</p>
          <a href="industries.php" class="btn-brand">Explore Industries <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="col-xl-8">
          <div class="ind-slider-wrap">
            <div class="swiper industries-swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="industries.php#power-distribution" class="ind-card ind-1"><img src="assets/images/banner2.png" alt="" aria-hidden="true" loading="lazy"><i class="bi bi-lightning-charge-fill ind-bg-ico"></i><span class="ind-name">Power Distribution <i class="bi bi-arrow-right"></i></span></a></div>
                <div class="swiper-slide"><a href="industries.php#industrial-infrastructure" class="ind-card ind-2"><img src="assets/images/Golden Hour Petrochemical Plant.png" alt="" aria-hidden="true" loading="lazy"><i class="bi bi-gear-wide-connected ind-bg-ico"></i><span class="ind-name">Industrial Infrastructure <i class="bi bi-arrow-right"></i></span></a></div>
                <div class="swiper-slide"><a href="industries.php#commercial-buildings" class="ind-card ind-3"><img src="assets/images/Modern Office Building with Reflective Glass Facade.png" alt="" aria-hidden="true" loading="lazy"><i class="bi bi-buildings-fill ind-bg-ico"></i><span class="ind-name">Commercial Buildings <i class="bi bi-arrow-right"></i></span></a></div>
                <div class="swiper-slide"><a href="industries.php#railways" class="ind-card ind-4"><img src="assets/images/Elevated Blue Metro Among Skyscrapers.png" alt="" aria-hidden="true" loading="lazy"><i class="bi bi-train-front-fill ind-bg-ico"></i><span class="ind-name">Railways &amp; Metro <i class="bi bi-arrow-right"></i></span></a></div>
                <div class="swiper-slide"><a href="industries.php#renewable-energy" class="ind-card ind-5"><img src="assets/images/Solar Panels and Wind Turbines Under Blue Skies.png" alt="" aria-hidden="true" loading="lazy"><i class="bi bi-sun-fill ind-bg-ico"></i><span class="ind-name">Renewable Energy <i class="bi bi-arrow-right"></i></span></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- INDUSTRIES SECTION END -->


  <!-- ===========WHY CHOOSE PRISTINE=========== -->
  <section class="why section-pad-sm" id="why">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-3 reveal">
          <span class="eyebrow">Why Choose Pristine</span>
          <h2 class="section-title">Our Strength Makes the Difference</h2>
        </div>
        <div class="col-lg-9">
          <div class="why-grid">
            <div class="why-card reveal"><i class="bi bi-gem"></i><h3>Premium Quality Products</h3><p>High performance and durable solutions</p></div>
            <div class="why-card reveal"><i class="bi bi-boxes"></i><h3>Wide Product Range</h3><p>Complete range under one roof</p></div>
            <div class="why-card reveal"><i class="bi bi-headset"></i><h3>Expert Guidance &amp; Support</h3><p>Technical assistance from industry experts</p></div>
            <div class="why-card reveal"><i class="bi bi-truck"></i><h3>On-Time Delivery</h3><p>Reliable supply across India</p></div>
            <div class="why-card reveal"><i class="bi bi-link-45deg"></i><h3>Long Term Business Relationship</h3><p>Trusted by clients for years</p></div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ======FEATURED PRODUCTS (swipeable)========= -->
  <section class="featured section-pad-sm" id="featured">
    <div class="container">
      <div class="reveal mb-4">
        <span class="eyebrow">Featured Products</span>
        <h2 class="section-title">Our Products in Action</h2>
      </div>
      <div class="feat-slider-wrap">
        <div class="swiper featured-swiper">
          <div class="swiper-wrapper">
            <?php foreach ($products as $productSlug => $product): ?>
              <div class="swiper-slide"><a href="product-details.php?slug=<?php echo rawurlencode($productSlug); ?>" class="feat-card"><img src="<?php echo $escape($product['image']); ?>" alt="" aria-hidden="true" loading="lazy"><span><?php echo $escape($product['title']); ?></span></a></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- COMPANY CAPABILITIES SECTION START -->
  <section class="counter-band">
    <div class="container">
      <ul class="counter-list">
        <li><i class="bi bi-calendar2-check"></i><div><strong>2017</strong><span>Established</span></div></li>
        <li><i class="bi bi-lightning-charge"></i><div><strong>Electrical</strong><span>Insulation Materials</span></div></li>
        <li><i class="bi bi-box-seam"></i><div><strong>Cable</strong><span>Accessories</span></div></li>
        <li><i class="bi bi-headset"></i><div><strong>Product</strong><span>Guidance &amp; Support</span></div></li>
        <li><i class="bi bi-geo-alt"></i><div><strong>Pan India</strong><span>Supply Network</span></div></li>
      </ul>
    </div>
  </section>
  <!-- COMPANY CAPABILITIES SECTION END ->


  <!-- ENQUIRY PROCESS SECTION START -->
  <section class="process section-pad-sm" id="process">
    <div class="container position-relative">
      <div class="reveal mb-4">
        <span class="eyebrow">Our Process</span>
        <h2 class="section-title">From Enquiry to Delivery – A Seamless Journey</h2>
      </div>

      <div class="process-row">
        <ol class="process-steps">
          <li class="reveal"><span class="step-no">1</span><i class="bi bi-chat-left-text"></i><h3>Share Your Requirement</h3></li>
          <li class="reveal"><span class="step-no">2</span><i class="bi bi-person-workspace"></i><h3>Get Expert Consultation</h3></li>
          <li class="reveal"><span class="step-no">3</span><i class="bi bi-file-earmark-text"></i><h3>Receive Best Quotation</h3></li>
          <li class="reveal"><span class="step-no">4</span><i class="bi bi-clipboard-check"></i><h3>Order Confirmation</h3></li>
          <li class="reveal"><span class="step-no">5</span><i class="bi bi-truck"></i><h3>Timely Delivery</h3></li>
        </ol>

        <div class="assist-card reveal from-right">
          <img class="assist-image" src="assets/images/banner2.png" alt="" aria-hidden="true" loading="lazy">
          <div class="assist-box">
            <i class="bi bi-telephone-fill"></i>
            <div><small>Need Assistance?</small><a href="tel:07949313008">07949313008</a></div>
          </div>
          <a href="#guidance" class="btn-brand btn-sm-x">Explore Product Guidance <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </section>
  <!-- ENQUIRY PROCESS SECTION END -->


  </main>
  <!-- ==================== HOME PAGE END ==================== -->

  <nav class="contact-shortcuts" aria-label="Quick contact">
    <a href="tel:07949313008" aria-label="Call Pristine Engineering Services">
      <i class="bi bi-telephone-fill" aria-hidden="true"></i><span>Call Us</span>
    </a>
    <a href="mailto:info@pristineengineering.com" aria-label="Email Pristine Engineering Services">
      <i class="bi bi-envelope-fill" aria-hidden="true"></i><span>Email</span>
    </a>
    <a href="#enquiry" data-open-enquiry aria-label="Open the enquiry form">
      <i class="bi bi-chat-dots-fill" aria-hidden="true"></i><span>Enquiry</span>
    </a>
  </nav>
