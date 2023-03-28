<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("songs.lists", ['songs'=> Lists::get()]);
    }

    public function createList(){
        return view("songs.create");
    }


    public function subirList(Request $request){
        $file = $request->file("img");
        $request->file("img")->store('public');
        $obj = new Lists();
        $obj-> name = $request->name;
        $obj-> id_user = 1;
        $obj-> img = $file->hashName();
        $obj->save();
        $result = $this->createAndMigrate($request->name);
        $result = $this->createModel($request->name);
        $result = $this->createController($request->name);
        $result = $this->createRoute($request->name);
        return view("songs.lists", ['songs'=> Lists::get()]);
    }
    
    function createRoute($name){
        $controllerName = ucfirst($name) . 'Controller';
        $controllerPath = app_path('Http/Controllers/' . $controllerName . '.php');
        
        if (!file_exists($controllerPath)) {
            createController($name);
        }

        $namespace = 'App\Http\Controllers';
        $controller = $namespace . '\\' . $controllerName;
        
        // Add the use statement to import the controller
        $routeContent = "\n\nuse $controller;\n\n";
        $routeContent .= "Route::resource('$name', '$controller');\n";
        $routeContent .= "Route::get('/subir$name', [$controller::class,'subir$name'])->name('subir$name');";
        
        $routePath = base_path('routes/web.php');
        file_put_contents($routePath, $routeContent . "\n", FILE_APPEND);
    }


    function createController($name){
    $controllerName = ucfirst($name) . 'Controller';
    $content = "<?php\n\nnamespace App\Http\Controllers;\n\nuse App\Models\Lists;\n\nuse App\Models\Songs;\n\nuse Illuminate\Http\Request;\nuse App\Models\\$name;\n\nclass $controllerName extends Controller\n{\n";
    
    $content .= "public function index()\n";
    $content .= "{\n";
    $content .= "    return view(\"songs.template\", ['songs'=> $name::get()]);\n";
    $content .= "}\n";
    $content .= "public function subir$name(Request \$request)\n";
    $content .= "{\n";
    $content .= "    \$obj = new $name();\n";
    $content .= "    \$obj->nombre = \$request->name;\n";
    $content .= "    \$obj->autor = \$request->autor;\n";
    $content .= "    \$obj->archivo_au = \$request->file;\n";
    $content .= "    \$obj->foto = \$request->img;\n";
    $content .= "    \$obj->save();\n";
    $content .= "    return view(\"songs.index\", ['songs'=> Songs::get(),'listas'=>Lists::get()]);\n";
    $content .= "}\n";
    
    $content .= "}";
    
    $controllerPath = app_path('Http/Controllers/' . $controllerName . '.php');
    file_put_contents($controllerPath, $content);
}

    

    function createModel($modelName)
    {
        $output = '';
        try {
            $exitCode = Artisan::call('make:model', ['name' => $modelName]);
            $output .= Artisan::output();
        } catch (Exception $e) {
            $output .= $e->getMessage();
        }
        return $output;
    }

    public function createAndMigrate($tableName) {
        $table = Str::plural($tableName);
    
        // check if the first letter is uppercase
        if (preg_match('/^[A-Z]/', $tableName)) {
            $table = Str::plural(strtolower($tableName));
        }
    
        // Create migration file
        Artisan::call('make:migration', [
            'name' => 'create_' . $table . '_table',
            '--create' => $table
        ]);
    
        // Get the contents of the migration file and add columns
        $migrationFile = glob(database_path('/migrations/*create_' . $table . '_table.php'))[0];
        $migrationContents = file_get_contents($migrationFile);
        $migrationContents = str_replace(
            '$table->id();',
            '$table->id();
                $table->string("nombre");
                $table->string("autor");
                $table->string("archivo_au");
                $table->string("foto");',
            $migrationContents
        );
    
        // Save the modified contents back to the migration file
        file_put_contents($migrationFile, $migrationContents);
    
        // Run the migration
        Artisan::call('migrate');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lists $lists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lists $lists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lists $lists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lists $lists)
    {
        //
    }
}
