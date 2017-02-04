<?php
namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use AJ\Core\Model;

/**
 * Author
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends Model{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(name="pw", type="string", length=255)
     */
    private $pw;

    public function getLogin(){
        return $this->login;
    }

    public function getPw(){
        return $this->pw;
    }

    public function __construct($login = NULL,$pw = NULL){
        $this->login = $login;
        $this->pw = $pw;
    }

    public function getUser($id){
       return $GLOBALS["em"]->find('Entity\User',$id);
    }
}