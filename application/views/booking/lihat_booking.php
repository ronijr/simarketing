<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>List Data Booking</h3>
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
                    <h2>Data Booking</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                        </tr>
                      </thead>


                      <tbody>

                        <tr>
                          <td>Donna Snider</td>
                          <td>Customer Support</td>
                          <td>New York</td>
                          <td>27</td>
                          <td>2011/01/25</td>
                          <td>$112,000</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
      </div>
</div>
