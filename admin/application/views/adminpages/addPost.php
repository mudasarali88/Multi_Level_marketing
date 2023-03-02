<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
    <!-- begin #content -->
    <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Post</a></li>
        <li class="active">Add Post</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Post</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
            <div class="message">
                <?php if ($this->session->flashdata('message')) { ?>
                    <?= $this->session->flashdata('message') ?>
                <?php } ?>
            </div>
            <form class="form-horizontal fv-form fv-form-bootstrap"  name="Addpost" method="post" enctype="multipart/form-data">

                <div class="col-md-12">

                    <div class="form-group m-b-10">
                        <div class="text-danger">
                            <?php echo form_error('post_title'); ?>
                        </div>
                        <label class="col-md-2 control-label">Title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" required=""  name="post_title" value="<?php echo set_value('post_title'); ?>" placeholder="Enter post title">
                        </div>
                    </div>

                </div>

                <div class="col-md-12">

                    <div class="form-group m-b-10">
                        <div class="text-danger">
                            <?php echo form_error('post_desc'); ?>
                        </div>
                        <label class="col-md-2 control-label">Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control"  name="post_desc" required=""><?php echo set_value('post_desc'); ?></textarea>
                        </div>
                    </div>


                    <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('Image'); ?>
                        </div>
                        <label class="col-md-2 control-label">Image</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control" name="Image" required="" value="<?php echo set_value('image'); ?>">
                        </div>
                    </div>

                </div>
                <div class="m-b-10 col-md-7 col-md-offset-1 m-t-25">
                    <button type="submit" value="submit" class="btn btn-success width-100 m-r-5">Submit</button>
                    <button class="btn btn-default width-100" type="reset">Cancel</button>
                </div>

            </form>
        </div>
        <!-- end section -->
    </div>

<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>