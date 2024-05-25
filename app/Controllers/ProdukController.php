<?php

namespace App\Controllers;

use App\Models\MProduk;

class ProdukController extends RestfulController
{
    public function list()
    {
        $model = new MProduk;
        $produk = $model->findAll();
        return $this->responseHasil(200, true, $produk);
    }

    public function create()
    {
        $data = [
            'kode_produk' => $this->request->getJsonVar('kode_produk'),
            'nama_produk' => $this->request->getJsonVar('nama_produk'),
            'harga' => $this->request->getJsonVar('harga')
        ];

        $model = new MProduk();
        $model->insert($data);

        $produk = $model->find($model->getInsertID());
        return $this->responseHasil(200, true, $produk);
    }

    public function detail($id)
    {
        $model = new MProduk();
        $produk = $model->find($id);
        return $this->responseHasil(200, true, $produk);
    }

    public function ubah($id)
    {

        $data = [
            'kode_produk' => $this->request->getJsonVar('kode_produk'),
            'nama_produk' => $this->request->getJsonVar('nama_produk'),
            'harga' => $this->request->getJsonVar('harga')
        ];

        $model = new MProduk();
        $model->update($id, $data);
        $produk = $model->find($id);

        return $this->responseHasil(200, true, $produk);
    }

    public function hapus($id)
    {
        $model = new MProduk();
        $produk = $model->delete($id);

        return $this->responseHasil(200, true, $produk);
    }
}
