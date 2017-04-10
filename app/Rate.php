<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model {

	protected $table = 'rates';
	protected $fillable = ['rate_name', 'early_bird_rate', 'rate', 'walkin_rate', 'currency' ];

}
