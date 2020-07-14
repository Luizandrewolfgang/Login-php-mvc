<?php

    class LoginController
     {
        public function index()
        {
            $loader = new \Twig\Loader\FilesystemLoader('app/view'); //aponta a pasta que vai as views
            $twig = new \Twig\Environment($loader, [
            'cache' => '/path/to/compilation_cache',
            'auto_reload' => true,]);

            $template = $twig->load('login.html'); //apontando a view

                $parameters['error'] = $_SESSION['msg_error'] ?? null; //criando sessao para o error ("Tentativa invalida")

            return $template->render($parameters); //renderizando ou retornando a view "login.html"
        }

        public function check(){ //validar os dados

            try {
                    $user = new User;
                    $user->setEmail($_POST['email']); //Substitui o setEmail da model pelo que vem do POST ("form que esta na login.html")
                    $user->setPassword($_POST['password']);
                    $user->ValidateLogin(); // se houver algum erro aqui no metodo vai pro catch

                    //caso ocorra o caminho feliz
                    
                    header('Location: http://localhost/projetoSaude/dashboard '); //redireciona o usuario para a pagina de dashboard

                 } catch (\Exception $e) {
                     $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0); //session que pega a msg do error
                    header('Location: http://localhost/projetoSaude/'); //redireciona o usuario para a pagina de login
            }
        }
    }