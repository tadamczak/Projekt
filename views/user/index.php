<h1>Users </h1>
<hr />
<h2>*Manage your users. (You can add, edit or delete users)</h2>
<hr />
<h3> Add user </h3>
<form method="post" action="<?php echo URL;?>user/create">
    <label>Login</label><input type="text" name="login" /><br />
    <label>Password</label><input type="text" name="password" /><br />
    <label>Role</label>
        <select name="role">
        <option value='default'>Default</option>
        <option value='admin'>Admin</option>
        </select></br>
    <label></label><input value="Add user" type="submit" />
</form>
<br />
<br />
<hr />
<h3>Users list</h3>

<table class="list">
<?php 
    foreach($this->userList as $key => $value){
        echo '<tr>';
        echo '<td>' . $value['id'] . '</td>';
        echo '<td>' . $value['login'] . '</td>';
        echo '<td>' . $value['role'] . '</td>';
        if($value['role'] == 'owner')
        {
            echo '<td><a href="' . URL . 'user/edit/' . $value['id'] .'">Edit</a></td';
        }
        else
        {
            echo '<td><a href="' . URL . 'user/edit/' . $value['id'] .'">Edit</a> <a href="'. URL .'user/delete/'.$value['id'].'">Delete</a></td';
        }
        echo '</tr>';
    }
?>
</table>