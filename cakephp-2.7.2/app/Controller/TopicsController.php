<?php

//header('Content-type: text/plain; charset=utf-8');
//App::uses('TopicsController','Controller');   

class TopicsController extends AppController 
{
    var $name = "Topics";
    public function exam1()
    {
        $data = $this->Topic->find("all");
        var_dump($data);
        $this->set("data1", $data);
    }

    public function exam2()
    {
        $sql = array('conditions' => array(
                                                "topic_name LIKE" => "T%",   
                                                 
                                           )
                    );
        $data = $this->Topic->find("all",$sql);
        var_dump($data);
        $this->set("data1", $data);
    }

    public function exam3()
    {
        $sql = "Select * From topics";
        $data = $this->Topic->query($sql);
        $this->set("data1", $data);
  
    }

    public function add()
    {
        $this->layout = false;
        $response = array('status' => 'failed', 'message' => 'HTTP method not allowed' );

        if ($this->request->is('post')) {
            //get data from request
            $data = $this->request->input('json_decode', true);
            if (count($data) == 0) {
                $data = $this->request->data;
            }
            //response if post data or from data was not passed
            $response  = array('status' => 'failed','messege' => 'please provide form data' );

            if (count($data) > 0) {
                //call model save function
                foreach ($data as $item ) {
                    $this->Topic->create();
                    if ($this->Topic->save($item)) {
                    //return success
                    $response = array('status' => 'success','messege' => 'Topic successfully create' );
                    }else {
                        $response = array('status' => 'failed','messege' => 'Failed to save data' );
                    }
                }
                
            }
        }
        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response->send();
    }

    public function view($id = NULL)
    {
        $this->layout = false;
        $response = array('status'=>'failed', 'message'=>'Failed to process request');

        //check if id was passed
        if (!empty($id)) {
            //find data by id
            $sql = array('conditions' => array(
                                            "id" => "$id",    
                                                 )
                        );
             $result = $this->Topic->find("all",$sql);
             if (!empty($result)) {
                 $response = array('status'=>'success','data'=>$result);
             }else{
                $response['message'] = 'Found no matching data';
             }
        }else{
            $response['message'] = "Please provide ID";
        }

        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response->send();
    }

    public function viewall()
    {
        $this->layout = false;
        $response = array('status'=>'failed', 'message'=>'Failed to process request');
             $result = $this->Topic->find("all");
             if (!empty($result)) {
                 $response = array('status'=>'success','data'=>$result);
             }else{
                $response['message'] = 'Found no matching data';
             }
       
        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response->send();
    }

    public function update()
    {
        $this->layout = false;

        $response = array('status' => 'failed', 'message' => 'HTTP method not allowed');
        if ($this->request->is('put')) {
            $data = $this->request->input('json_decode',true);
          
            if (empty($data)) {
                $data = $this->request->data;
            }
            if (!empty($data['id'])) {
                $this->Topic->id = $data['id'];
                if ($this->Topic->save($data)) {
                    $response = array('status' => 'success', 'messeage' => 'topic successfully update');
                }else{
                    $response['message'] = "Failed to update topic";
                }
            }else{
                $response['message'] = 'Please provide topic ID';
            }
        }
        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response->send();

    }

    public function delete()
    {
        $this->layout = false;

        $response = array('status' => 'failed', 'message' => 'HTTP method not allowed');

        if ($this->request->is('delete')) {
            $data = $this->request->input('json_decode',true);
            //var_dump($data["id"]);
            if (empty($data)) {
                $data = $this->request->data;
            }
            if (!empty($data['id'])) {
               // foreach ($data as $item) {
                    if ($this->Topic->delete($data["id"], true)) {
                        $response = array('status' => 'success', 'messeage' => 'topic successfully delete');
                    }
                //}
                
            }
        }
        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response->send();
    }
}
