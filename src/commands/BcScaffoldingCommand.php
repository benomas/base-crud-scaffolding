<?php namespace Benomas\BcScaffolding\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class BcScaffoldingCommand extends Command {

    protected $signature   = 'scaffold {modo} {classes} {entitysegments} {entity} {maintable}';
    protected $description = 'Command description.';
    protected $entitysegments;
    protected $entity;
    protected $maintable;
    protected $classes;

    public function __construct()
    {
        parent::__construct();
        $this->controller_template = file_get_contents(__DIR__."/../templates/controller.txt");
        $this->request_template    = file_get_contents(__DIR__."/../templates/request.txt");
        $this->model_template      = file_get_contents(__DIR__."/../templates/model.txt");
        $this->repository_template = file_get_contents(__DIR__."/../templates/repository.txt");
        $this->classes=[];
    }

    public function saveFiles(){
        $fixedEntitysegments = str_replace("\\","/",$this->entitysegments);
        if(in_array("controller",$this->classes)){
            $controllerPath  = app_path()."/Http/Controllers/".$fixedEntitysegments;
            if(!file_exists($controllerPath))
                mkdir($controllerPath);
            file_put_contents($controllerPath."/".Str::title($this->entity)."Controller.php", $this->controller_template);
        }

        if(in_array("request",$this->classes)){
            $requestPath     = app_path()."/Http/Requests/".$fixedEntitysegments;
            if(!file_exists($requestPath))
                mkdir($requestPath);
            file_put_contents($requestPath."/".Str::title($this->entity)."Request.php", $this->request_template);
        }

        if(in_array("model",$this->classes)){
            $modelPath       = app_path()."/Persistence/Models/".$fixedEntitysegments;
            if(!file_exists($modelPath))
                mkdir($modelPath);
            file_put_contents($modelPath."/".Str::title($this->entity).".php", $this->model_template);
        }

        if(in_array("repository",$this->classes)){
            $repositoreyPath = app_path()."/Persistence/Repository/".$fixedEntitysegments;
            if(!file_exists($repositoreyPath))
                mkdir($repositoreyPath);
            file_put_contents($repositoreyPath."/".Str::title($this->entity)."Repository.php", $this->repository_template);
        }
    }

    public function deleteFiles(){
        $fixedEntitysegments = str_replace("\\","/",$this->entitysegments);

        if(in_array("controller",$this->classes)){
            $controllerPath  = app_path()."/Http/Controllers/".$fixedEntitysegments."/".Str::title($this->entity)."Controller.php";
            unlink($controllerPath);
        }
        if(in_array("request",$this->classes)){
            $requestPath     = app_path()."/Http/Requests/".$fixedEntitysegments."/".Str::title($this->entity)."Request.php";
            unlink($requestPath);
        }
        if(in_array("model",$this->classes)){
            $modelPath       = app_path()."/Persistence/Models/".$fixedEntitysegments."/".Str::title($this->entity).".php";
            unlink($modelPath);
        }
        if(in_array("repository",$this->classes)){
            $repositoreyPath = app_path()."/Persistence/Repository/".$fixedEntitysegments."/".Str::title($this->entity)."Repository.php";
            unlink($repositoreyPath);
        }
    }

    public function makeController(){
        $this->controller_template = str_replace('$ENTITY$', Str::title($this->entity), $this->controller_template);
        $this->controller_template = str_replace('$ENTITYSEGMENTS$', Str::title($this->entitysegments), $this->controller_template);
        $this->controller_template = str_replace('$MAINTABLE$', $this->maintable, $this->controller_template);
    }

    public function makeRequest(){
        $this->request_template = str_replace('$ENTITY$', Str::title($this->entity), $this->request_template);
        $this->request_template = str_replace('$ENTITYSEGMENTS$', Str::title($this->entitysegments), $this->request_template);
        $this->request_template = str_replace('$MAINTABLE$', $this->maintable, $this->request_template);
    }

    public function makeModel(){
        $this->model_template = str_replace('$ENTITY$', Str::title($this->entity), $this->model_template);
        $this->model_template = str_replace('$ENTITYSEGMENTS$', Str::title($this->entitysegments), $this->model_template);
        $this->model_template = str_replace('$MAINTABLE$', $this->maintable, $this->model_template);
    }

    public function makeRepository(){
        $this->repository_template = str_replace('$ENTITY$', Str::title($this->entity), $this->repository_template);
        $this->repository_template = str_replace('$ENTITYSEGMENTS$', Str::title($this->entitysegments), $this->repository_template);
        $this->repository_template = str_replace('$MAINTABLE$', $this->maintable, $this->repository_template);
    }

    public function handle()
    {
        $modo                 = $this->argument("modo");
        $classes              = $this->argument("classes");
        $this->classes        = explode(",", $classes);
        $this->entitysegments = $this->argument("entitysegments");
        $this->entity         = $this->argument("entity");
        if($modo==="create"){
            $this->maintable = $this->argument("maintable");
            try{
                if(in_array("controller",$this->classes))
                    $this->makeController();
                if(in_array("request",$this->classes))
                    $this->makeRequest();
                if(in_array("model",$this->classes))
                    $this->makeModel();
                if(in_array("repository",$this->classes))
                    $this->makeRepository();
                $this->saveFiles();
                shell_exec('composer dump-autoload');
            }
            catch(\Exception $e){
                echo "Exception, the proccess fail.";
                return false;
            }
        }
        if($modo==="delete"){
            try{
                $this->deleteFiles();
                shell_exec('composer dump-autoload');
            }
            catch(\Exception $e){
                echo "Exception, the proccess fail.";
                return false;
            }
        }
        
        echo "proccess completed";
    }

    protected function getArguments()
    {
        return [
            [
                "modo", InputArgument::REQUIRED, "modo is required (create,delete)",
            ],
            [
                "classes", InputArgument::REQUIRED, "classes are required (controller,request,repository,model)",
            ],
            [
                "entitysegments", InputArgument::REQUIRED, "specificPath is required",
            ],
            [
                "entity", InputArgument::REQUIRED, "Entidy is required",
            ],
            [
                "maintable", InputArgument::REQUIRED, "Entidy is required",
            ],
        ];
    }
}