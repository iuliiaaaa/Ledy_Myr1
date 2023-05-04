<?php

namespace app\models;

use app\base\PDOConnection;

class Information
{
    public static function getAlltopicalIssues(){
        $query = PDOConnection::make()->query("SELECT * FROM `topical_issues`");
        return $query->fetchAll();
    }
    public static function getAllaboutAs(){
        $query = PDOConnection::make()->query("SELECT * FROM `about_us`");
        return $query->fetchAll();
    }
    public static function addTopicalIssues($name, $text){
        $query = PDOConnection::make()->prepare("INSERT INTO `topical_issues` (id, name, text) VALUES (NULL, :name, :text);");
        $query->execute(["name" => $name, "text"=>$text]);
        return $query->fetchAll();
    }
    public static function deleteTopicalIssues($id){
        $query = PDOConnection::make()->prepare("DELETE FROM `topical_issues` WHERE id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }
    public static function getTagline(){
        $query = PDOConnection::make()->query("SELECT tagline FROM `about_us` WHERE id = 1");
        return $query->fetchAll();
    }
    public static function redactTagline($text){
        $query = PDOConnection::make()->prepare("UPDATE `about_us` SET tagline = :text WHERE about_us.id = 1;");
        $query->execute(["text"=>$text]);
        return $query->fetchAll();
    }
    
    public static function findWeShouldTrustImage($we_should_trust_image)
    {
        $query = PDOConnection::make()->prepare("SELECT image, id FROM we_should_trusts WHERE id = ?");
        $query->execute([$we_should_trust_image]);
        return $query->fetch();
    }
    public static function getWeShouldTrust(){
        $query = PDOConnection::make()->query("SELECT * FROM `we_should_trusts`");
        return $query->fetchAll();
    }
    public static function addWeShouldTrustImage($text, $image)
    {
        $query = PDOConnection::make()->prepare("INSERT INTO we_should_trusts (id, text, image) VALUES (NULL, :text, :image);");
        $query->execute(["text"=>$text,"image"=>$image]);
        return $query->fetch();
    }
    public static function deleteWeShouldTrust($id){
        $query = PDOConnection::make()->prepare("DELETE FROM `we_should_trusts` WHERE id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }
    public static function getContacts(){
        $query = PDOConnection::make()->query("SELECT * FROM contacts");
        return $query->fetchAll();
    }
    public static function addPhone($phone){
        $query = PDOConnection::make()->prepare("INSERT INTO contacts (id, phone, mail, social_media) VALUES (NULL, :phone, NULL, NULL);
        ");
        $query->execute(["phone" => $phone]);
        return $query->fetchAll();
    }
    public static function addMail($mail){
        $query = PDOConnection::make()->prepare("INSERT INTO contacts (id, phone, mail, social_media) VALUES (NULL, NULL, :mail, NULL);
        ");
        $query->execute(["mail" => $mail]);
        return $query->fetchAll();
    }
    public static function addSocial($social){
        $query = PDOConnection::make()->prepare("INSERT INTO contacts (id, phone, mail, social_media) VALUES (NULL, NULL, NULL, :social);");
        $query->execute(["social" => $social]);
        return $query->fetchAll();
    }
    public static function getPhone(){
        $query = PDOConnection::make()->query("SELECT id, phone FROM `contacts` WHERE phone IS NOT NULL");
        return $query->fetchAll();
    }
    public static function getMail(){
        $query = PDOConnection::make()->query("SELECT id, mail FROM `contacts` WHERE mail IS NOT NULL");
        return $query->fetchAll();
    }    public static function getSocial(){
        $query = PDOConnection::make()->query("SELECT id, social_media FROM `contacts` WHERE social_media IS NOT NULL");
        return $query->fetchAll();
    }
    public static function deletePhone($id){
        $query = PDOConnection::make()->prepare("DELETE FROM contacts WHERE contacts.id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }
    public static function deleteMail($id){
        $query = PDOConnection::make()->prepare("DELETE FROM contacts WHERE contacts.id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }
    public static function deleteSocial($id){
        $query = PDOConnection::make()->prepare("DELETE FROM contacts WHERE contacts.id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }
    public static function getPayments(){
        $query = PDOConnection::make()->query("SELECT * FROM `payments`");
        return $query->fetchAll();
    }
    public static function getDelivery(){
        $query = PDOConnection::make()->query("SELECT * FROM `delivery`");
        return $query->fetchAll();
    }

}
