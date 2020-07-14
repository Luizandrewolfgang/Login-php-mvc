<?php

    class DashboardController
     {
        public function index()
        {
            $loader = new \Twig\Loader\FilesystemLoader('app/view'); //aponta a pasta que vai as views
            $twig = new \Twig\Environment($loader, [
            'cache' => '/path/to/compilation_cache',
            'auto_reload' => true,]);

            $template = $twig->load('dashboard.html'); //apontando a view
            $parameters['name_user'] = $_SESSION['usr']['name_user'];

                $parameters['error'] = $_SESSION['name_user'] = ''; //criando sessao para o error ("Tentativa invalida")

            return $template->render($parameters); //renderizando ou retornando a view "login.html"
        }
        public function logout()
        {
            unset($_SESSION['usr']);    //matando a sessao para sair do login 
            session_destroy();

            header('Location:http://localhost/projetoSaude/');//redirecionando para a pagina de login
        }
    }   