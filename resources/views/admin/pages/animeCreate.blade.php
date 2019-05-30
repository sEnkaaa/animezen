@extends('admin.layout')

@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="card mb-3">
        	<div class="card-body">
        		<div class="bs-component">
              <div class="alert alert-dismissible alert-warning">
                <h4 class="alert-heading">Warning!</h4>
                <strong><p class="mb-0">Before you submit a new Anime, please make sure all the information provided are correct.</p></strong>
              </div>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
        		<form method="post" enctype="multipart/form-data">
                <fieldset>
                  <legend>Create an Anime</legend>
                  <div class="form-group">
                    <label>French name</label>
                    <input name="name" type="text" class="form-control" placeholder="" required="">
                    <small class="form-text text-muted">If there is no french name, put the romaji name instead</small>
                  </div>

                  <div class="form-group">
                    <label>Japanese name</label>
                    <input name="japanese_name" type="text" class="form-control" placeholder="" required="">
                    <small class="form-text text-muted">Romaji name</small>
                  </div>

                  <div class="form-group">
                    <label for="exampleTextarea">Synopsis</label>
                    <textarea name="synopsis" class="form-control" rows="3" required=""></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleSelect1">Status</label>
                    <select name="status" class="form-control" required="">
                      <option value="En cours">Ongoing</option>
                      <option value="Terminé">Finished</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Release date</label>
                    <input name="release_date" type="text" class="form-control" placeholder="" required="">
                    <small class="form-text text-muted">Format: day-month-year</small>
                  </div>

                  <div class="form-group">
		            <label>Thumbnail <span class="text-muted"></span></label>
		            <input type="file" name="thumbnail" required />
		            <small class="form-text text-muted">Format: 400x300 PX PNG</small>
		      	  </div>

		      	  <div class="form-group">
		            <label>Cover <span class="text-muted"></span></label>
		            <input type="file" name="cover" required />
		            <small class="form-text text-muted">Format: 1350x300 PX PNG</small>
		      	  </div>

		      	  	<div class="form-group">
		              <div class="custom-control custom-checkbox">
		                <input name="display_season" type="checkbox" class="custom-control-input" id="customCheck1" checked="">
		                <label class="custom-control-label" for="customCheck1">Display seasons ?</label>
		              </div>
		               <small class="form-text text-muted">Some animes doesn't have seasons, like One Piece for example.</small>
		            </div>
                	
		            <div class="form-group">
		              <div class="custom-control custom-checkbox">
		                <input name="has_vf" type="checkbox" class="custom-control-input" id="customCheck2" >
		                <label class="custom-control-label" for="customCheck2">Has VF ?</label>
		              </div>
		               <small class="form-text text-muted">VF = French version (dubbed)</small>
		            </div>
                @csrf

                  <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
              </form>
          	</div>
      	</div>
    </div>

</div>
@endsection