<?php

/******************************************
TP4PBO2021 | Sarah Hanifah | C1
 ******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Stok.class.php");

// Membuat objek dari kelas Stok
$ostok = new Stok($db_host, $db_user, $db_password, $db_name);
$ostok->open();

if (isset($_POST['add'])) {
	$ostok->insert($_POST);
	header("Location:index.php");
}

if (isset($_POST['update'])) {
	$ostok->update($_POST);
	header("Location:index.php");
}

if (!empty($_GET['id_hapus'])) {
	$id = $_GET['id_hapus'];
	$ostok->delete($id);
	header("Location:index.php");
}



if (!empty($_GET['id_kurang'])) {
	$id = $_GET['id_kurang'];
	$stok = $ostok->getStokById($id);
	while ($row = $stok->fetch_assoc()) {
		$ostok->stok_minus($id, $row['stok']);
	}
	header("Location:index.php");
}

if (!empty($_GET['id_tambah'])) {
	$id = $_GET['id_tambah'];
	$stok = $ostok->getStokById($id);
	while ($row = $stok->fetch_assoc()) {
		$ostok->stok_plus($id, $row['stok']);
	}
	header("Location:index.php");
}

if (!empty($_GET['id_edit'])) {
	$id_edit = $_GET['id_edit'];
	$ostok->getAllDataById($id_edit);
	$data = null;
	while (list($id, $kategori_hewan, $merk, $berat, $harga, $stok) = $ostok->getResult()) {
		$data .= "<div class='form-row'>
          <div class='form-group col'>
            <label for='tkategori_hewan'>Kategori Hewan</label>
            <select id='inputState' name='tkategori_hewan' required class='form-control'>
              <option>Kucing</option>
              <option>Anjing</option>
              <option>Ikan</option>
              <option>Burung</option>
            </select>
          </div>
        </div>

        <div class='form-row'>
          <div class='form-group col'>
            <label for='tmerk'>Merk</label>
            <input class='form-control' type='text' name='tmerk' value = '" . $merk . " ' required />
          </div>
        </div>

        <div class='form-row'>
          <div class='form-group col'>
            <label for='tberat'>Berat</label>
            <input class='form-control' type='text' name='tberat' value='" . $berat . "'required />
          </div>
        </div>

        <div class='form-row'>
          <div class='form-group col'>
            <label for='tstok'>Stok</label>
            <input class='form-control' type='text' name='tstok' value='" . $stok . "'required />
          </div>
        </div>

        <div class='form-row'>
          <div class='form-group col'>
            <label for='tharga'>Harga Satuan</label>
            <input class='form-control' type='text' name='tharga' value='" . $harga . "'required />
          </div>
        </div>
        <button type='submit' name='update' value='" . $id . "' class='btn btn-primary'>Update</button>";
	}
	// Membaca template skin2.html
	$tpl = new Template("templates/skin2.html");

	// Mengganti kode Data_Tabel dengan data yang sudah diproses
	$tpl->replace("DATA_TABEL", $data);

	// Menampilkan ke layar
	$tpl->write();
} else {
	// Memanggil method getStok di kelas Stok

	$ostok->getStok();


	// Proses mengisi tabel dengan data
	$data = null;
	$no = 1;

	while (list($id, $tkategori_hewan, $tmerk, $tberat, $tharga, $tstok) = $ostok->getResult()) {
		$data .= "<tr>
	<td>" . $no . "</td>
	<td>" . $tkategori_hewan . "</td>
	<td>" . $tmerk . "</td>
	<td>" . $tberat . "</td>
	<td>" . $tharga . "</td>
	<td>
		<a class='btn btn-danger btn-sm' href='index.php?id_kurang=" . $id . "' style='color: white;'>-</a> " . $tstok . " <a class='btn btn-success btn-sm' href='index.php?id_tambah=" . $id . "' style='color: white;'>+</a>
	</td>
	<td>
		<a class='btn btn-warning' href='index.php?id_edit=" . $id . "' style='color: white;'>Edit</a>
		<a class='btn btn-danger' href='index.php?id_hapus=" . $id . "' style='color: white;'>Hapus</a>
	</td>
	</tr>";
		$no++;
	}

	if ($no == 1) {
		$data .= "<tr style='text-align: center;'><td colspan=7>Tidak ada data.</td></tr>";
	}

	// Menutup koneksi database
	$ostok->close();

	// Membaca template skin.html
	$tpl = new Template("templates/skin.html");

	// Mengganti kode Data_Tabel dengan data yang sudah diproses
	$tpl->replace("DATA_TABEL", $data);

	// Menampilkan ke layar
	$tpl->write();
}
