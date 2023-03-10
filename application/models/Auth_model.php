<?php 
class Auth_model extends CI_Model
{
    private $_table = "tb_user";
    const SESSION_KEY = 'user_id';
    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username or Email',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|max_length[255]'
            ]
        ];
    }
    public function login($username, $password)
    {
        $this->db->where('email', $username)->or_where('username', $username);
        $query = $this->db->get($this->_table);
        $user = $query->row();
        if (!$user) {
            // redirect('auth');
            return false;
        }
        if (!password_verify($password, $user->password)) {
            // redirect('auth');
            return false;
        }
        $this->session->set_userdata([self::SESSION_KEY => $user->id]);
        $this->_update_last_login($user->id);
        return $this->session->has_userdata(self::SESSION_KEY);
    }
    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_table, ['id' => $user_id]);
        return $query->row();
    }
    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }
    public function fflush_cache(){
        $this->db->cache_delete_all();
    }
    private function _update_last_login($id)
    {
        $query = $this->db->get_where($this->_table, ['id' => $id]);
        $login_time = $query->row()->login_time;
        $input = ++$login_time;
        $data = [
            'last_login' => date("Y-m-d H:i:s"),
            'login_time' => $input,
            // 'cache_time' => $input,
        ];
        return $this->db->update($this->_table, $data, ['id' => $id]);
    }
}

?>