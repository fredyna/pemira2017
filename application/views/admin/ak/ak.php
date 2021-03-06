<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><span>PEMIRA</span>PHB 2017</a>
			<ul class="user-menu">
				<li class="dropdown pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><i class="fa fa-user"></i> <?php echo $user->username;?><span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo base_url('admin/c_admin/settings'); ?>"><i class="fa fa-cog"></i> Settings</a></li>
						<li><a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
						
	</div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
	<div class="sidebar-header">
		<i class="fa fa-user"></i>
		<span><?php echo $user->username;?></span>
		<hr>
	</div>
	<ul class="nav menu">
		<?php if($group->id==1){ ?>
			<li><a href="<?php echo base_url('admin/c_admin');?>"><i class="fa fa-home"></i> Dashboard</a></li>
			<li  class=""><a href="<?php echo base_url('admin/petugas/');?>"><i class="fa fa-users"></i> Petugas</a></li>
		<?php } else { ?>
			<li class=""><a href="<?php echo base_url('petugas/home');?>"><i class="fa fa-home"></i> Dashboard</a></li>
		<?php } ?>
					

			<li class="parent ">
				<a data-toggle="collapse" href="#data-pemilih">
					<span><i class="fa fa-list-alt"></i></span>
					Data Pemilih <span><i class="fa fa-chevron-circle-down"></i></span>
				</a>
				<ul class="children collapse in" id="data-pemilih">
					<li>
						<a class="" href="<?php echo base_url('admin/pemilih/ti/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 D4 Teknik Informatika
						</a>
					</li>
					<li>
						<a class="active" href="<?php echo base_url('admin/pemilih/ak/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 D3 Akuntansi
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('admin/pemilih/kb/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 D3 Kebidanan
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('admin/pemilih/fm/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 D3 Farmasi
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('admin/pemilih/kom/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 D3 Komputer
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('admin/pemilih/tm/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 D3 Teknik Mesin
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('admin/pemilih/te/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
								D3 Teknik Elektro
						</a>
					</li>
				</ul>
			</li>

			<li class="parent ">
				<a data-toggle="collapse" href="#calon">
					<span><i class="fa fa-user"></i></span>
					Data Calon <span><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
				</a>
				<ul class="children collapse" id="calon">
					<li>
						<a class="" href="<?php echo base_url('admin/calon/presma/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 Calon Presma
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('admin/calon/kahim/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 Calon Kahim
						</a>
					</li>
				</ul>
			</li>

		<?php if($group->id==1){ ?> 
			<li class="parent ">
				<a data-toggle="collapse" href="#suara">
					<span><i class="fa fa-bar-chart"></i></span>
					Suara <span><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
				</a>
				<ul class="children collapse" id="suara">
					<li>
						<a class="" href="<?php echo base_url('admin/suara/presma/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 Suara Presma
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('admin/suara/kahim/');?>">
							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							 Suara Kahim
						</a>
					</li>
				</ul>
			</li>

			<li><a href="<?php echo base_url('admin/laporan');?>"><i class="fa fa-file"></i> Laporan</a></li>
			<li><a href="<?php echo base_url('admin/c_admin/settings');?>"><i class="fa fa-cog"></i> Settings</a></li>
		<?php } ?>	
			<li role="presentation" class="divider"></li>
			
	</ul>
	<div class="attribution">Powered by <a href="http://fb.com/fredy.nurapriyanto">Fredd</a></div>
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-list-alt"></i></a></li>
			<li>Pemilih</li>
			<li class="active">D3 Akuntansi</li>
		</ol>
	</div><!--/.row-->        
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">D3 Akuntansi</h1>
		</div>
		<?php if($this->session->flashdata('info-umum')): ?>
		      				<div class="alert alert-warning">
		    					<?php echo $this->session->flashdata('info-umum'); ?>
		    				</div>
		    			<?php endif; ?>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
		      <div class="panel-heading">Jumlah Kelas</div>
		      <div class="panel-body">
		      	<div class="row">
		      		<div class="col-xs-12 col-md-8 col-md-offset-2">
		      		<?php if($this->session->flashdata('info')): ?>
		      				<div class="alert alert-warning">
		    					<?php echo $this->session->flashdata('info'); ?>
		    				</div>
		    			<?php endif; ?>
			      		<?php
						$name = array(
							'name'=>'addKelas',
							'class'=>'form-inline'
							); 
						echo form_open('admin/ak/addKelas',$name);
						?>
							<div class="form-group">
						    	<label for="smt">Semester</label>
						    	<select class="fomr-control" placeholder="Semester" name="smt">
						    		<option value="1">1</option>
						    		<option value="3">3</option>
						    		<option value="5">5</option>
						    	</select>
						  	</div>
						  	<div class="form-group">
						    	<label for="jumlah">Jumlah</label>
						    	<input type="text" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah">
						  	</div>
						  	<button type="submit" class="btn btn-success">Simpan</button>
						</form>
					</div>
		      	</div>
		      </div>
		    </div>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-md-6 left">
			<div class="panel-group">
				<div class="panel panel-orange">
				    <div class="panel-heading" data-toggle="collapse" href="#collapse1">
					    <h4 class="panel-title">
				    	    Semester 1
				    	</h4>
				    </div>
				    <div id="collapse1" class="panel-collapse collapse">
				    	<div class="panel-body">
                            <?php 
								$jml = 0;
								$count = count($jumlah);
				    			if($count>0){
                                    $jml = $jumlah[0]->jumlah;
                                }
				    			if($jml==0){
				    				echo '<p class="text-center">Tidak Ada Kelas</p>';
				    			}else{
				    				for($i=0;$i<$jml;$i++){?>
				    				<a href="<?php echo base_url('admin/ak/index/ak/1/'.$kelas[$i]);?>" class="btn btn-info"><?php echo 'Kelas '.$kelas[$i];?></a>
				    				<br>
				    		<?php } 
				    			} ?>
				    	</div>
				    </div>
				</div>
			</div>
		</div>
		<div class="col-md-6 right">
			<div class="panel-group">
				<div class="panel panel-orange">
				    <div class="panel-heading" data-toggle="collapse" href="#collapse2">
					    <h4 class="panel-title">
				    	    Semester 3
				    	</h4>
				    </div>
				    <div id="collapse2" class="panel-collapse collapse">
				    	<div class="panel-body">
                            <?php 
                                $jml = 0;
				    			$count = count($jumlah);
				    			if($count>1){
                                    $jml = $jumlah[1]->jumlah;
                                }
				    			if($jml==0){
				    				echo '<p class="text-center">Tidak Ada Kelas</p>';
				    			}else{
				    				for($i=0;$i<$jml;$i++){?>
				    				<a href="<?php echo base_url('admin/ak/index/ak/3/'.$kelas[$i]);?>" class="btn btn-info"><?php echo 'Kelas '.$kelas[$i];?></a>
				    				<br>
				    		<?php } 
				    			} ?>
				    	</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 left">
			<div class="panel-group">
				<div class="panel panel-orange">
				    <div class="panel-heading" data-toggle="collapse" href="#collapse3">
					    <h4 class="panel-title">
				    	    Semester 5
				    	</h4>
				    </div>
				    <div id="collapse3" class="panel-collapse collapse">
				    	<div class="panel-body">
                            <?php 
                                $jml = 0;
                                $count = count($jumlah);
				    			if($count>2){
                                    $jml = $jumlah[2]->jumlah;
                                }
				    			if($jml==0){
				    				echo '<p class="text-center">Tidak Ada Kelas</p>';
				    			}else{
				    				for($i=0;$i<$jml;$i++){?>
				    				<a href="<?php echo base_url('admin/ak/index/ak/5/'.$kelas[$i]);?>" class="btn btn-info" style="color:#fff;display:block;text-align:center;"><?php echo 'Kelas '.$kelas[$i];?></a>
				    				<br>
				    		<?php } 
				    			} ?>
				    	</div>
				    </div>
				</div>
			</div>
		</div>
		
	</div><!--/.row-->

</div>	<!--/.main-->
<script>

	$(window).on('resize', function () {
	  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
	  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
</script>


