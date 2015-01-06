<?php
include("includes/products.php");
$pageTitle = "Mike's Full Catalog of Shirts";
$section = "shirts";
include('includes/header.php'); ?>
    <div class="section shirts page">
        <div class="wrapper">
            <h1>Mike&rsquo;s Full Catalog Of Shirts</h1>
            <ul class="products">
                <?php foreach($products as $product_id => $product){
                    echo "<li>";
                    echo '<a href="shirt.php?id=' . $product_id . '">';
                    echo '<img src="' . $product["img"] . '" alt="' . $product["name"] . '">';
                    echo "<p>View Details</p>";
                    echo "</a>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
<?php include('includes/footer.php'); ?>