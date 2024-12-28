namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    // Specify the table associated with the model (if different from the default 'calculations')
    protected $table = 'calculations';

    // Specify the fields that can be mass-assigned
    protected $fillable = ['result'];

    // Optionally, if you're using timestamps
    public $timestamps = true;
}

