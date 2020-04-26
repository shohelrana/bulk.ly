<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body">
    <div class="row">
        <div class="col-md-12">
            <h2>Recent Posts Sent to Butter</h2>

            <div class="row">
                <div class="col-md-3"></div>
            </div>

            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" method="POST" action="<?php echo e(url('posts')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input class="form-control mr-sm-2" name="search_text" type="search" placeholder="Search" aria-label="Search">
                    <input class="form-control mr-sm-2" name="date" type="date" placeholder="Select date" aria-label="Search">
                    <select class="custom-select mr-sm-2" name="group" id="inlineFormCustomSelect" style="height: 32px; min-width: 150px">
                        <option selected id="0">All groups</option>
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Group Name</th>
                        <th scope="col">Group Type</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Post Text</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->group_name); ?></td>
                            <td><?php echo e($post->group_type); ?></td>
                            <td><img width="48" height="48" src="<?php echo e($post->avatar); ?>" style="border-radius: 50%;"></td>
                            <td><?php echo e($post->post_text); ?></td>
                            <td><?php echo e($post->updated_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>

                <div class="text-center">
                    <?php echo e($posts->links()); ?>

                </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>