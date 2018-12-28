<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

		public function __construct() {
	    parent::__construct();
			/**
			 * here we dowloded the model main that we use sql which are on the model 'admin model'
			 * @var [type]
			 */
      $this->load->model('admin_model');
			/**
			 * this we do it th use the helper url which is on the codeigniter library
			 * @var [type]
			 */
			$this->load->helper('url');

	  }

		////////////////////////////////////////////////////////////////
/**
 * [userlogin description]this function just to dowloded the view of loginNEW
 * @return null [we are waiting nothing]
 */
		public function userlogin()
		{
			$this->load->view('loginNEW');
		}
///////////////////////////////////////////////////////////////////////////
/**
 * this function is just to see the view creat a count
 */
	public function AAA()
	{
		$this->load->view('creatcountresult');
	}
	//////////////////////////////////////////////////////////////////////////////
/**
 * action to the login form http://localhost/dadii/
 * here we check if we have a correct username and password.
 * if we do, we create a session with keys isuserloggedin & UserID and redicrect to http://localhost/dadii/index.php/admin/mainpage
 * if not, we disply a "wrong username and password message"
 * @return null not returen exspted
 */
			public function loginrequest()
			{
					 $result = $this->admin_model->login($this->input->post("username"),$this->input->post("userpassword"));
				 if($result == 0)
				 {
						echo "username or user incorect" ;
				 }
				else
				{
					 $this->session->set_userdata('isuserloggedin', 'true');
					 $this->session->set_userdata('username', $result);
					 redirect('/user/select');
				 }
			}
	///////////////////////////////////////////////////////////

/**
 * this function is load the view 'code'
 * @return null we do not expted no thing
 */
	public function index()
	{
		$this->load->view('code');
	}
////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * [youareadmin description]this function just lod the admin view
 * @return null no thing
 */
  public function youareadmin()
	{
		$this->load->view('admin');
	}
	//////////////////////////////////////////////////////////////////////////////////////////////
/**
 * in this function add item we well call the function fro admin modal which are
 * getauther-->that will give us the hund to select the auther that already excite on the database
 * getedition-->that will give us the hund to select the edition that already excite on the database
 * getgenre-->that will give us the hund to select the genre_GenreId that already excite on the database
 * getform-->that will give us the hund to select the form that already excite on the database
 * all this model function are are select in the sql
 *
 */
	public function add_item()
	{

		$result = $this->admin_model->getauther();
		$data['autherList'] = $result;
		$result = $this->admin_model->getedition();
		$data['editionList'] = $result;
		$result = $this->admin_model->getgenre();
		$data['genrerList'] = $result;
		$result = $this->admin_model->getform();
		$data['formList'] = $result;
		$this->load->view('addietem',$data);
	}
///////////////////////////////////////////////////////////////////////////////////////////////
/**
 * in this add_item_result we say if insert this information go and use them on the model function which is additem
 * which is insert this information which are (itemtitle-number of page -bestcollection-printday.....) to the data
 * also,in this function we said if we can not insert well it show as message was failed
 */
	public function add_ietm_result()
	{
		if(
	 $this->input->post("ItemTitle") || $this->input->post("NumberPage")
		|| $this->input->post("bestcollection") ||$this->input->post("PrintDay")
		||$this->input->post("DateofPublishing")||$this->input->post("isbnNumber")
		||$this->input->post("auther_AutherId")||$this->input->post("genre_GenreId")
		||$this->input->post("edition_EditionId")	||$this->input->post("form_FornId"))

		{
			$result = $this->admin_model->addietm();
			$data = array();
			$data['result'] = $result;
			$this->load->view('addietmresult',$data);
			}
			else
			 {
				echo "was failed";
			}
		}
	////////////////////////////////////////////////////////////////////////////////////
/**
 * this function is login for admin ,here ,we need to enter the correct code =101 or others that already excite
 * on the database ,if you write smth elso it show for you 'code incorrect'
 * @return null we do not exsept nothing
 */

		public function loginrequestadmin()
{
  $result = $this->admin_model->loginadmin($this->input->post("admincode"));
  if($result!=0)
  {
    $this->session->set_userdata('isuserloggedin', 'true');
    $this->session->set_userdata('admincode', $result);
    redirect('/admin/youareadmin');
  }
  else
   {
     echo "code incorect" ;
    }
  }
/////////////////////////////////////////////////////////////////////////////
/**
 *  this function is to call delateitem in model which is delate the contant of the table contant
 *  after he de redirect to the view delateresultfunc which is result of delate
 */
	public function delat_eitem($id)
	{
		$result=$this->admin_model->delateitem($id);
		redirect('/admin/delateresultfunc');
	}

////////////////////////////////////////////////////////////////////////////
/**
 * this function to add new author in say if you enter the auther name will called the model function
 * which is insert the auther name on the table auther if it was secuseful he well show the view addauther with the data which is add succzsufly
 * if not will show to you the same page without data
 */
  public function add_auther11()
  {
    if( $this->input->post("AutherName") )
    {
      $result = $this->admin_model->addauther();
      $data = array();
      $data['result'] = $result;
      $this->load->view('addauther',$data);
    }
    else
    {
      $this->load->view('addauther');
    }

  }
//////////////////////////////////////////////////////////////////////////////////
	/**
	 * this function to add new genre  in say if you enter the genre type will called the model _functions
	 * which is insert the genre type  on the table genre  if it was secuseful he well show the view addgenre with the data which is add succzsufly
	 * if not will show to you the same page without data
	 */
  public function add_genre()
  {
    if($this->input->post("GenerType") )
    {
      $result = $this->admin_model->addgenre();
      $data = array();
      $data['result'] = $result;
      $this->load->view('addgenre',$data);
    }
    else
    {

      $this->load->view('addgenre');
    }

  }
	/////////////////////////////////////////////////////////////////////////
/**
 * this function to add user which is translate as if we enter the information of the user
 * as name,username,passworld and email call the function adduser on the model to insert this information
 * to database and show for us the message addsussfully however if we does not enter it show the same page without data
 */
	public function add_user()
  {
    if($this->input->post("name")	||$this->input->post("username")	||$this->input->post("password")	||$this->input->post("useremail") )
    {
      $result = $this->admin_model->adduser();
      $data = array();
      $data['result'] = $result;
      $this->load->view('aaa',$data);
    }
    else
    {

      $this->load->view('aaa');
    }

  }
	//////////////////////////////////////////////////////////////////////////////////////
	/**
	 * this function to add new edition  in say if you enter the edition number  will called the model _functions
	 * which is insert the edition number   on the table genre  if it was secuseful he well show the view addedition with the data which is add succzsufly
	 * if not will show to you the same page without data
	 */
  public function add_edition()
  {
    if($this->input->post("EditionNumber") )
    {
      $result = $this->admin_model->addedition();
      $data = array();
      $data['result'] = $result;
      $this->load->view('addedition');
    }
    else
    {

      $this->load->view('addedition');
    }

  }
////////////////////////////////////////////////////////////////////////////
/**
 * this function just to dowloded the view of login (this view have no relation with login in just show message that edition is
 * add succesfully)
 * @return null no thing
 */
public function resuttedition()
{

	$this->load->view('login');
}

	/////////////////////////////////////////////////////////////
	/**
	 * this function is just to dowloded the view of admin research
	 * @return null no thing
*/
	public function reserch()
	{

			$this->load->view('adminreserch');

	}
///////////////////////////////////////////////////////////////////////////////////
/**
 * this is function of reserach for the admin by ItemTitle
 * this function it relate between the sql statemt (quary) of the join of 5 table where the ItemTitle
 * and the view of the serach where there are the boxs of writte
 *
 * @return result the list of the item that have the same name
 * when we past -->cheak if there is -->it show to you result
 */
	public function reserchtitleadmin ()
	{
		if($this->input->post("itemtitle"))
		{
			$result = $this->admin_model->searchcontantbytitleadmin($this->input->post("itemtitle"));
			$data = array();
			$data['searchresult'] = $result;
			$this->load->view('adminitem',$data);
		}
		else
		{
			$this->load->view('adminitem');
		}
		}

///////////////////////////////////////////////////////
/**
 * this is function of reserach for the admin by author name
 * this function it relate between the sql statemt (quary) of the join of 5 table where the auther name
 * and the view of the serach where there are the boxs of writte
 *
 * @return result the list of the item that have the same author  name
 * when we past -->cheak if there is -->it show to you result
 */
public function reserchautheradmin() {

			if($this->input->post("AutherName"))
			{
				$result = $this->admin_model->searchietmsbyauternameadmin($this->input->post("AutherName"));
				$data = array();
				$data['searchresult'] = $result;
				//print_r($data['searchresult']);
				$this->load->view('adminauther',$data);
			}
			else
			{
				$this->load->view('adminauther');
			}
			}
//////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * this is function of reserach for the admin by genre type
 * this function it relate between the sql statemt (quary) of the join of 5 table where the Genre type
 * and the view of the serach where there are the boxs of writte
 *
 * @return result the list of the item that have the genre type
 * when we past -->cheak if there is -->it show to you result
 */
			public function reserchgenreadmin ()
			{
				if($this->input->post("genre"))
				{
					$result = $this->admin_model->searchcontantbygenreadmin($this->input->post("genre"));
					$data = array();
					$data['searchresult'] = $result;
					$this->load->view('admingenre',$data);
				}
				else
				{
					$this->load->view('admingenre');
				}
				}
				////////////////////////////////////////////////////////////////////////
/**
 * this function is used for edit book in this function we called the model function which add_ietm_result
 * getauther,getedition,getform,getgenre in this function is use to select the data that already existe
 * or are alredy insert to data
 * also for get contant to select the contant table information that exciste
 * also to select the information that are on the midle table between contant and auther ,contant and edition,,ect,,
 * to when we show the page of the edit it show for us the information that are already save about this item

 */
				public function editbook($id)
				{

					$result = $this->admin_model->getauther();
					$data['autherList'] = $result;
					$result = $this->admin_model->getedition();
					$data['editionList'] = $result;
					$result = $this->admin_model->getform();
					$data['formList'] = $result;
					$result = $this->admin_model->getgenre();
					$data['genreList'] = $result;
					$result = $this->admin_model->getcontant($id);
					$data['contant'] = array_pop($result);
					$result = $this->admin_model->getautherbycontant($id);
			$data['auther_has_contant'] = $result;
					$result = $this->admin_model->getgenrebycontant($id);
					$data['genre_has_contant'] = $result;
					$result = $this->admin_model->geteditionbycontant($id);
					$data['edition_has_contant'] = $result;
				$result = $this->admin_model->getformbycontant($id);
					$data['form_has_contant'] = $result;
					$this->load->view('update',$data);
				}
		//////////////////////////////////////////////////////////////////////////

			/**
			 * this function just to dowloded the view of delateresult
			 */
		public function delateresultfunc()
				{
					$this->load->view('delateresult');
				}
			/////////////////////////////////////////////////////////////
		/**
		 * this update function is used to update data in the our database systeam
		 * we see in this function update the fello information in our database systeam
		 * @return [type] [description]
		 */
				public function updateitem()
				{
					if( $this->input->post("ItemTitle")
					|| $this->input->post("NumberPage")|| $this->input->post("bestcollection")
				|| $this->input->post("PrintDay")
					||$this->input->post("DateofPublishing")||$this->input->post("isbnNumber")
					|| $this->input->post("auther_AutherId")|| $this->input->post("genre_GenreId")
					|| $this->input->post("edition_EditionId")|| $this->input->post("form_FornId"))
					{
						$result = $this->admin_model->updateietm();
						$data = array();
						$data['result'] = $result;
						$this->load->view('updateresult',$data);
					}
				}
				/**
				 * the idea or the tecnique used in this edition is
				 * first select all the information of the book when we clik update it appaire all their information
				 * second update the information of the contant mysql_list_tables
				 * however the auther table is delate nformation and thein insert new one
				 * under the case of update
				 */

}
