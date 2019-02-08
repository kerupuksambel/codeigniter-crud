<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>">CodeIgniter CRUD</a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
    
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user']; ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>