<?php
require_once __DIR__ . '/assets/inc/product-catalog.php';

$slug = isset($_GET['slug']) && is_string($_GET['slug']) ? $_GET['slug'] : '';
$selectedProduct = isset($products[$slug]) ? $products[$slug] : null;
http_response_code($selectedProduct ? 200 : 404);
$pageTitle = $selectedProduct
  ? $selectedProduct['title'] . ' | Pristine Engineering Services'
  : 'Product Not Found | Pristine Engineering Services';
$pageDescription = $selectedProduct
  ? $selectedProduct['summary']
  : 'The requested product could not be found. Explore the Pristine Engineering Services product catalogue.';
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
<?php include_once("assets/inc/product-details.php"); ?>
<?php include_once("assets/inc/footer.php"); ?>
<?php include_once("assets/inc/modal.php"); ?>
<?php include_once("assets/inc/footer-link.php"); ?>
</body>
</html>
