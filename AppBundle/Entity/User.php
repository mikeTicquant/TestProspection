<?php
/**
 * Created by PhpStorm.
 * User: Rabi
 * Date: 06/06/2017
 * Time: 14:53
 */

namespace AppBundle\Entity;


use AppBundle\Controller\User\UserController;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @ORM\Entity()
 * @UniqueEntity(fields={"email"}, errorPath="email")
 */
class User extends UserController
{

    const  GENDER_MALE = 'M';
    const  GENDER_FEMALE = 'F';
    use IdTrait;



    /**
     * @ORM\Column(nullable=true)
     * @Assert\Type("string")
     * @Assert\NotNull()
     */
    private $first_name;

    /**
     * @ORM\Column(nullable=true)
     * @Assert\Type("string")
     * @Assert\NotNull()
     */
    private $last_name;

    /**
     * @ORM\Column()
     *  @Assert\Length(min = 10, max = 10, minMessage = "min_lenght", maxMessage = "max_lenght")
     *  @Assert\Regex(pattern="#^0[1-9]([-. ]?[0-9]{2}){4}$#", message="number_only")
     */
    private $phone_number;


    /**
     * @ORM\Column(type="date")
     * @Assert\NotNull()
     * @Assert\DateTime()
     */
    private $birthdate ;


    /**
     * @ORM\Column(type="string")
     * @Assert\Type("string")
     */
    private $birthplace;


    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     * @Assert\Type("string")
     */
    private $job;


    /**
     * @var null|UploadedFile
     * @Assert\Image()
     */
    private $profile;


    /**
     * @ORM\Column(type="string")
     * @Assert\Type("string")
     */
    private $notification_alert;


    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     * @Assert\Type("string")
     */
    private $role;

    /**
     * @ORM\Column(unique=true)
     * @Assert\NotNull()
     * @Assert\Type("string")
     * @Assert\Length(min=2, max=255)
     * @Assert\Email()
     */
    private $email;


    /**
     * @ORM\Column()
     * @Assert\Type("string")
     * @Assert\Length(min=2)
     */
    private $password;


    /**
     * @ORM\Column()
     * @Assert\Type("bool")
     */
    private $locked;

    /**
     * @var null|UploadedFile
     * @Assert\Image()
     */
    private $profile_picture;

    /**
     * @ORM\Column(type="date")
     * @Assert\DateTime()
     */
    private $created_at;

    /**
     * @ORM\Column(type="date")
     * @Assert\DateTime()
     */
    private $update_at;

    /**
     * @ORM\Column(nullable=true)
     * @Assert\Type("string")
     * @Assert\Length(min=2)
     */
    private $address_postal_code;


    /**
     * @ORM\Column(nullable=true)
     * @Assert\Type("string")
     * @Assert\Length(min=2)
     */
    private $address_city;

    /**
     * @ORM\Column(nullable=true)
     * @Assert\Type("string")
     * @Assert\Length(min=2)
     */
    private $address_country;

    /**
     * @ORM\Column(nullable=true)
     * @Assert\Type("string")
     * @Assert\Length(min=2)
     */
    private $address_street;

    /**
     * @ORM\Column(nullable=true)
     * @Assert\Type("string")
     * @Assert\Length(min=2)
     */
    private $address_street2;


    /**
     * @ORM\Column(length=1)
     * @Assert\NotNull()
     * @Assert\Type("string")
     * @Assert\Length(min=1, max=1)
     * @Assert\Choice({"M", "F"})
     */
    private $civility = self::GENDER_MALE;

    /**
     * @ORM\Column(value="false")
     * @Assert\Type("bool")
     */
    private $signature;


    /**
     * @ORM\Column()
     *  @Assert\Length(min = 10, max = 10, minMessage = "min_lenght", maxMessage = "max_lenght")
     *  @Assert\Regex(pattern="#^0[1-9]([-. ]?[0-9]{2}){4}$#", message="number_only")
     */
    private $cellphone_number;

    /**
     * @ORM\Column(value="true")
     * @Assert\Type("bool")
     */
    private $enabled;


    /**
     * @ORM\Column()
     *  @Assert\Length(min = 10, max = 10, minMessage = "min_lenght", maxMessage = "max_lenght")
     *  @Assert\Regex(pattern="#^0[1-9]([-. ]?[0-9]{2}){4}$#", message="number_only")
     */
    private $fax;

    /**
     * @var null|UploadedFile
     * @Assert\Image()
     */
    private $logo;

    /**
     * @ORM\Column()
     * @Assert\Type("string")
     */
    private $compagny_name;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\Length(min = 9, max = 9, minMessage = "min_lenght", maxMessage = "max_lenght")
     * @Assert\Type("integer")
     */
    private $siren;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\Length(min = 9, max = 9, minMessage = "min_lenght", maxMessage = "max_lenght")
     * @Assert\Type("integer")
     */
    private $rsac_number;


    /**
     * @ORM\Column(type="integer")
     *  @Assert\Length(min = 9, max = 9, minMessage = "min_lenght", maxMessage = "max_lenght")
     * @Assert\Type("integer")
     */
    private $rcpro_number;


    /**
     * @ORM\Column(type="date")
     * @Assert\NotNull()
     * @Assert\Date()
     */
    private $date_begin_rcpro;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotNull()
     * @Assert\Date()
     */
    private $date_end_rcpro;


    /**
     * @ORM\Column()
     * @Assert\Type("string")
     * @Assert\Length(min=2)
     */
    private $register_commerce;


    /**
     * @ORM\Column()
     * @Assert\Type("string")
     * @Assert\Length(min=6,max=20)
     */
    private $affiliate_code_send;


    /**
     * @ORM\Column()
     * @Assert\Type("string")
     * @Assert\Length(min=6, max=20)
     */
    private $affiliate_code_receive;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getBirthplace()
    {
        return $this->birthplace;
    }

    /**
     * @param mixed $birthplace
     */
    public function setBirthplace($birthplace)
    {
        $this->birthplace = $birthplace;
    }

    /**
     * @return mixed
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param mixed $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * @return null|UploadedFile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param null|UploadedFile $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getNotificationAlert()
    {
        return $this->notification_alert;
    }

    /**
     * @param mixed $notification_alert
     */
    public function setNotificationAlert($notification_alert)
    {
        $this->notification_alert = $notification_alert;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * @param mixed $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * @return null|UploadedFile
     */
    public function getProfilePicture()
    {
        return $this->profile_picture;
    }

    /**
     * @param null|UploadedFile $profile_picture
     */
    public function setProfilePicture($profile_picture)
    {
        $this->profile_picture = $profile_picture;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * @param mixed $update_at
     */
    public function setUpdateAt($update_at)
    {
        $this->update_at = $update_at;
    }

    /**
     * @return mixed
     */
    public function getAddressPostalCode()
    {
        return $this->address_postal_code;
    }

    /**
     * @param mixed $address_postal_code
     */
    public function setAddressPostalCode($address_postal_code)
    {
        $this->address_postal_code = $address_postal_code;
    }

    /**
     * @return mixed
     */
    public function getAddressCity()
    {
        return $this->address_city;
    }

    /**
     * @param mixed $address_city
     */
    public function setAddressCity($address_city)
    {
        $this->address_city = $address_city;
    }

    /**
     * @return mixed
     */
    public function getAddressCountry()
    {
        return $this->address_country;
    }

    /**
     * @param mixed $address_country
     */
    public function setAddressCountry($address_country)
    {
        $this->address_country = $address_country;
    }

    /**
     * @return mixed
     */
    public function getAddressStreet()
    {
        return $this->address_street;
    }

    /**
     * @param mixed $address_street
     */
    public function setAddressStreet($address_street)
    {
        $this->address_street = $address_street;
    }

    /**
     * @return mixed
     */
    public function getAddressStreet2()
    {
        return $this->address_street2;
    }

    /**
     * @param mixed $address_street2
     */
    public function setAddressStreet2($address_street2)
    {
        $this->address_street2 = $address_street2;
    }

    /**
     * @return mixed
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * @param mixed $civility
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param mixed $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return mixed
     */
    public function getCellphoneNumber()
    {
        return $this->cellphone_number;
    }

    /**
     * @param mixed $cellphone_number
     */
    public function setCellphoneNumber($cellphone_number)
    {
        $this->cellphone_number = $cellphone_number;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return null|UploadedFile
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param null|UploadedFile $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getCompagnyName()
    {
        return $this->compagny_name;
    }

    /**
     * @param mixed $compagny_name
     */
    public function setCompagnyName($compagny_name)
    {
        $this->compagny_name = $compagny_name;
    }

    /**
     * @return mixed
     */
    public function getSiren()
    {
        return $this->siren;
    }

    /**
     * @param mixed $siren
     */
    public function setSiren($siren)
    {
        $this->siren = $siren;
    }

    /**
     * @return mixed
     */
    public function getRsacNumber()
    {
        return $this->rsac_number;
    }

    /**
     * @param mixed $rsac_number
     */
    public function setRsacNumber($rsac_number)
    {
        $this->rsac_number = $rsac_number;
    }

    /**
     * @return mixed
     */
    public function getRcproNumber()
    {
        return $this->rcpro_number;
    }

    /**
     * @param mixed $rcpro_number
     */
    public function setRcproNumber($rcpro_number)
    {
        $this->rcpro_number = $rcpro_number;
    }

    /**
     * @return mixed
     */
    public function getDateBeginRcpro()
    {
        return $this->date_begin_rcpro;
    }

    /**
     * @param mixed $date_begin_rcpro
     */
    public function setDateBeginRcpro($date_begin_rcpro)
    {
        $this->date_begin_rcpro = $date_begin_rcpro;
    }

    /**
     * @return mixed
     */
    public function getDateEndRcpro()
    {
        return $this->date_end_rcpro;
    }

    /**
     * @param mixed $date_end_rcpro
     */
    public function setDateEndRcpro($date_end_rcpro)
    {
        $this->date_end_rcpro = $date_end_rcpro;
    }

    /**
     * @return mixed
     */
    public function getRegisterCommerce()
    {
        return $this->register_commerce;
    }

    /**
     * @param mixed $register_commerce
     */
    public function setRegisterCommerce($register_commerce)
    {
        $this->register_commerce = $register_commerce;
    }

    /**
     * @return mixed
     */
    public function getAffiliateCodeSend()
    {
        return $this->affiliate_code_send;
    }

    /**
     * @param mixed $affiliate_code_send
     */
    public function setAffiliateCodeSend($affiliate_code_send)
    {
        $this->affiliate_code_send = $affiliate_code_send;
    }

    /**
     * @return mixed
     */
    public function getAffiliateCodeReceive()
    {
        return $this->affiliate_code_receive;
    }

    /**
     * @param mixed $affiliate_code_receive
     */
    public function setAffiliateCodeReceive($affiliate_code_receive)
    {
        $this->affiliate_code_receive = $affiliate_code_receive;
    }


}