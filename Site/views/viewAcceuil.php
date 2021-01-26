<?php

class viewAcceuil extends view{

    private $_messages;
    private $IDmessage;


    public function __construct($messages) {

            $this->_messages = $messages;
            $this->IDmessage = 0;
    }


    public function echoNav() {
        echo '
            <nav>
                <p>#swag</p>
            </nav>
        ';

    }

    public function echoStartMainContent() {
        echo '
            <section id="main_content">
        ';

    }

    public function echoEndMainContent() {
        echo '
            </section>
        ';

    }

    public function echoArticles() {
        $nbElement = 2;

        for ($i = 0 ; $i < $nbElement ; $i++)
        {
            echo '
            <article class="post">
                <div class="top">
                    <p>
                        Bonjour, je suis ici pour faire un test. Blablabla.
                    </p>
                </div>
                <div class="bottom">
                    <p>
                        20/02/2002
                    </p>
                    <p>
                        Emoji??????
                    </p>
                </div>
            </article>
        ';
            $this->IDmessage++;
        }


    }

    public function echoVanessa() {
        echo '
            <div id="vanessa">
                <p>Vanessa</p>
            </div>
        ';
    }

    public function echoContenu()
    {

        foreach ($this->_messages as $message) {
            echo $message->getContenu();
            echo $message->getContenu();
            echo $message->getContenu();
        }
    }

}
