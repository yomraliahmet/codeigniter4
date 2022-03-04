<?php echo $this->extend('admin/layouts/main'); ?>
<?php echo $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?php echo route_to('admin_products_create') ?>" class="btn btn-sm btn-primary">
                <span data-feather="plus"></span>
                Add Product
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Product Code</th>
                <th scope="col">Quantity</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td class="align-middle"><?php echo $product["id"]; ?></td>
                    <td class="align-middle"><img class="img-thumbnail" width="60" src="/uploads/<?php echo $product["image_url"]; ?>" alt=""></td>
                    <td class="align-middle"><?php echo $product["product_code"]; ?></td>
                    <td class="align-middle"><?php echo $product["quantity"]; ?></td>
                    <td class="align-middle">
                        <a href="<?php echo route_to('admin_products_edit', $product["id"]) ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?php echo route_to('admin_products_delete', $product["id"]) ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php echo $this->endSection(); ?>




