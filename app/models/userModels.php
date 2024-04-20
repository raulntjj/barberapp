<?php
    class userModels{
        private $id;
        private $cpf;
        private $contact;
        private $password;
        
        public function __construt(){
            $this->id = $id;
            $this->cpf = $cpf;
            $this->contact = $contact;
            $this->password = $password;
        }

        public getId(){
            return $id;
        }
    }

?>