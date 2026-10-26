<?php
require_once __DIR__ . '/assets/inc/blog-catalog.php';
require_once __DIR__ . '/assets/inc/product-catalog.php';

$slug = isset($_GET['slug']) && is_string($_GET['slug']) ? $_GET['slug'] : '';
$selectedArticle = isset($articles[$slug]) ? $articles[$slug] : null;
http_response_code($selectedArticle ? 200 : 404);
$pageTitle = $selectedArticle
  ? $selectedArticle['title'] . ' | Pristine Engineering Services'
  : 'Article Not Found | Pristine Engineering Services';
$pageDescription = $selectedArticle
  ? $selectedArticle['excerpt']
  : 'The requested article could not be found. Explore insights from Pristine Engineering Services.';
?>
<?php include_once("assets/inc/top.php"); ?>
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
  <meta name="theme-color" content="#061C33">
  <link rel="icon" href="assets/images/logo.jpeg">
<?php include_once("assets/inc/top-link.php"); ?>
</head>
<body class="site-page inner-page">
<?php include_once("assets/inc/navbar.php"); ?>
<?php include_once("assets/inc/blog-details.php"); ?>
<?php include_once("assets/inc/footer.php"); ?>
<?php include_once("assets/inc/modal.php"); ?>
<?php include_once("assets/inc/footer-link.php"); ?>
</body>
</html>
