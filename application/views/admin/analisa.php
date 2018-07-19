<div class="row">
  <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h3 class="text-danger">Hitung Analisa</h3><hr>
        <form class="form-inline">
          <div class="form-group">
              <select class="form-control" name="kode_periode">
                <option value="" >Pilih Periode</option>
                  <?php foreach ($periode as $key => $row): ?>
                    <?php
                      if ($kode_periode == $row['kode_periode']) {
                        echo "<option value=$row[kode_periode] selected='selected'>$row[tanggal]</option>";
                      } else {
                          echo "<option value=$row[kode_periode]>$row[tanggal]</option>";
                      }
                    ?>
                  <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-sm btn-primary">Hitung Analisa</button>
            </div>
        </form><br>
        <h4>Data Prioritas Perbaikan</h4><hr>
        <div class="table-responsive">
          <?php
            if (!empty($kode_periode)) {
              if (count($input) > 0) {
                $this->algoritma->setData($input);
                $data = $this->algoritma->normalisasi();
                echo '<h4 class="text-info">Normalisasi</h4>';
                echo ' <table class="table table-bordered table-hover table-striped">';
                echo '<thead>';
                echo '<th>Nama Kerusakan</th>';
                //mencetak nama kriteria
                foreach ($data as $value) {
                  echo '<th>' . $value['nama_kriteria'] . '</th>';
                }
                echo '</thead>';
                echo '<tbody>';
                foreach ($data[0]['data'] as $value) {
                  echo '<tr>';
                  echo '<td>' . $value['nama_kerusakan'] . '</td>';
                  foreach ($data as $val) {
                    foreach ($val['data'] as $v) {
                      if ($v['kode_kerusakan'] == $value['kode_kerusakan']) {
                        echo '<td>' . round($v['nilai'], 3) . '</td>';
                      }
                    }
                  }
                  echo '<tr>';
                }
                echo '</tbody>';
                echo '</table>';

                $data = $this->algoritma->preferensi();
                echo '<h4 class="text-info">Normalisasi Terbobot</h4>';
                echo ' <table class="table table-bordered table-hover table-striped">';
                echo '<thead>';
                echo '<th>Nama Kerusakan</th>';
                //mencetak nama kriteria
                foreach ($data as $value) {
                  echo '<th>' . $value['nama_kriteria'] . '</th>';
                }
                echo '<th>SUM</th>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($data[0]['data'] as $value) {
                  echo '<tr>';
                  echo '<td>' . $value['nama_kerusakan'] . '</td>';
                  $sum = 0;
                  foreach ($data as $val) {
                    foreach ($val['data'] as $v) {
                      if ($v['kode_kerusakan'] == $value['kode_kerusakan']) {
                        echo '<td>' . round($v['nilai'], 3) . '</td>';
                        $sum = $sum + $v['nilai'];
                      }
                    }
                  }
                  echo '<td>' . round($sum, 3) . '</td>';
                  echo '<tr>';
                }
                echo '</tbody>';
                echo '</table>';

                //$dt = $this->algoritma->rangking();
                echo '<table class="table table-bordered table-hover table-striped">';
                echo '<thead>';
                echo '<th>Nama Kerusakan</th>';
                echo '<th>Total Nilai</th>';
                echo '<th>Rangking</th>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($data[0]['data'] as $value) {
                  echo '<tr>';
                  echo '<td>' . $value['nama_kerusakan'] . '</td>';
                  $sum = 0;
                  foreach ($data as $val) {
                    foreach ($val['data'] as $v) {
                      if ($v['kode_kerusakan'] == $value['kode_kerusakan']) {
                        $sum = $sum + $v['nilai'];

                        $query ="INSERT INTO tb_histori VALUES('',$v[kode_kerusakan],$sum,'')";
                        $this->db->query($query);

                      }
                    }
                  }
                  echo '<td>' . round($sum, 3) . '</td>';
                 

                   

                }

               

                echo '<tr>';
                echo '</tbody>';
                echo '</table>';
              } else {
                if ($this->session->flashdata('error_message')):
                ?>
                  <div class="alert alert-success alert-dismissible">
                    <a href="<?php echo site_url('indikator'); ?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('pesan'); ?></strong>
                  </div>
                <?php
                endif;
              }
            } else {
                echo '<div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Pilih periode analisa</strong>
            </div>';
            }
            ?>
        </div>
        <div class="form-group">
            <a class="btn btn-primary" href="<?php echo base_url('admin/analisa/cetak/');?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
