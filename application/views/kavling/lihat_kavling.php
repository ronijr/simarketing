<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>List Data Kavling</h3>
              </div>

              
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Kavling</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Action</th>
                          <th>Block</th>
                          <th>No Rumah</th>
                          <th>Tipe</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $no=1;
                          foreach ($result as $row) {
                            echo "
                               <tr>
                                <td>".$no."</td>
                                <td>
                                    <a href=".base_url('controldatakavling/delete_kavling/'.$row->kavling_id)." title='Hapus' onclick='return ((confirm(\"Yakin hapus data studio ".$row->block." ?\"))) ? true : false;' class='btn btn-xs btn-default'><i class='fa fa-remove'></i></a>
                                <a href=".base_url('controldatakavling/update_kavling/'.$row->kavling_id)." title='Edit' class='btn btn-xs btn-default'><i class='fa fa-edit'></i></a>
                                </td>
                                <td>".$row->block."</td>
                                <td>".$row->no_rumah."</td>
                                <td>".$row->tipe."</td>
                                <td>".$row->keterangan."</td>
                              </tr>
                            ";
                          }
                          $no++;
                        ?>
                       
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
      </div>
</div>