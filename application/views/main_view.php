<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container">
        <h3>View all Posts</h3>
        <?php echo anchor('main/createpost', 'Add Post', 'class="mb-2 btn btn-primary"'); ?>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th >Description</th>
                <th scope="col">Created Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($posts) > 0): ?>
                <?php foreach ($posts as $post): ?>
                    <tr class="table-active">
                        <td><?php  echo $post->id; ?> </td>
                        <td><?php  echo $post->title; ?></td>
                        <td><?php  echo $post->description; ?></td>
                        <td><?php  echo $post->date_created; ?></td>
                        <td>
                            <?php echo anchor('main/view', 'View', 'class="badge badge-pill badge-info"'); ?>
                            <?php echo anchor('main/update', 'Update', 'class="badge badge-pill badge-success"'); ?>
                            <?php echo anchor('main/delete', 'Delete', 'class="badge badge-pill badge-danger"'); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td>No Records Found!</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>