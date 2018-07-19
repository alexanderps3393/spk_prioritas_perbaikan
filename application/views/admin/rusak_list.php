<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
    <?php if($this->session->flashdata('pesan')):?>
            <div class="alert alert-success alert-dismissible">
                <a href="<?php echo site_url('admin/rusak');?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('pesan');?></strong>
            </div>
            <?php endif;?>
            <h3 class="text-danger">Data Kerusakan</h3><hr>
            <form class="form-inline">
                <div class="form-group">
                    <select class="form-control" name="kode_periode" onchange="this.form.submit()">
                        <option value="" >Pilih Periode</option>
                        <?php foreach($periode as $key => $row): ?>
                        <?php if($kode_periode==$row['kode_periode']){
                        echo "<option value=$row[kode_periode] selected='selected'>$row[tanggal]</option>";
                        }else{
                        echo "<option value=$row[kode_periode]>$row[tanggal]</option>";
                        }
                        ?>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <?php echo anchor('admin/rusak/form_tambah/'.$kode_periode,'Tambah',array('class'=>'btn btn-primary')); ?>
                </div>
            </form><br>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Kode Kerusakan</th>
                    <th>Kerusakan</th>
                    <th>Ruang</th>
                    <th>Opsi Aksi</th>
                </tr>
                <?php $no = 0; foreach($rusak_periode as $val){?>
                <tr>
                    <td><?=++$no?></td>
                    <td><?=$val['kode_kerusakan']?></td>
                    <td><?=$val['nama_kerusakan']?></td>
                    <td><?=$val['ruangan']?></td>
                    <td>
                      <?php echo anchor('admin/rusak/form_ubah/'.$val['kode_kerusakan'].'/'.$kode_periode,'Ubah',array('class'=>'btn btn-warning')); ?>
                      <a class="btn btn-danger delete_lead" href="<?php echo base_url('rusak/hapus/'.$val['kode_kerusakan'].'/'.$kode_periode);?>"> Hapus </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="col-lg-1"></div>
    </div>


<!-- daftar rusak -->
