<?php

class Form_validate{
		public $postData;
		public $fileData;
		function __construct(){

				$ci=&get_instance();
				$ci->load->helper('validation_helper');
				//$ci->load->library('Basic');
			}

		function fileValid(){

			$error='';
                //return $this->fileData;
			if (!empty($this->fileData)){
                //return $this->fileData;
                $types = array("document", "optional","image");
				foreach ($this->fileData as $key=>$rec) {
                    $vd = explode('_', $key);
                    //print_r($rec);
                    //return $vd[1];
                    if (isset($vd[1]) && in_array(strtolower($vd[1]), $types)) {
                        $vcount = count($vd);
                        if ($vcount == 3) {
                            //echo'<pre>';print_r($rec);
                            for ($i = 0; $i <= count($rec['name']); $i++) {
                                $j = 0;
                                $chk_val = check_file_extension($rec['name'][$j], $vd[1]);
                                if ($chk_val == FALSE) {
                                    $error = 'Please select only pdf,doc,docx,txt,rtf file.';
                                }elseif($rec['name']==''){
                                    $error = 'Please select file';
                                }
                                $j++;
                            }
                        }
                        if ($vcount == 2) {

                           $chk_val = check_file_extension($rec['name'], $vd[1]);

                            if ($chk_val == FALSE) {
                                $error = 'Please select only pdf,doc,docx,txt,rtf file.';
                            }elseif($rec['name']==''){
                                $error = 'Please select file';
                            }
                        }

                    }else{$error="Invalid FormData";}
                }
			}
			return $error;
		}
		function postValid(){
			$error=array();
			$data  = array();

				//return $this->postData;
				$types = array("email", "optional","varchar", "string", "int","password","url","alphanum");

				foreach ($this->postData as $key=>$value){
						$vd = explode('-', $key);
						//return $vd;
                    if (isset($vd[1]) && in_array($vd[1], $types))
                    {
                    $vcount=count($vd);
						if($vcount==5)
						{$i=0;
						foreach($value as $ak=>$av)
							{
								if($vd[1]=='email'){$error[$vd[0]][$ak]=email_validate($vd[0],$av,$vd[2],$vd[3]);}
								else if($vd[1]=='varchar'){$error[$vd[0]][$ak]=varchar_validate($vd[0],$av,$vd[2],$vd[3]);}
								else if($vd[1]=='string'){$error[$vd[0]][$ak]=string_validate($vd[0],$av,$vd[2],$vd[3]);}
								else if($vd[1]=='int'){$error[$vd[0]][$ak]=int_validate($vd[0],$av,$vd[2],$vd[3]);}
								else if($vd[1]=='optional'){$error[$vd[0]][$ak]=optional_validate($vd[0],$av,$vd[2],$vd[3]);}
								else if($vd[1]=='url'){$error[$vd[0]][$ak]=url_validate($vd[0],$av,$vd[2],$vd[3]);}
								else if($vd[1]=='alphanum'){$error[$vd[0]][$ak]=alphanum_validate($vd[0],$av,$vd[2],$vd[3]);}
								if($error[$vd[0]][$ak]=='')unset($error[$vd[0]]);
								$data[$vd[0]][$i] = $av;
								$i++;
							}
						}
						if($vcount==4)
						{
							//print_r($vd);
							if($vd[1]=='email'){$error[$vd[0]]=email_validate($vd[0],$value,$vd[2],$vd[3]);}
							else if($vd[1]=='password'){$error[$vd[0]]=password_validate($vd[0],$value,$vd[2],$vd[3]);}
							else if($vd[1]=='varchar'){$error[$vd[0]]=varchar_validate($vd[0],$value,$vd[2],$vd[3]);}
							else if($vd[1]=='string'){$error[$vd[0]]=string_validate($vd[0],$value,$vd[2],$vd[3]);}
							else if($vd[1]=='int'){$error[$vd[0]]=int_validate($vd[0],$value,$vd[2],$vd[3]);}
							else if($vd[1]=='optional'){$error[$vd[0]]=optional_validate($vd[0],$value,$vd[2],$vd[3]);}
							else if($vd[1]=='url'){$error[$vd[0]]=url_validate($vd[0],$value,$vd[2],$vd[3]);}
							else if($vd[1]=='alphanum'){$error[$vd[0]]=alphanum_validate($vd[0],$value,$vd[2],$vd[3]);}
							$data[$vd[0]] = $value;
						}
					}else{$error[$vd[0]]="Invalid FormData";}
				$err = array_filter($error, function($value) { return $value != ''; });


			}
            return array('error'=> $err,'data'=>$data);
		}

	}
	
//$fd = new formValidation($_POST,$_FILES);
//print_r($fd->postValid());

?>