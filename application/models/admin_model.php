<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model
 {
  function __construct()
  {
    parent::__construct();
  }

  /////////////////////
/*  function adduser() {
$data = array(
  'name' => $this->input->post("name"),
  'useremail' => $this->input->post("useremail"),
  'password' => $this->input->post("password"),
  'username' => $this->input->post("username")
  );
$this->db->insert('user', $data);

$lastuserid = $this->db->insert_id();


return 1;
}
*/
/**
 * [login description]
 * @param  [type] $username [description]
 * @param  [type] $password [description]
 * @return [type]           [description]
 */
  function login($username, $password)
  {
    $sql = "select useremail from User where username ='$username' AND password='$password'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)

    {
      return 1;
    }
    else {
      return 0;
    }
    }
  //-------------------------------------------------------------------------------
  function loginadmin($admincode)
  {
      $sql = "select admincode from admin where admincode = $admincode";
      echo $sql;
      $query = $this->db->query($sql);
      if(count($query->result()) == 1)
       {
        return $query->row()->admincode;
      }
      else
      {
        return 0;
      }
  }
  //--------------------------------------------------------------
/*  function login($User,$Pass)
  {
      $sql = "select * from user where Username ='$User' AND Password='$Pass'";
      echo $sql;
      $query = $this->db->query($sql);
      if(count($query->result()) == 1)
       {
        return $query->row()->UserID;
      }
      else
      {
        return 0;
      }
  }
  /*///------------------------------------------------------------------------------------
  function addauther() {
      $data = array(

            'AutherName' => $this->input->post("AutherName")

      );

      $this->db->insert('auther', $data);
      $lastAutherId = $this->db->insert_id();
      return 1;
  }
  //--------------------------------------------------------------------------
  function addgenre() {
    $data = array(

          'GenerType' => $this->input->post("GenerType")

    );

    $this->db->insert('genre', $data);
    $lastGenerId = $this->db->insert_id();
    return 1;
  }
  ///////////////////////////////////
  function adduser() {
    $data = array(

          '	useremail' => $this->input->post("useremail"),
            'password' => $this->input->post("password"),
              'username' => $this->input->post("username"),
                'name' => $this->input->post("name")

    );

    $this->db->insert('user', $data);
    $lastuserid = $this->db->insert_id();
    return 1;
  }
  //--------------------------------------------------------------------------------
  function addedition() {
    $data = array(

          'EditionNumber' => $this->input->post("EditionNumber")

    );

    $this->db->insert('edition', $data);
    $lastEditionId = $this->db->insert_id();
    return 1;
  }
  ////////////////////////////////////////////////////////////////////////////////////////////////
  function addietm() {
    $data = array(

            'ItemTitle' => $this->input->post("ItemTitle"),
            'NumberPage' => $this->input->post("NumberPage"),
            'bestcollection' => $this->input->post("bestcollection"),
            'PrintDay' => $this->input->post("PrintDay"),
              'isbnNumber' => $this->input->post("isbnNumber"),
                'DateofPublishing' => $this->input->post("DateofPublishing")

    );
    $this->db->insert('contant', $data);

    $lastIsbnNnumber = $this->db->insert_id();

    $auther = $this->input->post("auther");
    foreach($auther as $auther)
    {
      $data = array(
              'contant_IsbnNnumber' => $lastIsbnNnumber,
              'auther_AutherId' => $auther,
      );
      $this->db->insert('auther_has_contant', $data);
    }
    $genre= $this->input->post("genre");
    foreach($genre as $genre)
    {
      $data = array(
              'contant_IsbnNnumber' => $lastIsbnNnumber,
              'genre_GenreId' => $genre,
      );
      $this->db->insert('genre_has_contant', $data);
    }
    $edition= $this->input->post("edition");
    foreach($edition as $edition)
    {
      $data = array(
              'contant_IsbnNnumber' => $lastIsbnNnumber,
              'edition_EditionId' => $edition,
      );
      $this->db->insert('edition_has_contant', $data);
    }
    $form= $this->input->post("form");
    foreach($form as $form)
    {
      $data = array(
              'contant_IsbnNnumber' => $lastIsbnNnumber,
              'form_FornId' => $form,
      );
      $this->db->insert('form_has_contant', $data);
    }

    return 1;
  }
  ////////////////////////////////////////////////////////////////////////////////////////////////


  function getedition() {
    $sql = "select * from edition";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //----------------------------------------------------------------------------
  function getform() {
    $sql = "select * from form";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //--------------------------------------------------------------------
  function getauther() {
    $sql = "select * from auther";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //-----------------------------------------------------------------------------
  function getgenre() {
    $sql = "select * from genre";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //-----------------------------------------------------------------------------
  function getcontant($id){
    $sql = "select * from contant where IsbnNnumber=$id";
    $query = $this->db->query($sql);
    return $query->result();
  }
  //---------------------------------------------------------------------------
  function getautherbycontant($id){
    $sql = "select * from auther_has_contant where contant_IsbnNnumber=$id";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //--------------------------------------------------------------------------------
  function getgenrebycontant($id){
    $sql = "select * from genre_has_contant where contant_IsbnNnumber=$id";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //--------------------------------------------------------------------------------------
  function geteditionbycontant($id){
    $sql = "select * from edition_has_contant where contant_IsbnNnumber=$id";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //--------------------------------------------------------------------------------
  function getformbycontant($id){
    $sql = "select * from form_has_contant where contant_IsbnNnumber=$id";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //-------------------------------------------------------------------------------
  function searchcontantbytitleadmin($ItemTitle){
    $sql =  "select contant.IsbnNnumber,contant.DateofPublishing,contant.isbnNumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,contant.PrintDay,auther.AutherName ,form.FormType, genre.GenerType ,edition.EditionNumber FROM( ((((((contant INNER join auther_has_contant on contant.IsbnNnumber=auther_has_contant.contant_IsbnNnumber) INNER join auther ON auther_has_contant.auther_AutherId=auther.AutherId)inner join form_has_contant on contant.IsbnNnumber=form_has_contant.contant_IsbnNnumber)INNER join form on form_has_contant.form_FornId=form.FormId) inner join edition_has_contant on contant.IsbnNnumber=edition_has_contant.contant_IsbnNnumber) INNER JOIN edition on edition_has_contant.edition_EditionId=edition.EditionId) inner join genre_has_contant on contant.IsbnNnumber=genre_has_contant.contant_IsbnNnumber) inner JOIN genre on genre_has_contant.genre_GenreId=genre.GenreId where ItemTitle LIKE '%{$ItemTitle	}%'";
    $query = $this->db->query($sql, $ItemTitle);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }

    return $results;
  }
  //---------------------------------------------------------------------------------------
  function searchietmsbyauternameadmin($AutherName) {
    $sql = "select contant.IsbnNnumber,contant.DateofPublishing,contant.isbnNumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,contant.PrintDay,auther.AutherName ,form.FormType, genre.GenerType ,edition.EditionNumber FROM( ((((((contant INNER join auther_has_contant on contant.IsbnNnumber=auther_has_contant.contant_IsbnNnumber) INNER join auther ON auther_has_contant.auther_AutherId=auther.AutherId)inner join form_has_contant on contant.IsbnNnumber=form_has_contant.contant_IsbnNnumber)INNER join form on form_has_contant.form_FornId=form.FormId) inner join edition_has_contant on contant.IsbnNnumber=edition_has_contant.contant_IsbnNnumber) INNER JOIN edition on edition_has_contant.edition_EditionId=edition.EditionId) inner join genre_has_contant on contant.IsbnNnumber=genre_has_contant.contant_IsbnNnumber) inner JOIN genre on genre_has_contant.genre_GenreId=genre.GenreId
     where AutherName LIKE '%{$AutherName}%'";
    $query = $this->db->query($sql,$AutherName);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //---------------------------------------------------------------------------------------
  function searchcontantbygenreadmin($GenerType	){
    $sql = "select contant.IsbnNnumber,contant.DateofPublishing,contant.isbnNumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,contant.PrintDay,auther.AutherName ,form.FormType, genre.GenerType ,edition.EditionNumber FROM( ((((((contant INNER join auther_has_contant on contant.IsbnNnumber=auther_has_contant.contant_IsbnNnumber) INNER join auther ON auther_has_contant.auther_AutherId=auther.AutherId)inner join form_has_contant on contant.IsbnNnumber=form_has_contant.contant_IsbnNnumber)INNER join form on form_has_contant.form_FornId=form.FormId) inner join edition_has_contant on contant.IsbnNnumber=edition_has_contant.contant_IsbnNnumber) INNER JOIN edition on edition_has_contant.edition_EditionId=edition.EditionId) inner join genre_has_contant on contant.IsbnNnumber=genre_has_contant.contant_IsbnNnumber) inner JOIN genre on genre_has_contant.genre_GenreId=genre.GenreId where GenerType LIKE '%{$GenerType	}%'";
    $query = $this->db->query($sql,$GenerType);

    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  //---------------------------------------------------------------
  function updateietm(){

     $Item = $this->input->post("ItemTitle");
     $Number = $this->input->post("NumberPage");
     $best = $this->input->post("bestcollection");

     $Print = $this->input->post("PrintDay");
     $Date = $this->input->post("DateofPublishing");
     $isbnn = $this->input->post("isbnNumber");
      $id = $this->input->post("isbnNnumber");
  /*  $sql = "update contant
     set bestcollection =$best,
    ItemTitle=$Item,
    NumberPage=$Number,
    PrintDay=$Print,
isbnNumber=$isbnn,
    DateofPublishing=$Date
    where IsbnNnumber=$id";
    */
    $sql="update contant SET ItemTitle='$Item',
    NumberPage=$Number,bestcollection='$best',PrintDay=$Print,DateofPublishing=$Date,
    isbnNumber=$isbnn WHERE IsbnNnumber='$id'";
    $query = $this->db->query($sql);


    $sql = "delete from auther_has_contant where contant_IsbnNnumber = $id";
    $query = $this->db->query($sql);

    $auther = $this->input->post("auther");
    if(!isset($auther))
    {
      return 1;
    }
    foreach($auther as $auther)
    {
      $data = array(
              'contant_IsbnNnumber' => $Isbn,
              'auther_AutherId' => $auther,
      );
      $this->db->insert('auther_has_contant', $data);
    }
    $sql = "delete from genre_has_contant where contant_IsbnNnumber = $id";
    $query = $this->db->query($sql);

    $genre = $this->input->post("genre");
    if(!isset($genre))
    {
      return 1;
    }
    foreach($genre as $genre)
    {
      $data = array(
              'contant_IsbnNnumber' => $Isbn,
              'genre_GenreId' => $genre,
      );
      $this->db->insert('genre_has_contant', $data);
    }
    $sql = "delete from edition_has_contant where contant_IsbnNnumber = $id";
    $query = $this->db->query($sql);

    $edition= $this->input->post("edition");
    if(!isset($edition))
    {
      return 1;
    }
    foreach($edition as $edition)
    {
      $data = array(
              'contant_IsbnNnumber' => $Isbn,
              'edition_EditionId' => $edition,
      );
      $this->db->insert('edition_has_contant', $data);
    }
    $sql = "delete from  form_has_contant where contant_IsbnNnumber =$id";
    $query = $this->db->query($sql);

    $form = $this->input->post("form");
    if(!isset($form))
    {
      return 1;
    }
    foreach($form as $form)
    {
      $data = array(
              'contant_IsbnNnumber' => $Isbn,
              'form_FornId' => $form,
      );
      $this->db->insert('form_has_contant', $data);
    }

  }
  //------------------------------------------------------------------------------
  function delateitem ($id){
    $sql= "delete from  contant where IsbnNnumber =$id";
      $query = $this->db->query($sql);
  }
//  function delateietm(){

  //  $sql = "delate from contant where IsbnNnumber=$IsbnNnumber"


  //  $sql = "delete from auther_has_contant where contant_IsbnNnumber = $contant_IsbnNnumber";



  //  $sql = "delete from genre_has_contant where contant_IsbnNnumber = $contant_IsbnNnumber";



  //  $sql = "delete from edition_has_contant where contant_IsbnNnumber = $contant_IsbnNnumber";




  //  $sql = "delete from  form_has_contant where contant_IsbnNnumber = $contant_IsbnNnumber";
  //  $query = $this->db->query($sql);



}
