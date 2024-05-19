
<?php $__env->startSection('content'); ?>
    <div class="container-fluid p-5">
        <div class="d-flex justify-content-between align-items-center">
            <p class="title-list"> Products</p>
        </div>

        <div class="col-12 px-0 table-box">
            <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
                


                <a href="<?php echo e(route('products.create')); ?>" class="btn adding-button">
                    Add New <i class="fa fa-plus ml-2 mt-1"></i>
                </a>
            </div>


            <div class="table-responsive">
                <table class="table table-hover" id="org_table">
                    <thead>
                    <tr>
                        <th class="lightblue-color w-2" scope="col">#</th>
                        <th class="darkblue-color text-center text-nowrap align-top"></th>
                        <th class="darkblue-color text-center text-nowrap align-top">Product name</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Product category</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Product min-description</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Product Description</th>
                        <th class="darkblue-color text-center text-nowrap align-top"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr></tr>
                        <th class="lightblue-color w-2 align-middle" scope="row"><?php echo e(++$key); ?></th>
                        <td class="darkblue-color d-flex align-items-center justify-content-end">
                            <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-outline-primary mr-3 text-nowrap">Update</a>
                        </td>
                        <td class="darkblue-color text-center text-nowrap align-middle"><a href="<?php echo e(route('products.show',$product->id)); ?>"><?php echo e($product->title); ?></a></td>
                        <td class="darkblue-color text-center text-nowrap align-middle"><?php echo e($product->min_description); ?></td>
                        <td class="darkblue-color text-center text-nowrap align-middle"><?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($cat->title); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                        <td class="darkblue-color text-center text-nowrap align-middle"><?php echo e($product->description); ?></td>
                        </td>
                        <td>
                            <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="post">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <input class="btn btn-outline-danger mr-3" type="submit" onclick="return confirm('<?php echo e($product->title); ?> Are you sure?')" value="Delete" />
                            </form>
                        </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
        <br/>
        
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\example-app\resources\views/admin/products.blade.php ENDPATH**/ ?>