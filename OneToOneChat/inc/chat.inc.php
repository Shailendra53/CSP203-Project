<?php 
// simple chat class
class SimpleChat {
    // DB variables
    var $sDbName;
    var $sDbUser;
    var $sDbPass;
    // constructor
    function SimpleChat() {
        //mysql_connect("localhost","username","password");
        $this->sDbName = 'database_name';
        $this->sDbUser = 'username';
        $this->sDbPass = 'password';
    }
    // adding to DB table posted message
    function acceptMessages() {
        if ($_COOKIE['member_name']) {
            if(isset($_POST['s_say']) && $_POST['s_message']) {
                $sUsername = $_COOKIE['member_name'];
                //the host, name, and password for your mysql
                $vLink = mysql_connect("localhost", $this->sDbUser, $this->sDbPass);
                //select the database
                mysql_select_db($this->sDbName);
                $sMessage = mysql_real_escape_string($_POST['s_message']);
                if ($sMessage != '') {
                    mysql_query("INSERT INTO `s_chat_messages` SET `user`='{$sUsername}', `message`='{$sMessage}', `when`=UNIX_TIMESTAMP()");
                }
                mysql_close($vLink);
            }
        }
        ob_start();
        require_once('chat_input.html');
        $sShoutboxForm = ob_get_clean();
        return $sShoutboxForm;
    }
    function getMessages() {
        $db = pg_connect('host=localhost user=postgres password=123abc dbname=Onetoonechat');
        //select the database
        //mysql_select_db($this->sDbName);
        //pg_connect();
		//returning the last 15 messages
        $grab_people = pg_query("SELECT * FROM s_chat_messages ORDER BY id");
        $sMessages = '';
        // collecting list of messages
        if ($vRes) {
            while($aMessages = pg_fetch_array($grab_people)) {
                $sWhen = date("H:i:s", $aMessages['when']);
                $sMessages .= '<div class="message">' . $aMessages['user'] . ': ' . $aMessages['message'] . '<span>(' . $sWhen . ')</span></div>';
            }
        } else {
            $sMessages = 'DB error, create SQL table before';
        }
        pg_close($db);
        ob_start();
        require_once('chat_begin.html');
        echo $sMessages;
        require_once('chat_end.html');
        return ob_get_clean();
    }
}
?>
