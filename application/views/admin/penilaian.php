<form method="POST" action="<?php echo site_url("admin/nilai/insert") ?>">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <h3 class="text-danger">Data Penilaian</h3><hr>
            <div class="row">
                <div class="col-md-3">
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
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-6">
                    <button type="submit" class="btn btn-sm btn-block btn-primary">SIMPAN</button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Kode Kerusakan</th>
                            <th>Nama Kerusakan</th>
                            <?php
                            foreach ($kriteria as $kt) {
                                echo '<th>' . $kt['nama_kriteria'] . '</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($kerusakan as $k) {
                            echo '<tr>';
                            echo '<td>' . $k['kode_kerusakan'] . '</td>';
                            echo '<td>' . $k['nama_kerusakan'] . '</td>';
                            foreach ($kriteria as $kt) {
                                echo '<td>';
                                echo '<input type="hidden" name="kode_kerusakan[]" value="' . $k['kode_kerusakan'] . '"/>';
                                echo '<input type="hidden" name="kode_kriteria[]" value="' . $kt['kode_kriteria'] . '"/>';
                                echo '<select name="kode_indikator[]" required>';
                                echo '<option value="" selected>- Pilih ' . $kt['nama_kriteria'] . ' -</option>';
                                foreach ($kt['indikator'] as $i) {
                                    echo '<option value="' . $i['kode_indikator'] . '">' . $i['nama_indikator'] . '</option>';
                                }
                                echo '</select>';
                                echo '</td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-1">
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        //jika select kode_periode dipilih
        $('select[name="kode_periode"]').on('change', function () {
            if ($(this).val().length > 0) {
                window.location = '<?php echo site_url("admin/nilai") ?>?kode_periode=' + $(this).val();
            }
            else{
              window.location = '<?php echo site_url("admin/nilai") ?>?kode_periode=';
            }
        });
    });
</script>
