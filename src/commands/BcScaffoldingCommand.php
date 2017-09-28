<?php namespace Benomas\BcScaffolding\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class BcScaffoldingCommand extends Command {

    protected $signature   = 'scaffold';
    protected $description = 'Command description.';
    protected $entitysegments;
    protected $entity;
    protected $maintable;

    public function __construct()
    {
        parent::__construct();
        $this->controller_template = file_get_contents(__DIR__."/../templates/controller.txt");
        $this->request_template    = file_get_contents(__DIR__."/../templates/request.txt");
        $this->model_template      = file_get_contents(__DIR__."/../templates/model.txt");
        $this->repository_template = file_get_contents(__DIR__."/../templates/repository.txt");
    }

    public function saveFiles(){
        $fixedEntitysegments = str_replace("\\","/",$this->entitysegments);

        $controllerPath  = app_path()."/Http/Controllers/".$fixedEntitysegments;
        $requestPath     = app_path()."/Http/Requests/".$fixedEntitysegments;
        $modelPath       = app_path()."/Persistence/Models/".$fixedEntitysegments;
        $repositoreyPath = app_path()."/Persistence/Repository/".$fixedEntitysegments;

        if(!file_exists($controllerPath))
            mkdir($controllerPath);

        if(!file_exists($requestPath))
            mkdir($requestPath);

        if(!file_exists($modelPath))
            mkdir($modelPath);

        if(!file_exists($repositoreyPath))
            mkdir($repositoreyPath);

        file_put_contents($controllerPath.Str::title($this->entity)."Controller.php", $this->controller_template);
        file_put_contents($requestPath.Str::title($this->entity)."Request.php", $this->request_template);
        file_put_contents($model_template.Str::title($this->entity).".php", $this->model_template);
        file_put_contents($repository_template.Str::title($this->entity)."Repository.php", $this->repository_template);
    }

    public function deleteFiles(){
        $fixedEntitysegments = str_replace("\\","/",$this->entitysegments);

        $controllerPath  = app_path()."/Http/Controllers/".$fixedEntitysegments;
        $requestPath     = app_path()."/Http/Requests/".$fixedEntitysegments;
        $modelPath       = app_path()."/Persistence/Models/".$fixedEntitysegments;
        $repositoreyPath = app_path()."/Persistence/Repository/".$fixedEntitysegments;
    }

    public function makeController(){
        $this->controller_template = str_replace('$ENTITY$', Str::title($this->entity), $this->controller_template);
        $this->controller_template = str_replace('$ENTITYSEGMENTS$', Str::title($this->entitysegments), $this->controller_template);
        $this->controller_template = str_replace('$MAINTABLE$', Str::title($this->maintable), $this->controller_template);
    }

    public function makeRequest(){
        $this->request_template = str_replace('$ENTITY$', Str::title($this->entity), $this->request_template);
        $this->request_template = str_replace('$ENTITYSEGMENTS$', Str::title($this->entitysegments), $this->request_template);
        $this->request_template = str_replace('$MAINTABLE$', Str::title($this->maintable), $this->request_template);
    }

    public function makeModel(){
        $this->model_template = str_replace('$ENTITY$', Str::title($this->entity), $this->model_template);
        $this->model_template = str_replace('$ENTITYSEGMENTS$', Str::title($this->entitysegments), $this->model_template);
        $this->model_template = str_replace('$MAINTABLE$', Str::title($this->maintable), $this->model_template);
    }

    public function makeRepository(){
        $this->repository_template = str_replace('$ENTITY$', Str::title($this->entity), $this->repository_template);
        $this->repository_template = str_replace('$ENTITYSEGMENTS$', Str::title($this->entitysegments), $this->repository_template);
        $this->repository_template = str_replace('$MAINTABLE$', Str::title($this->maintable), $this->repository_template);
    }

    public function handle()
    {
        $this->entitysegments = $this->ask("specificPath:");
        $this->entity = $this->ask("Entidy:");
        $this->maintable = $this->ask("Table (if has schema, concat it):");
        try{
            $this->makeController();
            $this->makeRequest();
            $this->makeModel();
            $this->makeRepository();
            $this->saveFiles();
            shell_exec('composer dump-autoload');
        }
        catch(\Exception $e){
            echo "Exception, the proccess fail.";
            return false;
        }
        
        echo "proccess completed";
    }
}