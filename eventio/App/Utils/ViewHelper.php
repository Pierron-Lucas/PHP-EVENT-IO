<?php

    class ViewHelper{
        private $content;

    // Retourne une vue en fonction du controleur et du nom de la vue à utiliser
    public function RenderContent(
        $controllerInstance,
        $viewName = '',
        $data = array()
    ) 
    {              
        extract($data);
        unset($data);
        ob_start(); // ob start -> ouvrir un flux "tampon" de sortie
        include 
            PROJECT_PATH . VIEWS_DIRNAME . DIRECTORY_SEPARATOR
            . str_replace('Controller', '', get_class($controllerInstance)) 
            . DIRECTORY_SEPARATOR . $viewName . '.php';
        // include '/Views/Index/Toto.php'
        ob_end_flush(); // ob start -> ferme le flux
        return ob_get_clean();
    }

    // Retourne une vue en fonction du controleur et du nom de la vue à utiliser
    // dans un Template (Template.php) contenu dans le dossier /Views
    public function RenderView(
        $controllerInstance,
        $viewName = '',
        $data = array()
    ) 
    {
        extract($data);
        $this->content = $this->RenderContent($controllerInstance, $viewName, $data);
        ob_start(); // ob start -> ouvrir un flux "tampon" de sortie
        include PROJECT_PATH . VIEWS_DIRNAME . DIRECTORY_SEPARATOR . 'Template.php';
        ob_end_flush(); // ob start -> ferme le flux
        return ob_get_clean();
    }
    }

?>