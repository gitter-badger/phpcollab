<article class="title">
	<h2><a href="<?php echo $this->my_url; ?>projects"><i class="fa fa-<?php echo $this->config->item('phpcollab/icons/projects'); ?>"></i><?php echo $this->lang->line('projects'); ?></a> / <a href="<?php echo $this->my_url; ?>projects/read/<?php echo $prj->prj_id; ?>"><i class="fa fa-<?php echo $this->config->item('phpcollab/icons/projects'); ?>"></i><?php echo $prj->prj_name; ?></a> / <a href="<?php echo $this->my_url; ?>milestones/index/<?php echo $prj->prj_id; ?>"><i class="fa fa-<?php echo $this->config->item('phpcollab/icons/milestones'); ?>"></i><?php echo $this->lang->line('milestones'); ?></a> / <i class="fa fa-eye"></i><?php echo $row->mln_name; ?></h2>
	<ul>
	<li><a href="<?php echo $this->my_url; ?>milestones/statistics/<?php echo $row->mln_id; ?>"><i class="fa fa-bar-chart-o"></i><?php echo $this->lang->line('statistics'); ?></a></li>
	<li><a href="<?php echo $this->my_url; ?>milestones/update/<?php echo $row->mln_id; ?>"><i class="fa fa-wrench"></i><?php echo $this->lang->line('update'); ?></a></li>
	<?php if($this->auth_library->permission('milestones/delete/any')) { ?>
		<li><a href="<?php echo $this->my_url; ?>milestones/delete/<?php echo $row->mln_id; ?>"><i class="fa fa-trash-o"></i><?php echo $this->lang->line('delete'); ?></a></li>

	<?php } else if($this->auth_library->permission('milestones/delete/ifowner') && $row->mln_owner == $this->phpcollab_member->mbr_id) { ?>
		<li><a href="<?php echo $this->my_url; ?>milestones/delete/<?php echo $row->mln_id; ?>"><i class="fa fa-trash-o"></i><?php echo $this->lang->line('delete'); ?></a></li>
	<?php } ?>
	<li class="collapse<?php if(!$this->input->cookie($this->router->class.'-read') || $this->input->cookie($this->router->class.'-read') == 'expand') { ?> enabled<?php } ?>" id="<?php echo $this->router->class; ?>-read-collapse"><a href="#<?php echo $this->router->class; ?>-read"><i class="fa fa-caret-square-o-up"></i><?php echo $this->lang->line('collapse'); ?></a></li>
	<li class="expand<?php if($this->input->cookie($this->router->class.'-read') == 'collapse') { ?> enabled<?php } ?>" id="<?php echo $this->router->class; ?>-read-expand"><a href="#<?php echo $this->router->class; ?>-read"><i class="fa fa-caret-square-o-down"></i><?php echo $this->lang->line('expand'); ?></a></li>
	</ul>
</article>
<article id="<?php echo $this->router->class; ?>-read"<?php if($this->input->cookie($this->router->class.'-read') == 'collapse') { ?> style="display:none;"<?php } ?>>
	<div class="column third">
		<p>
		<span class="label"><?php echo $this->lang->line('mln_id'); ?></span>
		<?php if($row->mln_id) { ?><?php echo $row->mln_id; ?><?php } else { ?>-<?php } ?>
		</p>
		<p>
		<span class="label"><?php echo $this->lang->line('mln_owner'); ?></span>
		<?php if($row->mbr_name) { ?><?php echo $row->mbr_name; ?><?php } else { ?>-<?php } ?>
		</p>
	</div>
	<div class="column third">
		<p>
		<span class="label"><?php echo $this->lang->line('mln_name'); ?></span>
		<?php if($row->mln_name) { ?><?php echo $row->mln_name; ?><?php } else { ?>-<?php } ?>
		</p>
		<p>
		<span class="label"><?php echo $this->lang->line('mln_description'); ?></span>
		<?php if($row->mln_description) { ?><?php echo $row->mln_description; ?><?php } else { ?>-<?php } ?>
		</p>
		<p>
		<span class="label"><?php echo $this->lang->line('mln_date_start'); ?></span>
		<?php if($row->mln_date_start) { ?><?php echo $row->mln_date_start; ?><?php } else { ?>-<?php } ?>
		</p>
		<p>
		<span class="label"><?php echo $this->lang->line('mln_date_due'); ?></span>
		<?php if($row->mln_date_due) { ?><?php echo $row->mln_date_due; ?><?php } else { ?>-<?php } ?>
		</p>
		<p>
		<span class="label"><?php echo $this->lang->line('mln_date_complete'); ?></span>
		<?php if($row->mln_date_complete) { ?><?php echo $row->mln_date_complete; ?><?php } else { ?>-<?php } ?>
		</p>
	</div>
	<div class="column third">
		<p>
		<span class="label"><?php echo $this->lang->line('mln_status'); ?></span>
		<?php if($row->mln_status) { ?><?php echo $this->my_model->status($row->mln_status); ?><?php } else { ?>-<?php } ?>
		</p>
		<p>
		<span class="label"><?php echo $this->lang->line('mln_priority'); ?></span>
		<?php if($row->mln_priority) { ?><span class="color_percent priority_<?php echo $row->mln_priority; ?>" style="width:100%;"><?php echo $this->my_model->priority($row->mln_priority); ?></span><?php } else { ?>-<?php } ?>
		</p>
		<p>
		<span class="label"><?php echo $this->lang->line('tsk_completion'); ?></span>
		<?php if($row->tsk_completion) { ?><span class="color_percent" style="width:<?php echo intval($row->tsk_completion); ?>%;"><?php echo intval($row->tsk_completion); ?>%</span><?php } else { ?>-<?php } ?>
		</p>
		<p>
		<span class="label"><?php echo $this->lang->line('mln_published'); ?></span>
		<?php echo $this->lang->line('reply_'.$row->mln_published); ?>
		</p>
		<p>
		<span class="label"><?php echo $this->lang->line('mln_datecreated'); ?></span>
		<?php if($row->mln_datecreated) { ?><?php echo $this->my_library->timezone_datetime($row->mln_datecreated); ?><?php } else { ?>-<?php } ?>
		</p>
	</div>
</article>
