<?php 

class Cart{
	function tambahProduk($nama_produk, $jumlah_produk){
		$cek_produk = $sql->query("SELECT * FROM tb_cart WHERE nama_produk '$nama_produk' ");
		if($sql < 1){
			$masukan_produk_baru = $sql->query("INSERT INTO tb_cart nama_produk, jumlah_produk VALUES('$nama_produk',$jumlah_produk)");
		}else{
			$ambil_jumlah_produk_lama = $cek_produk['jumlah_produk'];
			$jumlah_produk_baru = $ambil_jumlah_produk_lama + $jumlah_produk;
			$update_produk_lama = $sql->query("UPDATE tb_cart SET jumlah_produk = $jumlah_produk_baru WHERE nama_produk = '$nama_produk' ");
		}
		return "Berhasil Tambah Produk";
	}

	function hapusProduk($nama_produk){
		$sql->query("DELETE FROM tb_cart WHERE nama_produk  = '$nama_produk'");
		return "Berhasil Hapus Produk";
	}

	function tampilkanCart(){
		$data_cart = $sql->query("SELECT nama_produk, sum(jumlah_produk) as jumlah_produk FROM tb_cart");
		while($data_cart){
			echo "$data_cart[nama_produk]( $data_cart[jumlah_produk] )<br>";
		}
	}
}


?>