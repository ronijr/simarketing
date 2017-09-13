<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Tambah Data Booking</h3>
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
         <!-- end error handling -->
        <div class="x_content">

          <form class="form-horizontal form-label-left" novalidate method="POST" action="<?php echo base_url('controldatabooking/validation_insert'); ?>">

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nama Konsumen <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="konsumen" equired="required" name="jk" class="form-control col-md-7 col-xs-12 js-example-basic-single">
                  <option value="">Nama Konsumen</option>
                  <?php


                      foreach ($get_konsumen as $row) {
                        echo "<option value=".$row->konsumen_id.">".$row->nama_konsumen."</option>";
                      }
                  ?>


                </select>
                   <span class="text-danger"><?php echo form_error('jk'); ?></span>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Alamat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="textarea" required="required" name="alamat" class="form-control col-md-7 col-xs-12 alamat"><?php echo set_value('alamat'); ?></textarea>
                   <span class="text-danger"><?php echo form_error('alamat'); ?></span>
              </div>
            </div>
              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Pekerjaan<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="textarea" class="form-control col-md-7 col-xs-12 pekerjaan" data-validate-length-range="6"  name="pekerjaan" placeholder="Pekerjaan"  value="<?php echo set_value('pekerjaan'); ?>" required="required" type="text">
                <span class="text-danger"><?php echo form_error('pekerjaan'); ?></span>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telepon <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="tel" id="telephone" name="phone" value="<?php echo set_value('phone'); ?>" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12 telepon">
                 <span class="text-danger"><?php echo form_error('phone'); ?></span>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Block <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select required="required" name="jk" class="form-control col-md-7 col-xs-12 js-example-basic-single">
                  <option value="">None</option>
                  <?php


                      foreach ($get_kavling as $row) {
                        echo "<option value=".$row->kavling_id.">".$row->block." - ".$row->no_rumah."</option>";
                      }
                  ?>


                </select>
                   <span class="text-danger"><?php echo form_error('block'); ?></span>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="reset" class="btn btn-primary">Cancel</button>
                <button id="send" type="submit" class="btn btn-success">Tambah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
