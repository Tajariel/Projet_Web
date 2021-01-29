<?php


/**
 * Class viewAcceuil
 *
 * Class extended from view
 * Used to display the Acceuil page
 *
 * @author Gaëtan PUPET
 * @author Ugo LARSONNEUR
 */
class viewAcceuil extends view{

    /**
     * @var IDmessage
     *
     * Is used to know the ID of the message you're looking for
     */
    private $IDmessage;

    /**
     * @var ModelMessage
     *
     * Is used to access the dataBase
     */
    private $modelMessage;


    /**
     * viewAcceuil constructor.
     *
     * @param $model
     */
    public function __construct($model) {
        $this->modelMessage = $model; // give the message manager to the class

        $this->IDmessage = $this->modelMessage->getMaxID(); // Set the ID to the last message, so it can go from earliest to latest
    }


    /**
     * @function echoNav
     *
     * Echo the Nav
     */
    public function echoNav() {
        echo '
            <nav>
                <img alt="Vanessa" class="imgvanessa" src="ressource/vanessa2.jpg">
            </nav>
        ';

    }

    /**
     * @function echoStartMainContent
     *
     * Echo the start of the main section, wich contain all the articles
     */
    public function echoStartMainContent() {
        echo '
            <section id="main_content">
        ';

    }

    /**
     * @function echoEndMainContent
     *
     * Echo the End of the main section, wich contain all the articles
     */
    public function echoEndMainContent() {
        echo '
            </section>
        ';

    }


    /**
     * @function echoMessagePost
     *
     * If the user is a super_admin, echo an article so he can post message on the data base
     */
    public function echoMessagePost() {

        if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == "SUPER_ADMIN") // if user == super_admin
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

    /**
     * @function chooseFillColor
     *
     * Check for one emoji button if the user has already clicked on it, if he has, then change the background color of the button
     *
     * @param $emoji_name
     * @return STRING
     */
    public function chooseFillColor($emoji_name){
        if(!isset($_SESSION['user'])) return ' ';
        return ($this->modelMessage->hasUsed($this->IDmessage, $_SESSION['user']['id_user'],$emoji_name))
                ? 'style="background:rgb(120,55,150)"' : ' ';
    }

    /**
     * @function echoArticles
     *
     * Used to echo the messages, their dates of sending, and how much reaction they have
     * The function display all of them at the same time, and check into a file how much it needs to display before doing it
     *
     */
    public function echoArticles() {

        // Open the file to see how much message it needs to display
        $file = 'ressource/nbarticle';
        if(!($file = fopen($file, 'r')))
        {
            echo 'erreur de lecture';
            exit();
        }
        $nbElement = fgets($file,255); // tells the program how much message it needs to display
        fclose($file);
        // End of the file sequence


        // Display all the message
        for ($i = 0 ; $i < $nbElement ; $i++)
        {
            // Checks if the message you're looking for exists, if not, then substract one to IDmessage and tries again until the message you're looking for exists, or until IDmessage equals zero
            while(!$this->modelMessage->exist($this->IDmessage) && $this->IDmessage != 0)
                $this->IDmessage--;

            // breaks from the loop if the ID is wrong
            if ($this->IDmessage == 0 || $this->IDmessage > $this->modelMessage->getMaxID())
                break;

            // Gets a message and its values from the database
            $tempMessage = $this->modelMessage->getFromID($this->IDmessage);


            // Change the background of the article so that each following message is a different color
            echo '
            <article class="post" style="background:';

            if($this->IDmessage %2)
                echo 'rgb(110,110,110,0.1)';
            else
                echo'rgb(200,200,200,0.1)';
            // End of the coloring sequence


            /// Display the message
            echo ';">
                <div class="top">
                    <p>';

            echo $tempMessage['contenu']; // Display what the message says

            echo
                    '</p>
                </div>
                <div class="bottom">
                    <div>
                        <p>';
            
            echo $tempMessage['date']; // Display when the message was published

            echo '
                        </p>
                    </div>
                    <!-- Display each button for each emoji, and display how much reaction each emoji has, and allows the user to click on one -->
                    <div class="divemoji">
                        <form method="post" class="redirect">
                            <input type="hidden" name="emoji" value="love"><input type="hidden" name="id_message" value='.$this->IDmessage.'>
                            <button type="submit" name="action" value="changeEmoji" class="emoji" '.$this->chooseFillColor('love').'>
                            <p>&#x1F496;</p><p>'.$this->modelMessage->getEmojiCount($this->IDmessage, 'love').'</p></button>
                        </form>
                        
                        <form method="post" class="redirect">
                            <input type="hidden" name="emoji" value="cute"><input type="hidden" name="id_message" value='.$this->IDmessage.'>
                            <button type="submit" name="action" value="changeEmoji" class="emoji" '.$this->chooseFillColor('cute').'>
                            <p>&#x1F63B;</p><p>'.$this->modelMessage->getEmojiCount($this->IDmessage, 'cute').'</p></button>
                        </form>
                        
                        <form method="post" class="redirect"> 
                            <input type="hidden" name="emoji" value="trop_style"><input type="hidden" name="id_message" value='.$this->IDmessage.'>
                            <button type="submit" name="action" value="changeEmoji" class="emoji"'.$this->chooseFillColor('trop_style').'>
                            <p>&#x1FA78;</p><p>'.$this->modelMessage->getEmojiCount($this->IDmessage, 'trop_style').'</p></button>
                        </form>
                        
                        <form method="post" class="redirect">
                            <input type="hidden" name="emoji" value="swag"><input type="hidden" name="id_message" value='.$this->IDmessage.'>
                            <button type="submit" name="action" value="changeEmoji" class="emoji"'.$this->chooseFillColor('swag').'>
                            <p>&#x1F60E;</p><p>'.$this->modelMessage->getEmojiCount($this->IDmessage, 'swag').'</p></button>
                        </form>
                    </div>
                    <!-- End of the emoji sequence -->
                </div>
            </article>
        ';
            $this->IDmessage--; // goes to the next message
        }


    }

    /**
     * @function echoVanessa
     *
     * Echo the div with vanessa's picture
     */
    public function echoVanessa() {
        echo '
            <div id="vanessa">
                <img alt="Vanessa" class="imgvanessa" src="ressource/vanessa.jpg">
            </div>
        ';
    }



}
