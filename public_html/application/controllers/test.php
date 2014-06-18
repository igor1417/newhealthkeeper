<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->database();

		
		$id = 749936;
		$sql="SELECT * FROM user WHERE id_user=:id LIMIT 1";
	    
	    $stmt = $this->db->conn_id->prepare($sql);//prepare the query
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);//assign params
		$stmt->execute();//execute query

		$userinfo = $stmt->fetch();

		//user the data
		echo $userinfo['email_user'];
		echo $userinfo['type_user']; 
	}
	
	public function query($sql,$params=array(),$modo="")
        {   
        
			$pdo = new PDO("mysql:host=localhost;dbname=devhealt_db,
                root,31204",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                                                  PDO::ATTR_EMULATE_PREPARES => false, 
                                                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            try 
            {     
                if($modo == "")
                {
                    $query = $pdo->prepare($sql);

                    if(preg_match("/^select/", strtolower($sql))){
                            $query->execute($params);
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        $res["result"]=count($res);
                            return $res;
                    }else{
                            return $query->execute($params);    
                    }
                }
                    elseif ($modo == "exec") {
                        return $pdo->exec($sql);
                    }
                    
            }
            catch(PDOException $err)
            {
                $myError = new Error();
                $myError->exceptionHandling($err);
            }
            catch (Exception $err)
            {
                $myError = new Error();
                $myError->exceptionHandling($err);
            }
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */