<div class="row">
  <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h3 class="text-danger">Daftar Admin Sistem</h3><hr>
            <?php echo anchor('ka_instalasi/user/form_tambah','Tambah Admin',array('class'=>'btn btn-primary')); ?>
            <br><br>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = 0; foreach($user as $val){?>
                <tr>
                    <td><?=++$no?></td>
                    <td><?=$val['NIP']?></td>
                    <td><?=$val['jabatan']?></td>
                    <td><?=$val['username']?></td>
                    <td><?=$val['type']?></td>
                    <td>
                        <?php echo anchor('ka_instalasi/user/form_ubah/'.$val['id'],'Ubah',array('class'=>'btn btn-warning')); ?>
                        <a class="btn btn-danger delete_lead" href="<?php echo base_url('ka_instalasi/user/hapus/'.$val['id']);?>"> Hapus </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
    </div>
    <div class="col-lg-1"></div>
 </div>



<!-- daftar periode -->
