<?php
    trait hello{
        private function sayhello(){
            echo "say hello <br>";
        }
    }
    trait hi{
        public function sayhello(){
            echo "say hi <br>";
        }
    }

    class base {
        use hello{
            hello::sayhello as public newSayhello;
        }
    }

    $obj=new base();

    $obj->newSayhello();
?>