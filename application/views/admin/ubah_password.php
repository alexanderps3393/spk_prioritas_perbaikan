<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-4">
    <h2 class="page-title">Ubah Password</h2>
    <form action="<?php echo base_url('login/password_'.$this->session->userdata('admin_type'));?>" method="post">
      <div class="form-group">
        <input name="user" type="hidden" value="">
      </div>
      <div class="form-group">
        <label>Password Lama</label>
        <input name="lama" type="password" class="form-control" placeholder="Password Lama ..">
      </div>
      <div class="form-group">
        <label>Password Baru</label>
        <input name="baru" type="password" class="form-control" placeholder="Password Baru ..">
      </div>
      <div class="form-group">
        <label>Ulangi Password</label>
        <input name="ulang" type="password" class="form-control" placeholder="Ulangi Password ..">
      </div>
      <div class="form-group">
        <label></label>
        <input type="submit" class="btn btn-info" value="Simpan">
        <input type="reset" class="btn btn-danger" value="reset">
      </div>
    </form>
  </div>
</div>
