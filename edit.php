<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>EDIT DATA</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="text-center">UBAH DATA MOBIL</h1>
        <hr style="height: 1px;color: black;background-color: black;">
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 mx-auto">
        <?php

        include_once 'include/class.user.php';
        $user = new User();
        $id = $_REQUEST['id'];
        $row = $user->edit($id);

        if (isset($_POST['update'])) {
          if (isset($_POST['no_stnk']) && isset($_POST['merk']) && isset($_POST['nama_mobil']) && isset($_POST['tahun']) && isset($_POST['kapasitas'])) {
            if (!empty($_POST['no_stnk']) && !empty($_POST['merk']) && !empty($_POST['nama_mobil']) && !empty($_POST['tahun']) && !empty($_POST['kapasitas'])) {

              $data['id'] = $id;
              $data['no_stnk'] = $_POST['no_stnk'];
              $data['merk'] = $_POST['merk'];
              $data['nama_mobil'] = $_POST['nama_mobil'];
              $data['tahun'] = $_POST['tahun'];
              $data['kapasitas'] = $_POST['kapasitas'];

              $update = $user->update($data);

              if ($update) {
                echo "<script>alert('record update successfully');</script>";
                echo "<script>window.location.href = 'data_mobil.php';</script>";
              } else {
                echo "<script>alert('record update failed');</script>";
                echo "<script>window.location.href = 'data_mobil.php';</script>";
              }
            } else {
              echo "<script>alert('empty');</script>";
              header("Location: edit.php?id=$id");
            }
          }
        }

        ?>
        <form action="" method="post">
          <div class="form-group">
            <label for="">No.Stnk</label>
            <input type="text" name="no_stnk" value="<?php echo $row['no_stnk']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Merk Mobil</label>
            <input type="text" name="merk" value="<?php echo $row['merk']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Nama Mobil </label>
            <input type="text" name="nama_mobil" value="<?php echo $row['nama_mobil']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Tahun Mobil </label>
            <input type="text" name="tahun" value="<?php echo $row['tahun']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Kapasitas Penumpang </label>
            <input type="number" name="kapasitas" value="<?php echo $row['kapasitas']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Ubah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>