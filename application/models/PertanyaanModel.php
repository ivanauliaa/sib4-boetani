<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PertanyaanModel extends CI_Model
{
    protected $table = 'pertanyaan';
    protected $primaryKey = 'id_pertanyaan';

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function updateWaktu($id_pertanyaan) {
        return $this->query('UPDATE pertanyaan SET updated = NOW() WHERE id = ?', [$id_pertanyaan]);
    }

    public function listAll() {
        return $this->query('SELECT id_pertanyaan, judul, id, updated FROM pertanyaan ORDER BY updated DESC')->getResult();
    }
}