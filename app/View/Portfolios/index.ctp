<div class="container">
<div class="row">
	<div class="col s12 m12 l9">
	<?php 
		foreach($portfolio as $index => $portfolio){
		$card_id = $portfolio['Portfolio']['id'];
		$card_title = $portfolio['Portfolio']['title'];
		$card_detail = $portfolio['Portfolio']['detail'];
		$card_detail_tc = $this->Text->truncate($portfolio['Portfolio']['detail'], 100, array('ellipsis' => '...','exact' => false));
		$card_cover = 'portfolio/'.$card_id.'/image1.jpg'; 
		$card_example = $portfolio['Portfolio']['example'];
		$card_demo = $portfolio['Portfolio']['demo'];
	?>
        <div class="col s12 m6 l6">
			<div class="card">
				<div class="card-image">
					<?php if($this->Session->check('Auth.User')) { ?>
					<div class="delele">
						<?php echo $this->Html->link('<i class="mdi-action-delete right"></i>', array('controller' => 'Portfolios', 'action' => 'delete',$card_id)  , array('escape' => false, 'confirm' => "Are you sure ?")); ?>
						<a class="cursor"><i class="mdi-editor-mode-edit right activator"></i></a>
					</div>
					<?php } ?>
					<?php echo $this->Html->image($card_cover); ?>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4 tooltipped"  data-position="top" data-delay="10" data-tooltip="<?php echo $card_title; ?>">
						<?php echo $this->Text->truncate($card_title, 40,array('ellipsis' => '...','exact' => false)); ?>
					</span>
					<p><?php echo $this->Text->truncate(strip_tags($portfolio['Portfolio']['detail']).'', 150, array('ellipsis' => '...<br><span class="card-title activator readmore">READ MORE</span>','exact' => false)); ?></p>
					
				</div>
				<div class="card-action">
					
					<?php if(!empty($card_demo)){echo $this->Html->link('Demo', $card_demo, array('target' => '_blank'));} ?>
					<span class="port-gallery">
	            	<?php 
	            		for($i=1;$i<=$card_example;$i++) {
		            		$image_url = $card_id.'/image'.$i.'.jpg';
		           			if($i == 1){echo $this->Html->link('GALLERY', '/img/portfolio/'.$image_url , array('escape' => false));}
		           			else{echo $this->Html->link('', '/img/portfolio/'.$image_url , array('class' => 'hide'));}
	            		}
	            	?>
	            	</span>
	            	
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4 close"><?php if(!$this->Session->check('Auth.User')) {echo $card_title;} ?> <i class="mdi-navigation-close card-close"></i></span>
					<div class="overflow">
					<?php 
					if($this->Session->check('Auth.User')) {
						$card_detail = str_replace('<br>',PHP_EOL, $card_detail);
						echo $this->Form->create('Portfolio', array('type' => 'file', 'url' => array('controller' => 'Portfolios', 'action' => 'edit')));
						echo $this->Form->input('id',array('value' => $card_id));
						echo $this->Form->input('title',array('value' => $card_title));
						echo $this->Form->input('detail',array('type' => 'textarea', 'class' => 'materialize-textarea', 'value' => $card_detail));
						echo $this->Form->input('demo',array('label' => 'Demo link', 'value' => $card_demo));
						//echo $this->Form->input('image.', array('label' => 'Upload images to gallery (Only JPEG file)','type' => 'file', 'multiple' => true, 'class' => 'upload-image-profile'));
						echo $this->Form->button('Cancel', array('type' => 'reset', 'class' => 'btn teal darken-3 right'));
						echo $this->Form->end(array('label' => 'Update', 'class' => 'btn teal darken-3 right'));
					} 
					else { echo $card_detail; } ?>
					</div>
				</div>
			</div>
			
        </div>
        <?php if($index%2!=0){ ?><div class="clear"></div><?php } ?>
	<?php } ?>
	
	</div> <!-- End col l9 portfolio card -->

	<div class="col l3 hide-on-med-and-down">
		<div class="profile">
			
			<span class="h1">I am <?php echo $profile['Profile']['name']; ?><br>and </span><span class="h2"><strong><span class="txt-rotate" data-period="2000" data-rotate='[ "I am a Programmer.", "I love programming." ]'></span></strong></span>
			<div class="line"></div>
			<span class="h1"><strong>I'm so happy you're visiting</strong></span>
			<p><?php echo $profile['Profile']['intro']; ?></p>
			<div class="line"></div>
			<span class="h1"><strong>My Skill</strong></span>
			<p>	<?php $skill = explode("<br>",$profile['Profile']['skill']); 
				foreach($skill as $skill) {?>
				<i class="mdi-toggle-check-box"></i><?php echo " ".$skill; ?><br>
				<?php } ?>
			</p>
		</div> <!-- End profile -->
	</div> <!-- End col l3  -->
</div> <!-- End row -->
</div> <!-- End container -->
