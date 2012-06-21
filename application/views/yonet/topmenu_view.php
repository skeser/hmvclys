    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">HMVC-LYS Yönetim Paneli</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><? echo $yonetMenu['yonet'] ?></li>
              <li><? echo $yonetMenu['adduser'] ?></li>
              <li><? echo $yonetMenu['myaccount'] ?></li>
              <li class="active"><? echo $yonetMenu['test'] ?></li>
              <li class="active"><? echo $yonetMenu['modulesConn'] ?></li>
              <li><? echo $yonetMenu['front'] ?></li>
            </ul>
            <p class="navbar-text pull-right">
            Logged in as <?php echo $yonetMenu['userLink'] ?> || <a href="<?php echo base_url()?>logout">Çıkış</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    		            
		   