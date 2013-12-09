<?php
	
	// Page settings (override defaults in config/website.php)
	$page_title = "Form";
	$page_h1 = "Test: Form";
	
?>
<h1><?php echo e($page_h1) ?></h1>
<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae sapien justo, sagittis lacinia tortor. Etiam et est vel turpis condimentum faucibus. Curabitur adipiscing mollis felis in convallis. Aliquam erat volutpat. Fusce convallis fringilla ante, at iaculis neque interdum a. Sed nec enim in purus lobortis tempor ac nec lectus. Aenean eget nunc eros. Fusce tempor lacus aliquet quam lacinia fermentum.
</p>

<!-- [Form] -->										
<form id="contactform" method="post" action="submit.action">
<fieldset>
	<legend>Contact Form <i>[Simple]</i></legend>
	
	<ul class="form form-nolabel">
		<li>
			<label class="form-label" for="name">Name<i>*</i></label>
			<div class="form-fields">
				<input type="text" maxlength="60" placeholder="Name*" name="name" id="name">
			</div>	
		</li>
		<li class="last__name">
			<label class="form-label" for="LastName">Last Name<i>*</i></label>
			<div class="form-fields">
				<input type="text" maxlength="60" placeholder="Last Name*" name="Last__Name" id="LastName" tabindex="50" autocomplete="off">
			</div>		
		</li>							
		<li>
			<label class="form-label" for="email">Email<i>*</i></label>	
			<div class="form-fields">
				<input type="text" maxlength="60" placeholder="Email*" name="email" id="email">
			</div>							
		</li>
		<li>
			<label class="form-label" for="subjected">Subject<i>*</i></label>	
			<div class="form-fields">
				<input type="text" maxlength="60" placeholder="Subject*" name="subjected" id="subjected">	
			</div>										
		</li>
		<li>
			<label class="form-label" for="message">Message<i>*</i></label>	
			<div class="form-fields form-fields-fullwidth">
				<textarea placeholder="Text*" name="message" id="message"></textarea>
			</div>							
		</li>
		<li>
			<div class="form-fields">
				<input type="submit" class="btn btn-large btn-success" name="submit" value="Send">
			</div>
		</li>
	</ul>
	
</fieldset>
</form>				
<!-- [/End Form] -->

<br /><br /><br />

<!-- [Form] -->										
<form id="contactform2" method="post" action="submit.action">
<fieldset>
	<legend>Contact Form <i>[Advanced]</i></legend>
	
	<ul class="form form-advanced">
		<li>
			<label class="form-label" for="textfield">Textfield<i>*</i></label>
			<div class="form-fields">
				<input type="text" maxlength="60" name="textfield" id="textfield">
			</div>							
		</li>
		<li>
			<label class="form-label" for="dropdown">Dropdown<i>*</i></label>	
			<div class="form-fields">
				<select name="dropdown" id="dropdown">
					<option value="1">Test 1</option>
					<option value="2">Test 2</option>
					<option value="3">Test 3</option>
					<option value="4">Test 4</option>
				</select>	
			</div>		
		</li>
		<li>
			<label class="form-label" for="optgroup">Dropdown Optgroup<i>*</i></label>
			<div class="form-fields">
				<select name="optgroup" id="optgroup">
					<optgroup label="Swedish Cars">
						<option value="#">Volvo</option>
						<option value="#">Saab</option>
					</optgroup>
					<optgroup label="German Cars">
						<option value="#">Mercedes</option>
						<option value="#">Audi</option>
					</optgroup>
				</select>
			</div> 	
		</li>
		<li>
			<label class="form-label" for="file">File<i>*</i></label>
			<div class="form-fields">
				<input type="file" name="file" id="file">
			</div>	
		</li>							
		<li>
			<label class="form-label">Checkbox<i>*</i></label>
			<div class="form-fields">
				<fieldset>
					<label for="checkbox1"><input type="checkbox" name="checkbox" id="checkbox1">Test 1</label>
					<label for="checkbox2"><input type="checkbox" name="checkbox" id="checkbox2">Test 2</label>
					<label for="checkbox3"><input type="checkbox" name="checkbox" id="checkbox3">Test 3</label>
					<label for="checkbox4"><input type="checkbox" name="checkbox" id="checkbox4">Test 4</label>
				</fieldset>
			</div>	
		</li>
		<li>
			<label class="form-label">Radio<i>*</i></label>
			<div class="form-fields">
				<fieldset>
					<label for="radio1"><input type="radio" name="radio" id="radio1">Test 1</label>
					<label for="radio2"><input type="radio" name="radio" id="radio2">Test 2</label>
					<label for="radio3"><input type="radio" name="radio" id="radio3">Test 3</label>
					<label for="radio4"><input type="radio" name="radio" id="radio4">Test 4</label>
				</fieldset>
			</div>
		</li>		
		<li>
			<label class="form-label" for="multiselect">Multiselect<i>*</i></label>
			<div class="form-fields">
				<select name="multiselect" multiple="multiple" size="10" id="multiselect">
					<option>Cheese</option>
					<option>Egg</option>
					<option>Cabbage</option>
				</select>
			</div>
		</li>
		<li>
			<label class="form-label" for="textarea">Textarea<i>*</i></label>	
			<div class="form-fields form-fields-fullwidth">
				<textarea name="textarea" id="textarea"></textarea>
			</div>								
		</li>								
		<li>
			<div class="form-fields">
				<input type="submit" class="btn btn-large btn-success" name="submit" value="Send">
			</div>
		</li>
	</ul>
	
</fieldset>
</form>				
<!-- [/End Form] -->					

<br /><br /><br />

<!-- [Form] -->										
<form id="contactform3" method="post" action="submit.action">
<fieldset>
	<legend>Contact Form <i>[Advanced Errors]</i></legend>
	
	<ul class="form form-advanced">
		<li class="error">
			<label class="form-label" for="textfield-error">Textfield Error<i>*</i></label>
			<div class="form-fields">
				<input type="text" maxlength="60" name="textfield" id="textfield-error">
				<small>Error lore ipsa ipsum</small>		
			</div>						
		</li>						
		<li class="error">
			<label class="form-label" for="dropdown-error">Dropdown Error<i>*</i></label>	
			<div class="form-fields">
				<select name="dropdown" id="dropdown-error">
					<option value="1">Test 1</option>
					<option value="2">Test 2</option>
					<option value="3">Test 3</option>
					<option value="4">Test 4</option>
				</select>	
				<small>Error lore ipsa ipsum</small>
			</div>								
		</li>
		<li class="error">
			<label class="form-label" for="optgroup-error">Dropdown Optgroup Error<i>*</i></label>
			<div class="form-fields">
				<select name="optgroup" id="optgroup-error">
					<optgroup label="Swedish Cars">
						<option value="#">Volvo</option>
						<option value="#">Saab</option>
					</optgroup>
					<optgroup label="German Cars">
						<option value="#">Mercedes</option>
						<option value="#">Audi</option>
					</optgroup>
				</select> 	
				<small>Error lore ipsa ipsum</small>
			</div>
		</li>
		<li class="error">
			<label class="form-label" for="file-error">File Error<i>*</i></label>
			<div class="form-fields">
				<input type="file" name="file" id="file-error">	
				<small>Error lore ipsa ipsum</small>
			</div>
		</li>							
		<li class="error">
			<label class="form-label">Checkbox Error<i>*</i></label>
			<div class="form-fields">
				<fieldset>
					<label for="checkbox1-error"><input type="checkbox" name="checkbox" id="checkbox1-error">Test 1<small>Error lore ipsa ipsum</small></label>
					<label for="checkbox2-error"><input type="checkbox" name="checkbox" id="checkbox2-error">Test 2<small>Error lore ipsa ipsum</small></label>
					<label for="checkbox3-error"><input type="checkbox" name="checkbox" id="checkbox3-error">Test 3<small>Error lore ipsa ipsum</small></label>
					<label for="checkbox4-error"><input type="checkbox" name="checkbox" id="checkbox4-error">Test 4<small>Error lore ipsa ipsum</small></label>
				</fieldset>
			</div>
		</li>
		<li class="error">
			<label class="form-label">Radio Error<i>*</i></label>
			<div class="form-fields">
				<fieldset>
					<label for="radio1-error"><input type="radio" name="radio" id="radio1-error">Test 1<small>Error lore ipsa ipsum</small></label>
					<label for="radio2-error"><input type="radio" name="radio" id="radio2-error">Test 2<small>Error lore ipsa ipsum</small></label>
					<label for="radio3-error"><input type="radio" name="radio" id="radio3-error">Test 3<small>Error lore ipsa ipsum</small></label>
					<label for="radio4-error"><input type="radio" name="radio" id="radio4-error">Test 4<small>Error lore ipsa ipsum</small></label>
				</fieldset>
			</div>
		</li>		
		<li class="error">
			<label class="form-label" for="multiselect-error">Multiselect Error<i>*</i></label>
			<div class="form-fields">
				<select name="multiselect" multiple="multiple" size="10" id="multiselect-error">
					<option>Cheese</option>
					<option>Egg</option>
					<option>Cabbage</option>
				</select>
				<small>Error lore ipsa ipsum</small>
			</div>
		</li>
		<li class="error">
			<label class="form-label" for="textarea-error">Textarea Error<i>*</i></label>	
			<div class="form-fields form-fields-fullwidth">
				<textarea name="textarea" id="textarea-error"></textarea>
				<small>Error lore ipsa ipsum</small>
			</div>
		</li>								
		<li>
			<div class="form-fields">
				<input type="submit" class="btn btn-large btn-success" name="submit" value="Send">
			</div>
		</li>
	</ul>
	
</fieldset>
</form>				
<!-- [/End Form] -->


<br /><br /><br />

<!-- [Form] -->										
<form id="contactform4" method="post" action="submit.action">
<fieldset>
	<legend>Contact Form <i>[Advanced Examples]</i></legend>
	
	<ul class="form form-advanced">
		<li>
			<label class="form-label">
				1 set<i>*</i>
				(<span rel="tooltip" title="Lore ipsa ipsum is dummy text">?</span>)
			</label>
			<div class="form-fields">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
			</div>	
		</li>
		<li>
			<label class="form-label">
				2 set<i>*</i>
				(<span rel="tooltip" title="Lore ipsa ipsum is dummy text">?</span>)
			</label>
			<div class="form-fields form-fields-col2">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
			</div>	
		</li>	
		<li>
			<label class="form-label">
				3 set<i>*</i>
				(<span rel="tooltip" title="Lore ipsa ipsum is dummy text">?</span>)
			</label>
			<div class="form-fields form-fields-col3">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
			</div>	
		</li>	
		<li>
			<label class="form-label">
				4 set<i>*</i>
				(<span rel="tooltip" title="Lore ipsa ipsum is dummy text">?</span>)
			</label>
			<div class="form-fields form-fields-col4">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">				
			</div>	
		</li>	
		<li>
			<label class="form-label">
				5 set<i>*</i>
				(<span rel="tooltip" title="Lore ipsa ipsum is dummy text">?</span>)
			</label>
			<div class="form-fields form-fields-col5">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">				
			</div>	
		</li>	
		<li>
			<label class="form-label">
				6 set<i>*</i>
				(<span rel="tooltip" title="Lore ipsa ipsum is dummy text">?</span>)
			</label>
			<div class="form-fields form-fields-col6">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">
				<input type="text" maxlength="60" placeholder="Name*" name="name">				
			</div>	
		</li>		
	</ul>	
	
</fieldset>
</form>				
<!-- [/End Form] -->	