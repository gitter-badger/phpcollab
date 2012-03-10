<?php
if($tsk) {
?>

<div id="box-breadcrumbs">
<ul>
<li class="first"><a href="<?php echo base_url(); ?>home"><?php echo $this->lang->line('home'); ?></a></li>
<li><a href="<?php echo base_url(); ?>projects"><?php echo $this->lang->line('projects'); ?></a></li>
<li><a href="<?php echo base_url(); ?>project/read/<?php echo $pro->id; ?>"><?php echo $pro->name; ?></a></li>
<li><a href="<?php echo base_url(); ?>tasks/index/<?php echo $pro->id; ?>"><?php echo $this->lang->line('tasks'); ?></a></li>
<li><?php echo $tsk->name; ?></li>
</ul>
</div>

<div class="box1">
<h1><?php echo $this->lang->line('task'); ?> : <?php echo $tsk->name; ?></h1>
<ul>
<li><a class="update" href="<?php echo base_url(); ?>task/update/<?php echo $tsk->id; ?>"><?php echo $this->lang->line('update'); ?></a></li>
</ul>
<div class="display">

<h2><?php echo $this->lang->line('info'); ?></h2>
<div class="box2">
<p><span class="label"><?php echo $this->lang->line('project'); ?></span><a href="<?php echo base_url(); ?>project/read/<?php echo $pro->id; ?>"><?php echo $pro->name; ?></a></p>
<p><span class="label"><?php echo $this->lang->line('organization'); ?></span><a href="<?php echo base_url(); ?>organization/read/<?php echo $org->id; ?>"><?php echo $org->name; ?></a></p>
</div>

<h2><?php echo $this->lang->line('details'); ?></h2>
<div class="box2">
<p><span class="label"><?php echo $this->lang->line('name'); ?></span><?php echo $tsk->name; ?></p>
<p><span class="label"><?php echo $this->lang->line('status'); ?></span><?php echo $this->lang->line('status_'.$pro->status); ?></p>
<p><span class="label"><?php echo $this->lang->line('completion'); ?></span><?php echo $tsk->completion_percent; ?> %</p>
<p><span class="label"><?php echo $this->lang->line('priority'); ?></span><img src="<?php echo base_url(); ?>themes/<?php echo $this->config->item('phpcollab_theme'); ?>/<?php echo $tsk->priority; ?>.gif" alt=""> <?php echo $this->lang->line('priority_'.$tsk->priority); ?></p>
<p><span class="label"><?php echo $this->lang->line('description'); ?></span><?php echo $tsk->description; ?></p>
</div>

</form>

</div>
</div>

<?php
}
?>
