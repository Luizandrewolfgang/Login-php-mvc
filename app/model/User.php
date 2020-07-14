<?php

use Luizandre\Database\Connection;

class User 
    {
        private $id;
        private $name;
        private $email;
        private $password;

        public function ValidateLogin(){
            $conn = Connection::getConn();//chamando o metodo getConn da classe Connection "Connection.php"
           
            
            //selecionar o usuario que tenha o mesmo email informado
           
            $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email' , $this->email);
            $stmt->bindValue(':password' , $this->password);

            $stmt->execute();

            // conferindo senha e email

            if($stmt->rowCount()){
                $result = $stmt->fetch();

                
                if($result['email' == $this->email] && $result['pass' === $this->password]){
                    //session que direciona para a tela dashboard
                    $_SESSION['usr'] = array(
                        'id_user' => $result['id'], 
                        'name_user' => $result['name']
                    );
                    return true;
                }
            }

            //se houver algum erro
            throw new \Exception('Login Inválido');
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getName(){
            return $this->name;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }



    }