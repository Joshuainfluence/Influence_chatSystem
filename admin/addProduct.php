<?php
require_once __DIR__ . "/adminHeader.php";
require_once __DIR__ . "/../config/session.php";
?>

<style>
    .script {
        z-index: 9999;
    }
</style>
<div class="script">
    <script>
        window.onload = function() {
            <?php if (isset($_SESSION['success'])) : ?>
                Swal.fire("Success", "<?= $_SESSION['success'] ?>", "success");
            <?php endif ?>

            <?php if (isset($_SESSION['error'])) : ?>
                Swal.fire("Error", "<?= $_SESSION['error'] ?>", "error");
            <?php endif ?>
        };
    </script>
</div>
<?php
// if (isset($_SESSION['success'])) :
    // echo '<script>console.log("Success message: ' . $_SESSION['success'] . '");</script>';
// endif;

// if (isset($_SESSION['error'])) :
    // echo '<script>console.log("Error message: ' . $_SESSION['error'] . '");</script>';
// endif;
?>

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Products</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-12">
            <!-- <div class="card"> -->
            <form action="../inc/product.inc.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mt-2">
                    <label for="product_name">
                        <h5>Product name</h5>
                    </label>
                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product name">
                </div>
                <div class="form-group mt-2">
                    <label for="product_description">
                        <h5>Product Description</h5>
                    </label>
                    <input type="text" name="product_description" id="product_description" class="form-control " placeholder="Enter Product description">
                </div>
                <div class="form-group mt-2">
                    <label for="product_price">
                        <h5>Product Price</h5>
                    </label>
                    <input type="number" name="product_price" id="product_price" class="form-control " placeholder="Enter Product price">
                </div>
                <div class="form-group mt-2">
                    <label for="product_unit">
                        <h5>Product Unit</h5>
                    </label>
                    <input type="text" name="product_unit" id="product_unit" class="form-control " placeholder="Enter Product unit">
                </div>
                <div class="form-group mt-2">
                    <label for="product_unit">
                        <h5>Product Category</h5>
                    </label>
                    <select name="product_category" id="category" class="form-control bg-secondary text-light">
                        <option value="lipcare">Lipcare</option>
                        <option value="skincare">Skincare</option>
                        <option value="liptreat">Liptreat</option>
                        <option value="accessories">Accessories</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="product_info">
                        <h5>Product Information</h5>
                    </label>
                    <textarea type="text" name="product_info" cols="30" rows="10" id="product_info" class="form-control " placeholder="Enter Product description"></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="product_image">
                        <h5>Product Image</h5>
                    </label>
                    <input type="file" name="product_image" id="product_image" class="form-group">
                </div>
                <div class="form-group mt-2">
                    <label for="related_image">
                        <h5>Related Image</h5>
                    </label>
                    <input type="file" name="related_image" id="related_image" class="form-group ">
                </div>
                <div class="form-group mt-2">
                    <label for="applied_image">
                        <h5>Image on Application</h5>
                    </label>
                    <input type="file" name="applied_image" id="applied_image" class="form-group">
                </div>
                <div class="form-group mt-2">
                    <label for="video_product">
                        <h5>Video of Product</h5>
                    </label>
                    <input type="file" name="product_video" id="video_product" class="form-group">
                </div>
                <div class="form-group mt-2">
                    <input type="submit" name="submit" value="Add Product" class="btn btn-primary">
                </div>

            </form>
            <!-- </div> -->
        </div>




    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- footer -->
<?php 
require_once __DIR__. "/adminFooter.php";
?>