<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-6">
        <h3 class="text-danger">Input Kerusakan</h3><hr>
                <form method="POST" action="<?php echo base_url('admin/rusak/tambah');?>" id="form_rusak">
                    <div class="form-group">
                        <select class="form-control" name="kode_periode" onchange="this.form.submit()">
                            <option value="" >Pilih Periode</option>
                            <?php foreach($periode as $key => $row): ?>
                            <?php if($this->uri->segment(4)==$row['kode_periode']){
                                echo "<option value=$row[kode_periode] selected='selected'>$row[tanggal]</option>";
                            }else{
                                echo "<option value=$row[kode_periode]>$row[tanggal]</option>";
                            }
                            ?>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Kerusakan</label>
                        <input type="text" name="kode_kerusakan" class="form-control" disabled value="<?php echo $kode_rusak;?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Kerusakan</label>
                        <input type="text" name="nama_kerusakan" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Ruang</label>
                        <input type="text" name="ruang" class="form-control" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <?php echo anchor('admin/rusak','Kembali',array('class'=>'btn btn-default')); ?>
                    </div>
                </form>
        </div>
        <div class="col-lg-5"></div>
    </div>
<script>
    $(document).ready(function() {
        $('#form_rusak').validate({
            rules:{
                kode_periode : {
                    required : true,
                },
                nama_kerusakan : {
                    required : true,
                    maxlength: 50,
                    minlength: 2
                },
                ruang : {
                    required : true,
                    maxlength: 50,
                    minlength: 2
                }
            },messages : {
                kode_periode : {
                    required : ' Periode harus dipilih',
                },
                nama_kerusakan : {
                    required : 'Nama kerusakan harus diisi',
                    maxlength: 'Nama kerusakan maksimal 50 karakter',
                    minlength: 'Nama kerusakan minimal 2 karakter'
                },
                ruang : {
                    required : 'Nama kerusakan harus diisi',
                    maxlength: 'Nama kerusakan maksimal 50 karakter',
                    minlength: 'Nama kerusakan minimal 2 karakter'
                }
            },highlight : function(elm){
                $(elm).closest('.form-group').addClass('has-error');
            },unhighlight:function(elm){
                $(elm).closest('.form-group').removeClass('has-error');
            }
        });
    });
</script>
