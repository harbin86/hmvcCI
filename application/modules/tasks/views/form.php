<?php
echo validation_errors('<p style="color: red">','</p>');

echo form_open('tasks/store');

echo 'Title:';
echo form_input('title',$title);

echo 'Priority:';
echo form_input('priority',$priority);

echo form_submit('store','Submit');

if(isset($id)){echo form_hidden('id',$id);}

echo form_close();
?>