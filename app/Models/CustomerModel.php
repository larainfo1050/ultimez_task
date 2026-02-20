<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'tbl_customers';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['first_name', 'last_name', 'city', 'country', 'mobile_number', 'date_n_time'];
}
