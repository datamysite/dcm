@extends('admin.layout.main')
@section('title', 'Meta Tags | SEO Tools')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Meta Tags | SEO Tools</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">SEO Tools</li>
              <li class="breadcrumb-item active">Meta Tags</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <form id="updateMetaTag" action="{{route('admin.seo.meta.update')}}">
                  @csrf
                  <div class="row row-heading">
                    <div class="col-md-10 searchbar">
                      <input type="text" name="url" placeholder="Paste url here..." autofocus class="form-control urlTag">
                    </div>
                    <div class="col-md-2">
                      <a href="javascript:void(0)" class="btn btn-primary pull-right checkTags" title="Check Tag"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Check</a>
                    </div>
                  </div>
                  <div class="metaContent">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Meta Title</label>
                          <input type="text" class="form-control" name="meta_title" readonly required>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <label>Meta Keywords</label>
                          <input type="text" class="form-control" name="meta_keywords" readonly required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Meta Desciption</label>
                          <textarea class="form-control" name="meta_description" readonly required rows="8"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('addStyle')

@endsection
@section('addScript')
<script type="text/javascript">
  $(function () {

    $(document).on('click', '.checkTags', function(){
      var val = $('.urlTag').val();
      console.log(isValidURL(val));
      if(isValidURL(val)){
        $('.metaContent').html('<img src="{{URL::to('/public/loader-gif.gif')}}" height="40px">');
        var url = "{{route('admin.seo.meta.check')}}";

        $.ajax({
          type: "POST",
          url: url,
          data: {_token:"{{csrf_token()}}", url:val}
        }).done(function (data) {
          $('.metaContent').html(data);
        });
      }else{
        Toast.fire({
          icon: 'error',
          title: "Alert! Please put valid url first."
        });
      }
    });



    $(document).on('submit', "#updateMetaTag", function (event) {
      var form=$(this);
      var formData = new FormData($("#updateMetaTag")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function (data) {
        if(data.success == 'success'){
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          form.trigger("reset");
          $('input[name="meta_title"]').val('').prop('disabled', true);
          $('input[name="meta_keywords"]').val('').prop('disabled', true);
          $('textarea[name="meta_description"]').val('').prop('disabled', true);
          $('.updateBtn').remove();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });

  });


  //Check URL
  function isValidURL(string) {
    var res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    return (res !== null)
  };
</script>
@endsection