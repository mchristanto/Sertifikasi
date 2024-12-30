

<?php $__env->startSection('content'); ?>
<main class="container mt-4">
    <section>
        <!-- Form for lending a book -->
        <form action="<?php echo e(route('lending.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="titlebar text-center mb-4">
                <h1>Book Loan</h1>
            </div>

            <!-- Show validation errors -->
            <?php if($errors->any()): ?>
                <div class="alert alert-danger mb-4">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="split-container">
                <!-- Left Container: Borrower Details -->
                <div class="container-left">
                    <div class="form-group">
                        <label for="name">Borrower Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="<?php echo e(old('name')); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input id="phone" name="phone" type="text" class="form-control" value="<?php echo e(old('phone')); ?>" required>
                    </div>
                </div>

                <!-- Right Container: Book Details and Dates -->
                <div class="container-right">
                    <div class="form-group">
                        <label for="book_id">Book Title</label>
                        <select id="book_id" name="book_id" class="form-control" required>
                            <option value="">Select a book</option>
                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($book->id); ?>" <?php echo e(old('book_id') == $book->id ? 'selected' : ''); ?>>
                                    <?php echo e($book->title); ?> - <?php echo e($book->stock); ?> available
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('book_id')): ?>
                            <div class="error" style="color: red; font-size: 12px;"><?php echo e($errors->first('book_id')); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="tgl_pinjam">Date Borrowed</label>
                        <input id="tgl_pinjam" name="tgl_pinjam" type="date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_kembali">Date Returned (d+7)</label>
                        <input id="tgl_kembali" name="tgl_kembali" type="date" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <!-- Submit button -->
            <div class="titlebar text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </section>
</main>

<script>
    // JavaScript to calculate the return date automatically (7 days after borrow date)
    document.addEventListener('DOMContentLoaded', function () {
        const tglPinjamInput = document.querySelector('input[name="tgl_pinjam"]');
        const tglKembaliInput = document.querySelector('input[name="tgl_kembali"]');

        function updateTanggalKembali() {
            const selectedDate = new Date(tglPinjamInput.value);
            if (!isNaN(selectedDate.getTime())) {
                selectedDate.setDate(selectedDate.getDate() + 7);
                const formattedDate = selectedDate.toISOString().split('T')[0];
                tglKembaliInput.value = formattedDate;
            } else {
                tglKembaliInput.value = ''; // Clear the return date if the borrow date is invalid
            }
        }

        // Trigger update when borrow date is changed
        tglPinjamInput.addEventListener('change', updateTanggalKembali);
    });
</script>

<?php $__env->stopSection(); ?>

<style>
    .split-container {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        flex-wrap: wrap; /* Ensure the layout is responsive */
    }
    .container-left, .container-right {
        width: 48%;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        font-weight: 600;
        color: #333;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .split-container {
            flex-direction: column;
        }

        .container-left, .container-right {
            width: 100%;
        }
    }
</style>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Michelle Chandra\fixmtc\resources\views/lending/bookLend.blade.php ENDPATH**/ ?>