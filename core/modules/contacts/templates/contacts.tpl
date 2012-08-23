<div class="row-fluid">
	<div class="span3">
		<div class="well" style="padding: 8px 0;">
		  <ul class="nav nav-list">
		    {foreach from=$contacts key=k item=contact}
					<li><a href="{$base_path}contacts/view/{$contact.id}"><i class="icon-user"></i> {$contact.title}</a></li>
				{/foreach}
				{if $remaining > 0}
					<br/>
					<a href='' class='btn btn-info'><i class='icon-user icon-white'></i> View All {$remaining} Contacts</a>
				{/if}
		  </ul>
		</div> 
	</div>
</div>