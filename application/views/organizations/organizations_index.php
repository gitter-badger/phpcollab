<article class="title">
	<h2><i class="fa fa-<?php echo $this->config->item('phpcollab/icons/organizations'); ?>"></i><?php echo $this->lang->line('organizations'); ?> (<?php echo $position; ?>)</h2>
	<ul>
	<?php if($this->auth_library->permission('organizations/create')) { ?><li><a href="<?php echo $this->my_url; ?>organizations/create"><i class="fa fa-plus"></i><?php echo $this->lang->line('create'); ?></a></li><?php } ?>
	</ul>
</article>
<article>
	<?php echo form_open(current_url()); ?>
	<div class="filters">
		<div>
			<?php echo form_label($this->lang->line('org_owner'), 'organizations_org_owner'); ?>
			<?php echo form_dropdown($this->router->class.'_organizations_org_owner', $dropdown_org_owner, set_value($this->router->class.'_organizations_org_owner', $this->session->userdata($this->router->class.'_organizations_org_owner')), 'id="organizations_org_owner" class="select"'); ?>
		</div>
		<div>
			<?php echo form_label($this->lang->line('org_name'), 'organizations_org_name'); ?>
			<?php echo form_input($this->router->class.'_organizations_org_name', set_value($this->router->class.'_organizations_org_name', $this->session->userdata($this->router->class.'_organizations_org_name')), 'id="organizations_org_name" class="inputtext"'); ?>
		</div>
		<div>
			<?php echo form_label($this->lang->line('org_authorized'), 'organizations_org_authorized'); ?>
			<?php echo form_dropdown($this->router->class.'_organizations_org_authorized', $this->my_model->dropdown_reply(), set_value($this->router->class.'_organizations_org_authorized', $this->session->userdata($this->router->class.'_organizations_org_authorized')), 'id="organizations_org_authorized" class="select"'); ?>
		</div>
		<div>
			<?php echo form_submit('submit', $this->lang->line('submit'), 'class="inputsubmit"'); ?>
		</div>
	</div>
	<?php echo form_close(); ?>
	<?php if($rows) { ?>
	<table>
		<thead>
		<tr>
			<th>&nbsp;</th>
			<?php $i = 0; ?>
			<?php $this->my_library->display_column($this->router->class.'_organizations', $columns[$i++], $this->lang->line('org_id')); ?>
			<?php $this->my_library->display_column($this->router->class.'_organizations', $columns[$i++], $this->lang->line('org_owner')); ?>
			<?php $this->my_library->display_column($this->router->class.'_organizations', $columns[$i++], $this->lang->line('org_name')); ?>
			<?php $this->my_library->display_column($this->router->class.'_organizations', $columns[$i++], $this->lang->line('org_authorized')); ?>
			<?php $this->my_library->display_column($this->router->class.'_organizations', $columns[$i++], $this->lang->line('members')); ?>
			<?php $this->my_library->display_column($this->router->class.'_organizations', $columns[$i++], $this->lang->line('projects')); ?>
			<th>&nbsp;</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($rows as $row) { ?>
		<tr>
			<td>
				<?php if($row->org_owner == $this->phpcollab_member->mbr_id) { ?><i class="fa fa-<?php echo $this->config->item('phpcollab/icons/owner'); ?>" title="<?php echo $this->lang->line('icon_owner'); ?>"></i><?php } ?>
				<?php if($row->ismember == 1) { ?><i class="fa fa-<?php echo $this->config->item('phpcollab/icons/ismember'); ?>" title="<?php echo $this->lang->line('icon_ismember'); ?>"></i><?php } ?>
				<?php if($row->org_authorized == 0) { ?><i class="fa fa-<?php echo $this->config->item('phpcollab/icons/notauthorized'); ?>" title="<?php echo $this->lang->line('icon_notauthorized'); ?>"></i><?php } ?>
			</td>
			<td><?php echo $row->org_id; ?></td>
			<td><?php echo $row->mbr_name; ?></td>
			<td><a href="<?php echo $this->my_url; ?>organizations/read/<?php echo $row->org_id; ?>"><?php echo $row->org_name; ?></a></td>
			<td><?php echo $this->lang->line('reply_'.$row->org_authorized); ?></td>
			<td><?php echo $row->count_members; ?></td>
			<td><?php echo $row->count_projects; ?></td>
			<th>
			<?php if($this->auth_library->permission('organizations/update/any')) { ?>
				<a href="<?php echo $this->my_url; ?>organizations/update/<?php echo $row->org_id; ?>"><i class="fa fa-wrench"></i><?php echo $this->lang->line('update'); ?></a>

			<?php } else if($this->auth_library->permission('organizations/update/ifowner') && $row->org_owner == $this->phpcollab_member->mbr_id) { ?>
				<a href="<?php echo $this->my_url; ?>organizations/update/<?php echo $row->org_id; ?>"><i class="fa fa-wrench"></i><?php echo $this->lang->line('update'); ?></a>

			<?php } else if($this->auth_library->permission('organizations/update/ifmember') && $row->ismember == 1) { ?>
				<a href="<?php echo $this->my_url; ?>organizations/update/<?php echo $row->org_id; ?>"><i class="fa fa-wrench"></i><?php echo $this->lang->line('update'); ?></a>
			<?php } ?>

			<?php if($row->org_system == 0) { ?>
				<?php if($this->auth_library->permission('organizations/delete/any')) { ?>
					<a href="<?php echo $this->my_url; ?>organizations/delete/<?php echo $row->org_id; ?>"><i class="fa fa-trash-o"></i><?php echo $this->lang->line('delete'); ?></a>

				<?php } else if($this->auth_library->permission('organizations/delete/ifowner') && $row->org_owner == $this->phpcollab_member->mbr_id) { ?>
					<a href="<?php echo $this->my_url; ?>organizations/delete/<?php echo $row->org_id; ?>"><i class="fa fa-trash-o"></i><?php echo $this->lang->line('delete'); ?></a>
				<?php } ?>
			<?php } ?>
			</th>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	<div class="paging">
		<?php echo $pagination; ?>
	</div>
	<?php } ?>
</article>
