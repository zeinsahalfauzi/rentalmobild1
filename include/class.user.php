<?php
include "db_config.php";

class User
{
	protected $db;
	public function __construct()
	{
		$this->db = new DB_con();
		$this->db = $this->db->ret_obj();
	}

	public function edit($id)
	{

		$data = null;

		$query = "SELECT * FROM tb_mobil WHERE id_mobil = '$id'";
		if ($sql = $this->db->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}

	public function update($data)
	{

		$query = "UPDATE tb_mobil SET no_stnk='$data[no_stnk]', merk='$data[merk]', nama_mobil='$data[nama_mobil]', tahun='$data[tahun]',kapasitas='$data[kapasitas]' WHERE id_mobil='$data[id] '";

		if ($sql = $this->db->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	public function insert()
	{

		if (isset($_POST['submit'])) {
			if (isset($_POST['no_stnk']) && isset($_POST['merk']) && isset($_POST['nama_mobil']) && isset($_POST['tahun']) && isset($_POST['kapasitas'])) {
				if (!empty($_POST['no_stnk']) && !empty($_POST['merk']) && !empty($_POST['nama_mobil']) && !empty($_POST['tahun']) && !empty($_POST['kapasitas'])) {

					$no_stnk = $_POST['no_stnk'];
					$merk = $_POST['merk'];
					$tahun = $_POST['tahun'];
					$nama_mobil = $_POST['nama_mobil'];
					$kapasitas = $_POST['kapasitas'];

					$query = "INSERT INTO tb_mobil (no_stnk,merk,nama_mobil,tahun,kapasitas) VALUES ('$no_stnk','$merk','$nama_mobil','$tahun','$kapasitas')";
					if ($sql = $this->db->query($query)) {
						echo "<script>alert('records added successfully');</script>";
						echo "<script>window.location.href = 'data_mobil.php';</script>";
					} else {
						echo "<script>alert('failed');</script>";
						echo "<script>window.location.href = 'create_data.php';</script>";
					}
				} else {
					echo "<script>alert('empty');</script>";
					echo "<script>window.location.href = 'create_data.php';</script>";
				}
			}
		}
	}
	public function tampil_data()
	{
		$data = null;

		$query = "SELECT * FROM tb_mobil";
		if ($sql = $this->db->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function delete($id)
	{

		$query = "DELETE FROM tb_mobil where id_mobil = '$id'";
		if ($sql = $this->db->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	public function check_login($username, $password)
	{
		$password = md5($password);

		$query = "SELECT id_user from tb_user WHERE username='$username' and password='$password'";

		$result = $this->db->query($query) or die($this->db->error);


		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;

		if ($count_row == 1) {
			$_SESSION['login'] = true; // this login var will use for the session thing
			$_SESSION['id'] = $user_data['id_user'];
			return true;
		} else {
			return false;
		}
	}

	public function get_fullname($id)
	{
		$query = "SELECT username FROM tb_user WHERE id_user = $id";

		$result = $this->db->query($query) or die($this->db->error);

		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		echo ucfirst($user_data['username']);
	}
	/*** starting the session ***/
	public function get_session()
	{
		return $_SESSION['login'];
	}

	public function user_logout()
	{
		$_SESSION['login'] = FALSE;
		unset($_SESSION);
		session_destroy();
	}
}
