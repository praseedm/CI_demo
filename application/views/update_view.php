<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <?php echo form_open("main/change/{$post->id}","class='form-horizontal'"); ?>
        <fieldset>
            <legend>Update Post</legend>
            <div class="form-group">
                <label for="title">Title</label>
                <div class="col-sm-5 text-danger">
                    <!--                error display-->
                    <?php echo form_error('title'); ?>
                </div>

                <?php
                $attrbt['type'] = 'text'; $attrbt['class'] = 'form-control'; $attrbt['id'] = 'title';
                $attrbt['placeholder'] = 'title'; $attrbt['name'] = 'title';  $attrbt['value'] = set_value('title',$post->title);
                 echo form_input($attrbt);
                ?>

            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <div class="col-sm-5 text-danger">
                    <!--                error display-->
                    <?php echo form_error('description'); ?>
                </div>
                <?php
                $attrb['rows'] = '3'; $attrb['class'] = 'form-control'; $attrb['id'] = 'description';
                $attrb['placeholder'] = 'description'; $attrb['name'] = 'description';
                $attrb['value'] = set_value('description',$post->description);
                echo form_textarea($attrb);
                ?>

            </div>
            <?php
                $sub['name']='submit'; $sub['class']='btn btn-success'; $sub['value']='Update';
                echo form_submit($sub);
                echo anchor('main', 'Cancel', "class='btn btn-primary'" );
            ?>
        </fieldset>
    <?php echo form_close(); ?>        <!--    </form>-->
</div>
