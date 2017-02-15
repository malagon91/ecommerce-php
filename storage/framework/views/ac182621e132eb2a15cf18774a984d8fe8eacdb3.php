<?php $__env->startSection('content'); ?>
<div class="big-padding text-center blue-grey white-text">
  <h1>Products</h1>
</div>
  <div class="container">
     <table class="table table-bordered">
       <thead>
       <tr>
         <td>ID</td>
         <td>title</td>
         <td>Description</td>
         <td>Price</td>
         <td>Actions</td>
       </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($product->id); ?></td>
            <td><?php echo e($product->title); ?></td>
            <td><?php echo e($product->description); ?></td>
            <td><?php echo e($product->pricing); ?></td>
            <td>
              <a href="<?php echo e(url('/products/'.$product->id.'/edit')); ?>">
                Edit
              </a>
              <?php echo $__env->make('products.delete',['product' => $product], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody>
     </table>
  </div>
<div class="floating">
  <a href="<?php echo e(url('/products/create')); ?>" class="btn btn-primary btn-fab">
    <i class="material-icons">add</i>
  </a>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>