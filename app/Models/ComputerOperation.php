<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'computer_id',
        'monitor_id',
        'computer_user_id'
    ];

    static function getDataAllId($pc_name, $nik)
    {
        Computer::select('id')->where('pc_name', '=', $pc_name)->get();
        ComputerUser::select('id')->where('nik', '=', $nik)->get();
        Monitor::select('id')->where('pc_name', '=', 'nine')->get();
    }

    public function get_computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id');
    }

    public function get_monitor()
    {
        return $this->belongsTo(Monitor::class, 'monitor_id');
    }

    public function get_user()
    {
        return $this->belongsTo(ComputerUser::class, 'computer_user_id');
    }
}
