<?php
/**
 * Created by PhpStorm.
 * User: bexpc
 * Date: 2018/8/20
 * Time: 下午 12:08
 */
namespace Bex\Bulletin\Model;

use Illuminate\Database\Eloquent\Model;
use Bex\Account\Model AS AccountModel;

class Bulletin extends Model
{
    protected $table = 'p17_bulletin';
    public $timestamps = false;
    protected $fillable = ['p17_bin_publish_date','p17_bin_title','p17_bin_content'];
    protected $primaryKey = 'p17_bin_id';

    public function p5Account()
    {
        return $this->belongsTo(AccountModel\Account::class, 'p17_bin_p5_ant_id', 'p5_ant_id');

    }
}