<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header("Content-type:application/json",true);
header("content-type: text/html; charset=utf-8");
// header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

$app->group('/api', function () use ($app) {
    
    // Retrieve game all record use fetchAll()     
    $app->get('/game', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM game ORDER BY game_id");
        $sth->execute();
        $data = $sth->fetchAll();
        $games = array("games"=>$data);
        return $this->response->withJson($games);
   });    

    // Retrieve todo with id (get 1 record) use fetchObject()
    $app->get('/game/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM game WHERE game_id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $data = $sth->fetchObject();
        $games = array("games"=>array($data));
        return $this->response->withJson($games);
    });

    // Search for todo with given search term in their name
    $app->get('/game/search/[{query}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM game WHERE UPPER(game_name) LIKE :query ORDER BY game_id");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $data = $sth->fetchAll();
        $games = array("games"=>$data);
        return $this->response->withJson($games);
    });
        
    $app->post('/game', function ($request, $response) {
        $input = $request->getParsedBody();
        $newfileName = "";        
        if($input['game_img'] != 'no_image'){
            try{
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $ext = pathinfo($target_file,PATHINFO_EXTENSION);
                $newfileName = "pict_" . date("Ymd_His") . "_".substr(sha1(rand()), 0, 10) . "." .$ext;
                $newfileNameAndPath = $target_dir . $newfileName;
                $uploadOk = 1;
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $newfileNameAndPath)) {
                        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
                        $uploadOk = 1;               
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                        $newfileName = "";
                        
                    }
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                    $newfileName = "";
                }
            }catch(Exception $ex){
                return $this->response->withJson($ex);
            }
        }        
        //--- insert data to db
        $sql = "INSERT INTO game (game_id,game_name,game_price,game_detail,game_img,game_stock) VALUES (:game_id,:game_name,:game_price,:game_detail,:game_img,:game_stock)";
        $sth = $this->db->prepare($sql);
        $sth->bindParam("game_id", $input['game_id']);
        $sth->bindParam("game_name", $input['game_name']);
        $sth->bindParam("game_price", $input['game_price']);
        $sth->bindParam("game_detail", $input['game_detail']);
        //$sth->bindParam("game_img", $input['game_img']);
        $sth->bindParam("game_img", $newfileName);
        $sth->bindParam("game_stock", $input['game_stock']);  

        try{
            $sth->execute();
            $count = $sth->rowCount();
            return $this->response->withJson($count);
        }catch(PDOException $e){
            //echo($e);
            return $this->response->withJson(0);
        }
    });    

    // DELETE a game with given id
    $app->delete('/game/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("DELETE FROM game WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $count = $sth->rowCount();
        return $this->response->withJson($count);
    });

    // Update game with given id // put method is does not work!!!! use post instead
    $app->post('/game/[{id}]', function ($request, $response, $args) {
        $input = $request->getParsedBody();
        $newfileName = "";        
        if($input['game_img'] != 'no_image'){
            try{
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $ext = pathinfo($target_file,PATHINFO_EXTENSION);
                $newfileName = "pict_" . date("Ymd_His") . "_".substr(sha1(rand()), 0, 10) . "." .$ext;
                $newfileNameAndPath = $target_dir . $newfileName;
                $uploadOk = 1;
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $newfileNameAndPath)) {
                        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
                        $uploadOk = 1;               
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                        $newfileName = ""; 
                    }
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                    $newfileName = "";
                }
            }catch(Exception $ex){
                return $this->response->withJson($ex);
            }
        }

        if($newfileName != ""){
            $sql = "UPDATE game SET game_name=:game_name, game_price=:game_price, game_detail=:game_detail, game_img=:game_img, game_stock=:game_stock WHERE id=:id";
        }else{
            $sql = "UPDATE game SET game_name=:game_name, game_price=:game_price, game_detail=:game_detail, game_stock=:game_stock WHERE id=:id";
        }
        
        $sth = $this->db->prepare($sql);
        $sth->bindParam("id", $args['id']);
        $sth->bindParam("game_name", $input['game_name']);
        $sth->bindParam("game_price", $input['game_price']);
        $sth->bindParam("game_detail", $input['game_detail']);
        $sth->bindParam("game_stock", $input['game_stock']); 
        if($newfileName != ""){
            $sth->bindParam("game_img", $newfileName);
        }

        try{
            $sth->execute();
            $count = $sth->rowCount();
            return $this->response->withJson($count);
        }catch(PDOException $e){
            return $this->response->withJson(0);
        }
    });

    $app->post('/user', function ($request, $response) {
        $input = $request->getParsedBody();
        $sql = "SELECT * FROM login WHERE username=:username AND password=:password";
        $sth = $this->db->prepare($sql);
        $sth->bindParam("username", $input['username']);
        $sth->bindParam("password", $input['password']);
        $sth->execute();
        $count = $sth->rowCount();
        if($count==0){
            $message = (object)array('username' => 'failed', 'password' => 'failed'); 
            return $this->response->withJson($message);
        }else{
            $user = $sth->fetchObject();
            return $this->response->withJson($user);
        }
    });

    //hotal miniprojact

    
        // Retrieve condo all record use fetchAll()     
        $app->get('/condo', function ($request, $response, $args) {   
            $sth = $this->db->prepare("SELECT * FROM condo ORDER BY condo_id");
            $sth->execute();
            $data = $sth->fetchAll();
            $condos = array("condos"=>$data);
            return $this->response->withJson($condos);
       });  
       
       
       //get condo id
       $app->get('/condo/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM condo WHERE condo_id=:id");
        $sth->bindParam("id", $args['condo_id']);
        $sth->execute();
        $data = $sth->fetchObject();
        $condos = array("condos"=>array($data));
        return $this->response->withJson($condos);
    });

    // Search for todo with given search term in their name
    $app->get('/condo/search/[{query}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM condo WHERE UPPER(condo_name) LIKE :query ORDER BY condo_id");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $data = $sth->fetchAll();
        $condos = array("condos"=>$data);
        return $this->response->withJson($condos);
    });

    // DELETE a game with given id
    $app->delete('/condo/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("DELETE FROM condo WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $count = $sth->rowCount();
        return $this->response->withJson($count);
    });

    $app->post('/condo', function ($request, $response) {
        $input = $request->getParsedBody();
        $newfileName = "";        
        if($input['condo_image'] != 'no_image'){
            try{
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $ext = pathinfo($target_file,PATHINFO_EXTENSION);
                $newfileName = "pict_" . date("Ymd_His") . "_".substr(sha1(rand()), 0, 10) . "." .$ext;
                $newfileNameAndPath = $target_dir . $newfileName;
                $uploadOk = 1;
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $newfileNameAndPath)) {
                        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
                        $uploadOk = 1;               
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                        $newfileName = "";
                        
                    }
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                    $newfileName = "";
                }
            }catch(Exception $ex){
                return $this->response->withJson($ex);
            }
        }        
        //--- insert data to db
        $sql = "INSERT INTO condo (condo_id,condo_name,condo_price,condo_detail,condo_image,condo_location,condo_phone,condo_limitedroom,condo_facilities,condo_type,condo_review,condo_image2,condo_image3,condo_image4 ) VALUES (:condo_id,:condo_name,:condo_price,:condo_detail,:condo_image,:condo_location,:condo_phone,:condo_limitedroom,
        :condo_facilities,:condo_type,:condo_review ,:condo_image2 ,:condo_image3,:condo_image4 )";
        $sth = $this->db->prepare($sql);
        $sth->bindParam("condo_id", $input['condo_id']);
        $sth->bindParam("condo_name", $input['condo_name']);
        $sth->bindParam("condo_price", $input['condo_price']);
        $sth->bindParam("condo_detail", $input['condo_detail']);
        //$sth->bindParam("game_img", $input['game_img']);
        $sth->bindParam("condo_image", $newfileName);
        $sth->bindParam("condo_location", $input['condo_location']); 
        $sth->bindParam("condo_phone", $input['condo_phone']);  
        $sth->bindParam("condo_limitedroom", $input['condo_limitedroom']);
        $sth->bindParam("condo_facilities", $input['condo_facilities']);
        $sth->bindParam("condo_type", $input['condo_type']);
        $sth->bindParam("condo_review", $input['condo_review']);
        $sth->bindParam("condo_image2", $newfileName);
        $sth->bindParam("condo_image3", $newfileName);
        $sth->bindParam("condo_image4", $newfileName);

        try{
            $sth->execute();
            $count = $sth->rowCount();
            return $this->response->withJson($count);
        }catch(PDOException $e){
            //echo($e);
            return $this->response->withJson(0);
        }
    });    


    //hotal miniprojact
    
    
        // Retrieve apartment all record use fetchAll()     
        $app->get('/apartment', function ($request, $response, $args) {
            $sth = $this->db->prepare("SELECT * FROM apartment ORDER BY apm_id");
            $sth->execute();
            $data = $sth->fetchAll();
            $apartments = array("apartments"=>$data);
            return $this->response->withJson($apartments);
       });  
       
       
       //get apartment id
       $app->get('/apartment/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM apartment WHERE apm_id=:id");
        $sth->bindParam("id", $args['apm_id']);
        $sth->execute();
        $data = $sth->fetchObject();
        $apartments = array("apartments"=>array($data));
        return $this->response->withJson($apartments);
    });

    // Search for todo with given search term in their name
    $app->get('/apartment/search/[{query}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM apartment WHERE UPPER(apm_name) LIKE :query ORDER BY apm_id");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $data = $sth->fetchAll();
        $apartments = array("apartments"=>$data);
        return $this->response->withJson($apartments);
    });

    // DELETE a apartment with given id
    $app->delete('/apartment/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("DELETE FROM apartment WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $count = $sth->rowCount();
        return $this->response->withJson($count);
    });

    $app->post('/apartment', function ($request, $response) {
        $input = $request->getParsedBody();
        $newfileName = "";        
        if($input['apm_image'] != 'no_image'){
            try{
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $ext = pathinfo($target_file,PATHINFO_EXTENSION);
                $newfileName = "pict_" . date("Ymd_His") . "_".substr(sha1(rand()), 0, 10) . "." .$ext;
                $newfileNameAndPath = $target_dir . $newfileName;
                $uploadOk = 1;
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $newfileNameAndPath)) {
                        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
                        $uploadOk = 1;               
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                        $newfileName = "";
                        
                    }
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                    $newfileName = "";
                }
            }catch(Exception $ex){
                return $this->response->withJson($ex);
            }
        }        
        //--- insert data to db
        $sql = "INSERT INTO apartment (apm_id,apm_name,apm_price,apm_detail,apm_image,apm_location,apm_phone,apm_limitedroom,apm_facilities,apm_type,apm_review,apm_image2,apm_image3,apm_image4 ) VALUES (:apm_id,:apm_name,:apm_price,:apm_detail,:apm_image,:apm_location,:apm_phone,:apm_limitedroom,
        :apm_facilities,:apm_type,:apm_review ,:apm_image2 ,:apm_image3,:apm_image4 )";
        $sth = $this->db->prepare($sql);
        $sth->bindParam("apm_id", $input['apm_id']);
        $sth->bindParam("apm_name", $input['apm_name']);
        $sth->bindParam("apm_price", $input['apm_price']);
        $sth->bindParam("apm_detail", $input['apm_detail']);
        //$sth->bindParam("game_img", $input['game_img']);
        $sth->bindParam("apm_image", $newfileName);
        $sth->bindParam("apm_location", $input['apm_location']); 
        $sth->bindParam("apm_phone", $input['apm_phone']);  
        $sth->bindParam("apm_limitedroom", $input['apm_limitedroom']);
        $sth->bindParam("apm_facilities", $input['apm_facilities']);
        $sth->bindParam("apm_type", $input['apm_type']);
        $sth->bindParam("apm_review", $input['apm_review']);
        $sth->bindParam("apm_image2", $newfileName);
        $sth->bindParam("apm_image3", $newfileName);
        $sth->bindParam("apm_image4", $newfileName);

        try{
            $sth->execute();
            $count = $sth->rowCount();
            return $this->response->withJson($count);
        }catch(PDOException $e){
            //echo($e);
            return $this->response->withJson(0);
        }
    });    

    //mansion miniprojact
    
    
        // Retrieve mansion all record use fetchAll()     
        $app->get('/mansion', function ($request, $response, $args) {
            $sth = $this->db->prepare("SELECT * FROM mansion ORDER BY ms_id");
            $sth->execute();
            $data = $sth->fetchAll();
            $mansions = array("mansions"=>$data);
            return $this->response->withJson($mansions);
       });  
       
       
       //get mansion id
       $app->get('/mansion/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM mansion WHERE ms_id=:id");
        $sth->bindParam("id", $args['ms_id']);
        $sth->execute();
        $data = $sth->fetchObject();
        $mansions = array("mansions"=>array($data));
        return $this->response->withJson($mansions);
    });

    // Search for todo with given search term in their name
    $app->get('/mansion/search/[{query}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM mansion WHERE UPPER(ms_name) LIKE :query ORDER BY ms_id");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $data = $sth->fetchAll();
        $mansions = array("mansions"=>$data);
        return $this->response->withJson($mansions);
    });

    // DELETE a mansion with given id
    $app->delete('/mansion/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("DELETE FROM mansion WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $count = $sth->rowCount();
        return $this->response->withJson($count);
    });

    $app->post('/mansion', function ($request, $response) {
        $input = $request->getParsedBody();
        $newfileName = "";        
        if($input['ms_image'] != 'no_image'){
            try{
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $ext = pathinfo($target_file,PATHINFO_EXTENSION);
                $newfileName = "pict_" . date("Ymd_His") . "_".substr(sha1(rand()), 0, 10) . "." .$ext;
                $newfileNameAndPath = $target_dir . $newfileName;
                $uploadOk = 1;
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $newfileNameAndPath)) {
                        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
                        $uploadOk = 1;               
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                        $newfileName = "";
                        
                    }
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                    $newfileName = "";
                }
            }catch(Exception $ex){
                return $this->response->withJson($ex);
            }
        }        
        //--- insert data to db
        $sql = "INSERT INTO mansion (ms_id,ms_name,ms_price,ms_detail,ms_image,ms_location,ms_phone,ms_limitedroom,ms_facilities,ms_type,ms_review,ms_image2,ms_image3,ms_image4 ) VALUES (:ms_id,:ms_name,:ms_price,:ms_detail,:ms_image,:ms_location,:ms_phone,:ms_limitedroom,
        :ms_facilities,:ms_type,:ms_review ,:ms_image2 ,:ms_image3,:ms_image4 )";
        $sth = $this->db->prepare($sql);
        $sth->bindParam("ms_id", $input['ms_id']);
        $sth->bindParam("ms_name", $input['ms_name']);
        $sth->bindParam("ms_price", $input['ms_price']);
        $sth->bindParam("ms_detail", $input['ms_detail']);
        //$sth->bindParam("game_img", $input['game_img']);
        $sth->bindParam("ms_image", $newfileName);
        $sth->bindParam("ms_location", $input['ms_location']); 
        $sth->bindParam("ms_phone", $input['ms_phone']);  
        $sth->bindParam("ms_limitedroom", $input['ms_limitedroom']);
        $sth->bindParam("ms_facilities", $input['condo_facilities']);
        $sth->bindParam("ms_type", $input['ms_type']);
        $sth->bindParam("ms_review", $input['ms_review']);
        $sth->bindParam("ms_image2", $newfileName);
        $sth->bindParam("ms_image3", $newfileName);
        $sth->bindParam("ms_image4", $newfileName);

        try{
            $sth->execute();
            $count = $sth->rowCount();
            return $this->response->withJson($count);
        }catch(PDOException $e){
            //echo($e);
            return $this->response->withJson(0);
        }
    });    

    //dormitory miniprojact
   
    
        // Retrieve mansion all record use fetchAll()     
        $app->get('/dormitory', function ($request, $response, $args) {
            $sth = $this->db->prepare("SELECT * FROM dormitory ORDER BY dm_id");
            $sth->execute();
            $data = $sth->fetchAll();
            $dormitorys = array("dormitorys"=>$data);
            return $this->response->withJson($dormitorys);
       });  
       
       
       //get dormitory id
       $app->get('/dormitory/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM dormitory WHERE dm_id=:id");
        $sth->bindParam("id", $args['dm_id']);
        $sth->execute();
        $data = $sth->fetchObject();
        $dormitorys = array("dormitorys"=>array($data));
        return $this->response->withJson($dormitorys);
    });

    // Search for todo with given search term in their name
    $app->get('/dormitory/search/[{query}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM dormitory WHERE UPPER(dm_name) LIKE :query ORDER BY dm_id");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $data = $sth->fetchAll();
        $dormitorys = array("dormitorys"=>$data);
        return $this->response->withJson($dormitorys);
    });

    // DELETE a mansion with given id
    $app->delete('/dormitory/[{id}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("DELETE FROM dormitory WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $count = $sth->rowCount();
        return $this->response->withJson($count);
    });

    $app->post('/dormitory', function ($request, $response) {
        $input = $request->getParsedBody();
        $newfileName = "";        
        if($input['dm_image'] != 'no_image'){
            try{
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $ext = pathinfo($target_file,PATHINFO_EXTENSION);
                $newfileName = "pict_" . date("Ymd_His") . "_".substr(sha1(rand()), 0, 10) . "." .$ext;
                $newfileNameAndPath = $target_dir . $newfileName;
                $uploadOk = 1;
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $newfileNameAndPath)) {
                        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
                        $uploadOk = 1;               
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                        $newfileName = "";
                        
                    }
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                    $newfileName = "";
                }
            }catch(Exception $ex){
                return $this->response->withJson($ex);
            }
        }        
        //--- insert data to db
        $sql = "INSERT INTO dormitory (dm_id,dm_name,dm_price,dm_detail,dm_image,dm_location,dm_phone,dm_limitedroom,dm_facilities,dm_type,dm_review,dm_image2,dm_image3,dm_image4 ) VALUES (:dm_id,:dm_name,:dm_price,:dm_detail,:dm_image,:dm_location,:dm_phone,:dm_limitedroom,
        :dm_facilities,:dm_type,:dm_review ,:dm_image2 ,:dm_image3,:dm_image4 )";
        $sth = $this->db->prepare($sql);
        $sth->bindParam("dm_id", $input['dm_id']);
        $sth->bindParam("dm_name", $input['dm_name']);
        $sth->bindParam("dm_price", $input['dm_price']);
        $sth->bindParam("dm_detail", $input['dm_detail']);
        //$sth->bindParam("game_img", $input['game_img']);
        $sth->bindParam("dm_image", $newfileName);
        $sth->bindParam("dm_location", $input['dm_location']); 
        $sth->bindParam("dm_phone", $input['dm_phone']);  
        $sth->bindParam("dm_limitedroom", $input['dm_limitedroom']);
        $sth->bindParam("dm_facilities", $input['dm_facilities']);
        $sth->bindParam("dm_type", $input['dm_type']);
        $sth->bindParam("dm_review", $input['dm_review']);
        $sth->bindParam("dm_image2", $newfileName);
        $sth->bindParam("dm_image3", $newfileName);
        $sth->bindParam("dm_image4", $newfileName);

        try{
            $sth->execute();
            $count = $sth->rowCount();
            return $this->response->withJson($count);
        }catch(PDOException $e){
            //echo($e);
            return $this->response->withJson(0);
        }
    });    
    
});