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

    public function echoMessagePost() {


        if(isset($_POST['Envoyer']) && isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == "SUPER_ADMIN")
        {
            $this->modelMessage->sendMessage($_POST['vanessa_post']);

            unset($_POST['vanessa_post']);
        }

        if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == "SUPER_ADMIN") // if vanessa
            echo '
                <article id="vanessaPost">
                    <form method="post">
                        <div class="top">
                            <input type="text" name="vanessa_post" maxlength="50" placeholder="Partage ta vie ! (50 car max)" required>
                        </div>
                        <div class="bottom">
                            <div class="gap"></div>
                            <input type="submit" name="Envoyer">
                        </div>
                    </form>
                </article>
            ';
    }

    public function echoArticles() {
        $nbElement = 2;

        for ($i = 0 ; $i < $nbElement ; $i++)
        {
            while(!$this->modelMessage->exist($this->IDmessage) && $this->IDmessage != 0)
                $this->IDmessage--;
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
                    <div>
                        <p>';
            
            echo $tempMessage['date'];

            echo '
                        </p>
                    </div>
                    <div class="divemoji">
                        <form method="post" class="redirect">
                            <input type="hidden" name="emoji" value="love"><input type="hidden" name="id_message" value='.$this->IDmessage.'>
                            <button type="input" name="action" value="changeEmoji" class="emoji"><p>&#x1F496;</p><p>'.$this->modelMessage->getEmojiCount($this->IDmessage, 'love').'</p></button>
                        </form>
                        <form method="post" class="redirect">
                            <input type="hidden" name="emoji" value="cute"><input type="hidden" name="id_message" value='.$this->IDmessage.'>
                            <button type="input" name="action" value="changeEmoji" class="emoji"><p>&#x1F63B;</p><p>'.$this->modelMessage->getEmojiCount($this->IDmessage, 'cute').'</p></button>
                        </form>
                        <form method="post" class="redirect"> 
                            <input type="hidden" name="emoji" value="trop_style"><input type="hidden" name="id_message" value='.$this->IDmessage.'>
                            <button type="input" name="action" value="changeEmoji" class="emoji"><p>&#x1FA78;</p><p>'.$this->modelMessage->getEmojiCount($this->IDmessage, 'trop_style').'</p></button>
                        </form>
                        <form method="post" class="redirect">
                            <input type="hidden" name="emoji" value="swag"><input type="hidden" name="id_message" value='.$this->IDmessage.'>
                            <button type="input" name="action" value="changeEmoji" class="emoji"><p>&#x1F60E;</p><p>'.$this->modelMessage->getEmojiCount($this->IDmessage, 'swag').'</p></button>
                        </form>
                    </div>
                </div>
            </article>
        ';
            $this->IDmessage--;
        }


    }

    public function echoVanessa() {
        echo '
            <div id="vanessa">
                <img src="ressource/vanessa.jpg">
            </div>
        ';
    }



}
