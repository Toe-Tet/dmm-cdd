<?php 

namespace App\Repositories;

class CddRepository extends BaseRepository {

    public function all_data_count()
    {
        return $this->api()->get('/api/uninet/data-count');
    }

    public function users($param = [])
    {
        return $this->api()->get('/api/uninet/users', $param);
    }

    public function user($param = [])
    {
        return $this->api()->get('/api/uninet/users', $param);
    }

	// public function pagination($page = 1)
 //    {
 //        return $this->api()->get('/api/customer', ['page' => $page]);
 //    }

 //    public function send_mail($id)
 //    {
 //        return $this->api()->post('/api/customer/send/mail/'.$id, []);
 //    }

 //    public function cancel($id)
 //    {
 //        return $this->api()->post('/api/customer/cancel/'.$id, []);
 //    }

 //    public function payment_reminder($page = 1)
 //    {
 //        return $this->api()->get('/api/payment-reminders?page=' . $page);
 //    }

 //    public function payment_reminder_success($page = 1)
 //    {
 //        return $this->api()->get('/api/payment-reminders/success?page=' . $page);
 //    }

 //    public function remark_store(array $attribute)
 //    {
 //        return $this->api()->post('/api/payment-reminders/remark/store', $attribute);
 //    }

 //    public function get($id)
 //    {
 //        return $this->api()->get('/api/customer/' . $id);
 //    }

 //    public function store(array $attribute, $file){
 //        return $this->api()->post_with_file('/api/customer/store', $attribute, $file);
 //    }

 //    public function update(array $attribute, $file, $id)
 //    {
 //        return $this->api()->post_with_file('/api/customer/update/' . $id, $attribute, $file);
 //    }

 //    public function destroy($id)
 //    {  
 //        return $this->api()->post('/api/customer/delete/' . $id);
 //    }

 //    public function search(array $attribute)
 //    {
 //        return $this->api()->post('/api/customer/search', $attribute);
 //    }
}