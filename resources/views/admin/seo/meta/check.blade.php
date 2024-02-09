<div class="row">
  <div class="col-md-5">
    <div class="form-group">
      <label>Meta Title</label>
      <input type="text" class="form-control" name="meta_title" value="{{@$meta->title}}" required>
    </div>
  </div>
  <div class="col-md-7">
    <div class="form-group">
      <label>Meta Keywords</label>
      <input type="text" class="form-control" name="meta_keywords" value="{{@$meta->keywords}}" required>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label>Meta Desciption</label>
      <textarea class="form-control" name="meta_description" required rows="5">{{@$meta->description}}</textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="btn btn-primary pull-right updateBtn">Update <i class="fa fa-thumbs-up"></i></button>
    </div>
  </div>
</div>