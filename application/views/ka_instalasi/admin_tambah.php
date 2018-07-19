<div class="row">
  <div class="col-lg-1"></div>
    <div class="col-lg-6">
      <h3 class="text-danger">Input Admin</h3><hr>
        <form method="POST" action="<?php echo base_url('ka_instalasi/user/tambah');?>" id="form_input">
          <input type="hidden" name="id"/>
          <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control">
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control" name="jabatan">
              <option value="" >Pilih Jabatan</option>
              <option value="Staff">Staff</option>
              <option value="Koordinator">Koordinator</option>
            </select>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
            <?php echo anchor('ka_instalasi/user','Kembali',array('class'=>'btn btn-default')); ?>
          </div>
        </form>
      </div>
    <div class="col-lg-5"></div>
  </div>
<script>
    $(document).ready(function() {
        $('#form_input_periode').validate({
            rules:{
                tanggal: {
                    required: true
                }
            },messages:{
                tanggal:{
                    required:'tanggal harus diisi'
                }
            },highlight:function(elm){
                $(elm).closest('.form-group').addClass('has-error');
            },unhighlight:function(elm){
                $(elm).closest('.form-group').removeClass('has-error');
            }
        });
    });
</script>

<!-- form tambah periode  -->
