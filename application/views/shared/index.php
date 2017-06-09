<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('/shared/meta_view'); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Amsel Nutra Sales Dashboard</a>
            </div>

            <!-- Navigation Area -->
            <?php //$this->load->view('/shared/navigation_icon'); ?>

            <!-- Side Bar Area -->
            <?php $this->load->view('/shared/sidebar') ?>
        </nav>

        <?php //$this->load->view('/shared/content_view'); ?>
        <?php $this->load->view($content); ?>

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('/shared/script_view'); ?>

    <?php 
    if($addition_script)
    {
        $this->load->view($addition_script);
    }
    ?>

</body>

</html>
