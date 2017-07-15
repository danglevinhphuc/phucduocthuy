
<main class="container">
			<div class="row">
				<div class="col-md-12 dinh_khung">
					<div class="form-title col-lg-12 col-md-12 col-xs-12" data-reactid="40">ĐĂNG NHẬP</div>
						<div id="dang_nhap">
							<?= $this->Form->create() ?>

							<div class="form-group">
								<?= $this->Form->control('username',['id'=>'exampleInputEmail1','placeholder' => 'Nhập username của bạn']) ?>
								
							</div>
							<div class="form-group">
								<?= $this->Form->control('password',['id'=>'exampleInputPassword1','placeholder' => 'Nhập password của bạn']) ?>
								
							</div>
							
							<input type="submit" name="submit" class="btn btn-submit" value="Đăng nhập">
						<?= $this->Form->end() ?>
						</div>
						
					</div>
				</div>
			</main>