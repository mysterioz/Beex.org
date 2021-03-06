<?php

$new = true;


if($new)
	$edit = true;

if($edit){
	$attributes = array('id' => 'clusterform', 'class'=>'itemform');
	$edit_id = '';
	if($item) {
		$edit_id = $item->id;
	}
}



?>

<div id="RightColumn">
<?php
	if($message) {
		echo "<p class='message'>".$message."<span class='val_errors'>";
		echo validation_errors();
		echo "</span></p>";
	}
?>
	

    <div class="module">
    	
        <h2 class="title titlebg">Teammates</h1>
        <div class="InfoDisplay FormBG">
<?php


if($id){

	echo form_open_multipart('challenge/add_teammates/'.$item->id, $attributes);
}
?>


          		<h2 class="title">Add Teammate</h2>
            	<table>
                	<tr>
	                	<td colspan=2><h5>Enter the name and email below of the teammate you would like to invite to this challenge.</h5></td>
                    </tr>
                    <tr>
	                    <td class="label"><label>Name:</label></td>
                        <td><?php echo generate_input('name', 'input', true, ''); ?></td>
                    </tr>
                    <tr>
	                    <td class="label"><label>E-mail:</label></td>
                        <td><?php echo generate_input('email', 'input', true, ''); ?></td>
                    </tr>
                    <!--<tr>
                    	<td class="label"><label>E-mail Message:<br /><br /><span style="font-size:9px; font-style:italic;">**Invites contain a cluster access code. When this code is entered into a "Join a Cluster" field on the website, the user will be prompted to fill out the form below. You (cluster admin) can accept or reject anyone who fills out the form on the <a>admin dashboard page</a>.</span></label></td>
                        <td><?php echo generate_input('personal_message', 'text', true, '', 'big_text');  ?></td>
                    </tr>-->

                    <!--
                    <tr>
	                	<td colspan=2><h5>Join Cluster Form</h5></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><a>+ Add questions</a><br />Max 3 questions</td>
                    </tr>
                    <tr>
                    	<td class="label"><label>Question 1</label></td>
                        <td><input /></td>
                    </tr>
                    <tr>
                    	<td class="label"><label>Question 2</label></td>
                        <td><input /></td>
                    </tr>
                    <tr>
                    	<td class="label"><label>Question 3</label></td>
                        <td><input /></td>
                    </tr>
                    -->
                    <tr>
                    	<td colspan="2"><input type="image" src="/beex/images/buttons/send.gif" style="width:auto;" /></td>
                    </tr>


                </table>

				
            </form>

<script>

$(document).ready(function() {
	
	$('.delete_teammate').click(function() {
		var challenge_id = <?php echo $item->id; ?>;
		var id = $(this).attr('id').substr(16);
		
		$.ajax({
			url: base_url + "ajaxeditor/delete_teammate/" + id + '/' + challenge_id,
			success: function() {
				jQuery('#teammate_'+id).remove();
			}
		});
	})
	
});

</script>
			
			<?php if(isset($teammates)) : ?>
			<h2>Current Teammates</h2>
			<div class="teammates">
			<?php
			
				foreach($teammates->result() as $teammate) {
					
					echo "<p id='teammate_".$teammate->id."' style='padding:0px 10px;'>".anchor('user/view/'.$teammate->id, $teammate->first_name.' '.$teammate->last_name)." (<span class='delete_teammate' id='delete_teammate_".$teammate->id."'>Remove</span>)</p>";
					
				}
			
			?>
			</div>
			<?php endif; ?>

        </div>
    </div>

</div>

</div>
<div style="clear:both;"></div>