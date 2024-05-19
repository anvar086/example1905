
<?php $__env->startSection('content'); ?>
    <div class="container-fluid p-5">
        <div class="d-flex justify-content-between align-items-center">
            <p class="title-list"> Categories</p>
        </div>

        <div class="col-12 px-0 table-box">
            <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
                


                <a href="<?php echo e(route('category.create')); ?>" class="btn adding-button">
                    Add New <i class="fa fa-plus ml-2 mt-1"></i>
                </a>
            </div>


            <div class="table-responsive">
                <table class="table table-hover" id="org_table">
                    <thead>
                    <tr>
                        <th class="lightblue-color w-2" scope="col">#</th>
                        <th class="darkblue-color text-center text-nowrap align-top"></th>
                        <th class="darkblue-color text-center text-nowrap align-top">Category name</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Category min-description</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Category Description</th>
                        <th class="darkblue-color text-center text-nowrap align-top"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr></tr>
                        <th class="lightblue-color w-2 align-middle" scope="row"><?php echo e(++$key); ?></th>
                        <td class="darkblue-color d-flex align-items-center justify-content-end">
                            <a href="<?php echo e(route('category.edit', $category->id)); ?>" class="btn btn-outline-primary mr-3 text-nowrap">Update</a>
                        </td>
                        <td class="darkblue-color text-center text-nowrap align-middle"><a href="<?php echo e(route('category.show',$category->id)); ?>"><?php echo e($category->title); ?></a></td>
                        <td class="darkblue-color text-center text-nowrap align-middle"><?php echo e($category->min_description); ?></td>
                        <td class="darkblue-color text-center text-nowrap align-middle"><?php echo e($category->description); ?></td>
                        </td>
                        <td>
                            <form action="<?php echo e(route('category.destroy', $category->id)); ?>" method="post">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <input class="btn btn-outline-danger mr-3" type="submit" onclick="return confirm('<?php echo e($category->title); ?> Are you sure?')" value="Delete" />
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



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\example-app\resources\views/admin/category.blade.php ENDPATH**/ ?>