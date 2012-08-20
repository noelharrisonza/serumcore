<form {$meta}>
{foreach from=$fields key=field_key item=field_val}
  <div class="control-group form-item form-item-type-{$field_val.type}" id="form-item-{$field_val.name}">
  {if isset($field_val.label)}
    <label for="{$field_val.name}" class="control-label">{$field_val.label}</label>
  {/if}
  
    <div class="controls">
    {if $field_val.type == 'text' or $field_val.type == 'hidden'}
      <input type="{$field_val.type}" name="{$field_val.name}" id="{$field_val.name}" class="{$field_val.class}" placeholder="{$field_val.placeholder}" value="{$field_val.value}" />
    {/if}

    {if $field_val.type == 'password'}
      <input type="{$field_val.type}" name="{$field_val.name}" id="{$field_val.name}" class="{$field_val.class}" placeholder="{$field_val.placeholder}" />
    {/if}

    {if $field_val.type == 'textarea'}
      <textarea name="{$field_val.name}" id="{$field_val.name}" class="{$field_val.class}" placeholder="{$field_val.placeholder}"></textarea>
    {/if}

    {if isset($field_val.description)}
      <div class="help-block">{$field_val.description}</div>
    {/if}
    </div>
  </div>
{/foreach}

{if isset($buttons)}
  <div class="form-actions">
  {foreach from=$buttons key=but_key item=but_val}
    <input type="{$but_val.type}" value="{$but_val.value}" name="{$but_val.name}" id="{$but_val.name}" class="{$but_val.class}" />
  {/foreach}
  </div>
{/if}
</form>