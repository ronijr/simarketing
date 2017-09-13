<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Ubah Data Konsumen</h3>
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

          <form class="form-horizontal form-label-left" novalidate method="POST" action="<?php echo base_url('controldatakonsumen/validation_update/'.$get_konsumen[0]->konsumen_id); ?>">
            <span class="section">Personal Info</span>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Konsumen <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama" placeholder="Nama"  value="<?php echo $get_konsumen[0]->nama_konsumen; ?>" required="required" type="text">
                <span class="text-danger"><?php echo form_error('nama'); ?></span>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Jenis Kelamin <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select required="required" name="jk" class="form-control col-md-7 col-xs-12">
                  <?php 
                      $selected = ($get_konsumen[0]->jenis_kelamin == "L") ? 'selected' : '';
                      $selected_p = ($get_konsumen[0]->jenis_kelamin == "P") ? 'selected' : '';
                  ?>
                  <option value="">None</option>
                  <option value="L" <?php echo $selected; ?>>Laki - laki</option>
                  <option value="P" <?php echo $selected_p; ?>>Perempuan</option>
                </select>
                   <span class="text-danger"><?php echo form_error('jk'); ?></span>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Alamat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="textarea" required="required" name="alamat" class="form-control col-md-7 col-xs-12"><?php echo $get_konsumen[0]->alamat ?></textarea>
                   <span class="text-danger"><?php echo form_error('alamat'); ?></span>
              </div>
            </div>
              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Pekerjaan<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="textarea" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="pekerjaan" placeholder="Pekerjaan"  value="<?php echo $get_konsumen[0]->pekerjaan; ?>" required="required" type="text">
                <span class="text-danger"><?php echo form_error('pekerjaan'); ?></span>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telepon <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="tel" id="telephone" name="phone" value="<?php echo $get_konsumen[0]->no_tlp; ?>" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                 <span class="text-danger"><?php echo form_error('phone'); ?></span>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <a href="<?php echo base_url('controldatakonsumen'); ?>" class="btn btn-primary">Cancel</a>
                <button id="send" type="submit" class="btn btn-success">Edit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>