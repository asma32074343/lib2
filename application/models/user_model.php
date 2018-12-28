<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  /////////////////////////////////////////////////////////////////////////////////////

 function adduser() {
$data = array(

  'useremail' => $this->input->post("useremail"),
  'password' => $this->input->post("password"),
  'username' => $this->input->post("username"),
    'username' => $this->input->post("name")
  );
$this->db->insert('user', $data);

$lastuserid = $this->db->insert_id();


return 1;
}

/////////////////////////////////


function addauther() {
  $data = array(

        'AutherName' => $this->input->post("AutherName")

);

$this->db->insert('auther', $data);
$lastAutherId = $this->db->insert_id();
return 1;
}
//--------------------------------------------------------------------------------------



  function login($username, $password)
  {
    $sql = "select UserID from user where username ='$username' AND password='$password'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)

    {
      return 1;
    }
    else {
      return 0;
    }
    }

//----------------------------------------------------------------------------

      function get_all_item() {
        $sql =" select contant.IsbnNnumber,contant.DateofPublishing,contant.isbnNumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,contant.PrintDay,auther.AutherName ,form.FormType, genre.GenerType ,edition.EditionNumber FROM( ((((((contant INNER join auther_has_contant on contant.IsbnNnumber=auther_has_contant.contant_IsbnNnumber) INNER join auther ON auther_has_contant.auther_AutherId=auther.AutherId)inner join form_has_contant on contant.IsbnNnumber=form_has_contant.contant_IsbnNnumber)INNER join form on form_has_contant.form_FornId=form.FormId) inner join edition_has_contant on contant.IsbnNnumber=edition_has_contant.contant_IsbnNnumber) INNER JOIN edition on edition_has_contant.edition_EditionId=edition.EditionId) inner join genre_has_contant on contant.IsbnNnumber=genre_has_contant.contant_IsbnNnumber) inner JOIN genre on genre_has_contant.genre_GenreId=genre.GenreId;";
        $query = $this->db->query($sql);
        $results = array();
        foreach ($query->result() as $x) {
          $results[] = $x;
        }
        return $results;

      }
      //-------------------------------------------------------------------------------
      function searchcontantbytitle($ItemTitle) {
        $sql = "select contant.IsbnNnumber,contant.DateofPublishing,contant.isbnNumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,contant.PrintDay,auther.AutherName ,form.FormType, genre.GenerType ,edition.EditionNumber FROM( ((((((contant INNER join auther_has_contant on contant.IsbnNnumber=auther_has_contant.contant_IsbnNnumber) INNER join auther ON auther_has_contant.auther_AutherId=auther.AutherId)inner join form_has_contant on contant.IsbnNnumber=form_has_contant.contant_IsbnNnumber)INNER join form on form_has_contant.form_FornId=form.FormId) inner join edition_has_contant on contant.IsbnNnumber=edition_has_contant.contant_IsbnNnumber) INNER JOIN edition on edition_has_contant.edition_EditionId=edition.EditionId) inner join genre_has_contant on contant.IsbnNnumber=genre_has_contant.contant_IsbnNnumber) inner JOIN genre on genre_has_contant.genre_GenreId=genre.GenreId where ItemTitle LIKE '%{$ItemTitle	}%'";
        $query = $this->db->query($sql, $ItemTitle);
        $results = array();
        foreach ($query->result() as $result) {
          $results[] = $result;
        }

        return $results;
      }
      //------------------------------------------------------------------------------------
      function searchietmsbyautername($AutherName) {
        $sql = "select contant.IsbnNnumber,contant.DateofPublishing,contant.isbnNumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,contant.PrintDay,auther.AutherName ,form.FormType, genre.GenerType ,edition.EditionNumber FROM( ((((((contant INNER join auther_has_contant on contant.IsbnNnumber=auther_has_contant.contant_IsbnNnumber) INNER join auther ON auther_has_contant.auther_AutherId=auther.AutherId)inner join form_has_contant on contant.IsbnNnumber=form_has_contant.contant_IsbnNnumber)INNER join form on form_has_contant.form_FornId=form.FormId) inner join edition_has_contant on contant.IsbnNnumber=edition_has_contant.contant_IsbnNnumber) INNER JOIN edition on edition_has_contant.edition_EditionId=edition.EditionId) inner join genre_has_contant on contant.IsbnNnumber=genre_has_contant.contant_IsbnNnumber) inner JOIN genre on genre_has_contant.genre_GenreId=genre.GenreId
         where AutherName LIKE '%{$AutherName}%'";
        $query = $this->db->query($sql,$AutherName);
        $results = array();
        foreach ($query->result() as $result) {
          $results[] = $result;
        }
        return $results;
      }
      //--------------------------------------------------------------------------------------------
      function searchcontantbygenre($GenerType	) {
        $sql = "select contant.IsbnNnumber,contant.DateofPublishing,contant.isbnNumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,contant.PrintDay,auther.AutherName ,form.FormType, genre.GenerType ,edition.EditionNumber FROM( ((((((contant INNER join auther_has_contant on contant.IsbnNnumber=auther_has_contant.contant_IsbnNnumber) INNER join auther ON auther_has_contant.auther_AutherId=auther.AutherId)inner join form_has_contant on contant.IsbnNnumber=form_has_contant.contant_IsbnNnumber)INNER join form on form_has_contant.form_FornId=form.FormId) inner join edition_has_contant on contant.IsbnNnumber=edition_has_contant.contant_IsbnNnumber) INNER JOIN edition on edition_has_contant.edition_EditionId=edition.EditionId) inner join genre_has_contant on contant.IsbnNnumber=genre_has_contant.contant_IsbnNnumber) inner JOIN genre on genre_has_contant.genre_GenreId=genre.GenreId where GenerType LIKE '%{$GenerType	}%'";
        $query = $this->db->query($sql);
        $results = array();
        foreach ($query->result() as $result) {
          $results[] = $result;
        }
        return $results;
      }

}
