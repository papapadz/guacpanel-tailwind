<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonAffiliation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function person() {
        return $this->belongsTo(Person::class,'person_id','id');
    }

    public function salaries() {
        return $this->hasMany(PersonAffiliationSalary::class,'affiliation_id','id')->with('employmentStatus');
    }

    public function payrolls() {
        return $this->hasMany(AffiliationPayroll::class,'affiliation_id','id');
    }

    public function area() {
        return $this->belongsTo(CompanyArea::class,'company_area_id')->with('company');
    }

    public function position() {
        return $this->belongsTo(Position::class,'position_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
