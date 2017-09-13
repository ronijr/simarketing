 <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home"></i> Dashboard</span></a></li>
                  <?php if($admin[0]->us_level == 1): ?>
                  <li><a><i class="fa fa-edit"></i> Kelola Data Marketing <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('controldatamarketing/create_marketing');?>">Tambah Data Marketing</a></li>
                      <li><a href="<?php echo base_url('controldatamarketing'); ?>">List Data Marketing</a></li>
                    </ul>
                  </li>
                <?php endif; ?>
                  <li><a><i class="fa fa-desktop"></i>Kelola Data Konsumen <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                         <li><a href="<?php echo base_url('controldatakonsumen/create_konsumen'); ?>">Tambah Data Konsumen</a></li>
                        <li><a href="<?php echo base_url('controldatakonsumen'); ?>">List Data Konsumen</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-archive"></i> Kelola Data Booking <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('controldatabooking/create_booking'); ?>">Tambah Data Booking</a></li>
                        <li><a href="<?php echo base_url('controldatabooking'); ?>">List Data Booking</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i>Kelola Data Kavling<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                          <li><a href="<?php echo base_url('controldatakavling/create_kavling'); ?>">Tambah Data Kavling</a></li>
                        <li><a href="<?php echo base_url('controldatakavling'); ?>">List Data Kavling</a></li>
                    </ul>
                  </li>
                   <li><a href="<?php echo base_url('controllogaktifitas'); ?>"><i class="fa fa-bar-chart-o"></i>Log Aktifitas</a>

                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- /menu footer buttons -->
          </div>
        </div>
