<form {$meta}>
{foreach from=$fields key=field_key item=field_val}
  <div class="control-group form-item form-item-type-{$field_val.type}" id="form-item-{$field_val.name}">
  {if isset($field_val.label)}
    <label for="{$field_val.name}" class="control-label">{$field_val.label}</label>
  {/if}
  
    <div class="controls">
    {if $field_val.type == 'text' or $field_val.type == 'email' or $field_val.type == 'tel' or $field_val.type == 'number' or $field_val.type == 'hidden'}
      <input type="{$field_val.type}" name="{$field_val.name}" id="{$field_val.name}" class="{$field_val.class}" placeholder="{$field_val.placeholder}" value="{$field_val.value}" {if $field_val.required}required="required"{/if} />
    {/if}

    {if $field_val.type == 'password'}
      <input type="{$field_val.type}" name="{$field_val.name}" id="{$field_val.name}" class="{$field_val.class}" placeholder="{$field_val.placeholder}" {if $field_val.required}required="required"{/if} />
    {/if}

    {if $field_val.type == 'textarea'}
      <textarea name="{$field_val.name}" id="{$field_val.name}" class="{$field_val.class}" placeholder="{$field_val.placeholder}"></textarea>
    {/if}
    
    {if $field_val.type == 'select'}
      <select name="" class="" id="">
        {foreach from=$field_val.options key=opt_k item=opt_val}
          <option value="{$opt_key}">{$opt_val}</option>
        {/foreach}
      </select>
    {/if}

    {if $field_val.type == 'radios'}
      {foreach from=$field_val.options key=rad_key item=rad_val}
        <div class="radio">
          <input type="radio" name="{$field_val.name}" value="{$rad_val}" /> {$rad_val}
        </div>
      {/foreach}
    {/if}

    {if $field_val.type == 'checkboxes'}
      {foreach from=$field_val.options key=chk_key item=chk_val}
        <div class="checkbox">
          <input type="checkbox" name="{$field_val.name}[]" value="{$chk_val}" /> {$chk_val}
        </div>
      {/foreach}
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
