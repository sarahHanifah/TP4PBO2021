<?php

/******************************************
TP4PBO2021 | Sarah Hanifah | C1
 ******************************************/

class Stok extends DB
{

	// Mengambil data
	function getStok()
	{
		// Query mysql select data ke stok_pakan
		$query = "SELECT * FROM stok_pakan";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function getStokById($id)
	{
		// Query mysql select data ke stok_pakan
		$query = "SELECT stok FROM stok_pakan WHERE id='$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function getAllDataById($id)
	{
		// Query mysql select data ke stok_pakan
		$query = "SELECT * FROM stok_pakan WHERE id='$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function insert($data)
	{
		$tkategori_hewan = $data['tkategori_hewan'];
		$tmerk = $data['tmerk'];
		$tberat = $data['tberat'];
		$tharga = $data['tharga'];
		$tstok = $data['tstok'];
		$query = "INSERT INTO stok_pakan (kategori_hewan, merk, berat, harga, stok) VALUES ('$tkategori_hewan', '$tmerk', '$tberat', '$tharga', '$tstok')";

		return $this->execute($query);
	}



	function update($data)
	{
		$tkategori_hewan = $data['tkategori_hewan'];
		$tmerk = $data['tmerk'];
		$tberat = $data['tberat'];
		$tharga = $data['tharga'];
		$tstok = $data['tstok'];
		$id = $data['update'];
		$query = "UPDATE stok_pakan SET kategori_hewan = '$tkategori_hewan', merk = '$tmerk', berat = '$tberat', harga = '$tharga', stok = '$tstok' where id = '$id'";

		return $this->execute($query);
	}

	function delete($id)
	{

		$query = "DELETE from stok_pakan where id='$id'";
		return $this->execute($query);
	}

	function stok_minus($id, $stok)
	{
		$stok = intval($stok) - 1;
		$query = "UPDATE stok_pakan SET stok='$stok' where id ='$id'";
		return $this->execute($query);
	}

	function stok_plus($id, $stok)
	{
		$stok = intval($stok) + 1;
		$query = "UPDATE stok_pakan SET stok='$stok' where id ='$id'";
		return $this->execute($query);
	}
}
