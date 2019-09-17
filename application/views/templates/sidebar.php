 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img width="50" height="40" src="<?php echo base_url().'assets/images/5.png'?>">
         <!--  <i class="fas fa-bell"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">PT Daese Garmin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

        <!-- querymenu --> 
        <?php
        $role_id = $this->session->userdata('role_id');
          $queryMenu = "SELECT `user_menu1`.`id`, `menu`
                          FROM `user_menu1` JOIN `user_access_menu` 
                            ON `user_menu1`.`id` = `user_access_menu`.`menu_id`
                          WHERE `user_access_menu`.`role_id` = $role_id
                          ORDER BY `user_access_menu`.`menu_id` ASC
                        ";

            $menu = $this->db->query($queryMenu)->result_array();

        ?>

        <!-- looping menu -->
        <?php foreach ($menu as $m): ?>
          <div class="sidebar-heading">
            <?php echo $m['menu']; ?>
          </div>

          <!-- submenu sesuai menu -->
          <?php
          $menu_id = $m['id'];
            $querySubMenu = "SELECT *
                              FROM `user_sub_menu` JOIN `user_menu1` 
                                ON `user_sub_menu`.`menu_id` = `user_menu1`.`id`
                              WHERE `user_sub_menu`.`menu_id` = $menu_id
                              AND `user_sub_menu`.`is_active` = 1
                            ";

            $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>



            <?php foreach ($subMenu as $sm): ?>
              <?php if ($title == $sm['title']): ?>
                <li class="nav-item active">
                  <?php else : ?>
                    <li class="nav-item">
                  <?php endif; ?>
                  <a class="nav-link pb-0" href="<?php echo base_url($sm['url']); ?>">
                    <i class="<?php echo $sm['icon']; ?>"></i>
                    <span><?php echo $sm['title']; ?></span>
                  </a>
                </li>
            <?php endforeach; ?>
            <!-- Divider -->
            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>



            

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>


    <!-- End of Sidebar -->


