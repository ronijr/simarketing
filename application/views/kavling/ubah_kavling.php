<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Tambah Data Kavling</h3>
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

          <form class="form-horizontal form-label-left" novalidate method="POST" action="<?php echo base_url('controldatakavling/validation_update/'.$get_kavling[0]->kavling_id); ?>">

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Block<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="textarea" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="block" placeholder="Block"  value="<?php echo $get_kavling[0]->block; ?>" required="required" type="text">
                <span class="text-danger"><?php echo form_error('block'); ?></span>
              </div>
            </div>
             <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No Rumah<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="textarea" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="no_rumah" placeholder="No Rumah"  value="<?php echo $get_kavling[0]->no_rumah; ?>" required="required" type="text">
                <span class="text-danger"><?php echo form_error('no_rumah'); ?></span>
              </div>
            </div>
            
              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipe<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="textarea" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="tipe" placeholder="Tipe"  value="<?php echo $get_kavling[0]->tipe; ?>" required="required" type="text">
                <span class="text-danger"><?php echo form_error('tipe'); ?></span>
              </div>
            </div>
          <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Keterangan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="textarea" required="required" name="keterangan" class="form-control col-md-7 col-xs-12"><?php echo $get_kavling[0]->keterangan; ?></textarea>
                   <span class="text-danger"><?php echo form_error('keterangan'); ?></span>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <a href="<?php echo base_url('controldatakavling'); ?>" class="btn btn-primary">Cancel</a>
                <button id="send" type="submit" class="btn btn-success">Edit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>