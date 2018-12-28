<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

		public function __construct() {
	    parent::__construct();
			/**
			 * this is 2 thing is to dowloded the user model in the Controller
			 * also to use the helper of the url
			 * @var [type]
			 */
      $this->load->model('user_model');
			$this->load->helper('url');

	  }

//-----------------------------------------------------------------------------------------------
/**
 * this function is just to dowloded the view of main
 * and index function main just you oppen the view you find your self on /**
  *
  */

	public function index()
	{
		$this->load->view('main');
	}
	//--------------------------------------------------------
/**
 * this function is just to dowloded the view of choise

 */
	public function userchoise()
	{
		$this->load->view('choise');
	}
	//-------------------------------------------------------------------
	/**
	 * this function is just to dowloded the view of select page

	 */
  public function select()
	{
		$this->load->view('selectpage');
	}
	//----------------------------------------------------------
	/**
	 * this function is just to dowloded the view of creat a count show

	 */
  public function creatcount()
	{
		$this->load->view('creatcountshow');
	}
	//---------------------------------------------------------------------
/**
 * this function to creat acount rsult in this fuction if the information are add sessasufly
 * will be ensert the information on the data by model function,if not it show the same page without data
 * @return null nothing expected
 */


	public function creatcountresult ()
	{
		if($this->input->post("name") || $this->input->post("useremail") || $this->input->post("username")|| $this->input->post("password"))
		{
			$result = $this->user_model->adduser();
			$data = array();
			$data['result'] = $result;
			$this->load->view('creatcountresult',$data);
}
else
{
	$this->load->view('creatcountresult');
}
	}
	//--------------------------------------------------------------------------------------
	/**
	 * this function to add new auther to the data base  it will trader_cdlstalledpattern
	 * the model function and insert this info to the data ,if it failled it show the same view without info
	 */
	public function add_auther()
	{
		if( $this->input->post("AutherName") )
		{
			$result = $this->user_model->addauther();
			$data = array();
			$data['result'] = $result;
			$this->load->view('addauther',$data);
		}
		else
		{
			$this->load->view('addauther');
		}

	}
	//------------------------------------------------------------
/**
 * this function for the user login dowloded view lognin
 * @return [type] [description]
 */
	public function userlogin()
	{
		$this->load->view('lognin');
	}
//////////////////////////////////////////////////////////////////////
/**
 * in this function it is action to enter to the session url if you have correct
 * username and passwold by called the model function to verifiy
 * or select usrer id by the sql quary
 * @return [type] [description]
 */
		public function loginrequest()
		{
				 $result = $this->user_model->login($this->input->post("username"),$this->input->post("password"));
			 if($result == 0)
			 {
					$this->session->set_userdata('isuserloggedin', 'true');
					$this->session->set_userdata('UserID', $result);
					redirect('/user/select');
				}
			else

			 {
				 echo "username or user incorect" ;
			}
		}
		//-------------------------------------------------------------------------
/**
 * in this function it called the sql statement which is join of 5mysql_list_tables
 * to appair as list on the view
 * also they appaire as one table
 * @return [type] [description]
 */
		public function showallitem()
		{
			$all_item = $this->user_model->get_all_item();

			$data = array();
			$data['item'] = $all_item;
			$this->load->view('show_item',$data);
		}
//-----------------------------------------------------------------------
/**
 * this just to dowledd the reserch view
 * @return [type] [description]
 */
		public function reserch()
		{

				$this->load->view('reserch');

		}
		//-----------------------------------------------------------------------------------
/**
 * in this function we do search by post the itemtitle and will go to
 * the model which are sql of join 5 table they join all the table and the list it was based
 * on the post

 */
		public function reserchtitle ()
		{
			if($this->input->post("itemtitle"))
			{
				$result = $this->user_model->searchcontantbytitle($this->input->post("itemtitle"));
				$data = array();
				$data['searchresult'] = $result;
				$this->load->view('showitem',$data);
			}
			else
			{
				$this->load->view('showitem');
			}
			}
//---------------------------------------------------------------------------
/**
 * in this function we do search by post the auther name and will go to
 * the model which are sql of join 5 table they join all the table and the list it was based
 * on the post

 */
	public function reserchauther() {

				if($this->input->post("AutherName"))
				{
					$result = $this->user_model->searchietmsbyautername($this->input->post("AutherName"));
					$data = array();
					$data['searchresult'] = $result;
					//print_r($data['searchresult']);
					$this->load->view('showauther',$data);
				}
				else
				{
					$this->load->view('showauther');
				}
				}
				//------------------------------------------------

				/**
				 * in this function we do search by post the genre type and will go to
				 * the model which are sql of join 5 table they join all the table and the list it was based
				 * on the post

				 */	public function reserchgenre ()
				{
					if($this->input->post("genre"))
					{
						$result = $this->user_model->searchcontantbygenre($this->input->post("genre"));
						$data = array();
						$data['searchresult'] = $result;
						$this->load->view('showgenre',$data);
					}
					else
					{
						$this->load->view('showgenre');
					}
					}

//-----------------------------------------------
/**
 * this function is the logout it use the helper of url to go out Session by doing unset for the userid
 * @return [type] [description]
 */
								public function logout()
								{
									$this->session->unset_userdata('isuserloggedin');
									$this->session->unset_userdata('userid');
									redirect('/user');
								}





		}
