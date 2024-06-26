 <html>
   <head>
   	 <title>TheBloggers</title>
   	 <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
     <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
   	</head>
   	<body> 
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>about">TheBloggers</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           <li class="nav-item">
             <a class="nav-link active" href="<?php echo base_url(); ?>posts">Home</a></li>
           <li class="nav-item">
             <a class="nav-link active" href="<?php echo base_url(); ?>about">About</a></li>
           <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url(); ?>posts">Blog</a></li>
           <li class="nav-item">
             <a class="nav-link active" href="<?php echo base_url(); ?>categories">Categories</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
           <?php if(!$this->session->userdata('logged_in')) : ?>
              <li><a class="nav-item nav-link active" href="<?php echo base_url(); ?>users/register">Register</a></li>
              <li><a class="nav-item nav-link active" href="<?php echo base_url(); ?>users/login">Log In</a></li>
         <?php endif; ?>
         <?php if($this->session->userdata('logged_in')) : ?>
             <li><a class="nav-item nav-link active" href="<?php echo base_url(); ?>posts/create">New Post</a></li>
              <li><a class="nav-item nav-link active" href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
              <li><a class="nav-item nav-link active" href="<?php echo base_url(); ?>users/logout">Log Out</a></li>
           <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <!--- Alert Message --->

      <?php if($this->session->flashdata('user_registered')): ?>
         <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_created')): ?>
         <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_updated')): ?>
         <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
      <?php endif; ?>
    
      <?php if($this->session->flashdata('category_created')): ?>
         <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_deleted')): ?>
         <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
         <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
         <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>
      
        <?php if($this->session->flashdata('user_loggedout')): ?>
         <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_deleted')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>