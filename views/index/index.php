<h1> News <hr /></h1>
<?php if (Session::get('role') == 'owner'):?>
    <form method="post" action="<?php echo URL;?>index/create" id="add_post">
        <label>Title:</label><input type="text" name="title" id="news_title" /><br />
        <label>Content:</label><textarea rows="5" cols="50" name="content" id="news_content"></textarea><br />
        <label>Time:</label><input type="text" name="time" id="datepicker"/><br />
        <label></label><input value="Send" type="submit" />
    </form>
    <br />
    <br />
<?php endif;?>
    <table class="list" id="news_tab">
    <?php 
        foreach($this->newsList as $key => $value){
            echo '<tr>';
                echo '<td><div class="title">' . $value['title'] . '</div></td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><div class="content"><p>' . $value['content'] . '</p></div></td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><div class="time">Posted~ ' . $value['time'] . '</div></td>';
            echo '</tr>';
            echo '<tr><td colspan=2>';
            echo '<hr />';
            echo '</td></tr>';
            echo '<tr>';
            if (Session::get('role') == 'owner'):
            echo '<td><div class="manage_news"><a href="' . URL . 'index/edit/' . $value['id'] .'">Edit</a> <a href="'. URL .'index/delete/'.$value['id'].'">Delete</a></div></td';
            endif;
            echo '</tr>';
        }
    ?>
    </table>
    