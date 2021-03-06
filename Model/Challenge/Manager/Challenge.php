<?php
/**
 * Created by PhpStorm.
 * User: ChypRiotE
 * Date: 08/02/2015
 * Time: 12:31
 */

namespace Challenge\Manager;

class Challenge implements \Manager {
    private $_bdd;
    private $_table;

    public function     __construct($bdd, $table) {
        $this->_bdd = $bdd;
        $this->_table = $table;
    }

    public function     add($challenge) {
        if (!($challenge instanceof \Challenge\Challenge)) {new \Error\TypeError("Manager/Challenge", "Challenge", $challenge->type);}
        $q = $this->_bdd->query("INSERT INTO " . $this->_table . "
                    (title, dateCreation, dateEnd, idCreator, idPrize, description, isAdvanced, status, cost, type, champion, winner)
                    VALUES ('".$challenge->getTitle()."',
                    '".$challenge->getDateCreation()."',
                    '".$challenge->getDateEnd()."',
                    ".$challenge->getIdCreator().",
                    ".$challenge->getIdPrize().",
                    '".$challenge->getDescription()."',
                    ".$challenge->getIsAdvanced().",
                    ".$challenge->getStatus().",
                    ".$challenge->getCost().",
                    ".$challenge->getType().",
                    ".$challenge->getChampion().",
					".$challenge->getWinner().")
                  ");
    }
    public function     update($challenge) {
        if (!($challenge instanceof \Challenge\Challenge)) {throw new TypeError("Manager/Challenge", "Challenge", $challenge->type);}
        $q = $this->_bdd->prepare('UPDATE ' . $this->_table . '
                    SET title = :title,
                    dateCreation = :dateCreation,
                    dateEnd = :dateEnd,
                    idCreator = :idCreator,
                    idPrize = :idPrize,
                    description = :description,
                    isAdvanced = :isAdvanced,
                    status = :status,
                    cost = :cost,
                    type = :type,
					champion = :champion,
					winner = :winner
                    WHERE id = :id
                  ');

        $q->bindValue(':title', $challenge->getTitle());
        $q->bindValue(':dateCreation', $challenge->getDateCreation());
        $q->bindValue(':dateEnd', $challenge->getDateEnd());
        $q->bindValue(':idCreator', $challenge->getIdCreator());
        $q->bindValue(':idPrize', $challenge->getIdPrize());
        $q->bindValue(':description', $challenge->getDescription());
        $q->bindValue(':isAdvanced', $challenge->getIsAdvanced());
        $q->bindValue(':status', $challenge->getStatus());
        $q->bindValue(':cost', $challenge->getCost());
        $q->bindValue(':type', $challenge->getType());
		$q->bindValue(':champion', $challenge->getChampion());
		$q->bindValue(':winner', $challenge->getWinner());
        $q->bindValue(':id', $challenge->getId());

        $q->execute();
    }
    public function     get($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE id = '.$id);
        if ($data = $q->fetch())
            return new \Challenge\Challenge($data);
        return null;
    }
    public function     remove($id) {
        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE id = '.$id);
    }

    public function     getNext() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE status = 1 ORDER BY dateEnd ASC LIMIT 1');
        $data = $q->fetch();
        return new \Challenge\Challenge($data);
    }

    public function     getOngoing() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE status = 1 ORDER BY dateEnd ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getEnded() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE status = 2 ORDER BY dateEnd DESC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getAdvanced() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE status = 1 AND isAdvanced = 1 ORDER BY dateEnd ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getStarter() {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE status = 1 AND isAdvanced = 0 ORDER BY dateEnd ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getCreated($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE idCreator = '.$id.' ORDER BY dateEnd ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getWon($id) {
        $q = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE winner = '.$id.' ORDER BY dateEnd ASC');
        $list = [];
        while ($data = $q->fetch()) {
            $list[] = new \Challenge\Challenge($data);
        }
        return $list;
    }
    public function     getEntered($id) {
        global $EntryManager;
        $entries = $EntryManager->getForUser($id);
        $list = [];
        for ($i = 0; !empty($entries[$i]); $i++){
            $list[] = $this->get($entries[$i]->getIdChallenge());
        }
        return $list;
    }

    public function     getNbOngoing() {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE status = 1');
        return $q->fetch()[0];
    }
    public function     getNbEnded() {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE status = 2');
        return $q->fetch()[0];
    }
    public function     getNbAdvanced() {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE isAdvanced = true AND status = 1');
        return $q->fetch()[0];
    }
    public function     getNbStarter() {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE isAdvanced = false AND status = 1');
        return $q->fetch()[0];
    }
    public function     getNbCreated($id) {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE idCreator = '.$id);
        return $q->fetch()[0];
    }
    public function     getNbWon($id) {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE winner = '.$id);
        return $q->fetch()[0];
    }
    public function     getNbOngoingForType($type) {
        $q = $this->_bdd->query('SELECT count(*) FROM '.$this->_table.' WHERE status = 1 AND type = '.$type);
        return $q->fetch()[0];
    }
    public function     getNbFriends($id) {
        return 0;
    }
}