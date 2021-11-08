        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <?php

                    // get session role id from user login
                    $role_id = $this->session->userdata('role_id');
                    // prepare query for menu
                    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                                      FROM `user_menu` 
                                      JOIN `user_access_menu` ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                     WHERE `user_access_menu`.`role_id` = $role_id
                                     ORDER BY `user_access_menu`.`menu_id`
                                     ";
                    // execute query menu
                    $menu = $this->db->query($queryMenu)->result_array();


                    ?>

                    <!-- Looping result query menu -->
                    <?php foreach ($menu as $m) : ?>
                        <li class="nav-label first"><?= $m['menu']; ?></li>

                        <?php

                        // get menu id from looping result query menu 
                        $menuId = $m['id'];
                        // prepare query for sub menu
                        $querySubMenu = "SELECT *
                                              FROM `user_sub_menu` 
                                              JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                             WHERE `user_sub_menu`.`menu_id` = $menuId
                                             AND `user_sub_menu`.`is_active` = 1
                                             ";
                        // execute query sub menu
                        $subMenu = $this->db->query($querySubMenu)->result_array();

                        ?>

                        <!-- looping result query sub menu -->
                        <?php foreach ($subMenu as $sm) : ?>
                            <?php if ($sm['sub_menu'] == 'Daftar Kamar') : ?>
                                <li>
                                    <a href="<?= base_url($sm['url']) . '/' . rusunId(); ?>">
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span class="nav-text"><?= $sm['sub_menu']; ?></span>
                                    </a>
                                </li>
                            <?php elseif ($sm['sub_menu'] == 'Daftar Penghuni') : ?>
                                <li>
                                    <a href="<?= base_url($sm['url']) . '/' . rusunId(); ?>">
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span class="nav-text"><?= $sm['sub_menu']; ?></span>
                                    </a>
                                </li>
                            <?php elseif ($sm['sub_menu'] == 'Tagihan') : ?>
                                <li>
                                    <a href="<?= base_url($sm['url']) . '/' . rusunId() . '/' . date('m') . '/' . date('Y'); ?>">
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span class="nav-text"><?= $sm['sub_menu']; ?></span>
                                    </a>
                                </li>
                            <?php elseif ($sm['sub_menu'] == 'Pendapatan') : ?>
                                <li>
                                    <a href="<?= base_url($sm['url']) . '/' . rusunId() . '/' . date('m') . '/' . date('Y'); ?>">
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span class="nav-text"><?= $sm['sub_menu']; ?></span>
                                    </a>
                                </li>
                            <?php elseif ($sm['sub_menu'] == 'Laporan') : ?>
                                <li>
                                    <a href="<?= base_url($sm['url']) . '/' . rusunId() . '/' . date('Y'); ?>">
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span class="nav-text"><?= $sm['sub_menu']; ?></span>
                                    </a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="<?= base_url($sm['url']); ?>">
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span class="nav-text"><?= $sm['sub_menu']; ?></span>
                                    </a>
                                </li>
                            <?php endif ?>

                        <?php endforeach; ?>

                    <?php endforeach; ?>


                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->