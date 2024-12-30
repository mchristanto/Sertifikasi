
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
</head>
<?php $__env->startSection('content'); ?>
<main class="container">
    <section>
        <div class="titlebar">
            <h1>Library Catalog</h1>
            <div class="btn-container">
                <a href="<?php echo e(route('products.create')); ?>" class="btn-link">Add Book</a>
                <a href="<?php echo e(route('history.create')); ?>" class="btn-link">Loan History</a>
                <a href="<?php echo e(route('lending.create')); ?>" class="btn-link">Loan</a>
            </div>
        </div>
        
        
        <form action="<?php echo e(route('products.index')); ?>" method="GET" accept-charset="UTF-8" role="search">
            <?php echo csrf_field(); ?>
            <div class="searchbar">
                <input name="search" type="text" placeholder="Search by Name, Author, Year, Publisher..." value="<?php echo e(request('search')); ?>">
            </div>
            
        </form>
        
        
        <div class="table">
            <table>
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <!-- Table Body -->
                <tbody>
                    <?php if(count($products) > 0): ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <!-- Product Image -->
                                <td><img src="<?php echo e(asset('picture/' . $product->picture)); ?>" alt="Book Cover" style="width: 80px; height: 120px; object-fit: cover;"></td>

                                <!-- Product Title -->
                                <td><?php echo e($product->title); ?></td>

                                <!-- Product Author -->
                                <td><?php echo e($product->author); ?></td>

                                <!-- Product Year -->
                                <td><?php echo e($product->publication_year); ?></td>

                                <!-- Action Buttons -->
                                <td>
                                    <div class="button-group">
                                        <!-- Edit Button -->
                                        <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-success">
                                            Edit
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" style="display:inline-block;">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-danger" onclick="deleteConfirm(event)">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Book Unavailable</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="table-paginate">
            <?php echo e($products->links('layouts.pagination')); ?>

        </div>
    </section>
</main> 


<script>
    window.deleteConfirm = function(e) {
        e.preventDefault();
        var form = e.target.form;
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Michelle Chandra\fixmtc\resources\views/products/home.blade.php ENDPATH**/ ?>