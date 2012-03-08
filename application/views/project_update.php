<?php
if($pro) {
?>

<div class="box-breadcrumbs box1">
<div class="display">
<ul>
<li class="first"><a href="<?php echo base_url(); ?>home"><?php echo $this->lang->line('home'); ?></a></li>
<li><a href="<?php echo base_url(); ?>projects"><?php echo $this->lang->line('projects'); ?></a></li>
<li><a href="<?php echo base_url(); ?>project/read/<?php echo $pro->id; ?>"><?php echo $pro->name; ?></a></li>
<li><?php echo $this->lang->line('update'); ?></li>
</ul>
</div>
</div>

<div class="box1">
<h1><?php echo $pro->name; ?></h1>
<ul>
<li><a class="read" href="<?php echo base_url(); ?>project/read/<?php echo $pro->id; ?>"><?php echo $this->lang->line('view'); ?></a></li>
</ul>
<div class="display">

<h2><?php echo $this->lang->line('update'); ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open(current_url()); ?>

<div class="column1">
<p><?php echo form_label($this->lang->line('name').' *', 'name'); ?><?php echo form_input('name', set_value('name', $pro->name), 'id="name" class="inputtext"'); ?></p>
<p><?php echo form_label($this->lang->line('description'), 'description'); ?><?php echo form_textarea('description', set_value('description', $pro->description), 'id="description" class="textarea"'); ?></p>
<p><?php echo form_label($this->lang->line('url_dev'), 'url_dev'); ?><?php echo form_input('url_dev', set_value('url_dev', $pro->url_dev), 'id="url_dev" class="inputtext"'); ?></p>
<p><?php echo form_label($this->lang->line('url_prod'), 'url_prod'); ?><?php echo form_input('url_prod', set_value('url_prod', $pro->url_prod), 'id="url_prod" class="inputtext"'); ?></p>
<p><?php echo form_label($this->lang->line('organization').' *', 'organization'); ?><?php echo form_dropdown('organization', $select_organization, set_value('', $pro->organization), 'id="organization" class="select"'); ?></p>
<p><input class="inputsubmit" type="submit" name="submit" id="submit" value="<?php echo $this->lang->line('save'); ?>"></p>
</div>

</form>

</div>
</div>

<?php
}
?>
