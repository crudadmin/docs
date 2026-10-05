## CrudAdmin

CrudAdmin generates the administration, the forms, the validation and the database of a Laravel application from admin models. An admin model is an Eloquent model extending `Admin\Eloquent\AdminModel` with extra parameters.

### Rules

- Create admin models with `php artisan admin:model Name`, do not write the class by hand. Use the other generators too (`admin:button`, `admin:rule`, `admin:module`, `admin:layout`, `admin:component`, `admin:request`, `admin:export`).
- The database follows the `fields()` of admin models. Never write Laravel migrations for tables of admin models. Run `php artisan admin:migrate` after every change of fields or of parameters which create columns.
- Do not write relation methods, `$fillable` or `$casts` for fields. CrudAdmin builds them from the fields; calling a method named after the related model binds the relation, e.g. `$article->gallery`.
- Prefer the string notation of fields: parameters separated by `|`, mixed with Laravel validation rules.
- Labels (`$name`, `$title`, field `name`, `title`, `placeholder`) are literal gettext source messages, not Laravel translation keys.
- Inside an admin model `$this->name` and `$this->title` are model parameters. Read a column with the same name through `$this->getAttribute('name')`.
- Before using a parameter, field type or helper, read the matching `crudadmin-*` skill. Do not guess parameter names from other admin panels.
- Frontends (Nuxt, Ionic, Vue) get their data through the bootstrap request and `autoAjax()->store()`, bound into Pinia stores by the `@crudadmin/helpers` npm package. Read the `crudadmin-development` skill before adding a bootstrap section, a response for a frontend or a frontend store.

@verbatim
<code-snippet name="Admin model with fields" lang="php">
namespace App\Models;

use Admin\Eloquent\AdminModel;

class Article extends AdminModel
{
    protected $name = 'Articles';

    public function fields()
    {
        return [
            'name' => 'name:Name|required|max:90',
            'category' => 'name:Category|belongsTo:categories,name|required',
            'content' => 'name:Content|type:editor',
            'image' => 'name:Image|image',
        ];
    }
}
</code-snippet>
@endverbatim
