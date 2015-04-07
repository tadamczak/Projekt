<!doctype html>
<html>
<head>
    <title>Test dla GWO</title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <?php 
        if (isset($this->js)) {
            foreach ($this->js as $js){
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js.'"></script>';
            }        
        }    
    ?>    
</head>
<body>

<?php Session::init();?>

<div id="header">
    <br />
    <div id="logo">
	COMPANY BUISNESS CARD
    </div>
    
    <div id="menu">
            <a href="<?php echo URL; ?>index">News</a>
            <a href="<?php echo URL; ?>help">Help</a>        
        <?php if (Session::get('loggedIn') == true):?>
            <a href="<?php echo URL; ?>dashboard">Dashboard</a>
            <?php if (Session::get('role') == 'owner'):?>
                <a href="<?php echo URL; ?>user">Users</a>
            <?php endif;?>
            <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
        <?php else: ?>    
            <a href="<?php echo URL; ?>login">Login</a>
        <?php endif;?>
    </div>    
</div>

<div id="content">