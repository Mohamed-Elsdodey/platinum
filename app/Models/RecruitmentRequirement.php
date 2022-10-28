<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Spatie\Translatable\HasTranslations;

class RecruitmentRequirement extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table='recruitment_requirements';
    protected $guarded=[];
    public $translatable = [
        'title','copy_of_the_national_IDor_residence_for_residents','qutstanding_customer_service',
        'salary_definition_from_the_employer_or_bank_statement','original_visa','signing_recruitment_contract',
    ];
}
