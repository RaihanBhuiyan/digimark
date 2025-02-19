<style type="text/css">

</style>
<div class="page-wrapper toggled chiller-theme">
  <!-- <a id="show-sidebar" href="javascript:void(0)">btn btn-sm btn-dark 
    <i class="fas fa-bars"> </i> M E N U
  </a> -->
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="javascript:void(0)">Digi-Mark CMS</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>

      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="Dashboard">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="Credentials">
              <i class="fa fa-key"></i>
              <span>Change Credentials</span>
            </a>
          </li>
          <li class="header-menu">
            <span>Product Management</span>
          </li>

                  <?php
                    // $i = 0;$type_str = '';
                    // $sql = "SELECT * FROM `table_permission` JOIN `master_menu` ON `table_permission`.`pageCode` = `master_menu`.`pageCode` WHERE `table_permission`.`userCode` = 'DGM00016'";
                    // $result = mysqli_query($dbcon,$sql) or die ('error 404');
                    //     while($row = mysqli_fetch_assoc($result)){
                    //     $userCode = $row['userCode'];
                    //     $pageCode = $row['pageCode'];
                    //     $menu = $row['menu'];
                    //     $type = $row['type'];

                        
                    //     // if($type=='Product Management'){
                    //     //     if($i==0 || $i==1){$i = 2; echo '<h5 style="padding-left: 7%;background-color: lightgray;margin-top:2%">Product Management</h5>';}
                    //     //     echo $menu.'<br>';
                    //     // }elseif($type=='Dealer Management'){
                    //     //     if($i==0 || $i==2){$i = 3; echo '<h5 style="padding-left: 7%;background-color: lightgray;margin-top:2%">Dealer Management</h5>';}
                    //     //     echo $menu.'<br>';
                    //     // }elseif($type=='User Management'){
                    //     //     if($i==0 || $i==3){$i = 4; echo '<h5 style="padding-left: 7%;background-color: lightgray;margin-top:2%">Visa User Management</h5>';}
                    //     //     echo $menu.'<br>';
                    //     // }elseif($type=='Review'){
                    //     //     if($i==0 || $i==4){$i = 5; echo '<h5 style="padding-left: 7%;background-color: lightgray;margin-top:2%">Review</h5>';}
                    //     //     echo $menu.'<br>';
                    //     // }elseif($type=='Website CMS'){
                    //     //     if($i==0 || $i==5){$i = 6; echo '<h5 style="padding-left: 7%;background-color: lightgray;margin-top:2%">Website CMS</h5>';}
                    //     //     echo $menu.'<br>';
                    //     // }

                    //     // if($type=='Product Management'){
                    //       if($type !== $type_str)
                    //           {echo '<li class="header-menu">
                    //                  <span>'.$type.'</span>
                    //                  </li>';}
                          
                    //         echo '<li>
                    //               <a href="'.$pageCode.'">
                    //                 <i class="fa fa-sitemap"></i>
                    //                 <span>'.$menu.'</span>
                    //               </a>
                    //             </li>';
                    //       // }

                    //             $type_str = $type;
                    //     }
                    ?>
          <li>
            <a href="Category">
              <i class="fa fa-sitemap"></i>
              <span>Manage Category</span>
            </a>
          </li>
          <li>
            <a href="Brand">
              <i class="fa fa-tags"></i>
              <span>Manage Brands</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-filter"></i>
              <span>Filter & Spec</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Filter-Head">Filter Head</a>
                </li>
                <li>
                  <a href="Filter-Tag">Tag Filter Category</a>
                </li>
                <li>
                  <a href="Filter-Value">Filter Value</a>
                </li>
                <li>
                  <a href="Spec-Head">Spec-Head</a>
                </li>
                <li>
                  <a href="Spec-Subhead">Spec-Subhead</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-cogs"></i>
              <span>Product Setup</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Create-Product">Create Product</a>
                </li>
                <li>
                  <a href="List-Product/Add-Spec">Add Tech Spec</a>
                </li>
                <li>
                  <a href="List-Product/Add-Filter">Add Filter</a>
                </li>
                <li>
                  <a href="List-Product/Product-Image">Manage Image</a>
                </li>
              </ul>
            </div>
          </li>

          <!-- <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-database"></i>
              <span>Assets</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="javascript:void(0)">Asset Setup</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Purchase Asset</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Sale Asset</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Dispose Assets</a>
                </li>
              </ul>
            </div>
          </li> -->


          <li class="header-menu">
            <span>Dealer Management</span>
          </li>


          <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-users"></i>
              <span>Partner Management</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Manage-Pending-Dealer"><i class="fa fa-users"></i> Partner List</a>
                </li>
                <li>
                  <a href="Partner-Item-Upload"><i class="fa fa-code"></i> Upload Support Item</a>
                </li>
              </ul>
            </div>
          </li>
          

          <li class="header-menu">
            <span>User Account</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-user"></i>
              <span>Maintenance Account</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Manage-Maintenance-User"><i class="fa fa-user"></i> Manage</a>
                </li>
                <li>
                  <a href="Permission"><i class="fa fa-user"></i> Permission</a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="header-menu">
            <span>Review</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-comment"></i>
              <span>Manage Reviews</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Manage-Review"><i class="fa fa-comment"></i> Pending Reviews</a>
                </li>
                <li>
                  <a href="All-Reviews/0/"><i class="fa fa-comment"></i> All Review</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-folder"></i>
              <span>Asset</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="javascript:void(0)"><i class="fa fa-file"></i> Asset List</a>
                </li>
                <li>
                  <a href="javascript:void(0)"><i class="fa fa-file"></i> Disposed</a>
                </li>
              </ul>
            </div>
          </li> -->
          
          <li class="header-menu">
            <span>Website CMS</span>
          </li>
          <li>
            <a href="Overlay-Adv"><i class="fas fa-image"></i> Overlay-Adv</a>
          </li>
          <li>
            <a href="Carousel-Control"><i class="fas fa-image"></i> Carousel Control</a>
          </li>
          <li>
            <a href="About"><i class="fas fa-gear"></i> About</a>
          </li>
          <li>
            <a href="Award"><i class="fas fa-award"></i> Award</a>
          </li>
          
          <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-folder"></i>
              <span>Contact</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Branch"><i class="fas fa-code-branch"></i> Branch</a>
                </li>
                <li>
                  <a href="Social-Media/0/"><i class="fas fa-share"></i> Social Media</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-pen"></i>
              <span>Writings</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Manage-News/" target="_blank"><i class="fa fa-newspaper"></i>Manage News</a>
                </li>
                <li>
                  <a href="Manage-CaseStudy/"><i class="fa fa-file"></i>Manage Case Study</a>
                </li>
                <li>
                  <a href="Manage-Blog/"><i class="fas fa-blog"></i>Manage Blog</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
              <i class="fas fa-graduation-cap"></i>
              <span>Career</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="Post-Job"><i class="fa fa-pen"></i> Post Job</a>
                </li>
                <li>
              </ul>
            </div>
          </li>

         <!--  <li>
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>General Ledgre</span>
            </a>
          </li> -->
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
     <!--  <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a> -->
      <a href="Logout/0/">
        <i class="fa fa-power-off" style="color: red">Power Off</i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">






<style type="text/css">
@keyframes swing {
  0% {
    transform: rotate(0deg);
  }
  10% {
    transform: rotate(10deg);
  }
  30% {
    transform: rotate(0deg);
  }
  40% {
    transform: rotate(-10deg);
  }
  50% {
    transform: rotate(0deg);
  }
  60% {
    transform: rotate(5deg);
  }
  70% {
    transform: rotate(0deg);
  }
  80% {
    transform: rotate(-5deg);
  }
  100% {
    transform: rotate(0deg);
  }
}

@keyframes sonar {
  0% {
    transform: scale(0.9);
    opacity: 1;
  }
  100% {
    transform: scale(2);
    opacity: 0;
  }
}
body {
  font-size: 0.9rem;
}
.page-wrapper .sidebar-wrapper,
.sidebar-wrapper .sidebar-brand > a,
.sidebar-wrapper .sidebar-dropdown > a:after,
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before,
.sidebar-wrapper ul li a i,
.page-wrapper .page-content,
.sidebar-wrapper .sidebar-search input.search-menu,
.sidebar-wrapper .sidebar-search .input-group-text,
.sidebar-wrapper .sidebar-menu ul li a,
#show-sidebar,
#close-sidebar {
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}

/*----------------page-wrapper----------------*/

.page-wrapper {
  height: 100vh;
}

.page-wrapper .theme {
  width: 40px;
  height: 40px;
  display: inline-block;
  border-radius: 4px;
  margin: 2px;
}

.page-wrapper .theme.chiller-theme {
  background: #1e2229;
}

/*----------------toggeled sidebar----------------*/

.page-wrapper.toggled .sidebar-wrapper {
  left: 0px;
}

@media screen and (min-width: 768px) {
  .page-wrapper.toggled .page-content {
    padding-left: 300px;
  }
}
/*----------------show sidebar button----------------*/
#show-sidebar {
  position: fixed;
  left: 0;
  top: 50px;
  /*border-radius: 0 4px 4px 0px;*/
  width: 100px;
  transition-delay: 0.3s;

border-radius: 0px;
background-color: black;
color: #ffffff;
margin-left: -40px !important;
padding-left: 0.5%;
padding-top: 0.5%;
padding-bottom: 0.25%;
font-weight: bold;

transform: rotate(-90deg); 
/* Safari */
  -webkit-transform: rotate(-90deg);
/* Firefox */
  -moz-transform: rotate(-90deg);
/* IE */
  -ms-transform: rotate(-90deg);
/* Opera */
  -o-transform: rotate(-90deg);
/* Internet Explorer */
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
}
.page-wrapper.toggled #show-sidebar {
  left: -40px;
}
/*----------------sidebar-wrapper----------------*/

.sidebar-wrapper {
  width: 300px;
  height: 100%;
  max-height: 100%;
  position: fixed;
  top: 0;
  left: -300px;
  z-index: 999;
}

.sidebar-wrapper ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.sidebar-wrapper a {
  text-decoration: none;
}

/*----------------sidebar-content----------------*/

.sidebar-content {
  max-height: calc(100% - 30px);
  height: calc(100% - 30px);
  overflow-y: auto;
  position: relative;
}

.sidebar-content.desktop {
  overflow-y: hidden;
}

/*--------------------sidebar-brand----------------------*/

.sidebar-wrapper .sidebar-brand {
  padding: 10px 20px;
  display: flex;
  align-items: center;
}

.sidebar-wrapper .sidebar-brand > a {
  text-transform: uppercase;
  font-weight: bold;
  flex-grow: 1;
}

.sidebar-wrapper .sidebar-brand #close-sidebar {
  cursor: pointer;
  font-size: 20px;
}
/*--------------------sidebar-header----------------------*/

.sidebar-wrapper .sidebar-header {
  padding: 20px;
  overflow: hidden;
}

.sidebar-wrapper .sidebar-header .user-pic {
  float: left;
  width: 60px;
  padding: 2px;
  border-radius: 12px;
  margin-right: 15px;
  overflow: hidden;
}

.sidebar-wrapper .sidebar-header .user-pic img {
  object-fit: cover;
  height: 100%;
  width: 100%;
}

.sidebar-wrapper .sidebar-header .user-info {
  float: left;
}

.sidebar-wrapper .sidebar-header .user-info > span {
  display: block;
}

.sidebar-wrapper .sidebar-header .user-info .user-role {
  font-size: 12px;
}

.sidebar-wrapper .sidebar-header .user-info .user-status {
  font-size: 11px;
  margin-top: 4px;
}

.sidebar-wrapper .sidebar-header .user-info .user-status i {
  font-size: 8px;
  margin-right: 4px;
  color: #5cb85c;
}

/*-----------------------sidebar-search------------------------*/

.sidebar-wrapper .sidebar-search > div {
  padding: 10px 20px;
}

/*----------------------sidebar-menu-------------------------*/

.sidebar-wrapper .sidebar-menu {
  padding-bottom: 10px;
}

.sidebar-wrapper .sidebar-menu .header-menu span {
  font-weight: bold;
  font-size: 14px;
  padding: 15px 20px 5px 20px;
  display: inline-block;
}

.sidebar-wrapper .sidebar-menu ul li a {
  display: inline-block;
  width: 100%;
  text-decoration: none;
  position: relative;
  padding: 8px 30px 8px 20px;
}

.sidebar-wrapper .sidebar-menu ul li a i {
  margin-right: 10px;
  font-size: 12px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  border-radius: 4px;
  color:#f16724;
}

.sidebar-wrapper .sidebar-menu ul li a:hover > i::before {
  display: inline-block;
  animation: swing ease-in-out 0.5s 1 alternate;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  content: "\f105";
  font-style: normal;
  display: inline-block;
  font-style: normal;
  font-variant: normal;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  background: 0 0;
  position: absolute;
  right: 15px;
  top: 14px;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
  padding: 5px 0;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
  padding-left: 25px;
  font-size: 13px;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
  content: "\f111";
  font-family: "Font Awesome 5 Free";
  font-weight: 400;
  font-style: normal;
  display: inline-block;
  text-align: center;
  text-decoration: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  margin-right: 10px;
  font-size: 8px;
}

.sidebar-wrapper .sidebar-menu ul li a span.label,
.sidebar-wrapper .sidebar-menu ul li a span.badge {
  float: right;
  margin-top: 8px;
  margin-left: 5px;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
  float: right;
  margin-top: 0px;
}

.sidebar-wrapper .sidebar-menu .sidebar-submenu {
  display: none;
}

.sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
  transform: rotate(90deg);
  right: 17px;
}

/*--------------------------side-footer------------------------------*/

.sidebar-footer {
  position: absolute;
  width: 100%;
  bottom: 0;
  display: flex;
}

.sidebar-footer > a {
  flex-grow: 1;
  text-align: center;
  height: 30px;
  line-height: 30px;
  position: relative;
}

.sidebar-footer > a .notification {
  position: absolute;
  top: 0;
}

.badge-sonar {
  display: inline-block;
  background: #980303;
  border-radius: 50%;
  height: 8px;
  width: 8px;
  position: absolute;
  top: 0;
}

.badge-sonar:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  border: 2px solid #980303;
  opacity: 0;
  border-radius: 50%;
  width: 100%;
  height: 100%;
  animation: sonar 1.5s infinite;
}

/*--------------------------page-content-----------------------------*/

.page-wrapper .page-content {
  display: inline-block;
  width: 100%;
  padding-left: 0px;
  padding-top: 20px;
}

.page-wrapper .page-content > div {
  padding: 20px 40px;
}

.page-wrapper .page-content {
  overflow-x: hidden;
}

/*------scroll bar---------------------*/

::-webkit-scrollbar {
  width: 5px;
  height: 7px;
}
::-webkit-scrollbar-button {
  width: 0px;
  height: 0px;
}
::-webkit-scrollbar-thumb {
  background: #525965;
  border: 0px none #ffffff;
  border-radius: 0px;
}
::-webkit-scrollbar-thumb:hover {
  background: #525965;
}
::-webkit-scrollbar-thumb:active {
  background: #525965;
}
::-webkit-scrollbar-track {
  background: transparent;
  border: 0px none #ffffff;
  border-radius: 50px;
}
::-webkit-scrollbar-track:hover {
  background: transparent;
}
::-webkit-scrollbar-track:active {
  background: transparent;
}
::-webkit-scrollbar-corner {
  background: transparent;
}


/*-----------------------------chiller-theme-------------------------------------------------*/

.chiller-theme .sidebar-wrapper {
    background: #000000; /*#31353D; sidemenu back color*/
}

.chiller-theme .sidebar-wrapper .sidebar-header,
.chiller-theme .sidebar-wrapper .sidebar-search,
.chiller-theme .sidebar-wrapper .sidebar-menu {
    border-top: 1px solid #3a3f48;
}

.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
.chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
    border-color: transparent;
    box-shadow: none;
}

.chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
.chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
.chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
.chiller-theme .sidebar-wrapper .sidebar-brand>a,
.chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
.chiller-theme .sidebar-footer>a {
    background: #000000;
    color: #818896;
}

.chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
.chiller-theme .sidebar-wrapper .sidebar-header .user-info,
.chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
.chiller-theme .sidebar-footer>a:hover i {
    color: #b8bfce;
}

.page-wrapper.chiller-theme.toggled #close-sidebar {
    color: #bdbdbd;
}

.page-wrapper.chiller-theme.toggled #close-sidebar:hover {
    color: #ffffff;
}

.chiller-theme .sidebar-wrapper ul li:hover a i,
.chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
    color: #16c7ff;
    text-shadow:0px 0px 10px rgba(22, 199, 255, 0.5);
}

.chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
.chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
    background: #000000;
}

.chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
    color: #6c7b88;
}

.chiller-theme .sidebar-footer {
    background: #3a3f48;
    box-shadow: 0px -1px 5px #282c33;
    border-top: 1px solid #464a52;
}

.chiller-theme .sidebar-footer>a:first-child {
    border-left: none;
}

.chiller-theme .sidebar-footer>a:last-child {
    border-right: none;
}

</style>

<script type="text/javascript">
jQuery(function ($) {

$(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});


   
   
});
</script>