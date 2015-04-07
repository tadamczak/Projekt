<h1>News: Edit</h1>

<form method="post" action="<?php echo URL;?>index/editSave/<?php echo $this->news[0]['id']; ?>" id="add_post">
    <label>Titile</label><input type="text" name="title" value="<?php echo $this->news[0]['title']; ?>" id="news_title"/><br />
    <label>Content</label><input type="text" name="content" value="<?php echo $this->news[0]['content'];  ?>"id="news_content" /><br />
    <label>Time</label><input type="text" name="time" value="<?php echo $this->news[0]['time']; ?>" id="datepicker" /><br />
    <br />
    <label></label><input value="Send" type="submit" />
</form>