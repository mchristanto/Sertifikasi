

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <title>Loan History</title>
</head>

<?php $__env->startSection('content'); ?>
<main class="container">
    <section>
        <div class="titlebar">
            <h1>Loan History</h1>
        </div>
        <div class="table">
            <table>
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th>Borrower Name</th>
                        <th>Title</th>
                        <th>Date Borrowed</th>
                        <th>Date Returned</th>
                        <th>Status</th>
                    </tr>
                </thead>
                
                <!-- Table Body -->
                <tbody>
                    <?php if(count($history) > 0): ?>
                        <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $histories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <!-- Borrower Name Column -->
                                <td><?php echo e($histories->member ? $histories->member->name : 'Unknown Borrower'); ?></td>

                                <!-- Book Title Column -->
                                <td><?php echo e($histories->book ? $histories->book->title : 'Unknown Title'); ?></td>

                                <!-- Borrow Date Column -->
                                <td><?php echo e($histories->tgl_pinjam); ?></td>

                                <!-- Return Date Column -->
                                <td><?php echo e($histories->tgl_kembali); ?></td>

                                <!-- Status Column -->
                                <td>
                                    <form action="<?php echo e(route('history.update', ['history' => $histories->id])); ?>" method="POST" class="status-form">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <div class="status-container">
                                            <input type="checkbox" name="status" <?php echo e($histories->status == 'returned' ? 'checked' : ''); ?> class="status-checkbox">
                                            <label><?php echo e($histories->status); ?></label>
                                        </div>
                                        <button type="submit" class="status-btn">Update</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr class="no-records">
                            <td colspan="5">No loan history available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Michelle Chandra\fixmtc\resources\views/lending/history.blade.php ENDPATH**/ ?>