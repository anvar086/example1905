
<?php $__env->startSection('content'); ?>
    <div class="col-md-12 px-0 table-box">
        <div class="table-top-panel border-bottom d-flex align-items-center justify-content-between px-5 pt-5 pb-4">
            <p class="account-title mb-2">Product</p>
        </div>

        <div class="account-container min-vh-75 d-flex justify-content-center py-5">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="account-photo">
                            <img src="/storage/product/images/<?php echo e($product->image); ?>" class="w-100" alt="png">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="account-info">
                            <ul class="mb-5 pb-3">
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="col-md-6">
                                        <p class="account-info-title">
                                            Name:
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="account-info-text">
                                            <?php echo e($product->title); ?>

                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="col-md-6">
                                        <p class="account-info-title">
                                            Min-description:
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="account-info-text">
                                            <?php echo e($product->min_description); ?>

                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="col-md-6">
                                        <p class="account-info-title">
                                            Description:
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="account-info-text">
                                            <?php echo e($product->description); ?>

                                        </p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\example-app\resources\views/admin/productsShow.blade.php ENDPATH**/ ?>