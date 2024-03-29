   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
           <div class="sidebar-brand-icon ">
               <img src="<?= base_url('assets/') ?>img/logo_sttb.png" height="40px"></img>
           </div>
           <div class="sidebar-brand-text mx-2">Portal STTB</div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Query Menu -->
       <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                    FROM `user_menu` JOIN `user_access_user`
                    ON `user_menu`.`id` = `user_access_user`.`menu_id`
                    WHERE `user_access_user`. `role_id` = $role_id
                    ORDER BY `user_access_user`.`menu_id` ASC

                    
                    
                    ";


        $menu = $this->db->query($queryMenu)->result_array();

        ?>

       <?php foreach ($menu as $m) :    ?>
           <div class="sidebar-heading">
               <?= $m['menu']; ?>
           </div>


           <!-- Sub Menu -->
           <?php

            $menuId = $m['id'];
            $querySubMenu = "SELECT * 
                    FROM `user_sub_menu`                    
                    WHERE`menu_id` = $menuId
                    AND `is_active` = 1
                 

                    
                    
                    ";

            $subMenu = $this->db->query(($querySubMenu))->result_array();



            ?>

           <?php foreach ($subMenu as $sm) : ?>

               <li class="nav-item">
                   <a class="nav-link" href="<? +base_url($sm['url']) ?>">
                       <i class="<?= $sm['icon'] ?>"></i>
                       <span><?= $sm['title'] ?></span></a>
               </li>

           <?php endforeach  ?>
           <!-- Divider -->
           <hr class="sidebar-divider">




       <?php endforeach  ?>









       <!-- Nav Item - Charts -->
       <li class="nav-item">
           <a class="nav-link" href="charts.html">
               <i class="fas fa-fw fa-user"></i>
               <span>User</span></a>
       </li>

       <!-- Nav Item - Tables -->
       <li class="nav-item">
           <a class="nav-link" href="tables.html">
               <i class="fas fa-fw fa-table"></i>
               <span>Tables</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <li class="nav-item">
           <a class="nav-link" href="<?= base_url('auth/logout') ?>">
               <i class="fas fa-fw fa-sign-out-alt"></i>
               <span>Logout</span></a>
       </li>

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

   </ul>
   <!-- End of Sidebar -->