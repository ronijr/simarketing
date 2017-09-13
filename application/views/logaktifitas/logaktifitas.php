<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>List Data Marketing</h3>
              </div>

              
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <?php if ($this->session->flashdata('success') == TRUE): ?>
                      <div class="alert alert-success"><button class="close" data-dismiss="alert"><span aria-hidden="true">x</span></button>
                         <?php echo $this->session->flashdata('success'); ?></div>
                   <?php endif; ?>

                   <?php if ($this->session->flashdata('warning') == TRUE): ?>
                      <div class="alert alert-warning"><button class="close" data-dismiss="alert"><span aria-hidden="true">x</span></button>
                         <?php echo $this->session->flashdata('warning'); ?></div>
                   <?php endif; ?>

                   <?php if ($this->session->flashdata('danger') == TRUE): ?>
                      <div class="alert alert-danger"><button class="close" data-dismiss="alert"><span aria-hidden="true">x</span></button>
                         <?php echo $this->session->flashdata('danger'); ?></div>
                   <?php endif; ?>
                  <div class="x_title">
                    <h2>Data Marketing</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Aktifitas</th>
                          <th>Tanggal</th>
                          <th>IP Address</th>
                          <th>Device</th>
                          <th>Table Affected</th>
                          <th>Admin</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                          
                           foreach ($url_datatable_log['data'] as $row) {

                             echo "
                              <tr>
                                <td>".$row['aktifitas']."</td>
                                <td>".$row['tanggal']."</td>
                                <td>".$row['ip']."</td>
                                <td>".$row['device']."</td>
                                <td>".$row['table']."</td>
                                <td>".$row['admin']."</td>
                              </tr>
                             "; 
                           }
                        ?>
                      
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
      </div>
</div>