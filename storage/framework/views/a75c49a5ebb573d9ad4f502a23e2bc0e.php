

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Editor</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>

<?php $__env->startSection('content'); ?>
<main class="container">
    <section class="book-editor-section">
        <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Title Bar -->
            <div class="titlebar">
                <h1>Book Editor</h1>
            </div>

            <!-- Error Messages -->
            <?php if($errors->any()): ?>
                <div class="error-messages">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Card Container -->
            <div class="card-container">
                <div class="card">
                    <!-- Book Title & Author -->
                    <div class="input-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" value="<?php echo e($product->title); ?>">
                    </div>

                    <div class="input-group">
                        <label for="author">Author</label>
                        <input id="author" name="author" type="text" value="<?php echo e($product->author); ?>">
                    </div>

                    <!-- Publication Year -->
                    <div class="input-group">
                        <label for="publication_year">Publication Year</label>
                        <select name="publication_year" id="publication_year">
                            <option value="">Select Year</option>
                            <?php for($year = 1900; $year <= 2099; $year++): ?>
                                <option value="<?php echo e($year); ?>" <?php echo e($year == $product->publication_year ? 'selected' : ''); ?>><?php echo e($year); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <div class="card">
                    <!-- Description -->
                    <div class="input-group">
                        <label for="description">Description (optional)</label>
                        <textarea id="description" name="description" cols="10" rows="5"><?php echo e($product->description); ?></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="input-group">
                        <label for="picture">Image</label>
                        <img src="<?php echo e(asset('images/' . $product->picture)); ?>" alt="Current Book Image" class="img-product" id="file-preview" />
                        <input type="hidden" name="current_image" value="<?php echo e($product->picture); ?>">
                        <input id="picture" name="picture" type="file" accept="image/*" onchange="showFile(event)">
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="titlebar">
                <input type="hidden" name="hidden_id" value="<?php echo e($product->id); ?>">
                <button type="submit" class="btn-save">Save</button>
            </div>
        </form>
    </section>
</main>


<script>
    function showFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Michelle Chandra\fixmtc\resources\views/products/edit.blade.php ENDPATH**/ ?>