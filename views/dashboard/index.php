<h1>Dashboard<hr/></h1>
<h2>Leave a message for other users</h2>

<br />

<form id="randomInsert" action="<?php echo URL;?>dashboard/xhrInsert/" method="post">
    <label>Content:</label><textarea rows="5" cols="50" name="text"></textarea><br />
    <label></label><input type="hidden" name="user" value="<?php echo $_SESSION['login'];?>" />
    <label></label><input value="Send" type="submit" />
</form>

<br />
<br />
<hr />
<h3>Users messages</h3>
<br />
<br />
<div id="listInserts">
    
</div>