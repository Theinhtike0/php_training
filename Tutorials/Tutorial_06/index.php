<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tutorial 06</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <!-- Dropify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
   


<div class="container">
	 <div class="row justify-content-center py-3">
	 	<div class="col-8">
	 		<form action="action.php" method="POST" enctype="multipart/form-data">
		        <div class="card">
		            <div class="card-header">
		                <div>
		                    <p style="text-align: center;"><b>Image Upload</b></p>
		                </div>
		            </div>

		            <div class="card-body">
		            	<div class="form-group">
		            		<label for="folder_name">Folder Name</label>
		            		<input type="text" class="form-control form-control-sm rounded-0" name="folder_name" id="folder_name">
		            		<span class="text-danger err-msg"><?= $_SESSION['folder_name_err'] ?? ""; ?></span>
		            	</div>
		            	<div class="form-group">
		            		<label for="image">Choose Image</label>
		                	<input type="file" class="dropify" name="image" id="image">
		                	<span class="text-danger err-msg"><?= $_SESSION['image_err'] ?? ""; ?></span>
		            	</div>
		            </div>

		            <div class="card-footer">
		                <button type="submit"name="upload">
		                    Upload
		                </button>
		            </div>
		        </div>
	    	</form>
    	</div>
	 </div>
</div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<!-- Dropify -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" 
		integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
		<script>
			$('.dropify').dropify({
	            messages: {
	                'default': 'Choose Your Upload Image',
	                'replace': 'Click or Drag and Drop to Replace',
	                'remove' : 'Remove',
	                'error'  : 'Error. The file is either not square, larger than 2 MB or not an acceptable file type'
	            }
       		 });
		</script>
		<?php

		if( isset($_SESSION['folder_name_err']) ){
			unset($_SESSION['folder_name_err']);
		}

		if( isset($_SESSION['image_err']) ){
			unset($_SESSION['image_err']);
		}
		?>