# CodeIgniter 4 Crud STEP By STEP

1. composer install
2. app/config/database ... config database
3. CREATE TABLE `users`(
   `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `name` VARCHAR(150) NOT NULL,
   `email` VARCHAR(50) NOT NULL
   )
4.  
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
protected $table = 'users';
protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email'];
}

5.
class UserCrud extends Controller

6. app/config/routes.php
7. add_user.php
8. user_view.php
9. edit_view.php
10. php spark serve


