<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php
                    $session = $this->session->userdata['logged_in'];
                    echo strtoupper($session['username']);
                    ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Proses Data</span><span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Input Data</a></li>
                    <li><a href="<?php echo base_url(); ?>lihat"><i class="fa fa-circle-o"></i> Lihat Data</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>