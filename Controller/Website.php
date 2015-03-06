<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 07/02/2015
 * Time: 18:50
 */

    include_once("Controller/GlobalVariables.php");

//Chargement des classes
    function    load($class) {
        require_once 'Model/' . $class . '.php';
    }
    spl_autoload_register('load');
    include_once("Controller/LoadClasses.php");
    session_start();

//Vérifie si l'user est connecté ($_SESSION)
    function    isLogged() {
        return isset($_SESSION['currentUser']) && ($_SESSION['currentUser'] != null);
    }
//Renvoie un PDO object de connection à la base de données
    function    connectDatabase() {
        global $_BDD_SERVER_, $_BDD_USER_, $_BDD_PASS_, $_BDD_NAME_;

        try {
            $bdd = new PDO('mysql:host='.$_BDD_SERVER_.';dbname='.$_BDD_NAME_, $_BDD_USER_, $_BDD_PASS_);
        } catch (Exception $e) {
            die('<strong>Error :</strong> ' . $e->getMessage());
        }
        return $bdd;
    }

//Charge la barre de navigation
    function    getNavbar() {
        include("Controller/GlobalVariables.php");
        include(isLogged()?'View/Website/LoggedNav.php':'View/Website/GuestNav.php');
    }
//
    function    getChallengeType($type, $bool) {
        switch ($type) {
            case 1:
                return  ($bool ? '<i class="fa fa-crosshairs"></i> ':'') . 'Creep';
            case 2:
                return  ($bool ? '<i class="fa fa-flag-checkered"></i> ':'') . 'Victory';
            case 3:
                return  ($bool ? '<i class="fa fa-clock-o"></i> ':'') . 'Time';
        }
        return null;
    }

//
    function    history($idSummoner, $idUser) {
    $api = new RiotApi('euw');
    $array = [];
    $history = $api->getMatchHistory($idSummoner);
        for($i = 0; !empty($history[$i]); $i++) {
            $match = $history[$i];
            $player = $match['participants'][0];
            $stats = $player['stats'];
            $infos['userId'] = $idUser;
            $infos['matchId'] = $match['matchId'];
            $infos['matchDuration'] = $match['matchDuration'];
            $infos['matchCreation'] = $match['matchCreation'];
            $infos['matchType'] = $match['queueType'];
            $infos['championId'] = $player['championId'];
            $infos['kills'] = $stats['kills'];
            $infos['deaths'] = $stats['deaths'];
            $infos['assists'] = $stats['assists'];
            $infos['creeps'] = $stats['minionsKilled'];
            $infos['victory'] = $stats['winner'];
            $infos['side'] = $player['teamId'];

            $champs = $api->getMatch($history[$i]['matchId']);
            if ($api->getLastResponseCode() == 200) {
                $participants = $champs['participants'];
                $infos['ally1'] = $participants[1]['championId'];
                $infos['ally2'] = $participants[2]['championId'];
                $infos['ally3'] = $participants[3]['championId'];
                $infos['ally4'] = $participants[4]['championId'];
                $infos['enemy1'] = $participants[5]['championId'];
                $infos['enemy2'] = $participants[6]['championId'];
                $infos['enemy3'] = $participants[7]['championId'];
                $infos['enemy4'] = $participants[8]['championId'];
                $infos['enemy5'] = $participants[9]['championId'];
            } 
            $array[] = new \Summoner\Match($infos);
        }
    return $array;
  }

    function    synchronize($id) {
        global $_TABLE_SUMMONERS_, $_TABLE_USERS_, $_TABLE_SUMMONERS_HISTORY_;
        $bdd = connectDatabase();
        $api = new RiotApi('euw');
        $Umanager = new \Member\Manager\User($bdd, $_TABLE_USERS_);
        $Smanager = new \Summoner\Manager\Summoner($bdd, $_TABLE_SUMMONERS_);
        $Mmanager = new \Summoner\Manager\Match($bdd, $_TABLE_SUMMONERS_HISTORY_);
        $usr = $Umanager->get($id);
        $sum = $Smanager->getFromId($id);
        $sum->setLastSync(date("Y-m-d H:i", strtotime("+6 hours")));
        $usr->setAvatar($api->getSummoner($sum->getSummonerId())['profileIconId']);
        $Umanager->update($usr);
        $Smanager->update($sum);
        $matchHistory = history($sum->getSummonerId(), $id);
        for ($i = 0; !empty($matchHistory[$i]); $i++) {
          if (!$Mmanager->checkExistence($id, $matchHistory[$i]->getMatchId()))
            $Mmanager->add($matchHistory[$i]);
        }
        $_SESSION['currentUser'] = $usr;
        $_SESSION['currentSummoner'] = $sum;
    }

//Affichage des champions
    function    getChampionPic($id) {
        global $bdd;
        $q = $bdd->query("SELECT * FROM cw_lol_champions WHERE id = ". $id);
        if ($data = $q->fetch())
            return "http://ddragon.leagueoflegends.com/cdn/5.1.2/img/champion/".$data['cleanName'].".png";
        return null;
    }
    function    getChampionSplash($id) {
    global $bdd;
    $q = $bdd->query("SELECT * FROM cw_lol_champions WHERE id = ". $id);
    if ($data = $q->fetch())
        return "http://ddragon.leagueoflegends.com/cdn/img/champion/splash/".$data['cleanName']."_0.jpg";
    return null;
}
    function    getChampionClean($id) {
        global $bdd;
        $q = $bdd->query("SELECT * FROM cw_lol_champions WHERE id = ". $id);
        if ($data = $q->fetch())
            return $data['cleanName'];
        return null;
    }
//Affichage de la sidebar
    function    isActive($link) {
        global $tabPanel;
        if ($tabPanel == $link)
            echo 'is-selected';
    }
    function    isSelected($link) {
        global $_PAGENAME_;
        if (strtolower($_PAGENAME_) == strtolower($link))
            echo "is-selected";
    }
    function    addCaret($link) {
        global $tabPanel;
        if ($tabPanel == $link)
            echo '<i class="fa fa-caret-right"></i>';
    }

//Affichage des messages de debug
    function    debug($string) {
      global $_DEBUG_;
      
      if ($_DEBUG_)
        echo "<strong style=\"color:black\">[DEBUG]</strong> ".$string."<br />";
    }