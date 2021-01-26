<?php

class viewAcceuil extends view{

    private $IDmessage;
    private $modelMessage;


    public function __construct($model) {
        $this->modelMessage = $model;

        $this->IDmessage = $this->modelMessage->getMaxID();
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
        $nbElement = 4;

        for ($i = 0 ; $i < $nbElement ; $i++)
        {
            if ($this->IDmessage == 0 || $this->IDmessage > $this->modelMessage->getMaxID())
                break;
            $tempMessage = $this->modelMessage->getFromID($this->IDmessage);

            echo '
            <article class="post" style="background:';

            if($this->IDmessage %2)
                echo 'rgb(110,110,110,0.1)';
            else
                echo'rgb(200,200,200,0.1)';

            echo ';">
                <div class="top">
                    <p>';

            echo $tempMessage['contenu'];

            echo
                    '</p>
                </div>
                <div class="bottom">
                    <p>';
            
            echo $tempMessage['date'];

            echo '
                    </p>
                    <p>
                        Emoji??????
                    </p>
                </div>
            </article>
        ';
            $this->IDmessage--;
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
