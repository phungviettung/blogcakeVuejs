<?php
class PostsController extends AppController 
{
    // public function beforeFilter()
    // {
    //     header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    //     header('Access-Control-Allow-Credentials: true');
    //     header('Access-Control-Max-Age: 86400');
    //     parent::beforeFilter();
    // }
    // var $name = "Posts",
 //$this->response->header('Access-Control-Allow-Origin', '*');
    public function viewall()
    {
       
        $this->layout = false;
        $response = array('status' => 'failed', 'message' => 'HTTP method not allowd' );
        $sql = "select id,title,content,img,create_date from posts ";
        $result = $this->Post->query($sql);
        //var_dump($result);
        if (!empty($result)) {
            //$response = ['status' => 'success', 'value' => $result ];
           $response =  $result ;
           //echo "<pre>";
           //var_dump($response);
        }else{
            $response['message'] = 'Found no matching data';
        }
        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response->send();
    }
    public function view($id = null)
    {
        $this->layout = false;
        $response = array('status' => 'failed', 'message' => 'HTTP method not allowd' );
        $sql = "select id,title,content,img from posts where id = $id";
        $result = $this->Post->query($sql);
        if (!empty($result)) {
            //$response = array('status' => 'success', 'data' => $result );
            $response = $result;
        }else{
            $response['message'] = 'Found no matching data';
        }
        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response->send();
    }
     public function add()
     {
        $this->layout = false;
        $response = array('status' => 'failed', 'message' => 'HTTP method not allowd' );

        if ($this->request->is('post')) {
            
            $data = $this->request->input('json_decode', true);
            //var_dump($data);
            
            if (count($data) == 0) {
                $data = $this->request->data;
            }
            $response = array('status' => 'failed', 'messege' =>  'please provide form data' );
            if (count($data) > 0) {
                //xử lí ảnh decode ra và lưu vào server
                
                // foreach ($data as $item) {
                //     $item['img'];
                // }

                // kết thúc xử lí ảnh

               // foreach ($data as $item ) { // nếu muốn thêm nhiều đối tượng
                    //$this->Post->create();
                    if ($this->Post->save($data)) {
                        $response = array('status' => 'success','messege' => 'Topic successfully create' );
                    }else {
                        $response = array('status' => 'failed','messege' => 'Failed to save data' );
                    }
                //}
            }
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
                $this->Post->id = $data['id'];
                if ($this->Post->save($data)) {
                    $response = array('status' => 'success', 'messeage' => 'topics successfully update');
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

    public function delete($id = null){
        
        $this->layout = false;

        $response = array('status' => 'failed', 'message' => 'HTTP method not allowed');

        if ($this->request->is('delete')) {
           // $data = $this->request->input('json_decode',true);
            //var_dump($data["id"]);
            //if (empty($data)) {
              //  $data = $this->request->data;
            //}
            //if (!empty($data['id'])) {
               // foreach ($data as $item) {
                    if ($this->Post->delete($id)) {
                        $response = array('status' => 'success', 'messeage' => 'post successfully delete');
                    }else{
                        $response = array('status' => 'failed', 'messeage' => 'post delete failed');
                    }
                //}
                
        }
        $this->response->type('application/json');
        $this->response->body(json_encode($response));
        return $this->response->send();

    }

}
