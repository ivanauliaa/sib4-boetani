<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BalasanModel extends CI_Model
{
    protected $table = 'balasan';
    protected $primaryKey = 'id_balasan';

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_jawaban', 'id', 'isi'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}